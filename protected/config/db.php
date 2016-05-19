<?php

// This is the database connection configuration.
return array(
	// 'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
	// uncomment the following lines to use a MySQL database
	'class'=>'CDbConnection',
	'connectionString' => 'mysql:host=192.168.8.67;dbname=employee',
	'emulatePrepare' => true,
	'username' => 'root',
	'password' => 'vonechina',
	'charset' => 'utf8',
);