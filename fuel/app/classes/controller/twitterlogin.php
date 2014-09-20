<?php

\Autoloader::add_class('Connect',APPPATH.'vendor/twitter/connect.php');

class Controller_Twitterlogin extends Controller{
   public function action_index()
    { 
          $Connect = new Connect();
     	  $Connect->Check_Consumer_ID(); 
    }
}
