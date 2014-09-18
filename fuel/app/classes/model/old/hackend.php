<?php

namespace Model;
use DB;

class Hackend extends \Model
{
        /*
                $goal_id: goal id
                $bool   : active state

                return  : was changed column num
        */
        public static function update_goal_active($goal_id, $bool)
        {
                $query = \DB::update('goals')->value('active', $bool)->where('id', '=', $goal_id)->execute();
                return $query;
        }

}

