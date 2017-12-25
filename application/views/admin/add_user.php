
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="ezttle"><span class="text">Add User</span></div>
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
                                    <form action="<?php echo base_url();?>admin/add_user/" role="form" class="inform well" style="width:350px;" method="post" accept-charset="utf-8">
                                <table style="width:100%;">
                                    <tbody><tr>
                                        <td style="vertical-align:top;padding-right:20px;">
                                            <p class="help-block">
                                               Add New User
                                            </p>

                                <div class="form-group ">
                                    <label class="control-label" for="username">User Name</label>
                                    <input type="text" name="username" id="username" class="form-control input-sm" placeholder="eg: Write username" value="<?php echo set_value('username'); ?>">

                                    <p class="help-block form_note">[ Write username ]</p>
                                </div>

                                <div class="form-group ">
                                    <label class="control-label" for="email_address">Email Address</label>
                                    <input type="email" name="email_address" id="email_address" class="form-control input-sm" placeholder="eg: Write email_address" value="<?php echo set_value('email_address'); ?>">

                                    <p class="help-block form_note">[ Write valid email address ]</p>
                                </div>

                                <div class="form-group ">
                                    <label class="control-label" for="phone_no">Phone No</label>
                                    <input type="tel" name="phone_no" id="phone_no" class="form-control input-sm" placeholder="eg: Write phone_no" value="<?php echo set_value('phone_no'); ?>">

                                    <p class="help-block form_note">[ Write valid phone_no ]</p>
                                </div>

                                <div class="form-group ">
                                    <label class="control-label" for="password">Password</label>
                                    <input type="password" name="password" id="password" class="form-control input-sm" placeholder="eg: Write password" value="<?php echo set_value('password'); ?>">

                                    <p class="help-block form_note">[ Write min 6 digit password ]</p>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label" for="type">Type</label>
                                    <select class="form-control input-sm" name="type">
                                        <option value="Reseller">Reseller</option>
                                        <option value="User">User</option>
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
                                <p class="help-block line">&nbsp;</p>
                                <button type="submit" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-send"></span> &nbsp;Save</button>
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