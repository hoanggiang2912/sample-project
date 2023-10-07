<?php 
    extract($detail);
    // print_r($product);
    extract($product);
    function galleryRender ($arr) {
        foreach ($arr as $item) {
            extract($item);
            echo '
                <div class="gallery__item col-4">
                    <img src="./views/assets/images/'.$source.'" alt="">
                </div>
            ';
        }
    }
    function renderProductSpect ($specs) {
        // echo var_dump($specs);
        if ($specs) {
            for ($i = 1; $i < count($specs[0]) - 1; $i++) {
                echo '<li class="nav__item spec__item text">' . $specs[0]["spec$i"] . '</li>';
            }
        }
    }
    function renderProductOptions ($options) {
        if ($options) {
            for ($i = 1; $i < count($options[0]) - 3; $i++) {
                echo '<li class="select__option">' . $options[0]["option$i"] . '</li>';
            }
        }
    }
    
    $html = '';
    $soldoutLabel = '';
    if ($amount > 0) {
        $html = '
            <form action="index.php?pg=addCart" method="post" class="flex-column g12">
                <button type="submit" name="addToCart" class="btn outline__btn"><i class="fa-solid fa-cart-plus" style="padding-inline: 10px;"></i>THÊM VÀO GIỎ HÀNG</button>
                <input type="hidden" name="name" value="'.$name.'">
                <input type="hidden" name="price" value="'.$price.'">
                <input type="hidden" name="img" value="'.$img.'">
                <input type="hidden" name="qty" id="data-qty" value="1">
                <button type="submit" name="buy" class="btn primary__btn">MUA NGAY</button>
            </form>
        ';
    } else {
        $html = '
            <form action="" class="form waitlist__form flex-column g12">
                <h4 class="sub-title tac">Join wait list</h4>
                <span class="label">We will inform you when the product arrives in stock. Please leave your valid email address below.</span>
                <div class="form__group flex-full">
                    <input type="text" class="form__input full" placeholder="Email">
                    <span class="form__message"></span>
                </div>
                <div class="form__group flex-full">
                    <input type="text" class="form__input full" placeholder="Quantity">
                    <span class="form__messsage"></span>
                </div>
                <button class="btn form__btn primary__btn">Email me when available</button>
            </form>
        ';
        $soldoutLabel = '<h4 class="product__status product__status--soldout">Sold out</h4>';
    }

    // product description render start
    // print_r($description);
    // product description render end
    $loginFormStatus = '';
    if (isset($_SESSION['user']) && $_SESSION['user'] != '') {
        $usernameView = $_SESSION['user']['name'];
        $passwordView = $_SESSION['user']['password'];
    } else {
        $usernameView = '';
        $passwordView = '';
    }
    $errorMessage = '';
    
    // comment rendering 
    function renderComment ($arr) {
        $html = '';
        if (isset($_SESSION['user']))
            extract($_SESSION['user']);
        foreach ($arr as $item) {
            extract($item);
            $user = getUserById($id_user);
            extract($user);
            $html .= '
                <div class="customer-review__item">
                    <div class="flex-column g12">
                        <div class="row g12">
                            <div class="avt rf">
                                <img src="./views/assets/images/customer4.png" alt="">
                            </div>
                            <div class="customer__info flex-column g8">                                
                            <div class="customer__detail flex-center g8">
                                <h4 class="customer__name bold">' . $username . '</h4>
                                <span for="" class="verified__label body-text3">Verified</span>
                            </div>
                            <span class="customer-info__date body-text3">14/5/2023</span>
                            </div>
                        </div>
                        <p class="text smb">' . $content . '</p>
                    </div>
                    <div class="flex-between mt12">
                        <ul class="function-list flex g20">
                            <li class="nav__item">
                                <a href="" class="nav__link">
                                    <i class="far fa-thumbs-up"></i>
                                </a>
                            </li>
                            <li class="nav__item">
                                <a href="" class="nav__link">
                                    <i class="far fa-thumbs-down"></i>
                                </a>
                            </li>
                            <li class="nav__item">
                                <a href="" class="nav__link">
                                    <i class="far fa-message"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="customer__review__pictures">
                        <div class="product__gallery__wrapper row g12">
                            
                        </div>
                    </div>
                </div>
            ';
        }
        return $html;
    }
