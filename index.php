<?php
	if(isset($_SESSION["username"]))
		header("location:customer-dash.php");
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Document</title>
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
		<script src="js/jquery.min.js"></script>
    <script src="bootstrap/bootstrap.min.js" ></script>
    <link rel="stylesheet" href="css/index.css">
    <script>
			$(document).ready(function(){
				var count=0;
				$(".login").click(function(){
					if(count%2==0)
						{
							$(".login").html("Sign up");
							$(".hide").html("Sign up");
							$("#mobile").css("display","none");
							$("#password").attr("placeholder","Password");
						}
					else
						{
							$("#mobile").css("display","block");
							$(".login").html("Log in");
							$(".hide").html("Log in");
							$("#password").attr("placeholder","Create a Password");
						}
					count++;
				});
				$(".hide").click(function(){
					if(count%2==0)
						{
							$(".login").html("Sign up");
							$(".hide").html("Sign up");
							$("#mobile").css("display","none");
							$("#password").attr("placeholder","Password");
						}
					else
						{
							$("#mobile").css("display","block");
							$(".login").html("Log in");
							$(".hide").html("Log in");
							$("#password").attr("placeholder","Create a Password");
						}
					count++;
				});
				$("#continue").click(function(){
					if(count%2!=0)
						{
							if($("#email").val()=="")
								$("#inform").html("You forget to enter your email address");
							else
								if($("#password").val()=="")
									$("#inform").html("Sorry, password can not be blank");
								else
									$.get("login-process.php?email="+$("#email").val()+"&password="+$("#password").val(), function(data){
										if(data=="1")
											window.location="customer-dash.php";
										else
											$("#inform").html(data);
								});
						}
					else
						{
							if($("#email").val()=="")
								$("#inform").html("You forget to enter your email address");
							else
								if($("#password").val()=="")
									$("#inform").html("Sorry, password can not be blank");
								else
									if($("#mobile").val()=="")
										$("#inform").html("Please, enter your mobile number too");
									else
										$.get("signup-process.php?email="+$("#email").val()+"&password="+$("#password").val()+"&mobile="+$("#mobile").val(), function(data){
											$("#inform").html(data);
									});
						}
				});
				$(".vendor").click(function(){
					if($(".login").html()=="Sign up")
					{
						count++;
						$(".login").html("Log in");
						$(".hide").html("Log in");
						$("#mobile").css("display", "block");
					}
					if($("#email").val()=="")
						$("#inform").html("You forget to enter your email address");
					else
						if($("#password").val()=="")
							$("#inform").html("Sorry, password can not be blank");
						else
							if($("#mobile").val()=="")
								$("#inform").html("Please, enter your mobile number too");
							else
								$.get("signup-process-vendor.php?email="+$("#email").val()+"&password="+$("#password").val()+"&mobile="+$("#mobile").val(), function(data){
									$("#inform").html(data);
					});
				});
			});
		</script>
  </head>
  <body>
		<div class="main">
			<div class="bg-img"></div>
			<div class="signup">
				<div class="signup-body">
					<div class="head">
						<p class="welcome">Welcome to THEBLISS</p>
					</div>
					<p class="wel">Find new way of functions</p>
					<div class="form">
						<form>
							<div class="form-group">
								<input type="email" class="form-control" id="email" placeholder="Email">
							</div>
							<div class="form-group">
								<input type="text" class="form-control" id="mobile" placeholder="Mobile number">
							</div>
							<div class="form-group">
								<input type="password" class="form-control" id="password" placeholder="Create a password">
								<small id="inform" style="color: #E3780B; font-size: 14px;"></small>
							</div>
							<button type="button" class="button" id="continue" style="cursor: pointer;">Continue</button>
						</form>
						<p style="margin: 12px 0px 2px;">or</p>
						<button type="button" class="button" style="background-color: #4267b2; margin: 10px 0px 9px;" disabled>
							Continue with Facebook
						</button>
						<button type="button" class="button" style="background-color: rgb(66, 133, 244);" disabled>
							Continue with Google
						</button>
						<button type="button" class="button hide">
							Log in
						</button>
					</div>
				</div>
				<div class="vendor" style="cursor: pointer;">
					<div style="font-size: 16px; font-weight: 700; line-height: 1.2; color: #444">
						Create a buisness account
					</div>
				</div>
			</div>
			<div class="hide2">
				<button class="login">Log in</button>
			</div>
		</div>
  </body>
</html>
