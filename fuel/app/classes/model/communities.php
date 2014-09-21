<?php

class Model_Communities extends \Model {

	public static function set_community($name, $user_id){
    list($insert_id, $rows_affected) = \DB::insert('communities')->set(array(
      'name' => $name,
      'user_id' => $user_id,
      'created_at' => Date::forge()->format("%Y/%m/%d %H:%M:%S"),
      'number' => 0,
      'cheered' => 0,
    ))->execute();
    return $insert_id;
	}
	
	public static function set_number($community_id, $number){
    $result = DB::update('communities')
      ->value("number", $number)
      ->where('id', '=', $community_id)
      ->execute();
    return $result;	
	}
	
  public static function set_cheered($community_id, $cheered){
    $result = DB::update('communities')
      ->value("cheered", $cheered)
      ->where('id', '=', $community_id)
      ->execute();
    return $result;	
	}
	
	public static function search_community($query){
		$results = \DB::select()->from('communities')->where('name', 'LIKE', '%' . $query . '%')->as_assoc()->execute();
		return $results->as_array();
	}

  public static function get_belonging_communities($user_id){
    $communities = \DB::query('select communities.id as community_id, communities.name as community_name, communities.number as community_number, communities.cheered as community_cheered from communities join belonging on communities.id = belonging.community_id where belonging.user_id = :userid ORDER BY belonging.id;')->bind("userid", $user_id)->execute()->as_array();
    return $communities;  
  }
}
