<?php 
    function connectDB () {
        $servername = "localhost";
        $username = "root";
        $password = "";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=typistial database", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Connected successfully";
        } catch (PDOException $e) {
            // echo "Connection failed: " . $e->getMessage();
        }

        return $conn;
    }

    function get_all ($mySQL) {
        $conn = connectDB();
        $stmt = $conn->prepare($mySQL);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $productList = $stmt->fetchAll();
        $conn = null;
        return $productList;
    }
    function get_one($mySQL){
        $conn = connectDB();
        $stmt = $conn->prepare($mySQL);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $singleResult = $stmt->fetch();
        $conn = null;
        return $singleResult;
    }
function renderGeneralProduct($productArr) {
    foreach ($productArr as $item) {
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
            $giamoi = '';
            $gia = '<h4 class="product__price"> $' . $price . '</h4>';
        }
        if ($promotion > 0) {
            $promo = '<div class="product__label sale__label">-'.$promotion.'%</div>';
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
                <a href="" class="btn add__btn">
                    <i class="fa-solid fa-plus"></i> Xem sau
                </a>
                <a href="" class="btn buy__btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
<path d="M13.25 7.25V4.95C13.25 3.8299 13.25 3.26984 13.032 2.84202C12.8403 2.46569 12.5343 2.15973 12.158 1.96799C11.7301 1.75 11.1701 1.75 10.05 1.75H9.94999C8.82988 1.75 8.26983 1.75 7.842 1.96799C7.46568 2.15973 7.15972 2.46569 6.96797 2.84202C6.74998 3.26984 6.74998 3.8299 6.74998 4.95V7.25M6.19579 18.25H13.8042C15.0014 18.25 15.6 18.25 16.0436 18.0114C16.4334 17.8018 16.7427 17.4688 16.923 17.0646C17.1281 16.6046 17.0839 16.0076 16.9954 14.8136L16.4695 7.71361C16.3921 6.66903 16.3534 6.14675 16.1253 5.75104C15.9244 5.40263 15.6232 5.12288 15.2609 4.94829C14.8494 4.75 14.3257 4.75 13.2783 4.75H6.72171C5.67428 4.75 5.15056 4.75 4.73908 4.94829C4.37679 5.12288 4.07554 5.40263 3.87466 5.75104C3.64652 6.14675 3.60783 6.66903 3.53046 7.71361L3.00453 14.8136C2.91609 16.0076 2.87187 16.6046 3.07701 17.0646C3.25728 17.4688 3.56653 17.8018 3.95633 18.0114C4.39993 18.25 4.99855 18.25 6.19579 18.25Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
                    Mua ngay
                </a>
            ';
        }
        $backgroundLink = "./views/assets/images/" . $img;
        $productLink = "index.php?pg=viewProductDetail&productId=".$id;
        $html = '';
        $html .= '
                <div class="col-4 product r12">
                    <div class="flex-column product__inner">
                        <a href="'. $productLink .'" class="product__banner r6">
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
                        <a href="'.$productLink.'" class="product__detail">
                            <h2 class="product__name">'.$name.'</h2>
                            <div class="flex-center g12">
                                '.$giamoi.$gia.'
                            </div>
                        </a>
                    </div>
                </div>
            ';
        echo $html;
    }
    
}

    function renderCollectionItem ($collectionItems) {
        foreach ($collectionItems as $item) {
            extract($item);
            $linkDetail = 'index.php?pg=viewProduct&idcatalog='.$id;
            $imgPath = "./views/assets/images/$img";
            echo '
                <div class="col-3 collections__item">
                    <div class="oh">
                        <div class="collection-item__inner">
                            <div class="collection__banner">
                                <img src="'.$imgPath.'" alt="">
                            </div>
                            <div class="collection__info__overlay">
                                <div class="collection__info">
                                    <div class="info__text">
                                        <h4 class="body-text3 info-text__label">Shop</h4>
                                        <h4 class="accent-text">'.$name.'</h4>
                                    </div>
                                    <a href="'. $linkDetail .'" class="btn info__btn banner__btn mt12">Xem ngay</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            ';
        }
    }

    function delete ($sql) {
        $conn = connectdb();
        $conn->exec($sql);
        $conn = null;
    }
    function insert ($sql) {
        $conn = connectdb();
        $conn->exec($sql);
        $conn = null;
    }
    function insertBill ($sql) {
        $conn = connectdb();
        $conn->exec($sql);
        $last_id = $conn->lastInsertId();
        $conn = null;
        return $last_id;
    }
    function update ($sql) {
        $conn = connectdb();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $conn = null;  
    }
    function generateRandomBillingID($length = 8) {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $billingID = '';
        
        for ($i = 0; $i < $length; $i++) {
            $randomIndex = rand(0, strlen($characters) - 1);
            $billingID .= $characters[$randomIndex];
        }
        
        return $billingID;
    }
?>