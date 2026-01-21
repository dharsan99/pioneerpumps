            <div class="vertical-menu">
                <div data-simplebar class="h-100">
                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title" key="t-menu">Menu</li>

                            <li>
                                <a href="<?php echo AdminUrl ?>" class="waves-effect">
                                    <i class="bx bx-home-circle"></i>
                                    <span key="t-dashboard">Dashboard</span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="bx bx-right-arrow-alt"></i>
                                    <span key="t-category">Category</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="<?php echo AdminUrl ?>category/list_category.htm" key="t-list_category">List</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="bx bx-right-arrow-alt"></i>
                                    <span key="t-subcategory">SubCategory</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="<?php echo AdminUrl ?>subcategory/list_subcategory.htm" key="t-list_subcategory">List</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="bx bx-right-arrow-alt"></i>
                                    <span key="t-product">Product</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="<?php echo AdminUrl ?>product/list_product.htm" key="t-list_product">List</a></li>
                                </ul>
                            </li>
                                 <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="bx bx-right-arrow-alt"></i>
                                    <span key="t-product">Gallery</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="<?php echo AdminUrl ?>gallery/list_gallery.htm" key="t-list_product">List</a></li>
                                </ul>
                            </li>

                            <!-- <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="bx bx-right-arrow-alt"></i>
                                    <span key="t-performance_chart">Performance Chart</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="<?php echo AdminUrl ?>product/list_performance_chart.htm" key="t-list_performance_chart">List</a></li>
                                </ul>
                            </li> -->

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="bx bx-right-arrow-alt"></i>
                                    <span key="t-news_events">News & Events</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="<?php echo AdminUrl ?>news_events/list_news_events.htm" key="t-list_news_events">List</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="bx bx-right-arrow-alt"></i>
                                    <span key="t-contact_form">Contact Form</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="<?php echo AdminUrl ?>contact_form/list_contact_form.htm" key="t-list_contact_form">List</a></li>
                                </ul>
                            </li>
                              <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="bx bx-right-arrow-alt"></i>
                                    <span key="t-contact_form">QR Codes</span>
                                </a>
                            
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="<?php echo AdminUrl ?>pages/qr-generator.php" key="QR-Generator"> Genearte QR Code</a></li>
                                    <li><a href="<?php echo AdminUrl ?>pages/upload-qr-prod.php" key="Upload-QR-Products"> Upload QR Products</a></li>
                                </ul>
                            </li>

                            <!-- <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="bx bxs-user-rectangle"></i>
                                    <span key="t-seller">Seller</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="<?php echo AdminUrl ?>seller/list_seller.htm" key="t-list">List</a></li>
                                    <li><a href="<?php echo AdminUrl ?>seller/list_reset_password.htm" key="t-seller-password">Reset Password</a></li>
                                    <li><a href="<?php echo AdminUrl ?>seller/list_restriction.htm" key="t-restriction">Restriction</a></li>
                                    <li><a href="<?php echo AdminUrl ?>seller/list_verification.htm" key="t-verification">Verification</a></li>
                                    <li><a href="<?php echo AdminUrl ?>seller/list_faq.htm" key="t-faq">FAQ</a></li>
                                    <li><a href="<?php echo AdminUrl ?>seller/list_product_image.htm" key="t-product-image">Product Image</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="bx bxs-user-rectangle"></i>
                                    <span key="t-user">User</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="<?php echo AdminUrl ?>user/list_user.htm" key="t-list">List</a></li>
                                    <li><a href="<?php echo AdminUrl ?>user/list_faq.htm" key="t-faq">FAQ</a></li>
                                    <li><a href="<?php echo AdminUrl ?>user/list_restriction.htm" key="t-restriction">Restriction</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="bx bx-add-to-queue"></i>
                                    <span key="t-product">Product</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="<?php echo AdminUrl ?>product/list_category.htm" key="t-category">Category</a></li>
                                    <li><a href="<?php echo AdminUrl ?>product/list_subcategory.htm" key="t-subcategory">Subcategory</a></li>
                                    <li><a href="<?php echo AdminUrl ?>product/list_product.htm" key="t-product">Product</a></li>
                                    <li><a href="<?php echo AdminUrl ?>product/list_offer.htm" key="t-offer">Offer</a></li>
                                </ul>
                            </li> -->

                            <!-- <li>
                                <a href="<?php echo AdminUrl ?>profile.htm" class="waves-effect">
                                    <i class="bx bx-user"></i>
                                    <span key="t-profile">Profile</span>
                                </a>
                            </li>

                            <li>
                                <a href="<?php echo AdminUrl ?>change_password.htm" class="waves-effect">
                                    <i class="bx bx-lock-alt"></i>
                                    <span key="t-change-Pwd">Change Password</span>
                                </a>
                            </li>

                            <li>
                                <a href="<?php echo AdminUrl ?>logout.htm" class="waves-effect">
                                    <i class="bx bx-log-out"></i>
                                    <span key="t-logout">Logout</span>
                                </a>
                            </li> -->

                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>