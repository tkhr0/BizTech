<?php
return array(
	'_root_'  => 'welcome/index',  // The default route
	'_404_'   => 'sukima/404.html',    // The main 404 route
	
	'hello(/:name)?' => array('welcome/hello', 'name' => 'hello'),
);