<?php

class Controller_Twitterlogout extends Controller{
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
 

  public function action_index()
    {              
        Session::delete('user_id'); 
        Cookie::delete('user_id');
        Session::set('noredirect', false);
        Response::redirect('sukima/index.tpl');
    }
}

