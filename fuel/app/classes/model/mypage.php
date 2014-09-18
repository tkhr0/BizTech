<?php

Class Model_Mypage extends \Model{	
	public static function action_select($user_id){
		 //データベース接続
		$data = DB::query("SELECT * FROM users WHERE id = $user_id  ")-> execute() -> as_array();
   		//var_dump($data);
		return $data[0];
	}
}
