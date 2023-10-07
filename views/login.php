<?php 
    if (isset($_SESSION['user']) && $_SESSION['user'] != '') {
        $usernameView = $_SESSION['user']['userName'];
        $passwordView = $_SESSION['user']['password'];
    } else {
        $usernameView = '';
        $passwordView = '';
    }
?>
<!-- || big text start -->
<h1 class="big-text">login</h1>
<!-- || big text end -->

<!-- || form section start -->
<section class="section form__section mt100 p60">
    <main class="form__wrapper flex-center">
        <form action="index.php?pg=login" method="post" class="form log-in__form flex-column g30 r8">
            <h2 class="title form__title">ĐĂNG NHẬP</h2>
            <div class="form__group">
                <input type="text" class="form__input name" name="name" placeholder=" " value="<?= $usernameView ?>">
                <label for="" class="form__label">Username</label>
                <span class="form__message"></span>
            </div>
            <div class="form__group">
                <input type="text" class="form__input password" name="password" placeholder=" " value="<?= $passwordView ?>">
                <label for="" class="form__label">Password</label>
                <i class="far fa-eye-slash poa toggle-password"></i>
                <span class="form__message"></span>
            </div>
            <?=$errorMessage?>
            <input type="submit" name="login" class="btn form__btn primary__btn" value="Đăng nhập">
            <div class="flex-center">
                <a class="body-text3 underline forgot-password">Quên mật khẩu</a>
            </div>
            <div class="flex-center">
                <p class="body-text3">Bạn chưa có tài khoản? <a href="index.php?pg=createAccount" class="body-text3 underline">Tạo ngay</a></p>
            </div>
            <div class="flex-column g12">
                <h4 class="smb tac body-text3">Hoặc đăng nhập bằng các cách khác</h4>
                <ul class="icon__nav flex-center g12">
                    <li class="nav__item"><a href="" class="nav__link"><i class="fa-brands fa-google"></i></a></li>
                    <li class="nav__item"><a href="" class="nav__link"><i class="fa-brands fa-facebook"></i></a></li>
                    <li class="nav__item"><a href="" class="nav__link"><i class="fa-brands fa-instagram"></i></a></li>
                    <li class="nav__item"><a href="" class="nav__link"><i class="fa-brands fa-twitter"></i></a></li>
                    <li class="nav__item"><a href="" class="nav__link"><i class="fa-brands fa-github"></i></a></li>
                </ul>
            </div>
        </form>
    </main>
</section>
<!-- || form section end -->
<script>
    Validator({
        formSelector: '.log-in__form',
        formGroupSelector: '.form__group',
        formMessage: '.form__message',
        rules: [
            Validator.isRequired('.name'),
            Validator.isRequired('.password'),
            Validator.isPassword('.password'),
        ]
    })
</script>