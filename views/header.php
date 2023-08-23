<?php 
    $keyboards = getProductByCatalogId(1 , 5);
    $keycaps = getProductByCatalogId(2 , 5);
    $switches = getProductByCatalogId(3 , 5);
    $kits = getProductByCatalogId(4 , 5);
    $deskpads = getProductByCatalogId(5, 5);

    function renderNavItem($arr) {
        $html = '';
        foreach ($arr as $item) {
            extract($item);
            $html .= '
                <li class="nav__item">
                    <a class="nav__link" href="index.php?pg=viewProductDetail&productId='.$id.'">'.$name.'</a>
                </li>
            ';
        }
        return $html;
    }

    $userNav = '';
    if (!isset($_SESSION['user'])) {
        $userNav = '
            <nav class="user__nav r4">
                <ul>
                    <li class="nav__item">
                        <a href="index.php?pg=login" class="nav__link flex v-center g12">
                            <i class="fal fa-sign-in"></i> Login
                        </a>
                    </li>
                    <li class="nav__item">
                        <a href="index.php?pg=createAccount" class="nav__link flex v-center g12">
                            <i class="fal fa-user-plus"></i> Create account
                        </a>
                    </li>
                </ul>
            </nav>
        ';
    } else {
        $userNav = '
            <nav class="user__nav r4">
                <ul>
                    <li class="nav__item">
                        <a href="index.php?pg=general" class="nav__link flex v-center g12">
                            <i class="fal fa-user"></i> Account
                        </a>
                    </li>
                    <li class="nav__item">
                        <a href="index.php?pg=userLogout" class="nav__link flex v-center g12">
                            <i class="fal fa-sign-out"></i> Log out
                        </a>
                    </li>
                </ul>
            </nav>
        ';
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="./views/assets/resources/sass/css/app.css">
    <link rel="icon" type="image/x-icon" href="./views/assets/images/favicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/gh/hung1001/font-awesome-pro@4cac1a6/css/all.css" rel="stylesheet"
        type="text/css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
</head>

<body class="theme-light">
    <div class="container-full">
        <!-- || header start -->
        <header class="header">
            <div class="header__inner flex-between">
                <a href="index.php" class="logo flex-center">
                    <img src="./views/assets/images/logo.svg" alt=""><span>typistial</span>
                </a>
                <nav>
                    <ul class="h-nav header__nav">
                        <li class="nav__item"><a href="index.php" class="nav__link">Trang chủ</a></li>
                        <li class="nav__item">
                            <a href="index.php?pg=viewProduct" class="nav__link toggle-subnav">Sản phẩm</a>
                            <ul class="header__subnav row">
                                <li class="nav__item col-4 p20">
                                    <a href="index.php?pg=viewProduct" class="sub-title nav__link ttu">CATEGORIES</a>
                                    <ul>
                                        <li class="nav__item"><a class="nav__link" href="">IN STOCK</a></li>
                                        <li class="nav__item"><a class="nav__link" href="index.php?pg=viewProduct&idcatalog=1">KEYBOARDS</a></li>
                                        <li class="nav__item"><a class="nav__link" href="index.php?pg=viewProduct&idcatalog=4">KITS</a></li>
                                        <li class="nav__item"><a class="nav__link"
                                                href="index.php?pg=viewProduct&idcatalog=3">SWITCHES</a>
                                        </li>
                                        <li class="nav__item"><a class="nav__link" href="index.php?pg=viewProduct&idcatalog=2">KEYCAPS</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav__item col-4 p20">
                                    <a href="index.php?pg=viewProduct&idcatalog=1" class="nav__link sub-title ttu">KEYBOARDS</a>
                                    <ul>
                                        <!-- render nav item start -->
                                        <?= renderNavItem($keyboards) ?>
                                        <!-- render nav item end -->
                                    </ul>
                                </li>
                                <li class="nav__item col-4 p20">
                                    <a href="index.php?pg=viewProduct&idcatalog=4" class="nav__link sub-title ttu">KITS</a>
                                    <ul>
                                        <!-- render nav item start -->
                                        <?= renderNavItem($kits) ?>
                                        <!-- render nav item end -->
                                    </ul>
                                </li>
                                <li class="nav__item col-4 p20">
                                    <a href="index.php?pg=viewProduct&idcatalog=5" class="nav__link sub-title ttu">DESKPADS</a>
                                    <ul>
                                        <!-- render nav item start -->
                                        <?= renderNavItem($deskpads) ?>
                                        <!-- render nav item end -->
                                    </ul>
                                </li>
                                <li class="nav__item col-4 p20">
                                    <a href="index.php?pg=viewProduct&idcatalog=2" class="nav__link sub-title ttu">KEYCAPS</a>
                                    <ul>
                                        <!-- render nav item start -->
                                        <?= renderNavItem($keycaps) ?>
                                        <!-- render nav item end -->
                                    </ul>
                                </li>
                                <li class="nav__item col-4 p20">
                                    <a href="index.php?pg=viewProduct&idcatalog=3" class="nav__link sub-title ttu">SWITCHES</a>
                                    <ul>
                                        <!-- render nav item start -->
                                        <?= renderNavItem($switches) ?>
                                        <!-- render nav item end -->
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="nav__item"><a href="index.php?pg=contactUs" class="nav__link">Hổ trợ</a></li>
                        <li class="nav__item"><a href="index.php?pg=aboutUs" class="nav__link">Về chúng tôi</a></li>
                    </ul>
                </nav>
                <nav>
                    <ul class="h-nav header__nav icon__nav">
                        <li class="nav__item" style="position: relative">
                            <a href="index.php?pg=user" class="nav__link">
                                <i class="fal fa-user"></i>
                            </a>
                            <!-- user nav render start -->
                            <?= $userNav?>
                            <!-- user nav render end -->
                        </li>
                        <li class="nav__item" style="position: relative">
                            <a href="" class="nav__link">
                                <i class="fal fa-search toggle-searchbar"></i>
                            </a>
                            <div class="search__form__wrapper">
                                <form action="" class="search__form">
                                    <div class="form__group">
                                        <input type="text" class="form__input search__input"
                                            placeholder="Tên sản phẩm...">
                                    </div>
                                    <button type="submit" class="search__btn" name="searchSubmit">
                                        <i class="fal fa-search text"></i>
                                    </button>
                                </form>
                            </div>
                        </li>
                        <li class="nav__item"><a href="" class="nav__link"><i class="fal fa-shopping-cart"></i></a></li>
                    </ul>
                </nav>
                <i class="fal fa-bars open__btn" style="line-height: 80px;"></i>
            </div>
        </header>
        <nav class="respon__nav">
            <ul>
                <li class="flex-between nav__item">
                    <div class="nav__link"><i class="fal fa-user"></i></div>
                    <i class="fal fa-times close__btn text"></i>
                </li>
                <li class="nav__item">
                    <form action="" method="post" class="search__form">
                        <input type="text" class="form__input search__input" placeholder="Search...">
                        <button class="submit" name="searchSubmit"><i class="fal fa-search text"></i></button>
                    </form>
                </li>
                <li class="nav__item"><a href="" class="nav__link">Home</a></li>
                <li class="nav__item"><a href="" class="nav__link">Keyboards</a></li>
                <li class="nav__item"><a href="" class="nav__link">Keycaps</a></li>
                <li class="nav__item"><a href="" class="nav__link">Switches</a></li>
                <li class="nav__item"><a href="" class="nav__link">Kits</a></li>
                <li class="nav__item"><a href="" class="nav__link">Deskpads</a></li>
            </ul>
        </nav>
        <div class="respon__overlay"></div>
        <!-- header end -->