<?php 
	class CONNECTION {
		private $user = 'root';
		private $password = '';
		private $db_name = 'trabalho-final-pi1-2018/2';
		private $host = 'localhost';

		public static $instance;

		private function __construct() {

		}

		public static function getInstance() {
			if (!isset(self::$instance)) {
				self::$instance = new PDO('mysql:host=localhost;dbname=trabalho-final-pi1-2018/2', 'root', '',
					array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
				self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				self::$instance->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);
			}

			return self::$instance;
		}
	}

 ?>