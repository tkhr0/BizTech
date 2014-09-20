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
  
  public function action_mypage()
  {
    // cheerボタンのリダイレクト用
    Cookie::set('from_uri', 'sukima/mypage');
    $user_id = 1;
    $datas["goals"] = Model_Goals::get_goals_from_user($user_id);
    $datas["user"] = Model_Users::get_profile($user_id);
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
  
  public function post_follower()
  {
  
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
