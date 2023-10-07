<?php
    if (isset($_GET['user']) && $_GET['user'] > 0) {
        $userId = $_GET['user'];
        $linkUser = '&user='.$userId;
    }
?>

<div class="user-info__body row g12 end">
    <!-- user sidebar start -->
    <ul class="user-sidebar r8 flex-column flex-full oh">
        <li class="nav__item"><a href="index.php?pg=general" class="nav__link">General</a></li>
        <li class="nav__item"><a href="index.php?pg=profile" class="nav__link">Edit Profile</a></li>
        <li class="nav__item"><a href="index.php?pg=password" class="nav__link">Password</a></li>
        <li class="nav__item"><a href="index.php?pg=social" class="nav__link">Social Profiles</a></li>
        <li class="nav__item"><a href="#" class="nav__link">Email Notifications</a></li>
        <li class="nav__item"><a href="index.php?pg=billing" class="nav__link">Billing</a></li>
        <li class="nav__item"><a href="#" class="nav__link">Data Export</a></li>
        <li class="nav__item"><a href="index.php?pg=delete" class="nav__link alert-text">Delete Account</a></li>
    </ul>
    <!-- user sidebar end -->