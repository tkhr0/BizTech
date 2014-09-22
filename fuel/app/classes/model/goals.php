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

  public static function get_goals_from_user_unachieve($user_id){
    $results = \DB::select()->from('goals')->where('user_id', $user_id)->and_where("achieve", 0)->as_assoc()->execute();
    return $results->as_array();
  }

  public static function get_cheered($goals_id){
    $results = \DB::select('cheered')->from('goals')->where('id', $goals_id)->as_assoc()->distinct(true)->execute();
    return $results->as_array()[0]['cheered'];
  }

  public static function get_user_id($goals_id){
    $results = \DB::select('user_id')->from('goals')->where('id', $goals_id)->as_assoc()->execute();
    return $results->as_array()[0]['user_id'];
  }

  public static function get_achieve($goals_id){
    $results = \DB::select('achieve')->from('goals')->where('id', $goals_id)->as_assoc()->execute();
    return $results->as_array()[0]['achieve'];
  }

  public static function get_active($goals_id){
    $results = \DB::select('active')->from('goals')->where('id', $goals_id)->as_assoc()->execute();
    return $results->as_array()[0]['active'];
  }

  public static function get_achieved_num($user_id){
    $query = \DB::select()->from('goals')->where('user_id', $user_id)->where('achieve', true)->execute();
    return $query->count();
  }

  public static function get_goals_num($user_id){
    $query = \DB::select('id')->from('goals')->where('user_id', $user_id)->execute();
    return $query->count();
  }

  public static function get_goals_from_users($user_ids){
    $goals = [];
    foreach($user_ids as $user_id){
      $goals = array_merge($goals, Model_Goals::get_goals_from_user($user_id));
    }
    return $goals;
  }

  public static function set_goal($name, $user_id){
    list($insert_id, $rows_affected) = \DB::insert('goals')->set(array(
          'name' => $name,
          'user_id' => $user_id,
          'achieve' => false,
          'active' => false,
          'cheered' => 0,
          'created_at' => Date::forge()->format("%Y/%m/%d %H:%M:%S")
          ))->execute();
    return $insert_id;
  }

  public static function set_cheered($target_id, $num){
    $result = DB::update('goals')
      ->value("cheered", $num)
      ->where('id', '=', $target_id)
      ->execute();
    return $result;
  }

  public static function set_whether_active($target_id, $bool){
    $result = DB::update('goals')
      ->value("active", $bool)
      ->where('id', '=', $target_id)
      ->execute();
    return $result;
  }

  public static function set_whether_achieve($target_id, $bool){
    $result = DB::update('goals')
      ->value("achieve", $bool)
      ->where('id', '=', $target_id)
      ->execute();
    return $result;
  }

  public static function set_achieve($target_id){
    return self::set_whether_achieve($target_id, true);
  }

  public static function set_unachieve($target_id){
    return self::set_whether_achieve($target_id, false);
  }

  public static function set_active($target_id){
    return self::set_whether_active($target_id, true);
  }

  public static function set_unactive($target_id){
    return self::set_whether_active($target_id, false);
  }

  public static function increment_cheered($target_id){
    return self::set_cheered($target_id, self::get_cheered($target_id) + 1);
  }
}
