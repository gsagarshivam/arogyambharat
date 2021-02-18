<header id="topnav">

    <div class="topbar-main">
        <div class="container-fluid">
            <div class="d-block d-lg-none mr-5">
                <a href="index.html" class="logo"><img src="../images/img1.png" alt="" height="28" class="logo-small"></a>
                <h3><?php echo COMPANY?></h3>
            </div>
            <div class="menu-extras topbar-custom navbar p-0">
                <ul class="list-inline ml-auto mb-0">
                    <li class="list-inline-item dropdown notification-list">
                        <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false"> <span class="d-none d-md-inline-block ml-1"><?php echo $admin_name;?> <i class="mdi mdi-chevron-down"></i></span></a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown">
                            <a class="dropdown-item" href="update_profile.php"><i class="dripicons-user text-muted"></i> Profile</a> 
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="logout.php"><i class="dripicons-exit text-muted"></i> Logout</a>
                        </div>
                    </li>
                    <li class="menu-item list-inline-item">
                        <a class="navbar-toggle nav-link">
                            <div class="lines"><span></span> <span></span> <span></span></div>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="navbar-custom">
        <div class="container-fluid">
            <div id="navigation">
                <ul class="navigation-menu">
                    <li class="has-submenu">
                        <a href="dashboard.php"><i class="dripicons-meter"></i>Dashboard</a>
                    </li>
                    <li class="has-submenu">
                        <a href="#"><i class="dripicons-user"></i>Profiles<i class="mdi mdi-chevron-down mdi-drop"></i></a>
                        <ul class="submenu">
                            <!--<li><a href="settings.php">Settings</a></li>-->
                            <li><a href="update_profile.php">My Profile</a></li>
                            <li><a href="logout.php">Logout</a></li>
                        </ul>
                    </li>

                    <!--<li class="has-submenu">
                        <a href="list_invoices.php"><i class="dripicons-clipboard"></i>Orders</a>
                    </li>
                    <li class="has-submenu">
                        <a href="#"><i class="dripicons-device-desktop"></i>Offer<i class="mdi mdi-chevron-down mdi-drop"></i></a>
                        <ul class="submenu">
                            <li><a href="activation_offer.php?act=updt&type=Activation Offer">Activation Offer</a></li>
                            <li><a href="repurchase_offer.php">Repurchase Offer </a></li>
                            <li><a href="bonanza_offer.php">Bonanza Offer </a></li>
                            <li><a href="direct_offer.php">Direct Sponsor Offer (Sep.)</a></li>
                            <li><a href="direct_offer2.php">Direct Sponsor Offer (Oct.)</a></li>
                            <li><a href="bonanza_qualify.php">Bonanza Qualify</a></li>
                        </ul>
                    </li>

                    <li class="has-submenu">
                        <a href="#"><i class="dripicons-device-desktop"></i>Stock Entry<i class="mdi mdi-chevron-down mdi-drop"></i></a>
                        <ul class="submenu">
                            <li><a href="list_vendors.php?act=addnew">Manage Vendors</a></li>
                            <li><a href="list_inventory.php?act=addnew">Manage Inventory </a></li>
                        </ul>
                    </li>-->


                    <li class="has-submenu">
                        <a href="#"><i class="dripicons-device-desktop"></i> Product Master<i class="mdi mdi-chevron-down mdi-drop"></i></a>
                        <ul class="submenu">
                            <li><a href="plan.php">Update Plan</a></li>
                            <li><a href="category.php?act=addnew">Product Category</a></li>
                            
                            <li><a href="MasterProduct.php?act=addnew">Products Listing</a></li>
                            <li><a href="upload_excel.php">Upload Product Excel</a></li> 
                            <li><a href="sale_report.php">Sale Report</a></li> 
                            <!--<li><a href="scheme_report.php">Scheme Product Report</a></li> -->
                        </ul>
                    </li>

                    <!--<li class="has-submenu">
                        <a href="#"><i class="dripicons-device-desktop"></i> Website Master <i class="mdi mdi-chevron-down mdi-drop"></i></a>
                        <ul class="submenu">
                            <li><a href="plan.php">Update Plan</a></li>
                            <li><a href="list_banner.php?act=addnew">Manage Banner</a></li>
                            <li><a href="list_menu.php?act=addnew">Manage Menu</a></li>
                            <li><a href="list_post_category.php?act=addnew">Manage Post Category</a></li>
                            <li><a href="list_menupost_pages.php?act=addnew">Manage Menu/Post Pages</a></li>
                            <li><a href="list_coupons.php?act=addnew">Manage Coupons</a></li>
                            <li><a href="list_areas.php?act=addnew">Manage Area</a></li>
                            <li><a href="list_brand.php?act=addnew">Manage Brand</a></li>
                             <li><a href="MasterProduct.php?act=addnew">Products</a></li>
                             <li class="has-submenu">
                             <a href="#">Photo Gallery</a>
                                 <ul class="submenu">
                                 <li><a href="gallery.php">Add New</a></li>
                                 <li><a href="list_gallery.php">List All</a></li>
                                 </ul>
                             </li>
                        </ul>
                    </li> -->

                    <li class="has-submenu">
                        <a href="#"><i class="dripicons-device-desktop"></i>Manage Customer <i class="mdi mdi-chevron-down mdi-drop"></i></a>
                        <ul class="submenu">
                            <li><a href="list_customer.php">List Customer</a></li>
                            <li><a href="list_joining.php">List Joining</a></li>
                            <li><a href="kyc_request.php">KYC Request</a></li>
                            <li><a href="activation_request.php">Invoice Request</a></li>
                            <li><a href="list_invoices.php">List MLM Invoice</a></li>
                            <li><a href="pending_payout.php">Pending Payout</a></li> 
                            <li><a href="withdrawal-request.php">Withdrawal Request</a></li> 
                            <!--<li><a href="send_sms.php">Send SMS</a></li>-->
                        </ul>
                    </li>
                    <li class="has-submenu">
                        <a href="#"><i class="dripicons-device-desktop"></i>Manage Franchise <i class="mdi mdi-chevron-down mdi-drop"></i></a>
                        <ul class="submenu">
                            <li><a href="plan.php">Franchise Type</a></li>
                            <li><a href="list_franchise.php?act=addnew">List Franchise</a></li>
                            <li><a href="franchise_add_stock.php">Add/Transfer Stock</a></li>
                            <li><a href="franchise_transfer_request.php">Transfer Request</a></li>
                            <li><a href="franchise_invoices.php">Transfer Invoices</a></li>
                            <li><a href="frenchaise_closing.php">Franchise Closing</a></li>
                            <li><a href="frenchaise_voucher.php">Franchise Voucher</a></li>
                            <li><a href="frenchaise_report.php?arType=Franchise Tree View">Franchise Tree View</a></li>
                            <li><a href="frenchaise_report.php?arType=Franchise Downlist">Franchise Downlist</a></li>
                            <li><a href="frenchaise_report.php?arType=Team Sale Report">Franchise Sale Report</a></li>
                        </ul>
                    </li>
                    <li class="has-submenu">
                    <a href="#"><i class="dripicons-device-desktop"></i>Reports<i class="mdi mdi-chevron-down mdi-drop"></i></a>
                     <ul class="submenu">
                        <li><a href="closing_record.php">Closing Record</a></li>
                        <li><a href="income-report2.php">Leadership/Direct Income</a></li>
                        <li><a href="income-report.php">Fund Income</a></li>
                        <li><a href="client-income-report.php">Clientwise Income Report</a></li>
                        <li><a href="downline-business-report.php">Datewise Business Report</a></li>
                        <li><a href="tds_report.php">TDS Report</a></li>
                        <li><a href="transactions.php">Transactions</a></li>
                     </ul>
                 </li> 
                    <li class="has-submenu"><a href="logout.php"><i class="dripicons-power"></i>Logout</a></li>
                </ul>

                <!-- <li class="has-submenu">
                 <a href="#"><i class="dripicons-device-desktop"></i>Notice Board <i class="mdi mdi-chevron-down mdi-drop"></i></a>
                     <ul class="submenu">
                     <li><a href="events.php">Add New</a></li>
                     <li><a href="list_events.php">List All</a></li>
                     </ul>
                 </li> 
                 <li class="has-submenu">
                 <a href="#"><i class="dripicons-device-desktop"></i>ePin <i class="mdi mdi-chevron-down mdi-drop"></i></a>
                     <ul class="submenu">
                         <li><a href="epin-request.php">ePin Request</a></li>
                         <li><a href="gen_epin.php?type=EPP">Generate ePin</a></li>
                         <li><a href="ePin_report.php?act=All">All ePin</a></li>
                         <li><a href="ePin_report.php?act=Used">Used ePin</a></li>
                         <li><a href="ePin_report.php?act=Unused">Unused ePin</a></li>
                     </ul>
                </li>
                <li class="has-submenu">
                 <a href="#"><i class="dripicons-device-desktop"></i>Manage Member <i class="mdi mdi-chevron-down mdi-drop"></i></a>
                     <ul class="submenu">
                     <li><a href="list_joining.php">List Joining</a></li>
                     <li><a href="list_invoices.php">List Invoice</a></li>
                     <li><a href="withdrawal-request.php">Withdrawal Request</a></li>
                     </ul>
                 </li>
                <li class="has-submenu">
                 <a href="#"><i class="dripicons-device-desktop"></i>Expense <i class="mdi mdi-chevron-down mdi-drop"></i></a>
                     <ul class="submenu">
                     <li><a href="add_expense.php">Add Expense</a></li>
                     <li><a href="expense_report.php">Expense Report</a></li>
                     </ul>
                 </li>
                 <li class="has-submenu">
                 <a href="#"><i class="dripicons-device-desktop"></i>Reports<i class="mdi mdi-chevron-down mdi-drop"></i></a>
                     <ul class="submenu">
                        <li><a href="#">Generate Payouts</a></li>
                        <li><a href="#t">Distributer income</a></li>
                        <li><a href="#">Matching Income</a></li>
                        <li><a href="#">Re-Purchase Income</a></li>
                        <li><a href="#">Leadership Bonus</a></li>
                        <li><a href="transactions.php">Transactions</a></li>
                     </ul>
                 </li> 
                -->
            </div>
        </div>
    </div>

</header>