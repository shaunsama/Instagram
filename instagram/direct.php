<?php require_once 'header.php'; ?>

<body class="custom-bg">
    <div class="container-fluid px-0 ">
        <div class="row g-0">
            <div class="col-xl-3 me-5 col-lg-1">

                <?php require_once 'sidenav.php'; ?>
            </div>
            <div class="col-xl-6 col-lg-11 mt-3 ms-5 ps-4 mb-4 settings-menu">
                <div class="row g-0 mt-3 ">
                    <div class="col-12 m-">
                        <div class="card shadow-0 border rounded-0 ">
                            <div class="row g-0">
                                <div class="col-4 d-xl-block h-100">
                                    <ul class="list-group rounded-0 border-end vh-100 m-card">

                                        <?php

                                        $check_direct = $db->prepare("SELECT * FROM follow where followed_nickname=:followed_nickname");
                                        $check_direct->execute(array(
                                            'followed_nickname' => strip_tags($_SESSION['user_nickname_seo'])
                                        ));

                                        while ($get_direct = $check_direct->fetch(PDO::FETCH_ASSOC)) {
                                            $check_following_user = $db->prepare("SELECT * FROM users where user_nickname_seo=:user_nickname_seo");
                                            $check_following_user->execute(array(
                                                'user_nickname_seo' => strip_tags($get_direct['following_nickname'])
                                            ));
                                            $checked_following_user = $check_following_user->fetch(PDO::FETCH_ASSOC);


                                        ?>
                                            <li class="list-group-item bg-transparent border-0 py-3 direct-li pointer">



                                                <div class="d-flex align-items-center align-items-center direct-button" target="<?php echo strip_tags($get_direct['following_nickname']) ?>">
                                                    <div class="overflow-circle rounded-circle">
                                                        <img style="width:50px!important;height:50px!important;object-fit:cover!important;" class="img-fluid rounded-circle" src="<?php echo $checked_following_user['user_avatar'] ?>" alt="">
                                                    </div>
                                                    <div class="ms-3">
                                                        <div class="text-capitalize fs-14 text-muted"> <?php echo $checked_following_user['user_fullname'] ?></div>
                                                    </div>
                                                </div>



                                            </li>
                                        <?php } ?>

                                    </ul>

                                </div>
                                <div class="col-8 m-cl h-100">
                                    <div class="directBody h-100 py-2"></div>
                                    <div class="p-3">
                                        <input type="text" class="form-control form-control-lg rounded-pill align-self-end message_send" data-receiver="<?php echo $_REQUEST['message_receiver_nickname'] ?>" placeholder="Mesaj...">
                                    </div>

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
        $(".message_send").hide();
        $("#title").html(`Instagram &#183; Sohbetler`);
        var target = "";
        $(document).on("click", ".direct-button", function(e) {
            if ($(this).parent().hasClass("direct-active")) {

            } else {


                $(".direct-li").removeClass("direct-active");
                $(this).parent().toggleClass("direct-active");
                target = $(this).attr("target");
                var message_send = $(".message_send").attr("data-receiver", target);

                e.preventDefault();
                if (target.length) {

                    $.get("directBody.php", {
                        message_receiver_nickname: target
                    }).done(function(data) {
                        // Display the returned data in browser
                        $(".directBody").html(data);
                        $(".directBody").scrollTop($(".directBody").height());
                        $(".message_send").show();
                    });
                }

            }

        });

        setInterval(getMessages, 1000); //300000 MS == 5 minutes
        $(".directBody").scrollTop($(".directBody").height());

        function getMessages() {

            $.get("directBody.php", {
                message_receiver_nickname: target
            }).done(function(data) {
                // Display the returned data in browser
                $(".directBody").html(data);

            });
        }



        $(document).on('keyup', '.message_send', function(e) {
            e.preventDefault();
            var receiver_nickname = $(this).attr("data-receiver");

            if (e.keyCode == 13) {
                var message_desc = $(this).val();

                if (message_desc.length) {
                   
                    var values4 = {
                        'message_desc': message_desc,
                        'receiver_nickname': receiver_nickname
                    };
                    $.ajax({
                        type: "POST",
                        url: "admin/database.php",
                        data: values4,
                        success: function() {
                            $(this).val("");
                            $.get("directBody.php", {
                                message_receiver_nickname: receiver_nickname
                            }).done(function(data) {
                                // Display the returned data in browser
                                $(".directBody").html(data);

                                $(".directBody").scrollTop($(".directBody").height());

                            });
                        }.bind(this),
                        error: function(e) {
                            alert(e);

                        }

                    });

                }
            }
        });


        var sib = $("#mesaj");
        $(sib).children(".i").remove();
        $(sib).children("path").attr("d", "M12.003 1.131a10.487 10.487 0 0 0-10.87 10.57 10.194 10.194 0 0 0 3.412 7.771l.054 1.78a1.67 1.67 0 0 0 2.342 1.476l1.935-.872a11.767 11.767 0 0 0 3.127.416 10.488 10.488 0 0 0 10.87-10.57 10.487 10.487 0 0 0-10.87-10.57Zm5.786 9.001-2.566 3.983a1.577 1.577 0 0 1-2.278.42l-2.452-1.84a.63.63 0 0 0-.759.002l-2.556 2.049a.659.659 0 0 1-.96-.874L8.783 9.89a1.576 1.576 0 0 1 2.277-.42l2.453 1.84a.63.63 0 0 0 .758-.003l2.556-2.05a.659.659 0 0 1 .961.874Z");
        $(sib).next().addClass("fw-bold-600 text-black");



    });
</script>
<?php require_once 'footer.php'; ?>