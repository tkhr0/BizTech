<?php

class Model_Containers extends \Model
{
        public static function insert($goal_id, $cheered=0, $status=1)
        {
                $query = DB::insert('containers')->set(array(
                        'goal_id' => $goal_id,
                        'cheered' => $cheered,
                        'status'  => $status,
                        'created_at' => Date::forge()->format("%Y/%m/%d %H:%M:%S"),
                ))->execute();

                return $query;
        }

        public static function get_container_from_goal($goal_id){
                $query = DB::select()->from('containers')->where('id', '=', $id)->execute();
                return $query->as_array()[0];          
        }

        /**/
        public static function get_goal_id($id)
        {
                $query = DB::select('goal_id')->from('containers')->where('id', '=', $id)->execute();
                return $query->as_array()[0]['goal_id'];
        }

        /**/
        public static function get_cheered($id)
        {
                $query = DB::select('cheered')->from('containers')->where('id', '=', $id)->execute();
                return $query->as_array()[0]['cheered'];
        }

        /**/
        public static function get_status($id)
        {
                $query = DB::select('status')->from('containers')->where('id', '=', $id)->execute();
                return $query->as_array()[0]['status'];
        }

        /**/
        public static function set_cheered($id, $num)
        {
                $query = DB::update('containers')->value('cheered', $num)
                                                 ->where('id', '=', $id)
                                                 ->execute();
                return $query;
        }

        /**/
        public static function set_status($id, $status)
        {
                $query = DB::update('containers')->value('status', $status)
                                                 ->where('id', '=', $id)
                                                 ->execute();
                return $query;
        }

        /**/
        public static function increment_cheered($id)
        {
                return self::set_cheered($id, self::get_cheered($id)+1);
        }

}
