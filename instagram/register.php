<?php require_once 'header.php'; ?>

<body class="custom-bg">
    <div class="row g-0 justify-content-center">
        <div class="col-lg-3 ms-3 px-5 mt-3">
            <div class="card shadow-0 border mb-3 rounded-0 px-3">
                <div class="card-body px-4">
                    <div class="text-center p-3 my-3">
                        <i data-visualcompletion="css-img" aria-label="Instagram" class="" role="img" style="background-image: url(&quot;https://static.cdninstagram.com/rsrc.php/v3/yi/r/ZFtnMBJnHU_.png&quot;); background-position: 0px -554px; background-size: auto; width: 175px; height: 51px; background-repeat: no-repeat; display: inline-block;"></i>
                    </div>
                    <p class="fw-bold text-center text-muted">
                        Arkadaşlarının fotoğraf ve videolarını görmek için kaydol.
                    </p>
                    <button class="btn btn-primary btn-block text-capitalize mb-5">Facebook ile Giriş Yap</button>
                    <div class="or-text"><span class="fs-13 text-muted">YA DA</span></div>
                    <form action="admin/database.php" method="POST">

                        <div class="mb-2">
                            <input type="text" name="user_mail" class="form-control form-control-lg fs-12 border-color custom-bg" placeholder="Cep Telefonu Numarası veya E-posta">
                        </div>
                        <div class="mb-2">
                            <input type="text" name="user_fullname" class="form-control form-control-lg fs-12 border-color custom-bg" placeholder="Adı Soyadı">
                        </div>
                        <div class="mb-2">
                            <input type="text" name="user_nickname" class="form-control form-control-lg fs-12 border-color custom-bg" placeholder="Kullanıcı Adı">
                        </div>

                        <div class="mb-3">
                            <input type="password" name="user_password" class="form-control form-control-lg fs-15 border-color custom-bg" placeholder="Şifre">
                        </div>
                        <div class="text-muted text-center fs-13 mb-3">
                            Hizmetimizi kullanan kişiler senin iletişim bilgilerini Instagram'a yüklemiş olabilir. Daha Fazla Bilgi Al
                        </div>
                        <p class="text-muted text-center fs-13">
                            Kaydolarak, Koşullarımızı, Gizlilik İlkemizi ve Çerezler İlkemizi kabul etmiş olursun.
                        </p>


                        <button class="btn btn-primary btn-block text-capitalize" style="background: #0095F6;" name="registration_button" type="submit">Kaydol</button>


                    </form>


                </div>
            </div>
            <div class="card shadow-0 border rounded-0">
                <div class="card-body py-3 text-center">
                    <div class="fs-14">Hesabın var mı? <a href="login" class="text-primary">Giriş yap</a></div>
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
</body>