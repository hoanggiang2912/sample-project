<?php 
    // require_once 'orderValidate.php';    
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart']))  {
        $total = 0;
        foreach ($_SESSION['cart'] as $item) {
            extract($item);
            $total += $qty * $price;
        }
    }
    // print_r($_SESSION['user']);
?>

<script>
    jQuery(document).ready(() => {
        jQuery('.checkout__form').submit(function (e) {
            e.preventDefault(); // Prevent the default form submission

            // Get form data
            const country = jQuery('#country').val()
            const address = jQuery('#address').val()
            const email = jQuery('#email').val()
            const tel = jQuery('#tel').val()
            const shipping = jQuery('input[name="shipping"]:checked').val()
            const submit = jQuery('#submit').val();

            // Check if a shipping method is selected
            if (typeof shipping === 'undefined') {
                // Display an error message or take appropriate action
                jQuery('#error-check').html('<span class="error">Please select a shipping method</span>');
                return; // Exit the function without making the AJAX request
            }

            // Perform AJAX request to validate the form data
            jQuery.ajax({
                type: 'POST',
                url: 'http://localhost/sample-project/views/orderValidate.php',
                data: {
                    country: country,
                    address: address,
                    email: email,
                    tel: tel,
                    shipping: shipping,
                    submit: submit
                }
            }).done(function (response) {
                // Check if the server returned success
                if (response.success) {
                    // Display a success message
                    console.log('Success:', response.message);

                    // Redirect the user if needed
                    if (response.redirect) {
                        window.location.href = response.redirect;
                    }
                } else {
                    // Display an error message
                    console.error('Error:', response.message);
                    console.log(response);
                }
            }).fail(function (xhr, status, error) {
                // This function will be executed when the AJAX request fails
                console.error('AJAX Error:', error, status, xhr);
            });
        });
    })
</script>


<section class="section checkout-main__section">
    
    <!-- cart nav start -->
    <?php 
        require_once 'paymentNav.php';
    ?>
    <!-- cart nav end -->

    <form action="index.php?pg=order" method="post" class="bill-info__form checkout__form full row mt20">
        <main class="bill-info__body checkout-main__body r12 p20 flex-column flex-full g20">
            <div class="form__group">
                <label for="" class="form__label">Chọn quốc gia</label>
                <select name="country" id="country" class="form__input">
                    <option value="1" selected>VietNam</option>
                    <option value="2">USA</option>
                    <option value="3">England</option>
                </select>
                <span class="form__message"></span>
            </div>
            <hr class="break-line">
            <label class="form__label">Địa chỉ đặt hàng</label>
            <div class="form__group">
                <label for="" class="form__label">
                    Địa chỉ <span class="required">*</span>
                </label>
                <input type="text" name="address" id="address" class="form__input">
                <span class="form__message"></span>
            </div>
            <div class="form__group">
                <label for="" class="form__label">Email <span class="required">*</span></label>
                <input type="text" class="form__input" id="email" name="email">
                <span class="form__message"></span>
            </div>
            <div class="form__group">
                <label for="" class="form__label">Số điện thoại <span class="required">*</span></label>
                <input type="text" class="form__input" id="tel" name="tel">
                <span class="form__message"></span>
            </div>
            <hr class="break-line">
            <div class="shipping__options r8 flex-column g12">
                <label for="" class="form__label">Phương thức vận chuyển <span class="required">*</span></label>
                <label for="free" class="shipping__option flex-between">
                    <div class="row g12">
                        <i class="fa-regular fa-circle option__btn"></i>
                        <i class="fa-regular fa-circle-check option__btn"></i>
                        <div>
                            <h5 class="option__name">Miễn phí</h5>
                            <p>7 - 30 ngày (tùy quốc gia)</p>
                        </div>
                    </div>
                    <p class="shipping__price">$0</p>
                </label>
                <label for="standard" class="shipping__option flex-between">
                    <div class="row g12">
                        <i class="fa-regular fa-circle-check option__btn"></i>
                        <i class="fa-regular fa-circle option__btn"></i>
                        <div>
                            <h5 class="option__name">Thông thường</h5>
                            <p>3 - 14 ngày (tùy quốc gia)</p>
                        </div>
                    </div>
                    <p class="shipping__price">$11</p>
                </label>
                <label for="fast" class="shipping__option flex-between">
                    <div class="row g12">
                        <i class="fa-regular fa-circle option__btn"></i>
                        <i class="fa-regular fa-circle-check option__btn"></i>
                        <div>
                            <h5 class="option__name">Hỏa tốc</h5>
                            <p>1 - 3 ngày (tùy quốc gia)</p>
                        </div>
                    </div>
                    <p class="shipping__price">$19</p>
                </label>
                <input type="radio" hidden id="free" name="shipping" value="1">
                <input type="radio" hidden id="standard" name="shipping" value="2">
                <input type="radio" hidden id="fast" name="shipping" value="3">
            </div> 
        </main>
        <div class="cart-summary flex-full">
            <div class="cart-summary__inner flex-column g20 p20 r8 flex-full">
                <!-- single cart summary product start -->
                <?= renderSummaryProduct($cart) ?>
                <!-- single cart summary product end -->
                <div class="toggle-detail underline">Xem chi tiết</div>
                <div class="cart-summary__detail flex-column g20">
                    <div class="product__voucher form__group">
                        <label for="" class="form__label">Nhập mã giảm giá để nhận ưu đãi</label>
                        <div class="flex-between row g6 mt12">
                            <input type="text" class="form__input flex-full" placeholder="Mã giảm giá">
                            <span class="form__message"></span>
                            <button class="btn outline__btn apply__btn">Áp dụng</button>
                        </div>
                    </div>
                    <div class="flex-between">
                        <span class="smb text">Tiền sản phẩm</span>
                        <span class="smb text product__price">$<?= $total ?></span>
                    </div>
                    <div class="flex-between">
                        <span class="smb text">Giảm giá</span>
                        <span class="smb text sale">-$0</span>
                    </div>
                    <!-- <div class="flex-between">
                        <span class="smb text">Phí vận chuyển</span>
                        <span class="smb text shipping-fee">$11</span>
                    </div> -->
                </div>
                <hr class="break-line">
                <div class="flex-between">
                    <span class="smb body-text1">Tổng tiền</span>
                    <span class="smb body-text1 total">$<?= $total ?></span>
                </div>
                <span class="form__message" id="error-check"></span>
                <button class="form__btn btn primary__btn" id="submit" type="submit" name="submit">Đi đến thanh toán</button>
            </div>
        </div>
    </form>
</section>
<script>
    Validator({
        formSelector: '.checkout__form',
        formGroupSelector: '.form__group',
        formMessage: '.form__message',
        rules: [
            Validator.isRequired('#email') , 
            Validator.isEmail('#email') , 
            Validator.isRequired('#address') , 
            Validator.isRequired('#tel'),
            Validator.isPhone('#tel')
        ]
    })
</script>