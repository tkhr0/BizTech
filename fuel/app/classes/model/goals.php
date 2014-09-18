<?php

class Model_Goals extends \Model {
	public static function get_goal_from_id($target_id){
		$results = \DB::select()->from('goals')->where('id', $target_id)->as_assoc()->execute();
		return $results->as_array()[0];
	}

	public static function get_goals_from_user($user_id){
		$results = \DB::select()->from('goals')->where('user_id', $user_id)->as_assoc()->execute();
		return $results->as_array();
	}

	public static function get_cheered($target_id){
		$results = \DB::select("cheered")->from('goals')->where('id', $target_id)->as_assoc()->execute();
		return $results->as_array()[0];
	}

	public static function set_goal($name, $user_id){
    list($insert_id, $rows_affected) = \DB::insert('goals')->set(array(
      'name' => $name,
      'user_id' => $user_id,
      'achieve' => false,
      'active' => false,
      'cheered' => 0,
      'created_at' => Date::forge()->format("%Y%m%d%H%M%S")
    ))->execute();
	}
	
	public static function set_achieve($target_id){
    $result = DB::update('goals')
        ->value("achieve", true)
        ->where('id', '=', $target_id)
        ->execute();
        return $result;
	}
}
