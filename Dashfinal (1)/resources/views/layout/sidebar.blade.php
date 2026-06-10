<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu" style="background-color: #2e356b;">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title text-white" data-key="t-menu">Menu</li>

                <li>
                    <a href="{{ url('/') }}">
                        <i data-feather="home" style="color:#eebe6c"></i>
                        {{-- <span class="badge rounded-pill bg-success-subtle text-success float-end">9+</span> --}}
                        <span data-key="t-dashboard" style="color:#eebe6c">Dashboard</span>
                    </a>
                </li>
                @if (Auth::user()->role === 'Vendor')
                    <li>
                        <a href="{{ url('/vendor/productstock') }}">
                            <i class="fa fa-tasks" aria-hidden="true"></i>
                            <span data-key="t-dashboard">Page Controller</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/vendor/orders') }}">
                            <i class="fa fa-cart-plus" aria-hidden="true"></i>
                            <span data-key="t-dashboard">Orders</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/vendor/offers') }}">
                            <i class="fa fa-sort-amount-asc" aria-hidden="true"></i>
                            <span data-key="t-dashboard">Offers</span>
                        </a>
                    </li>
                @endif


                <li class="menu-title" data-key="t-apps"></li>

                @if (Auth::user()->role != 'Vendor')

                    <li class="menu-title text-white" data-key="t-menu">Website</li>
                    <li>
                        <a href="{{ url('/banner/view') }}">
                            <i class="far fa-image " style="color:#eebe6c"></i>
                            <span data-key="t-dashboard" style="color:#eebe6c">Banner</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/category/view') }}">
                            <i class="fa fa-tasks " aria-hidden="true" style="color:#eebe6c"></i>
                            <span data-key="t-dashboard" style="color:#eebe6c">Categories</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/product/view') }}">
                            <i class="fas fa-box " style="color:#eebe6c"></i>
                            <span data-key="t-dashboard" style="color:#eebe6c">Products</span>
                        </a>
                    </li>
                    <!-- <li>-->
                    <!--    <a href="{{ url('/homesection/view') }}">-->
                    <!--       <i class="fas fa-box " style="color:#eebe6c"></i>-->
                    <!--        <span data-key="t-dashboard" style="color:#eebe6c">Home Sections</span>-->
                    <!--    </a>-->
                    <!--</li>-->
                    <li>
                        <a href="{{ url('/customer') }}">
                            <i class="far fa-handshake " aria-hidden="true" style="color:#eebe6c"> </i>
                            <span data-key="t-dashboard" style="color:#eebe6c">Customers</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow">
                            <i class="fas fa-map " aria-hidden="true" style="color:#eebe6c"></i>
                            <span data-key="t-geography" style="color:#eebe6c">Geography</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ url('/state') }}" style="color:#eebe6c">State</a></li>
                            <li><a href="{{ url('/city') }}" style="color:#eebe6c">City</a></li>
                            <li><a href="{{ url('/area') }}" style="color:#eebe6c">Area</a></li>
                        </ul>
                    </li>
                    {{-- <li>
                        <a href="javascript: void(0);" class="has-arrow">
                            <i data-feather="shopping-cart"></i>
                            <span data-key="t-ecommerce">Website</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ url('/banner/view') }}" key="t-products" style="color:#eebe6c">Banner</a></li>
                            <li><a href="{{ url('/category/view') }}" key="t-products" style="color:#eebe6c">Categories</a>
                            </li>

                            <li><a href="{{ url('/product/view') }}" data-key="t-orders" style="color:#eebe6c">Products</a>
                            </li>
                            <li><a href="{{ url('/customer') }}" data-key="t-customers" style="color:#eebe6c">Customers</a>
                            </li>
                            <li><a href="{{ url('/area') }}" data-key="t-cart" style="color:#eebe6c">Area</a></li>

                        </ul>
                    </li> --}}

                    <li class="menu-title text-white" data-key="t-menu">Orders</li>
                    <li>
                        <a href="{{ url('/onoff/view') }}">
                            <i class="fas fa-moon " aria-hidden="true" style="color:#eebe6c"></i>
                            <span data-key="t-dashboard" style="color:#eebe6c">On Off Status</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/billing') }}">
                            <i class="fas fa-file-invoice-dollar" style="color:#eebe6c"></i>
                            <span data-key="t-dashboard" style="color:#eebe6c">Billing & Invoices</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/vendor/ordersstatus') }}">
                            <i class="fas fa-pen-square " style="color:#eebe6c"></i>
                            <span data-key="t-dashboard" style="color:#eebe6c">Order Status</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/todayorder') }}">
                            <i class="fas fa-shopping-basket " style="color:#eebe6c"></i>
                            <span data-key="t-dashboard" style="color:#eebe6c">Today Orders</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/vendor/orders') }}">
                            <i class="fas fa-shopping-cart" style="color:#eebe6c"></i>
                            <span data-key="t-dashboard" style="color:#eebe6c">All Orders</span>
                        </a>
                    </li>





                    <li class="menu-title text-white" data-key="t-menu">Report</li>


                    <li>
                        <a href="{{ url('/topcustomer') }}">
                            <i class="fas fa-user-plus " aria-hidden="true" style="color:#eebe6c"></i>
                            <span data-key="t-dashboard" style="color:#eebe6c">Top Customers</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/contact-enquiries') }}">
                            <i class="fas fa-envelope-open-text " aria-hidden="true" style="color:#eebe6c"></i>
                            <span data-key="t-dashboard" style="color:#eebe6c">Contact Enquiries</span>
                        </a>
                    </li>
                    <!-- <li>
                            <a href="{{ url('/testmonial/view') }}">
                                <i class="far fa-comment " aria-hidden="true" style="color:#eebe6c"></i>
                                <span data-key="t-dashboard"  style="color:#eebe6c">Testimonials</span>
                            </a>
                        </li> -->
                    <li>
                        <a href="{{ url('/brand/view') }}">
                            <i class="fas fa-eye " aria-hidden="true" style="color:#eebe6c"></i>
                            <span data-key="t-dashboard" style="color:#eebe6c">Brand Logos</span>
                        </a>
                    </li>

                    <li class="menu-title text-white" data-key="t-menu">SEO</li>
                    <li>
                        <a href="{{ url('/seoheading/view') }}">
                            <i class="fab fa-font-awesome-flag " aria-hidden="true" style="color:#eebe6c"></i>
                            <span data-key="t-dashboard" style="color:#eebe6c">Seo Heading</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/seo/view') }}">
                            <i class="fab fa-font-awesome-flag " aria-hidden="true" style="color:#eebe6c"></i>
                            <span data-key="t-dashboard" style="color:#eebe6c">SEO Details</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/blog/view') }}">
                            <i class="fab fa-font-awesome-flag " aria-hidden="true" style="color:#eebe6c"></i>
                            <span data-key="t-dashboard" style="color:#eebe6c">Blog</span>
                        </a>
                    </li>

                    <li class="menu-title text-white" data-key="t-menu">Settings</li>
                    <li>
                        <a href="{{ url('/admin/global-settings') }}">
                            <i class="fas fa-globe " aria-hidden="true" style="color:#eebe6c"></i>
                            <span data-key="t-dashboard" style="color:#eebe6c">Global Settings</span>
                        </a>
                    </li>
                    

                    <li>
                        <a href="{{ url('/home-settings') }}">
                            <i class="fas fa-home " aria-hidden="true" style="color:#eebe6c"></i>
                            <span data-key="t-dashboard" style="color:#eebe6c">Home Page Setup</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/about-us-settings') }}">
                            <i class="fas fa-info-circle " aria-hidden="true" style="color:#eebe6c"></i>
                            <span data-key="t-dashboard" style="color:#eebe6c">About Us Setup</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/payment-settings') }}">
                            <i class="fas fa-money-check-dollar " aria-hidden="true" style="color:#eebe6c"></i>
                            <span data-key="t-dashboard" style="color:#eebe6c">Payment Setup</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/contact-us-settings') }}">
                            <i class="fas fa-address-book " aria-hidden="true" style="color:#eebe6c"></i>
                            <span data-key="t-dashboard" style="color:#eebe6c">Contact Us Setup</span>
                        </a>
                    </li>
                    <!--<li>-->
                    <!--    <a href="{{ url('/theme-settings') }}">-->
                    <!--        <i class="fas fa-cog " aria-hidden="true" style="color:#eebe6c"></i>-->
                    <!--        <span data-key="t-dashboard" style="color:#eebe6c">Theme Settings</span>-->
                    <!--    </a>-->
                    <!--</li>-->
                    <li>
                        <a href="{{ url('/terms-conditions') }}">
                            <i class="fas fa-file-contract " aria-hidden="true" style="color:#eebe6c"></i>
                            <span data-key="t-dashboard" style="color:#eebe6c">Terms & Conditions</span>
                        </a>
                    </li>
                    
                    
                    

                    {{-- <li>
                        <a href="javascript: void(0);" class="has-arrow">
                            <i data-feather="shopping-cart"></i>
                            <span data-key="t-ecommerce">Order</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">

                            <li><a href="{{ url('/vendor/orders') }}" data-key="t-orders">Orders</a></li>
                            <li><a href="{{ url('/vendor/ordersstatus') }}" data-key="t-ordersstatus">Order Status</a></li>


                        </ul>
                    </li> --}}

                    {{-- <li>
                        <a href="{{ url('/vendor/offers') }}">
                            <i class="fa fa-sort-amount-asc" aria-hidden="true"></i>
                            <span data-key="t-dashboard">Offers</span>
                        </a>
                    </li> --}}
                @endif



                {{-- <li>
                    <a href="apps-chat.html">
                        <i data-feather="message-square"></i>
                        <span data-key="t-chat">Chat</span>
                    </a>
                </li> --}}



                {{-- <li>
                    <a href="apps-calendar.html">
                        <i data-feather="calendar"></i>
                        <span data-key="t-calendar">Calendar</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="users"></i>
                        <span data-key="t-contacts">Contacts</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="apps-contacts-grid.html" data-key="t-user-grid">User Grid</a></li>
                        <li><a href="apps-contacts-list.html" data-key="t-user-list">User List</a></li>
                        <li><a href="apps-contacts-profile.html" data-key="t-profile">Profile</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="trello"></i>
                        <span data-key="t-tasks">Tasks</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="tasks-list.html" key="t-task-list">Task List</a></li>
                        <li><a href="tasks-kanban.html" key="t-kanban-board">Kanban Board</a></li>
                        <li><a href="tasks-create.html" key="t-create-task">Create Task</a></li>
                    </ul>
                </li>

                <li class="menu-title" data-key="t-pages">Pages</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="layers"></i>
                        <span data-key="t-authentication">Authentication</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="auth-login.html" data-key="t-login">Login</a></li>
                        <li><a href="auth-register.html" data-key="t-register">Register</a></li>
                        <li><a href="auth-recoverpw.html" data-key="t-recover-password">Recover Password</a></li>
                        <li><a href="auth-lock-screen.html" data-key="t-lock-screen">Lock Screen</a></li>
                        <li><a href="auth-logout.html" data-key="t-logout">Log Out</a></li>
                        <li><a href="auth-confirm-mail.html" data-key="t-confirm-mail">Confirm Mail</a></li>
                        <li><a href="auth-email-verification.html" data-key="t-email-verification">Email
                                Verification</a></li>
                        <li><a href="auth-two-step-verification.html" data-key="t-two-step-verification">Two Step
                                Verification</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="file-text"></i>
                        <span data-key="t-pages">Pages</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="pages-starter.html" data-key="t-starter-page">Starter Page</a></li>
                        <li><a href="pages-maintenance.html" data-key="t-maintenance">Maintenance</a></li>
                        <li><a href="pages-comingsoon.html" data-key="t-coming-soon">Coming Soon</a></li>
                        <li><a href="pages-timeline.html" data-key="t-timeline">Timeline</a></li>
                        <li><a href="pages-faqs.html" data-key="t-faqs">FAQs</a></li>
                        <li><a href="pages-pricing.html" data-key="t-pricing">Pricing</a></li>
                        <li><a href="pages-404.html" data-key="t-error-404">Error 404</a></li>
                        <li><a href="pages-500.html" data-key="t-error-500">Error 500</a></li>
                    </ul>
                </li>

                <li>
                    <a href="layouts-horizontal.html">
                        <i data-feather="layout"></i>
                        <span data-key="t-horizontal">Horizontal</span>
                    </a>
                </li>

                <li class="menu-title mt-2" data-key="t-components">Components</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="briefcase"></i>
                        <span data-key="t-components">Bootstrap</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="ui-alerts.html" data-key="t-alerts">Alerts</a></li>
                        <li><a href="ui-buttons.html" data-key="t-buttons">Buttons</a></li>
                        <li><a href="ui-cards.html" data-key="t-cards">Cards</a></li>
                        <li><a href="ui-carousel.html" data-key="t-carousel">Carousel</a></li>
                        <li><a href="ui-dropdowns.html" data-key="t-dropdowns">Dropdowns</a></li>
                        <li><a href="ui-grid.html" data-key="t-grid">Grid</a></li>
                        <li><a href="ui-images.html" data-key="t-images">Images</a></li>
                        <li><a href="ui-modals.html" data-key="t-modals">Modals</a></li>
                        <li><a href="ui-offcanvas.html" data-key="t-offcanvas">Offcanvas</a></li>
                        <li><a href="ui-progressbars.html" data-key="t-progress-bars">Progress Bars</a></li>
                        <li><a href="ui-placeholders.html" data-key="t-progress-bars">Placeholders</a></li>
                        <li><a href="ui-tabs-accordions.html" data-key="t-tabs-accordions">Tabs & Accordions</a></li>
                        <li><a href="ui-typography.html" data-key="t-typography">Typography</a></li>
                        <li><a href="ui-video.html" data-key="t-video">Video</a></li>
                        <li><a href="ui-general.html" data-key="t-general">General</a></li>
                        <li><a href="ui-colors.html" data-key="t-colors">Colors</a></li>
                        <li><a href="ui-utilities.html" data-key="t-utility">Utilities
                                <span class="badge rounded-pill bg-danger-subtle text-danger float-end">New</span>
                            </a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="gift"></i>
                        <span data-key="t-ui-elements">Extended</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="extended-lightbox.html" data-key="t-lightbox">Lightbox</a></li>
                        <li><a href="extended-rangeslider.html" data-key="t-range-slider">Range Slider</a></li>
                        <li><a href="extended-sweet-alert.html" data-key="t-sweet-alert">SweetAlert 2</a></li>
                        <li><a href="extended-session-timeout.html" data-key="t-session-timeout">Session Timeout</a>
                        </li>
                        <li><a href="extended-rating.html" data-key="t-rating">Rating</a></li>
                        <li><a href="extended-notifications.html" data-key="t-notifications">Notifications</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);">
                        <i data-feather="box"></i>
                        <span class="badge rounded-pill bg-danger-subtle text-danger float-end">7</span>
                        <span data-key="t-forms">Forms</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="form-elements.html" data-key="t-form-elements">Basic Elements</a></li>
                        <li><a href="form-validation.html" data-key="t-form-validation">Validation</a></li>
                        <li><a href="form-advanced.html" data-key="t-form-advanced">Advanced Plugins</a></li>
                        <li><a href="form-editors.html" data-key="t-form-editors">Editors</a></li>
                        <li><a href="form-uploads.html" data-key="t-form-upload">File Upload</a></li>
                        <li><a href="form-wizard.html" data-key="t-form-wizard">Wizard</a></li>
                        <li><a href="form-mask.html" data-key="t-form-mask">Mask</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="sliders"></i>
                        <span data-key="t-tables">Tables</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="tables-basic.html" data-key="t-basic-tables">Bootstrap Basic</a></li>
                        <li><a href="tables-datatable.html" data-key="t-data-tables">DataTables</a></li>
                        <li><a href="tables-responsive.html" data-key="t-responsive-table">Responsive</a></li>
                        <li><a href="tables-editable.html" data-key="t-editable-table">Editable</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="pie-chart"></i>
                        <span data-key="t-charts">Charts</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="charts-apex.html" data-key="t-apex-charts">Apexcharts</a></li>
                        <li><a href="charts-echart.html" data-key="t-e-charts">Echarts</a></li>
                        <li><a href="charts-chartjs.html" data-key="t-chartjs-charts">Chartjs</a></li>
                        <li><a href="charts-knob.html" data-key="t-knob-charts">Jquery Knob</a></li>
                        <li><a href="charts-sparkline.html" data-key="t-sparkline-charts">Sparkline</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="cpu"></i>
                        <span data-key="t-icons">Icons</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="icons-feather.html" data-key="t-feather">Feather</a></li>
                        <li><a href="icons-boxicons.html" data-key="t-boxicons">Boxicons</a></li>
                        <li><a href="icons-materialdesign.html" data-key="t-material-design">Material Design</a></li>
                        <li><a href="icons-dripicons.html" data-key="t-dripicons">Dripicons</a></li>
                        <li><a href="icons-fontawesome.html" data-key="t-font-awesome">Font Awesome 5</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="map"></i>
                        <span data-key="t-maps">Maps</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="maps-google.html" data-key="t-g-maps">Google</a></li>
                        <li><a href="maps-vector.html" data-key="t-v-maps">Vector</a></li>
                        <li><a href="maps-leaflet.html" data-key="t-l-maps">Leaflet</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="share-2"></i>
                        <span data-key="t-multi-level">Multi Level</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="javascript: void(0);" data-key="t-level-1-1">Level 1.1</a></li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow" data-key="t-level-1-2">Level 1.2</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="javascript: void(0);" data-key="t-level-2-1">Level 2.1</a></li>
                                <li><a href="javascript: void(0);" data-key="t-level-2-2">Level 2.2</a></li>
                            </ul>
                        </li>
                    </ul>
                </li> --}}

            </ul>

            {{-- <div class="card sidebar-alert shadow-none text-center mx-4 mb-0 mt-5">
                <div class="card-body">
                    <img src="assets/images/giftbox.png" alt="">
                    <div class="mt-4">
                        <h5 class="alertcard-title font-size-16">Unlimited Access</h5>
                        <p class="font-size-13 text-dark">Upgrade your plan from a Free trial, to select ‘Business
                            Plan’.</p>
                        <a href="#!" class="btn btn-primary mt-2">Upgrade Now</a>
                    </div>
                </div>
            </div> --}}
        </div>
        <!-- Sidebar -->
    </div>
</div>