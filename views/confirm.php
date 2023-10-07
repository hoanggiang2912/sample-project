<?php 
    // showing cart
    $product_html = '';
    $total = 0;
    foreach ($cart as $item) {
        extract($item);
        $subTotal = $price * $qty;
        $total += $subTotal;  
        $path = "./views/layout/assets/images/$img";
        $product_html .= '
            <div class="summary__product flex">
                <div class="flex" style="gap: 8px">
                    <div class="summary__product__banner" style="background: url('.$path.') no-repeat center center / cover;">
                    </div>
                    <div>
                        <div class="summary__product__name">
                            '.$name.'
                        </div>
                        <div class="product__option flex">
                            <span></span>
                            <span><span>
                        </div>
                    </div>
                </div>
                <div style="display: flex; flex-direction: column; align-self: stretch; justify-content: space-between; align-items: end">
                    <div class="product__price">$
                        '.$price.'
                    </div>
                    <div class="qty">x '.$qty.'</div>
                </div>
            </div>
        ';
    }
?>

<!-- || big text start -->
<h1 class="big-text">confirm</h1>
<!-- || big text end -->

<!-- confirm section start -->
<section class="section confirm__section flex-center" style="margin-top: 14rem">
    <main class="confirm__main flex-column r12 g20 p20">
        <div class="confirm-main__top flex-column v-center g20">
            <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100" fill="none">
<path d="M91.6664 46.1668V50.0001C91.6612 58.9852 88.7518 67.7279 83.3719 74.9244C77.992 82.1208 70.43 87.3854 61.8137 89.933C53.1973 92.4806 43.9883 92.1747 35.56 89.0609C27.1317 85.947 19.9357 80.1922 15.0453 72.6545C10.155 65.1169 7.83214 56.2004 8.42333 47.2347C9.01452 38.2691 12.488 29.7348 18.3258 22.9046C24.1636 16.0743 32.0529 11.3142 40.8171 9.33403C49.5813 7.35388 58.7508 8.25982 66.958 11.9168" stroke="#00C2FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M91.6667 16.6667L50 58.3751L37.5 45.8751" stroke="#00C2FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
            <h2 class="heading-4">Đặt hàng thành công!</h2>
            <h4 class="label">Email xác nhận đơn hàng đã được gửi tới <?= $nguoidat_email?></h4>
        </div>
        <div class="confirm-main__bill-info flex-column g30 start">
            <div class="flex-column g12">
                <h2 class="smb">Ngày giao dịch</h2>
                <h4 class="text"><?= $createDate ?></h4>
            </div>
            <div class="flex-column g12">
                <h2 class="smb">Phương thức thanh toán</h2>
                <h4 class="text">Tiền mặt</h4>
            </div>
            <div class="flex-column g12">
                <h2 class="smb">Phương thức vận chuyển</h2>
                <h4 class="text"><?= $shippingName['name'] ?></h4>
            </div>
        </div>
        <div class="confirm-main__bill-info flex-column g12">
            <h4 class="smb mb12">Đơn hàng của bạn</h4>
            <!-- single product start -->
            <?= renderSummaryProduct($cart) ?>
            <!-- single product end -->
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
            <a href="index.php" class="btn primary__btn">
                Tiếp tục mua sắm
            </a>
        </div>
    </main>
</section>
<!-- confirm section end -->