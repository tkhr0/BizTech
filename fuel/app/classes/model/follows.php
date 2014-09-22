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

	public static function get_friends_with_offset($user_id, $offset, $limit=10){
		$results = \DB::select('to_user_id')->from('follows')
                                        ->where('from_user_id', $user_id)
                                        ->limit($limit)
                                        ->offset($offset)
                                        ->as_assoc()
                                        ->execute();
		return $results->as_array();
	}

	public static function set_follow($to_user_id, $from_user_id){
    list($insert_id, $rows_affected) = \DB::insert('follows')->set(array(
      'to_user_id' => $to_user_id,
      'from_user_id' => $from_user_id,
    ))->execute();
    return $rows_affected;
	}
	
	public static function remove_follow($to_user_id, $from_user_id){
  	 return \DB::delete("follows")->table("follows")->where("to_user_id", $to_user_id)->and_where("from_user_id", $from_user_id)->execute();
	}

  /*
    $to_user_id: 相手
    $from_user_id: 自分
  */
  public static function follow($from_user_id, $to_user_id){
    $res = self::set_follow($to_user_id, $from_user_id);
    if(0 < $res){
      return true;
    }else{
      return false;
    }
  }

  public static function unfollow($from_user_id, $to_user_id){
    $query = \DB::delete('follows')->where('to_user_id', $to_user_id)
                                   ->where('from_user_id', $from_user_id)
                                   ->execute();
  }

  public static function followable($from_user_id, $to_user_id){
    $results = \DB::select('id')->from('follows')
                                ->where('to_user_id', $to_user_id)
                                ->where('from_user_id', $from_user_id)
                                ->execute();
    if(0 < count($results->as_array())){
      return false;
    }else{
      return true;
    }

  }

}
