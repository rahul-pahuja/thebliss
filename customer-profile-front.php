<?php
	session_start();
	if(isset($_SESSION["username"])==false)
		header("location:index.php");
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
    <script>
			function showpreview(file)
			{
				if('files' in file)
				{
					var reader=new FileReader();
					reader.onload=function(e)
					{
						$('#prev').attr('src',e.target.result);
					}
					reader.readAsDataURL(file.files[0]);
				}
			}
			$(document).ready(function(){
				$username='<?php echo $_SESSION['username']; ?>'
				$.getJSON("customer-profile-username.php?username="+$username, function(response){
					alert($username);
					$("#email").val(response.email);
					$("#mobile").val(response.mobile);
					$("#username").val(response.username);
					$("#name").val(response.name);
					$("#mobile").val(response.mobile);
					$("#address").val(response.address);
					$("#city").val(response.city);
					$("#prev").attr("src", response.path);
				});
			});
		</script>
		<link rel="stylesheet" href="css/profile.css">
  </head>
  <body>
		<div class="container">
			<div class="row" style="padding-top: 70px;">
				<div class="col-md-6">
					
				</div>
				<div class="col-md-6">
					<form action="customer-profile-process.php" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<div id="prev-div"><img id="prev" height="150px" width="150px"></div>
  						<input type="file" id="path" name="path" onchange="showpreview(this);" for="prev">
  						<label for="path" id="choose">Choose a File....</label><br>
						</div>
						<div class="form-group">
							<label for="username">Username</label>
							<input type="text" class="form-control" id="username" name="username" readonly>
						</div>
						<div class="form-group">
							<label for="email">Email</label>
							<input type="email" class="form-control" id="email" name="email" readonly>
						</div>
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" class="form-control" id="name" name="name">
						</div>
						<div class="form-group">
							<label for="mobile">Mobile</label>
							<input type="text" class="form-control" id="mobile" name="mobile" readonly>
						</div>
						<div class="form-group">
							<label for="address">Address</label>
							<input type="text" class="form-control" id="address" name="address">
						</div>
						<div class="form-group">
							<label for="city">City</label>
							<input type="text" class="form-control" id="city" name="city">
						</div>
						<button type="submit" class="btn btn-primary" style="margin-top: 25px">Update</button><br><br>
					</form>
				</div>
			</div>
		</div>
  </body>
</html>