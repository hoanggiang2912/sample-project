<div class="container-full admin__container flex">
    <?php 
        require_once 'sidebar.php';
    ?>
    <main class="admin__panel p20 flex-column flex-full g20">
        <?php
            require_once 'header.php';
        ?>
        <div class="admin__main row g12">
            <div class="order-box__wrapper flex-full flex-between flex-column g12">            
                <div class="admin__box admin__box--order p20 r12 oh g30 flex-column flex-full">
                    <div class="admin__box--label primary-masking-text md">Complete</div>
                    <div class="admin__box--text admin__box--hightlight-text text">55 <span class="label smb">orders</span></div>
                    <div class="label"><i class="fa-solid fa-arrow-trend-up admin__box--icon"></i> 5% vs last month</div>
                </div>
                <div class="admin__box admin__box--order p20 r12 oh g30 flex-column flex-full">
                    <div class="admin__box--label label primary-text">Delivering</div>
                    <div class="admin__box--text admin__box--hightlight-text text">128 <span class="label smb">orders</span></div>
                    <div class="label"><i class="fa-solid fa-arrow-trend-up admin__box--icon"></i> 5% vs last month</div>
                </div>
                <div class="admin__box admin__box--order p20 r12 oh g30 flex-column flex-full">
                    <div class="admin__box--label label accent-text"> Return / refund</div>
                    <div class="admin__box--text admin__box--hightlight-text text">8 <span class="label smb">orders</span></div>
                    <div class="label"><i class="fa-solid fa-arrow-trend-down admin__box--icon alert-text"></i> 5% vs last week</div>
                </div>
                <div class="admin__box admin__box--order p20 r12 oh g30 flex-column flex-full">
                    <div class="admin__box--label label alert-text"> Cancelled </div>
                    <div class="admin__box--text admin__box--hightlight-text text">12 <span class="label smb">orders</span></div>
                    <div class="label"><i class="fa-solid fa-arrow-trend-down admin__box--icon alert-text"></i> 5% vs last month</div>
                </div>
            </div>
            <div class="admin__box admin__box--order flex-column g30 flex-full p20 r12">
                <div class="flex-between v-center">
                    <h4 class="heading-4 admin__box--title">All orders</h4>
                    <div class="filter order-filter toggle-filter flex text v-center smb g6 cp p10">
                        <i class="far fa-filter"></i>
                        Filter
                        <ul class="filter__list">
                            <li class="filter__item">
                                <a href="" class="filter__link flex-between v-center">
                                    <div class="flex g6 v-center">
                                        <img src="/app/views/assets/images/completed-icon.svg" alt="">
                                        <div class="filter__name smb">Complete orders</div>
                                    </div>
                                    <div class="filter__sublabel label">55</div>
                                </a>
                            </li>
                            <li class="filter__item">
                                <a href="" class="filter__link flex-between v-center">
                                    <div class="flex g6 v-center">
                                        <img src="/app/views/assets/images/delivering-icon.svg" alt="">
                                        <div class="filter__name smb">Delivering orders</div>
                                    </div>
                                    <div class="filter__sublabel label">55</div>
                                </a>
                            </li>
                            <li class="filter__item">
                                <a href="" class="filter__link flex-between v-center">
                                    <div class="flex g6 v-center">
                                        <img src="/app/views/assets/images/return-icon.svg" alt="">
                                        <div class="filter__name smb">Return orders</div>
                                    </div>
                                    <div class="filter__sublabel label">55</div>
                                </a>
                            </li>
                            <li class="filter__item">
                                <a href="" class="filter__link flex-between v-center">
                                    <div class="flex g6 v-center">
                                        <img src="/app/views/assets/images/cancelled-icon.svg" alt="">
                                        <div class="filter__name smb">Cancelled orders</div>
                                    </div>
                                    <div class="filter__sublabel label">55</div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="flex-column g20 order__wrapper">
                    <!-- single order item start -->
                    <div class="order__item row g20 flex-between flex-full">
                        <div class="flex g12">
                            <img src="../views/assets/images/completed-icon.svg" alt="" class="order__banner">
                            <div class="flex-column flex-between">
                                <h4 class="order__name text smb">AKKO 5075B Cyan & Black</h4>
                                <span class="label">July 21th 2023 - 09:45</span>
                            </div>
                        </div>
                        <div class="flex-column flex-between end">
                            <span class="order__status primary-masking-text">Complete</span>
                            <span class="label">SDF13HFDF943</span>
                        </div>
                    </div>
                    <!-- single order item end -->
                </div>
            </div>
        </div>
    </main>
</div>