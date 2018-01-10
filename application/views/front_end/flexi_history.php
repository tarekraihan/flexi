<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $delete = $this->db->query("DELETE FROM all_request WHERE id='{$id}'");

    if ($delete) {
        $this->session->set_flashdata('error_message', 'Record deleted successfully');
        redirect(base_url().'main/bkash_history');
    } else {
        $this->session->set_flashdata('error_message', 'Problem to delete the record.');
        redirect(base_url().'main/bkash_history');
    }
}

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="ezttle"><span class="text">Flexiload History</span></div>
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
                                        <p class="help-block form_error" style="font-size:15px; text-align: center;">
                                            <?php
                                            echo $this->session->flashdata('error_message');
                                            ?>
                                        </p>
                                    </div>
                                    <div style="vertical-align:top;">
                                        <div style="margin:0px;padding:0px;background:#fff;">
                                            <table cellspacing="0" class="table10">
                                                <thead>
                                                <tr>
                                                    <th>ID.</th>
                                                    <th>Number</th>
                                                    <th>Req. Type</th>
                                                    <th>Amount</th>
                                                    <th>Cost</th>
                                                    <th>Sender</th>
                                                    <th>Req. Time</th>
                                                    <th>Update Time</th>
                                                    <th>Transaction ID</th>
                                                    <th>Last Balance</th>
                                                    <th>Status</th>
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
                                                        <td><?php echo $request->to_number;?></td>
                                                        <td><?php echo $request->request_type; ?></td>
                                                        <td>TK <?php echo $request->amount; ?></td>
                                                        <td>TK <?php echo $request->amount; ?></td>
                                                        <td><?php echo $request->username; ?></td>
                                                        <td><?php echo ($request->request_date_time) ? date('d F Y h:i A', strtotime($request->request_date_time)) : '';?></td>
                                                        <td><?php echo ($request->delivery_date_time) ? date('d F Y h:i A', strtotime($request->delivery_date_time)) : '';?></td>
                                                        <td><?php echo $request->transaction_id; ?></td>
                                                        <td><?php echo $request->balance_after_deduct; ?></td>

                                                        <td>
                                                            <?php
                                                            if($request->status == 'Pending'){
                                                                echo $request->status;
                                                            }else if ($request->status == 'Send'){
                                                                echo '<span class="success">'.$request->status.'</span>';
                                                            }else{
                                                                echo '<span class="error">'.$request->status.'</span>';
                                                            }
                                                            ?>
                                                        </td>

                                                        <td>
                                                            <?php
                                                            if($request->status == 'Pending'){
                                                                echo '<a href="?id='.$request->id.'" onclick="return confirm(\'Are you really want to delete this item\')" >Delete</a>';
                                                            }else if ($request->status == 'Send'){
                                                                echo '<span class="success">'.$request->status.'</span>';
                                                            }else{
                                                                echo '<span class="error">'.$request->status.'</span>';
                                                            }
                                                            ?>
                                                        </td>
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