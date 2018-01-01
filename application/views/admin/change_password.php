
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="ezttle"><span class="text">Change Password</span></div>
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
                                    <form action="<?php echo base_url();?>admin/change_password/" role="form" class="inform well" style="width:350px;" method="post" accept-charset="utf-8">
                                        <table style="width:100%;">
                                            <tbody><tr>
                                                <td style="vertical-align:top;padding-right:20px;">
                                                    <p class="help-block">

                                                    </p>

                                                    </div>
                                                    <div class="form-group ">
                                                        <label class="control-label" for="current_password">Current Password</label>
                                                        <input type="password" name="current_password" id="current_password" class="form-control input-sm" placeholder="eg: Write current password" value="<?php echo set_value('current_password'); ?>">
                                                        <input type="hidden" name="admin_id" value="<?php echo $this->session->userdata('admin_user_id')?>">
                                                        <p class="help-block form_note">[ Write Current Password ]</p>
                                                    </div>

                                                    <div class="form-group ">
                                                        <label class="control-label" for="new_password">New Password</label>
                                                        <input type="password" name="new_password" id="new_password" class="form-control input-sm" placeholder="eg: Write new password" value="<?php echo set_value('new_password'); ?>">
                                                        <p class="help-block form_note">[ Write New Password ]</p>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label class="control-label" for="confirm_password">Confirm  Password</label>
                                                        <input type="password" name="confirm_password" id="confirm_password" class="form-control input-sm" placeholder="eg: Write confirm password" value="<?php echo set_value('new_password'); ?>">
                                                        <p class="help-block form_note">[ Write Confirm Password ]</p>
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