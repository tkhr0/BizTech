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
		$data['test'] = Model_Users::set_profile("12", "test", "thumhoge", "discription");
		//$data['test'] = File::get_url(DOCROOT."js/assets/timeline.js");
		return Response::forge(View::forge('imamori', $data));
	}
}
