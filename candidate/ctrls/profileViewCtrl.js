candidateApp.controller("profileViewCtrl", function ($scope, $filter, $location, $http, NgTableParams) {
    //initial Buttons
    $scope.profileEdit_add = false;
    $scope.profileEdit_edit = true;
    $scope.profileEdit_save = false;
    $scope.profileEdit_cancel = false;
    $scope.dataa = "Pro View";
    $scope.editProfile = function () {
        $location.path("profileEdit");
    };

    //ctrls ends
});
