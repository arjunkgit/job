var app = angular.module('adminModule', ['ngMaterial', 'ngRoute', 'ngTable']);
var base_path = "../subPages/crudOperations.php";

app.controller('mainCtrl', function ($scope, $timeout, $mdSidenav) {
	$scope.toggleLeft = buildToggler('left');
	$scope.currentNavItem = 'page1';
	$scope.goto = function (page) {
		console.log("Goto " + page);
	};
	$scope.closeLeft = function () {
		$mdSidenav('left').close()
			.then(function () {
				//$log.debug("close LEFT is done");
			});
	};
	function buildToggler(navID) {
		return function () {
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

app.config(function ($routeProvider) {
	$routeProvider
		.when("/", {
			templateUrl: "subPages/dashboard.php",
			controller: "dashboard"
		})
		.when("/addEmp", {
			templateUrl: "subPages/addEmp.php",
			controller: "addEmp"
		})
		.when("/manageEmp", {
			templateUrl: "subPages/manageEmp.php",
			controller: "manageEmp"
		})
		.when("/valuesEmp", {
			templateUrl: "subPages/valuesEmp.php",
			controller: "manageEmp"
		})
		.when("/listCandidate", {
			templateUrl: "subPages/listCandidate.php",
			controller: "listCandidate"
		})
		.when("/listJobs", {
			templateUrl: "subPages/listJobs.php",
			controller: "listJobs"
		});
});



app.controller("dashboard", function ($scope) {
	$scope.msg = "I love dash";
});

app.controller("addEmp", function ($scope, $http, postData, NgTableParams) {
	$scope.showLoader = false;
	$scope.empReg = {

	};
	angular.element(document).ready(function () {

	});

	$scope.init = function () {
		$scope.showLoader = true;
		$scope.empReg = {};
		var getJobs = { "tableName": "employerregdata", "type": "getData" };
		var cat2 = postData.getPostedJobs(getJobs);
		cat2.then(function (response) {
			$scope.data = response.data;
			console.log(response.data);
			$scope.tableParams = new NgTableParams({ page: 1, count: 5, sorting: { title: "desc" } }, { data: $scope.data });
			$scope.showLoader = false;
		});

	};

	$scope.addEmp = function () {
		var paramsObj = { "user": $scope.empReg, "tableName": "employerregdata", "type": "insertData" };
		var cat = postData.crud(paramsObj);
		$scope.showLoader = true;
		cat.then(function (data) {
			postData.setResult("success", data);
			$scope.empReg = {};
			var getJobs = { "tableName": "employerregdata", "type": "getData" };
			var cat2 = postData.getPostedJobs(getJobs);
			cat2.then(function (response) {
				$scope.data = response.data;
				console.log(response);
				$scope.tableParams = new NgTableParams({ page: 1, count: 5, sorting: { title: "desc" } }, { data: $scope.data });
				$scope.showLoader = false;
			});
			$scope.showLoader = false;
		});

	};
});


app.controller("manageEmp", function ($scope, $http, postData, $route, NgTableParams, $location) {
	$scope.isEmpDefault = false;
	$scope.showLoader = false;
	$scope.empReg = {};
	angular.element(document).ready(function () { });
	$scope.init = function () {
		$scope.showLoader = true;
		var getJobs = { "tableName": "employerregdata", "type": "getData" };
		var cat2 = postData.getPostedJobs(getJobs);
		cat2.then(function (response) {
			response = { "data": [{ "id": "56", "email": "", "password": "d41d8cd98f00b204e9800998ecf8427e", "companyname": "", "indtype": "", "companyorconsult": "", "contactpername": "", "designation": "", "officeaddress": "", "country": "", "city": "", "pincode": "0", "mobile": "0", "alteremail": "", "gst": "", "agree": "", "getemail": "", "trn_date": "0000-00-00 00:00:00", "jobsPostLimit": "0", "createNewEmpLimit": "0" }] };
			console.log(response.data);
			$scope.data = response.data;
			$scope.tableParams = new NgTableParams({ page: 1, count: 5, sorting: { title: "desc" } }, { data: $scope.data });
			$scope.showLoader = false;
		});
	};

	$scope.init2 = function () {
		$scope.showLoader = true;
		$scope.isEmpDefault = true;
		var getJobs = { "tableName": "defaultvalues", "type": "getData" };
		var cat2 = postData.getPostedJobs(getJobs);
		cat2.then(function (response) {
			$scope.data = response.data;
			$scope.tableParams = new NgTableParams({ page: 1, count: 5, sorting: { title: "desc" } }, { data: $scope.data });
			$scope.showLoader = false;
		});
	};

	$scope.updateUser = function () {
		$scope.showLoader = true;
		console.log("check1 - ");
		console.log($scope.empRegEdit);
		var paramsObj = { "user": $scope.empRegEdit, "tableName": "empRegDataUpdate", "type": "insertData" };
		var cat = postData.crud(paramsObj);

		cat.then(function (data) {
			$scope.empRegEdit = {
				//	   	email : null
			};
			$scope.editMode = false;
			$scope.showLoader = false;
			$scope.init();
			postData.setResult("success", data);
		})
	};

	$scope.editEmp = function (emp) {
		$scope.editMode = true;
		$scope.empRegEdit = {
			email: emp.email,
			companyname: emp.companyname,
			mobile: emp.mobile
		};
	}
	$scope.editEmpLimit = function (emp) {
		console.log("edit Emp List");
	}
	$scope.deleteEmp = function (emp) {
		$scope.showLoader = true;
		$scope.deleteEmpList = {
			email: emp.email

		};

		var paramsObj = { "user": $scope.deleteEmpList, "tableName": "employerDeleteData", "type": "deleteData" };
		var cat = postData.crud(paramsObj);
		cat.then(function (data) {
			$scope.showLoader = false;
			$scope.init();
			postData.setResult("success", data);
		})
	};


});

app.controller("editEmp", function ($scope, $http, postData, NgTableParams, $location) {



});

app.controller("listCandidate", function ($scope) {
	$scope.msg = "I love cand";
});

app.controller("listJobs", function ($scope) {
	$scope.msg = "I love jobs";
});






app.service('postData', function ($http) {

	this.crud = function (paramsObj) {

		//paramsObj = {'user' : $scope.tempUser , 'type':'saveData'}
		return $http({
			method: 'POST',
			url: base_path,
			data: $.param(paramsObj),
			headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
		}).
			then(function (response) {
				return (response.data);

			}, function (response) {
				return (response.data);
			});
	};

	this.getPostedJobs = function (paramsObj) {
		//paramsObj = {'user' : $scope.tempUser , 'type':'getData'}
		return $http({
			method: 'POST',
			url: base_path,
			data: $.param(paramsObj),
			headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
		}).
			then(function (response) {
				return (response.data);

			}, function (response) {
				return (response.data);
			});
	};

	this.setResult = function setResult(resultType, resultData) {
		console.log(" -- " + resultType + resultData);
		var resultType = resultType;
		var resultData = resultData;
		if (resultType == "success") {
			$("#ResultData").css("display", "block");
			$("#ResultData").addClass("alert alert-success alert-dismissable fade in");
			$("#ResultMessage").text(resultData);
			$("#ResultData span:first-child").addClass("glyphicon glyphicon-ok");
			$("#ResultData").fadeTo(2000, 1).slideUp(2000, function () {
				$("#ResultData").css("display", "none");
				$("#ResultMessage").text("");
			});
		} else if (resultType == "error") {
			$("#ResultData").css("display", "block");
			$("#ResultData").addClass("alert alert-danger alert-dismissable fade in");
			$("#ResultMessage").text(resultData);
			$("#ResultData span:first-child").addClass("glyphicon glyphicon-hand-right");
			$("#ResultData").fadeTo(2000, 1).slideUp(2000, function () {
				$("#ResultData").css("display", "none");
				$("#ResultMessage").text("");
			});
		} else { }
		return;
	}


});
