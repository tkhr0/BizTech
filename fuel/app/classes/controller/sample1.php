<?php
class Controller_Sample1 extends Controller
{
  public function action_index()
   {
   //データベース接続
   $query = DB::select()->from('users')->execute()->as_array();
   $data = array("query" => $query);
   //データベース情報の引き渡し
   return Response::forge(View_Smarty::forge('sample1/content.tpl', $data));
	}
}
