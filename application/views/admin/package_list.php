<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $delete = $this->db->query("DELETE FROM package WHERE id='{$id}'");

    if ($delete) {
        $this->session->set_flashdata('error_message', 'Record deleted successfully');
        redirect(base_url().'admin/package_list');
    } else {
        $this->session->set_flashdata('error_message', 'Problem to delete the record.');
        redirect(base_url().'admin/package_list');
    }
}

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="ezttle"><span class="text">PACKAGE RECHARGE LIST</span></div>
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
                                <div class="col-md-12 col-sm-12 col-xs-12" style="padding-right:20px;">

                                    <div style="vertical-align:top;">
                                        <h3 class="help-block">Available Package List</h3>
                                    </div>
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
                                                    <th>Sl.</th>
                                                    <th>Operator</th>
                                                    <th>Package Details</th>
                                                    <th>Amount</th>
                                                    <th>Created By</th>
                                                    <th>&nbsp;</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                foreach($rows as $row){
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $row->id;?></td>
                                                        <td><?php echo $row->operator_name;?></td>
                                                        <td><?php echo $row->package_name;?></td>
                                                        <td style="font-size:14px;font-weight:bold;">TK <?php echo $row->price; ?></td>
                                                        <td><?php echo ucfirst($row->created_by); ?></td>
                                                        <td><a href="?id=<?php echo $row->id;?>" onclick="return confirm('Are you really want to delete this item')" >Delete</a> </td>
                                                    </tr>
                                                    <?php

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