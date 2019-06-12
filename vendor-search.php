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
				$http.get("vendor-card-search.php").then(function(response){
					$scope.cards=response.data.cards;
					$scope.functions=response.data.functions;
					$scope.cities=response.data.cities;
					$scope.services=response.data.services;
				});
				$scope.fillService=function(){
					$http.get("vendor-service-search.php?functions="+$scope.function.function).then(function(response){
						$scope.services=response.data;
					});
				}
				$scope.fillWishlist=function(username){
					$scope.user='<?php echo $_SESSION["username"]; ?>';
					alert($scope.user);
					$http.get("vendor-add-wishlist.php?vendor="+username+"&customer="+$scope.user).then(function(response){
						alert(response.data);
					});
				}
			});
		</script>
		<style>
			.contain{
				padding: 40px 100px 40px 100px;
			}
			.card-body{
				padding: 50px 40px;
				background-color: white;
				box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.2);
				margin-bottom: 40px;
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
				padding: 10px;
				margin-top: 30px;
				text-align: right;
				text-transform: uppercase;
				color: #777;
				letter-spacing: 2px;
				font-size: 0.85em;
			}
			.cards-link:hover{
				text-decoration: none;
				color: #333;
				font-weight: 500;
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
		<div style="width: 100%; padding: 0px;">
			<div class="contain">
				<div class="row">
					<div class="col">
						<label for="function"><p style="margin: 0px;">Function</p></label>
						<select ng-model="function" id="function" ng-options="x.function for x in functions" class="form-control" ng-change="fillService();">
						</select>
					</div>
					<div class="col">
						<label for="services"><p style="margin: 0px;">Services</p></label>
						<select ng-model="service" id="service" ng-options="x.services for x in services" class="form-control">
						</select>
					</div>
					<div class="col">
						<label for="city"><p style="margin: 0px;">City</p></label>
						<select ng-model="city" id="city" ng-options="x.city for x in cities" class="form-control">
						</select>
					</div>
				</div>
			</div>
			<hr style="margin: 0px;">
			<div class="contain">
				<div class="row">
					<div class="col-lg-4 col-md-6" ng-repeat="x in cards | filter : {city : city.city, services: service.services}">
						<div class="card-body" style="margin-bottom: 20px">
							<h4 class="cards-title">{{x.firm}}</h4>
							<p>
								Name : {{x.name}}<br>
								City : {{x.city}}<br>
								Services : {{x.services}}
							</p>
							<button type="button" class="cards-link" style="background-color: transparent; border:0px; cursor: pointer" ng-click="fillWishlist(x.username);">
								Add to Wishlist<img src="pics/arrows_slim_right.svg" width="32px" height="20px">
							</button><br>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>