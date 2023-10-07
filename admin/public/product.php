<?php 
    // load filter
    $catalog = getCatalog();
    $filterList = '';
    $i = 1;
    foreach ($catalog as $item) {
        $filterList .= '
            <li class="filter__item">
                <a href="index.php?pg=product&sortId='.$i.'" class="filter__link flex-between v-center">
                    <div class="filter__name smb">' . $catalog[$i - 1]['name'] . '</div>
                    <div class="filter__sublabel label">' . count(getProductByCatalogId($i)) . '</div>
                </a>
            </li>
        ';
        $i++;
    }

    // load products 
    $productsHtml = '';
    foreach ($productList as $item) {
        extract($item);
        $imageFile = "../".PATH_IMG_PRODUCTS.$img;
        if (file_exists($imageFile)) {
            $linkImage = $imageFile;
        } else {
            $linkImage = '';
        }
        $link = "index.php?pg=updateProductForm&Id=$id";
        $productsHtml .= '
            <div class="admin-product__item pb16 flex flex-full flex-between">
                <div class="col-3 flex g12" style="min-width:50%">
                    <div class="admin-product__banner common-banner">
                        <img src="' . $linkImage . '" alt="" srcset="" loading="lazy">
                    </div>
                    <div class="flex-column flex-between">
                        <h4 class="admin-product__name body-text2 smb">'.$name.'</h4>
                        <div class="flex-column g12">
                            <h4 class="body-text2 label">Unit price: $'.$price.'</h4>
                            <h4 class="body-text2 label">55 products left</h4>
                        </div>
                    </div>
                </div>
                <div class="col-3 product__info product__info--updatedate flex-column flex-between j-center">
                    <h4 class="body-text2 md tac">Update date</h4>
                    <div class="flex-column g12">
                        <h4 class="body-text2 label tac">NN/NN/NN</h4>
                        <h4 class="body-text2 label tac">NN:NN:NN</h4>
                    </div>
                </div>
                <div class="col-3 flex-column flex-between end">
                    <a class="body-text2 md tac"><i class="fal fa-times rotate__btn"></i></a>
                    <nav class="flex g60 por">
                        <ul class="product-function__nav flex-between g60 v-center">
                            <li class="nav__item">
                                <a href="#" class="nav__link flex-column flex-center g6">
                                    <i class="fal fa-eye"></i>
                                    <span class="body-text3">200</span>
                                </a>
                            </li>
                            <li class="nav__item">
                                <a href="#" class="nav__link flex-column flex-center g6">
                                    <i class="fal fa-message"></i>
                                    <span class="body-text3">120</span>
                                </a>
                            </li>
                            <li class="nav__item">
                                <a href="#" class="nav__link flex-column flex-center g6">
                                    <i class="fal fa-archive"></i>
                                    <span class="body-text3">120</span>
                                </a>
                            </li>
                            <li class="nav__item">
                                <a href="'.$link.'" class="nav__link flex-column flex-center g6">
                                    <i class="fal fa-pen"></i>
                                </a>
                            </li>
                        </ul>
                        <a href="#" class="more__btn nav__link flex-column flex-center g6">
                            <i class="far fa-ellipsis"></i>
                        </a>
                        <ul class="product-function__mininav oh poa common-box r12">
                            <li class="nav__item">
                                <a href="" class="nav__link flex g12">
                                    <i class="fal fa-eye"></i>
                                    Xem chi tiết
                                </a>
                            </li>
                            <li class="nav__item">
                                <a href="'.$link.'" class="nav__link flex g12">
                                    <i class="fal fa-pen"></i>
                                    Chỉnh sửa
                                </a>
                            </li>
                            <li class="nav__item">
                                <a href="" class="nav__link flex g12">
                                    <i class="fal fa-eye-slash"></i>
                                    Ẩn sản phẩm
                                </a>
                            </li>
                            <li class="nav__item">
                                <a href="" class="text-warning nav__link flex g12">
                                    <i class="fal fa-trash"></i>
                                    Xóa sản phẩm
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        ';
    }
?>

