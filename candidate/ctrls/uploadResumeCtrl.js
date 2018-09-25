candidateApp.controller("uploadResumeCtrl", function($scope, $rootScope, postData, $filter, $http, NgTableParams) {
    $rootScope.showLoader = true;
    $scope.uploadResumeData = {};

    //get resume details
    $scope.getResumeData = function () {
        var getResumeData = { "tableName": "candidateRegData", "type": "getUserData" };
        var cat2 = postData.getUserData(getResumeData);
        cat2.then(function (response) {
            console.log(response.data[0]);
            $scope.uploadResumeData = response.data[0];
            $rootScope.showLoader = false;
        });
    };
 
    //ini getdetails
    $scope.getResumeData();
    //ctrls ends

    //ctrls ends
    });
    
