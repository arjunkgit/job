candidateApp.controller("profileSummaryCtrl", function($scope,$rootScope, $filter,postData, $http,NgTableParams) {

    $scope.showLoader = true; 
    $scope.isDisable = true;
    //table - candidateregdata
    //get data - getUserData  
    //date formate y-m-d "2015-03-25"

    //call on click of edit
    $scope.editProfileSummary = function () {
        $rootScope.editBtn = false;
        $rootScope.cancelBtn = true;
        $scope.isDisable = false;
    };
    //call on click of edit
    $scope.cancelProfileSummary = function () {
        $scope.hideChoosePhoto = true;
        $rootScope.editBtn = true;
        $rootScope.cancelBtn = false;
        $scope.isDisable = true;
    };
    var getProfileSummaryData = { "tableName": "candidateregdata", "type": "getUserData" };
    var cat2 = postData.getUserData(getProfileSummaryData);
    cat2.then(function (response) {
        $scope.profileSummaryData = response.data[0];
        if(globalCurrentPath == "/"){
            $rootScope.editBtn = false;
            $rootScope.cancelBtn = false;
        }else{
            $rootScope.editBtn = true;
            $rootScope.cancelBtn = false;
        }
        $scope.showLoader = false;
    });

    
    $scope.updateProfile = function () {
        $scope.showLoader = true;
        var updateUserDataParams = { "user": $scope.profileSummaryData, "tableName": "candidateregdata", "type": "updateUserRecord" };
        var cat = postData.crud(updateUserDataParams);
        cat.then(function (response) {
            console.log(response);
            if(response == "success"){
                $rootScope.editBtn = true;
                $rootScope.cancelBtn = false;
                $scope.isDisable = true;
                $scope.showLoader = false;  
                postData.setResult("success", postData.alertMessages("success"));
            }else if(response == "error"){
                $rootScope.editBtn = false;
                $rootScope.cancelBtn = true;
                $scope.isDisable = false;
                $scope.showLoader = false;  
                postData.setResult("error", postData.alertMessages("error"));
            }else{

            }
        });    
    };    

    //end ctrl
});
