<?php 
session_start();
ob_start();
require_once 'admin/connection.php';
$zamanguncelle=$db->prepare("UPDATE users SET

	user_last_time=:user_last_time

	WHERE user_id=:user_id");


$update=$zamanguncelle->execute(array(
    'user_id' => intval($_SESSION['user_id']),
	'user_last_time' => 0

));

$user_last_time = $_SESSION['user_last_time'];

session_destroy();
header("Location:login");
exit;
