<?php
    $page = 'General';
    if (isset($_GET['pg'])) {
        $page = $_GET['pg'];
    }
?>

    <!-- || big text start -->
    <h1 class="big-text"><?= $page ?><h1>
    <!-- || big text end -->

    <!-- || user main section start -->
    <section class="section user__section mt100">
        <main class="user-section__main flex-column g12">
            <!-- user info top start -->
            <div class="user-info__top p20 r8 g12 flex start v-center">
                <div class="user__avt common-banner rf"
                    style="background-image: url('../views/assets/images/user__avt.png')"></div>
                <div class="row g6">
                    <h2 class="smb user__detail"><?= $name ?></h2>
                    <h2 class="smb user__detail">/ <?= $page ?></h2>
                    <h2 class="smb user__detail ttc"><h2>
                </div>

            </div>
            <!-- user info top end -->