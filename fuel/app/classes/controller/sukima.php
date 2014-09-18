<?php

class Controller_Sukima extends Controller
{

        public function action_test()
        {
                Model_Containers::insert(2);
                Model_Containers::incriment_cheered(1);

                $data = array(
                        'datas' => array(
                                'goal_id' => Model_Containers::get_goal_id(1),
                                'cheered' => Model_Containers::get_cheered(1),
                                'status' => Model_Containers::get_status(1),
                        )
                );

                return Response::forge(View::forge('sukima/testframe', $data));

        }

        public function action_index()
        {
                // クッキーに仮のユーザIDを登録する
                // ここにアクセスするたびにIDが順に1~3にかわる
                $user_id = Cookie::get('user_id', null);
                if($user_id == null){
                        $user_id = 1;
                }else{
                        $user_id = floor($user_id) % 3 + 1;
                }
                Cookie::set('user_id', $user_id);

                $datas = array();
                $datas['data'] = Model_Mypage::action_select($user_id);
                $datas['id'] = $user_id;

                return Response::forge(View_Smarty::forge('sukima/index', $datas));
        }

        public function action_mypage()
        {
                // cheerボタンのリダイレクト用
                Cookie::set('from_uri', 'sukima/mypage');

        }

        /*
                タイムラインの動作
        */
        public function action_timeline()
        {
            //Asset::add_path('assets/css/', 'css');
            //Asset::add_path('assets/js/', 'js');
            //Asset::add_path('assets/img/', 'img');
                $datas = array(
                        'user_id' => $user_id,
                        'user_cheering_num' => Cheer::get_users_cheering_num($user_id),
                );

                return Response::forge(View_Smarty::forge('sukima/timeline', $datas));
        }

        public function post_new()
        {

        }

        public function post_hackstart()
        {

        }

        public function post_hackend()
        {

        }

        public function post_achieve()
        {

        }

        public function post_follower()
        {

        }

        public function action_cheer($target_id, $type_id)
        {
                $cheered_num = Cheer::get_cheered_num($target_id, $type_id);

                if($cheered_num === null){
                  return -1;
                }
                Cheer::set_cheered_num($target_id, $type_id, $cheered_num+1);
                return Cheer::get_cheered_num($target_id, $type_id);
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
