<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Document</title>
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
		<script src="js/jquery.min.js"></script>
    <script src="bootstrap/bootstrap.min.js" ></script>
    <script>
			$(document).ready(function(){
				$("#signup-btn").click(function(){
					var query=$("#frm-signup").serialize();
					$.get("home-process-signup.php?"+query+"&btn=signup",function(data){
						if(data=="true")
							{
								$(".modal").modal('toggle');
								$("#signup-email").val('');
								$("#signup-password").val('');
								$("#mobile").val('');
							}
						else
							$("#signup-result").html(data);
					});
				});
				$("#signup-email").blur(function(){
					$.get("home-process-signup.php?signup-email="+$("#signup-email").val(),function(data){
						$("#signup-email-span").html(data);
						$("#signup-email-span").css("color", "red");
						$("#signup-email-span").css("position", "absolute");
					});
				});
				$("#login-btn").click(function(){
					var query=$("#frm-login").serialize();
					$.get("home-process-login.php?"+query+"&btn=login",function(data){
						alert(data);
					});
				});
			});
		</script>
  </head>
  <body>
		<button type="button" data-toggle="modal" data-target="#signup">
			Signup
		</button>
		<div class="modal fade" id="signup" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="title">Signup</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form id="frm-signup">
							<span id="signup-result"></span><br>
							<div class="form-group">
								<div class="row">
									<label for="signup-email" class="col-sm-2 col-form-label">Email</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="signup-email" id="signup-email" required>
									</div>
								</div>
								<div class="row"><span id="signup-email-span"></span></div>
							</div>
							<div class="form-group row">
								<label for="mobile" class="col-sm-2 col-form-label">Mobile</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="mobile" id="mobile" required>
								</div>
							</div>
							<div class="form-group row">
								<label for="signup-password" class="col-sm-2 col-form-label">Password</label>
								<div class="col-sm-10">
									<input type="password" class="form-control" name="signup-password" id="signup-password" required>
								</div>
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary" id="signup-btn">Signup</button>
					</div>
				</div>
			</div>
		</div>
		<button type="button" data-toggle="modal" data-target="#login">
			Login
		</button>
		<div class="modal fade" id="login" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="title">Login</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form id="frm-login">
							<span id="login-result"></span><br>
							<div class="row form-group">
								<label for="login-email" class="col-sm-2 col-form-label">Email</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="login-email" id="login-email" required>
								</div>
							</div>
							<div class="form-group row">
								<label for="login-password" class="col-sm-2 col-form-label">Password</label>
								<div class="col-sm-10">
									<input type="password" class="form-control" name="login-password" id="login-password" required>
								</div>
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary" id="login-btn">Login</button>
					</div>
				</div>
			</div>
		</div>
  </body>
</html>