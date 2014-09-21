<?php
/**
 * The Welcome Controller.
 *
 * A basic controller example.  Has examples of how to set the
 * response body and status.
 *
 * @package  app
 * @extends  Controller
 */
class Controller_Test extends Controller
{
	/**
	 * The basic welcome message
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_index()
	{
		$data['test'] = Model_Follows::remove_follow(3, 1);
		//$data['test'] = File::get_url(DOCROOT."js/assets/timeline.js");
		return Response::forge(View::forge('imamori', $data));
	}
}
