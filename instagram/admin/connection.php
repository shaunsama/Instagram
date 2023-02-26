<?php 
error_reporting(E_ALL);

try {



	$db=new PDO("mysql:host=localhost;dbname=instagram;charset=utf8",'root','');

	//echo "veritabanı bağlantısı başarılı";

}

catch (PDOException $e) {

	echo $e->getMessage();

}
