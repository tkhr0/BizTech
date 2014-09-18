<?php
namespace Model;

class Testmodel extends \Model {
	public static function get_results()
	{
		$results = \DB::query('SELECT * FROM test')->execute();
		return $results->as_array();
	}
}
