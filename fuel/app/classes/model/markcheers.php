<?php

class Model_Markcheers extends \Model
{

  public static function get_user_id($target_id, $type)
  {
    $query = \DB::select('user_id')->from('markcheers')
      ->where('target_id', '=', $target_id)
      ->where('type', '=', $type)
      ->execute();
    return $query->as_array()[0]['user_id'];
  }

  public static function get_target_id($user_id, $type)
  {
    $query = \DB::select('target_id')->from('markcheers')
      ->where('user_id', '=', $user_id)
      ->where('type', '=', $type)
      ->execute();
    return $query->as_array()[0]['target_id'];
  }

  public static function get_type($user_id, $target_id)
  {
    $query = \DB::select('type')->from('markcheers')
      ->where('user_id', '=', $target_id)
      ->where('target_id', '=', $target_id)
      ->execute();
    return $query->as_array()[0]['type'];
  }

  public static function insert($user_id, $target_id, $type)
  {
    $query = \DB::insert('markcheers')->set(array(
          'created_at'    => Date::forge()->format("%Y/%m/%d %H:%M:%S"),
          'user_id'       => $user_id,
          'target_id'     => $target_id,
          'type'          => $type,
          ))->execute();
    return $query;
  }

  /*
    target_idとtypeから、ターゲットにcheer可能かを返す
  */
  public static function cheerable($user_id, $target_id, $type)
  {
    $query = \DB::select('id')->from('markcheers')
                              ->where('user_id', '=', $user_id)
                              ->where('target_id', '=', intval($target_id))
                              ->where('type', '=', $type)
                              ->execute();
    if(0 < count($query->as_array())){
      return false;
    }else{
      return true;
    }
  }

  /*
    cheerしたことを知らせる
  */
  public static function hadcheered($user_id, $target_id, $type)
  {
    return self::insert($user_id, $target_id, $type);
  }

}


