<?php
class Controller_Mypage extends Controller{
   public function action_index()
    {
     $data = Model_Mypage::action_select(2);
     return Response::forge(View_Smarty::forge('sukima/mypage.tpl', $data));
    }
}
