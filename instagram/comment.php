<?php
ob_start();
session_start();
error_reporting(0);
date_default_timezone_set('Europe/Istanbul');
include 'admin/connection.php';
include 'admin/function.php';
require_once 'header.php';
?>

<?php

if (isset($_REQUEST["comment_post_id"])) {
    // create prepared statement

    $sql = $db->prepare("SELECT * FROM comment where comment_post_id=:comment_post_id order by comment_time DESC");
    $sql->execute(array(
        'comment_post_id' =>  strip_tags($_REQUEST['comment_post_id'])
    ));
    $stmt = $sql->rowCount();
    // execute the prepared statement
?>

    <?php if ($stmt > 0) {

        while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
            $check_comment_user = $db->prepare("SELECT * FROM users where user_nickname_seo=:user_nickname_seo");
            $check_comment_user->execute(array(
                'user_nickname_seo' => strip_tags($row['comment_user_nickname'])
            ));
            $checked_comment_user = $check_comment_user->fetch(PDO::FETCH_ASSOC);
    ?>
            <div class="col-1 me-2">
                <a href="p/<?php echo $checked_comment_user['user_nickname_seo']  ?>">

                    <img src="<?php echo $checked_comment_user['user_avatar'] ?>" class="img-fluid img-cover rounded-circle post-pp" width="32" height="32" alt="" srcset="">
                </a>
            </div>
            <div class="col-10 ms-1 mb-3">
                <a class="user_url" href="p/<?php echo $checked_comment_user['user_nickname_seo']  ?>">

                    <div class="fw-bold fs-14"><?php echo $checked_comment_user['user_nickname_seo'] ?></div>
                </a>
                <span class="fw-normal"><?php echo $row['comment_desc'] ?></span>
                <div class="d-flex">
                    <div class="text-muted fs-12 me-3">
                        <?php echo convertMonthToTurkishCharacter(date("d F Y &#183; H:i", strtotime($row['comment_time']))); ?>

                    </div>
                    <div class="text-muted fs-12 me-3">390 beğenme</div>
                    <div class="text-muted fs-12 me-3">Yanıtla</div>
                    <div class="text-muted fs-15">

                        <div class="dropdown">
                            <i class="fas fa-ellipsis-h pointer" id="dropdownMenuButton" data-mdb-toggle="dropdown" aria-expanded="false"></i>

                            <ul class="dropdown-menu text-center" aria-labelledby="dropdownMenuButton">
                                <li><a class="dropdown-item text-danger" href="#">Şikayet Et</a></li>
                                <?php if ($_SESSION['user_nickname_seo'] == $checked_comment_user['user_nickname_seo'] || $_SESSION['user_nickname_seo'] == $get_user_profile['user_nickname_seo']) { ?>
                                    <li class="deleteComment pointer" data-post-id="<?php echo $_REQUEST['comment_post_id'] ?>" comment-id="<?php echo $row['comment_id'] ?>"><a class=" dropdown-item text-danger">Sil</a></li>
                                <?php } ?>
                                <li><a class="dropdown-item pointer">İptal</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>


        <?php } ?>

    <?php } ?>

<?php } ?>