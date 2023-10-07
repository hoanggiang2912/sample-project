
    <div class="container-full admin__container flex">
        <!-- admin sidebar start -->
        <?php 
            require_once './public/sidebar.php';
        ?>
        <!-- admin sidebar end -->
        <main class="admin__panel p20 flex-column flex-full g20">
            <!-- admin header start -->
            <?php 
                require_once './public/header.php';
            ?>
            <!-- admin header end -->

            <h2 class="title admin__greeting tal">Hi Hoàng Giang , Welcome back!</h2>
            <div class="admin__main flex-column g12">
                <div class="row flex-between g12">
                    <div class="admin__box admin__box--revenue p20 r12 oh g30 flex-column flex-full">
                        <div class="admin__box--label label"><i class="admin__box--icon fa-solid fa-circle"></i> Update</div>
                        <div class="admin__box--text text">
                            Sales revenue increased <span class="primary-masking-text"> 20% </span> in 1 week
                        </div>
                        <div class="label">See analystic <i class="fa-solid fa-chevron-right"></i></div>
                    </div>
                    <div class="admin__box admin__box--revenue p20 r12 oh g30 flex-column flex-full">
                        <div class="admin__box--label label">Net Revenue</div>
                        <div class="admin__box--text admin__box--hightlight-text text">$123.000</div>
                        <div class="label"><i class="fa-solid fa-arrow-trend-up admin__box--icon"></i> 5% vs last month</div>
                    </div>
                    <div class="admin__box admin__box--revenue p20 r12 oh g30 flex-column flex-full">
                        <div class="admin__box--label label">Weekly Sales</div>
                        <div class="admin__box--text admin__box--hightlight-text text">$24.000</div>
                        <div class="label"><i class="fa-solid fa-arrow-trend-up admin__box--icon"></i> 5% vs last week</div>
                    </div>
                    <div class="admin__box admin__box--revenue p20 r12 oh g30 flex-column flex-full">
                        <div class="admin__box--label label">Monthly Sales</div>
                        <div class="admin__box--text admin__box--hightlight-text text">$24.000</div>
                        <div class="label"><i class="fa-solid fa-arrow-trend-up admin__box--icon"></i> 5% vs last month</div>
                    </div>
                </div>
                <div class="row flex-between g12">
                    <div class="flex-column g30 flex-full p20 r12 admin__box admin__box--category">
                        <div class="flex-between v-center">
                            <h4 class="heading-4 admin__box--title">Products</h4>
                            <a href="" class="body-text3">Detail</a>
                        </div>
                        <div class="row flex-between g20">
                            <div class="flex-column g30">
                                <h4 class="label">Product launched</h4>
                                <div class="flex v-center g12">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" viewBox="0 0 45 45" fill="none">
  <path d="M30.9375 17.6248L14.0625 7.89355" stroke="url(#paint0_linear_887_9375)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
  <path d="M39.375 30.0001V15.0001C39.3743 14.3424 39.2007 13.6966 38.8716 13.1272C38.5425 12.5579 38.0695 12.0851 37.5 11.7563L24.375 4.25631C23.8049 3.92718 23.1583 3.75391 22.5 3.75391C21.8417 3.75391 21.1951 3.92718 20.625 4.25631L7.5 11.7563C6.93049 12.0851 6.45746 12.5579 6.12837 13.1272C5.79927 13.6966 5.62567 14.3424 5.625 15.0001V30.0001C5.62567 30.6577 5.79927 31.3035 6.12837 31.8729C6.45746 32.4422 6.93049 32.915 7.5 33.2438L20.625 40.7438C21.1951 41.0729 21.8417 41.2462 22.5 41.2462C23.1583 41.2462 23.8049 41.0729 24.375 40.7438L37.5 33.2438C38.0695 32.915 38.5425 32.4422 38.8716 31.8729C39.2007 31.3035 39.3743 30.6577 39.375 30.0001Z" stroke="url(#paint1_linear_887_9375)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
  <path d="M6.13086 13.0498L22.4996 22.5186L38.8684 13.0498" stroke="url(#paint2_linear_887_9375)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
  <path d="M22.5 41.4V22.5" stroke="url(#paint3_linear_887_9375)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
  <defs>
    <linearGradient id="paint0_linear_887_9375" x1="14.0625" y1="17.6248" x2="26.1038" y2="7.18434" gradientUnits="userSpaceOnUse">
      <stop stop-color="#0054F6"/>
      <stop offset="1" stop-color="#3FBAFF"/>
    </linearGradient>
    <linearGradient id="paint1_linear_887_9375" x1="5.625" y1="41.2462" x2="40.7057" y2="25.4566" gradientUnits="userSpaceOnUse">
      <stop stop-color="#0054F6"/>
      <stop offset="1" stop-color="#3FBAFF"/>
    </linearGradient>
    <linearGradient id="paint2_linear_887_9375" x1="6.13086" y1="22.5186" x2="16.391" y2="4.78179" gradientUnits="userSpaceOnUse">
      <stop stop-color="#0054F6"/>
      <stop offset="1" stop-color="#3FBAFF"/>
    </linearGradient>
    <linearGradient id="paint3_linear_887_9375" x1="22.5" y1="41.4" x2="23.7491" y2="41.367" gradientUnits="userSpaceOnUse">
      <stop stop-color="#0054F6"/>
      <stop offset="1" stop-color="#3FBAFF"/>
    </linearGradient>
  </defs>