?>

<!-- || product detail section start -->
<section class="section product-detail-section" style="margin-top: 8rem">
    <div class="detail__wrapper row full">
        <div class="detail__gallery col-2 flex-column p10">
            <div class="gallery__main">
                <img src="./views/assets/images/<?= $img ?>" alt="">
            </div>
            <div class="gallery__item__wrapper row">
                <?php 
                    galleryRender($galleryImages);
                ?>
            </div>
        </div>
        <div class="product-detail col-2 flex-column p10 g20">
            <h1 class="product__name"><?= $name ?></h1>
            <h2 class="product__price">$<?= $price ?></h2>
            <?= $soldoutLabel ?>
            <!-- <h4 class="product__status product__status--instock">Sold out</h4> -->
            <ul class="product__specs">
                <?php
                    renderProductSpect($productSpect);
                ?>
            </ul>
            <div class="product__options full">
                <span class="label">Chọn switch <span class="required">*</span></span>
                <div class="dropdown-select product__dropdown full mt6">
                    <div class="select__option active toggle__select toggle__kind flex-between"><span>Choose option</span><i class="fa-solid fa-chevron-down"></i></div>
                    <ul class="select-option__list">
                        <li class="select__option selected">Choose option</li>
                        <?= renderProductOptions($productOptions) ?>
                    </ul>
                </div>
            </div>
            <div class="product__detail__content product__qty__oneset">
                <div class="label bold">Số lượng:</div>
                <div class="product__qty__input row r4">
                    <button class="btn minus__btn">-</button>
                    <input type="number" value="1" min="0" max="100" class="form__input qty__input" style="color: #333">
                    <button class="btn plus__btn">+</button>
                </div>
            </div>
            <?= $html ?>
            
        </div>
    </div>
</section>
<!-- || product detail section end -->

<!-- || product description start -->
<section class="section product-description__section flex-column g20 product-detail-section" >
    <div class="full tac mb30">
        <h2 class="title">THÔNG TIN MÔ TẢ</h2>
    </div>
    <!-- Retooled Mold -->
    <div class="description-item__container retooled__mold col-1" style="padding-block: 60px">
        <h2 class="description__title">Thay đổi cấu trúc khuôn</h2>
        <p class="text smb">Switch Gateron Milky Pro(KS-3 Pro) được cộng đồng và những người đam mê switch ưa chuộng. Các switch này kết hợp các khuôn được trang bị lại, giảm độ rung của thân và tăng cảm giác mượt mà. Chúng là những linear switch vượt trội với cảm giác mượt mà hơn nhiều so với các phiên bản trước. Gateron Milky Pro có vỏ màu trắng đục, thân lớn hơn và âm thanh mạnh hơn.</p>
    </div>
    <!-- Gold Alloy Contact -->
    <div class="description-item__container flex-center gold__alloy__contact">
        <div class="description-content__wrapper col-2">
            <h2 class="description__title">Chân tiếp xúc chéo bằng hợp kim vàng</h2>
            <p class="text smb">Gateron Milky Pro được thiết kế với phần chân tiếp xúc bằng hợp kim vàng thay vì phần tiếp xúc mạ vàng chi phí thấp hơn được sử dụng trong phiên bản cũ. Bằng cách đó, chúng có chất lượng chống oxy hóa tốt hơn và bảo vệ chống ăn mòn toàn diện hơn.</p>
        </div>
        <div class="description__banner col-2"><img src="./views/assets/images/gold-alloy-contact.png" alt=""></div>
    </div>
    <!-- Linear Typing Experience -->
    <div class="description-item__container flex-center linear__experience">
        <div class="description-content__wrapper">
            <h2 class="description__title">Trải nghiệm gõ mượt mà</h2>
            <p class="text smb">Có hai phiên bản switch để lựa chọn, Milky Red Pro và Milky Yellow Pro, mỗi phiên bản sẽ mang đến cho bạn trải nghiệm gõ phím khác nhau.</p>
        </div>
        <div class="description__banner"><img src="./views/assets/images/linear__typing.png" alt=""></div>
    </div>
    <!-- Lightly Pre-lubed -->
    <div class="description-item__container flex-center pre__lubed">
        <div class="description-content__wrapper">
            <h2 class="description__title">Được PRE-LUBED mượt mà</h2>
            <p class="text smb">Tất cả các switches đã được lube một lớp mỏng trong nhà máy để mang lại cho bạn trải nghiệm tốt nhất có thể.</p>
        </div>
        <div class="description__banner"><img src="./views/assets/images/lightly__pre-lubed.png" alt=""></div>
    </div>
