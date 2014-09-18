<?php
class Controller_Sukima extends Controller
{
        public function action_index()
        {


        }

        public function action_mypage()
        {

        }

        public function action_timeline()
        {
          Asset::add_path('assets/css/', 'css');
          return Response::forge(View::forge('sukima/timeline'));
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
