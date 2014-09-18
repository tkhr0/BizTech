<?php
namespace Model;

class Users extends \Model {
	public static function get_twitter_id($user_id){
		$results = \DB::select('twitter_id')->from('users')->where('id', $user_id)->as_assoc()->execute();
		return $results[0];
	}
	
	public static function get_total_cheered($user_id){
		$results = \DB::select('cheered')->from('users')->where('id', $user_id)->as_assoc()->execute();
		return $results[0];
	}

	public static function get_total_cheering($user_id){
		$results = \DB::select('cheering')->from('users')->where('id', $user_id)->as_assoc()->execute();
		return $results[0];	
	}

	public static function get_thumbnail_path($user_id){
		$results = \DB::select('thumbnail_path')->from('users')->where('id', $user_id)->as_assoc()->execute();
		return $results[0];	
	}

	public static function get_name($user_id){
		$results = \DB::select('name')->from('users')->where('id', $user_id)->as_assoc()->execute();
		return $results[0];	
	}

	public static function get_profile($user_id){
		$results = \DB::select()->from('users')->where('id', $user_id)->as_assoc()->execute();
		return $results[0];	
	}
}