<div class="container-full admin__container flex">
    <?php 
        require_once 'sidebar.php';
    ?>
    <main class="admin__panel p20 flex-column flex-full g20">
        <!-- admin header start -->
        <?php 
            require_once 'header.php';
        ?>
        <!-- admin header end -->
        <div class="admin__box add-product__bar flex-between v-center common-box p20 r12">
            <h4 class="heading-4 admin__box--title">Add new product</h4>
            <a href="index.php?pg=addNewProduct" class="p20 flex-center add-product__btn r8">
                <i class="fal fa-plus" style="font-size: 2rem;"></i>
            </a>
        </div>
        <div class="admin__main flex-column g12 common-box p20 r12">
            <div class="flex-between v-center">
                <h4 class="heading-4 admin__box--title">All products</h4>
                <div class="filter order-filter toggle-filter flex text v-center smb g6 cp p10">
                    <i class="far fa-filter"></i>
                    Filter
                    <ul class="filter__list">
                        <!-- render filter list start -->
                        <?= $filterList?>
                        <!-- render filter list end -->
                    </ul>
                </div>
            </div>
            <div class="admin-product__wrapper flex-full flex-column">
                <!-- single product start -->
                <!-- <div class="admin-product__item pb12 flex flex-full flex-between">
                    <div class="flex g12">
                        <div class="admin-product__banner common-banner" style="background-image: url('../views/assets/images/banner4.webp')"></div>
                        <div class="flex-column flex-between">
                            <h4 class="admin-product__name body-text1 md">Product name</h4>
                            <h4 class="body-text2 label">Unit price: $45</h4>
                            <h4 class="body-text2 label">55 products left</h4>
                        </div>
                    </div>
                    <div class="product__info product__info--updatedate flex-column flex-between j-center">
                        <h4 class="body-text2 md tac">Update date</h4>
                        <h4 class="body-text2 label tac">08/03/2023</h4>
                        <h4 class="body-text2 label tac">21:19:53</h4>
                    </div>
                    <div class="flex-column flex-between end">
                        <a class="body-text2 md tac"><i class="fal fa-times rotate__btn"></i></a>
                        <nav class="flex g60 por">
                            <ul class="product-function__nav flex-between g60 v-center">
                                <li class="nav__item">
                                    <a href="#" class="nav__link flex-column flex-center g6">
                                        <i class="fal fa-eye"></i>
                                        <span class="body-text3">200</span>
                                    </a>
                                </li>
                                <li class="nav__item">
                                    <a href="#" class="nav__link flex-column flex-center g6">
                                        <i class="fal fa-message"></i>
                                        <span class="body-text3">120</span>
                                    </a>
                                </li>
                                <li class="nav__item">
                                    <a href="#" class="nav__link flex-column flex-center g6">
                                        <i class="fal fa-archive"></i>
                                        <span class="body-text3">120</span>
                                    </a>
                                </li>
                                <li class="nav__item">
                                    <a href="#" class="nav__link flex-column flex-center g6">
                                        <i class="fal fa-pen"></i>
                                    </a>
                                </li>
                            </ul>
                            <a href="#" class="more__btn nav__link flex-column flex-center g6">
                                <i class="far fa-ellipsis"></i>
                            </a>
                            <ul class="product-function__mininav oh poa common-box r12">
                                <li class="nav__item">
                                    <a href="" class="nav__link flex g12">
                                        <i class="fal fa-eye"></i>
                                        Xem chi tiết
                                    </a>
                                </li>
                                <li class="nav__item">
                                    <a href="" class="nav__link flex g12">
                                        <i class="fal fa-pen"></i>
                                        Chỉnh sửa
                                    </a>
                                </li>
                                <li class="nav__item">
                                    <a href="" class="nav__link flex g12">
                                        <i class="fal fa-eye-slash"></i>
                                        Ẩn sản phẩm
                                    </a>
                                </li>
                                <li class="nav__item">
                                    <a href="" class="text-warning nav__link flex g12">
                                        <i class="fal fa-trash"></i>
                                        Xóa sản phẩm
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div> -->
                <!-- single product end -->
                <?= $productsHtml?>
            </div>
        </div>
    </main>
</div>