<?php

class Model_Belonging extends \Model {

	public static function get_community_ids($user_id){
		$results = \DB::select('community_id')->from('belonging')->where('user_id', $user_id)->as_assoc()->execute();
		return $results->as_array();
	}

  public static function belonging($community_id, $user_id){
    try{
      list($insert_id, $rows_affected) = \DB::insert('belonging')->set(array(
        'community_id' => $community_id,
        'user_id' => $user_id,
        'created_at' => Date::forge()->format("%Y/%m/%d %H:%M:%S"),
      ))->execute();
    }catch(Exception $e){
      ;
    }
	}
	
  public static function count_follower($community_id){
    $community_id = (int)$community_id;
		$results = \DB::select()->from('belonging')->where('community_id', $community_id)->as_assoc()->execute();
		return count($results);
  }
	
	public static function leaving($community_id, $user_id){
  	 DB::delete('belonging')
      ->where('community_id', $community_id)
      ->and_where('user_id', $user_id)
      ->execute();
	}
}
