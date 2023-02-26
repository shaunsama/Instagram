<?php require_once 'header.php'; ?>

<body>
    <div class="container-fluid px-0 bg-light">
        <div class="row justify-content-between g-0">

            <div class="col-xl-2 col-lg-1">

                <?php require_once 'sidenav.php'; ?>
            </div>
            <div class="col-8">
                <div class="row g-0">
                    <div class="col-xl-5 col-lg-6 col-md-12 me-2 ms-4" style="width: 470px;">
                        <div class="card shadow-0 border my-4">
                            <div class="card-body py-3">
                                <div class="w-100 mb-1">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/8/8c/Cristiano_Ronaldo_2018.jpg" class=" rounded-circle border border-3 border-danger" style="object-fit:cover;" width="56" height="56" alt="">

                                </div>
                                <div class="fs-12 ms-1">
                                    cristiano
                                </div>

                            </div>
                        </div>
                        <?php
                        $ask_post = $db->prepare("SELECT * from post order by post_time desc");
                        $ask_post->execute();
                        $ask_post_count = $ask_post->rowCount();
                        $ask_post_2 = $db->prepare("SELECT * from post order by post_time desc");
                        $ask_post_2->execute();
                        $c = 0;
                        while ($post_asked = $ask_post->fetch(PDO::FETCH_ASSOC)) {
                            $c++;
                            $asked_post_2 = $ask_post_2->fetch(PDO::FETCH_ASSOC);

                            $ask_followed_post = $db->prepare("SELECT * FROM follow where following_nickname=:following_nickname and followed_nickname=:followed_nickname");
                            $ask_followed_post->execute(array(
                                'following_nickname' => strip_tags($post_asked['post_user_nickname_seo']),
                                'followed_nickname' => strip_tags($_SESSION['user_nickname_seo'])

                            ));

                            $post_followed_asked = $ask_followed_post->fetch(PDO::FETCH_ASSOC);

                            $ask_post_user = $db->prepare("SELECT * FROM users where user_nickname_seo=:user_nickname_seo");
                            $ask_post_user->execute(array(
                                'user_nickname_seo' => strip_tags($post_followed_asked['following_nickname'])
                            ));
                            $post_count = $ask_post_user->rowCount();
                            $post_user_asked = $ask_post_user->fetch(PDO::FETCH_ASSOC);

                            $ask_post_user_2 = $db->prepare("SELECT * FROM users where user_nickname_seo=:user_nickname_seo");
                            $ask_post_user_2->execute(array(
                                'user_nickname_seo' => strip_tags($_SESSION['user_nickname_seo'])
                            ));
                            $post_count_2 = $ask_post_user_2->rowCount();
                            $post_user_asked_2 = $ask_post_user_2->fetch(PDO::FETCH_ASSOC);


                            $check_post_like = $db->prepare("SELECT * FROM like_post where like_post_id=:like_post_id and like_user_nickname=:like_user_nickname");
                            $check_post_like->execute(array(
                                'like_post_id' => intval($post_asked['post_id']),
                                'like_user_nickname' => strip_tags($_SESSION['user_nickname_seo'])
                            ));
                            $like_count  = $check_post_like->rowCount();

                            $checked_post_like = $check_post_like->fetch(PDO::FETCH_ASSOC);

                            $post_like_count = $db->prepare("SELECT * FROM like_post where like_post_id=:like_post_id");
                            $post_like_count->execute(array(
                                'like_post_id' => intval($post_asked['post_id'])
                            ));
                            $post_like_count = $post_like_count->rowCount();
                            $ask_bookmark = $db->prepare("SELECT * FROM bookmark where bookmark_post_id=:bookmark_post_id and bookmark_user_nickname=:bookmark_user_nickname");
                            $ask_bookmark->execute(array(
                                'bookmark_post_id' => intval($post_asked['post_id']),
                                'bookmark_user_nickname' => strip_tags($_SESSION['user_nickname_seo'])
                            ));
                            $ask_bookmark_count = $ask_bookmark->rowCount();
                        ?>
                            <?php if ($post_count >= 1) { ?>

                                <div class="card shadow-0 border mb-3">
                                    <div class="card-header px-2">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <a href="p/<?php echo $post_user_asked['user_nickname_seo'] ?>">
                                                <div class="d-flex align-items-center ">
                                                    <img src="<?php echo $post_user_asked['user_avatar'] ?>" class="rounded-circle " style="object-fit: cover;" width="32" height="32" alt="" srcset="">

                                                    <div class="ms-2 text-black user_url"><small class="fw-bolder"><?php echo $post_asked['post_user_nickname_seo'] ?></small></div>
                                                </div>
                                            </a>
                                            <div class="me-2">
                                                <i class="fas fa-ellipsis-h post_buttons pointer fs-5"></i>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body p-0 text-center bg-black rounded-0 ">
                                        <img src="<?php echo $post_asked['post_image'] ?>" class="img-fluid rounded-0 img-cover post-image" alt="">
                                    </div>
                                    <div class="card-footer px-3">
                                        <div class="d-flex justify-content-between mb-3">
                                            <div class="svgs d-flex">
                                                <div class="me-3">
                                                    <?php if ($like_count >= 1) { ?>
                                                        <i class="fas fa-heart text-danger fs-4 post_buttons like_button like_btn_<?php echo intval($post_asked['post_id']) ?> pointer" data-like="<?php echo intval($post_asked['post_id']) ?>"> </i>

                                                    <?php } else { ?>
                                                        <i class="far fa-heart fs-4 post_buttons like_button like_btn_<?php echo intval($post_asked['post_id']) ?> pointer" data-like="<?php echo intval($post_asked['post_id']) ?>"> </i>

                                                    <?php } ?>
                                                </div>
                                                <div class="me-3">
                                                    <a data-mdb-toggle="modal" data-mdb-target="#<?php echo $post_asked['post_user_nickname_seo'] . "-" . $c ?>">
                                                        <svg aria-label="Yorum Yap" class="_ab6- post_buttons pointer" color="#262626" fill="#262626" height="24" role="img" viewBox="0 0 24 24" width="24">
                                                            <path d="M20.656 17.008a9.993 9.993 0 1 0-3.59 3.615L22 22Z" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="2"></path>
                                                        </svg>
                                                    </a>

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
                                                    <i class="fas fa-bookmark text-black fs-5 post_buttons pointer bookmarkButton bookmark_btn_<?php echo intval($post_asked['post_id']) ?>" data-bookmark-id="<?php echo intval($post_asked['post_id']) ?>"> </i>
                                                <?php } else { ?>
                                                    <i class="far fa-bookmark fs-5 post_buttons pointer bookmarkButton bookmark_btn_<?php echo intval($post_asked['post_id']) ?>" data-bookmark-id="<?php echo intval($post_asked['post_id']) ?>"> </i>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="fs-14 fw-bold like_text active_text text-black pointer" data-mdb-dismiss="modal" data-mdb-toggle="modal" data-mdb-target="#like_modal_<?php echo $post_asked['post_id'] ?>" data-post-like-id="<?php echo $post_asked['post_id'] ?>"><span class="post_like_count_text_<?php echo $post_asked['post_id'] ?>" data-post-id="<?php echo $post_asked['post_id'] ?>"><?php echo $post_like_count ?></span> beğenme</div>
                                        <div class="me-2 fs-14"> <a class="fw-bold" href="p/<?php echo $post_asked['post_user_nickname_seo'] ?>">
                                                <?php echo $post_asked['post_user_nickname_seo'] ?>
                                            </a>
                                            <?php echo $post_asked['post_description'] ?>
                                        </div>
                                        <?php
                                        $ask_limit_comment = $db->prepare("SELECT * FROM comment where comment_post_id=:comment_post_id LIMIT 2");
                                        $ask_limit_comment->execute(array(
                                            'comment_post_id' => intval($post_asked['post_id'])
                                        ));

                                        while ($get_limit_comment = $ask_limit_comment->fetch(PDO::FETCH_ASSOC)) {
                                        ?>
                                            <div class="me-2 fs-14"> <a class="fw-bold" href="p/<?php echo $get_limit_comment['comment_user_nickname'] ?>">
                                                    <?php echo $get_limit_comment['comment_user_nickname'] ?>
                                                </a>
                                                <span>
                                                    <?php echo $get_limit_comment['comment_desc'] ?>
                                                </span>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="modal fade" id="<?php echo $post_asked['post_user_nickname_seo'] . "-" . $c ?>" tabindex="-1" aria-labelledby="<?php echo $post_asked['post_user_nickname_seo'] . "-" . $count . "Label" ?>" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-xxl">
                                        <div class="modal-content">
                                            <div class="modal-body p-0">
                                                <div class="row g-0 bg-black">
                                                    <div class="col-8 text-center align-self-center">
                                                        <img src="<?php echo $post_asked['post_image'] ?>" class="img-fluid img-cover img-xxl vh-100" style="max-height: 886px!important;" alt="" srcset="">
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="card h-100 shadow-0 rounded-0 border border-top-0">
                                                            <div class="mb-0">
                                                                <div class="card-title border-bottom mb-0 d-flex align-items-center justify-content-between">
                                                                    <a href="p/<?php echo $post_asked['post_user_nickname_seo']  ?>">
                                                                        <div class="d-flex align-items-center mb-3 card-body p-2 pt-3 pb-0">
                                                                            <div class="me-3">
                                                                                <img src="<?php echo $post_user_asked['user_avatar'] ?>" class="img-fluid img-cover rounded-circle post-pp" width="32" height="32" alt="" srcset="">

                                                                            </div>
                                                                            <div class="fw-bold fs-14 user_url"><?php echo $post_user_asked['user_nickname_seo'] ?> </div>

                                                                        </div>
                                                                    </a>
                                                                    <div class="dropstart me-3">
                                                                        <i class="fas fa-ellipsis-h post_buttons pointer" id="postMenuButton_<?php echo $c ?>" data-mdb-toggle="dropdown" aria-expanded="false"></i>

                                                                        <ul class="dropdown-menu text-center" aria-labelledby="postMenuButton_<?php echo $c ?>">
                                                                            <li><a class="dropdown-item text-danger" href="#">Şikayet Et</a></li>
                                                                            <?php if ($_SESSION['user_nickname_seo'] == $get_comment_user['user_nickname_seo'] || $_SESSION['user_nickname_seo'] == $post_user_asked['user_nickname_seo']) { ?>
                                                                                <li class="deletePost pointer" data-post-id="<?php echo $post_asked['post_id'] ?>"><a class="dropdown-item text-danger">Sil</a></li>
                                                                            <?php } ?>
                                                                            <li><a class="dropdown-item pointer">İptal</a></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="card-body p-2 mt-1 comments">
                                                                <div class="row g-0">
                                                                    <div class="col-1 me-2">
                                                                        <a href="p/<?php echo $post_asked['post_user_nickname_seo']  ?>">

                                                                            <img src="<?php echo $post_user_asked['user_avatar'] ?>" class="img-fluid img-cover rounded-circle post-pp" width="32" height="32" alt="" srcset="">
                                                                        </a>
                                                                    </div>
                                                                    <div class="col-10 ms-1 mb-3">
                                                                        <a class="user_url" href="p/<?php echo $post_asked['post_user_nickname_seo']  ?>">

                                                                            <div class="fw-bold fs-14"><?php echo $post_user_asked['user_nickname_seo'] ?></div>
                                                                        </a>
                                                                        <span class="fw-normal"><?php echo $post_asked['post_description'] ?></span>
                                                                        <div class="text-muted fs-12">

                                                                            <?php echo convertMonthToTurkishCharacter(date("d F Y D", strtotime($post_asked['post_time']))); ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row g-0 commentBody-<?php echo $post_asked['post_id'] ?>">
                                                                    <?php
                                                                    $a = 0;
                                                                    $ask_comment = $db->prepare("SELECT * FROM comment where comment_post_id=:comment_post_id order by comment_time DESC");
                                                                    $ask_comment->execute(array(
                                                                        'comment_post_id' => intval($post_asked['post_id'])
                                                                    ));

                                                                    while ($get_comment = $ask_comment->fetch(PDO::FETCH_ASSOC)) {
                                                                        $a++;
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
                                                                                        <i class="fas fa-ellipsis-h post_buttons pointer" id="dropdownMenuButton" data-mdb-toggle="dropdown<?php echo $a ?>" aria-expanded="false"></i>

                                                                                        <ul class="dropdown-menu text-center" aria-labelledby="dropdownMenuButton<?php echo $a ?>">
                                                                                            <li><a class="dropdown-item text-danger" href="#">Şikayet Et</a></li>
                                                                                            <?php if ($_SESSION['user_nickname_seo'] == $get_comment_user['user_nickname_seo'] || $_SESSION['user_nickname_seo'] == $get_comment['comment_user_nickname']) { ?>
                                                                                                <li class="deleteComment pointer" data-post-id="<?php echo $post_asked['post_id'] ?>" comment-id="<?php echo $get_comment['comment_id'] ?>"><a class="dropdown-item text-danger">Sil</a></li>
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
                                                                                <i class="fas fa-heart text-danger fs-4 post_buttons like_button like_button_<?php echo intval($post_asked['post_id']) ?>  pointer" data-like="<?php echo intval($post_asked['post_id']) ?>"> </i>
                                                                            <?php } else { ?>
                                                                                <i class="far fa-heart fs-4 post_buttons like_button like_button_<?php echo intval($post_asked['post_id']) ?>  pointer" data-like="<?php echo intval($post_asked['post_id']) ?>"> </i>
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
                                                                            <i class="fas fa-bookmark text-black fs-5 post_buttons pointer bookmarkButton bookmark_modal_btn_<?php echo intval($post_asked['post_id']) ?>" data-bookmark-id="<?php echo intval($post_asked['post_id']) ?>"> </i>
                                                                        <?php } else { ?>
                                                                            <i class="far fa-bookmark fs-5 post_buttons pointer bookmarkButton bookmark_modal_btn_<?php echo intval($post_asked['post_id']) ?>" data-bookmark-id="<?php echo intval($post_asked['post_id']) ?>"> </i>
                                                                        <?php } ?>
                                                                    </div>
                                                                </div>
                                                                <div class="fs-14 fw-bold like_text active_text text-black pointer active_text" data-mdb-toggle="modal" data-mdb-target="#like_modal_<?php echo $post_asked['post_id'] ?>" data-post-like-id="<?php echo $post_asked['post_id'] ?>"><span class="post_modal_like_count_text_<?php echo $post_asked['post_id'] ?>" data-post-id="<?php echo $post_asked['post_id'] ?>"><?php echo $post_like_count ?></span> beğenme</div>

                                                                <div class="text-muted fs-13">
                                                                    <?php echo convertMonthToTurkishCharacter(date("d F Y D", strtotime($post_asked['post_time']))); ?>
                                                                </div>
                                                            </div>
                                                            <div class="input-group border-top py-2">
                                                                <textarea class="form-control border-0 custom-area comment" placeholder="Yorum ekle..." id="" cols="30" rows="20"></textarea>
                                                                <button class="btn btn-transparent border-0 shadow-0 text-capitalize text-primary shareComment" dpi="<?php echo $post_asked["post_id"] ?>">Paylaş</button>
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    </div>
                                </div>
                                <div class="modal fade" id="like_modal_<?php echo $post_asked['post_id'] ?>" tabindex="-1" aria-labelledby="like_modal_<?php echo $post_asked['post_id'] ?>Label" aria-hidden="true">
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
                            <?php if ($_SESSION['user_nickname_seo'] == $post_asked['post_user_nickname_seo']) { ?>
                                <div class="card shadow-0 border mb-3">
                                    <div class="card-header px-2">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <a href="p/<?php echo $post_asked['post_user_nickname_seo'] ?>">
                                                <div class="d-flex align-items-center ">
                                                    <img src="<?php echo $post_user_asked_2['user_avatar'] ?>" class="rounded-circle img-cover" width="32" height="32" alt="" srcset="">

                                                    <div class="ms-2 text-black user_url"><small class="fw-bolder"><?php echo $post_asked['post_user_nickname_seo'] ?></small></div>
                                                </div>
                                            </a>
                                            <div class="me-2">
                                                <i class="fas fa-ellipsis-h post_buttons pointer fs-5"></i>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body p-0 text-center bg-black rounded-0 ">
                                        <img src="<?php echo $post_asked['post_image'] ?>" class="img-fluid rounded-0 img-cover post-image" alt="">
                                    </div>
                                    <div class="card-footer px-3">
                                        <div class="d-flex justify-content-between mb-3">
                                            <div class="svgs d-flex">
                                                <div class="me-3">
                                                    <?php if ($like_count >= 1) { ?>
                                                        <i class="fas fa-heart text-danger fs-4 post_buttons like_button like_btn_<?php echo intval($post_asked['post_id']) ?> pointer" data-like="<?php echo intval($post_asked['post_id']) ?>"> </i>

                                                    <?php } else { ?>
                                                        <i class="far fa-heart fs-4 post_buttons like_button like_btn_<?php echo intval($post_asked['post_id']) ?> pointer" data-like="<?php echo intval($post_asked['post_id']) ?>"> </i>

                                                    <?php } ?>
                                                </div>
                                                <div class="me-3">
                                                    <a data-mdb-toggle="modal" data-mdb-target="#<?php echo $post_asked['post_user_nickname_seo'] . "-" . $c ?>">
                                                        <svg aria-label=" Yorum Yap" class="_ab6- post_buttons pointer" color="#262626" fill="#262626" height="24" role="img" viewBox="0 0 24 24" width="24">
                                                            <path d="M20.656 17.008a9.993 9.993 0 1 0-3.59 3.615L22 22Z" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="2"></path>
                                                        </svg>
                                                    </a>
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
                                                    <i class="fas fa-bookmark text-black fs-5 post_buttons pointer bookmarkButton bookmark_btn_<?php echo intval($post_asked['post_id']) ?>" data-bookmark-id="<?php echo intval($post_asked['post_id']) ?>"> </i>
                                                <?php } else { ?>
                                                    <i class="far fa-bookmark fs-5 post_buttons pointer bookmarkButton bookmark_btn_<?php echo intval($post_asked['post_id']) ?>" data-bookmark-id="<?php echo intval($post_asked['post_id']) ?>"> </i>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="fs-14 fw-bold like_text active_text text-black pointer"  data-mdb-toggle="modal" data-mdb-target="#like_modal_<?php echo $post_asked['post_id'] ?>" data-post-like-id="<?php echo $post_asked['post_id'] ?>"><span class="post_like_count_text_<?php echo $post_asked['post_id'] ?>" data-post-id="<?php echo $post_asked['post_id'] ?>"><?php echo $post_like_count ?></span> beğenme</div>
                                        <div class="me-2 fs-14"> <a class="fw-bold" href="p/<?php echo $post_asked['post_user_nickname_seo'] ?>">
                                                <?php echo $post_asked['post_user_nickname_seo'] ?>
                                            </a>
                                            <?php echo $post_asked['post_description'] ?>
                                        </div>
                                        <?php
                                        $ask_limit_comment = $db->prepare("SELECT * FROM comment where comment_post_id=:comment_post_id LIMIT 2");
                                        $ask_limit_comment->execute(array(
                                            'comment_post_id' => intval($post_asked['post_id'])
                                        ));

                                        while ($get_limit_comment = $ask_limit_comment->fetch(PDO::FETCH_ASSOC)) {
                                        ?>
                                            <div class="me-2 fs-14"> <a class="fw-bold" href="p/<?php echo $get_limit_comment['comment_user_nickname'] ?>">
                                                    <?php echo $get_limit_comment['comment_user_nickname'] ?>
                                                </a>
                                                <span>
                                                    <?php echo $get_limit_comment['comment_desc'] ?>
                                                </span>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="modal fade" id="<?php echo $post_asked['post_user_nickname_seo'] . "-" . $c ?>" tabindex="-1" aria-labelledby="<?php echo $post_asked['post_user_nickname_seo'] . "-" . $count . "Label" ?>" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-xxl">
                                        <div class="modal-content">
                                            <div class="modal-body p-0">
                                                <div class="row g-0 bg-black">
                                                    <div class="col-8 text-center align-self-center">
                                                        <img src="<?php echo $post_asked['post_image'] ?>" class="img-fluid img-cover img-xxl vh-100" style="max-height: 886px!important;" alt="" srcset="">
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="card h-100 shadow-0 rounded-0 border border-top-0">
                                                            <div class="mb-0">
                                                                <div class="card-title border-bottom mb-0 d-flex align-items-center justify-content-between">
                                                                    <a href="p/<?php echo $post_asked['post_user_nickname_seo']  ?>">
                                                                        <div class="d-flex align-items-center mb-3 card-body p-2 pt-3 pb-0">
                                                                            <div class="me-3">
                                                                                <img src="<?php echo $post_user_asked_2['user_avatar'] ?>" class="img-fluid img-cover rounded-circle post-pp" width="32" height="32" alt="" srcset="">

                                                                            </div>
                                                                            <div class="fw-bold fs-14 user_url"><?php echo $post_user_asked_2['user_nickname_seo'] ?> </div>

                                                                        </div>
                                                                    </a>
                                                                    <div class="dropstart me-3">
                                                                        <i class="fas fa-ellipsis-h post_buttons pointer" id="postMenuButton2<?php echo $c ?>" data-mdb-toggle="dropdown" aria-expanded="false"></i>

                                                                        <ul class="dropdown-menu text-center" aria-labelledby="postMenuButton2<?php echo $c ?>">
                                                                            <li><a class="dropdown-item text-danger" href="#">Şikayet Et</a></li>
                                                                            <?php if ($_SESSION['user_nickname_seo'] == $get_comment_user['user_nickname_seo'] || $_SESSION['user_nickname_seo'] == $post_user_asked_2['user_nickname_seo']) { ?>
                                                                                <li class="deletePost pointer" data-post-id="<?php echo $post_asked['post_id'] ?>"><a class="dropdown-item text-danger">Sil</a></li>
                                                                            <?php } ?>
                                                                            <li><a class="dropdown-item pointer">İptal</a></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="card-body p-2 mt-1 comments">
                                                                <div class="row g-0">
                                                                    <div class="col-1 me-2">
                                                                        <a href="p/<?php echo $post_asked['post_user_nickname_seo']  ?>">

                                                                            <img src="<?php echo $post_user_asked_2['user_avatar'] ?>" class="img-fluid img-cover rounded-circle post-pp" width="32" height="32" alt="" srcset="">
                                                                        </a>
                                                                    </div>
                                                                    <div class="col-10 ms-1 mb-3">
                                                                        <a class="user_url" href="p/<?php echo $post_asked['post_user_nickname_seo']  ?>">

                                                                            <div class="fw-bold fs-14"><?php echo $post_user_asked_2['user_nickname_seo'] ?></div>
                                                                        </a>
                                                                        <span class="fw-normal"><?php echo $post_asked['post_description'] ?></span>
                                                                        <div class="text-muted fs-12">

                                                                            <?php echo convertMonthToTurkishCharacter(date("d F Y D", strtotime($post_asked['post_time']))); ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row g-0 commentBody-<?php echo $post_asked['post_id'] ?>">
                                                                    <?php

                                                                    $ask_comment = $db->prepare("SELECT * FROM comment where comment_post_id=:comment_post_id order by comment_time DESC");
                                                                    $ask_comment->execute(array(
                                                                        'comment_post_id' => intval($post_asked['post_id'])
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
                                                                                        <i class="fas fa-ellipsis-h post_buttons pointer" id="dropdownMenuButton_<?php echo $c ?>" data-mdb-toggle="dropdown" aria-expanded="false"></i>

                                                                                        <ul class="dropdown-menu text-center" aria-labelledby="dropdownMenuButton_<?php echo $c ?>">
                                                                                            <li><a class="dropdown-item text-danger" href="#">Şikayet Et</a></li>
                                                                                            <?php if ($_SESSION['user_nickname_seo'] == $get_comment_user['user_nickname_seo'] || $_SESSION['user_nickname_seo'] == $get_comment['comment_user_nickname']) { ?>
                                                                                                <li class="deleteComment pointer" data-post-id="<?php echo $post_asked['post_id'] ?>" comment-id="<?php echo $get_comment['comment_id'] ?>"><a class="dropdown-item text-danger">Sil</a></li>
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
                                                                                <i class="fas fa-heart text-danger fs-4 post_buttons like_button like_button_<?php echo intval($post_asked['post_id']) ?>  pointer" data-like="<?php echo intval($post_asked['post_id']) ?>"> </i>
                                                                            <?php } else { ?>
                                                                                <i class="far fa-heart fs-4 post_buttons like_button like_button_<?php echo intval($post_asked['post_id']) ?>  pointer" data-like="<?php echo intval($post_asked['post_id']) ?>"> </i>
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
                                                                            <i class="fas fa-bookmark text-black fs-5 post_buttons pointer bookmarkButton bookmark_modal_btn_<?php echo intval($post_asked['post_id']) ?>" data-bookmark-id="<?php echo intval($post_asked['post_id']) ?>"> </i>
                                                                        <?php } else { ?>
                                                                            <i class="far fa-bookmark fs-5 post_buttons pointer bookmarkButton bookmark_modal_btn_<?php echo intval($post_asked['post_id']) ?>" data-bookmark-id="<?php echo intval($post_asked['post_id']) ?>"> </i>
                                                                        <?php } ?>
                                                                    </div>
                                                                </div>
                                                                <div class="fs-14 fw-bold like_text active_text text-black pointer active_text" data-mdb-toggle="modal" data-mdb-target="#like_modal_<?php echo $post_asked['post_id'] ?>" data-post-like-id="<?php echo $post_asked['post_id'] ?>"><span class="post_modal_like_count_text_<?php echo $post_asked['post_id'] ?>" data-post-id="<?php echo $post_asked['post_id'] ?>"><?php echo $post_like_count ?></span> beğenme</div>

                                                                <div class="text-muted fs-13">
                                                                    <?php echo convertMonthToTurkishCharacter(date("d F Y D", strtotime($post_asked['post_time']))); ?>
                                                                </div>
                                                            </div>
                                                            <div class="input-group border-top py-2">
                                                                <textarea class="form-control border-0 custom-area comment" placeholder="Yorum ekle..." id="" cols="30" rows="20"></textarea>
                                                                <button class="btn btn-transparent border-0 shadow-0 text-capitalize text-primary shareComment" dpi="<?php echo $post_asked["post_id"] ?>">Paylaş</button>
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    </div>
                                </div>
                                <div class="modal fade" id="like_modal_<?php echo $post_asked['post_id'] ?>" tabindex="-1" aria-labelledby="like_modal_<?php echo $post_asked['post_id'] ?>-aLabel" aria-hidden="true">
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
                        <?php } ?>
                    </div>
                    <div class="col-xl-5 col-lg-5 d-xl-block d-none align-items-start " style="width: 350px;">
                        <div class="card bg-transparent shadow-0 border-0 mt-4 pt-1 ">
                            <div class="card-body">
                                <div class="row align-items-center mb-3">
                                    <div class="col-lg-2">
                                        <a href="p/<?php echo $_SESSION['user_nickname_seo'] ?>">

                                            <img src="<?php echo $get_user['user_avatar'] ?>" class="rounded-circle" style="object-fit: cover;" width="56" height="56" alt="">
                                        </a>

                                    </div>

                                    <div class="col-lg-7">
                                        <div class="ms-3">
                                            <a class="user_url" href="p/<?php echo $_SESSION['user_nickname_seo'] ?>">
                                                <div class="fs-13 overflow-hidden"><?php echo $get_user['user_nickname_seo'] ?></div>
                                            </a>

                                            <div class="fs-13 text-muted"><?php echo $get_user['user_fullname'] ?></div>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <a href="" class="fs-13 text-primary">Geçiş yap</a>
                                    </div>

                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <div class="fs-15 text-muted">Senin için öneriler</div>
                                    <div class="fs-13 text-dark">Tümünü gör</div>
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-lg-2">
                                        <img src="https://cdn.discordapp.com/attachments/787452173134594068/1046001156029153290/unknown.png" class="rounded-circle" width="32" height="32" alt="" srcset="">
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="fs-13">yemreeceylan</div>
                                        <div class="fs-13 text-muted">Senin için öneriliyor</div>
                                    </div>
                                    <div class="col-lg-3">
                                        <a href="" class="fs-13 text-primary">Takip et</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer border-0">
                                <div class="mb-3">
                                    <a href="" class="text-muted fs-12">Hakkında</a>
                                    &#183;
                                    <a href="" class="text-muted fs-12">Yardım</a>
                                    &#183;
                                    <a href="" class="text-muted fs-12">Basın</a>
                                    &#183;
                                    <a href="" class="text-muted fs-12">API</a>
                                    &#183;
                                    <a href="" class="text-muted fs-12">iş Fırsatları</a>
                                    &#183;
                                    <a href="" class="text-muted fs-12">Gizlilik</a>
                                    &#183;
                                    <a href="" class="text-muted fs-12">Koşullar</a>
                                    &#183;
                                    <a href="" class="text-muted fs-12">Konumlar</a>
                                    &#183;
                                    <a href="" class="text-muted fs-12">Dil</a>
                                </div>
                                <div class="text-muted fs-12">© 2022 INSTAGRAM FROM META</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<script>
    $(document).ready(function() {
        var sib = $("#anasayfa");
        var p = $(sib).children("path").attr("fill","");
        
        $(sib).next().addClass("fw-bold-600 text-black");

    });
</script>
<?php require_once 'footer.php'; ?>