<?php
    if (isset($_SESSION['user'])) {
        extract($_SESSION['user']);
    }
?>

<!-- || footer start -->
<footer class="footer">
    <div class="footer__top">
        <a href="index.php" class="logo v-center mb12">
            <img src="./views/assets/images/logo.svg" alt="">
            <span>typistial</span>
        </a>
        <div class="footer__top__main flex-between row full g20">
            <div class="col-4 flex-column">
                <div class="text">
                    Đăng ký email vào danh sách email của chúng tôi để trở thành người đầu tiên nhận được thông tin về
                    sản phẩm mới , chương trình giảm giá , giảm giá, giảm giá và nhiều hơn nữa! Thêm vào đó, bạn sẽ nhận
                    được phiếu giảm giá áp dụng cho đơn hàng đầu tiên.
                </div>
                <form action="" class="email__form mt12" method="post">
                    <div class="form__group">
                        <input type="text" class="form__input full" placeholder="Email">
                        <span class="form__message"></span>
                    </div>
                    <button type="submit" class="btn form__btn primary__btn mt12 full">Đăng ký ngay </button>
                </form>
            </div>
            <div class="col-4 footer-nav flex-column">
                <h2 class="mb12 ttu bold footer-nav__title">Shop</h2>
                <ul class="v-nav">
                    <li class="nav__item"><a href="index.php?pg=viewProduct" class="nav__link text">TẤT CẢ SẢN PHẨM</a></li>
                    <li class="nav__item"><a href="index.php?pg=viewProduct&idcatalog=2" class="nav__link text">KEYCAPS</a></li>
                    <li class="nav__item"><a href="index.php?pg=viewProduct&idcatalog=3" class="nav__link text">SWITCHES</a></li>
                    <li class="nav__item"><a href="index.php?pg=viewProduct&idcatalog=1" class="nav__link text">KEYBOARDS</a></li>
                    <li class="nav__item"><a href="./user/index.php?pg=general&user=<?= $id ?>" class="nav__link text">TÀI KHOẢN</a></li>
                </ul>
            </div>
            <div class="col-4 footer-nav flex-column">
                <h2 class="mb12 ttu bold footer-nav__title">typistial</h2>
                <ul class="v-nav">
                    <li class="nav__item"><a href="index.php?pg=aboutUs" class="nav__link text">VỀ TÁC GIẢ</a></li>
                    <li class="nav__item"><a href="index.php?pg=contact" class="nav__link text">LIÊN HỆ</a></li>
                    <li class="nav__item"><a href="#" class="nav__link text">CHÍNH SÁCH HOÀN TRẢ</a></li>
                    <li class="nav__item"><a href="" class="nav__link text">ĐIỀU KHOẢN DỊCH VỤ</a></li>
                </ul>
            </div>
            <div class="col-4 footer-nav flex-column">
                <h2 class="mb12 ttu bold footer-nav__title">INFO</h2>
                <ul class="v-nav">
                    <li class="nav__item"><a href="" class="nav__link text">NHẬN XÉT</a></li>
                    <li class="nav__item"><a href="" class="nav__link text">HỔ TRỢ</a></li>
                    <li class="nav__item"><a href="" class="nav__link text">CẬP NHẬT SẢN PHẨM</a></li>
                    <li class="nav__item"><a href="" class="nav__link text">BÁN SỈ</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer__bottom mt60 flex-center flex-column">
        <p class="text bold body-text3">© 2023 TYPISTIAL ™</p>
        <p class="text bold body-text3">ALL RIGHT RESERVED</p>
        <ul class="icon__nav row g20 mt12">
            <a href="" class="nav__item">
                <i class="fa-brands fa-facebook"></i>
            </a>
            <a href="" class="nav__item">
                <i class="fa-brands fa-twitter"></i>
            </a>
            <a href="" class="nav__item">
                <i class="fa-brands fa-youtube"></i>
            </a>
        </ul>
    </div>
</footer>
<!-- || footer end -->
</div>
</body>
</html>
<script src="./views/assets/resources/js/jquery.js"></script>
<script src="./views/assets/resources/js/main.js"></script>