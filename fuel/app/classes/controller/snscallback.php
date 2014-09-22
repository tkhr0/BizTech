<?php

\Autoloader::add_class('Callback',APPPATH.'vendor/twitter/callback.php');

require_once APPPATH.'vendor/twitter/config.php'; 
require_once APPPATH.'vendor/twitter/twitteroauth/twitteroauth.php'; 


class Controller_Snscallback extends Controller{
     
   
   public function action_twitter(){
     $data['user_id'] = -1;
     //params取得
     $token =Input::get();
     
     // twitter ログインをキャンセルされた場合の処理     
     if(array_key_exists('denied', $token)){ 
        print "ログインし直してください";
        return Response::redirect('/');      
      }

     // セッション保存
     Session::set('oauth_token', $token['oauth_token'] );   
     Session::set('oauth_verifier', $token['oauth_verifier'] );   
    
 
     //　コールバック処理
     $callback = new Callback();
     $callback->login(); 
      
     $access_token = $_SESSION['access_token'];
     $connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);
     
     //ユーザ情報取得  
     $user_info = $connection->get('account/verify_credentials');
         
     if(array_key_exists('errors', $user_info)){ 
          print "回数制限を超えています";
	  $datas['user_id'] = -1;
          return Response::redirect('/');
       }
    //既にuserテーブルに登録してあるかを調べる 
    $exist = Model_users::check_exist_id($user_info->screen_name);
    if($exist==false){
      Model_users::set_profile($user_info->screen_name, $user_info->name, $user_info->profile_image_url_https, $user_info->description);    
     }

      // スキマハックのuser id をセッションに保持
    $sukima_huck_id = Model_users::get_user_id($user_info->screen_name);
    Session::set('user_id', $sukima_huck_id); 
    
    
 
//    $cursor = -1;
 //    
 //   do{   
 //       $friends = $connection->get('friends/list',array('count'=>'200', 'cursor'=> $cursor)); 
 //      
 //       if(array_key_exists('users', $friends)){ 
          
 //         foreach($friends->users as $friend){
 //             $tmp = array(
 //                 "name"        => $friend->name, 
 //                 "screen_name" => $friend->screen_name,
 //                 "profile_img" => $friend->profile_image_url,
 //                   );

  //        $followerprop_ary[] = $tmp;
 //         }
 //       $cursor = $friends->next_cursor_str;
 //       }else{
 //          break;
 //       }
         
      
//      }while($cursor != "0");
     
    
    $arr = Model_follows::get_friends($sukima_huck_id);
    
    if(count($arr) == 0){
       return Response::redirect('/sukima/all_timeline');
     }else{
    return Response::redirect('/sukima/timeline');
    } 
  }
}
