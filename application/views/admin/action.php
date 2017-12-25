
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="ezttle"><span class="text">Success Action</span></div>
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
                                <div class="col-md-6 col-sm-6 col-xs-12" style="min-width:370px;margin-right:50px">
                                    <form action="<?php echo base_url();?>admin/action/" role="form" class="inform well" style="width:350px;" method="post" accept-charset="utf-8">
                                        <table style="width:100%;">
                                            <tbody><tr>
                                                <td style="vertical-align:top;padding-right:20px;">
                                                    <p class="help-block">
                                                        <?php
                                                        echo $request->request_type.' | '.$request->to_number .' | '.$request->type. ' | '.$request->amount .' Taka';
                                                        ?>
                                                    </p>
                                                    <div class="form-group">
                                                        <label class="control-label" for="number">Send From</label>
                                                        <input type="text" name="number" id="number" class="form-control input-sm" placeholder="eg: 0171XXXXXXX" value="<?php echo set_value('number'); ?>">
                                                        <p class="help-block form_note">[ 017, 919, 923 ]</p>
                                                    </div> <div class="form-group ">
                                                        <label class="control-label" for="transaction_id">TRX Number</label>
                                                        <input type="text" name="transaction_id" id="transaction_id" class="form-control input-sm" placeholder="eg: TRX 12524212" value="<?php echo set_value('transaction_id'); ?>">
                                                        <p class="help-block form_note">[ Write Transaction ID ]</p>
                                                    </div>
                                                    </div> <div class="form-group ">
                                                        <label class="control-label" for="comment">Comment</label>
                                                        <input type="text" name="comment" id="comment" class="form-control input-sm" placeholder="eg: Write comment" value="<?php echo set_value('comment'); ?>">
                                                        <input type="hidden" name="request_id" value="<?php echo $request->id?>">
                                                        <input type="hidden" name="amount" value="<?php echo $request->amount?>">
                                                        <p class="help-block form_note">[ Write Comment ]</p>
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
                                                    <p class="help-block line">&nbsp;</p>
                                                    <button type="submit" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-send"></span> &nbsp;Send</button>
                                                </td>
                                            </tr>
                                            </tbody></table>
                                    </form>
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