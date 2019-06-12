<?php
	include_once("check-session.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="bootstrap/bootstrap.min.js"></script>
		<script src="js/angular.min.js"></script>
		<script>
			var app=angular.module("myapp", []);
			app.controller("mycontrol", function($scope, $http){
				$scope.username="<?php echo $_SESSION['username']; ?>";
				$http.get("wishlist-process.php?customer="+$scope.username).then(function(response){
					$scope.wishlist=response.data;
				});
				$scope.sendsms=function(){
					$http.get("send-sms.php").then(function(response){
						alert("sent");
					});
				}
			});
		</script>
		<style>
			.card-body{
				padding: 50px 40px;
				background-color: white;
				box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.2);
			}
			.card-body:hover{
				transform: translate(0px,-5px);
				transition: all 0.3s;
				box-shadow: 0px 0px 25px 5px #ddd;
			}
			p{
				font-family: "Open Sans", "Helvetica Neue", Helvetica, sans-serif;
				font-size: 14px;
				font-weight: 300;
				letter-spacing: 1px;
				line-height: 1.8em;
				color: #777;
			}
			.cards-link{
				display: block;
				padding-top: 50px;
				text-decoration: none;
				text-align: right;
				text-transform: uppercase;
				color: #777;
				letter-spacing: 2px;
				font-size: 0.85em;
			}
			.cards-link:hover{
				text-decoration: none;
				color: #333;
			}
			.cards-title{
				font-family: "Montserrat", "Open Sans", "Helvetica Neue", Helvetica, sans-serif;
				margin-top: 40px;
				margin-bottom: 30px;
				letter-spacing: 3px;
				font-weight: 500;
				line-height: 1.1;
				font-size: 1.07em;
			}
		</style>
	</head>
	<body ng-app="myapp" ng-controller="mycontrol">
		<div class="container">
			<div class="row">
				<div class="col-md-4" ng-repeat="x in wishlist">
					<div class="card-body" style="margin-bottom: 20px">
						<h4 class="cards-title">{{x.firm}}</h4>
						<p>
							Name : {{x.name}}<br>
							City : {{x.city}}<br>
							Services : {{x.services}}
						</p>
						<button class="cards-link" style="background-color: transparent; border: 0; outline: 0; cursor: pointer;" ng-click="sendsms();">
							Show Interest<img src="pics/arrows_slim_right.svg" width="32px" height="20px">
						</button>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>