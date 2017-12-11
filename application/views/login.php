<!DOCTYPE html>
<html lang="en">
<head>
	<base />
	<meta charset="utf-8">
	<meta name="author" content="DhakaSoft Network">
	<meta name="copyright" content="Copyright &copy; 2009 dhaka-soft.net" />
	<meta name="rating" content="general" />
	<meta name="distribution" content="global" />
	<meta name="version" content="16.5">
	<meta name="robots" content="index, follow">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta http-equiv="imagetoolbar" content="no" />
	<title><?=$title?></title>
	<link href="<?php echo base_url();?>resource/login//img/easyrecharge.png" rel="icon" type="image/x-icon" id="page_favicon"/>
	<link href="<?php echo base_url();?>resource/login/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url();?>resource/login/css/login.css" rel="stylesheet" type="text/css">
</head>
<body>
<section id="head">
<div id="content" style="background:#F7F7F7;">
	<div class="logo">
        <h2><a href="<?php echo base_url();?>" title="Noor Flexi biling"> Noor Flexi billing</a></h2>
	</div>
	<div class="clear"></div>
	<div class="cobrand"> 
	<img src="<?php echo base_url();?>resource/login/img/Co.Brand.png">
	</div>
</div>
</section>
<section id="slide">
<div id="content">
<div class="news">
	<iframe src='<?php echo base_url();?>login/notice' width="764" height="720" frameborder="0" scrolling="no" allowTransparency="true"></iframe>
		</div>
	<div class="login">
		<form action="<?php echo base_url();?>login" role="form" class="inform" style="width:236px;padding:20px;" method="post" accept-charset="utf-8">
            <div style="display:none">
                <input type="hidden" name="erc165t" value="fea6a7dcd924478ec6ab8536925a0192" />
</div>				<h2>Log In</h2>
				<p style="font-size:9px; color:black; text-align:center;">System: compatible,  IP: <?php echo $_SERVER["REMOTE_ADDR"];?></p>
				  <div class="form-group ">
					<label class="control-label sr-only" for="username">Username</label>
					<input type="text" name="txtUsername" id="txtUsername" class="form-control input-sm" placeholder="Username or e-mail" value="">
				  </div>
				  <div class="form-group ">
					<label class="control-label sr-only" for="password">Password</label>
					<input type="password" name="txtPassword" id="txtPassword" class="form-control input-sm" placeholder="Password" value="">
				  </div>
				  <div class="form-group">
					 <button type="submit" class="btn btn-danger btn-sm btn-block" >Log In</button>
				  </div>
				<p style="font-size:11px;color:red;">
                <?php
                echo $this->session->flashdata('error_message');

                ?></p>
				<p><a href="<?php echo base_url();?>forgot" title="Reset your password">Forgot Password?</a></p>
				<p><a href="<?php echo base_url();?>register" title="Register a new account">Create Account</a></p>
				<p><a href="" title="Get it on Google Play" target="_blank"><img src="<?php echo base_url();?>resource/login/logo/play_store.png"></a></p>

        </form>
    </div>
	
	</div>
	<div class="clear"></div>
</div>
</section>

<section id="copyright">
	<div id="content">
	<p><img src="<?php echo base_url();?>resource/login/img/payments.jpg">   Powered By Noor flexi</p>
	</div>
</section>
</body>
</html>