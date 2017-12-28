
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="ezttle"><span class="text">Add New Package</span></div>
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
                                    <form action="<?php echo base_url();?>admin/add_package/" role="form" id="add_package_form" class="inform well" style="width:350px;" method="post" accept-charset="utf-8">
                                <table style="width:100%;">
                                    <tbody><tr>
                                        <td style="vertical-align:top;padding-right:20px;">
                                            <p class="help-block">
                                               Add Package
                                            </p>
                                            <div class="form-group ">
                                                <label class="control-label" for="operator">Operators</label>
                                                <select class="form-control input-sm" name="operator" id="operator">
                                                    <option value="">Select Operator</option>
                                                    <?php
                                                    foreach($operators as $operator){
                                                        ?>
                                                        <option value="<?php echo $operator->id;?>"><?php echo $operator->operator_name;?></option>
                                                    <?php }?>
                                                </select>
                                            </div>
                                            <div class="form-group ">
                                                <label class="control-label" for="balance">Package Name</label>
                                                <input type="text" name="package" id="package" class="form-control input-sm" placeholder="eg: 3 GB ----- 449 Tk (28 DAYS)" value="<?php echo set_value('package'); ?>">
                                                <p class="help-block form_note">[ Write Package Name ]</p>
                                            </div>
                                            <div class="form-group ">
                                                <label class="control-label" for="amount">Price</label>
                                                <input type="number" name="amount" id="amount" class="form-control input-sm" placeholder="eg: 100" value="<?php echo set_value('amount'); ?>">
                                                <p class="help-block form_note">[ Min 10, Max 2000 ]</p>
                                            </div>
                                            <p class="help-block form_error" style="font-size:11px;">
                                                <?php
                                                echo validation_errors('<div class="error">', '</div>');
                                                echo $this->session->flashdata('error_message');
                                                ?>
                                            </p>
                                            <p class="help-block form_error" style="font-size:11px;color:green">
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