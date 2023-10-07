<?php
    $pagelimit = [
        9,
        15,
        30,
        50,
        100
    ];
    $displayPageLimit = '';
    if ($_GET['idcatalog'] > 0) {
        if (isset($_GET['pageLimit']) && $_GET['pageLimit'] != 0) {
            $number = $_GET['pageLimit'];
            $products = getProductByCatalogId($idcatalog, $number);
            $displayPageLimit = '<span class="body-text2 filter__label">' . $number . '</span>';
        } else {
            $products = getProductByCatalogId($idcatalog, 9);
            $displayPageLimit = '<span class="body-text2 filter__label">9</span>';
        }
    } else {
        if (isset($_GET['pageLimit']) && $_GET['pageLimit'] != 0) {
            $number = $_GET['pageLimit'];
            $products = getAllProduct($number);
            $displayPageLimit = '<span class="body-text2 filter__label">' . $number . '</span>';
        } else {
            $products = getAllProduct(9);
            $displayPageLimit = '<span class="body-text2 filter__label">9</span>';
        }
    }

    $priceFilter = [
        [
            "min" => 5,
            "max" => 99
        ],
        [
            "min" => 100,
            "max" => 199
        ],
        [
            "min" => 200,
            "max" => 399
        ],
        [
            "min" => 400,
            "max" => 500
        ],
        [
            "min" => 500,
            "max" => 1000
        ]
    ];
    function priceFilter ($priceFilter) {
        $filterItem = '';
        foreach ($priceFilter as $item) {
            extract($item);
            $products = getProductByPriceFilter($min, $max);
            $filterItem .= '
                <li class="nav__item">
                    <a href="index.php?pg=viewProduct&min='.$min.'&max='.$max.'" class="nav__link">$'.$min.' - $'.$max.'</a>
                    <span class="item__qty body-text3 rg">'. count($products) .'</span>
                </li>
            ';
        }
        return $filterItem;
    }
    
    function filterRender ($filterOptions) {
        foreach ($filterOptions as $key => $value) {
            $link = '';
            if (isset($_GET['idcatalog']) && $_GET['idcatalog'] != 0) {
                $link = 'idcatalog='.$_GET['idcatalog'].'&';
            }
            echo '
                <li class="select__option">
                    <a href="index.php?pg=viewProduct&'.$link.'pageLimit='.$value.'" class="text flex">'.$value.'</a>
                </li>
            ';
        }
    }
    function renderSidebar ($arr) {
        foreach ($arr as $item) {
            extract($item);
            $products = getProductByCatalogId($id);
            $limit = '';
            if (isset($_GET['pageLimit']) && $_GET['pageLimit'] > 0) {
                $limit = '&pageLimit=' . $_GET['pageLimit'];
            }
            $sidebarLink = 'index.php?pg=viewProduct&idcatalog='.$id.$limit;
            echo '
                <li class="nav__item">
                    <a href="'.$sidebarLink.'" class="nav__link">'.$name.'</a>
                    <span class="item__qty body-text3 rg">'.count($products).'</span>
                </li>
            ';
        }
    }

    $productsHtml = '';
    foreach ($products as $item) {
        extract($item);
        $gia = '';
        $linkDetail = 'index.php?pg=viewProductDetail&productId=' . $id;
        if ($price > 0) {
            $gia = '<h4 class="product__price">$' . $price . '</h4>';
        } else {
            $gia = '<h4 class="product__price">Updatting</h4>';
        }
        if ($saleprice > 0) {
            $gia = '<del class="product-old__price rg"> $' . $price . '</del>';
            $giamoi = '<h4 class="product__price"> $' . $saleprice . '</h4>';
        } else {
            $saleprice = $price;
            $giamoi = '';
            $gia = '<h4 class="product__price"> $' . $price . '</h4>';
        }
        if ($promotion > 0) {
            $promo = '<div class="product__label sale__label">-' . $promotion . '%</div>';
        } else {
            $promo = '';
        }
        if ($status == 2) {
            $newLabel = '<div class="product__label new__label">New</div>';
        } else {
            $newLabel = '';
        }
        if (!$amount > 0) {
            $promo = '';
            $newLabel = '';
            $soldoutLabel = '
                    <div class="sold-out__overlay">
                        <div class="product__label sold-out__label">Sold out</div>
                    </div>
                ';
            $linkDetail = "index.php?pg=wishList";
            $button = '
                    <a href="' . $linkDetail . '" class="btn buy__btn" style="height: 100%">
                        <i class="fal fa-heart"></i>
                        Wishlist
                    </a>
                ';
        } else {
            $soldoutLabel = '';
            $button = '
                    <form action="index.php?pg=addCart" method="post">
                        <button type="submit" class="btn add__btn" style="width: 100%;">
                            <i class="fa-solid fa-plus"></i> Xem sau
                        </button>
                        <input type="hidden" name="name" value="' . $name . '">
                        <input type="hidden" name="price" value="' . $saleprice . '">
                        <input type="hidden" name="img" value="' . $img . '">
                        <input type="hidden" name="qty" value="1">
                    </form>
                    <a href="" class="btn buy__btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
    <path d="M13.25 7.25V4.95C13.25 3.8299 13.25 3.26984 13.032 2.84202C12.8403 2.46569 12.5343 2.15973 12.158 1.96799C11.7301 1.75 11.1701 1.75 10.05 1.75H9.94999C8.82988 1.75 8.26983 1.75 7.842 1.96799C7.46568 2.15973 7.15972 2.46569 6.96797 2.84202C6.74998 3.26984 6.74998 3.8299 6.74998 4.95V7.25M6.19579 18.25H13.8042C15.0014 18.25 15.6 18.25 16.0436 18.0114C16.4334 17.8018 16.7427 17.4688 16.923 17.0646C17.1281 16.6046 17.0839 16.0076 16.9954 14.8136L16.4695 7.71361C16.3921 6.66903 16.3534 6.14675 16.1253 5.75104C15.9244 5.40263 15.6232 5.12288 15.2609 4.94829C14.8494 4.75 14.3257 4.75 13.2783 4.75H6.72171C5.67428 4.75 5.15056 4.75 4.73908 4.94829C4.37679 5.12288 4.07554 5.40263 3.87466 5.75104C3.64652 6.14675 3.60783 6.66903 3.53046 7.71361L3.00453 14.8136C2.91609 16.0076 2.87187 16.6046 3.07701 17.0646C3.25728 17.4688 3.56653 17.8018 3.95633 18.0114C4.39993 18.25 4.99855 18.25 6.19579 18.25Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>
                        Mua ngay
                    </a>
                ';
        }
        $backgroundLink = "./views/assets/images/" . $img;
        $productsLink = "index.php?pg=viewProductDetail&productId=" . $id;
        $productsHtml .= '
            <div class="product r12">
                <div class="flex-column g12 product__inner">
                    <a href="" class="product__banner r6">
                        <img src="'.$backgroundLink.'" alt="">
                        <div class="product__overlay">
                            <div class="row full flex-between">
                                '.$button.'
                            </div>
                        </div>
                    </a>
                    <div class="product-label__wrapper flex-between">
                        '.$promo.$newLabel.'
                    </div>
                    '.$soldoutLabel.'
                    <a href="' . $productsLink . '" class="product__detail">
                        <h2 class="product__name">' . $name . '</h2>
                        <div class="row g12">
                            ' . $giamoi . $gia . '
                        </div>
                    </a>
                </div>
            </div>
        ';
    }

    
