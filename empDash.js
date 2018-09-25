var app = angular.module("myApp", ['ngMaterial','ngTable', 'ngMessages']);
var base_path = "subPages/crudOperations.php";

app.controller("myCtrl", function($scope, $filter, $http,postData,NgTableParams) {

	$scope.showLoader = false;
	$scope.isEnabled = false;
	$scope.fromEdit = false;
	$scope.isEdit = true;
	$scope.post = {};
	$scope.post.users = [];
	var tableName = "jobsPost";
  	$scope.isEditable = function(){
		$scope.isEdit = false;	
	};
	$scope.editCancel = function (){
		$scope.isEdit = true;	
	};

	$scope.template = {
			name : "myName",
			jobId: null,
			jobName : "JobName8",
			jobDesc : "jobDesc8"
		};	
		$scope.tempUserData = {

		};	

	$scope.profile = {

		};	
	function resetJobObject(){
		$scope.tempUser = {
			city: "",
			jobDesc: "",
			jobExp: "",
			jobId: "",
			jobName: "",
			maxSalary: "",
			minSalary: "",
			qua: "",
			state: ""
			};	
	}		
	resetJobObject();
	$scope.editMode = false;
	$scope.editUserMode = false;
	$scope.index = '';	
	var url = base_path;
	$scope.mydata = "my data here";
	 
	$scope.addUser = function(){		
	var paramsObj = {"user" : $scope.tempUser , "tableName":"jobsPost",  "type":"saveData"};	
	var cat = postData.crud(paramsObj);
	$scope.showLoader = true;
    cat.then(function(data) {
		console.log(data);
		postData.setResult("success", data);
        $scope.editMode = false;
		$scope.editUserMode = false;
		resetJobObject();
		$scope.tempUser.jobId = null;
		console.log($scope.tempUser);
		$scope.showLoader= false;
    });
	
	};
	$scope.addUserData = function(){	
	  var paramsObjUser = {"user" : $scope.tempUserData , "tableName":"empUsers",  "type":"saveUserData"};	
	  console.log($scope.tempUserData);
	var cat = postData.crud(paramsObjUser);
	$scope.showLoader = true;
    cat.then(function(data) {
		console.log(data);
		if(data.trim() == "This User already registered"){
			postData.setResult("error", data);
		}else{
			$scope.tempUserData = {

			};				
			postData.setResult("success", data);
		}
		$scope.editUserMode = false;	 
		$scope.showLoader= false;
    });
	
	};

	$scope.updateUser = function(){		
	$scope.showLoader = true;  
	var paramsObj = {"user" : $scope.tempUser , "tableName":"jobsPost",  "type":"saveData"};
	console.log($scope.tempUser);	
	var cat = postData.crud(paramsObj);		
    cat.then(function(data) {
		console.log(data);
       postData.setResult("success", data);
	   resetJobObject();
	   $scope.tempUser.jobId = null;
	  $scope.editMode = false;      
       $scope.editUserMode = false;      
	   $scope.showLoader = false;       
    })
	
	};

	
	$scope.deleteUser = function(job)  {
	// var result = confirm("Are you sure you want to delete?");
	// if (result) {		
	// }
	$scope.showLoader = true;
	$scope.deleteList = {
		jobId: job.jobID,
		jobName: job.jobName,
		jobDesc : job.jobDesc,
		minSalary : job.minSalary,
		maxSalary : job.maxSalary
	};

	var paramsObj = {"user" : $scope.deleteList , "tableName":"jobsPost",  "type":"deleteData"};	
	var cat = postData.crud(paramsObj);	
	cat.then(function(data) {
	postData.setResult("success", data);
	$scope.selectDivs(1);
	$scope.showLoader = false;
	});
	};

	$scope.deleteUserName = function(job)  {
		// var result = confirm("Are you sure you want to delete?");
		// if (result) {		
		// }
		$scope.showLoader = true;
		$scope.deleteList = {
			email: job.email,
			fname : job.fname
		};
	
		var paramsObj = {"user" : $scope.deleteList , "tableName":"candidateRegData",  "type":"deleteData"};	
		var cat = postData.crud(paramsObj);	
		cat.then(function(data) {
		postData.setResult("success", data);
		$scope.selectDivs(4);
		$scope.showLoader = false;
		});
		};
	$scope.getError = function(error, name){
		if(angular.isDefined(error)){
			if(error.required && name == 'jobName'){
				return "Please enter a Job name";
			}else if(error.required && name == 'minSalary'){
				return "Please enter min salary";
			}else if(error.required && name == 'jobDesc'){
				return "Please enter Job Description";
			}else if(error.required && name == 'exp'){
				return "Please enter experiance";
			}else if(error.required && name == 'qua'){
				return "Please enter qualification";
			}else if(error.minlength && name == 'jobName'){
				return "Name must be 3 characters long";
			}
		}
	};
	$scope.updateProfile = function(profile){

	$scope.profile = {
		email: profile.email,
		companyname: profile.companyname,
		indtype : profile.indtype,
		companyorconsult : profile.companyorconsult,
		contactpername : profile.contactpername,
		designation : profile.designation,
		mobile : profile.mobile,
		pincode : profile.pincode,
		officeaddress : profile.officeaddress
		
	};
	$scope.showLoader = true;  
	var paramsObj = {"user" : $scope.profile , "tableName":"employerRegData",  "type":"saveData"};	

	var cat = postData.crud(paramsObj);	
    cat.then(function(data) {
       postData.setResult("success", data);
		$scope.selectDivs(2);
	   $scope.showLoader = false; 
	   $scope.isEdit = true;      
    })
		
	};

	angular.element(document).ready(function () {
	$scope.ini();	    
    });

	$scope.ini = function(){
	var totalDivs = $(".panel-group").length;
	var i = 0; 
	for(i=0;i<totalDivs; i++){
		$(".panel-group").eq(i).hide();
	}
		$(".panel-group").eq(0).show();
	};

	$scope.editUser = function(job){
		$scope.tempUser = {
			jobId: job.jobID,
			jobName: job.jobName,
			jobDesc : job.jobDesc,
			minSalary : job.minSalary,
			maxSalary : job.maxSalary,
			jobExp : job.jobExp,
			qua : job.qua,
			city : job.city,
			state : job.state
			
		};
		$scope.editMode = true;		
		$scope.editUserMode = true;		
		$scope.fromEdit = true;		
		$scope.selectDivs(0);		
	};
	
 
	$scope.selectDivs = function (a){		
		var totalDivs = $(".panel-group").length;
		var i = 0; 
		for(i=0;i<totalDivs; i++){
			if(i == a){
				$(".panel-group").eq(i).show();
				currentDiv = i;
				if(currentDiv == 1){	
				  $scope.showLoader = true;
		          $scope.editMode = false;
		          $scope.editUserMode = false;
					var getJobs = {"tableName":"jobsPost",  "type":"getData"};	
					var cat2 = postData.getPostedJobs(getJobs);
				    cat2.then(function(response) {
						console.log(response.data);
				        $scope.data = response.data;
						$scope.tableParams = new NgTableParams({page: 1, count: 5, sorting : {title:"desc"}},{data: $scope.data});
						$scope.showLoader = false;				
				    }); 
				}
				if(currentDiv == 2){	
				  $scope.showLoader = true;
		          $scope.editMode = false;
		          $scope.editUserMode = false;
					var getProfile = {"tableName":"employerRegData",  "type":"getData"};	
					var cat3 = postData.getPostedJobs(getProfile);
				    cat3.then(function(response) {
				        $scope.profile = response.data;
						$scope.showLoader = false;				
				    });
				}
				if(currentDiv == 3){	
				  $scope.showLoader = true;
		          $scope.editMode = false;
		          $scope.editUserMode = false;
					var getProfile = {"tableName":"employerRegData",  "type":"getData"};	
					var cat3 = postData.getPostedJobs(getProfile);
				    cat3.then(function(response) {
				        $scope.profile = response.data;
						$scope.showLoader = false;				
				    });					 
				}
				if(currentDiv == 4){
					$scope.tempUserData = {

					};	
					$scope.showLoader = true;
					$scope.editMode = false;
					$scope.editUserMode = false;
					  var getJobs = {"tableName":"candidateRegData",  "type":"getData"};	
					  var cat2 = postData.getPostedJobs(getJobs);
					  cat2.then(function(response) {
						  console.log(response.data);
						  $scope.data = response.data;
						  $scope.tableParamsData = new NgTableParams({page: 1, count: 5, sorting : {title:"desc"}},{data: $scope.data});
						  $scope.showLoader = false;
					  }); 
				  }
				if(currentDiv == 0){
					$scope.editMode = false;				
					$scope.editUserMode = false;				
					var fromEdit = $scope.fromEdit;
					if(fromEdit == true){
						$scope.editMode = true; 
						$scope.editUserMode = true; 
					}else{
						resetJobObject();
						$scope.tempUser.jobId = null;
								}
					$scope.fromEdit = false;
				}
				
			}else		
			$(".panel-group").eq(i).hide();
		}	
		
	};
//ctrl ends	
});



