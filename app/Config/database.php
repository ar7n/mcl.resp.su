<?php
class DATABASE_CONFIG {

	public $default = array(
		'datasource' => 'Database/Mysql',
		'persistent' => true,
		'host' => '127.0.0.1',
		'login' => 'root',
		'password' => '123456',
		'database' => 'resp',
		'encoding' => 'utf8'
	);

	public $test = array(
		'datasource' => 'Database/Mysql',
		'persistent' => false,
		'host' => 'localhost',
		'login' => 'user',
		'password' => 'password',
		'database' => 'test_database_name',
	);

}
