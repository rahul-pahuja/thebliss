<?php
	include_once("check-session.php");
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="bootstrap/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/customer-dash.css">
    <link rel=stylesheet href="css/animate.css">
    <script src="js/wow.min.js"></script>
    <script>
			$(function(){
				new WOW().init(); 
			});
		</script>
		<style>			
			.sticky{
				position: absolute;
				top: 0;
				background-color: transparent!important;
			}
			.logo-dash{
				background-color: white!important;
				color: black!important;
			}
		</style>
		<script>
			$(document).ready(function(){
//				$(window).scroll(function (){
//					if($(window).scrollTop()<$('#contain-nav').offset().top)
//					{
//						$('#contain-nav').addClass('sticky');
//						$(".nav-link").css("color", "white");
//						$('#dash-logo').addClass('logo-dash');
//					}
//					else if($(window).scrollTop()!=0)
//					{
//						$('#contain-nav').removeClass('sticky');
//						$(".nav-link").css("color", "black");
//						$('#dash-logo').removeClass('logo-dash');
//					}
//				});
			});
		</script>
  </head>
  <body>
		<div id="header" class="container-fluid" style="padding: 0px">
    	<nav class="navbar navbar-expand-lg" id="contain-nav">
				<div class="container">
					<a id="dash-logo" href="#"><strong>thebliss</strong></a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav-div" aria-controls="nav-div" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse justify-content-end" id="nav-div">
						<ul class="navbar-nav">
							<li class="nav-item">
								<a class="nav-link" href="#">Home</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">About Us</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">Contact Us</a>
							</li>
						</ul>
						<ul class="navbar-nav">
							<li class="nav-item">
								<a class="nav-link" href="#">Wishlist</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">Logout</a>
							</li>
						</ul>
					</div>
				</div>
			</nav>
			<div class="carousel slide carousel-fade" data-ride="carousel">
				<div class="carousel-inner">
					<div class="carousel-item active">
						<div id="cara-pic-1" class="cara" alt="First slide" height="641px;"></div>
					</div>
					<div class="carousel-item">
						<div id="cara-pic-2" class="cara" alt="Second slide" height="641px;"></div>
					</div>
					<div class="carousel-item">
						<div id="cara-pic-3" class="cara" alt="Third slide" height="641px;"></div>
					</div>
				</div>
			</div>
    </div>
    <div class="back-gray">
    	<div class="container">
				<div class="row section">
					<div class="col-md-6 col-lg-4" style="margin-bottom: 20px;">
						<div class="card-body wow slideOutUp" data-wow-duration="1s" data-wow-delay=".3s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.3s; animation-name: fadeIn;">
							<span><img src="pics/img_467147.png" width="64px" height="64px"></span>
							<h4 class="cards-title">FIND VENDOR</h4>
							<p>Lorem ipsum dolor sit amet, consectetur elit adipisicing , sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minimv</p>
							<a href="vendor-search.php" class="cards-link">
								Learn More<img src="pics/arrows_slim_right.svg" width="32px" height="20px">
							</a>
						</div>
					</div>
					<div class="col-md-6 col-lg-4" style="margin-bottom: 20px;">
						<div class="card-body wow slideOutUp" data-wow-duration="1s" data-wow-delay=".3s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.3s; animation-name: fadeIn;">
							<span><img src="pics/user_profile_edit-512.png" width="64px" height="64px"></span>
							<h4 class="cards-title">PROFILE</h4>
							<p>Lorem ipsum dolor sit amet, consectetur elit adipisicing , sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minimv</p>
							<a href="customer-profile-front.php" class="cards-link">
								Learn More<img src="pics/arrows_slim_right.svg" width="32px" height="20px">
							</a>
						</div>
					</div>
					<div class="col-md-6 col-lg-4" style="margin-bottom: 20px;">
						<div class="card-body wow slideOutUp" data-wow-duration="1s" data-wow-delay=".3s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.3s; animation-name: fadeIn;">
							<span><img src="pics/1-512.png" width="64px" height="64px"></span>
							<h4 class="cards-title">WISHLIST</h4>
							<p>Lorem ipsum dolor sit amet, consectetur elit adipisicing , sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minimv</p>
							<a href="wishlist-front.php" class="cards-link">
								Learn More<img src="pics/arrows_slim_right.svg" width="32px" height="20px">
							</a>
						</div>
					</div>
				</div>
			</div>
    </div>
    <div>
    </div>
  </body>
</html>