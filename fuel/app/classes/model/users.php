<?php

class Model_Users extends \Model {
	public static function get_twitter_id($user_id){
		$results = \DB::select('twitter_id')->from('users')->where('id', $user_id)->as_assoc()->execute();
		return $results->as_array()[0];
	}
	
	public static function get_total_cheered($user_id){
		$results = \DB::select('cheered')->from('users')->where('id', $user_id)->as_assoc()->execute();
		return $results->as_array()[0]['cheered'];
	}

	public static function get_total_cheering($user_id){
		$results = \DB::select('cheering')->from('users')->where('id', $user_id)->as_assoc()->execute();
		return $results->as_array()[0]['cheering'];	
	}

	public static function get_thumbnail_path($user_id){
		$results = \DB::select('thumbnail_path')->from('users')->where('id', $user_id)->as_assoc()->execute();
		return $results->as_array()[0];	
	}

	public static function get_name($user_id){
		$results = \DB::select('name')->from('users')->where('id', $user_id)->as_assoc()->execute();
		return $results->as_array()[0];	
	}

	public static function get_profile($user_id){
		$results = \DB::select()->from('users')->where('id', $user_id)->as_assoc()->execute();
		return $results->as_array()[0];	
	}

	public static function set_profile($twitter_id, $name, $thumbnail_path){
    list($insert_id, $rows_affected) = \DB::insert('users')->set(array(
      'twitter_id' => $twitter_id,
      'name' => $name,
      'thumbnail_path' => $thumbnail_path,
    ))->execute();
	}

  public static function set_total_cheered($user_id, $cheered_num){
    $query = \DB::update('users')->value('cheered', $cheered_num)
                                 ->where('id', '=', $user_id)
                                 ->execute();
    return $query;
  }

  public static function set_total_cheering($user_id, $cheered_num){
    $query = \DB::update('users')->value('cheering', $cheered_num)
                                 ->where('id', '=', $user_id)
                                 ->execute();
    return $query;
  }

    public static function increment_total_cheered($user_id){
      return self::set_total_cheered($user_id, self::get_total_cheered($user_id) + 1);
    }

    public static function increment_total_cheering($user_id){
      return self::set_total_cheering($user_id, self::get_total_cheering($user_id) + 1);
    }
}
