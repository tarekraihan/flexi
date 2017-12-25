<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="ezttle"><span class="text">Pending Reques</span></div>
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
                                                    <th>Requested By</th>
                                                    <th>Req. Type</th>
                                                    <th>Number</th>
                                                    <th>Amount</th>
                                                    <th>Req. Time</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                $i = 1;
                                                foreach($requests as $request){
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $i;?></td>
                                                        <td><?php echo $request->username;?></td>
                                                        <td><?php echo $request->request_type; ?></td>
                                                        <td><?php echo $request->to_number .' ( '.$request->type.' )'; ?></td>
                                                        <td>TK <?php echo $request->amount; ?></td>
                                                        <td><?php echo ($request->request_date_time) ? date('d F Y h:i A', strtotime($request->request_date_time)) : '';?></td>

                                                        <td><a href="<?php echo base_url();?>admin/action/<?php echo $request->id;?>" class="btn btn-success right10">Success Action</a><a href="<?php echo base_url();?>admin/refund/<?php echo $request->id;?>" class="btn btn-danger right10">Refund</a> </td>
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