<?php

class Controller_Twitterlogout extends Controller{
   public function action_index()
    { 
         
        Session::delete('user_id'); 
        Response::redirect('sukima/index.tpl');
    
    }
}

