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
        const TYPE_COMMUNITY = 3;

        /*
          define: goals.achieve
        */
        const ACHIEVE_TRUE  = true;   // tasseizumi
        const ACHIEVE_FALSE = false;  // mitassei

        /*
          define: containers type
        */

        const CONTAINER_TYPE_NEW       = 1;
        const CONTAINER_TYPE_START     = 2;
        const CONTAINER_TYPE_FINISH    = 3;
        const CONTAINER_TYPE_ACHIEVED  = 4;

        /*
          define: containers message
        */
        const CONTAINER_MESSAGE_NEW       = 'を新しく目標にしました！';
        const CONTAINER_MESSAGE_START     = 'をはじめました！';
        const CONTAINER_MESSAGE_FINISH    = 'をやりました！';
        const CONTAINER_MESSAGE_ACHIEVED  = 'を達成しました！';



}


