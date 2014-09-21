<?php

class Model_Communities extends \Model {

	public static function set_community($name, $user_id){
    list($insert_id, $rows_affected) = \DB::insert('communities')->set(array(
      'name' => $name,
      'user_id' => $user_id,
      'created_at' => Date::forge()->format("%Y/%m/%d %H:%M:%S"),
      'image_path' => "http://hoge"
    ))->execute();
    return $insert_id;
	}
	
	public static function search_community($query){
		$results = \DB::select()->from('communities')->where('name', 'LIKE', '%' . $query . '%')->as_assoc()->execute();
    $communities = $results->as_array();
    foreach($communities as &$community){
      $community["number"] = Model_Belonging::count_follower($community["id"]);
      $community["cheered"] = Model_Markcheers::get_allcount($community["id"], Constants::TYPE_COMMUNITY);
    }

		return $communities;
	}

  public static function get_belonging_communities($user_id){
    $communities = \DB::query('select communities.id as community_id, communities.name as community_name from communities, communities.image_path as community_image_path join belonging on communities.id = belonging.community_id where belonging.user_id = :userid ORDER BY belonging.id;')->bind("userid", $user_id)->execute()->as_array();
    return $communities;  
  }
}
