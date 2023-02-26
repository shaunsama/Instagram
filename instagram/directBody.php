<?php
ob_start();
session_start();
error_reporting(0);
date_default_timezone_set('Europe/Istanbul');
include 'admin/connection.php';
include 'admin/function.php';

?>
<?php

if (isset($_REQUEST["message_receiver_nickname"])) {
    // create prepared statement

    $sql = $db->prepare("SELECT * FROM messages where message_sender_nickname=:message_sender_nickname and message_receiver_nickname=:message_receiver_nickname or message_sender_nickname=:sender and message_receiver_nickname=:receiver");
    $sql->execute(array(
        'message_sender_nickname' =>  strip_tags($_SESSION['user_nickname_seo']),
        'message_receiver_nickname' => strip_tags($_REQUEST['message_receiver_nickname']),
        'receiver' => strip_tags($_SESSION['user_nickname_seo']),
        'sender' => strip_tags($_REQUEST['message_receiver_nickname'])
    ));
    $stmt = $sql->rowCount();
    // execute the prepared statement
?>
    <div class="m-body">
        <?php if ($stmt > -1) {

            while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
                $check_follower_user = $db->prepare("SELECT * FROM users where user_nickname_seo=:user_nickname_seo");
                $check_follower_user->execute(array(
                    'user_nickname_seo' => strip_tags($row['message_receiver_nickname'])
                ));
                $checked_follower_user = $check_follower_user->fetch(PDO::FETCH_ASSOC);
        ?>


                <div class="px-2 mt-1 align-self-end">
                    <?php if ($row['message_sender_nickname'] == $_SESSION['user_nickname_seo']) { ?>
                        <?php if (!empty($row['message_desc'])) { ?>

                            <div class="d-flex justify-content-end">

                                <div class="align-self-end text-end  message-bg d-inline justify-content-end d-flex p-3 fs-14 rounded-pill mb-3"><?php echo $row['message_desc'] ?></div>
                            </div>
                        <?php } ?>

                    <?php } else { ?>
                        <?php if (!empty($row['message_desc'])) { ?>
                            <div class="d-flex">
                                <div class=" message-bg d-inline-flex p-3 rounded-pill d-inline-flex mb-3 fs-14"><?php echo $row['message_desc'] ?></div>
                            </div>
                        <?php } ?>

                    <?php } ?>
                </div>

            <?php } ?>
    </div>

<?php }  ?>


<?php } ?>