<?php
	session_start();
?>
<div ng-controller="searchResultsCtrl">
    <div id="ResultData" class="alert  alert-dismissable">
        <span class=""></span>
        <button type="button" class="closeBtn" data-dismiss="alert" aria-lable="close">×</button>
        <span id="ResultMessage"></span>
    </div>

    <div>
        <form class="jobSearch" action="searchPage.php">
            <input type="text" ng-model="searchKey" placeholder="Search.. EX: Software Engineer, Wipro, BE" name="search">
            <button type="submit">.</button>
        </form>
    </div>
    <br>
    <div ng-show="!searchKey" style="text-align: center;">
        Type and search your jobs
    </div>
    <div class="col-md-6" ng-repeat="jobs in searchResultsData" style="padding: 2px;">
        <div class="panel-group">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h5>
                        {{jobs.jobName}}
                    </h5>
                </div>
                <div class="panel-body" style="padding: 0px;">
                    <div class="jobID"></div>
                    <div class="current-location col-md-12 current-body-font">
                        <p>Description : {{jobs.jobDesc}}
                        </p>
                    </div>
                    <div class="current-role col-md-12 current-body-font">
                        <p>Experiance : {{jobs.jobExp}}
                        </p>
                    </div>
                    <div class="current-skill col-md-12 current-body-font">
                        <p>Qualification : {{jobs.qua}}
                        </p>
                    </div>
                    <div class="current-postedby col-md-12 current-body-font">
                        <p>Min Salary : {{jobs.minSalary}}
                        </p>
                    </div>
                    <div class="current-postedby col-md-12 current-body-font">
                        <p>Max Salary : {{jobs.maxSalary}}
                        </p>
                    </div>
<?php
if(isset($_SESSION["username"])){
?>
                    <div class="col-md-12">
                        <button type="button" class="btn btn-primary btn-sm btn-block jobApplyBtn">Apply</button>
                    </div>
<?php
}else{
?>
                    <div class="col-md-6">
                        <button type="button" class="btn btn-primary btn-sm btn-block" onClick="openModel()">Login</button>
                    </div>
                    <div class="col-md-6">
                        <button type="button" class="btn btn-primary btn-sm btn-block" onClick="openModel()">Register</button>
                    </div>
<?php
 }
?>

                    <br>
                </div>
            </div>

        </div>
    </div>


    <!-- ctrls div ends-->
</div>
<script>
    function openModel(){
        $("#myModal").modal();	
}

    $('.globalStyles input').keydown(function (e) {
        if (e.keyCode == 13) {
            var inputs = $(this).parents("form").eq(0).find(":input");
            if (inputs[inputs.index(this) + 1] != null) {
                inputs[inputs.index(this) + 1].focus();
            }
            e.preventDefault();
            return false;
        }
    });
</script>
