
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="ezttle"><span class="text">New Flexiload</span></div>
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
            <div class="col-md-4 col-sm-4 col-xs-12" style="min-width:370px;margin-right:50px">
                <form action="<?php echo base_url();?>main/flexiload" role="form" class="inform well" id="flexiload_form" style="width:350px;" method="post" accept-charset="utf-8"><div style="display:none">
                    </div>
                    <table style="width:100%;">
                        <tbody><tr>
                            <td style="vertical-align:top;padding-right:20px;">
                                <p class="help-block">Send Flexiload</p>
                                <div class="form-group">
                                    <label class="control-label" for="number">Number</label>
                                    <input type="tel" name="number" id="number" class="form-control input-sm" placeholder="eg: 0171XXXXXXX" value="<?php echo set_value('number'); ?>">
                                    <p class="help-block form_note">[ 017, 919, 923 ]</p>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label" for="amount">Amount</label>
                                    <input type="number" name="amount" id="amount" class="form-control input-sm" placeholder="eg: 100" value="<?php echo set_value('amount'); ?>">
                                    <p class="help-block form_note">[ Min 10, Max 2000 ]</p>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label" for="type">Type</label>
                                    <select class="form-control input-sm" name="type">
                                        <option value="Prepaid">Prepaid</option>
                                        <option value="PostPaid">PostPaid</option>
                                    </select>
                                </div>
                                <p class="help-block form_error" style="font-size:11px;">
                                    <?php
                                        echo validation_errors('<div class="error">', '</div>');
                                        echo $this->session->flashdata('error_message');
                                    ?>
                                </p>
                                <p class="help-block" style="font-size:11px;color:green">
                                    <?php
                                    echo $this->session->flashdata('success_message');

                                    ?>
                                </p>
                                <button type="submit" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-send"></span> &nbsp;Send</button>
                            </td>
                        </tr>
                        </tbody></table>
                </form>

                <div class="col-md-4 col-sm-4 col-xs-6" style="padding-left:0px;min-width:370px;">
                    <p class="help-block">Last 10 Requests</p>
                    <div style="margin:0px;padding:0px;background:#fff;">
                        <table cellspacing="0" class="table10">
                            <thead>
                            <tr>
                                <th>SL No</th>
                                <th>Number</th>
                                <th>Amount</th>
                                <th>Type</th>
                                <th>Status</th>
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
                                    <td>TK <?php echo $request->amount; ?></td>
                                    <td><?php echo $request->type;?></td>
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
            <div class="col-md-6 col-sm-6 col-xs-6" style="padding-right:20px;">

            <div style="vertical-align:top;">
                <h3 class="help-block">Available Package List</h3>
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
                <th>&nbsp;</th>
            </tr>
            </thead>
            <tbody>
            <?php
                $i = 1;
                foreach($rows as $row){
                    ?>
                    <tr>
                        <td><?php echo $i;?></td>
                        <td><?php echo $row->operator_name;?></td>
                        <td><?php echo $row->package_name;?></td>
                        <td style="font-size:14px;font-weight:bold;">TK <?php echo $row->price; ?></td>
                        <td>&nbsp;</td>
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