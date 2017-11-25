
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="ezttle"><span class="text">New DBBL</span></div>
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
                                    <form action="https://www.toriflexi.net/main/req/flexiload" role="form" class="inform well" style="width:350px;" method="post" accept-charset="utf-8"><div style="display:none">
                                            <input type="hidden" name="erc165t" value="9123c50e9fa269d144ab7e5262f536d2">
                                        </div>					<table style="width:100%;">
                                            <tbody><tr>
                                                <td style="vertical-align:top;padding-right:20px;">
                                                    <p class="help-block">Send DBBL</p>
                                                    <div class="form-group has-error">
                                                        <label class="control-label" for="number">Number</label>
                                                        <input type="text" name="number" id="number" class="form-control input-sm" placeholder="eg: 0171XXXXXXX" value="">
                                                        <p class="help-block form_note">[ 017, 919, 923 ]</p>
                                                    </div> <div class="form-group ">
                                                        <label class="control-label" for="amount">Amount</label>
                                                        <input type="text" name="amount" id="amount" class="form-control input-sm" placeholder="eg: 100" value="1">
                                                        <p class="help-block form_note">[ Min 10, Max 2000 ]</p>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label class="control-label" for="type">Type</label>
                                                        <select class="form-control input-sm" name="type">
                                                            <option value="1">Personal</option>
                                                            <option value="2">Agent</option>
                                                        </select>
                                                    </div>
                                                    <input type="hidden" name="valid">
                                                    <p class="help-block form_error" style="font-size:11px;">The Number field is required.<br>
                                                        Sorry! Rate prefix was not found.<br>
                                                    </p>
                                                    <p class="help-block line">&nbsp;</p>
                                                    <button type="submit" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-send"></span> &nbsp;Send</button>
                                                </td>
                                            </tr>
                                            </tbody></table>
                                    </form>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6" style="padding-right:20px;">
                                    <p class="help-block">Last 10 Requests</p>
                                    <div style="margin:0px;padding:0px;background:#fff;">
                                        <table cellspacing="0" class="table10">
                                            <thead>
                                            <tr>
                                                <th>Number</th>
                                                <th>Amount</th>
                                                <th>Cost</th>
                                                <th>Type</th>
                                                <th>Status</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>01813083213</td>
                                                <td>1</td>
                                                <td>1.00</td>
                                                <td>Prepaid</td>
                                                <td style="font-weight:bold;"><span style="color:red">Cancelled</span></td>
                                            </tr>
                                            </tbody>
                                        </table>
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