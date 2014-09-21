<?php

include_once('constants.php');


class Controller_Community extends Controller
{

  public function before()
  {
    // redirect /sukima if there is a fraud which between session and cookie
    if((Session::get('user_id', null) != null)
      && (Session::get('user_id') != Cookie::get('user_id')
      && (Session::get('noredirect', false) == false))){
      Session::set('noredirect', true);
      Response::redirect('/sukima');
    }
  }

  public function action_index()
  {
    //return Response::forge(View_Smarty::forge('sukima/', $));
  }

  public function action_make($name){
    $user_id = Session::get('user_id');
    $community_id = Model_Communities::set_community($name, $user_id);
    Model_Belonging::belonging($community_id, $user_id);
    return 1;
  }

  public function action_search(){
    $user_id = Session::get("user_id");
    $datas = self::get_page_header_data();
    $datas["user_id"] = $user_id;
    return Response::forge(View_Smarty::forge('sukima/search_community.tpl', $datas));
  }
  
  public function action_listup(){
    $user_id = Session::get('user_id');
    $communities = Model_Communities::get_belonging_communities($user_id);
    return json_encode($communities);
  }
  
  public function action_to_belong($community_id){
    $user_id = Session::get('user_id');
    Model_Belonging::belonging($community_id, $user_id);
    return 1;
  }

  public function action_to_leave($community_id){
    $user_id = Session::get('user_id');
    Model_Belonging::leaving($community_id, $user_id);
    return 1;
  }
  
  public function action_search_communities($query){
    $user_id = Session::get('user_id');
    $communities = Model_Communities::search_community($query);
    return json_encode($communities);
  }

  private function get_page_header_data(){
    $data['header_home_url'] = Uri::create('/sukima/timeline');
    $data['header_mypage_url'] = Uri::create('/sukima/mypage');
    return $data;
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
