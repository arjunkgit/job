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

<div ng-controller="valuesEmp" data-ng-init="init()">
<h3>Employer Limits</h3>
<br>
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
<div>

	<div class="col-md-12">
		<div class="panel panel-default">
			<table  ng-table="tableParams" show-filter="true" 
			class="table table-condensed table-bordered table-striped">
	        <tbody>
	          <tr ng-repeat="row in $data">
	                <td data-title="'Email Id'" filter="{email: 'text'}" 
	                	filter-data="email" sortable="'email'">
	                	{{ row.email }}</td>
	                <td data-title="'Create New Employer Limit'" filter="{createNewEmpLimit: 'text'}" 
	                	filter-data="createNewEmpLimit" sortable="'createNewEmpLimit'">
	                	{{ row.createNewEmpLimit }}</td>
	                <td data-title="'Jobs Post Limit'" filter="{jobsPostLimit: 'text'}" 
	                	filter-data="jobsPostLimit" sortable="'jobsPostLimit'">
	                	{{ row.jobsPostLimit }}</td>
					<td data-title="'Action'" > 
						<button class="btn btn-info btn-sm" data-ng-click="editEmpVal(row)" style="cursor: pointer;">
							<span class="glyphicon glyphicon-edit"></span> 
						</button>
					</td>    	        	
			  </tr>
	        </tbody>
			</table>	  
		</div>
	</div>

	<div class="col-md-12" ng-show="editEmpValue">
		<div class="panel panel-default">
		  <md-subheader class="md-no-sticky">Edit Employer Values</md-subheader>
			 <md-content layout-padding>
			    <div>
			      <form name="userForm">
			        <md-input-container class="md-block">
			          <label>Email</label>
			          <input type="email" name="email" ng-model="empDefVal.email" ng-disabled="true">
			        </md-input-container>
			        <md-input-container class="md-block">
			          <label>Create New Employer Limit</label>
			          <input name="createNewEmpLimit" ng-model="empDefVal.createNewEmpLimit ">
			        </md-input-container>
			        <md-input-container class="md-block">
			          <label>Jobs Post Limit</label>
			          <input name="jobsPostLimit" ng-model="empDefVal.jobsPostLimit ">
			        </md-input-container>
					<md-button ng-disabled="userForm.$invalid" data-loading-text="Updating Employer..." 
					 type="submit" class="md-primary" data-ng-click="updateEmpValues()">
					Update Employer values
					</md-button>
			      </form>
			    </div>
			 </md-content>
		</div>	
	</div>


	
</div>

</div>
