var searchResultsApp = angular.module("searchResultsAppModule", ['ngMaterial', 'ngRoute', 'ngTable', 'ngMessages']);
searchResultsApp.controller("searchResultsCtrl", function($scope, $rootScope,postSearchData, $filter, $http,NgTableParams) {
    $scope.searchKey = $("#searchKey").text().trim();
    $scope.showLoader = false;
    $scope.searchResultsData = {

    };

    $scope.getSearchResults = function(){
        $rootScope.showLoader = true;
        var jobName = $scope.searchKey;
        var getSearchResultsData = { jobName,  "tableName": "jobsPost", "type": "getSearchData" };
        var cat2 = postSearchData.getSearchData(getSearchResultsData);
        cat2.then(function (response) {
            console.log(response);
            $scope.searchResultsData = response.data;
            $rootScope.showLoader = false;
        });
    };




//ini getdetails
if($scope.searchKey != undefined && $scope.searchKey != ""){
    $scope.getSearchResults();
}else{

}
//ctrls ends
});

searchResultsApp.filter('custom', function() {
  return function(input, search) {
    if (!input) return input;
    if (!search) return input;
    var expected = ('' + search).toLowerCase();
    var result = {};
    angular.forEach(input, function(value, key) {
      var actual = ('' + value).toLowerCase();
      if (actual.indexOf(expected) !== -1) {
        result[key] = value;
      }
    });
    return result;
  }
});

searchResultsApp.run(function ($rootScope) {
    $rootScope.$on('$routeChangeSuccess', function (e, current, pre) {
        globalCurrentPath = current.originalPath;
        if(current.originalPath == "/"){

        }else{

        }
        });
});

//ng config
searchResultsApp.config(function($routeProvider) {
    $routeProvider
    .when("/", { 
        templateUrl : "candidate/subPages/searchResults.php"
    })
    // .when("/profileEdit", {
    //     templateUrl : "candidate/subPages/profileEdit.html"
    // })
});


