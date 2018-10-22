var base_path = "subPages/searchResultsBackend.php";

searchResultsApp.service('postSearchData', function($http){

    this.alertMessages = function (messageType){
        var updateMessage = "Record has been updated successfully";
        var successMessage = "Record has been saved successfully";
        var errorMessage = "Error in processing the request";
        var deleteMessage = "Error in processing the request";
        var invalidMessage = "Invalid request";

        if(messageType == "success"){
            return successMessage;
        }else if(messageType == "error"){
            return errorMessage;
        }else if(messageType == "update"){
            return updateMessage;
        }else if(messageType == "deleted"){
            return deleteMessage;
        }else if(messageType == "invalid"){
            return invalidMessage;
        }else{
            return "";
        }       
    },
    this.getSearchData = function (paramsObj){
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
    
    this.setResult = function setResult(resultType, resultData){
        var resultType = resultType;
        var resultData = resultData;
        if(resultType == "success"){
            $("#ResultData").css("display", "block");
            $("#ResultData").addClass("alert alert-success alert-dismissable fade in");
            $("#ResultMessage").text(resultData); 
            $("#ResultData span:first-child").addClass("glyphicon glyphicon-ok");   
            $("#ResultData").fadeTo(2000, 1).slideUp(1000, function(){
                $("#ResultData").css("display", "none"); 
                $("#ResultMessage").text("");     
        });
        }else if(resultType == "error"){
            $("#ResultData").css("display", "block");
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
 
