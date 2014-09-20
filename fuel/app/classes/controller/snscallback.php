<?php

\Autoloader::add_class('Callback',APPPATH.'vendor/twitter/callback.php');

  
class Controller_Snscallback extends Controller{
   
   public function action_twitter(){
     $token =Input::get();
     Session::set('oauth_token', $token['oauth_token'] );   
     Session::set('oauth_verifier', $token['oauth_verifier'] );   
     $callback = new Callback();
     $callback->login(); 
     
     var_dump(Session::get('oauth_token'));
     var_dump(Session::get('oauth_verifier'));
     exit;
     }

 
}
