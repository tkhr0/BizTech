<?php

use \Model\Hackend;
use \Model\Cheer;

class Controller_Sukima extends Controller
{

        // for model method test
        public function action_test()
        {
                $datas = array(
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
                );

                $datas['prev']['goal_cheered'] = Cheer::get_cheered_num(1, 1);
                $datas['prev']['container_cheered'] = Cheer::get_cheered_num(1, 1);
                $datas['prev']['users_cheered'] = Cheer::get_cheered_num(1);
                $datas['prev']['users_cheering'] = Cheer::get_cheered_num(1);

                Cheer::set_cheered_num(1, 1, $datas['prev']['goal_cheered']+1);
                Cheer::set_cheered_num(1, 1, $datas['prev']['container_cheered']+1);
                Cheer::set_cheered_num(1, $datas['prev']['users_cheered']+1);
                Cheer::set_cheered_num(1, $datas['prev']['users_cheering']+1);

                $datas['next']['goal_cheered'] = Cheer::get_cheered_num(1, 1);
                $datas['next']['container_cheered'] = Cheer::get_cheered_num(1, 1);
                $datas['next']['users_cheered'] = Cheer::get_cheered_num(1);
                $datas['next']['users_cheering'] = Cheer::get_cheered_num(1);

		return Response::forge(View::forge('sukima/testframe', $datas));
        }


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