</svg>
                                    <div class="admin__box--text admin__box--hightlight-text text"> 240</div>
                                </div>
                                    <div class="label"><i class="fa-solid fa-arrow-trend-up admin__box--icon"></i> 5% vs last month</div>
                            </div>
                            <div class="flex-column g30">
                                <h4 class="label">Product Saled</h4>
                                <div class="flex v-center g12">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" viewBox="0 0 45 45" fill="none">
  <path d="M30.9375 17.6248L14.0625 7.89355" stroke="#00C2FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
  <path d="M39.375 30.0001V15.0001C39.3743 14.3424 39.2007 13.6966 38.8716 13.1272C38.5425 12.5579 38.0695 12.0851 37.5 11.7563L24.375 4.25631C23.8049 3.92718 23.1583 3.75391 22.5 3.75391C21.8417 3.75391 21.1951 3.92718 20.625 4.25631L7.5 11.7563C6.93049 12.0851 6.45746 12.5579 6.12837 13.1272C5.79927 13.6966 5.62567 14.3424 5.625 15.0001V30.0001C5.62567 30.6577 5.79927 31.3035 6.12837 31.8729C6.45746 32.4422 6.93049 32.915 7.5 33.2438L20.625 40.7438C21.1951 41.0729 21.8417 41.2462 22.5 41.2462C23.1583 41.2462 23.8049 41.0729 24.375 40.7438L37.5 33.2438C38.0695 32.915 38.5425 32.4422 38.8716 31.8729C39.2007 31.3035 39.3743 30.6577 39.375 30.0001Z" stroke="#00C2FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
  <path d="M6.13086 13.0498L22.4996 22.5186L38.8684 13.0498" stroke="#00C2FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
  <path d="M22.5 41.4V22.5" stroke="#00C2FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
                                    <div class="admin__box--text admin__box--hightlight-text text"> 100</div>
                                </div>
                                    <div class="label"><i class="fa-solid fa-arrow-trend-up admin__box--icon"></i> 5% vs last month</div>
                            </div>
                        </div>
                    </div>
                    <div class="flex-column g30 flex-full p20 r12 admin__box admin__box--category">
                        <div class="flex-between v-center">
                            <h4 class="heading-4 admin__box--title">Customers</h4>
                            <a href="" class="body-text3">Detail</a>
                        </div>
                        <div class="flex-between row g30">
                            <div class="flex-column g30">
                                <h4 class="label">New customers</h4>
                                <div class="flex v-center g12">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 35 35" fill="none">
  <path d="M22.75 14.4375C25.8911 14.4375 28.4375 11.8911 28.4375 8.75C28.4375 5.60888 25.8911 3.0625 22.75 3.0625M23.1875 20.5625H23.4062C28.1179 20.5625 31.9375 24.3821 31.9375 29.0938C31.9375 30.6643 30.6643 31.9375 29.0938 31.9375H26.25M17.9375 8.75C17.9375 11.8911 15.3911 14.4375 12.25 14.4375C9.10888 14.4375 6.5625 11.8911 6.5625 8.75C6.5625 5.60888 9.10888 3.0625 12.25 3.0625C15.3911 3.0625 17.9375 5.60888 17.9375 8.75ZM5.90625 31.9375H18.5938C20.1643 31.9375 21.4375 30.6643 21.4375 29.0938C21.4375 24.3821 17.6179 20.5625 12.9062 20.5625H11.5938C6.88207 20.5625 3.0625 24.3821 3.0625 29.0938C3.0625 30.6643 4.33569 31.9375 5.90625 31.9375Z" stroke="#00C2FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
                                    <div class="admin__box--text admin__box--hightlight-text text"> 50</div>
                                </div>
                                    <div class="label"><i class="fa-solid fa-arrow-trend-up admin__box--icon"></i> 5% vs last month</div>
                            </div>
                            <div class="flex-column g30">
                                <h4 class="label">Member customers</h4>
                                <div class="flex v-center g12">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 35 35" fill="none">
  <path d="M22.75 14.4375C25.8911 14.4375 28.4375 11.8911 28.4375 8.75C28.4375 5.60888 25.8911 3.0625 22.75 3.0625M23.1875 20.5625H23.4062C28.1179 20.5625 31.9375 24.3821 31.9375 29.0938C31.9375 30.6643 30.6643 31.9375 29.0938 31.9375H26.25M17.9375 8.75C17.9375 11.8911 15.3911 14.4375 12.25 14.4375C9.10888 14.4375 6.5625 11.8911 6.5625 8.75C6.5625 5.60888 9.10888 3.0625 12.25 3.0625C15.3911 3.0625 17.9375 5.60888 17.9375 8.75ZM5.90625 31.9375H18.5938C20.1643 31.9375 21.4375 30.6643 21.4375 29.0938C21.4375 24.3821 17.6179 20.5625 12.9062 20.5625H11.5938C6.88207 20.5625 3.0625 24.3821 3.0625 29.0938C3.0625 30.6643 4.33569 31.9375 5.90625 31.9375Z" stroke="url(#paint0_linear_887_9425)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
  <defs>
    <linearGradient id="paint0_linear_887_9425" x1="3.0625" y1="31.9375" x2="31.9375" y2="17.5" gradientUnits="userSpaceOnUse">
      <stop stop-color="#0054F6"/>
      <stop offset="1" stop-color="#3FBAFF"/>
    </linearGradient>
  </defs>
