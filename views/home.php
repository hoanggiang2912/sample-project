<?php 
    // connect product model
    require_once './models/product.php';
    $keyboards = getProductsByCatalogId(1);
    $keycaps = getProductsByCatalogId(2);
    $switches = getProductsByCatalogId(3);
    $kits = getProductsByCatalogId(4);

    $catalogs = getCatalogs();

    function bannerRender ($bannerArr) {
        foreach ($bannerArr as $item) {
            extract($item);
            $path = "./views/assets/images/$source";
            echo '
                <div class="slider__item" style="background-image: url('.$path.');">
                    <div class="text__center">
                        <h4 class="text-center__label">'.$banner_subtext.'</h4>
                        <h2 class="text-center__spotlight">'.$banner_name.'<h2>
                        <h5 class="text-center__origin">'.$banner_description.'</h5>
                        <button class="btn banner__btn">MUA NGAY</button>
                    </div>
                </div>
            ';
        }
    }

    // render partner banner start
    
    // render partner banner end
?>
        <!-- || hero banner start -->
        <div class="container-full slider__container hero-banner">
            <div class="slider__main">
                <!-- slider render start -->
                <?=bannerRender ($heroBanner)?>
                <!-- slider render end -->
            </div>
            <i class="fa-solid fa-chevron-left prev__btn slider__btn"></i>
            <i class="fa-solid fa-chevron-right next__btn slider__btn"></i>   
        </div>
        <!-- hero banner end -->


        <!-- || product section start -->
        <section class="section">
            <h2 class="title ttu section__title mb30">sản phẩm của chúng tôi</h2>
            <div class="tab__container full">
                <div class="flex-center tabs g30">
                    <div class="tab__item active ttu">Keyboards</div>
                    <div class="tab__item ttu">Switches</div>
                    <div class="tab__line"></div>
                </div>
                <div class="panels">
                    <!-- Keyboard panel -->
                    <div class="panel panel__item active">
                        <div class="row product__wrapper mt30">
                            <!-- single product start -->
                            <?= renderGeneralProduct($keyboards) ?>
                            <!-- single product end -->
                        </div>
                        <div class="flex-center mt30">
                            <a href="index.php?pg=viewProduct?idCatalog=1" class="btn outline__btn">Xem thêm</a>
                        </div>
                    </div>
                    <!-- switches panel -->
                    <div class="panel panel__item">
                        <div class="row product__wrapper mt30">
                            <!-- single product start -->
                            <?= renderGeneralProduct($switches) ?>
                            <!-- single product end -->
                        </div>
                        <div class="flex-center mt30">
                            <a href="" class="btn outline__btn">Xem thêm</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- || product section end -->
        
        
        <!-- || product section start -->
        <section class="section">
            <h2 class="title ttu section__title mb30">Những sản phẩm khác</h2>
            <div class="tab__container full">
                <div class="flex-center tabs g30">
                    <div class="tab__item ttu active">KITS</div>
                    <div class="tab__item ttu">KEYCAPS</div>
                    <div class="tab__line"></div>
                </div>
                <div class="panels">
                    <!-- kits panel -->
                    <div class="panel panel__item active">
                        <div class="row product__wrapper mt30 flex-between">
                            <!-- single product start -->
                            <?= renderGeneralProduct($kits)?>
                            <!-- single product end -->
                        </div>
                        <div class="flex-center mt30">
                            <a href="index.php?pg=viewProduct?idCatalog=4" class="btn outline__btn">Xem thêm</a>
                        </div>
                    </div>
                    <!-- keycaps panel -->
                    <div class="panel panel__item">
                        <div class="row product__wrapper mt30">
                            <!-- single product start -->
                            <?= renderGeneralProduct($keyboards) ?>
                            <!-- single product end -->
                        </div>
                        <div class="flex-center mt30">
                            <a href="index.php?pg=viewProduct?idCatalog=1" class="btn outline__btn">Xem thêm</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- || product section end -->
        
        <!-- || help banner start -->
        <div class="help-banner full" style="background: url('./views/assets/images/typing-up-close_1950x.webp') no-repeat center center / cover;">
            <div class="text__center flex-column g12">
                <h5 class="text-center__label">ĐỪNG CHẦN CHỪ</h5>
                <h2 class="text-center__spotlight">CHÚNG TÔI Ở ĐÂY ĐỂ GIÚP BẠN</h2>
                <div class="row">
                    <button class="btn help__btn">LIÊN HỆ NGAY</button>
                    <button class="btn order__btn">ĐẶT CHỖ TRỢ GIÚP</button>
                </div>
            </div>
        </div>
        <!-- || help banner end -->

        <!-- || news section start -->
        <section class="section pre-built__section flex-column">
            <h2 class="title mb30">PRE-BUILT KEYBOARDS</h2>
            <h4 class="sub-title tac mb30">“Save time ! Let’s us build your keyboard</h4>
            <main class="row full pre-built__main">
                <div class="col-2 common-banner pre-built__banner" style="background-image: url('./views/assets/images/odin-75-sparklight-keycaps.jpg')"></div>
                <div class="col-2 flex-column g12">
                    <h2 class="title tal name">ODIN 75 HOT-SWAP KEYBOARD WITH PBTFANS SPARK LIGHT KEYCAPS</h2>
                    <h2 class="title price tal">$407.00</h2>
                    <h2 class="title tal rc">THÀNH PHẦN:</h2>
                    <ul class="v-nav ml12">
                        <li class="nav__item body-text2">Case: Top aluminum, bottom aluminum</li>
                        <li class="nav__item body-text2">Wired version PCB: Hot-swap version, Flex cut, without RGB effect, 1.2mm thickness</li>
                        <li class="nav__item body-text2">Notes: Support VIA and VIAL(It is recommended to use VIA). VIAL's firmware is not official</li>
                        <li class="nav__item body-text2">Plate: Polycarbonate and FR4</li>
                        <li class="nav__item body-text2">Structure: Leaf spring mount; 75% layout</li>
                        <li class="nav__item body-text2">Interface: USB-C</li>
                        <li class="nav__item body-text2">Translucent OLED Screen... <a class="primary-text underline">XEM THÊM</a></li>
                        <li class="nav__item body-text2"></li>
                    </ul>
                </div>
            </main>
        </section>
        <!-- || news section end -->

        <!-- || wait list section start -->
        <section class="section waitlist__section flex-column">
            <h2 class="title mb30">THAM GIA DANH SÁCH CHỜ</h2>
            <main class="row full waitlist__main g20">
                <div class="col-2 common-banner waitlist__banner" style="background-image: url('./views/assets/images/banner4.webp')"></div>
                <div class="col-2 waitlist__content">
                    <h2 class="title mb30 rc tal">DANH SÁCH CHỜ BAUER LITE</h2>
                    <p class="text body-text2">
                        Chúng tôi đã phát triển và tiết lộ đôi chút về Bauer Lite trong thời gian dài và đang trong quá trình biến nó trở thành hiện thực. Những thông tin bạn sắp điền dưới đây này là cách giúp chúng tôi biết bạn có cảm thấy hứng thú với sản phẩm này hay không để chúng tôi có được sự chuẩn bị tốt hơn co sự ra mắt của sản phẩm. Bạn cũng sẽ nhận được những cập nhật về sản phẩm như thời điểm ra mắt. Điều này hoàn toàn khác với việc đăng nhập email thông thường. Chúng tôi đang cố gắng gắng hết sức để đem đến cho bạn một sản phẩm chất lượng nhất chúng tôi từng sản xuất từ trước đến nay và chúng tôi thật sự biết ơn với những người dã ủng hộ và hỗ trợ chúng tôi.
                    </p>
                    <form method="post" action="" class="waitlist__form flex-column mt12">
                        <div class="form__group full">
                            <input class="form__input full" placeholder="Email" name="email">
                            <span class="form__message"></span>
                        </div>
                        <button type="submit" class="btn primary__btn form__btn">Đăng ký ngay</button>
                    </form>
                </div>
            </main>
        </section>
        <!-- || wait list section end -->

        <!-- || partners section start -->
        <section class="section partner__section">
            <h2 class="title ttu">NHỮNG ĐỐI TÁC CỦA CHÚNG TÔI</h2>
            <main class="row partner__main flex-between mt60 g20">
                <div class="col-6 common-banner" style="background-image: url('./views/assets/images/partner-1.webp')"></div>
                <div class="col-6 common-banner" style="background-image: url('./views/assets/images/partner-2.webp')"></div>
                <div class="col-6 common-banner" style="background-image: url('./views/assets/images/partner-3.webp')"></div>
                <div class="col-6 common-banner" style="background-image: url('./views/assets/images/partner-4.webp')"></div>
                <div class="col-6 common-banner" style="background-image: url('./views/assets/images/partner-5.png')"></div>
            </main>
        </section>
        <!-- || partners section end -->

        <!-- || collections section start -->
        <section class="section collections__section">
            <h2 class="title">TẤT CẢ SẢN PHẨM CỦA CHÚNG TÔI</h2>
            <main class="section__main collections__main full row mt60 flex-between">
                <!-- single collection start -->
                <?= renderCollectionItem($catalogs)?>
                <!-- single collection end -->
            </main>
        </section>
        <!-- || collections section end -->
<script>
</script>
