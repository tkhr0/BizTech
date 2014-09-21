<?php

include_once('constants.php');


class Controller_Sukima extends Controller
{

  /*
  public function before()
  {
    // redirect /sukima if there is a fraud which between session and cookie
    //if((Session::get('user_id', null) != null)
    //  && (Session::get('user_id') != Cookie::get('user_id')
    //  && (Session::get('noredirect', false) == false))){
    
    //$arr = Session::get('user_id');
    //var_dump($arr);exit;

    if(Session::get('user_id', null) == null && (Session::get('noredirect', false) == false) ){
      Session::set('noredirect', true);
      Response::redirect('/sukima');
    }
  }
  */

  public function action_index()
  {
  //   クッキーに仮のユーザIDを登録する
  //   ここにアクセスするたびにIDが順に1~3にかわる
    $user_id = Session::get('user_id', null);
    if($user_id == null){
          $user_id = 1;
    }else{
   
   
   
      $user_id = floor($user_id) % 4 + 1;
    }
    Session::set('user_id', $user_id);
    Cookie::set('user_id', $user_id);

    $datas = self::get_page_header_data();
    $datas['data'] = Model_Users::get_profile($user_id);
    $datas['id'] = $user_id;
    $datas['user_id'] = $user_id;

    Session::delete('noredirect');
    return Response::forge(View_Smarty::forge('sukima/index.tpl', $datas));
  }

  public function action_mypage($page_user_id=null)
  {
    if($page_user_id == null){
      $user_id = Session::get('user_id');
      Response::redirect("/sukima/mypage/{$user_id}");
    }

    // cheerボタンのリダイレクト用
    Session::set('from_uri', "sukima/mypage/$page_user_id");
    // for header
    $datas = self::get_page_header_data();

    $user_id = Session::get('user_id');  // ログイン中のユーザid

    // 情報を取得
    $datas['user'] = Model_Users::get_profile($page_user_id); // ページのユーザの情報

    $datas['visited_user_id'] = $user_id;
    $datas['achieved_goals_num'] = self::get_achieved_goals_num($page_user_id);
    $datas['followable'] = Model_Follows::followable($user_id, $page_user_id) ? 1:0;
    // 目標
    $datas['goals'] = Model_Goals::get_goals_from_user($page_user_id);   // 目標の連想配列の配列
    // 応援した人のデータを取得、追加
    foreach($datas['goals'] as &$goal){
      $cheering_users_data = array();
      foreach(Model_Markcheers::get_user_ids_only($goal['id'], Constants::TYPE_GOAL) as $cheering_user_id){
        $user_data = array();  // init
        $cheering_user_profile = Model_Users::get_profile($cheering_user_id);  // プロフール全取得
        $user_data['mypage_url'] = '/sukima/mypage/'.$cheering_user_profile['id'];  // idをセット
        $user_data['thumbnail'] = $cheering_user_profile['thumbnail_path']; // サムネ
        $user_data['name'] = $cheering_user_profile['name'];  // 名前
        array_push($cheering_users_data, $user_data);
      }
      $goal = array_merge($goal, array('cheering_users' => $cheering_users_data));
      $cheer_num = \Model_Markcheers::cheerable($user_id, $goal['id'], Constants::TYPE_GOAL);
      $disable = '';
      if($user_id == $page_user_id){
        $disable = -1;
      }elseif((1000 < $cheer_num)){
        $disable = "disabled";
      }
      $goal = array_merge($goal, array('disable' => $disable));
    }
    return Response::forge(View_Smarty::forge('sukima/mypage.tpl', $datas));
  }

  /*
        タイムラインの動作
  */
  public function action_timeline()
  {
    $datas = self::get_page_header_data();
    $user_id = Session::get('user_id', null);
    $containers = Model_Timeline::get_containers_with_offset($user_id, 0, 10);
    $state = 0;
    if(self::active_id($user_id) > 0){
      $state = 2;
    }

    $containers = self::help_container_fixed_phrase($containers);

    $datas = array_merge($datas, array(
        'state'             => $state,
        'containers'        => $containers,
        'type_container'    => Constants::TYPE_CONTAINER,
        'user_id'           => $user_id,
    ));
    return Response::forge(View_Smarty::forge('sukima/timeline.tpl', $datas));
  }

