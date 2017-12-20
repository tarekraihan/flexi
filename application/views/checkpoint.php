<div id="wrap">
    <!-- Fixed navbar -->
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="main">Tori Flexi biling</a>
            </div>
        </div>
    </div>
    <div class="clrGap">&nbsp;</div>
    <div class="container mybody">
        <div class="well checkpoint" style="height:270px; ">
            <h2>PIN code Verification</h2>
            <p style="margin-top:3px;">Please Enter your PIN for verification.</p>
            <div class="vform">
                <!--<form role="form">-->
                <form action="https://www.toriflexi.net/checkpoint" method="post" accept-charset="utf-8" role="form"><div style="display:none">
                        <input type="hidden" name="erc165t" value="b6cf6468087174d61f269c519448d7ca" />
                    </div>				  <div class="form-group">
                        <label for="inputpin">Enter your PIN</label>
                        <input type="password" class="form-control input-sm" id="inputpin" name="inputpin" placeholder="Enter your PIN" autocomplete="off" />
                        <p class="help-block form_error"></p>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember" value="1" checked> Remember me on this device
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-lock"></span> Verify</button>
                </form>
            </div>
            <div class="clear">&nbsp;</div>
        </div>
    </div>
</div><!--/end Wrap-->
