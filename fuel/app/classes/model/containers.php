<?php

use DB;

class Model_Containers extends \Model
{
        public static function insert($goal_id, $cheered=0, $status=1)
        {
                $query = DB::insert('containers')->set(array(
                        'goal_id' => $goal_id,
                        'cheered' => $cheered,
                        'status'  => $status,
                )->execute();

                return $query;
        }

        public static function get_goal_id($id)
        {
                $query = DB::select('goal_id')->from('containers')->where('id', '=', $id)->execute();
                return $query->as_array()[0]['goal_id'];
        }

        public static function cheered($id)
        {
                $query = DB::select('cheered')->from('containers')->where('id', '=', $id)->execute();
                return $query->as_array()[0]['cheered'];
        }

        public static function status($id)
        {
                $query = DB::select('status')->from('containers')->where('id', '=', $id)->execute();
                return $query->as_array()[0]['status'];
        }

}
