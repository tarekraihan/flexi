<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="ezttle"><span class="text">Transaction History</span></div>
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
                                                    <th>Add From</th>
                                                    <th>Balance</th>
                                                    <th>Created</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                $i = 1;
                                                foreach($results as $row){
                                                    $add_from = ($row->admin_name) ? $row->admin_name : $row->user_name;
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $i;?></td>
                                                        <td><?php echo $row->username;?></td>
                                                        <td><?php echo $add_from; ?></td>
                                                        <td>TK <?php echo $row->amount; ?></td>
                                                        <td><?php echo date('d-m-Y g:i A',strtotime( $row->created ) ); ?></td>
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