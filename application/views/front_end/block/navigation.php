<div class="wrapper">

<header class="main-header">
<!-- Logo -->
<a href="<?php echo base_url();?>" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>A</b>LT</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>User Panel</span>
</a>
<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-static-top">
<!-- Sidebar toggle button-->
<!--<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
    <span class="sr-only">Toggle navigation</span>
</a>
-->
    <a href="<?php echo base_url();?>" class="logo" style="background-color: transparent;">
        <span class="logo-lg">Noor Flexi</span>
    </a>
<div class="navbar-custom-menu">
<ul class="nav navbar-nav">
<!-- Messages: style can be found in dropdown.less-->

<!-- User Account: style can be found in dropdown.less -->
    <li style=""><a href="javascript:void(0)" class="white"> Balance: <b><?php
                $query = $this->db->query("Select current_balance From users where id= '{$this->session->userdata('user_id')}'");
                $row = $query->row_array();
                echo number_format($row['current_balance'],2);
                ?></b></a></li>
<li class="dropdown user user-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <span class="hidden-xs"><?php echo ucfirst($this->session->userdata('username'));?></span>
    </a>
    <ul class="dropdown-menu">
        <!-- User image -->
        <li class="user-header">
            <img src="<?php echo base_url();?>resource/admin/dist/img/userphoto.png" class="img-circle" alt="User Image">
            <p>
                Full Namae - <?php echo $this->session->userdata('username');?>
                <small>Balance: <b>
                        <?php
                        $query = $this->db->query("Select current_balance From users where id= '{$this->session->userdata('user_id')}'");
                        $row = $query->row_array();
                        echo number_format($row['current_balance'],2);
                        ?>
                    </b>
                </small>
            </p>

        </li>
        <!-- Menu Body -->
        <li style="display:none;" class="user-body">
            <div class="col-xs-4 text-center">
                <a href="#">Followers</a>
            </div>
            <div class="col-xs-4 text-center">
                <a href="#">Sales</a>
            </div>
            <div class="col-xs-4 text-center">
                <a href="#">Friends</a>
            </div>
        </li>
        <!-- Menu Footer-->
        <li class="user-footer">
            <div class="pull-left">
                <a href="<?php echo base_url();?>main/change_password/" class="btn btn-default btn-flat">Change Password</a>
            </div>
            <div class="pull-right">
                <a href="<?php echo base_url();?>login/logout" class="btn btn-default btn-flat">Logout</a>
            </div>
        </li>
    </ul>
</li>
<!-- Control Sidebar Toggle Button -->
</ul>
</div>
</nav>
</header>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="active treeview">
                <a href="<?php echo base_url();?>main">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>

            </li>

            <li class="treeview">
                <a href="#">
                    <span>New Request</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url();?>main/flexiload"><i class="fa fa-circle-o"></i> Flexiload</a></li>
                    <li><a href="<?php echo base_url();?>main/bkash"><i class="fa fa-circle-o"></i> bKash</a></li>
                    <li><a href="<?php echo base_url();?>main/dbbl"><i class="fa fa-circle-o"></i> DBBL</a></li>
                </ul>
            </li>
<!--            <li><a href="#"><span>International Flexi</span></a></li>-->
            <li><a href="<?php echo base_url();?>main/package_recharge"><span>Package Recharge</span> </a></li>
            <li><a href="<?php echo base_url();?>main/pending_request"><span>Pending Request</span></a></li>
            <li class="treeview">
                <a href="#">
                    <span>History</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url();?>main/all"><i class="fa fa-circle-o"></i> All History</a></li>
                    <li><a href="<?php echo base_url();?>main/flexi_history"><i class="fa fa-circle-o"></i> Flexiload</a></li>
                    <li><a href="<?php echo base_url();?>main/bkash_history"><i class="fa fa-circle-o"></i> bKash</a></li>
                    <li><a href="<?php echo base_url();?>main/dbbl_history"><i class="fa fa-circle-o"></i> DBBL</a></li>
                    <li><a href="<?php echo base_url();?>main/package_recharge_history"><i class="fa fa-circle-o"></i> Package Recharge</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <span>Reseller</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url();?>main/add_user"><i class="fa fa-circle-o"></i>Add New User</a></li>
                    <li><a href="<?php echo base_url();?>main/user_list"><i class="fa fa-circle-o"></i> User List</a></li>
                </ul>
            </li>