  //タイムラインを追加で取得
  public function action_timeline_add($offset, $num)
  {
    $user_id = Session::get('user_id', null);
    $containers = Model_Timeline::get_containers_with_offset($user_id, $offset, $num);
    $state = 0;
    if(self::active_id($user_id) > 0){
      $state = 2;
    }

    $containers = self::help_container_fixed_phrase($containers);

    $datas = array(
        'state'             => $state,
        'containers'        => $containers,
        'type_container'    => Constants::TYPE_CONTAINER,
        'user_id'           => $user_id,
    );
    return View_Smarty::forge('sukima/timeline_add.tpl', $datas);
  }

  private function help_container_fixed_phrase(&$containers)
  {
    foreach($containers as &$container){
      switch(intval($container['status'])){
        case(Constants::CONTAINER_TYPE_NEW):
          $container['fixed_phrase'] = Constants::CONTAINER_MESSAGE_NEW;
        break;
        case(Constants::CONTAINER_TYPE_START):
          $container['fixed_phrase'] = Constants::CONTAINER_MESSAGE_START;
        break;
        case(Constants::CONTAINER_TYPE_FINISH):
          $container['fixed_phrase'] = Constants::CONTAINER_MESSAGE_FINISH;
        break;
        case(Constants::CONTAINER_TYPE_ACHIEVED):
          $container['fixed_phrase'] = Constants::CONTAINER_MESSAGE_ACHIEVED;
        break;
      }
    }
    return $containers;
  }

  // 
  public function action_follower_view()
  {
    $data = get_page_header_data();
    $user_id = Session::get('user_id');
    $from_user_ids = Model_Follows::get_friends($user_id);

    $from_user_datas = array();
    foreach($from_user_ids as $from_user_id){
      $profile = Model_Users::get_profile($from_user_id);
      $from_user_data['thumbnail'] = $profile['thumbnail_path'];
      $from_user_data['name'] = $profile['name'];
      $from_user_data['twitter_id'] = $profile['twitter_id'];
      $from_user_data['achieve_num'] = Model_Goals::get_achieved_num($from_user_id);
      $from_user_data['goal_num'] = Model_Goals::get_goals_num($from_user_id);
      $from_user_data['cheering'] = $profile['cheering'];
      $from_user_data['cheered'] = $profile['cheered'];
      array_push($from_user_datas, $from_user_data);
    }

    return Response::forge(View_Smarty::forge('', $data));
  }

  public function action_follower_view_add($offset, $num)
  {
  }

  private function help_follower_view($from_user_ids)
  {
  }

  public function action_follower($page_user_id=null)
  {
    $datas = array();
    return Response::forge(View_Smarty::forge('sukima/follower.tpl', $datas));
  }

  public function action_make_community($name){
    $user_id = Session::get('user_id');
    $community_id = Model_Communities::set_community($name, $user_id);
    Model_Belonging::belonging($community_id, $user_id);
    return 1;
  }
  
  public function action_belonging_communities(){
    $user_id = Session::get('user_id');
    $communities = Model_Communities::get_belonging_communities($user_id);
    return json_encode($communities);
  }
  
  public function action_belong_community($community_id){
    $user_id = Session::get('user_id');
    Model_Belonging::belonging($community_id, $user_id);
    return 1;
  }

  public function action_leave_community($community_id){
    $user_id = Session::get('user_id');
    Model_Belonging::leaving($community_id, $user_id);
    return 1;
  }
  
  public function action_search_community($query){
    $user_id = Session::get('user_id');
    $communities = Model_Communities::search_community($query);
    return json_encode($communities);
  }

  /* for ajax */
  public function action_getcontainers($start, $limit=10)
  {
    $user_id = Session::get('user_id');
    $data = Model_Timeline::get_containers_with_offset($user_id, intval($start), intval($limit));
    return Format::forge($data)->to_json();
  }
  
