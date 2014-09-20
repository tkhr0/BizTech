<?php

include_once('constants.php');


class Controller_Sukima extends Controller
{

  public function action_index()
  {
    // クッキーに仮のユーザIDを登録する
    // ここにアクセスするたびにIDが順に1~3にかわる
    $user_id = Cookie::get('user_id', null); if($user_id == null){
            $user_id = 1;
    }else{
            $user_id = floor($user_id) % 3 + 1;
    }
    Cookie::set('user_id', $user_id);

    $datas = array();
    $datas['data'] = Model_Users::get_profile($user_id);
    $datas['id'] = $user_id;

    return Response::forge(View_Smarty::forge('sukima/index.tpl', $datas));
  }
  
  public function action_mypage($page_user_id)
  {
    // cheerボタンのリダイレクト用
    Cookie::set('from_uri', "sukima/mypage/$page_user_id");

    // 情報を取得
    $datas['user'] = Model_Users::get_profile($page_user_id); // ページのユーザの情報
    $datas['visited_user_id'] = Cookie::get('user_id');       // ログイン中のユーザ
    // 目標
    $datas['goals'] = Model_Goals::get_goals_from_user($page_user_id);   // 目標の連想配列の配列
    // 応援した人のデータを取得、追加
    foreach($datas['goals'] as &$goal){
      $cheering_users_data = array();
      foreach(Model_Markcheers::get_user_ids_only($goal['id'], Constants::TYPE_GOAL) as $cheering_user_id){
        $user_data = array();  // init
        $cheering_user_profile = Model_Users::get_profile($cheering_user_id);  // プロフール全取得
        $user_data['mypage_url'] = '/sukima/'.$cheering_user_profile['id'];  // idをセット
        $user_data['thumbnail'] = $cheering_user_profile['thumbnail_path']; // サムネ
        $user_data['name'] = $cheering_user_profile['name'];  // 名前
        array_push($cheering_users_data, $user_data);
      }
      $goal = array_merge($goal, array('cheering_users' => $cheering_users_data));
    }

    return Response::forge(View_Smarty::forge('sukima/mypage.tpl', $datas));
  }
  
  /*
        タイムラインの動作
  */
  public function action_timeline()
  {  
    $user_id = Cookie::get('user_id', null);
    $containers = self::helper_add_disabled_info($user_id, Model_Timeline::get_containers($user_id, 5));
    $datas = array(
        'containers'        => $containers,
        'type_container'    => Constants::TYPE_CONTAINER,
        'user_id'           => $user_id,
        );
    return Response::forge(View_Smarty::forge('sukima/timeline', $datas));
  }
  
  public function post_new()
  {
  
  }
  
  public function post_hackstart()
  {
  
  }
  
  public function post_hackend()
  {
  
  }
  
  public function post_achieve()
  {
  
  }
  
  public function post_follower($user_id, $follow_id)
  {
    $success = Model_Follows($follow_id, $user_id);

    if($success === 0){
      return false;
    }else{
      return true;
    }
  }
    
  public function action_goals($user_id){
    $goals = Model_Goals::get_goals_from_user($user_id);
    return json_encode($goals);
  }

  
  public function action_cheer($target_id, $type)
  {
    // コンテナを見ているユーザのID
    $cheering_user_id = Cookie::get('user_id');
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

  /**/
  public static function helper_add_disabled_info($user_id, $containers){
    function info(&$item, $key){
      $item['disabled'] = '';
    }
    array_walk($containers, 'info');

    foreach($containers as &$container){
      if(!Model_Markcheers::cheerable($user_id, $container['container_id'], Constants::TYPE_CONTAINER)){
        $container['disabled'] = 'disabled';
      }
    }
    return $containers;
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
