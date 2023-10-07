<?php
session_start();
ob_start();
ob_clean();


require_once "./models/connect.php";
// connect models
require_once "./models/product.php";
require_once "./models/catalog.php";
require_once "./models/image.php";
require_once "./models/banner.php";
require_once "./models/user.php";
require_once "./models/bill.php";
require_once "./models/shipping.php";
require_once "./models/comment.php";
//Require header
require_once "./views/header.php";


if (isset($_GET['pg']) && ($_GET['pg'] != '')) {
    switch ($_GET['pg']) {
        case 'userLogout':
            if (isset($_SESSION['user'])) {
                unset($_SESSION['user']);
                header('Location: index.php');
            }
            break;
        case 'createAccount':
            $message = '';
            if (isset($_POST['createAccount']) && $_POST['createAccount']) {
                $userName = $_POST['userName'];
                $email = $_POST['email'];
                $password = $_POST['password'];

                if ($userName !== '' && $email !== '' && $password !== '') {
                    addUser($userName, $email, $password);
                    $recentUserId = getUserByUsername ($username)['id'];
                    $user = [
                        "userName" => $userName,
                        "email" => $email,
                        "password" => $password,
                        "id" => $recentUserId
                    ];
                    $_SESSION['user'] = $user;
                    if (isset($_SESSION['user'])) {
                        header('Location: index.php?pg=login');
                    }
                } else {
                    $message = '<span class="form__message tac">Please fill all the blank before continuing!</span>';             
                }
            }
            require_once "./views/createAccount.php";
            break;
        case 'login':
            $errorMessage = '';
            if (isset($_POST['login']) && $_POST['login']) {
                $name = $_POST['name'];
                $password = $_POST['password'];
                // echo $name , $password;
                if ($name !== '' && $password !== '') {
                    $user = checkAdmin($name, $password);
                    if (!$user) {
                        $errorMessage = '<span class="form__message label">Username or password is incorrect , please try again!</span>';
                    } else {
                        extract($user);
                        $userSaved = [
                            "name" => $name,
                            "password" => $password,
                            "id" => $id_user
                        ];
                        if ($role == 0) {
                            $_SESSION['role'] = $role;
                            $_SESSION['user'] = $userSaved;
                            header('Location: index.php?user=' . $id_user);
                        } else if ($role == 1) {
                            $_SESSION['admin'] = $userSaved;
                            header('Location: ./admin/index.php');
                        }
                    }
                } else {
                    $errorMessage = '<span class="form__message label">Username and password can\'t be empty</span>';
                }
            }
            require_once './views/login.php';
            break;
        case 'contact':
            require_once "./views/contact.php";
            break;
        case 'aboutUs':
            require_once "./views/about-us.php";
            break;
        case 'viewProduct':
            $catalogs = getCatalogs(5);
            $products = getAllProduct();
            $catalogName = 'product';
            $idcatalog = 0;
            if (isset($_GET['min']) && isset($_GET['max'])) {
                $min = $_GET['min'];
                $max = $_GET['max'];
                $products = getProductByPriceFilter($min, $max);
            }
            if (isset($_GET['idcatalog']) && ($_GET['idcatalog'] > 0)) {
                $idcatalog = $_GET['idcatalog'];
                $products = getProductByCatalogId($idcatalog);
                $catalogName = getCatalogNameById($idcatalog)['name'];
                $recommendCatalog = getRelatedCatalog($idcatalog, 3);
                $relatedCatalog = getRelatedCatalog ($idcatalog , 3);   
            } else {
                $relatedCatalog = getCatalogs(3);
            }
            if ($idcatalog > 0) {
                if (isset($_GET['pageLimit']) && ($_GET['pageLimit'] > 0)) {
                    $products = getProductsByCatalogId($idcatalog, $_GET['pageLimit']);
                } else {
                    $products = getProductsByCatalogId($idcatalog, 9);
                }
            } else {
                if (isset($_GET['pageLimit']) && ($_GET['pageLimit'] > 0)) {
                    $products = getAllProduct($_GET['pageLimit']);
                } else {
                    $products = getAllProduct(9);
                }
            }
            
            require_once "./views/viewProduct.php";
            break;
        case 'viewCart':
            print_r($_SESSION['cart']);
            require_once './views/viewCart.php';
            break;
        case 'clearCart':
            unset($_SESSION['cart']);
            header('location: index.php?pg=viewCart');
            break;
        case 'delCart':
            if (isset($_GET['delProduct']) && $_GET['delProduct'] >= 0) {
                array_splice($_SESSION['cart'], $_GET['delProduct'], 1);
                header('location: index.php?pg=viewCart');
            }
            break;
        case 'buynow':
            if(isset($_GET['productId'])) {
                $productId = $_GET['productId'];
                $product = getProductById($productId);
                $_SESSION['cart'][] = $product;
                if (isset($_SESSION['user'])) {
                    header("Location: index.php?pg=order&productId=$productId");
                } else {
                    header("Location: index.php?pg=login&productId=$productId");
                }
            }
            break;
        case 'addCart':
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $name = $_POST['name'];
                $price = $_POST['price'];
                $img = $_POST['img'];
                $qty = $_POST['qty'];

                $product = [
                    "name" => $name,
                    "price" => $price,
                    "img" => $img,
                    "qty" => $qty,
                ];
                if (!isset($_SESSION['cart']) || !is_array($_SESSION['cart'])) 
                    $_SESSION['cart'] = [];
                // check product appeared
                $isAvailable = false;
                for ($i = 0; $i < count($_SESSION['cart']); $i++) {
                    if ($name === $_SESSION['cart'][$i]['name']) {
                        $isAvailable = true;
                        $newQty = $qty + $_SESSION['cart'][$i]['qty'];
                        $_SESSION['cart'][$i]['qty'] = $newQty;
                        break;
                    }
                }
                if (!$isAvailable) {
                    $_SESSION['cart'][$id] = $product;
                }
                header('location: index.php?pg=viewCart');
            }
            break;
        case 'viewProductDetail':
            if (isset($_GET['productId']) && $_GET['productId']) {
                $productId = $_GET['productId'];
                $product = getProductById($productId);
                $detail = getProductDetail($productId);
                $getDescription = getDescById($productId);
                // $description = array_slice($getDescription, 2);
                $productSpect = getProductSpectById($productId);
                $productOptions = getProductOptionsById($productId);
                $galleryImages = getProductImageById($productId);
                
                // view comment
                $comments = getCommentByProductId($productId);
                // print_r($comments);
                // add comment
                if (isset($_POST['addComment'])) {
                    if (!isset($_SESSION['user']) && empty($_SESSION['user'])) {
                        $loginFormStatus = 'active';
                    } else {
                        $comment = $_POST['comment'];
                        extract($_SESSION['user']);
                        addComment($comment, $id, $productId);
                    }
                }
                require_once "./views/productDetail.php";
            }
            break;
        case 'order':
            // get information from form to create an order
            if(isset($_SESSION['user'])) {
                $cart = $_SESSION['cart'];
                $message = '';
                require_once './views/order.php';
            } else {
                header("Location: index.php?pg=login");
            }
            break;
        case 'payment':
            $cart = $_SESSION['cart'];
            if (isset($_GET['billId'])) {
                $billId = $_GET['billId'];
                $shippingId = getShippingMethodByBillId($billId);
                extract($shippingId);
                $shippingFee = getShippingFee($shipping)['price'];
                $billInfo = getBillInfoById($billId);
            }
            // show bill information 
            $addressView = '';
            $emailView = '';
            $telView = '';
            if (isset($_POST['shippingAddress'])) {
                extract($billInfo);
                if ($nguoidat_address != '') {
                    $addressView = $nguoidat_address;
                } else {
                    $addressView = '';
                }
                if ($nguoidat_email != '') {
                    $emailView = $nguoidat_email;
                } else {
                    $emailView = '';
                }
                if ($nguoidat_phone != '') {
                    $telView = $nguoidat_phone;
                } else {
                    $telView = '';
                }
            }
            
            require_once './views/payment.php';
            break;
        case 'confirm':
            $cart = $_SESSION['cart'];
            if (isset($_GET['billId'])) {
                // get bill id
                $billId = $_GET['billId'];
                $shippingId = getShippingMethodByBillId($billId);
                extract($shippingId);
                $shippingFee = getShippingFee($shipping)['price'];
                $billInfo = getBillInfoById($billId);
                // print_r($billInfo);
                extract($billInfo);
                $shippingName = getShippingMethodNameById($shipping);
                // print_r($shippingName);
                if (isset($_POST['paymentDone'])) {
                    $payment = $_POST['paymentMethod'];
                    updatePaymentMethodByBillId($billId, $payment);
                    header('Location: index.php?pg=confirm&billId=' . $billId);
                }
            }
            require_once './views/confirm.php';
            break;
        default:
            // require_once "./views/home.php";
            break;
    }
} else {
    //Require home
    $heroBanner = getBanner(6);
    require_once "./views/home.php";
}
//Require footer
require_once "./views/footer.php";

?>