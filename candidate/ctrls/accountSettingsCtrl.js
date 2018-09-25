candidateApp.controller("accountSettingsCtrl", function ($scope, $rootScope, postData, $filter, $http, NgTableParams) {
    $rootScope.showLoader = true;
 
    //get candidateRegData details
    $scope.getAccountSettings = function () {
        var getAccountSettingsData = { "tableName": "candidateRegData", "type": "getUserData" };
        var cat2 = postData.getUserData(getAccountSettingsData);
        cat2.then(function (response) {
            console.log(response.data[0]);
            $scope.accountSettingsData = response.data[0];            
            $scope.accountSettingsData.activatePro == 0 ? $scope.accountSettingsData.activatePro = false : $scope.accountSettingsData.activatePro = true;
            $scope.accountSettingsData.deactivatePro == 0 ? $scope.accountSettingsData.deactivatePro = false : $scope.accountSettingsData.deactivatePro = true;
            $scope.accountSettingsData.deletePro == 0 ? $scope.accountSettingsData.deletePro = false : $scope.accountSettingsData.deletePro = true;
            $scope.isDisable = true;
            $rootScope.showLoader = false;
        });
    };


    //ini
    $scope.getAccountSettings();

    //ctrls ends
});
