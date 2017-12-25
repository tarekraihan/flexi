<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="ezttle"><span class="text">User List</span></div>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <div class="col-md-12">
                <div class="mypage">
                    <div class="row" style="margin-top:5px;">
                        <div class="col-md-12 fleft">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">

                                    <div style="vertical-align:top;">

                                    </div>
                                    <div style="vertical-align:top;">
                                        <div style="margin:0px;padding:0px;background:#fff;">
                                            <table cellspacing="0" class="table10">
                                                <thead>
                                                <tr>
                                                    <th>Sl No</th>
                                                    <th>Username</th>
                                                    <th>Email Address</th>
                                                    <th>Phone Number</th>
                                                    <th>Credit Left</th>
                                                    <th>Privilege</th>
                                                    <th>Created by</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                $i = 1;
                                                foreach($results as $row){
                                                    $created_by = ($row->admin_name) ? $row->admin_name : $row->user_admin;
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $i;?></td>
                                                        <td><?php echo $row->username;?></td>
                                                        <td><?php echo $row->email; ?></td>
                                                        <td><?php echo $row->phone; ?></td>
                                                        <td>TK <?php echo $row->current_balance; ?></td>
                                                        <td><?php echo $row->power; ?></td>
                                                        <td><?php echo $created_by; ?></td>
                                                        <td><a href="<?php echo base_url();?>admin/add_balance/<?php echo $row->id;?>" class="btn btn-primary">Add Balance</a>  </td>

                                                    </tr>
                                                    <?php
                                                    $i++;
                                                }
                                                ?>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- right col -->
        </div>
        <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->