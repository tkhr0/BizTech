<?php

namespace Model;
use DB;

define('TYPE_GOAL', 1);
define('TYPE_CONTAINER', 2);

class Model_Markcheer extends \Model
{

        public static function get_user_id($target_id, $type)
        {
                $query = \DB::select('user_id')->from('markcheer')
                                               ->where('target_id', '=', $target_id)
                                               ->where('type', '=', $type)
                                               ->execute();
                return $query->as_array();
        }

        public static function get_target_id($user_id, $type)
        {
                $query = \DB::select('target_id')->from('markcheer')
                                                 ->where('user_id', '=', $target_id)
                                                 ->where('type', '=', $type)
                                                 ->execute();
                return $query->as_array();
        }

        public static function get_type($user_id, $target_id)
        {
                $query = \DB::select('target_id')->from('markcheer')
                                                 ->where('user_id', '=', $target_id)
                                                 ->where('type', '=', $type)
                                                 ->execute();
                return $query->as_array();
        }

        public static function insert($user_id, $target_id, $type)
        {
                $query = \DB::insert('markcheer')->set(array(
                        'created_at'    => 'now()',
                        'user_id'       => $user_id,
                        'target_id'     => $target_id,
                        'type'          => $type,
                ))->execute();
                return $query();
        }
}











