candidateApp.controller("empDetailsCtrl", function ($scope, $rootScope, postData, $filter, $http, NgTableParams) {

    var empDetailsData = {};
    var stringWorkedJoinDate = "";
    var stringWorkedEndDate = "";
    var stringDob = "";
    $rootScope.showLoader = true;
    $scope.showAddEmpDetails = false;
    $scope.hideChoosePhoto = true;
    $scope.isDisable = false;
    //empty dataset
    $scope.empSelectedDetailsData = {};
    // $scope.empSelectedDetailsData = [{
    //     "id": "48",
    //     "email": "user1@gmail.com",
    //     "empHistory": "2010 - IT Administrator - Tosox Corp Oversaw the Companys IT infrastrucre, managed and maintaned the IT and multimedia network.",
    //     "workedCompany": "cname22",
    //     "workedYear": "",
    //     "workedMonth": "",
    //     "workedJoinDate": new Date("2015-03-25"),
    //     "workedEndDate": new Date("2015-03-25"),
    //     "workedCurrentJob": true
    // },
    // {
    //     "id": "49",
    //     "email": "user1@gmail.com",
    //     "empHistory": "2010 - IT Administrator - Tosox Corp Oversaw the Companys IT infrastrucre, managed and maintaned the IT and multimedia network.",
    //     "workedCompany": "cname22",
    //     "workedYear": "",
    //     "workedMonth": "",
    //     "workedJoinDate": new Date("2015-03-25"),
    //     "workedEndDate": new Date("2015-03-25"),
    //     "workedCurrentJob": false
    // }];

    //get emp details
    $scope.getEmpDetails = function () {
        var getEmpDetailsData = { "tableName": "emphistory", "type": "getUserData" };
        var cat2 = postData.getUserData(getEmpDetailsData);
        cat2.then(function (response) {
            console.log(response);
            $scope.empSelectedDetailsData = response.data;
            $scope.isDisable = true;
            // $scope.empDetailsData = response.data[0];
            // stringWorkedJoinDate = response.data[0].workedJoinDate;
            // stringWorkedEndDate = response.data[0].workedEndDate;
            // $scope.empDetailsData.workedJoinDate = new Date(stringWorkedJoinDate);
            // $scope.empDetailsData.workedEndDate = new Date(stringWorkedEndDate);

            $rootScope.showLoader = false;
        });
    };

    $scope.addEmpDetails = function () {
        $("#addEmpDetailsPopup").modal({show: true, backdrop: "static", keyboard: false});
        $rootScope.showLoader = true;
        $scope.isDisable = false;
        $scope.showAddEmpDetails = true;
        $rootScope.showLoader = false;
        $rootScope.cancelBtn = true;
        $rootScope.addBtn = false;
    };
    $scope.cancelEmpDetails = function () {
        $rootScope.showLoader = true;
        $scope.isDisable = true;
        $scope.showAddEmpDetails = false;
        $rootScope.cancelBtn = false;
        $rootScope.addBtn = true;
        $rootScope.showLoader = false;
    };

    function formatDateToString(date){
        // 01, 02, 03, ... 29, 30, 31
        var dd = (date.getDate() < 10 ? '0' : '') + date.getDate();
        // 01, 02, 03, ... 10, 11, 12
        var MM = ((date.getMonth() + 1) < 10 ? '0' : '') + (date.getMonth() + 1);
        // 1970, 1971, ... 2015, 2016, ...
        var yyyy = date.getFullYear(); 

        return (yyyy + "-" + MM + "-" + dd);
     }

    $scope.updateEmpDetails = function (id, data) {
        $("#addEmpDetailsPopup").modal({show: false, backdrop: "static", keyboard: false});
        $rootScope.showLoader = true;
        $scope.isDisable = true;
        $scope.showAddEmpDetails = false;
        $rootScope.cancelBtn = false;
        $rootScope.addBtn = true;
        $rootScope.showLoader = false;
    };

    $scope.closeEmpDetails = function(){
        $("#addEmpDetailsPopup").modal({show: false, backdrop: "static", keyboard: false});
        $rootScope.showLoader = true;
        // var stringJoinDate = $scope.empShowDetailsData.workedJoinDate;
        // var stringEndDate = $scope.empShowDetailsData.workedEndDate;        
        // $scope.empShowDetailsData.workedJoinDate = formatDateToString(stringJoinDate);
        // $scope.empShowDetailsData.workedEndDate = formatDateToString(stringEndDate);
        // if($scope.empShowDetailsData.workedCurrentJob == true){
        //     $scope.empSelectedDetailsData.workedCurrentJob = 'true';
        // }else{
        //     $scope.empSelectedDetailsData.workedCurrentJob = 'false';
        // }
        $scope.isDisable = true;
        $scope.showAddEmpDetails = false;
        $rootScope.cancelBtn = false;
        $rootScope.addBtn = true;
        $rootScope.showLoader = false;
    };

    $scope.updateIndEmpDetails = function (id, data){
        $("#addEmpDetailsPopup").modal({show: true, backdrop: "static", keyboard: false});
        $scope.empShowDetailsData = data;

        // if(data.workedCurrentJob == 'true'){
        //     $scope.empShowDetailsData = data;
        //     $scope.empShowDetailsData.workedCurrentJob = true;
        // }
        // else{
        //     $scope.empShowDetailsData = data;
        //     $scope.empShowDetailsData.workedCurrentJob = false;
        // }
        // $scope.empShowDetailsData.workedJoinDate = new Date(data.workedJoinDate);
        // $scope.empShowDetailsData.workedEndDate = new Date(data.workedEndDate);
        
        $rootScope.showLoader = true;
        $scope.isDisable = false;
        $scope.showAddEmpDetails = true;
        $rootScope.cancelBtn = true;
        $rootScope.addBtn = false;
        $rootScope.showLoader = false;
    };

    $scope.deleteIndEmpDetails = function(id,index){
        $rootScope.showLoader = true;
        $scope.showAddEmpDetails = false;
        $rootScope.cancelBtn = false;
        $rootScope.addBtn = true;
        $scope.empSelectedDetailsData.splice(index, 1);
        $rootScope.showLoader = false;
    };


    //ini getdetails
    $scope.getEmpDetails();
    //ctrls ends
});


    // [
    //     {
    //       "id": "46",
    //       "email": "user1@gmail.com",
    //       "empHistory": "2012 - System  Analyst - Xandato LtdAnalysed system architecture, performed data mining analysis on thousands of entries of raw data and monitored and maintaned the ststem analysis software.",
    //       "workedCompany": "cnamee",
    //       "workedYear": "",
    //       "workedMonth": "",
    //       "workedJoinDate": "2015-03-25T00:00:00.000Z",
    //       "workedEndDate": "2015-03-25T00:00:00.000Z",
    //       "workedCurrentJob": "true"
    //     },
    //     {
    //       "id": "48",
    //       "email": "user1@gmail.com",
    //       "empHistory": "2010 - IT Administrator - Tosox Corp Oversaw the Companys IT infrastrucre, managed and maintaned the IT and multimedia network.",
    //       "workedCompany": "cname22",
    //       "workedYear": "",
    //       "workedMonth": "",
    //       "workedJoinDate": "2015-03-25",
    //       "workedEndDate": "2015-03-25",
    //       "workedCurrentJob": "false"
    //     }
    //   ]