<!--            <li class="treeview"><a href="#"><span>Payment History</span></a></li>-->
            <li class="treeview"><a href="#"><span>Receive History</span></a></li>
            <li class="treeview">
                <a href="#">
                    <span>Report</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href=""><i class="fa fa-circle-o"></i> Cost & Profit</a></li>
                    <li><a href=""><i class="fa fa-circle-o"></i> Balance Report</a></li>
                    <li><a href=""><i class="fa fa-circle-o"></i> Total Report</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <span>My Account</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
<!--                    <li><a href=""><i class="fa fa-circle-o"></i> My Rates</a></li>-->
<!--                    <li><a href=""><i class="fa fa-circle-o"></i> Add Balance</a></li>-->
                    <li><a href=""><i class="fa fa-circle-o"></i> Access Logs</a></li>
<!--                    <li><a href=""><i class="fa fa-circle-o"></i> Setup PIN</a></li>-->
<!--                    <li><a href=""><i class="fa fa-circle-o"></i> Change Pin</a></li>-->
                    <li><a href="<?php echo base_url();?>main/change_password/"><i class="fa fa-circle-o"></i> Change Password</a></li>
<!--                    <li><a href=""><i class="fa fa-circle-o"></i> Profile Update</a></li>-->
                </ul>
            </li>

            <li class="treeview"><a href="#"><span>Complain</span></a></li>
            <li class="treeview">
                <a href="#">
                    <span>Themes</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="">
                        <div id="skindiv">
                            <a href="javascript:void(0)" class="accordion-toggle">

                                <span>Themes</span>
                            </a>
                            <ul style="" id="skinmenu" class=" accordion-content list-unstyled clearfix">

                                <li style="float:left; width: 50%; padding: 5px;">
                                    <a href="javascript:void(0);" data-skin="skin-blue" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">
                                        <div><span style="display:block; width: 20%; float: left; height: 7px; background: #367fa9;"></span>
                                            <span class="bg-light-blue" style="display:block; width: 80%; float: left; height: 7px;"></span>
                                        </div>
                                        <div><span style="display:block; width: 20%; float: left; height: 20px; background: #222d32;"></span>
                                            <span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;"></span>
                                        </div>
                                    </a>
                                    <p class="text-center no-margin">Blue</p>
                                </li>
                                <li style="float:left; width: 50%; padding: 5px;">
                                    <a href="javascript:void(0);" data-skin="skin-black" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">
                                        <div style="box-shadow: 0 0 2px rgba(0,0,0,0.1)" class="clearfix">
                                            <span style="display:block; width: 20%; float: left; height: 7px; background: #fefefe;"></span>
                                            <span style="display:block; width: 80%; float: left; height: 7px; background: #fefefe;"></span>
                                        </div>
                                        <div><span style="display:block; width: 20%; float: left; height: 20px; background: #222;"></span>
                                            <span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;"></span>
                                        </div></a>
                                    <p class="text-center no-margin">Black</p>
                                </li>

                                <li style="float:left; width: 50%; padding: 5px;">
                                    <a href="javascript:void(0);" data-skin="skin-purple" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">
                                        <div><span style="display:block; width: 20%; float: left; height: 7px;" class="bg-purple-active"></span>
                                            <span class="bg-purple" style="display:block; width: 80%; float: left; height: 7px;"></span></div>
                                        <div><span style="display:block; width: 20%; float: left; height: 20px; background: #222d32;"></span>
                                            <span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;"></span></div></a>
                                    <p class="text-center no-margin">Purple</p>
                                </li>
                                <li style="float:left; width: 50%; padding: 5px;">
                                    <a href="javascript:void(0);" data-skin="skin-green" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">
                                        <div><span style="display:block; width: 20%; float: left; height: 7px;" class="bg-green-active"></span>
                                            <span class="bg-green" style="display:block; width: 80%; float: left; height: 7px;"></span></div>
                                        <div><span style="display:block; width: 20%; float: left; height: 20px; background: #222d32;"></span>
                                            <span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;"></span></div></a>
                                    <p class="text-center no-margin">Green</p>
                                </li>
                                <li style="float:left; width: 50%; padding: 5px;">
                                    <a href="javascript:void(0);" data-skin="skin-red" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">
                                        <div><span style="display:block; width: 20%; float: left; height: 7px;" class="bg-red-active"></span>
                                            <span class="bg-red" style="display:block; width: 80%; float: left; height: 7px;"></span></div>
                                        <div><span style="display:block; width: 20%; float: left; height: 20px; background: #222d32;"></span>
                                            <span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;"></span></div></a>
                                    <p class="text-center no-margin">Red</p>
                                </li>
                                <li style="float:left; width: 50%; padding: 5px;">
                                    <a href="javascript:void(0);" data-skin="skin-yellow" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">
                                        <div><span style="display:block; width: 20%; float: left; height: 7px;" class="bg-yellow-active"></span>
                                            <span class="bg-yellow" style="display:block; width: 80%; float: left; height: 7px;"></span></div>
                                        <div><span style="display:block; width: 20%; float: left; height: 20px; background: #222d32;"></span>
                                            <span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;"></span></div></a>
                                    <p class="text-center no-margin">Yellow</p>
                                </li>
                                <li style="float:left; width: 50%; padding: 5px;">
                                    <a href="javascript:void(0);" data-skin="skin-blue-light" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">
                                        <div><span style="display:block; width: 20%; float: left; height: 7px; background: #367fa9;"></span>
                                            <span class="bg-light-blue" style="display:block; width: 80%; float: left; height: 7px;"></span></div>
                                        <div><span style="display:block; width: 20%; float: left; height: 20px; background: #f9fafc;"></span>
                                            <span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;"></span></div></a>
                                    <p class="text-center no-margin" style="font-size: 12px">Blue Light</p>
                                </li>
                                <li style="float:left; width: 50%; padding: 5px;">
                                    <a href="javascript:void(0);" data-skin="skin-black-light" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">
                                        <div style="box-shadow: 0 0 2px rgba(0,0,0,0.1)" class="clearfix">
                                            <span style="display:block; width: 20%; float: left; height: 7px; background: #fefefe;"></span>
                                            <span style="display:block; width: 80%; float: left; height: 7px; background: #fefefe;"></span></div>
                                        <div><span style="display:block; width: 20%; float: left; height: 20px; background: #f9fafc;"></span>
                                            <span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;"></span></div></a>
                                    <p class="text-center no-margin" style="font-size: 12px">Black Light</p>
                                </li>
                                <li style="float:left; width: 50%; padding: 5px;">
                                    <a href="javascript:void(0);" data-skin="skin-purple-light" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">
                                        <div><span style="display:block; width: 20%; float: left; height: 7px;" class="bg-purple-active"></span>
                                            <span class="bg-purple" style="display:block; width: 80%; float: left; height: 7px;"></span></div>
                                        <div><span style="display:block; width: 20%; float: left; height: 20px; background: #f9fafc;"></span>
                                            <span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;"></span></div></a>
                                    <p class="text-center no-margin" style="font-size: 12px">Purple Light</p>
                                </li>
                                <li style="float:left; width: 50%; padding: 5px;">
                                    <a href="javascript:void(0);" data-skin="skin-green-light" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">
                                        <div><span style="display:block; width: 20%; float: left; height: 7px;" class="bg-green-active"></span>
                                            <span class="bg-green" style="display:block; width: 80%; float: left; height: 7px;"></span></div><div>
                                            <span style="display:block; width: 20%; float: left; height: 20px; background: #f9fafc;"></span>
                                            <span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;"></span></div></a>
                                    <p class="text-center no-margin" style="font-size: 12px">Green Light</p>
                                </li>
                                <li style="float:left; width: 50%; padding: 5px;">
                                    <a href="javascript:void(0);" data-skin="skin-red-light" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">
                                        <div><span style="display:block; width: 20%; float: left; height: 7px;" class="bg-red-active"></span>
                                            <span class="bg-red" style="display:block; width: 80%; float: left; height: 7px;"></span></div><div>
                                            <span style="display:block; width: 20%; float: left; height: 20px; background: #f9fafc;"></span>
                                            <span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;"></span></div></a>
                                    <p class="text-center no-margin" style="font-size: 12px">Red Light</p>
                                </li>
                                <li style="float:left; width: 50%; padding: 5px;">
                                    <a href="javascript:void(0);" data-skin="skin-yellow-light" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">
                                        <div><span style="display:block; width: 20%; float: left; height: 7px;" class="bg-yellow-active"></span>
                                            <span class="bg-yellow" style="display:block; width: 80%; float: left; height: 7px;"></span></div>
                                        <div><span style="display:block; width: 20%; float: left; height: 20px; background: #f9fafc;"></span>
                                            <span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;"></span></div></a>
                                    <p class="text-center no-margin" style="font-size: 12px;">Yellow Light</p>
                                </li>
                            </ul>


                        </div>
                    </li>
                </ul>
            </li>



        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
