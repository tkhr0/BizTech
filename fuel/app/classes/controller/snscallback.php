<?php

\Autoloader::add_class('Callback',APPPATH.'vendor/twitter/callback.php');

require_once APPPATH.'vendor/twitter/config.php'; 
require_once APPPATH.'vendor/twitter/twitteroauth/twitteroauth.php'; 


class Controller_Snscallback extends Controller{
    
    
   
   public function action_twitter(){
     //params取得
     $token =Input::get();
     Session::set('oauth_token', $token['oauth_token'] );   
     Session::set('oauth_verifier', $token['oauth_verifier'] );   
     $callback = new Callback();
     $callback->login(); 
     
  
     $access_token = $_SESSION['access_token'];
     $connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);
     
     //ユーザ情報取得　デフォルトでは20件   
     $user_info = $connection->get('account/verify_credentials');
     
   
     //print $user_info->name;
     //print "<br>";
     //print $user_info->screen_name; 
     //print "<br>";
     //print $user_info->profile_image_url_https;
     //print "<br>";
     //フレンド情報の取得
     
     //$friends = $connection->get('friends/list');
    
     Model_users::set_profile($user_info->screen_name, $user_info->name, $user_info->profile_image_url_https);    
    
    // foreach($friends->users as $obj){
    //	print $obj->screen_name;
    //	print "<br>";
    // }
    
    
    
    }

 
}
