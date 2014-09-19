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
  }
  
  /*
        タイムラインの動作
  */
  public function action_timeline()
  {  
    $user_id = Cookie::get('user_id', null);
    $user_id = 1;
    $containers = Model_Timeline::get_containers($user_id, 5);
    $datas = array(
            'containers'        => $containers,
            'type_container'    => Constants::TYPE_CONTAINER,
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
  
  public function action_cheer($target_id, $type)
  {
    $flag_cheerable = true;

    // コンテナを見ているユーザのID
    $cheering_user_id = 1;//Cookie::get('user_id');
    $container_id = -1;

    if($type == Constants::TYPE_CONTAINER){
      // コンテナの場合、コンテナIDからコンテナ、目標IDを取得
      $container_id = $target_id;
      $goal_id = Model_Containers::get_goal_id($container_id);
    }elseif($type == Constants::TYPE_GOAL){ 
      // 目標IDを取得
      $goal_id = $target_id;
    }

    if($type == Constants::TYPE_CONTAINER){
      // コンテナにcheer可能かチェック、できなければreturn
      if((0 < $container_id) 
          && (Model_Markcheers::cheerable($cheering_user_id, $target_id, Constants::TYPE_CONTAINER) == false)){
        $flag_cheerable = false;
      }
    }
    if($type == Constants::TYPE_GOAL){
      // 目標にcheer可能かチェック、できなければretuen
      if(Model_Markcheers::cheerable($cheering_user_id, $target_id, Constants::TYPE_GOAL) == false){
        $flag_cheerable = false;
      }
    }

    // zuminobaaiha kokode kaeru
    if(!$flag_cheerable){
            return Model_Markcheers::cheerable($cheering_user_id, $target_id, Constants::TYPE_CONTAINER);
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

    // cheerしたことをマーク
    Model_Markcheers::hadcheered($cheering_user_id, $target_id, $type);

    return Model_Markcheers::cheerable($cheering_user_id, $target_id, Constants::TYPE_CONTAINER);
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
