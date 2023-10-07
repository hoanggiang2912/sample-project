<main class="billing-main flex-full flex-column p20 g30 r12" method="post">
    <div class="billing-main__top flex-between v-center">
        <h2 class="bold">All orders</h2>
        <div class="filter order-filter toggle-filter flex g6 cp p10 smb v-center">
            <i class="fal fa-filter rg"></i>
            Filter
            <ul class="filter__list">
                <li class="filter__item">
                    <a href="" class="filter__link flex-between v-center">
                        <div class="flex g6 v-center">
                            <img src="../views/assets/images/completed-icon.svg" alt="">
                            <div class="filter__name smb">Complete orders</div>
                        </div>
                        <div class="filter__sublabel label">55</div>
                    </a>
                </li>
                <li class="filter__item">
                    <a href="" class="filter__link flex-between v-center">
                        <div class="flex g6 v-center">
                            <img src="../views/assets/images/delivering-icon.svg" alt="">
                            <div class="filter__name smb">Delivering orders</div>
                        </div>
                        <div class="filter__sublabel label">55</div>
                    </a>
                </li>
                <li class="filter__item">
                    <a href="" class="filter__link flex-between v-center">
                        <div class="flex g6 v-center">
                            <img src="../views/assets/images/return-icon.svg" alt="">
                            <div class="filter__name smb">Return orders</div>
                        </div>
                        <div class="filter__sublabel label">55</div>
                    </a>
                </li>
                <li class="filter__item">
                    <a href="" class="filter__link flex-between v-center">
                        <div class="flex g6 v-center">
                            <img src="../views/assets/images/cancelled-icon.svg" alt="">
                            <div class="filter__name smb">Cancelled orders</div>
                        </div>
                        <div class="filter__sublabel label">55</div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="billing-main__body flex-center v-wrapper order__wrapper">
        <!-- single item start -->
        <div class="order__item row flex-between flex-full">
            <div class="flex g12">
                <div class="common-banner order__banner"
                    style="background-image: url('../views/assets/images/banner4.webp')"></div>
                <div class="flex-column flex-between">
                    <p class="order-product__name smb">Gateron KS-3 Milky Pro </p>
                    <p class="order__status primary-masking-text smb">Complete</p>
                    <!-- <p class="order__status text-alert smb">Cancelled</p>
                                        <p class="order__status accent-text smb">Return</p>
                                        <p class="order__status primary-text smb">Delivery</p> -->
                </div>
            </div>
            <div class="flex-column flex-between end">
                <p class="order__price smb">$165.00</p>
                <div class="row g12 j-end">
                    <button class="btn primary__btn">Repurchase</button>
                    <button class="btn outline__btn"><i class="fal fa-message"></i> Get help</button>
                </div>
            </div>
        </div>
        <!-- single item end -->
    </div>
</main>