<?php
ob_start();
session_start();
error_reporting(0);
date_default_timezone_set('Europe/Istanbul');
include 'admin/connection.php';
include 'admin/function.php';
?>
<style>
    .overflow-auto,
    .overflow-list {
        overflow-y: scroll !important;

    }
</style>
<div class="row overflow-auto">

    <?php
    if (isset($_REQUEST["term"])) {
        // create prepared statement
        $sql = "SELECT * from users where user_nickname_seo LIKE :term or user_fullname LIKE :term";
        $stmt = $db->prepare($sql);
        $term = '%' . $_REQUEST['term'] . '%';
        // bind parameters to statement
        $stmt->bindParam(":term", $term);
        // execute the prepared statement
        $stmt->execute(); ?>
        <div class="col-lg-12 col-md-6 col-sm-12 col-12 pb-3">

            <?php if ($stmt->rowCount() > 0) {

                while ($row = $stmt->fetch()) {  ?>

                    <a class="text-decoration-none bg-transparent " href="p/<?php echo seo($row["user_nickname_seo"]) ?>">
                        <div class="row mb-3 g-0 search-user rounded-pill p-2">
                            <div class="col-lg-2 ">
                                <div class="bg-image rounded-circle search-user-pp">
                                    <img src="<?php echo $row['user_avatar'] ?>" class="img-fluid img-cover search-user-pp rounded-circle" alt="" srcset="">
                                </div>
                            </div>
                            <div class="col-lg-10">
                                <div class="fs-14 fw-bold"><?php echo $row['user_nickname_seo'] ?></div>
                                <div class="fs-14"><?php echo $row['user_fullname'] ?></div>
                            </div>
                        </div>

                    </a>
                <?php } ?>

            <?php } else { ?>

                <span>Bu isimde bir kullanıcı bulunamadı.</span>


            <?php } ?>
        </div>


    <?php } ?>
</div>