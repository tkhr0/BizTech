<?php

class Controller_Sukima extends Controller
{
  public function action_index()
  {
    // クッキーに仮のユーザIDを登録する
    // ここにアクセスするたびにIDが順に1~3にかわる
    $user_id = Cookie::get('user_id', null);
    if($user_id == null){
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
    $containers = self::get_containers_from_user_id($user_id);
    $datas = array(
            'test' => $containers
    );
    return Response::forge(View::forge('testview', $datas));
    //return Response::forge(View_Smarty::forge('sukima/timeline', $datas));
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
  
  public function action_cheer($target_id, $type_id)
  {
    $cheered_num = Cheer::get_cheered_num($target_id, $type_id);
  
    if($cheered_num === null){
      return -1;
    }
    Cheer::set_cheered_num($target_id, $type_id, $cheered_num+1);
    return Cheer::get_cheered_num($target_id, $type_id);
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
  
  
  //ここからHelper
  private function get_containers_from_user_id($user_id){
    //フレンドの取得
    $friends = Model_Follows::get_friends($user_id);

    //フレンドたちの全ての目標を取得
    $goals = Model_Goals::get_goals_from_users($friends);

    //目標からコンテナを取得
    $containers = [];
    foreach($goals as $goal){
      $container = 
    }

    
    return $containers;
  }
}
