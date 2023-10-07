<?php 
    
?>
<!-- || big text start -->
<h1 class="big-text">account</h1>
<!-- || big text end -->

<!-- || form section start -->
<section class="section form__section mt100 p60">
    <main class="form__wrapper flex-center">
        <form action="index.php?pg=createAccount" method="post" class="form create-account__form flex-column g30 r8">
            <h2 class="title form__title">TẠO TÀI KHOẢN</h2>
            <div class="form__group">
                <input type="text" class="form__input userName" name="userName" placeholder=" ">
                <label for="" class="form__label">Username</label>
                <span class="form__message"></span>
            </div>
            <div class="form__group">
                <input type="text" class="form__input email" name="email" placeholder=" ">
                <label for="" class="form__label">Email</label>
                <span class="form__message"></span>
            </div>
            <div class="form__group">
                <input type="text" class="form__input password" name="password" placeholder=" ">
                <label for="" class="form__label">Password</label>
                <i class="far fa-eye-slash poa toggle-password"></i>
                <span class="form__message"></span>
            </div>
            <?=$message?>
            <input type="submit" name="createAccount" class="btn form__btn primary__btn" value="Tạo tài khoản">
            <div class="flex-center">
                <p class="body-text3">Đã có tài khoản? <a href="index.php?pg=login" class="body-text3 underline">Đăng nhập ngay</a></p>
            </div>
            <br class="break-line">
            <div class="flex-column g12">
                <h4 class="smb tac">Hoặc đăng nhập bằng các cách khác</h4>
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
        formSelector: '.create-account__form',
        formGroupSelector: '.form__group',
        formMessage: '.form__message',
        rules: [
            Validator.isRequired('.userName'),
            Validator.isRequired('.email'),
            Validator.isEmail('.email'),
            Validator.isRequired('.password'),
            Validator.isPassword('.password' , 8),
        ]
    })
</script>