<?php
    session_start();
    ob_start();
    // connect database 
    require_once '../models/connect.php';
    require_once '../models/product.php';
    require_once '../models/catalog.php';
    require_once '../models/global.php';
    require_once '../models/user.php';
    require_once './public/head.php';
    require_once './public/header.php';
    require_once './public/top.php';
    require_once './public/userSidebar.php';

    $user = getUserById($id);
    extract($user);
    // print_r($user);

    if (isset($_GET['pg']) && $_GET['pg']) {
        switch ($_GET['pg']) {
            case 'general': // --> Done
                if (isset($_POST['updateGeneral'])) {
                    $username = $_POST['username'];
                    $email = $_POST['email'];
                    updateUserGeneral($username, $email, $id);
                    header('Location: index.php?pg=general&userId='.$id);
                }
                require_once './public/general.php';
                break;
            
            case 'profile': // --> Done
                if (isset($_POST['updateProfile'])) {
                    $fullName = $_POST['fullName'];
                    $bio = $_POST['bio'];
                    updateUserProfile($fullName, $bio, $id);
                    header('Location: index.php?pg=profile&user=' . $id . '');
                }
                require_once './public/profile.php';
                break;
            
            case 'password': // --> Done
                $message = '';
                if (isset($_POST['updatePassword'])) {
                    $newPassword = $_POST['newPassword'];
                    $oldPassword = $_POST['oldPassword'];
                    // Validate password
                    if (empty($newPassword)) {
                        $message = "If you want to change your password, enter your new password then confirm by enter your old one.";
                    } else if (empty($oldPassword)) {
                        $message = "Please enter your old password!";
                    } else if ($oldPassword !== $password) {
                        $message = "Your old password is incorrect!";
                    } else if (strlen($newPassword) < 6) {
                        $message = "Password must be at least 6 characters long!";
                    } else if ($newPassword === $oldPassword) {
                        $message = "Please consider another one, it looks like your old password!";
                    } else {
                        updateUserPassword($newPassword, $id);
                        $message = '<Password class="success-text">Password update successfully!</span>';
                    }
                } else {
                    $message = '';
                }
                require_once './public/password.php';
                break;
                
            case 'social': // --> Done
                require_once './public/social.php';
                break;
            
            case 'billing': // --> Done
                require_once './public/billing.php';
                break;
            
            case 'delete':
                $message = '';
                if (isset($_POST['deleteAccount'])) {
                    if (isset($_POST['deleteConfirm'])) {
                        $userPassword = $_POST['password'];
                        if (empty($userPassword)) {
                            $message = 'Please enter your password before deleting this account';
                        }else if ($userPassword !== $password) {
                            $message = 'Password is incorrect';
                        } else {
                            deleteAccountById($id);
                            unset($_SESSION['user']);
                            header('Location: ../index.php');
                        }
                    } else {
                        $message = 'Please ensure that you want to delete the account';
                    }
                }
                require_once './public/delete.php';
                break;
            
            default:
                require_once './public/dashboard.php';
                break;
        }
    } else {
        require_once './public/general.php';
    }
    require_once './public/footer.php';

?>