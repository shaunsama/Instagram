<?php
ob_start();
session_start();
error_reporting(0);
date_default_timezone_set('Europe/Istanbul');
include 'admin/connection.php';
include 'admin/function.php';

?>
<?php


if (isset($_REQUEST["like_post_id"])) {
    // create prepared statement
    
    $sql = $db->prepare("SELECT * FROM like_post where like_post_id=:like_post_id");
    $sql->execute(array(
        'like_post_id' =>  intval($_REQUEST['like_post_id'])
    ));
    $stmt = $sql->rowCount();
    // execute the prepared statement
?>

    <?php if ($stmt > 0) {

        while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
            $check_follower_user = $db->prepare("SELECT * FROM users where user_nickname_seo=:user_nickname_seo");
            $check_follower_user->execute(array(
                'user_nickname_seo' => strip_tags($row['like_user_nickname'])
            ));
            $checked_follower_user = $check_follower_user->fetch(PDO::FETCH_ASSOC);
    ?>

            <div class="d-flex justify-content-between mb-2" id="<?php echo $checked_follower_user['user_nickname_seo'] ?>">


                <a class="text-dark" href=p/<?php echo $checked_follower_user['user_nickname_seo'] ?>>
                    <div class="d-flex align-items-center align-items-center">
                        <div class="overflow-circle rounded-circle">
                            <img style="width:50px!important;height:50px!important;object-fit:cover!important;" class="img-fluid rounded-circle" src="<?php echo $checked_follower_user['user_avatar'] ?>" alt="">
                        </div>
                        <div class="ms-3">
                            <div class="fs-14 fw-bold"><?php echo $checked_follower_user['user_nickname_seo'] ?></div>
                            <div class="text-capitalize fs-14 text-muted"> <?php echo $checked_follower_user['user_fullname'] ?></div>
                        </div>
                    </div>
                </a>


            </div>
        <?php } ?>

    <?php } else { ?>
        <div class="row align-items-center justify-content-center h-100 modal-height">
            <div class="col-12 text-center ">
                <img src="images/dimg/nodata.svg" class="img-fluid img-cover mb-4" width="200"  alt="" srcset="">
                <div>Gönderiyi beğenen herkesi burada göreceksin..</div>
            </div>
        </div>
    <?php } ?>
<?php } ?>