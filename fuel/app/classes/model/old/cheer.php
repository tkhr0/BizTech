<?php

namespace Model;
use DB;

define('TYPE_GOAL', 1);
define('TYPE_CONTAINER', 2);

class Cheer extends \Model
{
        public static function get_cheered_num($target_id, $type_id)
        {
                // table name
                $table_goals = 'goals';
                $table_containers = 'containers';

                // is defined type_id
                $table = null;

                if($type_id == TYPE_GOAL){
                        $table = $table_goals;
                }elseif($type_id == TYPE_CONTAINER){
                        $table = $table_containers;
                }else{
                        return null;
                }
                $query = \DB::select('cheered')->from($table)
                                               ->where('id', '=', $target_id)
                                               ->execute();

                return $query->as_array()[0]['cheered'];
        }

        /*
                ユーザがcheerされた数を得る
        */
        public static function get_users_cheered_num($user_id)
        {
                $query = \DB::select('cheered')->from('users')
                                               ->where('id', '=', $user_id)
                                               ->execute();

                return $query->as_array()[0]['cheered'];
        }

        /*
                ユーザがcheerした数を得る
        */
        public static function get_users_cheering_num($user_id)
        {
                $query = \DB::select('cheering')->from('users')
                                                ->where('id', '=', $user_id)
                                                ->execute();

                return $query->as_array()[0]['cheering'];
        }

        public static function get_users_cheered_and_cheering_num($user_id)
        {
                $query = \DB::select('cheered', 'cheering')->from('users')
                        ->where('id', '=', $user_id)
                        ->execute();

                return $query->as_array()[0];
        }

        /*
                $target_id      : 
                $type_id        :
                $cheered_num    :

                return 更新した行数
        */
        public static function set_cheered_num($target_id, $type_id, $cheered_num)
        {
                // table name
                $table_goals = 'goals';
                $table_containers = 'containers';

                // is defined type_id
                $table = null;

                if($type_id == TYPE_GOAL){
                        $table = $table_goals;
                }elseif($type_id == TYPE_CONTAINER){
                        $table = $table_containers;
                }else{
                        return null;
                }
                $query = \DB::update($table)->value('cheered', $cheered_num)
                                            ->where('id', '=', $target_id)
                                            ->execute();

                return $query;
        }

        public static function set_users_cheered_num($user_id, $cheered_num)
        {
                $query = \DB::update('users')->value('cheered', $cheered_num)
                                             ->where('id', '=', $user_id)
                                             ->execute();

                return $query;
        }

        public static function set_users_cheering_num($user_id, $cheering_num)
        {
                $query = \DB::update('users')->value('cheering', $cheering_num)
                                             ->where('id', '=', $user_id)
                                             ->execute();

                return $query;
        }

}
