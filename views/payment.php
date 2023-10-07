
<?php 
    if (isset($_POST['shippingAddress']) && $_POST['shippingAddress']) {
        $label = '<i class="fa-regular fa-circle-check option-btn primary-text"></i>';
    } else { 
        $label = '<i class="fa-regular fa-circle-check option-btn text"></i>';
    }

    if (isset($_SESSION['cart'])) {
        $total = 0;
        foreach ($_SESSION['cart'] as $item) {
            extract($item);
            $total += $qty * $price;
        }
    }
?>

<script>
    jQuery(document).ready(() => {
        console.log(jQuery('input[name="paymentMethod"]:checked').val());
        jQuery('.bill-info__form').submit(function (e) {
            e.preventDefault(); // Prevent the default form submission

            // Get form data
            const country = jQuery('#country').val()
            const fullname = jQuery('#fullname').val()
            const address = jQuery('#address').val()
            const email = jQuery('#email').val()
            const tel = jQuery('#tel').val()
            const paymentMethod = jQuery('input[name="paymentMethod"]:checked').val()
            const submit = jQuery('#submit').val();

            // Perform AJAX request to validate the form data
            jQuery.ajax({
                type: 'POST',
                url: 'http://localhost/sample-project/views/paymentValidate.php?billId=<?= $billId ?>',
                data: {
                    country: country,
                    fullname: fullname,
                    paymentMethod: paymentMethod,
                    address: address,
                    email: email,
                    tel: tel,
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
                    jQuery('#error-check').html(response.message);
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
    <form action="index.php?pg=payment&billId=<?= $billId ?>" method="post" class="bill-info__form">
        <div class="bill-info__body common-box r8 p20 flex-column g12 full" style="width: 100%;">
            <label class="form__label">Địa chỉ giao hàng</label>
            <div class="flex v-center start g6">
                <?= $label ?>
                <!-- <input type="checkbox" name="" id="shippingAddress"> -->
                <input type="submit" hidden name="shippingAddress" id="shippingAddress">
                <label for="shippingAddress" class="body-text3">Địa chỉ giống với địa chỉ thanh toán</label>
            </div>
        </div>
    </form>
    <form action="index.php?pg=payment&billId=<?= $billId ?>" method="post" class="bill-info__form payment__form full row mt20">
        <main class="bill-info__body payment-main__body r8 p20 flex-column flex-full g20">

            <!-- payment method start -->

            <div class="payment-methods r8 flex-column g12">
                <label for="" class="form__label">
                    Chọn phương thức thanh toán <span class="required">*</span>
                </label>
                <label for="cash" class="payment-method active r8 start">
                    <div class="flex v-center g12">
                        <i class="fa-regular fa-circle option__btn"></i>
                        <i class="fa-regular fa-circle-check option__btn"></i>
                        <span class="smb text">Tiền mặt</span>
                    </div>
                </label>
                <label for="credit-card" class="payment-method r8 start">
                    <div class="flex v-center g12">
                        <i class="fa-regular fa-circle option__btn"></i>
                        <i class="fa-regular fa-circle-check option__btn"></i>
                        <span class="smb text">Thẻ tín dụng</span>
                    </div>
                    <div class="payment-method-info__form flex-column g12 p20">
                        <div class="form__group">
                            <input type="text" class="form__input" placeholder="Số thẻ">
                            <span class="form__message"></span>
                        </div>
                        <div class="form__group">
                            <input type="text" class="form__input" placeholder="Tên thẻ">
                            <span class="form__message"></span>
                        </div>
                        <div class="row flex-between g12">
                            <div class="form__group flex-full">
                                <input type="text" class="form__input" placeholder="Ngày hết hạn">
                                <span class="form__message"></span>
                            </div>
                            <div class="form__group flex-full">
                                <input type="text" class="form__input" placeholder="CVV">
                                <span class="form__message"></span>
                            </div>
                        </div>
                    </div>
                </label>
                <label for="momo" class="payment-method r8 start">
                    <div class="flex v-center g12">
                        <i class="fa-regular fa-circle option__btn"></i>
                        <i class="fa-regular fa-circle-check option__btn"></i>
                        <span class="smb text">Momo</span>
                    </div>
                    <div class="payment-method-info__form flex-column g12 p20">
                        <div class="form__group">
                            <input type="text" class="form__input" placeholder="Số thẻ">
                            <span class="form__message"></span>
                        </div>
                        <div class="form__group">
                            <input type="text" class="form__input" placeholder="Tên thẻ">
                            <span class="form__message"></span>
                        </div>
                        <div class="row flex-between g12">
                            <div class="form__group flex-full">
                                <input type="text" class="form__input" placeholder="Ngày hết hạn">
                                <span class="form__message"></span>
                            </div>
                            <div class="form__group flex-full">
                                <input type="text" class="form__input" placeholder="CVV">
                                <span class="form__message"></span>
                            </div>
                        </div>
                    </div>
                </label>
                <label for="paypal" class="payment-method r8 start">
                    <div class="flex v-center g12">
                        <i class="fa-regular fa-circle option__btn"></i>
                        <i class="fa-regular fa-circle-check option__btn"></i>
                        <span class="smb text">Paypal</span>
                    </div>
                    <div class="payment-method-info__form flex-column g12 p20">
                        <div class="form__group">
                            <input type="text" class="form__input" placeholder="Số thẻ">
                            <span class="form__message"></span>
                        </div>
                        <div class="form__group">
                            <input type="text" class="form__input" placeholder="Tên thẻ">
                            <span class="form__message"></span>
                        </div>
                        <div class="row flex-between g12">
                            <div class="form__group flex-full">
                                <input type="text" class="form__input" placeholder="Ngày hết hạn">
                                <span class="form__message"></span>
                            </div>
                            <div class="form__group flex-full">
                                <input type="text" class="form__input" placeholder="CVV">
                                <span class="form__message"></span>
                            </div>
                        </div>
                    </div>
                </label>
                <input type="radio" hidden id="credit-card" name="paymentMethod" value="1">
                <input type="radio" hidden id="paypal" name="paymentMethod" value="2">
                <input type="radio" hidden id="momo" name="paymentMethod" value="3">
                <input type="radio" hidden id="cash" checked name="paymentMethod" value="4">
            </div> 
            
            <!-- payment method end -->

            <!-- country start -->
            <div class="form__group">
                <label for="" class="form__label">Chọn quốc gia</label>
                <select name="country" id="country" class="form__input">
                    <option value="1" selected>VietNam</option>
                    <option value="2">USA</option>
                    <option value="3">England</option>
                </select>
                <span class="form__message"></span>
            </div>
            <!-- country end -->

            <hr class="break-line">

            <!-- full name start -->
            <div class="form__group">
                <label for="" class="form__label">
                    Tên người nhận <span class="required">*</span>
                </label>
                <input type="text" name="fullname" id="fullname" class="form__input" value="">
                <span class="form__message"></span>
            </div>
            <!-- full name end -->

            <!-- address start -->
            <div class="form__group">
                <label for="" class="form__label">
                    Địa chỉ <span class="required">*</span>
                </label>
                <input type="text" name="address" id="address" class="form__input" value="<?= $addressView ?>">
                <span class="form__message"></span>
            </div>
            <!-- address end -->

            <!-- email start -->
            <div class="form__group">
                <label for="" class="form__label">Email <span class="required">*</span></label>
                <input type="text" class="form__input" id="email" name="email" value="<?= $emailView ?>">
                <span class="form__message"></span>
            </div>
            <!-- email end -->

            <!-- telephone start -->
            <div class="form__group">
                <label for="" class="form__label">Số điện thoại <span class="required">*</span></label>
                <input type="text" class="form__input" id="tel" name="tel" value="<?= $telView ?>">
                <span class="form__message"></span>
            </div>
            <!-- telephone end -->

            <div class="flex v-center start g6">
                <input type="checkbox" name="saveBillInfo" id="saveBillInfo">
                <label for="saveBillInfo" class="body-text3">Lưu lại thông tin giao hàng cho những đơn hàng tiếp theo</label>
            </div>
        </main>
        <div class="cart-summary flex-full">
            <div class="cart-summary__inner flex-column g20 p20 r8 flex-full">
                
                <!-- single product start -->
                <?= renderSummaryProduct($cart) ?>
                <!-- single product end -->

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
                    <div class="flex-between">
                        <span class="smb text">Phí vận chuyển</span>
                        <span class="smb text shipping-fee">$<?= $shippingFee ?></span>
                    </div>
                </div>
                <hr class="break-line">
                <div class="flex-between">
                    <span class="smb body-text1">Tổng tiền</span>
                    <span class="smb body-text1 total">$<?= $total + $shippingFee ?></span>
                </div>
                <!-- <a href="index.php?pg=confirm&billId=<?= $billId ?>" class="btn primary__btn">Đi đến thanh toán</a> -->
                <span class="form__message" id="error-check"></span>
                <button class="form__btn btn primary__btn" id="submit" type="submit" name="submit">Đi đến thanh toán</button>
            </div>
        </div>
    </form>
</section>

<script>
    Validator({
        formSelector: '.payment__form',
        formGroupSelector: '.form__group',
        formMessage: '.form__message',
        rules: [
            Validator.isRequired('#fullname') , 
            Validator.isRequired('#email') , 
            Validator.isEmail('#email') , 
            Validator.isRequired('#address') , 
            Validator.isRequired('#tel'),
            Validator.isPhone('#tel')
        ]
    })
</script>