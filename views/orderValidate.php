<?php
    session_start();
    ob_start();
    
    function connectDB () {
        $servername = "localhost";
        $username = "root";
        $password = "";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=typistialdb_restore", $username, $password);
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
    
    function createBill ($user_id , $address , $email , $tel , $shipping , $totalBill) {
        $mySQL = "INSERT INTO bill (id_user , nguoidat_address , nguoidat_email , nguoidat_phone , shipping , total , createDate) VALUES ('$user_id','$address','$email' , '$tel' ,'$shipping' , '$totalBill' , NOW())";
        $last_id = insertBill($mySQL);
        return $last_id;
    }
    function createCart ($billId , $product_name , $product_img , $unit_price , $product_qty , $total_cost) {
        $mySQL = "INSERT INTO cart (id_bill , product_name , img , unit_price , qty , total_cost) VALUES ('$billId' , '$product_name' , '$product_img' , '$unit_price' , '$product_qty' , '$total_cost')";
        insert($mySQL);
    }
    function totalBill ($cart) {
        $total = 0;
        foreach ($cart as $item) {
            extract($item);
            $subTotal = $price * $qty;    
            $total += $subTotal;
        }
        return $total;
    }
    function getShippingMethodByBillId ($billId) {
        $mySQL = "SELECT shipping FROM bill WHERE id = '$billId'";
        return get_one($mySQL);
    }
    function getBillInfoById ($billId) {
        $mySQL = "SELECT * FROM bill WHERE id = '$billId'";
        return get_one($mySQL);
    }
    function updatePaymentMethodByBillId ($billId , $payment) {
        $mySQL = "UPDATE bill SET pm='$payment' WHERE id=$billId";
        insert($mySQL);
    }
    function getShippingMethodNameById ($shipping) {
        $mySQL = "SELECT name FROM shipping WHERE id=$shipping";
        return get_one($mySQL);
    }

    $cart = $_SESSION['cart'];
    // Enable error reporting for debugging
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    $response = array(); // Initialize the response array

    if (isset($_POST['submit'])) {
        $country = $_POST['country'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $tel = $_POST['tel'];
        $shipping = $_POST['shipping'];

        $errorEmpty = false;
        $emailEmpty = false;
        $uncheckedShipping = false;

        // check flag
        if (
            empty($country) ||
            empty($email) ||
            empty($address) ||
            empty($tel) ||
            empty($shipping)
        ) {
            $errorEmpty = true;
        } else if ($shipping == 'undefined') {
            $uncheckedShipping = true;
        } else if (empty($email)) {
            $emailEmpty = true;
        }

        // Initialize an empty message
        $message = '';
        if (isset($_SESSION['user'])) {
            $user = $_SESSION['user'];
            extract($user);
        }
        
        // display error
        if ($errorEmpty) {
            $message = "Please fill in all fields";
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $message = "Please enter a valid email";
        } else {
            $totalBill = totalBill($cart);
            $billId = createBill($id, $address, $email, $tel, $shipping, $totalBill);

            foreach ($cart as $item) {
                extract($item);
                $product_name = $name;
                $product_img = $img;
                $unit_price = $price;
                $product_qty = $qty;
                $total_cost = $unit_price * $product_qty;
                createCart($billId, $product_name, $product_img, $unit_price, $product_qty, $total_cost);
            }
            
            // Set the response flags
            $response['success'] = true;
            $response['redirect'] = "index.php?pg=payment&billId=$billId";
            $message = "Data have been sent";
        }
        
        $response['message'] = $message;
    } 
    // else {
    //     $response['error'] = "There was an error";
    // }

    // Send the JSON response
    header('Content-Type: application/json');
    echo json_encode($response);
?>