<?php

class Controller_Sukima extends Controller
{

        public function action_index()
        {
                // クッキーに仮のユーザIDを登録する
                // ここにアクセスするたびにIDが順に1~3にかわる
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
                // cheerボタンのリダイレクト用
                Cookie::set('from_uri', 'sukima/mypage');

        }

        /*
                タイムラインの動作
        */
        public function action_timeline()
        {
            // iranai ?
            //Asset::add_path('assets/css/', 'css');
            //Asset::add_path('assets/js/', 'js');

            $user_id = Cookie::get('user_id');


                $datas = array(
                        'user_id' => $user_id,
                        'user_cheering_num' => Cheer::get_users_cheering_num($user_id),
                );
                // cheerボタンのリダイレクト用
                Cookie::set('from_uri', 'sukima/timeline');

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

        public function post_cheer()
        {
                $redirect = Cookie::get('from_uri');
                $user_id = Cookie::get('user_id');
                $container_id = Input::post('container_id');
                $cheered_num = Cheer::get_cheered_num($container_id, TYPE_CONTAINER);

                if($cheered_num === null){
                        Response::redirect($redirect);
                }else{
                        Cheer::set_cheered_num($container_id, TYPE_CONTAINER, $cheered_num+1);
                        $user_cheered_num = Cheer::get_users_cheering_num($user_id);
                        Cheer::set_users_cheering_num($user_id, $user_cheered_num+1);
                        Cookie::delete('from_uri');
                        Response::redirect($redirect);
                }
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
