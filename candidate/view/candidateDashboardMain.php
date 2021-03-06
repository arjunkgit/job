<!-- 
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ng-table/0.8.3/ng-table.min.css" />
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-route.js"></script> 
-->

<link rel="stylesheet" href="css/angular-material.min.css">
<link rel="stylesheet" href="css/ng-table.min.css" />
<script src="js/angular1.5.5.min.js"></script>
<script src="js/angular-route.js"></script> 
<style>
.btn-default.disabled.focus, .btn-default.disabled:focus, .btn-default.disabled:hover, .btn-default[disabled].focus, .btn-default[disabled]:focus, .btn-default[disabled]:hover, fieldset[disabled] .btn-default.focus, fieldset[disabled] .btn-default:focus, fieldset[disabled] .btn-default:hover{	
	background-color: #6aabd5 !important;
} 	

.list-group-items{
    margin-bottom: -1px;
    background-color: #fff;
}
.list-group-item{
    border: 1px solid #dedede !important;
    margin-bottom: 10px !important;
}
.list-group-projects{
	border-top: 1px solid #d8d8d8;
	margin-bottom: 15px;
	padding-top: 15px;
	border-bottom: 1px solid #d8d8d8;
	padding-bottom: 15px;	
}
.projectAdd{	
margin-bottom: 15px;
padding-bottom: 15px;	
}
.projectAddLabel{
	
	margin-top: 10px;
}

/*custom style*/


.bg-shadow{
	border: 1px solid lightgray;
background: white;
box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.3);
}

.panel-default > .panel-heading {
    color: #00aab1;
    background-color: #f9f9f9;
    border-color: #ddd;
    font-size: 14px;
    font-weight: 600;
}
.panel-group {
    margin-bottom: 20px;
    background: white;
    box-shadow: 0 1px 4px 0 rgba(0,0,0,0.1), 0 1px 8px 0 rgba(0,0,0,0.12);
}

 #openPopup {
     display: none;
 }
.empDetailsTable {
    table-layout: fixed;
    word-wrap: break-word;
}

.empDetailsTable th, .empDetailsTable td {
    overflow: hidden;
    font-size: 16px !important;
    color: #00569c !important;
}
.modal-header, h4, .close{
    background: #228f86 !important;
}
.empListCol1{
    color: #797979 !important;
    font-size: 12px;
    font-weight: bold;

}
.empListCol2{
    color: #5c5c5c !important;
}
.empListRow{

padding-bottom: 2px;

padding-top: 2px;

font-size: 14px;
}
.fullProfileViewLimits{
    min-height: 80px;
    overflow: hidden;
    margin-bottom: 20px;

    max-height: 400px;
}
.modal-footer{
    padding:5px;
}
</style>

<div class="container" ng-app="candidateAppModule" ng-controller="candidateCtrl">

<div class="dialog-background" ng-show="showLoader">
    <div class="dialog-loading-wrapper">
        <md-progress-circular class="dialog-loading-icon"  md-diameter="55px"></md-progress-circular>
	</div>
</div>
<!--ng-click="selectDivs(3)"-->
	<div class="row">
		<div class="col-md-3 sidebar">
          <ul class="nav nav-sidebar bg-shadow vqBox">
            <li><a href="#/">Full Profile View</a></li>
            <li><a href="#profileEdit" >Profile Overview</a></li>
            <li><a href="#profileSummary" >Profile Summary</a></li>
            <li><a href="#empDetails">Employement Details</a></li>
            <li><a href="#projectDetails" >Project Details</a></li>
            <li><a href="#uploadResume">Upload Resume</a></li>
            <li><a href="#accountSettings" >Account Settings</a></li>
          </ul>
		</div>

		<div class="col-md-9">			
			 <div class="ng-view"></div> 
		</div>
	</div>
</div>

 
  <!-- Angular Material requires Angular.js Libraries -->
  <!-- 
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-animate.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-aria.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-messages.min.js"></script>
 -->
  <script src="js/angular-animate.min.js"></script>
  <script src="js/angular-aria.min.js"></script>
  <script src="js/angular-messages.min.js"></script>
  <!-- Angular Material Library -->
  <!-- 
  <script src="https://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/ng-table/0.8.3/ng-table.min.js"></script>  
  -->
  <script src="js/angular-material.min.js"></script>
  <script src="js/ng-table.min.js"></script> 
 
 <!-- Main Ctrls -->
 <script src="candidate/ctrls/candidateDashboardCtrl.js"></script>

 <!-- all services -->
 <script src="candidate/services/postDataService.js"></script>

<script>
        var alertBox = {
            openPopup : $("#openPopup"),
            popTitle : $("#openPopup .modal-dialog .modal-content .modal-header .modal-title"),
            popBody : $("#openPopup .modal-dialog .modal-content .modal-body"),
            popClose : $("#openPopup .modal-dialog .modal-content .modal-header .close"),

            contentIdShow : function(id){
                $(alertBox.openPopup).modal({backdrop : "static"});
                $("#" + id + "").show();
                $(alertBox.popBody).html($("#" + id + "").html());
            },
            contentTitle : function(title){
                $(alertBox.popTitle).text(title);
            },
            contentHide : function(id){                
                $("#" + id + "").hide();
            }            
        };
        // $(alertBox.openPopup).modal();
        // $(alertBox.popTitle).text("Heading");
        // $(alertBox.popBody).html("<p>asdf</p>");
        // $(alertBox.close).on("click", function(){
        //     console.log("closed now");
        // });
</script>
 <!-- All Ctrls -->
 <script src="candidate/ctrls/profileEditCtrl.js"></script>
 <script src="candidate/ctrls/profileViewCtrl.js"></script>
 <script src="candidate/ctrls/profileSummaryCtrl.js"></script>
 <script src="candidate/ctrls/empDetailsCtrl.js"></script>
 <script src="candidate/ctrls/projectDetailsCtrl.js"></script>
 <script src="candidate/ctrls/uploadResumeCtrl.js"></script>
 <script src="candidate/ctrls/accountSettingsCtrl.js"></script>
 <script src="candidate/ctrls/fullProfileViewCtrl.js"></script> 