  public function action_make_goal($name, $user_id)
  {
    $goal_id = Model_Goals::set_goal($name, $user_id);  
    Model_Containers::set_container($goal_id, 1);
    Model_Goals::set_active($goal_id);
    return $goal_id;
  }
  
  /* for ajax */
  public function action_hack_start($goal_id)
  {
    Model_Containers::set_container($goal_id, 2);
    Model_Goals::set_active($goal_id);
    return 1;
  }
  
  /* for ajax */
  public function action_hack_end($goal_id)
  {
    Model_Containers::set_container($goal_id, 3);
    Model_Goals::set_unactive($goal_id);
    return 1;
  }

  public function action_hack_achieved($goal_id){
    Model_Containers::set_container($goal_id, 4);
  }
  
  public function action_achieve_goal($name, $user_id)
  {
  }
  
  /* set follow */
  public function action_set_follow($user_id, $follow_id)
  {
    $success = Model_Follows::set_follow($user_id, $follow_id);

    if($success === 0){
      return false;
    }else{
      return true;
    }
  }
  
  /* remove follow */
  public function action_remove_follow($user_id, $follow_id)
  {
    $success = Model_Follows::remove_follow($user_id, $follow_id);

    if($success === 0){
      return false;
    }else{
      return true;
    }
  }
  
  public function action_active_id($user_id){
    return self::active_id($user_id);
  }
    
  public function action_goals($user_id){
    $goals = Model_Goals::get_goals_from_user($user_id);
    return json_encode($goals);
  }
  
  public function action_cheer($target_id, $type)
  {
    // コンテナを見ているユーザのID
    $cheering_user_id = Session::get('user_id');
    $container_id = -1;
    if($type == Constants::TYPE_CONTAINER){
      // コンテナの場合、コンテナIDからコンテナ、目標IDを取得
      $container_id = $target_id;
      $goal_id = Model_Containers::get_goal_id($container_id);
    }elseif($type == Constants::TYPE_GOAL){ 
      // 目標IDを取得
      $goal_id = $target_id;
    }

    // コンテナを発信したユーザのID
    $cheered_user_id = Model_Goals::get_user_id($goal_id);

    // それぞれのいいね数を増やす
    if($type == Constants::TYPE_CONTAINER){
      Model_Containers::increment_cheered($container_id);
    }
    Model_Goals::increment_cheered($goal_id);
    Model_Users::increment_total_cheered($cheered_user_id);
    Model_Users::increment_total_cheering($cheering_user_id);

    $count = 0;
    if($type == Constants::TYPE_CONTAINER){
      $count = Model_Containers::get_cheered($container_id);
    }elseif($type == Constants::TYPE_GOAL){ 
      $count = Model_Goals::get_cheered($goal_id);
    }

    // cheerしたことをマーク
    Model_Markcheers::hadcheered($cheering_user_id, $target_id, $type);

    return $count;
  }

  private function active_id($user_id){
    $goals = Model_Goals::get_goals_from_user($user_id);
    $activeNum = -1;
    $datas["test"] = $goals;

    foreach($goals as $goal){
      if($goal["active"] == 1){
        $activeNum = $goal["id"];
        break;
      }
    }
    return $activeNum; 
  }

  private function get_page_header_data(){
    $data['header_home_url'] = Uri::create('/sukima/timeline');
    $data['header_mypage_url'] = Uri::create('/sukima/mypage');
    return $data;
  }

  public function action_to_achieved($user_id){
    $active_id = self::active_id($user_id);
    Model_Goals::set_unactive($active_id);
    Model_Goals::set_achieve($active_id);
    return $active_id;
  }

  /*
    return goals num whech achieved
  */
  private function get_achieved_goals_num($user_id){
    $count = 0;
    $goals = Model_Goals::get_goals_from_user($user_id);
    foreach($goals as $goal){
      if($goal['achieve'] == Constants::ACHIEVE_TRUE){
        $count ++;
      }
    }
    return $count;
  }

  /**
  * The 404 action for the application.
  *
  * @access  public
  * @return  Response
  */
  public function action_404()
  {
    return Response::forge(Presenter::forge('welcome/404'), 404);
  }

  
}
