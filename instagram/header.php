<?php

if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {

    header("location:404");
    exit;
}
ob_start();
session_start();
//error_reporting(0);
date_default_timezone_set('Europe/Istanbul');

require_once 'admin/connection.php';
require_once 'admin/function.php';
$check_user = $db->prepare("SELECT * FROM users where user_id=:user_id");
$check_user->execute(array(
    'user_id' => intval($_SESSION['user_id'])
));

$get_user = $check_user->fetch(PDO::FETCH_ASSOC);





$user_profile = $db->prepare("SELECT * FROM users where user_nickname_seo=:user_nickname_seo");
$user_profile->execute(array(
    'user_nickname_seo' => strip_tags($_GET['user_nickname_seo'])
));

$get_user_profile = $user_profile->fetch(PDO::FETCH_ASSOC);


?>

<?php
function convertMonthToTurkishCharacter($date)
{
    $aylar = array(
        'January'    =>    'Ocak',
        'February'    =>    'Şubat',
        'March'        =>    'Mart',
        'April'        =>    'Nisan',
        'May'        =>    'Mayıs',
        'June'        =>    'Haziran',
        'July'        =>    'Temmuz',
        'August'    =>    'Ağustos',
        'September'    =>    'Eylül',
        'October'    =>    'Ekim',
        'November'    =>    'Kasım',
        'December'    =>    'Aralık',

        'Monday'    =>    'Pazartesi',
        'Tuesday'    =>    'Salı',
        'Wednesday'    =>    'Çarşamba',
        'Thursday'    =>    'Perşembe',
        'Friday'    =>    'Cuma',
        'Saturday'    =>    'Cumartesi',
        'Sunday'    =>    'Pazar',
        'Second' => 'Saniye',

        // Günler //
        'Sunday' => 'Pazar',
        'Saturday' => 'Cumartesi',
        'Friday' => 'Cuma',
        'Thursday' => 'Perşembe',
        'Wednesday' => 'Çarşamba',
        'Tuesday' => 'Salı',
        'Monday' => 'Pazartesi',

        'Sun' => 'Pazar',
        'Sat' => 'Cumartesi',
        'Fri' => 'Cuma',
        'Thu' => 'Perşembe',
        'Wed' => 'Çarşamba',
        'Tue' => 'Salı',
        'Mon' => 'Pazartesi',
        // Günler //


        'Sec' => 'Saniye'

    );
    return  strtr($date, $aylar);
}
$ask_verified = $db->prepare("SELECT * FROM users where user_nickname_seo=:user_nickname_seo and user_verified_state=:user_verified_state");
$ask_verified->execute(array(
    'user_nickname_seo' => strip_tags($get_user_profile['user_nickname_seo']),
    'user_verified_state' => intval(1)
));

$get_verified = $ask_verified->fetch(PDO::FETCH_ASSOC);
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title id="title">Instagram</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <base href="http://localhost/instagram/">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="anasayfa.css">
    <link rel="icon" href="images/dimg/logo.png" type="image/x-icon" />

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

</head>