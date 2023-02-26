<?php require_once 'header.php'; ?>

<div class="p-5 py-4 mt-2">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-12">
            <form action="admin/database.php" class="m-0" method="post">
                <div class="row mb-3">
                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-3">
                        <div class="bg-image rounded-circle d-inline-flex">
                            <img src="<?php echo $get_user['user_avatar'] ?>" class="img-fluid img-cover settings-photo rounded-circle" alt="" srcset="">
                        </div>
                    </div>
                    <div class="fs-20 col-lg-10 col-9"><?php echo $get_user['user_nickname_seo'] ?></div>
                </div>
                <div class="row g-0 align-items-center mt-3">
                    <div class="col-lg-2 col-12">
                        <label for="user_password" class="fw-settings me-4 form-label w-100">Eski şifre</label>
                    </div>
                    <div class="col-lg-10 col-12">
                        <input type="password" class="form-control form-control-lg text-black custom-bg" name="user_password" id="user_password">
                    </div>

                    <div class="my-2"></div>

                    <div class="col-lg-2 col-12">
                        <label for="user_new_password" class="fw-settings me-4 form-label w-100">Yeni şifre</label>
                    </div>
                    <div class="col-lg-10 col-12">
                        <input type="password" class="form-control form-control-lg text-black custom-bg" name="user_new_password" id="user_new_password">
                    </div>

                    <div class="my-2"></div>

                    <div class="col-lg-2 col-12">
                        <label for="user_new_password2" class="fw-settings me-4 form-label w-100">Yeni şifreyi tekrar gir</label>
                    </div>
                    <div class="col-lg-10 col-12">
                        <input type="password" class="form-control form-control-lg text-black custom-bg" name="user_new_password2" id="user_new_password2" value="">

                    </div>
                    <div class="col-2 d-lg-block d-none"></div>
                    <div class="col-lg-10">
                        <div class="my-4">
                            <button class="btn btn-cyan text-transform-none shadow-0 border fs-14 py-1 px-2" name="change_password" type="submit">Şifreyi değiştir</button>
                        </div>
                        <a href="sifremiunuttum" class="text-primary fs-14">Şifreni mi unuttun?</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>