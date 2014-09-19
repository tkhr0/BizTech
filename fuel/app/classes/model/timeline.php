<?php

class Model_Timeline extends \Model {
  public static function get_containers($user_id, $limit){
    $TYPE = 2; //TODO
    $containers = \DB::query('SELECT goals.user_id as user_id, goals.name as goal_name, goals.achieve as achieve, goals.active as active, goals.cheered as goal_cheered, containers.id as container_id, containers.cheered as cheer_num, containers.created_at as created_at, containers.status as status FROM follows JOIN goals ON follows.to_user_id=goals.user_id JOIN containers  ON goals.id=containers.goal_id WHERE follows.from_user_id= :userid ORDER BY created_at LIMIT :limit')->bind("userid", $user_id)->bind("limit", $limit)->execute()->as_array();
    
    $new_containers = [];
    foreach($containers as $container){
      $user_id = $container['user_id'];
      $container_id = $container['container_id'];
      $path = Model_Users::get_thumbnail_path($user_id);
      $container["thumbnail"] = $path;
      $cheers = Model_Markcheers::get_user_ids($container_id, $TYPE);
      $cheer_users = [];
      
      foreach($cheers as $cheer){
        $user_id = $cheer["user_id"];
        $profile = Model_Users::get_profile($user_id);
        $user = array();
        $user['user_id'] = $profile["id"];
        $user['name'] = $profile["name"];
        $user['thumbnail'] = $profile["thumbnail_path"];
        array_push($cheer_users, $user);
      }

      $container["cheer_status"] = Model_Markcheers::get_count($user_id, $container_id, $TYPE);
      $container["cheer_users"] = $cheer_users;      
      array_push($new_containers, $container);

    }
    
    return $new_containers;
  }
}
