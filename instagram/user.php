<?php require_once 'header.php'; ?>

<body class="custom-bg">
    <div class="container-fluid px-0 ">
        <div class="row g-0">
            <div class="col-xl-3 me-5 col-lg-1">

                <?php require_once 'sidenav.php'; ?>
            </div>
            <div class="col-xl-8 col-lg-11 mt-4 ms-5 ps-4 ">
                <div class="row g-0  mt-3 ">

                    <div class="col-12 mb-3">
                        <div class="row justify-content-center g-0 ps-3">
                            <div class="col-xl-2 col-lg-3 col-md-3 col-6 mb-5 ps-5 ">

                                <?php if (strip_tags($_SESSION['user_nickname_seo']) == $get_user_profile['user_nickname_seo']) { ?>
                                    <label for="file">
                                        <div class="bg-image rounded-circle me-1">
                                            <img src="<?php echo $get_user_profile['user_avatar'] ?>" alt="" class="img-fluid rounded-circle pointer profile-img" id="profile_photo" width="150" height="150">
                                        </div>
                                    </label>
                                    <input type="file" class="d-none" name="" id="file">
                                <?php  } else { ?>
                                    <div class="bg-image rounded-circle me-1">

                                        <img src="<?php echo $get_user_profile['user_avatar'] ?>" alt="" class="img-fluid rounded-circle profile-img" width="150" height="150">
                                    </div>
                                <?php } ?>

                            </div>
                            <div class="col-xl-9 col-lg-8 col-md-8 col-12 ms-5 mb-5 ps-5">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="lead me-4 fs-28"><?php echo $get_user_profile['user_nickname_seo'] ?>
                                        <?php if ($get_verified['user_verified_state'] == 1) { ?>
                                            <img src="<?php echo $get_verified['user_verified_img'] ?>" class="img-fluid img-cover object-center verified-icon" alt="" srcset="">
                                        <?php } ?>
                                    </div>

                                    <?php
                                    if ($_GET['user_nickname_seo'] == $_SESSION['user_nickname_seo']) {
                                    ?>
                                        <a href="ayarlar" class="btn btn-light shadow-0 border text-capitalize p-2 py-1 me-3 fs-14">Profili Düzenle</a>
                                        <svg aria-label="Seçenekler" class="_ab6- pointer" color="#262626" fill="#262626" height="24" role="img" viewBox="0 0 24 24" width="24" data-mdb-toggle="modal" data-mdb-target="#seceneklerModal">
                                            <circle cx="12" cy="12" fill="none" r="8.635" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></circle>
                                            <path d="M14.232 3.656a1.269 1.269 0 0 1-.796-.66L12.93 2h-1.86l-.505.996a1.269 1.269 0 0 1-.796.66m-.001 16.688a1.269 1.269 0 0 1 .796.66l.505.996h1.862l.505-.996a1.269 1.269 0 0 1 .796-.66M3.656 9.768a1.269 1.269 0 0 1-.66.796L2 11.07v1.862l.996.505a1.269 1.269 0 0 1 .66.796m16.688-.001a1.269 1.269 0 0 1 .66-.796L22 12.93v-1.86l-.996-.505a1.269 1.269 0 0 1-.66-.796M7.678 4.522a1.269 1.269 0 0 1-1.03.096l-1.06-.348L4.27 5.587l.348 1.062a1.269 1.269 0 0 1-.096 1.03m11.8 11.799a1.269 1.269 0 0 1 1.03-.096l1.06.348 1.318-1.317-.348-1.062a1.269 1.269 0 0 1 .096-1.03m-14.956.001a1.269 1.269 0 0 1 .096 1.03l-.348 1.06 1.317 1.318 1.062-.348a1.269 1.269 0 0 1 1.03.096m11.799-11.8a1.269 1.269 0 0 1-.096-1.03l.348-1.06-1.317-1.318-1.062.348a1.269 1.269 0 0 1-1.03-.096" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="2"></path>
                                        </svg>

                                        <!-- Modal -->
                                        <div class="modal fade" id="seceneklerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-body p-0">

                                                        <ul class="list-group rounded-0  border-end h-100">
                                                            <li class="list-group-item bg-transparent border-0  py-3 text-center fs-14 border-bottom settings-li">
                                                                <a href="ayarlar/sifredegistir" class="pointer ">Şifreyi değiştir</a>
                                                            </li>
                                                            <li class="list-group-item bg-transparent border-0  py-3 text-center fs-14 border-bottom settings-li">
                                                                <a class="pointer ">QR Kodu</a>
                                                            </li>
                                                            <li class="list-group-item bg-transparent border-0  py-3 text-center fs-14 border-bottom settings-li">
                                                                <a class="pointer ">Uygulamalar ve internet siteleri</a>
                                                            </li>
                                                            <li class="list-group-item bg-transparent border-0  py-3 text-center fs-14 border-bottom settings-li">
                                                                <a class="pointer ">Bildirimler</a>
                                                            </li>
                                                            <li class="list-group-item bg-transparent border-0  py-3 text-center fs-14 border-bottom settings-li">
                                                                <a class="pointer ">Gizlilik ve güvenlik</a>
                                                            </li>
                                                            <li class="list-group-item bg-transparent border-0  py-3 text-center fs-14 border-bottom settings-li">
                                                                <a class="pointer ">Gözetim</a>
                                                            </li>
                                                            <li class="list-group-item bg-transparent border-0  py-3 text-center fs-14 text-black border-bottom settings-li">
                                                                <a" class="pointer ">Giriş Hareketleri</a>
                                                            </li>
                                                            <li class="list-group-item bg-transparent border-0  py-3 text-center fs-14 border-bottom settings-li">
                                                                <a class="pointer ">Instagram'dan E-postalar</a>
                                                            </li>

                                                            <li class="list-group-item bg-transparent border-0  py-3 text-center fs-14 text-black border-bottom settings-li">
                                                                <a" class="pointer ">Bir sorun bildir</a>
                                                            </li>

                                                            <li class="list-group-item bg-transparent border-0  py-3 text-center fs-14 border-bottom settings-li">
                                                                <a href="logout" class="pointer">Çıkış yap</a>
                                                            </li>


                                                            <li class="list-group-item bg-transparent border-0  py-3 text-center fs-14 border-bottom settings-li" data-mdb-dismiss="modal">
                                                                <a class="pointer ">İptal</a>
                                                            </li>

                                                        </ul>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } else { ?>
                                        <?php
                                        $check_follow = $db->prepare("SELECT * FROM follow where following_nickname=:following_nickname and followed_nickname=:followed_nickname");
                                        $check_follow->execute(array(
                                            'following_nickname' => strip_tags($get_user_profile['user_nickname_seo']),
                                            'followed_nickname' => strip_tags($_SESSION['user_nickname_seo'])
                                        ));

                                        $f_count = $check_follow->rowCount();
                                        if ($f_count <= 0) {

                                        ?>
                                            <button class="btn btn-cyan text-capitalize shadow-0 border py-1 px-3 fs-14" name="follow_user" id="follow" type="submit">Takip et</button>
                                        <?php } else { ?>
                                            <button class="btn btn-light text-capitalize shadow-0 border py-1 px-3 fs-14" name="unfollow_user" id="follow" type="submit">Takiptesin</button>

                                        <?php } ?>
                                        <a href="direct">
                                            <button class="btn btn-light text-capitalize shadow-0 border py-1 px-3 fs-14 ms-2" name="send_message" id="send_message" data-receiver="<?php echo $get_user_profile['user_nickname_seo'] ?>">Mesaj Gönder</button>
                                        </a>
                                    <?php } ?>

                                </div>
                                <div class="d-flex mb-3">
                                    <?php
                                    $check_post_count = $db->prepare("SELECT * FROM post where post_user_nickname_seo=:post_user_nickname_seo");
                                    $check_post_count->execute(array(
                                        'post_user_nickname_seo' => strip_tags($_GET['user_nickname_seo'])
                                    ));
                                    $post_count = $check_post_count->rowCount();
                                    ?>

                                    <?php
                                    $check_follower_count = $db->prepare("SELECT * FROM follow where following_nickname=:following_nickname");
                                    $check_follower_count->execute(array(
                                        'following_nickname' => strip_tags($get_user_profile['user_nickname_seo'])
                                    ));
                                    $follower_count = $check_follower_count->rowCount();
                                    ?>
                                    <div class="me-5"><b><?php echo $post_count ?></b> gönderi</div>
                                    <div class="me-5 class pointer" id="follower_btn" data-mdb-toggle="modal" data-mdb-target="#followerModal"><b id="follower-count"><?php echo $follower_count ?></b> takipçi</div>


                                    <!-- Modal -->
                                    <div class="modal fade" id="followerModal" tabindex="-1" aria-labelledby="followerModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" style="max-width: 400px!important;">
                                            <div class="modal-content">
                                                <div class="modal-header justify-content-between py-2">
                                                    <div></div>
                                                    <div class="modal-title fs-16 fw-bold" id="exampleModalLabel">Takipçiler</div>
                                                    <div class="float-end">
                                                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                </div>
                                                <div class="modal-body modal-height" id="followerModalBody">


                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    $check_following_count = $db->prepare("SELECT * FROM follow where followed_nickname=:followed_nickname");
                                    $check_following_count->execute(array(
                                        'followed_nickname' => strip_tags($get_user_profile['user_nickname_seo'])
                                    ));
                                    $following_count = $check_following_count->rowCount();
                                    ?>
                                    <div class="me-5 class pointer" id="following_btn" data-mdb-toggle="modal" data-mdb-target="#followingModal"><b><?php echo $following_count ?></b> takip</div>

                                    <!-- Modal -->
                                    <div class="modal fade" id="followingModal" tabindex="-1" aria-labelledby="followingModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" style="max-width: 400px!important;">
                                            <div class="modal-content">
                                                <div class="modal-header justify-content-between py-2">
                                                    <div></div>
                                                    <div class="modal-title fs-16 fw-bold" id="exampleModalLabel">Takip Ettikleri</div>
                                                    <div class="float-end">
                                                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                </div>
                                                <div class="modal-body modal-height" id="followingModalBody">


                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="fw-bold mb-1"><?php echo $get_user_profile['user_fullname'] ?></div>
                                <div class="mb-1"><?php echo $get_user_profile['user_bio'] ?></div>
                                <div>
                                    <a href="<?php echo $get_user_profile['user_website'] ?>" class="db-color fw-bold"><?php echo $get_user_profile['user_website'] ?></a>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-9 border border-top border-bottom-0 border-start-0 border-end-0 mt-2">
                        <ul class="nav nav-tabs justify-content-center mb-1" id="ex1" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active nav-custom-text" data-text="gonderiler" id="gonderiler" data-mdb-toggle="tab" href="#gonderiler-tabs" role="tab" aria-controls="gonderiler-tabs" aria-selected="true">
                                    <div class="d-flex align-items-center">
                                        <div class="me-2">
                                            <svg aria-label="" class="_ab6-" color="#262626" fill="#262626" height="12" role="img" viewBox="0 0 24 24" width="12">
                                                <rect fill="none" height="18" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" width="18" x="3" y="3"></rect>
                                                <line fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" x1="9.015" x2="9.015" y1="3" y2="21"></line>
                                                <line fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" x1="14.985" x2="14.985" y1="3" y2="21"></line>
                                                <line fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" x1="21" x2="3" y1="9.015" y2="9.015"></line>
                                                <line fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" x1="21" x2="3" y1="14.985" y2="14.985"></line>
                                            </svg>
                                        </div>
                                        <span>GÖNDERİLER</span>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link nav-custom-text" data-text="kaydedilenler" id="kaydedilenler" data-mdb-toggle="tab" href="#kaydedilenler-tabs" role="tab" aria-controls="kaydedilenler-tabs" aria-selected="false">
                                    <div class="d-flex align-items-center">
                                        <div class="me-2">
                                            <svg aria-label="" class="_ab6-" color="#262626" fill="#262626" height="12" role="img" viewBox="0 0 24 24" width="12">
                                                <polygon fill="none" points="20 21 12 13.44 4 21 4 3 20 3 20 21" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></polygon>
                                            </svg>
                                        </div>
                                        <span>KAYDEDİLENLER</span>
                                    </div>

                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link nav-custom-text" data-text="etiketlenenler" id="etiketlenenler" data-mdb-toggle="tab" href="#etiketlenenler-tabs" role="tab" aria-controls="etiketlenenler-tabs" aria-selected="false">
                                    <div class="d-flex align-items-center">
                                        <div class="me-2">
                                            <svg aria-label="" class="_ab6-" color="#262626" fill="#262626" height="12" role="img" viewBox="0 0 24 24" width="12">
                                                <path d="M10.201 3.797 12 1.997l1.799 1.8a1.59 1.59 0 0 0 1.124.465h5.259A1.818 1.818 0 0 1 22 6.08v14.104a1.818 1.818 0 0 1-1.818 1.818H3.818A1.818 1.818 0 0 1 2 20.184V6.08a1.818 1.818 0 0 1 1.818-1.818h5.26a1.59 1.59 0 0 0 1.123-.465Z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
                                                <path d="M18.598 22.002V21.4a3.949 3.949 0 0 0-3.948-3.949H9.495A3.949 3.949 0 0 0 5.546 21.4v.603" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
                                                <circle cx="12.072" cy="11.075" fill="none" r="3.556" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></circle>
                                            </svg>
                                        </div>
                                        <span>ETİKETLENENLER</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <!-- Tabs navs -->

                        <!-- Tabs content -->
                        <div class="tab-content" id="ex1-content">
                            <div class="tab-pane fade show active" id="gonderiler-tabs" role="tabpanel" aria-labelledby="gonderiler-tabs">
                                <div class="row gx-4">

                                    <?php
                                    $check_post = $db->prepare("SELECT * FROM post where post_user_nickname_seo=:post_user_nickname_seo order by post_time desc");
                                    $check_post->execute(array(
                                        'post_user_nickname_seo' => strip_tags($_GET['user_nickname_seo'])
                                    ));
                                    $count_post = $check_post->rowCount();
                                    $count = 0;
                                    if ($count_post <= 0) {
                                        echo "Bu kullanıcının gönderisi bulunmamaktadır.";
                                    }

                                    while ($get_post = $check_post->fetch(PDO::FETCH_ASSOC)) {
                                        $check_post_user = $db->prepare("SELECT * FROM users where user_nickname_seo=:user_nickname_seo");
                                        $check_post_user->execute(array(
                                            'user_nickname_seo' => $get_post['post_user_nickname_seo']
                                        ));
                                        $get_post_user = $check_post_user->fetch(PDO::FETCH_ASSOC);
                                        $count++;

                                        $post_like_count = $db->prepare("SELECT * FROM like_post where like_post_id=:like_post_id");
                                        $post_like_count->execute(array(
                                            'like_post_id' => intval($get_post['post_id'])
                                        ));
                                        $post_like_count = $post_like_count->rowCount();

                                        $check_post_like = $db->prepare("SELECT * FROM like_post where like_post_id=:like_post_id and like_user_nickname=:like_user_nickname");
                                        $check_post_like->execute(array(
                                            'like_post_id' => intval($get_post['post_id']),
                                            'like_user_nickname' => strip_tags($_SESSION['user_nickname_seo'])
                                        ));
                                        $like_count  = $check_post_like->rowCount();


                                        $ask_comment_count = $db->prepare("SELECT * FROM comment where comment_post_id=:comment_post_id");
                                        $ask_comment_count->execute(array(
                                            'comment_post_id' => intval($get_post['post_id'])
                                        ));

                                        $get_comment_count = $ask_comment_count->rowCount();

                                        $get_comm = $ask_comment_count->fetch(PDO::FETCH_ASSOC);


                                        $ask_bookmark = $db->prepare("SELECT * FROM bookmark where bookmark_post_id=:bookmark_post_id");
                                        $ask_bookmark->execute(array(
                                            'bookmark_post_id' => intval($get_post['post_id'])
                                        ));
                                        $ask_bookmark_count = $ask_bookmark->rowCount();
                                    ?>
                                        <div class="col-4 pointer mb-4">
                                            <a class="open-post" data-mdb-toggle="modal" data-mdb-target="#<?php echo $get_post['post_user_nickname_seo'] . "-" . $count ?>">

                                                <div class="bg-image ripple hover-overlay" data-mdb-ripple-color="light">

                                                    <div class="card">
                                                        <img src="<?php echo $get_post['post_image'] ?>" class="img-fluid post-img img-cover object-center" alt="">
                                                    </div>
                                                    <div class="hover-overlay">

                                                        <div class="mask" style="background-color: rgba(0, 0, 0, 0.4)">
                                                            <div class="d-flex justify-content-center align-items-center h-100">
                                                                <div class="d-flex align-items-center me-3">
                                                                    <i class="fas fa-heart text-white fs-22"></i>
                                                                    <span class="text-white ms-2 fw-normal fs-16"><?php echo $post_like_count ?></span>
                                                                </div>
                                                                <div class="d-flex align-items-center">
                                                                    <i class="fas fa-comment text-white fs-22"></i>
                                                                    <span class="text-white ms-2 fw-normal fs-16"><?php echo $get_comment_count ?></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>

                                        </div>
                                        <!-- Modal -->
                                        <div class="modal fade" id="<?php echo $get_post['post_user_nickname_seo'] . "-" . $count ?>" tabindex="-1" aria-labelledby="<?php echo $get_post['post_user_nickname_seo'] . "-" . $count . "Label" ?>" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-xxl">
                                                <div class="modal-content">
                                                    <div class="modal-body p-0">
                                                        <div class="row g-0 bg-black">
                                                            <div class="col-8 text-center align-self-center">
                                                                <img src="<?php echo $get_post['post_image'] ?>" class="img-fluid img-cover img-xxl object-center vh-100" style="max-height: 886px!important;" alt="" srcset="">
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="card h-100 shadow-0 rounded-0 border border-top-0">
                                                                    <div class="mb-0">
                                                                        <div class="card-title border-bottom mb-0 d-flex align-items-center justify-content-between">
                                                                            <a href="p/<?php echo $get_post['post_user_nickname_seo']  ?>">
                                                                                <div class="d-flex align-items-center mb-3 card-body p-2 pt-3 pb-0">
                                                                                    <div class="me-3">
                                                                                        <img src="<?php echo $get_post_user['user_avatar'] ?>" class="img-fluid img-cover rounded-circle post-pp" width="32" height="32" alt="" srcset="">

                                                                                    </div>
                                                                                    <div class="fw-bold fs-14 user_url"><?php echo $get_post_user['user_nickname_seo'] ?> </div>

                                                                                </div>
                                                                            </a>
                                                                            <div class="dropstart me-3">
                                                                                <i class="fas fa-ellipsis-h pointer" id="postMenuButton" data-mdb-toggle="dropdown" aria-expanded="false"></i>

                                                                                <ul class="dropdown-menu text-center" aria-labelledby="postMenuButton">
                                                                                    <li><a class="dropdown-item text-danger" href="#">Şikayet Et</a></li>
                                                                                    <?php if ($_SESSION['user_nickname_seo'] == $get_comment_user['user_nickname_seo'] || $_SESSION['user_nickname_seo'] == $get_user_profile['user_nickname_seo']) { ?>
                                                                                        <li class="deletePost pointer" data-post-id="<?php echo $get_post['post_id'] ?>"><a class="dropdown-item text-danger">Sil</a></li>
                                                                                    <?php } ?>
                                                                                    <li><a class="dropdown-item pointer">İptal</a></li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="card-body p-2 mt-1 comments">
                                                                        <?php if (strlen($get_post['post_description'])) { ?>

                                                                            <div class="row g-0">
                                                                                <div class="col-1 me-2">
                                                                                    <a href="p/<?php echo $get_post['post_user_nickname_seo']  ?>">

                                                                                        <img src="<?php echo $get_post_user['user_avatar'] ?>" class="img-fluid img-cover rounded-circle post-pp" width="32" height="32" alt="" srcset="">
                                                                                    </a>
                                                                                </div>
                                                                                <div class="col-10 ms-1 mb-3">
                                                                                    <a class="user_url" href="p/<?php echo $get_post['post_user_nickname_seo']  ?>">

                                                                                        <div class="fw-bold fs-14"><?php echo $get_post_user['user_nickname_seo'] ?></div>
                                                                                    </a>
                                                                                    <span class="fw-normal"><?php echo $get_post['post_description'] ?></span>
                                                                                    <div class="text-muted fs-12">

                                                                                        <?php echo convertMonthToTurkishCharacter(date("d F Y D", strtotime($get_post['post_time']))); ?>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        <?php } ?>

                                                                        <div class="row g-0 commentBody-<?php echo $get_post['post_id'] ?>">
                                                                            <?php

                                                                            $ask_comment = $db->prepare("SELECT * FROM comment where comment_post_id=:comment_post_id order by comment_time DESC");
                                                                            $ask_comment->execute(array(
                                                                                'comment_post_id' => intval($get_post['post_id'])
                                                                            ));

                                                                            while ($get_comment = $ask_comment->fetch(PDO::FETCH_ASSOC)) {
                                                                                $ask_comment_user = $db->prepare("SELECT * FROM users where user_nickname_seo=:user_nickname_seo");
                                                                                $ask_comment_user->execute(array(
                                                                                    'user_nickname_seo' => strip_tags($get_comment['comment_user_nickname'])
                                                                                ));
                                                                                $get_comment_user = $ask_comment_user->fetch(PDO::FETCH_ASSOC);
                                                                            ?>
                                                                                <div class="col-1 me-2">
                                                                                    <a href="p/<?php echo $get_comment['comment_user_nickname']  ?>">

                                                                                        <img src="<?php echo $get_comment_user['user_avatar'] ?>" class="img-fluid img-cover rounded-circle post-pp" width="32" height="32" alt="" srcset="">
                                                                                    </a>
                                                                                </div>
                                                                                <div class="col-10 ms-1 mb-3">
                                                                                    <a class="user_url" href="p/<?php echo $get_comment['comment_user_nickname']  ?>">

                                                                                        <div class="fw-bold fs-14"><?php echo $get_comment_user['user_nickname_seo'] ?></div>
                                                                                    </a>
                                                                                    <span class="fw-normal"><?php echo $get_comment['comment_desc'] ?></span>
                                                                                    <div class="d-flex align-items-center">
                                                                                        <div class="text-muted fs-12 me-3">
                                                                                            <?php echo convertMonthToTurkishCharacter(date("d F Y &#183; H:i", strtotime($get_comment['comment_time']))); ?>

                                                                                        </div>
                                                                                        <div class="text-muted fs-12 me-3">390 beğenme</div>
                                                                                        <div class="text-muted fs-12 me-3 ">Yanıtla</div>
                                                                                        <div class="text-muted fs-15">

                                                                                            <div class="dropdown">
                                                                                                <i class="fas fa-ellipsis-h pointer" id="dropdownMenuButton" data-mdb-toggle="dropdown" aria-expanded="false"></i>

                                                                                                <ul class="dropdown-menu text-center" aria-labelledby="dropdownMenuButton">
                                                                                                    <li><a class="dropdown-item text-danger" href="#">Şikayet Et</a></li>
                                                                                                    <?php if ($_SESSION['user_nickname_seo'] == $get_comment_user['user_nickname_seo'] || $_SESSION['user_nickname_seo'] == $get_user_profile['user_nickname_seo']) { ?>
                                                                                                        <li class="deleteComment pointer" data-post-id="<?php echo $get_post['post_id'] ?>" comment-id="<?php echo $get_comment['comment_id'] ?>"><a class="dropdown-item text-danger">Sil</a></li>
                                                                                                    <?php } ?>
                                                                                                    <li><a class="dropdown-item pointer">İptal</a></li>
                                                                                                </ul>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            <?php } ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="card-footer px-3">
                                                                        <div class="d-flex justify-content-between mb-3">
                                                                            <div class="d-flex">
                                                                                <div class="me-3">
                                                                                    <?php if ($like_count >= 1) { ?>
                                                                                        <i class="fas fa-heart text-danger fs-4 post_buttons like_button like_btn_<?php echo intval($get_post['post_id']) ?> pointer" data-like="<?php echo intval($get_post['post_id']) ?>"> </i>
                                                                                    <?php } else { ?>
                                                                                        <i class="far fa-heart fs-4 post_buttons like_button like_btn_<?php echo intval($get_post['post_id']) ?> pointer" data-like="<?php echo intval($get_post['post_id']) ?>"> </i>
                                                                                    <?php } ?>
                                                                                </div>
                                                                                <div class="me-3">
                                                                                    <svg aria-label="Yorum Yap" class="_ab6- post_buttons pointer comm-button" color="#262626" fill="#262626" height="24" role="img" viewBox="0 0 24 24" width="24">
                                                                                        <path d="M20.656 17.008a9.993 9.993 0 1 0-3.59 3.615L22 22Z" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="2"></path>
                                                                                    </svg>
                                                                                </div>
                                                                                <div class="">
                                                                                    <svg aria-label="Gönderi Paylaş" class="_ab6- post_buttons pointer" color="#262626" fill="#262626" height="24" role="img" viewBox="0 0 24 24" width="24">
                                                                                        <line fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="2" x1="22" x2="9.218" y1="3" y2="10.083"></line>
                                                                                        <polygon fill="none" points="11.698 20.334 22 3.001 2 3.001 9.218 10.084 11.698 20.334" stroke="currentColor" stroke-linejoin="round" stroke-width="2"></polygon>
                                                                                    </svg>
                                                                                </div>
                                                                            </div>
                                                                            <div class="">
                                                                                <?php if ($ask_bookmark_count >= 1) { ?>
                                                                                    <i class="fas fa-bookmark text-black fs-5 post_buttons pointer bookmarkButton bookmark_modal_btn_<?php echo intval($get_post['post_id']) ?>" data-bookmark-id="<?php echo intval($get_post['post_id']) ?>"> </i>
                                                                                <?php } else { ?>
                                                                                    <i class="far fa-bookmark fs-5 post_buttons pointer bookmarkButton bookmark_modal_btn_<?php echo intval($get_post['post_id']) ?>" data-bookmark-id="<?php echo intval($get_post['post_id']) ?>"> </i>
                                                                                <?php } ?>
                                                                            </div>
                                                                        </div>
                                                                        <div class="fs-14 fw-bold like_text pointer active_text" data-mdb-toggle="modal" data-mdb-target="#like_modal_<?php echo $get_post['post_id'] ?>" data-post-like-id="<?php echo $get_post['post_id'] ?>"><span class="post_like_count_text_<?php echo $get_post['post_id'] ?>" data-post-id="<?php echo $get_post['post_id'] ?>"><?php echo $post_like_count ?></span> beğenme</div>

                                                                        <div class="text-muted fs-13">
                                                                            <?php echo convertMonthToTurkishCharacter(date("d F Y D", strtotime($get_post['post_time']))); ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="input-group border-top py-2">
                                                                        <textarea class="form-control border-0 custom-area comment" placeholder="Yorum ekle..." id="" cols="30" rows="20"></textarea>
                                                                        <button class="btn btn-transparent border-0 shadow-0 text-capitalize text-primary shareComment" dpi="<?php echo $get_post["post_id"] ?>">Paylaş</button>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>
                                        </div>

                                        <div class="modal" id="like_modal_<?php echo $get_post['post_id'] ?>" tabindex="-1" aria-labelledby="like_modal_<?php echo $get_post['post_id'] ?>Label" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" style="max-width: 400px!important;">
                                                <div class="modal-content">
                                                    <div class="modal-header justify-content-between py-2">
                                                        <div></div>
                                                        <div class="modal-title fs-16 fw-bold" id="exampleModalLabel">Beğenmeler</div>
                                                        <div class="float-end">
                                                            <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                    </div>
                                                    <div class="modal-body modal-height likeModalBody">


                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    <?php } ?>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="kaydedilenler-tabs" role="tabpanel" aria-labelledby="kaydedilenler-tabs">
                                <div class="row gx-4">

                                    <?php
                                    $check_bookmark = $db->prepare("SELECT * FROM bookmark where bookmark_user_nickname=:bookmark_user_nickname");
                                    $check_bookmark->execute(array(
                                        'bookmark_user_nickname' => strip_tags($get_user_profile['user_nickname_seo'])
                                    ));
                                    $check_bookmark_count =  $check_bookmark->rowCount();
                                    if ($check_bookmark_count < 1) {
                                        echo "Kaydedilenleriniz boştur";
                                    }
                                    $c = 0;
                                    while ($get_bookmark = $check_bookmark->fetch(PDO::FETCH_ASSOC)) {
                                        $c++;
                                        $check_bookmark_post = $db->prepare("SELECT * FROM post where post_id=:post_id");
                                        $check_bookmark_post->execute(array(
                                            'post_id' => intval($get_bookmark['bookmark_post_id'])
                                        ));
                                        $get_bookmark_post = $check_bookmark_post->fetch(PDO::FETCH_ASSOC);

                                        $check_bookmark_post_user = $db->prepare("SELECT * FROM users where user_nickname_seo=:user_nickname_seo");
                                        $check_bookmark_post_user->execute(array(
                                            'user_nickname_seo' => strip_tags($get_bookmark_post['post_user_nickname_seo'])
                                        ));
                                        $get_bookmark_post_user = $check_bookmark_post_user->fetch(PDO::FETCH_ASSOC);

                                        $ask_bookmark_1 = $db->prepare("SELECT * FROM bookmark where bookmark_post_id=:bookmark_post_id");
                                        $ask_bookmark_1->execute(array(
                                            'bookmark_post_id' => intval($get_bookmark_post['post_id'])
                                        ));
                                        $ask_bookmark_count_1 = $ask_bookmark_1->rowCount();

                                        $check_post_like_1 = $db->prepare("SELECT * FROM like_post where like_post_id=:like_post_id and like_user_nickname=:like_user_nickname");
                                        $check_post_like_1->execute(array(
                                            'like_post_id' => intval($get_bookmark_post['post_id']),
                                            'like_user_nickname' => strip_tags($_SESSION['user_nickname_seo'])
                                        ));
                                        $like_count_1  = $check_post_like_1->rowCount();

                                        $post_like_count_1 = $db->prepare("SELECT * FROM like_post where like_post_id=:like_post_id");
                                        $post_like_count_1->execute(array(
                                            'like_post_id' => intval($get_bookmark_post['post_id'])
                                        ));
                                        $post_like_count_1 = $post_like_count_1->rowCount();

                                        $ask_comment_count_1 = $db->prepare("SELECT * FROM comment where comment_post_id=:comment_post_id");
                                        $ask_comment_count_1->execute(array(
                                            'comment_post_id' => intval($get_bookmark_post['post_id'])
                                        ));

                                        $get_comment_count_1 = $ask_comment_count_1->rowCount();

                                    ?>

                                        <div class="col-4 pointer mb-4">
                                            <a class="" data-mdb-toggle="modal" data-mdb-target="#<?php echo $get_bookmark_post['post_user_nickname_seo'] . "-s" . $c ?>">

                                                <div class=" bg-image ripple hover-overlay">

                                                    <div class=" card">
                                                        <img src="<?php echo $get_bookmark_post['post_image'] ?>" class="img-fluid post-img img-cover" alt="">
                                                    </div>
                                                    <div class="hover-overlay">

                                                        <div class="mask" style="background-color: rgba(0, 0, 0, 0.4)">
                                                            <div class="d-flex justify-content-center align-items-center h-100">
                                                                <div class="d-flex align-items-center me-3">
                                                                    <i class="fas fa-heart text-white fs-22"></i>
                                                                    <span class="text-white ms-2 fw-normal fs-16"><?php echo $post_like_count_1 ?></span>
                                                                </div>
                                                                <div class="d-flex align-items-center">
                                                                    <i class="fas fa-comment text-white fs-22"></i>
                                                                    <span class="text-white ms-2 fw-normal fs-16"><?php echo $get_comment_count_1 ?></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>

                                        <div class="modal fade" id="<?php echo $get_bookmark_post['post_user_nickname_seo'] . "-s" . $c ?>" tabindex="-1" aria-labelledby="<?php echo $get_bookmark_post['post_user_nickname_seo'] . "-s" . $c . "Label" ?>" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-xxl">
                                                <div class="modal-content">
                                                    <div class="modal-body p-0">
                                                        <div class="row g-0 bg-black">
                                                            <div class="col-8 text-center align-self-center">
                                                                <img src="<?php echo $get_bookmark_post['post_image'] ?>" class="img-fluid img-cover img-xxl vh-100" style="max-height: 886px!important;" alt="" srcset="">
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="card h-100 shadow-0 rounded-0 border border-top-0">
                                                                    <div class="mb-0">
                                                                        <div class="card-title border-bottom mb-0">
                                                                            <a href="p/<?php echo $get_bookmark_post['post_user_nickname_seo']  ?>">
                                                                                <div class="d-flex align-items-center mb-3 card-body p-2 pt-3 pb-0">
                                                                                    <div class="me-3">
                                                                                        <img src="<?php echo $get_bookmark_post_user['user_avatar'] ?>" class="img-fluid img-cover rounded-circle post-pp" width="32" height="32" alt="" srcset="">

                                                                                    </div>
                                                                                    <div class="fw-bold fs-14 user_url"><?php echo $get_bookmark_post_user['user_nickname_seo'] ?> </div>

                                                                                </div>
                                                                            </a>

                                                                        </div>
                                                                    </div>
                                                                    <div class="card-body p-2 mt-1 comments">
                                                                        <div class="row g-0">
                                                                            <div class="col-1 me-2">
                                                                                <a href="p/<?php echo $get_bookmark_post['post_user_nickname_seo']  ?>">

                                                                                    <img src="<?php echo $get_bookmark_post_user['user_avatar'] ?>" class="img-fluid img-cover rounded-circle post-pp" width="32" height="32" alt="" srcset="">
                                                                                </a>
                                                                            </div>
                                                                            <div class="col-10 ms-1 mb-3">
                                                                                <a class="user_url" href="p/<?php echo $get_bookmark_post['post_user_nickname_seo']  ?>">

                                                                                    <div class="fw-bold fs-14"><?php echo $get_bookmark_post_user['user_nickname_seo'] ?></div>
                                                                                </a>
                                                                                <span class="fw-normal"><?php echo $get_bookmark_post['post_description'] ?></span>
                                                                                <div class="text-muted fs-12">

                                                                                    <?php echo convertMonthToTurkishCharacter(date("d F Y D", strtotime($get_bookmark_post['post_time']))); ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row g-0 commentBody-<?php echo $get_bookmark_post['post_id'] ?>">
                                                                            <?php

                                                                            $ask_comment_1 = $db->prepare("SELECT * FROM comment where comment_post_id=:comment_post_id order by comment_time DESC");
                                                                            $ask_comment_1->execute(array(
                                                                                'comment_post_id' => intval($get_bookmark_post['post_id'])
                                                                            ));

                                                                            while ($get_comment_1 = $ask_comment_1->fetch(PDO::FETCH_ASSOC)) {
                                                                                $ask_comment_user_1 = $db->prepare("SELECT * FROM users where user_nickname_seo=:user_nickname_seo");
                                                                                $ask_comment_user_1->execute(array(
                                                                                    'user_nickname_seo' => strip_tags($get_comment_1['comment_user_nickname'])
                                                                                ));
                                                                                $get_comment_user_1 = $ask_comment_user_1->fetch(PDO::FETCH_ASSOC);
                                                                            ?>
                                                                                <div class="col-1 me-2">
                                                                                    <a href="p/<?php echo $get_comment_1['comment_user_nickname']  ?>">

                                                                                        <img src="<?php echo $get_comment_user_1['user_avatar'] ?>" class="img-fluid img-cover rounded-circle post-pp" width="32" height="32" alt="" srcset="">
                                                                                    </a>
                                                                                </div>
                                                                                <div class="col-10 ms-1 mb-3">
                                                                                    <a class="user_url" href="p/<?php echo $get_comment_1['comment_user_nickname']  ?>">

                                                                                        <div class="fw-bold fs-14"><?php echo $get_comment_user_1['user_nickname_seo'] ?></div>
                                                                                    </a>
                                                                                    <span class="fw-normal"><?php echo $get_comment_1['comment_desc'] ?></span>
                                                                                    <div class="d-flex align-items-center">
                                                                                        <div class="text-muted fs-12 me-3">
                                                                                            <?php echo convertMonthToTurkishCharacter(date("d F Y &#183; H:i", strtotime($get_comment_1['comment_time']))); ?>

                                                                                        </div>
                                                                                        <div class="text-muted fs-12 me-3">390 beğenme</div>
                                                                                        <div class="text-muted fs-12 me-3 ">Yanıtla</div>
                                                                                        <div class="text-muted fs-15">

                                                                                            <div class="dropdown">
                                                                                                <i class="fas fa-ellipsis-h pointer" id="dropdownMenuButton" data-mdb-toggle="dropdown" aria-expanded="false"></i>

                                                                                                <ul class="dropdown-menu text-center" aria-labelledby="dropdownMenuButton">
                                                                                                    <li><a class="dropdown-item text-danger" href="#">Şikayet Et</a></li>
                                                                                                    <?php if ($_SESSION['user_nickname_seo'] == $get_comment_user_1['user_nickname_seo'] || $_SESSION['user_nickname_seo'] == $get_user_profile['user_nickname_seo']) { ?>
                                                                                                        <li class="deleteComment pointer" data-post-id="<?php echo $get_bookmark_post['post_id'] ?>" comment-id="<?php echo $get_comment_1['comment_id'] ?>"><a class="dropdown-item text-danger">Sil</a></li>
                                                                                                    <?php } ?>
                                                                                                    <li><a class="dropdown-item pointer">İptal</a></li>
                                                                                                </ul>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            <?php } ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="card-footer px-3">
                                                                        <div class="d-flex justify-content-between mb-3">
                                                                            <div class="d-flex">
                                                                                <div class="me-3">
                                                                                    <?php if ($like_count_1 >= 1) { ?>
                                                                                        <i class="fas fa-heart text-danger fs-4 post_buttons like_button like_btn_<?php echo intval($get_bookmark_post['post_id']) ?> pointer" data-like="<?php echo intval($get_bookmark_post['post_id']) ?>"> </i>
                                                                                    <?php } else { ?>
                                                                                        <i class="far fa-heart fs-4 post_buttons like_button like_btn_<?php echo intval($get_bookmark_post['post_id']) ?> pointer" data-like="<?php echo intval($get_bookmark_post['post_id']) ?>"> </i>
                                                                                    <?php } ?>
                                                                                </div>
                                                                                <div class="me-3">
                                                                                    <svg aria-label="Yorum Yap" class="_ab6- post_buttons pointer comm-button" color="#262626" fill="#262626" height="24" role="img" viewBox="0 0 24 24" width="24">
                                                                                        <path d="M20.656 17.008a9.993 9.993 0 1 0-3.59 3.615L22 22Z" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="2"></path>
                                                                                    </svg>
                                                                                </div>
                                                                                <div class="">
                                                                                    <svg aria-label="Gönderi Paylaş" class="_ab6- post_buttons pointer" color="#262626" fill="#262626" height="24" role="img" viewBox="0 0 24 24" width="24">
                                                                                        <line fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="2" x1="22" x2="9.218" y1="3" y2="10.083"></line>
                                                                                        <polygon fill="none" points="11.698 20.334 22 3.001 2 3.001 9.218 10.084 11.698 20.334" stroke="currentColor" stroke-linejoin="round" stroke-width="2"></polygon>
                                                                                    </svg>
                                                                                </div>
                                                                            </div>
                                                                            <div class="">
                                                                                <?php if ($ask_bookmark_count_1 >= 1) { ?>
                                                                                    <i class="fas fa-bookmark text-black fs-5 post_buttons pointer bookmarkButton bookmark_modal_btn_<?php echo intval($get_post['post_id']) ?>" data-bookmark-id="<?php echo intval($get_bookmark_post['post_id']) ?>"> </i>
                                                                                <?php } else { ?>
                                                                                    <i class="far fa-bookmark fs-5 post_buttons pointer bookmarkButton bookmark_modal_btn_<?php echo intval($get_post['post_id']) ?>" data-bookmark-id="<?php echo intval($get_bookmark_post['post_id']) ?>"> </i>
                                                                                <?php } ?>
                                                                            </div>
                                                                        </div>
                                                                        <div class="fs-14 fw-bold like_text pointer active_text" data-mdb-toggle="modal" data-mdb-target="#like_modal_<?php echo $get_bookmark_post['post_id'] ?>" data-post-like-id="<?php echo $get_bookmark_post['post_id'] ?>"><span class="post_like_count_text_<?php echo $get_bookmark_post['post_id'] ?>" data-post-id="<?php echo $get_bookmark_post['post_id'] ?>"><?php echo $post_like_count_1 ?></span> beğenme</div>

                                                                        <div class="text-muted fs-13">
                                                                            <?php echo convertMonthToTurkishCharacter(date("d F Y D", strtotime($get_bookmark_post['post_time']))); ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="input-group border-top py-2">
                                                                        <textarea class="form-control border-0 custom-area comment" placeholder="Yorum ekle..." id="" cols="30" rows="20"></textarea>
                                                                        <button class="btn btn-transparent border-0 shadow-0 text-capitalize text-primary shareComment" dpi="<?php echo $get_bookmark_post["post_id"] ?>">Paylaş</button>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                        <div class="modal" id="like_modal_<?php echo $get_bookmark_post['post_id'] ?>" tabindex="-1" aria-labelledby="like_modal_<?php echo $get_bookmark_post['post_id'] ?>Label" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" style="max-width: 400px!important;">
                                                <div class="modal-content">
                                                    <div class="modal-header justify-content-between py-2">
                                                        <div></div>
                                                        <div class="modal-title fs-16 fw-bold" id="exampleModalLabel">Beğenmeler</div>
                                                        <div class="float-end">
                                                            <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                    </div>
                                                    <div class="modal-body modal-height likeModalBody">


                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    <?php } ?>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="etiketlenenler-tabs" role="tabpanel" aria-labelledby="etiketlenenler-tabs">
                                Tab 3 content
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script>
    $(document).ready(function() {


        $(document).on("click", "#follow", function() {
            var follow_user = "follow_user";
            var user_nickname_seo = "<?php echo $get_user_profile['user_nickname_seo'] ?>";
            var values = {
                'follow_user': follow_user,
                'user_nickname_seo': user_nickname_seo
            };
            var follower_text = parseInt($('#follower-count').text());
            if ($(this).hasClass("btn-cyan")) {
                $.ajax({
                    type: "POST",
                    url: "admin/database.php",
                    data: values,
                    success: function() {
                        $(this).toggleClass("btn-cyan");
                        $(this).toggleClass("btn-light")
                        $(this).text("Takiptesin");
                        parseInt($('#follower-count').text(follower_text + 1));

                        // follower_list.after(NewContent);
                    }.bind(this),
                    error: function(e) {
                        alert(e);

                    }
                });
            } else {
                var unfollow_user = "unfollow_user";
                var values2 = {
                    'unfollow_user': unfollow_user,
                    'user_nickname_seo': user_nickname_seo
                };
                $.ajax({
                    type: "POST",
                    url: "admin/database.php",
                    data: values2,
                    success: function() {
                        $(this).toggleClass("btn-cyan");
                        $(this).toggleClass("btn-light")
                        $(this).text("Takip Et");

                        //$(this).text("Takip Et");
                        parseInt($('#follower-count').text(follower_text - 1));

                    }.bind(this),
                    error: function(e) {
                        alert(e);

                    }
                });
            }
        });
        $(document).on('click', "#follower_btn", function() {
            var inputVal = "<?php echo $get_user_profile['user_nickname_seo'] ?>";
            if (inputVal.length) {

                $.get("usermodal.php", {
                    follower: inputVal
                }).done(function(data) {
                    // Display the returned data in browser
                    $("#followerModalBody").html(data);
                });
            }
        });
        $(document).on('click', "#following_btn", function() {
            var inputVal = "<?php echo $get_user_profile['user_nickname_seo'] ?>";
            if (inputVal.length) {

                $.get("usermodal.php", {
                    following: inputVal
                }).done(function(data) {
                    // Display the returned data in browser
                    $("#followingModalBody").html(data);
                });
            }
        });
        $("#title").html("<?php echo $get_user_profile['user_fullname'] . ' (@' . $get_user_profile['user_nickname_seo'] . ')'  ?> &#183; Instagram fotoğrafları ve videoları");

        $(document).on("click", ".nav-link", function(e) {
            $(".nav-link").parent().removeClass("active show");
            //$(".").removeClass("fw-bolder");
            var title = $(this).attr('data-text');


            $(this).toggleClass("fw-bolder");
            $(this).parent().toggleClass("active show");

            e.preventDefault();
            var href = $(this).attr("data-text");
            window.history.pushState(
                "",
                "",
                `p/<?php echo $get_user_profile['user_nickname_seo'] ?>/${href}`
            );

        });
        $(document).on("click", '#send_message', function(e) {
            e.preventDefault();
            var message_receiver_nickname = $(this).attr("data-receiver");
            var values3 = {
                'message_receiver_nickname': message_receiver_nickname
            };
            $.ajax({
                type: "POST",
                url: "admin/database.php",
                data: values3,
                success: function() {

                }.bind(this),
                error: function(e) {
                    alert(e);

                }
            });
        });
        <?php if ($get_user_profile['user_nickname_seo'] == $_SESSION['user_nickname_seo']) { ?>

            var sib = $("#sidenav_profile");
            $(sib).addClass("border border-2 border-dark")
            $(sib).next().addClass("fw-bold-600 text-black");
        <?php } ?>
        var href_now = window.location.href;


        var href_now_split = href_now
            .split("http://localhost/instagram/p/<?php echo $get_user_profile['user_nickname_seo'] ?>/").join("");
        var href_now_active = $("#" + href_now_split).attr("data-text");

        $(".nav-link").removeClass("active");
        $(".tab-pane").removeClass("active show");
        $("#" + href_now_active)

            .addClass("active show");
        $("#" + href_now_active + "-tabs")

            .addClass("active show");
        $("#" + href_now_active).toggleClass("fw-bolder");
        //var title_text = $("#" + href_now_active).text();

    });
</script>

<?php require_once 'footer.php'; ?>