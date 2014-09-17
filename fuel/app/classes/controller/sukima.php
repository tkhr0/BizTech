<?php

use \Model\Hackend;
use \Model\Cheer;

class Controller_Sukima extends Controller
{

        /*
        // for model method test
        public function action_test()
        {
                $data = array(
                        'datas' => array(
                                'prev' => array(
                                        'goal_cheered' => null,
                                        'container_cheered' => null,
                                        'users_cheered' => null,
                                        'users_cheering' => null,
                                        ),
                                'next' => array(
                                        'goal_cheered' => null,
                                        'container_cheered' => null,
                                        'users_cheered' => null,
                                        'users_cheering' => null,
                                        ),
                                ),
                );

                $data['datas']['prev']['goal_cheered'] = Cheer::get_cheered_num(1, 1);
                $data['datas']['prev']['container_cheered'] = Cheer::get_cheered_num(1, 1);
                $data['datas']['prev']['users_cheered'] = Cheer::get_users_cheered_num(1);
                $data['datas']['prev']['users_cheering'] = Cheer::get_users_cheering_num(1);

                Cheer::set_cheered_num(1, 1, $data['datas']['prev']['goal_cheered']+1);
                Cheer::set_cheered_num(1, 1, $data['datas']['prev']['container_cheered']+1);
                Cheer::set_users_cheered_num(1, $data['datas']['prev']['users_cheered']+1);
                Cheer::set_users_cheering_num(1, $data['datas']['prev']['users_cheering']+1);

                $data['datas']['next']['goal_cheered'] = Cheer::get_cheered_num(1, 1);
                $data['datas']['next']['container_cheered'] = Cheer::get_cheered_num(1, 1);
                $data['datas']['next']['users_cheered'] = Cheer::get_users_cheered_num(1);
                $data['datas']['next']['users_cheering'] = Cheer::get_users_cheering_num(1);

		return Response::forge(View::forge('sukima/testframe', $data));
        }
        */


        public function action_index()
        {


        }

        public function action_mypage()
        {

        }

        public function action_timeline()
        {

        }

        public function post_new()
        {

        }

        public function post_hack_start()
        {

        }

        public function post_hack_end()
        {

        }

        public function post_achieve()
        {

        }

        public function post_follower()
        {

        }

        public function post_cheer()
        {

        }

        /**
         * The 404 action for the application.
         *
         * @access  public
         * @return  Response
         */
        public function action_404()
        {
                return Response::forge(Presenter::forge('welcome/404'), 404);
        }
}
