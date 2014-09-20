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
    //return Response::forge(View::forge('sukima/index.tpl', $datas));
  }
  
  public function action_mypage($page_user_id)
  {
    // cheerボタンのリダイレクト用
    Cookie::set('from_uri', "sukima/mypage/$page_user_id");

    // ログイン中のユーザID取得
    $user_id = Cookie::get('user_id');

    // 情報を取得
    $datas['user'] = Model_Users::get_profile($user_id);  // ユーザの情報
    // 目標
    $datas['goals'] = Model_Goals::get_goals_from_user($user_id);   // 目標の連想配列の配列
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
    $containers = Model_Timeline::get_containers($user_id, 100);
    $state = 0;
    if(self::active_id($user_id) > 0){
      $state = 2;
    }

    $datas = array(
        'state'             => $state,
        'containers'        => $containers,
        'type_container'    => Constants::TYPE_CONTAINER,
        'user_id'           => $user_id,
    );
    return Response::forge(View_Smarty::forge('sukima/timeline.tpl', $datas));
  }
  
  public function action_make_goal($name, $user_id)
  {
    $goal_id = Model_Goals::set_goal($name, $user_id);  
    Model_Containers::set_container($goal_id, 1);
    Model_Goals::set_active($goal_id);
    return $goal_id;
  }
  
  public function action_hack_start($goal_id)
  {
    Model_Containers::set_container($goal_id, 2);
    Model_Goals::set_active($goal_id);
    return 1;
  }
  
  public function action_hack_end($goal_id)
  {
    Model_Containers::set_container($goal_id, 3);
    Model_Goals::set_unactive($goal_id);
    return 1;
  }
  
  public function action_achieve_goal($name, $user_id)
  {
  }
  
  public function post_follower()
  {
  
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
    $flag_cheerable = true;

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
