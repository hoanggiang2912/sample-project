<?php 
    extract($detail);
    function galleryRender ($arr) {
        foreach ($arr as $item) {
            extract($item);
            echo '
                <div class="gallery__item">
                    <img src="./views/layout/assets/images/'.$source.'" alt="">
                </div>
            ';
        }
    }
    function renderProductSpect ($specs) {
        // echo var_dump($specs);
        if ($specs) {
            for ($i = 1; $i < count($specs[0]) - 1; $i++) {
                echo '<li class="spec__item">' . $specs[0]["spec$i"] . '</li>';
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
            <form action="index.php?pg=addCart" method = "post" style="width: 100%">
                <button type="submit" class="product__btn" style="width: 100%"><i class="fa-solid fa-cart-plus" style="padding-inline: 10px;"></i>THÊM VÀO GIỎ HÀNG</button>
                <input type="hidden" name="name" value="<?= $name ?>">
                <input type="hidden" name="price" value="<?= $price ?>">
                <input type="hidden" name="img" value="<?= $img ?>">
                <input type="hidden" name="qty" value="1">
            </form>
            <div class="buy-now">
                <button class="product__btn buy-now__btn">MUA NGAY</button>
                <div class="qty__label">
                    <img src="./views/layout/assets/images/qty__instock.svg" alt="">
                    <span>
                        <?= $amount ?>
                    </span>
                </div>
            </div>
        ';
    } else {
        $html = '
            <div class="buy-now">
                <button class="product__btn wishlist__btn"><i class="fal fa-heart"></i> Add to wish list</button>
            </div>
        ';
        $soldoutLabel = '<div class="soldout__label">Sold out</div>';
    }

    // product description render start
    // print_r($description);
    // product description render end
?>

<!-- || product detail section start -->
<section class="section product-detail-section" style="padding-inline: 20rem; margin-top: 8rem">
    <div class="detail__wrapper row full">
        <div class="detail__gallery col-2 flex-column p10">
            <div class="gallery__main">
                <img src="/app/views/assets/images/Gateron-KS-3-Milky-Yellow-Pro-Switch-Set_360x.webp" alt="">
            </div>
            <div class="gallery__item__wrapper row">
                <div class="gallery__item col-4"><img
                        src="/app/views/assets/images/Gateron-KS-3-Milky-Yellow-Pro-Switch-Set_360x.webp" alt=""></div>
                <div class="gallery__item col-4"><img
                        src="/app/views/assets/images/Gateron-KS-3-Milky-Red-Pro-Switch-Set_800x.webp" alt=""></div>
                <div class="gallery__item col-4"><img
                        src="/app/views/assets/images/Gateron-KS-3-Milky-Yellow-Pro-Switch_800x.webp" alt=""></div>
                <div class="gallery__item col-4"><img src="/app/views/assets/images/Gateron-KS-3-Milky-Red-Pro-Switch_800x.webp"
                        alt=""></div>
            </div>
        </div>
        <div class="product-detail col-2 flex-column p10 g20">
            <h1 class="product__name">Gateron KS-3 Milky Pro Switch Set</h1>
            <h2 class="product__price">$29.00</h2>
            <h4 class="product__status product__status--instock">Sold out</h4>
            <h4 class="product__status product__status--soldout">Sold out</h4>
            <ul class="product__specs">
                <li class="nav__item specs__item">Structure: Gasket Mount</li>
                <li class="nav__item specs__item">Number of Keys: 68</li>
                <li class="nav__item specs__item">Case Material: Acrylic+CNC</li>
                <li class="nav__item specs__item">Keycaps: ASA BOW Keycap Set (English version)</li>
                <li class="nav__item specs__item">Switch: Akko CS Crystal Switch</li>
                <li class="nav__item specs__item">Plate: Polycarbonate plate</li>
                <li class="nav__item specs__item">Gasket: Silicone</li>
                <li class="nav__item specs__item">PCB Thickness:1.2mm</li>
                <li class="nav__item specs__item">Plate Foam: Poron</li>
                <li class="nav__item specs__item">Switch Pad: Silicone</li>
                <li class="nav__item specs__item">Case Foam: EVA</li>
                <li class="nav__item specs__item">Stabilizers: Akko Plate Mount Lubed Stabilizer (supports screw-in stabilizer as well)</li>
                <li class="nav__item specs__item">Hot-Swappable: Yes</li>
            </ul>
            <div class="product__options full">
                <span class="label">Chọn switch <span class="required">*</span></span>
                <div class="dropdown-select product__dropdown full mt6">
                    <div class="select__option active toggle__select toggle__kind flex-between"><span>All</span><i class="fa-solid fa-chevron-down"></i></div>
                    <ul class="select-option__list">
                        <li class="select__option selected">All</li>
                        <li class="select__option">Product name A - Z</li>
                        <li class="select__option">Product name Z - A</li>
                        <li class="select__option">Price highest - lowest</li>
                        <li class="select__option">Price lowest - highest</li>
                    </ul>
                </div>
            </div>
            <div class="product__detail__content product__qty__oneset">
                <div class="label bold">Số lượng:</div>
                <div class="product__qty__input row r4">
                    <button class="btn minus__btn">-</button>
                    <input type="number" value="1" min="0" max="100" class="qty__input">
                    <button class="btn plus__btn">+</button>
                </div>
            </div>
            <form action="" method="post" class="flex-column g12">
                <button type="submit" name="addToCart" class="btn outline__btn"><i class="fa-solid fa-cart-plus" style="padding-inline: 10px;"></i>THÊM VÀO GIỎ HÀNG</button>
                <button type="submit" name="buy" class="btn primary__btn">MUA NGAY</button>
            </form>
            <form action="" class="form waitlist__form flex-column g12">
                <h4 class="sub-title tac">Join wait list</h4>
                <span class="label">We will inform you when the product arrives in stock. Please leave your valid email address below.</span>
                <div class="form__group">
                    <input type="text" class="form__input" placeholder="Email">
                    <span class="form__message"></span>
                </div>
                <div class="form__group">
                    <input type="text" class="form__input" placeholder="qty">
                    <span class="form__messsage"></span>
                </div>
                <button class="btn form__btn primary__btn">Email me when available</button>
            </form>
        </div>
    </div>
</section>
<!-- || product detail section end -->

<!-- || product description start -->
<section class="section product-description__section flex-column g20" style="padding-inline: 20rem;">
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
        <div class="description__banner col-2"><img src="/app/views/assets/images/gold-alloy-contact.png" alt=""></div>
    </div>
    <!-- Linear Typing Experience -->
    <div class="description-item__container flex-center linear__experience">
        <div class="description-content__wrapper">
            <h2 class="description__title">Trải nghiệm gõ mượt mà</h2>
            <p class="text smb">Có hai phiên bản switch để lựa chọn, Milky Red Pro và Milky Yellow Pro, mỗi phiên bản sẽ mang đến cho bạn trải nghiệm gõ phím khác nhau.</p>
        </div>
        <div class="description__banner"><img src="/app/views/assets/images/linear__typing.png" alt=""></div>
    </div>
    <!-- Lightly Pre-lubed -->
    <div class="description-item__container flex-center pre__lubed">
        <div class="description-content__wrapper">
            <h2 class="description__title">Được PRE-LUBED mượt mà</h2>
            <p class="text smb">Tất cả các switches đã được lube một lớp mỏng trong nhà máy để mang lại cho bạn trải nghiệm tốt nhất có thể.</p>
        </div>
        <div class="description__banner"><img src="/app/views/assets/images/lightly__pre-lubed.png" alt=""></div>
    </div>
</section>
<!-- || product description end -->

<!-- || product rating start -->
<section class="section customer-review__section" style="padding-inline: 20rem">
    <h2 class="title mb30">PHẢN HỒI TỪ KHÁCH HÀNG</h2>
    <div class="customer__reviews flex-column g20">
        <div class="customer-review__item">
            <div class="flex-column g12">
                <div class="row g12">
                    <div class="avt rf">
                        <img src="/app/views/assets/images/customer4.png" alt="">
                    </div>
                    <div class="customer__info flex-column g8">
                        <div class="stars flex-center g2">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <span class="customer-info__date body-text3">14/5/2023</span>
                        </div>
                        <div class="customer__detail flex-center g8">
                            <h4 class="customer__name bold">Wade Warren</h4>
                            <span for="" class="verified__label body-text3">Verified</span>
                        </div>
                    </div>
                </div>
                <h4 class="bold review-product__name">Milky Yellow Pro Switch Set</h4>
                <p class="text smb">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quibusdam non sequi modi labore quo omnis ad temporibus? Tenetur ipsa illo libero. Id impedit sunt sint numquam dolores odio fuga accusantium!</p>
            </div>
            <div class="customer__review__pictures">
                <div class="product__gallery__wrapper row g12">
                    <div class="gallery__item"><img src="/app/views/assets/images/gateron-ks3-milky-yellow-pro-s witch2-1659327257718.webp" alt="">
                    </div>
                    <div class="gallery__item"><img src="/app/views/assets/images/gateron-ks3-milky-yellow-pro-switches-1659327297587.webp"
                            alt=""></div>
                    <div class="gallery__item"><img src="/app/views/assets/images/gateron-ks3-milky-yellow-pro-switches-1659327297587.webp"
                            alt=""></div>
                </div>
            </div>
        </div>
    </div>
    <button class="btn outline__btn mt30">Load more</button>
</section>
<!-- || product rating end -->