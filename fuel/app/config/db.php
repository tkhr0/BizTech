<?php
/**
 * Use this file to override global defaults.
 *
 * See the individual environment DB configs for specific config information.
 */

return array(
	'active' => 'default',
	/**
	 * Base config, just need to set the DSN, username and password in env. config.
	 */
	'default' => array(
		'type'        => 'mysqli',
		'connection'  => array(
			'hostname'   => '54.95.44.142',
			'database'   => 'sukima',
			'username'   => 'root',
			'password'   => 'mori2iv',
			'persistent' => false,
		),
		'identifier'   => '`',
		'table_prefix' => '',
		'charset'      => 'utf8mb4',
		'enable_cache' => true,
		'profiling'    => false,
	),

	'redis' => array(
		'default' => array(
			'hostname'  => '127.0.0.1',
			'port'      => 6379,
		)
	),

	'testdb' => array(
		'type'   => 'mysqli',
		'connection' => array(
			'hostname'   => 'localhost',
			'database'   => 'sukima',
			'username'   => 'sukima',
			'password'   => 'sukima',
			'persistent' => false,
		),
		'table_prefix' => '',
		'charset'      => 'utf8mb4',
		'caching'      => false,
		'profiling'    => true,
	),
);

