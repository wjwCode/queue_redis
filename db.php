<?php


//使用vendor中的数据库框架medoo
class db extends \PDO
{
	public function __construct(){
		$DSN = 'mysql:host=localhost;charset=utf8;port=3306;dbname=test';
		$username = 'root';
		$password = '123456';
		try {
			parent::__construct($DSN,$username,$password); 
		} catch (\PDOException $e) {
			p($e->getMessage()); 
		}
	}
}