candidateApp.controller("projectDetailsCtrl", function ($scope, $rootScope, postData, $filter, $http, NgTableParams) {

    var projectDetailsData = {};
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
        var getEmpDetailsData = { "tableName": "projecthistory", "type": "getUserData" };
        var cat2 = postData.getUserData(getEmpDetailsData);
        cat2.then(function (response) {
            console.log(response);
            $scope.empSelectedDetailsData = response.data;
            $scope.isDisable = true;
            $rootScope.showLoader = false;
        });
    };

    $scope.addEmpDetails = function () {
        $("#addProjectDetailsPopup").modal({show: true, backdrop: "static", keyboard: false});
        $scope.empShowDetailsData = {
            projectTitle : "",
            client : "",
            duration : "",
            projectDetails : ""
        };
        $rootScope.showLoader = true;
        $scope.isDisable = false;
        $scope.showAddEmpDetails = true;
        $rootScope.cancelBtn = true;
        $rootScope.addBtn = false;
        $rootScope.showLoader = false;
    };

  $scope.convertToDate = function (stringDate){
    var dateOut = new Date(stringDate);
    dateOut.setDate(dateOut.getDate());
    return dateOut;
  };
    //onclick of update
    $scope.updateIndEmpDetails = function (id, data){
        $("#addProjectDetailsPopup").modal({show: true, backdrop: "static", keyboard: false});
        $scope.empShowDetailsData = data;     
        $rootScope.showLoader = true;
        $scope.isDisable = false;
        $scope.showAddEmpDetails = true;
        $rootScope.cancelBtn = true;
        $rootScope.addBtn = false;
        $rootScope.showLoader = false;
    };

    //add/update button
    $scope.updateEmpDetails = function (id, data) {
        $("#addProjectDetailsPopup").modal({show: false, backdrop: "static", keyboard: false});
        $rootScope.showLoader = true;
        if(id == undefined || id == ""){
            id = "";
            data.id = id;
        }
        console.log("data - ");
        console.log(data);
        var addOrUpdateEmpDetailsParams = { "user": data, "tableName": "projecthistory", "type": "addOrUpdateProjectHistory" };
        var cat = postData.crud(addOrUpdateEmpDetailsParams);
        cat.then(function (response) {
            console.log(response);
            if(response == "error"){
                postData.setResult("error", postData.alertMessages("error"));
            }else if(response == "success"){
                postData.setResult("success", postData.alertMessages("success"));
            }else{

            }
            $scope.getEmpDetails();
            $scope.isDisable = true;
            $scope.showAddEmpDetails = false;
            $rootScope.cancelBtn = false;
            $rootScope.addBtn = true;
            $rootScope.showLoader = false;    
        });
    };

    $scope.deleteIndEmpDetails = function(id,index){
        var result = confirm("Are you sure you want to delete?");
        if (result) {
            //Logic to delete the item
            var data = {
                "id" : id,
                "index" : index
            }
            var deleteEmpDetailsDataParams = { "user": data, "tableName": "projecthistory", "type": "deleteEmpHistory" };
            var cat = postData.crud(deleteEmpDetailsDataParams);
            cat.then(function (response) {
                if(response == "deleted"){
                    postData.setResult("deleted", postData.alertMessages("deleted"));
                }else if(response == "error"){
                    postData.setResult("error", postData.alertMessages("error"));
                }else{

                }
            });
            
            $rootScope.showLoader = true;
            $scope.showAddEmpDetails = false;
            $rootScope.cancelBtn = false;
            $rootScope.addBtn = true;
            $scope.empSelectedDetailsData.splice(index, 1);
            $rootScope.showLoader = false;
        }
    };

    $scope.closeEmpDetails = function(){
        $("#addProjectDetailsPopup").modal({show: false, backdrop: "static", keyboard: false});
        $rootScope.showLoader = true;
        $scope.isDisable = true;
        $scope.showAddEmpDetails = false;
        $rootScope.cancelBtn = false;
        $rootScope.addBtn = true;
        $rootScope.showLoader = false;
    };

    $scope.cancelEmpDetails = function () {
        $rootScope.showLoader = true;
        $scope.isDisable = true;
        $scope.showAddEmpDetails = false;
        $rootScope.cancelBtn = false;
        $rootScope.addBtn = true;
        $rootScope.showLoader = false;
    };


    //ini getdetails
    $scope.getEmpDetails();
    //ctrls ends

    function formatDateToString(date){
        // 01, 02, 03, ... 29, 30, 31
        var dd = (date.getDate() < 10 ? '0' : '') + date.getDate();
        // 01, 02, 03, ... 10, 11, 12
        var MM = ((date.getMonth() + 1) < 10 ? '0' : '') + (date.getMonth() + 1);
        // 1970, 1971, ... 2015, 2016, ...
        var yyyy = date.getFullYear(); 

        return (yyyy + "-" + MM + "-" + dd);
     }

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
