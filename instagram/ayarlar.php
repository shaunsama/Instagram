<?php require_once 'header.php'; ?>

<body class="custom-bg">
    <div class="container-fluid px-0 ">
        <div class="row g-0">
            <div class="col-xl-3 me-5 col-lg-1">

                <?php require_once 'sidenav.php'; ?>
            </div>
            <div class="col-xl-6 col-lg-11 mt-3 ms-5 ps-4 mb-4 settings-menu">
                <div class="row g-0 mt-3 ">
                    <div class="col-12 ">
                        <div class="card shadow-0 border rounded-0">
                            <div class="row g-0">
                                <div class="col-3 d-xl-block d-lg-block d-md-none d-none">
                                    <ul class="list-group rounded-0 border-end h-100">
                                        <li class="list-group-item bg-transparent border-0 active-left-line active-left-line-effect py-3 settings-li">
                                            <a target="accsett" class="pointer settings-button" id="accsett">Profili düzenle</a>
                                        </li>
                                        <li class="list-group-item bg-transparent border-0 active-left-line-effect py-3 settings-li">
                                            <a target="sifredegistir" class="pointer settings-button" id="sifredegistir">Şifreyi değiştir</a>
                                        </li>
                                        <li class="list-group-item bg-transparent border-0 active-left-line-effect py-3 settings-li">
                                            <a target="app_site" class="pointer settings-button" id="app_site">Uygulamalar ve internet siteleri</a>
                                        </li>
                                        <li class="list-group-item bg-transparent border-0 active-left-line-effect py-3 settings-li">
                                            <a target="emails" class="pointer settings-button" id="emails">E-posta bildirimleri</a>
                                        </li>
                                        <li class="list-group-item bg-transparent border-0 active-left-line-effect py-3 settings-li">
                                            <a target="sifredegistir" class="pointer settings-button" id="sifredegistir">Anında ileti bildirimleri</a>
                                        </li>
                                        <li class="list-group-item bg-transparent border-0 active-left-line-effect py-3 settings-li">
                                            <a target="contact" class="pointer settings-button" id="contact">Kişileri yönet</a>
                                        </li>
                                        <li class="list-group-item bg-transparent border-0 active-left-line-effect py-3 settings-li">
                                            <a target="privacy_and_security" class="pointer settings-button" id="privacy_and_security">Gizlilik ve güvenlik</a>
                                        </li>
                                        <li class="list-group-item bg-transparent border-0 active-left-line-effect py-3 settings-li">
                                            <a target="ads" class="pointer settings-button" id="ads">Reklamlar</a>
                                        </li>
                                        <li class="list-group-item bg-transparent border-0 active-left-line-effect py-3 settings-li">
                                            <a target="supervision" class="pointer settings-button" id="supervision">Gözetim</a>
                                        </li>
                                        <li class="list-group-item bg-transparent border-0 active-left-line-effect py-3 settings-li">
                                            <a target="emails_sent" class="pointer settings-button" id="emails_sent">Instagram'dan E-postalar</a>
                                        </li>
                                        <li class="list-group-item bg-transparent border-0 active-left-line-effect py-3 settings-li">
                                            <a target="help" class="pointer settings-button" id="help">Yardım</a>
                                        </li>
                                        <li class="list-group-item bg-transparent border-0 py-3">
                                            <a class="pointer text-primary fs-13" id="profacc">Profesyonel hesaba geçiş yap</a>
                                        </li>
                                        <li class="list-group-item bg-transparent border-0 border-top">
                                            <div class="mb-1">
                                                <img class="img-fluid img-cover" width="60" src="images/dimg/meta-logo.png" alt="" srcset="">
                                            </div>
                                            <div class="w-100">
                                                <a class="pointer text-primary fs-16" id="profacc">Hesaplar Merkezi</a>
                                                <p class="fs-12 text-muted mt-2">Hikaye, gönderi paylaşımı ve giriş yapma dahil Instagram, Facebook, Messenger arasındaki bağlantılı deneyimler için ayarları kontrol et.</p>

                                            </div>
                                        </li>
                                    </ul>

                                </div>
                                <div class="col-9 settingsBody">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<?php require_once 'footer.php'; ?>