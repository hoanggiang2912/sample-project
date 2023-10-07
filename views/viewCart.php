<?php 
    if (isset($_SESSION['user'])) {
        if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])){
        $path = 'index.php?pg=order';
        }
    } else {
        $path = 'index.php?pg=login';
    }


    // render cart product 
    $cartHtml = '';
    $total = 0;
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        $i = 0;
        foreach ($_SESSION['cart'] as $item) {
            extract($item);
            $imagePath = "./views/assets/images/$img";
            $subTotal = $price * $qty;
            $total += $subTotal;
            $delLink = "index.php?pg=delCart&delProduct=$i";
            $cartHtml .= '
                <div class="cart__product full">
                    <div class="flex-between g12">
                        <div class="flex-between g12">
                            <div class="cart-product__banner common-banner" style="background-image: url('.$imagePath.')"></div>
                            <div class="flex-column g30">
                                <h2 class="cart-product__name">'.$name.'</h2>
                                <h4 class="cart-product__price cart-product__unit-price">$'.$price.'</h4>
                            </div>
                        </div>
                        <div class="flex-column end g30">
                            <a href="'. $delLink .'" class="cart-product__btn del__btn"><i class="fal fa-times"></i></a>
                            <div class="v-center product__qty">
                                <button class="cart-product__btn minus__btn"><i class="fal fa-minus" data-product-id='.$id.'></i></button>
                                <input type="number" name="qty" id="product-quantity" class="cart-product__input form__input qty__input" value="'.$qty.'" min="0">
                                <button class="cart-product__btn plus__btn"><i class="fal fa-plus" data-product-id=' . $id . '></i></button>
                            </div>
                            <h4 class="cart-product__price cart-product__subtotal">$'.$subTotal.'</h4>
                        </div>
                    </div>
                </div>
            ';
        }
    } else {
        $cartHtml = '
            <div class="cart-empty__announce g12">
                <h2 class="announce__text tac">YOUR CART IS EMPTY</h2>
                <a href="index.php" class="btn solid__btn">Continue shopping</a>
            </div>
        ';
    }
?>

<!-- || main section start -->
<section class="section cart__section">
    <?php 
        require_once 'paymentNav.php';
    ?>
    <div class="cart__body row g12">
        <div class="cart-product__wrapper flex-full flex-column r8 g20">
            <!-- single cart product start -->
            <?= $cartHtml ?>
            <!-- single cart product end -->
        </div>

        <!-- increasing - decreasing product's quantity hanlder with AJAX start -->
        <script>
            jQuery(document).ready(() => {
                // AJAX to increase quantity
                jQuery(".plus__btn").on('click' , () => {
                    var productId = jQuery('.plus__btn').find('i').attr("data-product-id");
                    jQuery.ajax({
                        type: "POST",
                        url: "http://localhost/sample-project/views/updateCart.php",
                        data: {
                            action: "increase",
                            product_id: productId
                        },
                        success: function (response) {
                            if (response.success) {
                                jQuery("#product-quantity").val(response.quantity);
                            } else {
                                alert("Failed to increase quantity.");
                            }
                        },
                    });
                });

                // AJAX to decrease quantity
                jQuery(".minus__btn").click(() => {
                    var productId = jQuery('.plus__btn').find('i').attr("data-product-id");
                    jQuery.ajax({
                        type: "POST",
                        url: "http://localhost/sample-project/views/updateCart.php",
                        data: {
                            action: "decrease", 
                            product_id: productId 
                        },
                        success: function (response) {
                            if (response.success) {
                                jQuery("#product-quantity").val(response.quantity);
                            } else {
                                alert("Failed to decrease quantity.");
                            }
                        },
                    });
                });
            });
        </script>
        <!-- increasing - decreasing product's quantity hanlder with AJAX end -->
        
        <div class="cart__summary r8 flex-full flex-column p20">
            <div class="summary__wrapper flex-column g30 full">
                <h2 class="summary__title">Tổng hóa đơn</h2>
                <div class="summary__detail g12 flex-column">
                    <div class="flex-between">
                        <span class="body-text2">Tổng tiền sản phẩm</span>
                        <span class="summary__price">$<?= $total ?></span>
                    </div>
                    <h5 class="coupon">Thêm mã giảm giá <i class="fa-solid fa-arrow-right"></i></h5>
                </div>
                <hr class="break-line">
                <div class="summary__total flex-between v-center">
                    <span class="sub-title">Thực chi</span>
                    <span class="summary__total__price body-text1">$<?= $total ?></span>
                </div>
            </div>
            <a href="index.php?pg=order" class="btn primary__btn smb full mt30">Đi tới thanh toán</a>
        </div>
    </div>
</section>
<!-- || main section end -->