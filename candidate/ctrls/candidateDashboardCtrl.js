var candidateApp = angular.module("candidateAppModule", ['ngMaterial', 'ngRoute', 'ngTable', 'ngMessages']);
var base_path = "candidate/backend/cadidateActions.php";
var globalCurrentPath = "";
candidateApp.controller("candidateCtrl", function($scope, $filter, $http,NgTableParams) {

$scope.selectDivs = function (a){
	$scope.showLoader = false;
	console.log("selected - " + a + " "  + base_path);
};

//ctrls ends
});
candidateApp.run(function ($rootScope) {
    $rootScope.$on('$routeChangeSuccess', function (e, current, pre) {
        console.log(current.originalPath);
        globalCurrentPath = current.originalPath;
        if(current.originalPath == "/"){
            $rootScope.addBtn = false;
            $rootScope.editBtn = false;
            $rootScope.deleteBtn = false;
            $rootScope.updateBtn = false;
            $rootScope.isFullProfile = false;
        }else if(current.originalPath == "/profileEdit"){
            $rootScope.addBtn = false;
            $rootScope.editBtn = true;
            $rootScope.deleteBtn = false;
            $rootScope.updateBtn = false;
        }else if(current.originalPath == "/profileSummary"){
            $rootScope.addBtn = false;
            $rootScope.editBtn = true;
            $rootScope.deleteBtn = false;
            $rootScope.updateBtn = false;
        }else if(current.originalPath == "/empDetails"){
            $rootScope.addBtn = true;
            $rootScope.editBtn = false;
            $rootScope.deleteBtn = false;
            $rootScope.updateBtn = false;
            $rootScope.isFullProfile = true;
        }else if(current.originalPath == "/projectDetails"){
            $rootScope.addBtn = true;
            $rootScope.editBtn = false;
            $rootScope.deleteBtn = false;
            $rootScope.updateBtn = false;
            $rootScope.isFullProfile = true;
        }else if(current.originalPath == "/uploadResume"){
            $rootScope.addBtn = true;
            $rootScope.editBtn = false;
            $rootScope.deleteBtn = false;
            $rootScope.updateBtn = false;
        }else if(current.originalPath == "/accountSettings"){
            $rootScope.addBtn = true;
            $rootScope.editBtn = false;
            $rootScope.deleteBtn = false;
            $rootScope.updateBtn = false;
        }else{
            
        }
    });
});

//ng config
candidateApp.config(function($routeProvider) {
    $routeProvider
    .when("/", { 
        templateUrl : "candidate/subPages/fullProfileView.html"
    })
    .when("/profileEdit", {
        templateUrl : "candidate/subPages/profileEdit.html"
    })
    .when("/profileView", {
        templateUrl : "candidate/subPages/profileView.html"
    })
    .when("/profileSummary", {
        templateUrl : "candidate/subPages/profileSummary.html"
    })
    .when("/empDetails", {
        templateUrl : "candidate/subPages/empDetails.html"
    })
    .when("/projectDetails", {
        templateUrl : "candidate/subPages/projectDetails.html"
    })
    .when("/uploadResume", {
        templateUrl : "candidate/subPages/uploadResume.html"
    })
    .when("/accountSettings", {
        templateUrl : "candidate/subPages/accountSettings.html"
    });
});
