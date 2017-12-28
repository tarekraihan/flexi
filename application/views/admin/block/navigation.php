<div class="wrapper">

<header class="main-header">
<!-- Logo -->
<a href="<?php echo base_url();?>admin" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>A</b>LT</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>Admin Panel</span>
</a>
<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-static-top">
<!-- Sidebar toggle button-->
<!--<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
    <span class="sr-only">Toggle navigation</span>
</a>
-->
    <a href="<?php echo base_url();?>admin" class="logo" style="background-color: transparent;">
        <span class="logo-lg">Noor Flexi</span>
    </a>
<div class="navbar-custom-menu">
<ul class="nav navbar-nav">
<!-- Messages: style can be found in dropdown.less-->
    <li style=""><a href="javascript:void(0)" class="white"> Balance: <b><?php
                $query = $this->db->query("Select current_balance From admins where id= '{$this->session->userdata('admin_user_id')}'");
                $row = $query->row_array();
                echo number_format($row['current_balance'],2);
                ?></b></a></li>
<!-- User Account: style can be found in dropdown.less -->
    <li class="dropdown user user-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <span class="hidden-xs"><?php echo ucfirst($this->session->userdata('admin_username'));?></span>
        </a>
        <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
                <img src="<?php echo base_url();?>resource/admin/dist/img/userphoto.png" class="img-circle" alt="User Image">
                <p>
                    Full Namae - <?php echo ucfirst($this->session->userdata('admin_username'));?>
                    <small>Balance: <b>
                            <?php
                            $query = $this->db->query("Select current_balance From admins where id= '{$this->session->userdata('admin_user_id')}'");
                            $row = $query->row_array();
                            echo number_format($row['current_balance'],2);
                            ?>
                        </b>
                    </small>
                </p>

            </li>
            <!-- Menu Body -->
            <!-- Menu Footer-->
            <li class="user-footer">
                <div class="pull-left">
                    <a href="admin/profile" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                    <a href="<?php echo base_url();?>admin_login/logout" class="btn btn-default btn-flat">Logout</a>
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
                <a href="<?php echo base_url();?>admin">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>

            </li>

            <br/>
            <li><a href="<?php echo base_url();?>admin/pending"><span>Pending Request</span></a></li>
            <li><a href="<?php echo base_url();?>admin/all_request"><span>All Request</span> </a></li>
            <li><a href="<?php echo base_url();?>admin/transaction_report"><span>Transaction Report</span></a></li>
            <li class="treeview">
                <a href="#">
                    <span>User Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url();?>admin/add_user"><i class="fa fa-circle-o"></i>Add New User</a></li>
                    <li><a href="<?php echo base_url();?>admin/user_list"><i class="fa fa-circle-o"></i> User List</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <span>Package Recharge</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url();?>admin/add_package"><i class="fa fa-circle-o"></i>Add New Package</a></li>
                    <li><a href="<?php echo base_url();?>admin/package_list"><i class="fa fa-circle-o"></i> Package Recharge List</a></li>
                </ul>
            </li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
