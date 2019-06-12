<?php
	include_once("check-session.php");
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
				$.getJSON("vendor-profile-ajax.php", function(response){
					$.each(response, function(index, value){
						$("#services").append("<option value='"+value.services+"'>"+value.services+"</option>");
					});
				});
				$.getJSON("vendor-profile-username.php?username="+"<?php echo $_SESSION['username'] ?>", function(response)
					{
						$("#username").val(response.username);
						$("#email").val(response.email);
						$("#name").val(response.name);
						$("#mobile").val(response.mobile);
						$("#address").val(response.address);
						$("#city").val(response.city);
						$("#firm").val(response.firm);
						$("#estd").val(response.estd);
						$("#prevwork").val(response.prevwork);
						$("#prev").attr("src", response.path);
						var values=response.services;
						$("#services").val('');
						$.each(values.split(","),function(i,e){
							$("#services option[value='"+ e +"']").prop("selected",true);
						});
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
					<form action="vendor-profile-process.php" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<div id="prev-div"><img src="pics/user.png" id="prev" height="150px" width="150px"></div>
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
							<input type="text" class="form-control" id="name" name="name" required autofocus>
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
							<input type="text" class="form-control" id="city" name="city" required>
						</div>
						<div class="form-group">
							<label for="firm">Firm</label>
							<input type="text" class="form-control" id="firm" name="firm" required>
						</div>
						<div class="form-group">
							<label for="estd">Estd.</label>
							<input type="text" class="form-control" id="estd" name="estd">
						</div>
						<div class="form-group">
							<label for="previous">Previous Work</label>
							<textarea class="form-control" id="prevwork" name="prevwork"></textarea>
						</div>
						<div class="form-group">
							<label for="services">Services</label><br>
							<select id="services" multiple size="5" style="width: 310px;" name="services[]">
							</select>
						</div>
						<div class="form-group">
							<label for="other">Other (if any, Specify)</label>
							<input type="text" class="form-control" id="other" name="other">
						</div>
						<button type="submit" class="btn btn-primary" style="margin-top: 25px">Update</button><br><br><br>
					</form>
				</div>
			</div>
		</div>
  </body>
</html>