<?php

class Model_Follows extends \Model {

	public static function get_followers($user_id){
		$results = \DB::select('from_user_id')->from('follows')->where('to_user_id', $user_id)->as_assoc()->execute();
		return $results->as_array();
	}

	public static function get_friends($user_id){
		$results = \DB::select('to_user_id')->from('follows')->where('from_user_id', $user_id)->as_assoc()->execute();
		return $results->as_array();
	}

	public static function set_follow($to_user_id, $from_user_id){
    list($insert_id, $rows_affected) = \DB::insert('follows')->set(array(
      'to_user_id' => $to_user_id,
      'from_user_id' => $from_user_id,
    ))->execute();
	}
}