</svg>
                                    <div class="admin__box--text admin__box--hightlight-text text"> 100</div>
                                </div>
                                    <div class="label"><i class="fa-solid fa-arrow-trend-up admin__box--icon"></i> 5% vs last month</div>
                            </div>
                            <div class="flex-column g30">
                                <h4 class="label">Regular customers</h4>
                                <div class="flex v-center g12">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 35 35" fill="none">
  <path d="M22.75 14.4375C25.8911 14.4375 28.4375 11.8911 28.4375 8.75C28.4375 5.60888 25.8911 3.0625 22.75 3.0625M23.1875 20.5625H23.4062C28.1179 20.5625 31.9375 24.3821 31.9375 29.0938C31.9375 30.6643 30.6643 31.9375 29.0938 31.9375H26.25M17.9375 8.75C17.9375 11.8911 15.3911 14.4375 12.25 14.4375C9.10888 14.4375 6.5625 11.8911 6.5625 8.75C6.5625 5.60888 9.10888 3.0625 12.25 3.0625C15.3911 3.0625 17.9375 5.60888 17.9375 8.75ZM5.90625 31.9375H18.5938C20.1643 31.9375 21.4375 30.6643 21.4375 29.0938C21.4375 24.3821 17.6179 20.5625 12.9062 20.5625H11.5938C6.88207 20.5625 3.0625 24.3821 3.0625 29.0938C3.0625 30.6643 4.33569 31.9375 5.90625 31.9375Z" stroke="#FF9900" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
                                    <div class="admin__box--text admin__box--hightlight-text text"> 100</div>
                                </div>
                                    <div class="label"><i class="fa-solid fa-arrow-trend-up admin__box--icon"></i> 5% vs last month</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row flex-between g12">
                    <div class="admin__box admin__box--transaction flex-column g30 flex-full p20 r12">
                        <div class="flex-between v-center">
                            <h4 class="heading-4 admin__box--title">Orders</h4>
                            <a href="" class="body-text3">Detail</a>
                        </div>
                        <div class="flex-column g20 order__wrapper">
                            <!-- single transaction item start -->
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
                            <!-- single transaction item end -->
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
                            <div class="order__item row g20 flex-between flex-full">
                                <div class="flex g12">
                                    <img src="../views/assets/images/completed-icon.svg" alt="" class="order__banner">
                                    <div class="flex-column flex-between">
                                        <h4 class="order__name text smb">AKKO 5075B Cyan & Black</h4>
                                        <span class="label">July 21th 2023 - 09:45</span>
                                    </div>
                                </div>
                                <div class="flex-column flex-between flex-full end">
                                    <span class="order__status primary-masking-text">Complete</span>
                                    <span class="label">SDF13HFDF943</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="admin__box admin__box--customer flex-column g30 flex-full p20 r12 ">
                        <div class="flex-between v-center">
                            <h4 class="heading-4 admin__box--title">Customers</h4>
                            <a href="" class="body-text3">Detail</a>
                        </div>
                        <div class="flex-column g20 customer__wrapper">
                            <!-- single customer item start -->
                            <div class="customer__item row g20 flex-between flex-full">
                                <div class="flex g12">
                                    <img src="../views/assets/images/user__avt.png" alt="" class="customer__avt">
                                    <div class="flex-column flex-between">
                                        <div class="flex g12 v-center">
                                            <h4 class="order__name text smb">Leslie Alexander</h4>
                                            <span class="customer__role primary-masking-text">Member</span>
                                        </div>
                                        <span class="label customer__id">ID: 00246</span>
                                    </div>
                                </div>
                                <div class="flex g20 por">
                                    <a href="" class="customer__icon text">
                                        <i class="fal fa-message"></i>
                                    </a>
                                    <a href="" class="customer__icon detail__icon text">
                                        <i class="far fa-ellipsis-h"></i>
                                    </a>
                                    <ul class="customer-detail__nav common-box r8 poa">
                                        <li class="nav__item">
                                            <a href="" class="nav__link md g12 flex v-center"><i class="fal fa-eye"></i> See user details</a>
                                        </li>
                                        <li class="nav__item">
                                            <a href="" class="nav__link md g12 flex v-center"><i class="fal fa-box"></i> Billing history</a>
                                        </li>
                                        <li class="nav__item">
                                            <a href="" class="nav__link md g12 flex v-center"><i class="fal fa-message"></i> Chat with user</a>
                                        </li>
                                        <li class="nav__item">
                                            <a href="" class="nav__link md g12 flex v-center"><i class="fal fa-arrow-to-bottom"></i> Export user data</a>
                                        </li>
                                        <li class="nav__item">
                                            <a href="" class="nav__link required md g12 flex v-center"><i class="fal fa-user-times"></i> Delete user</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- single customer item end -->
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>