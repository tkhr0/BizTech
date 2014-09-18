<?php
use \Model\Cheer;
/**
 * The Welcome Controller.
 *
 * A basic controller example.  Has examples of how to set the
 * response body and status.
 *
 * @package  app
 * @extends  Controller
 */
class Controller_Dammy   extends Controller
{
	/**
	 * The basic welcome message
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_index()
	{
		return "test";
	}
	
	public function action_cheering($target_id, $type_id){
                //$cheered_num = Cheer::get_cheered_num($target_id, $type_id);
                $cheered_num = Cheer::get_cheered_num($target_id, $type_id);
                if($cheered_num === null){
                  return -1;
                }
                Cheer::set_cheered_num($target_id, $type_id, $cheered_num+1);
                return Cheer::get_cheered_num($target_id, $type_id);
	}
	
  public function action_get_cheered($target_id, $type_id){
      return Cheer::get_cheered_num($target_id, $type_id);
  }
}