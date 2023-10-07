<?php

// search engine
    if (isset($_POST['search'])) {
        $Name = $_POST['search'];

        // connect database
        $servername = "localhost";
        $username = "root";
        $password = "";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=typistialdb", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Connected successfully";
            // fetch data
            $Query = "SELECT * FROM product WHERE name LIKE '%$Name%' LIMIT 5";

            $stmt = $conn->prepare($Query);
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $productList = $stmt->fetchAll();
            $conn = null;

            foreach ($productList as $item) {
                extract($item);
                $imgPath = "./views/assets/images/$img";
                echo '
                    <a href="index.php?pg=viewProductDetail&productId='.$id.'">
                        <div class="search__product flex g12">
                            <div class="common-banner product__banner" style="background-image: url('.$imgPath.')"></div>
                            <div class="flex-column flex-between">
                                <h5 class="text product__name">'.$name.'</h5>
                                <span class="smb">$'.$price.'</span>
                            </div>
                        </div>
                    </a>
                    <br class="break-line">
                ';
            }
        } catch (PDOException $e) {
            // echo "Connection failed: " . $e->getMessage();
        }
    }

?>