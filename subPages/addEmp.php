<style>
#ResultData{
    display: none;
    position: fixed;
    z-index: 11;
    right: 0;
    top: 0;
}

.jb-grid-tile {
	border:1px solid #d4d4d4;
	background-color: white;
}
.dialog-background{
    background: none repeat scroll 0 0 rgba(155, 155, 155, 0.5);
    height: 100%;
    left: 0;
    margin: 0;
    padding: 0;
    position: fixed;
    top: 0;
    width: 100%;
    z-index: 100;
}
.dialog-loading-wrapper {
    background: none repeat scroll 0 0 rgba(0, 0, 0, 0);
    border: 0 none;
    height: 100px;
    left: 50%;
    margin-left: -50px;
    margin-top: -50px;
    position: fixed;
    top: 50%;
    width: 100px;
    z-index: 9999999;
}
.dialog-loading-icon {
    background-color: #FFFFFF !important;
    border-radius: 13px;
    display: block;
    height: 100px;
    line-height: 100px;
    margin: 0;
    padding: 1px;
    text-align: center;
    width: 100px;
}

</style>

<div ng-controller="addEmp" data-ng-init="init()">
<div id="ResultData"  class="alert  alert-dismissable">
	<span class=""></span> 
	<a href="" class="close" data-dismiss="alert" aria-label="close">*</a>
	<span id="ResultMessage"></span>
</div>
<div class="dialog-background" ng-show="showLoader">
    <div class="dialog-loading-wrapper">
        <md-progress-circular class="dialog-loading-icon"  md-diameter="55px"></md-progress-circular>
	</div>
</div>

<div class="col-md-12">
<div class="panel panel-default">
	  <md-subheader class="md-no-sticky">Add New Employer</md-subheader>
		 <md-content layout-padding>
		    <div>
		      <form name="userForm">
		        <md-input-container class="md-block">
		          <label>Email</label>
		          <input type="email" ng-required="true" placeholder="Email (required)" ng-model="empReg.email">
		        </md-input-container>
		        <md-input-container class="md-block">
		          <label>Password</label>
		          <input type="password" ng-required="true" placeholder="Password (required)" ng-model="empReg.password">
		        </md-input-container>
		        <md-input-container class="md-block">
		          <label>Company Name</label>
		          <input  ng-model="empReg.companyname">
		        </md-input-container>
		        <md-input-container class="md-block">
		          <label>Mobile</label>
		          <input  ng-model="empReg.mobile">
		        </md-input-container>
				<md-button ng-disabled="!empReg.email" ng-click="addEmp()" class="md-primary">
					Add Employer
				</md-button>
		      </form>
		    </div>
		 </md-content>
</div>	
</div>

</div>

