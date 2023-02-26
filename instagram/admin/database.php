<?php
ob_start();
session_start();
error_reporting(0);
date_default_timezone_set('Europe/Istanbul');
include 'connection.php';
include 'function.php';


/* REGISTRATION START */
if (isset($_POST['registration_button'])) {

    $user_mail = strip_tags($_POST['user_mail']);
    $user_nickname_seo = strip_tags(seo($_POST['user_nickname']));
    $user_password = htmlspecialchars(trim($_POST['user_password']));
    $user_fullname = strip_tags($_POST['user_fullname']);

    $password = sha1(md5(htmlspecialchars($user_password)));


    $user_check = $db->prepare("SELECT * FROM users where user_nickname_seo=:user_nickname_seo");
    $user_check->execute(array(
        'user_nickname_seo' => $user_nickname_seo
    ));

    if ($user_check->rowCount() >= 1) {
        header("Location:../register?d=kvar");
        exit;
    }

    $user_mail_check = $db->prepare("SELECT * FROM users where user_mail=:user_mail");
    $user_mail_check->execute(array(
        'user_mail' => $user_mail
    ));
    if (!empty($user_mail) && !empty($user_nickname_seo) && !empty($user_password) && !empty($user_fullname)) {
        if ($user_mail_check->rowCount() >= 1) {
            header("Location:../register?d=mvar");
            exit;
        } else {
            $user_registrate = $db->prepare("INSERT INTO users set
        user_mail=:user_mail,
        user_nickname_seo=:user_nickname_seo,
        user_password=:user_password,
        user_fullname=:user_fullname
    ");

            $user_registrated = $user_registrate->execute(array(
                'user_mail' => $user_mail,
                'user_nickname_seo' => $user_nickname_seo,
                'user_password' => $password,
                'user_fullname' => $user_fullname
            ));

            if ($user_registrated) {
                header("Location:../login");
                exit;
            }
        }
    } else {
        header("Location:../register?d=input");
        exit;
    }
}
/* REGISTRATION END */

/* LOGIN START */
if (isset($_POST['login_button'])) {

    $user_nickname_seo = strip_tags($_POST['user_nickname_seo']);
    $user_password = htmlspecialchars(trim($_POST['user_password']));

    $password = sha1(md5(htmlspecialchars($user_password)));




    $user_login_check = $db->prepare("SELECT * from users where user_nickname_seo=:user_nickname_seo and user_password=:user_password");
    $user_login_check->execute(array(
        'user_nickname_seo' => $user_nickname_seo,
        'user_password' => $password
    ));


    $user_login_checked = $user_login_check->fetch(PDO::FETCH_ASSOC);

    $count = $user_login_check->rowCount();

    if ($count == 1) {
        $user_ip = $_SERVER['REMOTE_ADDR'];

        $zamanguncelle = $db->prepare("UPDATE users SET


			user_last_time=:user_last_time,
			user_ip=:user_ip

			WHERE user_nickname_seo=:user_nickname_seo");


        $update = $zamanguncelle->execute(array(

            'user_nickname_seo' => $user_nickname_seo,
            'user_last_time' => date("Y-m-d H:i:s"),
            'user_ip' => $user_ip

        ));

        $_SESSION['user_nickname_seo'] = seo($user_nickname_seo);

        $_SESSION['user_id'] = $user_login_checked['user_id'];
        $_SESSION['user_mail'] = $user_login_checked['user_mail'];
        header("Location:../anasayfa?l=success");
        exit;
    } else {
        header("Location:../login");
    }
}
/* LOGIN END */
/* CREATE POST START */ 
if (isset($_POST['create_post'])) {

    $izinli_uzantilar = array('jpg', 'png', 'mp4');
    $ext = strtolower(substr($_FILES['post_image']['name'], strpos($_FILES['post_image']['name'], '.') + 1));

    @$tmp_name = $_FILES['post_image']['tmp_name'];
    @$name = $_FILES['post_image']['name'];


    $uploads_dir = "../images/post";

    $uniq = uniqid();
    $resimgyol = substr($uploads_dir, 3) . "/" . $uniq . "." . $ext;

    @move_uploaded_file($tmp_name, "$uploads_dir/$uniq.$ext");
    if (strlen($ext)) {

        $send_post = $db->prepare("INSERT INTO post set

    post_user_id=:post_user_id,
    post_description=:post_description,
    post_user_nickname_seo=:post_user_nickname_seo,
    post_image=:post_image,
    post_time=:post_time
    ");
        $post_sent = $send_post->execute(array(
            'post_user_id' => intval($_SESSION['user_id']),
            'post_user_nickname_seo' => strip_tags($_SESSION['user_nickname_seo']),
            'post_description' => $_POST['post_description'],
            'post_image' => $resimgyol,
            'post_time' => date("Y-m-d H:i:s")
        ));
    } else {
        Header("Location:../p/{$_SESSION['user_nickname_seo']}");
        exit;
    }


    if ($post_sent) {
        Header("Location:../p/{$_SESSION['user_nickname_seo']}");
        exit;
    } else {
        Header("Location:../p/{$_SESSION['user_nickname_seo']}");
        exit;
    }
    
}
/* CREATE POST END */
/* FOLLOW START */
if (isset($_POST['follow_user'])) {
    $user_nickname_seo = strip_tags($_POST['user_nickname_seo']);

    $follow = $db->prepare("INSERT into follow set followed_nickname=:followed_nickname,following_nickname=:following_nickname");
    $followed = $follow->execute(array(
        'followed_nickname' => strip_tags($_SESSION['user_nickname_seo']),
        'following_nickname' => $user_nickname_seo
    ));
}

if (isset($_POST['unfollow_user'])) {
    $user_nickname_seo = strip_tags($_POST['user_nickname_seo']);


    $unfollow = $db->prepare("DELETE from follow WHERE
		followed_nickname=:followed_nickname and
		following_nickname=:following_nickname");
    $unfollowed = $unfollow->execute(array(
        'followed_nickname' => strip_tags($_SESSION['user_nickname_seo']),
        'following_nickname' => $user_nickname_seo

    ));
}
/* FOLLOW END */
/* USER AVATAR CHANGE START */
if ($_FILES["file"]["name"] != '') {
    $izinli_uzantilar = array('jpg', 'png', 'gif');
    $ext = strtolower(substr($_FILES['file']['name'], strpos($_FILES['file']['name'], '.') + 1));

    @$tmp_name = $_FILES['file']['tmp_name'];
    @$name = $_FILES['file']['name'];


    $uploads_dir = "../images/avatar";

    $uniq = uniqid();
    $resimgyol = substr($uploads_dir, 3) . "/" . $uniq . "." . $ext;

    @move_uploaded_file($tmp_name, "$uploads_dir/$uniq.$ext");


    $check_user = $db->prepare("SELECT * FROM users where user_nickname_seo=:user_nickname_seo");
    $check_user->execute(array(
        'user_nickname_seo' => strip_tags($_SESSION['user_nickname_seo'])
    ));

    $checked_user = $check_user->fetch(PDO::FETCH_ASSOC);

    $old_way = $checked_user['user_avatar'];
    if ($old_way != "images/dimg/user.jpg") {
        @unlink("../" . $old_way);
    }


    $change_photo = $db->prepare("UPDATE users SET user_avatar=:user_avatar WHERE user_nickname_seo=:user_nickname_seo");

    $change_photo->execute(array(
        'user_avatar' => $resimgyol,
        'user_nickname_seo' => strip_tags($_SESSION['user_nickname_seo'])
    ));
}
/* USER AVATAR CHANGE END */

/* LIKE POST START */
if (isset($_POST['like_post_check'])) {
    $like_post_id = intval($_POST['like_post_id']);
    $like_user_nickname = strip_tags($_SESSION['user_nickname_seo']);



    $add_like_post = $db->prepare("INSERT INTO like_post set
    like_post_id=:like_post_id,
    like_user_nickname=:like_user_nickname
    ");

    $add_like_post->execute(array(
        'like_post_id' => $like_post_id,
        'like_user_nickname' => $like_user_nickname
    ));
}

if (isset($_POST['disslike_post_check'])) {
    $disslike_post_id = intval($_POST['like_post_id']);
    $disslike_user_nickname = strip_tags($_SESSION['user_nickname_seo']);

    $check_disslike = $db->prepare("DELETE FROM like_post where
    like_post_id=:like_post_id and
    like_user_nickname=:like_user_nickname
    ");
    $check_disslike->execute(array(
        'like_post_id' => $disslike_post_id,
        'like_user_nickname' => $disslike_user_nickname
    ));
}
/* LIKE POST END */

/* COMMENT START */
if (isset($_POST["comment_desc"])) {
    $comment_desc = strip_tags($_POST['comment_desc']);
    $comment_post_id = intval($_POST['comment_post_id']);
    $comment_user_nickname = strip_tags($_SESSION['user_nickname_seo']);

    $add_comment = $db->prepare("INSERT INTO comment set
        comment_desc=:comment_desc,
        comment_post_id=:comment_post_id,
        comment_user_nickname=:comment_user_nickname
    ");
    $add_comment->execute(array(
        'comment_desc' => $comment_desc,
        'comment_post_id' => $comment_post_id,
        'comment_user_nickname' => $comment_user_nickname
    ));
}

if (isset($_POST['delete_comment'])) {
    $comment_post_id = intval($_POST['comment_post_id']);
    $comment_id = intval($_POST['comment_id']);

    $ask_delete_comment = $db->prepare("DELETE from comment where comment_post_id=:comment_post_id and comment_id=:comment_id");
    $ask_delete_comment->execute(array(
        'comment_post_id' => $comment_post_id,
        'comment_id' => $comment_id
    ));
}
/* COMMENT END */

/* SAVED POST START */
if (isset($_POST['bookmark_post_id'])) {
    $bookmark_post_id = intval($_POST['bookmark_post_id']);
    $bookmark_user_nickname = strip_tags($_SESSION['user_nickname_seo']);

    $add_bookmark = $db->prepare("INSERT INTO bookmark set
     bookmark_post_id=:bookmark_post_id,
     bookmark_user_nickname=:bookmark_user_nickname
     ");
    $add_bookmark->execute(array(
        'bookmark_post_id' => $bookmark_post_id,
        'bookmark_user_nickname' => $bookmark_user_nickname
    ));
}

if (isset($_POST['bookmark_post_id_2'])) {
    $bookmark_post_id = intval($_POST['bookmark_post_id_2']);

    $ask_delete_comment = $db->prepare("DELETE from bookmark where bookmark_post_id=:bookmark_post_id");
    $ask_delete_comment->execute(array(
        'bookmark_post_id' => $bookmark_post_id,
    ));
}
/* SAVED POST END */

/* EDIT PROFILE SETTINGS START*/
if (isset($_POST['user_data_save'])) {
    $user_fullname = strip_tags($_POST['user_fullname']);
    //$user_nickname_seo = strip_tags($_POST['user_nickname_seo']);
    $user_bio = strip_tags($_POST['user_bio']);
    $user_mail = strip_tags($_POST['user_mail']);
    $user_gsm = strip_tags($_POST['user_gsm']);
    $user_id = intval($_SESSION['user_id']);


   /* $user_check = $db->prepare("SELECT * FROM users where user_nickname_seo=:user_nickname_seo");
    $user_check->execute(array(
        'user_nickname_seo' => $user_nickname_seo
    ));
    if ($user_nickname_seo != $_SESSION['user_nickname_seo']) {
        if ($user_check->rowCount() >= 1) {
            header("Location:../ayarlar");
            exit;
        }
    }*/


    $user_mail_check = $db->prepare("SELECT * FROM users where user_mail=:user_mail");
    $user_mail_check->execute(array(
        'user_mail' => $user_mail
    ));
    $user_count = $user_mail_check->rowCount();

    if ($user_mail != $_SESSION['user_mail']) {
        if ($user_check->rowCount() >= 1) {
            header("Location:../ayarlar");
            exit;
        }
    }
    $edit_user = $db->prepare("UPDATE users set
            user_fullname=:user_fullname,
            user_bio=:user_bio,
            user_mail=:user_mail,
            user_gsm=:user_gsm where user_id=:user_id
            ");

    $edit_user->execute(array(
        'user_fullname' => $user_fullname,
        'user_bio' => $user_bio,
        'user_mail' => $user_mail,
        'user_gsm' => $user_gsm,
        'user_id' => $user_id
    ));
    if ($edit_user) {
        header("Location:../ayarlar");
    } else {
        header("Location:../ayarlar");
    }
}

if (isset($_POST['change_password'])) {
    $user_password = htmlspecialchars(trim($_POST['user_password']));

    $password = sha1(md5(htmlspecialchars($user_password)));

    $user_new_password = htmlspecialchars(trim($_POST['user_new_password']));
    $user_new_password2 = htmlspecialchars(trim($_POST['user_new_password2']));

    $newpassword1 = sha1(md5(htmlspecialchars($user_new_password)));
    $newpassword2 = sha1(md5(htmlspecialchars($user_new_password2)));

    $user_nickname_seo = strip_tags($_SESSION['user_nickname_seo']);

    $ask_password = $db->prepare("SELECT * FROM users where user_password=:user_password and user_nickname_seo=:user_nickname_seo");
    $ask_password->execute(array(
        'user_password' => $password,
        'user_nickname_seo' => $user_nickname_seo
    ));

    $ask_password_count = $ask_password->rowCount();

    if ($ask_password_count == 1) {
        if ($newpassword1 == $newpassword2) {
            $change_password = $db->prepare("UPDATE users set user_password=:user_password where user_nickname_seo=:user_nickname_seo");
            $change_password->execute(array(
                'user_password' => $newpassword2,
                'user_nickname_seo' => $user_nickname_seo
            ));

            if ($change_password) {
                header("Location: ../ayarlar/sifredegistir");
                exit;
            } else {
                header("Location: ../ayarlar/sifredegistir");
                exit;
            }
        } else {
            header("Location: ../ayarlar/sifredegistir");
            exit;
        }
    } else {
        header("Location: ../ayarlar/sifredegistir");
        exit;
    }
}
/* EDIT PROFILE SETTINGS END */

/* DELETE POST START */
if (isset($_POST['data_post_id'])) {
    $post_id = intval($_POST['data_post_id']);

    $delete_post_comment = $db->prepare("DELETE from comment where comment_post_id=:comment_post_id");
    $delete_post_comment->execute(array(
        'comment_post_id' => $post_id
    ));

    $delete_post_like = $db->prepare("DELETE from like_post where like_post_id=:like_post_id");
    $delete_post_like->execute(array(
        'like_post_id' => $post_id
    ));

    $delete_post_bookmark = $db->prepare("DELETE FROM bookmark where bookmark_post_id=:bookmark_post_id");
    $delete_post_bookmark->execute(array(
        'bookmark_post_id' => $post_id
    ));

    $delete_post = $db->prepare("DELETE from post where post_id=:post_id");
    $delete_post->execute(array(
        'post_id' => $post_id
    ));
}
/* DELETE POST END */

/* SEND MESSAGE START */

if(isset($_POST['message_receiver_nickname'])){
    $message_receiver_nickname = strip_tags($_POST['message_receiver_nickname']);

    $add_message = $db->prepare("INSERT INTO messages set
    message_sender_nickname=:message_sender_nickname,
    message_receiver_nickname=:message_receiver_nickname
    ");
    $add_message->execute(array(
        'message_sender_nickname' => strip_tags($_SESSION['user_nickname_seo']),
        'message_receiver_nickname' => $message_receiver_nickname
    ));
}



if(isset($_POST['message_desc'])){
    $message_receiver_nickname = strip_tags($_POST['receiver_nickname']);
    $message_sender_nickname = strip_tags($_SESSION['user_nickname_seo']);
    $message_desc = strip_tags($_POST['message_desc']);


    $add_message = $db->prepare("INSERT INTO messages set
    message_sender_nickname=:message_sender_nickname,
    message_receiver_nickname=:message_receiver_nickname,
    message_desc=:message_desc
    ");
    $add_message->execute(array(
        'message_sender_nickname' => $message_sender_nickname,
        'message_receiver_nickname' => $message_receiver_nickname,
        'message_desc' => $message_desc
    ));

}
/* SEND MESSAGE END */