?>

    <!-- || big text start -->
    <h1 class="big-text"><?= $catalogName ?></h1>
    <!-- || big text end -->

    <!-- || product section start -->
    <main class="section all-product__section">
        <div class="product-main__wrapper flex-column oh" style="padding: 0; padding-top: 200px">
            <div class="main__inner col-1 flex-column r12 g30">
                <div class="filter__nav row g30 full">
                    <!-- product filter start -->
                    <div class="product__filter cate__filter row g12 flex-center">
                        <span class="body-text2 filter__label">
                            <i class="fa-solid fa-filter"></i> 
                            Filter
                        </span>
                        <div class="dropdown-select product__dropdown">
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
                    <!-- product filter end -->
                    <!-- product per page select box start -->
                    <div class="product__filter amount__select row g12 flex-center">
                        <span class="body-text2 filter__label">Show</span>
                        <div class="dropdown-select amount__dropdown">
                            <div class="select__option active toggle__select toggle__amount flex-between">
                                <?= $displayPageLimit?>
                                <i class="fa-solid fa-chevron-down"></i>
                            </div>
                            <ul class="select-option__list">
                                <?= filterRender($pagelimit)?>
                            </ul>
                        </div>
                        <span class="body-text2 filter__label">per page</span>
                    </div>
                    <!-- product per page select box end -->
                </div>
                <section class="product__section row g20">
                    <div class="product__sidebar flex-column g60">
                        <nav class="full">   
                            <h4 class="sub-title sidebar-nav__title">Category</h4>
                            <ul class="product-sidebar__nav">
                                <?= renderSidebar($catalogs) ?>
                            </ul>
                        </nav>
                        <nav class="full">   
                            <h4 class="sub-title sidebar-nav__title">Price</h4>
                            <ul class="product-sidebar__nav">
                                <!-- price filter render start -->
                                <?=priceFilter($priceFilter);?>
                                <!-- price filter render end -->
                            </ul>
                        </nav>
                        <?php 
                            $bgPath = "./views/assets/images/banner6.webp";
                        ?>
                        <div class="sidebar__banner common-banner" style="background-image: url(<?=$bgPath?>)">
                            <div class="text__center">
                                <h4 class="text-center__label">COMING SUMMER 2023</h4>
                                <h2 class="text-center__spotlight" style="width: fit-content;">BAUER™ LITE
KEYBOARD</h2>
                                <div class="banner__btn">EXPLORE NOW</div>
                            </div>
                        </div>
                    </div>
                    <div class="product__wrapper auto-grid">
                        <!-- single product start -->
                        <?=$productsHtml?>
                        <!-- single product end -->
                    </div>
                </section>
            </div>
        </div>
    </main>
    <!-- || product section end -->

    <!-- collection section start -->
    <section class="section collections__section">
        <h2 class="title">CÁC SẢN PHẨM KHÁC</h2>
        <main class="section__main collections__main full auto-grid g20 mt30">
            <!-- single collection start -->
            <?=renderCollectionItem($relatedCatalog)?>
            <!-- single collection end -->
        </main>
    </section>
    <!-- collection section end -->