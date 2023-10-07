<div class="admin__header full v-center flex-between">
    <div class="header__icon sidebar__toggle p12 flex-center text r6 cp">
        <i class="fa-solid fa-sliders"></i>
    </div>
    <div class="header__searchbar">
        <form action="index.php?page=search" method="post" class="flex-full search__form oh">
            <input type="text" class="form__input" placeholder="Orders, customers, products...">
            <button type="submit" name="search" class="form__btn search__btn pi20">
                <i class="fa-solid fa-search text"></i>
            </button>
        </form>
    </div>
    <div class="flex g12 por">
        <a class="header__icon text p20 flex-center rf">
            <i class="fa-solid fa-bell"></i>
        </a>
        <a class="header__icon rf admin__avt toggle-admin-subnav common-banner">
            <img src="../views/assets/images/user__avt.png" alt="">
        </a>
        <ul class="admin__subnav r12 poa oh">
            <li class="subnav__item">
                <a href="" class="nav__link flex g12">
                    <div class="admin__avt">
                        <img src="../views/assets/images/user__avt.png" alt="">
                    </div>
                    <div class="flex-column flex-between">
                        <h2 class="body-text2 md admin__name">Hồ Duy Hoàng Giang</h2>
                        <h2 class="label md admin__role">Admin</h2>
                    </div>
                </a>
            </li>
            <li class="subnav__item flex flex-between">
                <form action="" class="search__form">
                    <input type="text" class="form__input" placeholder="Search...">
                    <button type="submit" name="search"><i class="fas fa-search text"></i></button>
                </form>
            </li>
            <li class="subnav__item">
                <a href="" class="nav__link flex-between">
                    Messages
                    <span class="noti rf flex-center smb">5+</span>
                </a>
            </li>
            <li class="subnav__item">
                <a href="" class="nav__link flex-between">
                    Schedule
                    <!-- <span class="noti rf flex-center smb">5+</span> -->
                </a>
            </li>
            <li class="subnav__item">
                <a href="" class="nav__link flex-between">
                    Your plans
                    <!-- <span class="noti rf flex-center smb">5+</span> -->
                </a>
            </li>
            <li class="subnav__item">
                <a href="" class="nav__link flex-between">
                    Reminder
                    <!-- <span class="noti rf flex-center smb">5+</span> -->
                </a>
            </li>
            <li class="subnav__item">
                <a href="index.php?pg=logout" class="nav__link flex-between alert-text">
                    Log out
                    <!-- <span class="noti rf flex-center smb">5+</span> -->
                </a>
            </li>
        </ul>
    </div>
</div>