app.service('postData', function($http) {

this.crud = function (paramsObj){
	
	//paramsObj = {'user' : $scope.tempUser , 'type':'saveData'}
	return $http({
	    	method: 'POST', 
	    	url: base_path,
	    	data: $.param(paramsObj),
	    	headers: {'Content-Type': 'application/x-www-form-urlencoded'}
	    	}).
        then(function(response) {
         return(response.data);

        }, function(response) {
          return(response.data);
      });	
};

this.getPostedJobs = function (paramsObj){
	//paramsObj = {'user' : $scope.tempUser , 'type':'getData'}
	return $http({
	    	method: 'POST', 
	    	url: base_path,
	    	data: $.param(paramsObj),
	    	headers: {'Content-Type': 'application/x-www-form-urlencoded'}
	    	}).
        then(function(response) {
         return(response.data);

        }, function(response) {
          return(response.data);
      });	
};

this.setResult = function setResult(resultType, resultData){
    var resultType = resultType;
    var resultData = resultData;
    if(resultType == "success"){
    	$("#ResultData").css("display", "block");
		$("#ResultData").removeClass("alert-danger");
        $("#ResultData").addClass("alert alert-success alert-dismissable fade in");
        $("#ResultMessage").text(resultData); 
        $("#ResultData span:first-child").addClass("glyphicon glyphicon-ok");   
        $("#ResultData").fadeTo(2000, 1).slideUp(1000, function(){
			$("#ResultData").css("display", "none"); 
            $("#ResultMessage").text("");     
	});
    }else if(resultType == "error"){
		$("#ResultData").css("display", "block");
		$("#ResultData").removeClass("alert-success");
        $("#ResultData").addClass("alert alert-danger alert-dismissable fade in");
        $("#ResultMessage").text(resultData); 
        $("#ResultData span:first-child").addClass("glyphicon glyphicon-hand-right");   
        $("#ResultData").fadeTo(2000, 1).slideUp(1000, function(){	
        	$("#ResultData").css("display", "none"); 
            $("#ResultMessage").text(""); 
        });        
    }else { }
    return;
}


});
