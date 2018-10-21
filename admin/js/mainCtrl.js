var app = angular.module('adminModule', ['ngMaterial','ngRoute','ngTable']);
var base_path = "../subPages/crudOperations.php";

app.controller('mainCtrl', function($scope, $timeout, $mdSidenav) {
	$scope.toggleLeft = buildToggler('left');
	$scope.currentNavItem = 'page1';
	$scope.goto = function(page) {
	  console.log("Goto " + page);
	};
	$scope.closeLeft = function () {
		$mdSidenav('left').close()
		.then(function () {
		  //$log.debug("close LEFT is done");
		});
	};
	function buildToggler(navID){
		return function() {
		// Component lookup should always be available since we are not using `ng-if`
		$mdSidenav(navID)
		  .toggle()
		  .then(function () {
		    //$log.debug("toggle " + navID + " is done");
		  });
		};	
	}
//ctrl ends
});

app.config(function($routeProvider) {
    $routeProvider
    .when("/", {
        templateUrl : "subPages/dashboard.php",
        controller : "dashboard"
    })
    .when("/addEmp", {
        templateUrl : "subPages/addEmp.php",
        controller : "addEmp"
    })
    .when("/manageEmp", {
        templateUrl : "subPages/manageEmp.php",
        controller : "manageEmp"