</section>
<!-- || product description end -->

<!-- || product rating start -->
<div class="overlay message-overlay <?= $loginFormStatus ?> flex-center" style="z-index: 1000">
    <form action="index.php?pg=login" method="post" class="form log-in__form common-box flex-column g20 r8 p20">
        <div class="flex-column g8">
            <h2 class="title form__title">ĐĂNG NHẬP</h2>
            <p class="body-text2 tac" style="line-height: 2.2rem">Bạn cần phải đăng nhập để sử dụng đầy đủ chức năng</p>
        </div>
        <div class="form__group flex-column">
            <label for="" class="form__label">Username</label>
            <input type="text" class="form__input name" name="name" placeholder=" " value="<?= $usernameView ?>">
            <span class="form__message"></span>
        </div>
        <div class="form__group flex-column">
            <label for="" class="form__label">Password</label>
            <input type="text" class="form__input password" name="password" placeholder=" " value="<?= $passwordView ?>">
            <span class="form__message"></span>
        </div>
        <?= $errorMessage ?>
        <input type="submit" name="login" class="btn form__btn primary__btn" value="Đăng nhập">
        <div class="flex-center">
            <a class="body-text3 underline forgot-password">Quên mật khẩu</a>
        </div>
        <div class="flex-center">
            <p class="body-text3">Bạn chưa có tài khoản? <a href="index.php?pg=createAccount"
                    class="body-text3 underline">Tạo ngay</a></p>
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
</div>
<script>
    const messageOverlay = jQuery('.message-overlay');
    if (messageOverlay) {
        messageOverlay.click(e => {
            messageOverlay.removeClass('active');
        });
    }
</script>
<section class="section customer-review__section product-detail-section" >
    <h2 class="title mb30 ttu">đánh giá từ khách hàng</h2>
    <form action="index.php?pg=viewProductDetail&productId=<?= $productId ?>" method="post" class="form comment__form flex-column mb30">
        <div class="form__group flex-between v-center">
            <input type="text" class="form__input full" name="comment" placeholder="Viết nhận xét...">
            <input type="submit" hidden id="addComment" name="addComment">
            <label class="label send__btn" for="addComment"><i class="far fa-paper-plane"></i></label>
        </div>
        <div class="flex-between">
            <ul class="function-list flex g20">
                <li class="nav__item">
                    <a href="" class="nav__link">
                        <i class="far fa-camera"></i>
                    </a>
                </li>
                <li class="nav__item">
                    <a href="" class="nav__link">
                        <i class="far fa-smile"></i>
                    </a>
                </li>
                <li class="nav__item">
                    <a href="" class="nav__link">
                        <i class="far fa-gift"></i>
                    </a>
                </li>
            </ul>
            <li class="nav__item">
                <a href="" class="nav__link">
                    <i class="far fa-times"></i>
                </a>
            </li>
        </div>
    </form>
    <div class="customer__reviews flex-column g20">
        <?= renderComment($comments) ?>
    </div>
    <button class="btn outline__btn mt30">Load more</button>
</section>
<!-- || product rating end -->