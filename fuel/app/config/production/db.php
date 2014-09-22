<?php
/**
 * The development database settings. These get merged with the global settings.
 */

return array(
  'default' => array(
		     'type' => 'mysqli',
    'connection'  => array(
    /*
      'dsn'        => 'mysql:host=54.95.44.142;dbname=sukima',
      'username'   => 'root',
      'password'   => 'mori2iv',
      */
			'hostname'   => '54.95.44.142',
			'database'   => 'sukima',
			'username'   => 'root',
			'password'   => 'mori2iv',
			'persistent' => false,
      ),
    ),
  );
