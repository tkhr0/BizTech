<?php

/*
  Useage: include_once('constants.php');Constants::TYPE_GOAL; // => 1
*/
class Constants
{
        /*
        CLM_[テーブル名]_[カラム名] = 'カラム'
        var_dump(Constants::CLM_CONTAINERS_GOAL_ID); // -> goal_id
        */
        const CLM_CONTAINERS_GOAL_ID    = 'goal_id';
        const CLM_CONTAINERS_CHEERED    = 'cheered';
        const CLM_CONTAINERS_STATUS     = 'STATUS';

        const CLM_MARKCHEERS_USER_ID    = 'user_id';
        const CLM_MARKCHEERS_TARGET_ID  = 'target_id';
        const CLM_MARKCHEERS_TYPE       = 'type';

        /*
          define: type
        */
        const TYPE_GOAL = 1;
        const TYPE_CONTAINER = 2;


}


