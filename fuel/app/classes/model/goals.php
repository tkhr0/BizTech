<?php
namespace Model;

class Goals extends \Model {
	public static function get_goal_from_id($target_id){
		$results = \DB::select()->from('goals')->where('id', $target_id)->as_assoc()->execute();
		return $results[0];
	}

	public static function get_goals_from_user($user_id){
		$results = \DB::select()->from('goals')->where('user_id', $user_id)->as_assoc()->execute();
		return $results;
	}

	public static function get_cheered($target_id){
		$results = \DB::select("cheered")->from('goals')->where('id', $target_id)->as_assoc()->execute();
		return $results;
	}

}
