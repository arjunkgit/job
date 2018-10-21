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

<div ng-controller="manageEmp" data-ng-init="init2()">
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
