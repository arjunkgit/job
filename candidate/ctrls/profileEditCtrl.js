candidateApp.controller("profileEditCtrl", function ($scope,$rootScope, $filter, $http, postData, NgTableParams) {

    var profileEditData = {};
    var profileEditDataCopy = {};
    var stringDob = "";
    $rootScope.showLoader = true;

    $scope.hideChoosePhoto = true;
    $scope.isDisable = true;
    //table - candidateregdata
    //get data - getUserData  
    //date formate y-m-d "2015-03-25"

    //call on click of edit
    $scope.editProfile = function () {
        $scope.hideChoosePhoto = false;
        $rootScope.editBtn = false;
        $rootScope.cancelBtn = true;
        $scope.isDisable = false;
    };
    //call on click of edit
    $scope.cancelProfile = function () {
        $scope.hideChoosePhoto = true;
        $rootScope.editBtn = true;
        $rootScope.cancelBtn = false;
        $scope.isDisable = true;
    };

    var getUserData = { "tableName": "candidateregdata", "type": "getUserData" };
    var cat2 = postData.getUserData(getUserData);
    cat2.then(function (response) {
        $scope.profileEditData = response.data[0];
        $scope.profileEditDataCopy = response.data[0];

        stringDob = response.data[0].dob;
        profileEditData = $scope.profileEditData;
        $scope.profileEditData.dob = new Date(stringDob);
        console.log($scope.profileEditData);
        if(globalCurrentPath == "/"){
            $rootScope.editBtn = false;
            $rootScope.cancelBtn = false;
        }else{
            $rootScope.editBtn = true;
            $rootScope.cancelBtn = false;
        }
        $scope.hideChoosePhoto = true;
        $scope.isDisable = true;
        $rootScope.showLoader = false;  
    });

    function formatDateToString(date){
        // 01, 02, 03, ... 29, 30, 31
        var dd = (date.getDate() < 10 ? '0' : '') + date.getDate();
        // 01, 02, 03, ... 10, 11, 12
        var MM = ((date.getMonth() + 1) < 10 ? '0' : '') + (date.getMonth() + 1);
        // 1970, 1971, ... 2015, 2016, ...
        var yyyy = date.getFullYear(); 

        return (yyyy + "-" + MM + "-" + dd);
     }

     $scope.updateProfile = function () {
        $rootScope.showLoader = true;
        profileEditData = $scope.profileEditData;
        profileEditData.dob = formatDateToString($scope.profileEditData.dob);
        console.log(profileEditData);
        $scope.profileEditData.dob = new Date(profileEditData.dob);
        var updateUserDataParams = { "user": profileEditData, "tableName": "candidateregdata", "type": "updateUserRecord" };
        var cat = postData.crud(updateUserDataParams);
        cat.then(function (response) {
            if(response == "success"){
                $rootScope.editBtn = true;
                $rootScope.cancelBtn = false;
                $scope.hideChoosePhoto = true;
                $scope.isDisable = true;
                $rootScope.showLoader = false;  
                postData.setResult("success", postData.alertMessages("success"));
            }else if(response == "error"){
                $rootScope.editBtn = false;
                $rootScope.cancelBtn = true;
                $scope.hideChoosePhoto = false;
                $scope.isDisable = false;
                $rootScope.showLoader = false;  
                postData.setResult("error", postData.alertMessages("error"));
            }else{

            }
        });
    };

    //ctrls ends
});
