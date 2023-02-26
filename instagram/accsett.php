<?php require_once 'header.php'; ?>

<div class="p-5 py-4 mt-2">
    <div class="row justify-content-center">
        <div class="col-xl-12 col-lg-10 col-12">
            <form action="admin/database.php" class="m-0" method="post">
                <div class="row mb-3">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-3">
                        <div class="bg-image rounded-circle d-inline-flex">
                            <img src="<?php echo $get_user['user_avatar'] ?>" class="img-fluid img-cover settings-photo rounded-circle" alt="" srcset="">
                        </div>
                    </div>
                    <div class="fs-20 col-lg-10 col-9"><?php echo $get_user['user_nickname_seo'] ?></div>
                </div>
                <div class="row g-0">
                    <div class="col-lg-2 col-12">
                        <label for="user_fullname" class="fw-settings me-4 form-label">Adın</label>
                    </div>
                    <div class="col-lg-10 col-12">
                        <input type="text" class="form-control form-control-m text-black" name="user_fullname" id="user_fullname" value="<?php echo $get_user['user_fullname'] ?>">
                        <div class="mb-2 mt-3">
                            <p class="fs-12 text-muted col-10 me-3 mb-2">
                                Adın ve soyadın, takma adın veya işletmenin adı gibi tanındığın bir adı kullanarak insanların hesabını keşfetmesine yardımcı ol.
                            </p>
                            <p class="fs-12 text-muted col-10 me-3">
                                Adını 14 gün içinde sadece iki kez değiştirebilirsin.
                            </p>
                        </div>

                    </div>

                    <div class="col-lg-2 col-12 m">
                        <label for="user_nickname_seo" class="fw-settings me-4 form-label w-100">Kullanıcı Adı</label>
                    </div>
                    <div class="col-lg-10 col-12 mb-3">
                        <input type="text" class="form-control form-control-m text-black " disabled id="user_nickname_seo" value="<?php echo $get_user['user_nickname_seo'] ?>">
                        <div class="fs-12 text-muted mt-2">Çoğu durumda, kullanıcı adını 14 gün içinde yeniden değiştirip medofficialnew yapabileceksin. Daha fazla bilgi al</div>

                    </div>

                    <div class="col-lg-2 col-12">
                        <label class="fw-settings me-4 form-label">İnternet sitesi</label>
                    </div>
                    <div class="col-lg-10 col-12 mb-3">
                        <input type="text" class="form-control form-control-m text-black" disabled value="<?php echo $get_user['user_website'] ?>">
                        <div class="fs-12 text-muted mt-2">Bağlantılarını sadece mobil cihazlarda düzenleyebilirsin. Biyografindeki internet sitelerini değiştirmek için Instagram uygulamasını ziyaret et ve profilini düzenle.</div>

                    </div>

                    <div class="col-lg-2 col-12">
                        <label for="user_bio" class="fw-settings me-4 form-label">Biyografi</label>
                    </div>
                    <div class="col-lg-10 col-12 mb-4">
                        <textarea type="text" class="form-control form-control-m text-black mb-1" name="user_bio" id="user_bio"><?php echo $get_user['user_bio'] ?></textarea>
                        <span class="text-muted  end-0 fs-12 me-3">
                            <r id="bio_count">0</r>/150
                        </span>
                        <div class="fs-12 text-muted mt-4">
                            <div class="card-title fw-bold mb-0">Kişisel bilgiler</div>

                            Hesap bir işletme, evcil hayvan veya başka bir şey için kullanılıyor olsa da kişiler bilgilerini gir. Bu kısımlar herkese açık profilinde görünmeyecek.
                        </div>
                    </div>

                    <div class="col-lg-2 col-12">
                        <label for="user_mail" class="fw-settings me-4 form-label w-100">E-posta</label>
                    </div>
                    <div class="col-lg-10 col-12 mb-4">
                        <input type="text" class="form-control form-control-m text-black" name="user_mail" id="user_mail" value="<?php echo $get_user['user_mail'] ?>">
                    </div>

                    <div class="col-lg-2 col-12">
                        <label for="user_gsm" class="fw-settings me-4 form-label w-100">GSM</label>
                    </div>
                    <div class="col-lg-10 col-12 mb-4">
                        <input type="text" maxlength="10" class="form-control form-control-m text-black" name="user_gsm" id="user_gsm" placeholder="Telefon numarası" value="<?php echo $get_user['user_gsm'] ?>">
                    </div>

                    <div class="col-lg-2 col-12">
                        <label class="fw-settings me-4 form-label w-100">Benzer hesap önerileri</label>
                    </div>
                    <div class="col-lg-10 col-12">
                        <div class="form-check mb-4">
                            <input class="form-check-input mt-3" type="checkbox" value="" id="hesap_onerileri" />
                            <label class="form-check-label fs-15 fw-bold" for="hesap_onerileri">İnsanlara takip etmek isteyebilecekleri benzer hesaplar tavsiye edilirken hesabını tavsiyeler arasına ekle.</label>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <button class="btn btn-primary text-capitalize btn-cyan shadow-0 p-2 py-1 fs-14 mt-1 me-3" name="user_data_save" type="submit">Gönder</button>
                            <a href="" class="text-primary fs-14 mt-2">Hesabımı geçici olarak dondur</a>
                        </div>
                    </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        var bio_count = $("#bio_count");
        var user_bio = $("#user_bio");
        $(bio_count).text($(user_bio).val().length);
        $(user_bio).attr('maxlength', 150);
        $(document).on('input', "#user_bio", function() {
            $(bio_count).text($(user_bio).val().length);

        });
    });
</script>