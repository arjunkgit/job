
<link rel="stylesheet" href="css/angular-material.min.css">
<link rel="stylesheet" href="css/ng-table.min.css" />
<script src="js/angular1.5.5.min.js"></script>
<script src="js/angular-route.js"></script> 
<!--
<link rel="stylesheet" href="css/angular-material.min.css">
<link rel="stylesheet" href="css/ng-table.min.css" />
<script src="js/angular1.5.5.min.js"></script>
<script src="js/angular-route.js"></script> 

<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ng-table/0.8.3/ng-table.min.css" />
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular.min.js"></script>

-->
<style>
.btn-default.disabled.focus,
.btn-default.disabled:focus,
.btn-default.disabled:hover,
.btn-default[disabled].focus,
.btn-default[disabled]:focus,
.btn-default[disabled]:hover,
fieldset[disabled] .btn-default.focus,
fieldset[disabled] .btn-default:focus,
fieldset[disabled] .btn-default:hover {
    background-color: #6aabd5 !important;
}
.table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td{
text-align: center !important;
color: #545454;
}
.ShowAsLink{
    padding: 5px;
    cursor: pointer;
    background: #247177;
    color: white;
}
.ShowAsLink:hover{
    color: #99ffe8;
}
.EDResumeHeading{
    font-size: 18px;
    padding: 10px;
    color: black;
    text-align: center;
    border-bottom: 1px solid #d4d4d4;
}
.panel-default>.panel-heading {
    color: #fff;
    background-color: #0e5b62;
    border-color: #ddd;
    font-size: 14px;
    font-weight: bold;
}
.btn-group-sm>.btn, .btn-sm {
    padding: 5px 10px;
    font-size: 12px;
    line-height: 1.5;
    border-radius: 3px;
    margin-left: 3px;
    margin-right: 3px;
}
</style>
<div class="container" id="mainCtrlEmpDashboard" ng-app="myApp" ng-controller="myCtrl">
    <div id="ResultData" class="alert  alert-dismissable">
        <span class=""></span>
        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
        <span id="ResultMessage"></span>
    </div>
    <div class="dialog-background" ng-show="showLoader">
        <div class="dialog-loading-wrapper">
            <md-progress-circular class="dialog-loading-icon" md-diameter="55px"></md-progress-circular>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <ul class="nav nav-sidebar vqBox">
                <li><a href="#" ng-click="selectDivs(0)">Post New Job</a></li>
                <li><a href="#" ng-click="selectDivs(1)">View Posted Jobs</a></li>
                <li><a href="#" ng-click="selectDivs(2)">Profile Edit</a></li>
                <li><a href="#" ng-click="selectDivs(3)">Add Users</a></li>
                <li><a href="#" ng-click="selectDivs(4)">Manage Users</a></li>
                <li><a href="#" ng-click="selectDivs(7)">Search Candidate</a></li>
            </ul>
        </div>
        <div class="col-md-9">
            <div class="panel-group">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <span ng-show="!editMode">Post New Job</span>
                        <span ng-show="editMode">Edit Job</span>
                    </div>
                    <div class="panel-body">
                        <form novalidate name="userForm">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Job Name</label>
                                <input required ngFocus="true" data-ng-minlength="3" required type="text" class="form-control"
                                    id="jobName" name="jobName" placeholder="Name" data-ng-model='tempUser.jobName'>
                                <span class="help-block error" data-ng-show="userForm.jobName.$invalid && userForm.jobName.$dirty">
                                    {{getError(userForm.jobName.$error, 'jobName')}}
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Job Description</label>
                                <textarea class="form-control" id="jobDesc" name="jobDesc" rows="5" placeholder="Job Description"
                                    data-ng-model='tempUser.jobDesc'></textarea>
                                <span class="help-block error" data-ng-show="userForm.jobDesc.$invalid && userForm.jobDesc.$dirty">
                                    {{getError(userForm.jobDesc.$error, 'jobDesc')}}
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Max Salary</label>
                                <input type="text" class="form-control" id="maxSalary" name="maxSalary" placeholder="Max Salary"
                                    data-ng-model='tempUser.maxSalary'>
                                <span class="help-block error" data-ng-show="userForm.maxSalary.$invalid && userForm.maxSalary.$dirty">
                                    {{getError(userForm.maxSalary.$error, 'maxSalary')}}
                                </span> 
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Experiance</label>
                                <select  id="jobExp" name="jobExp" class="form-control form-fixer"  data-ng-model='tempUser.jobExp' ng-init="tempUser.jobExp='NA'">
                                    <option value="NA">Select experiance</option>
                                    <option value="Fresher">Fresher</option>
                                    <option value="0 - 1 Years">0 - 1 Years</option>
                                    <option value="1 - 2 Years">1 - 2 Years</option>
                                    <option value="2 - 3 Years">2 - 3 Years</option>
                                    <option value="3 - 4 Years">3 - 4 Years</option>
                                    <option value="4 - 5 Years">4 - 5 Years</option>
                                    <option value="5 - 6 Years">5 - 6 Years</option>
                                    <option value="6 - 7 Years">6 - 7 Years</option>
                                    <option value="7 - 8 Years">7 - 8 Years</option>
                                    <option value="8 - 9 Years">8 - 9 Years</option>
                                    <option value="9 - 10 Years">9 - 10 Years</option>
                                    <option value="10 + Years">10 + Years</option>                                    
                                </select>
                                <span class="help-block error" data-ng-show="userForm.jobExp.$invalid && userForm.jobExp.$dirty">
                                    {{getError(userForm.jobExp.$error, 'jobExp')}}
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Job Qualification</label>
                                <select  id="qua" name="qua" class="form-control form-fixer"  data-ng-model='tempUser.qua' ng-init="tempUser.qua='NA'">
                                    <option value="NA">Select your qualification</option>
                                    <option value="10th">10th</option>
                                    <option value="12th">12th</option>
                                    <option value="Diploma">Diploma</option>
                                    <option value="B.A">B.A</option>
                                    <option value="BCA">BCA</option>
                                    <option value="B.Com">B.Com</option>
                                    <option value="B.Sc">B.Sc</option>
                                    <option value="BE">BE</option>
                                    <option value="Other Graduation">Other Graduation</option>
                                    <option value="M.A">M.A</option>
                                    <option value="M.Com">M.Com</option>
                                    <option value="M.Sc">M.Sc</option>
                                    <option value="MCA">MCA</option>
                                    <option value="Other Post Graduation">Other Post Graduation</option>
                                </select>
                                <span class="help-block error" data-ng-show="userForm.qua.$invalid && userForm.qua.$dirty">
                                    {{getError(userForm.qua.$error, 'qua')}}
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">City </label>
                                <input type="text" class="form-control" id="city" name="city" placeholder="City"
                                    data-ng-model='tempUser.city'>
                                <span class="help-block error" data-ng-show="userForm.city.$invalid && userForm.city.$dirty">
                                    {{getError(userForm.city.$error, 'city')}}
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">State </label>
                                <input type="text" class="form-control" id="state" name="state" placeholder="state"
                                    data-ng-model='tempUser.state'>
                                <span class="help-block error" data-ng-show="userForm.state.$invalid && userForm.state.$dirty">
                                    {{getError(userForm.state.$error, 'state')}}
                                </span>
                            </div>
                            <!-- <input type="hidden" data-ng-model='tempUser.id'>  -->
                            <div class="text-center">
                                <button ng-disabled="userForm.$invalid" data-loading-text="Saving User..." ng-hide="editMode"
                                    type="{{editMode == true ? 'button' : 'submit'}}" class="btn btn-save"
                                    data-ng-click="addUser()">Save Job</button>
                                <button ng-disabled="userForm.$invalid" data-loading-text="Updating User..." ng-hide="!editMode"
                                    type="{{!editMode == true ? 'button' : 'submit'}}" class="btn btn-save"
                                    data-ng-click="updateUser()">Update
                                    Job</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>

            <!--

                <td data-title="'Job Id'" filter="{jobID: 'number'}" filter-data="jobID" sortable="'jobID'">
                    {{ row.jobID }}</td>
                <td data-title="'Description'" filter="{jobDesc: 'text'}" sortable="'jobDesc'">
                    {{ row.jobDesc }}</td>

                <td data-title="'State'" filter="{state: 'text'}" sortable="'state'">
                    {{ row.state }}</td>

                <td data-title="'Min Sal'" filter="{minSalary: 'number'}" sortable="'minSalary'">
                    {{ row.minSalary }}</td>
                <td data-title="'Max Sal'" filter="{maxSalary: 'number'}" sortable="'maxSalary'">
                    {{ row.maxSalary }}</td>

-->

            <!-- selectdiv5-->
            <div class="panel-group">
                <div class="panel panel-default">
                    <div class="panel-heading">View Jobs</div>
                    <div class="panel-body">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 animated fadeInUp">
                            <div class="table-responsive">
                                <table ng-table="tableParams" show-filter="true" class="table table-condensed table-bordered table-striped">
                                    <tbody>
                                        <tr ng-repeat="row in $data track by $index">
                                            <td data-title="'Job Name'" filter="{jobName: 'text'}" filter-data="jobName"
                                                sortable="'jobName'">
                                                {{ row.jobName }}</td>
                                            <td data-title="'Experiance'" filter="{jobExp: 'text'}" sortable="'jobExp'">
                                                {{ row.jobExp }}</td>
                                            <td data-title="'Qualification'" filter="{qua: 'text'}" sortable="'qua'">
                                                {{ row.qua }}</td>
                                            <td data-title="'City'" filter="{city: 'text'}" sortable="'city'">
                                                {{ row.city }}</td>
                                            <td data-title="'candidates Applied'" filter="{candidateApplied: 'text'}"
                                                sortable="'candidateApplied'">
                                                <a ng-click="selectDivs(5,row.jobID)" class="btn btn-info btn-sm ShowAsLink">{{
                                                    row.candidateApplied }}</a>
                                            </td>
                                            <td data-title="'Action'" style="display: inline-flex;">
                                                <button class="btn btn-info btn-sm" data-ng-click="editUser(row)" style="cursor: pointer;">
                                                    <span class="glyphicon glyphicon-edit"></span>
                                                </button>
                                                <button class="btn btn-info btn-sm" data-ng-click="deleteUser(row)"
                                                    style="cursor: pointer;">
                                                    <span class="glyphicon glyphicon-remove"></span>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-group">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <span>View/Edit Profile</span>
                        <div style="float: right;margin-top: -5px;">
                            <button type="button" ng-disabled="!isEdit" class="btn btn-default btn-sm" ng-click="isEditable()">
                                <span class="glyphicon glyphicon-edit"></span>Edit
                            </button>
                            <button type="button" ng-disabled="isEdit" class="btn btn-default btn-sm" ng-click="editCancel()">
                                <span class="glyphicon glyphicon-floppy-remove"></span>Cancel
                            </button>

                        </div>
                    </div>
                    <div class="panel-body">
                        <md-content layout-padding>
                            <form name="projectForm">
                                <md-input-container class="md-block">
                                    <label>Email</label>
                                    <input md-maxlength="30" required md-no-asterisk name="name" ng-disabled="true"
                                        ng-model="profile[0].email">
                                </md-input-container>
                                <md-input-container class="md-block">
                                    <label>Company Name</label>
                                    <input md-maxlength="50" required md-no-asterisk name="companyname" ng-disabled="isEdit"
                                        ng-model="profile[0].companyname">
                                    <div ng-messages="projectForm.companyname.$error">
                                        <div ng-message="required">This is required.</div>
                                        <div ng-message="md-maxlength">The company name must be less than 30 characters
                                            long.</div>
                                    </div>
                                </md-input-container>
                                <div layout="row">
                                    <md-input-container flex="50">
                                        <label>Industry Type</label>
                                        <md-select ng-disabled="isEdit" name="type" ng-model="profile[0].indtype">
                                            <md-option value="Application">Application</md-option>
                                            <md-option value="Support">Support</md-option>
                                            <md-option value="BPO">BPO</md-option>
                                            <md-option value="Software">Software</md-option>
                                        </md-select>
                                    </md-input-container>
                                    <md-input-container flex="50">
                                        <label>Company or Consultant</label>
                                        <md-select name="type" ng-disabled="isEdit" ng-model="profile[0].companyorconsult">
                                            <md-option value="Company">Company</md-option>
                                            <md-option value="Consultant">Consultant</md-option>
                                        </md-select>
                                    </md-input-container>
                                </div>
                                <div layout="row">
                                    <md-input-container flex="50">
                                        <label>Contact Person Name Type</label>
                                        <input name="contactpername" ng-disabled="isEdit" ng-model="profile[0].contactpername">
                                    </md-input-container>

                                    <md-input-container flex="50">
                                        <label>designation</label>
                                        <input name="designation" ng-disabled="isEdit" ng-model="profile[0].designation">
                                    </md-input-container>
                                </div>
                                <div layout="row">
                                    <md-input-container flex="50">
                                        <label>Mobile</label>
                                        <input name="mobile" ng-disabled="isEdit" ng-model="profile[0].mobile">
                                    </md-input-container>

                                    <md-input-container flex="50">
                                        <label>Pincode</label>
                                        <input name="pincode" ng-disabled="isEdit" ng-model="profile[0].pincode">
                                    </md-input-container>
                                </div>
                                <md-input-container class="md-block">
                                    <label>Office Address</label>
                                    <input name="officeaddress" ng-disabled="isEdit" ng-model="profile[0].officeaddress">
                                </md-input-container>
                                <div class="text-center">
                                    <button ng-disabled="!projectForm.$dirty" data-loading-text="Updating User..."
                                        ng-disabled="true" type="submit" class="btn btn-save" data-ng-click="updateProfile(profile[0])">Update
                                        Profile</button>
                                </div>
                            </form>
                        </md-content>
                    </div>
                </div>
            </div>

            <div class="panel-group">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <span ng-show="!editUserMode">Add New User</span>
                        <span ng-show="editUserMode">Edit/Delete User</span>
                    </div>
                    <div class="panel-body">
                        <form novalidate name="userFormData">
                            <div class="form-group" ng-show="editUserMode">
                                <label>User ID</label>
                                <input type="text" class="form-control" ng-disabled="true" id="userId" name="userId"
                                    data-ng-model='tempUserData.userId'>
                            </div>
                            <div class="form-group">
                                <label>User Name</label>
                                <input required ngFocus="true" data-ng-minlength="3" required type="text" class="form-control"
                                    id="userName" name="userName" placeholder="Enter User Name" data-ng-model='tempUserData.userName'>
                                <span class="help-block error" data-ng-show="userFormData.userName.$invalid && userFormData.userName.$dirty">
                                    {{getError(userFormData.userName.$error, 'userName')}}
                                </span>
                            </div>
                            <div class="form-group">
                                <label>User Email Id</label>
                                <input required ngFocus="true" data-ng-minlength="3" required type="text" class="form-control"
                                    id="userEmail" name="userEmail" placeholder="Enter User Email Id" data-ng-model='tempUserData.userEmail'>
                                <span class="help-block error" data-ng-show="userFormData.userEmail.$invalid && userFormData.userEmail.$dirty">
                                    {{getError(userFormData.userEmail.$error, 'userEmail')}}
                                </span>
                            </div>
                            <div class="form-group">
                                <label>User Pasword</label>
                                <input required ngFocus="true" data-ng-minlength="3" required type="text" class="form-control"
                                    id="userPass" name="userPass" placeholder="Enter User Password" data-ng-model='tempUserData.userPass'>
                                <span class="help-block error" data-ng-show="userFormData.userPass.$invalid && userFormData.userPass.$dirty">
                                    {{getError(userFormData.userPass.$error, 'userPass')}}
                                </span>
                            </div>
                            <!-- <input type="hidden" data-ng-model='tempUser.id'>  -->
                            <div class="text-center">
                                <button ng-disabled="userFormData.$invalid" data-loading-text="Saving User..." ng-hide="editUserMode"
                                    type="submit" class="btn btn-save" data-ng-click="addUserData()">Save User</button>
                                <button ng-disabled="userFormData.$invalid" data-loading-text="Updating User..."
                                    ng-hide="!editUserMode" type="submit" class="btn btn-save" data-ng-click="updateUserData()">Update
                                    USer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="panel-group">
                <div class="panel panel-default">
                    <div class="panel-heading">Manage Users</div>
                    <div class="panel-body">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 animated fadeInUp">
                            <div class="table-responsive">
                                <table ng-table="tableParamsData" show-filter="false" class="table table-condensed table-bordered table-striped">
                                    <tbody>
                                        <tr ng-repeat="row in $data track by $index">
                                            <td data-title="'User Name'">
                                                {{ row.fname }}</td>
                                            <td data-title="'Email'">
                                                {{ row.email }}</td>
                                            <td data-title="'Total Exp'">
                                                {{ row.totalExp }}</td>
                                            <td data-title="'Mobile'">
                                                {{ row.mobile }}</td>
                                            <td data-title="'Action'">
                                                <button class="btn btn-info btn-sm" data-ng-click="deleteUserName(row)"
                                                    style="cursor: pointer;">
                                                    <span class="glyphicon glyphicon-remove"></span>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel-group">
                <div class="panel panel-default">
                    <div class="">
                    <button class="btn btn-info btn-sm" data-ng-click="selectDivs(1)" style="cursor: pointer;">
                        <span class="glyphicon glyphicon-chevron-left">Go Back</span>
                    </button>                        
                    </div>
                    <div class="panel-heading">Candidates Applied</div>
                    <div class="panel-body">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 animated fadeInUp">
                            <div class="table-responsive">
                                <table ng-table="tableParams" show-filter="true" class="table table-condensed table-bordered table-striped">
                                    <tbody>
                                        <tr ng-repeat="row in $data track by $index">
                                            <td data-title="'Job ID'" filter="{jobPostId: 'text'}" filter-data="jobPostId"
                                                sortable="'jobPostId'">
                                                {{ row.jobsPostId }}</td>
                                            <td data-title="'Job Posted By'" filter="{jobsPostedBy: 'text'}" sortable="'jobsPostedBy'">
                                                {{ row.jobsPostedBy }}</td>
                                            <td data-title="'Candidate User ID'" filter="{userEmail: 'text'}" sortable="'candidateName'">
                                                {{ row.userEmail }}</td>
                                            <td data-title="'View Full Profile'">
                                                <button class="btn btn-info btn-sm" data-ng-click="selectDivs(6,row.userEmail)" style="cursor: pointer;">
                                                    <span class="glyphicon glyphicon-edit"></span>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<!-- panel 6 -->
            <div class="panel-group">
                <div class="panel panel-default">
                <!-- <div class="">
                    <button class="btn btn-info btn-sm" data-ng-click="selectDivs(5)" style="cursor: pointer;">
                        <span class="glyphicon glyphicon-chevron-left">Go Back</span>
                    </button>                        
                </div> -->
                <div class="panel-heading">Candidate Full View</div>
                    <div class="panel-body">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 animated fadeInUp">
                            <div class="panel panel-default">
                                <div class="panel-heading">Profile Details</div>
                                <div class="panel-body">
                                    <h5 class="EDResumeHeading">{{fullUserData.ResumeHeading}}</h5>
                                    <!-- starts full view -->
                                    <div class="col-md-2 dashTitle">Name: </div>
                                    <div class="col-md-4 dashContent">
                                        <span class="profile_over_view">
                                        {{fullUserData.title}} {{fullUserData.fname}} {{fullUserData.lname}}</span>
                                    </div>
                                    <div class="col-md-2 dashTitle">Date of birth: </div>
                                    <div class="col-md-4 dashContent">
                                        <span class="profile_over_view">
                                            {{fullUserData.dob}}</span>
                                    </div>

                                    <div class="col-md-2 dashTitle">Address: </div>
                                    <div class="col-md-10 dashContent">
                                        <span class="profile_over_view">
                                        {{fullUserData.address1}}, 
                                        {{fullUserData.address2}},
                                        {{fullUserData.address3}},
                                        {{fullUserData.town}} - {{fullUserData.pincode}}
                                        {{fullUserData.country}}                                       
                                    </span>
                                    </div>
                                    <div class="col-md-2 dashTitle">Mobile : </div>
                                    <div class="col-md-3 dashContent">
                                        <span class="profile_over_view">
                                            {{fullUserData.mobile}}</span>
                                    </div>
                                    <div class="col-md-2 dashTitle">Gender: </div>
                                    <div class="col-md-1 dashContent">
                                        <span class="profile_over_view">
                                            {{fullUserData.gender}}</span>
                                    </div>
                                    <div class="col-md-2 dashTitle">Total Exp: </div>
                                    <div class="col-md-2 dashContent">
                                        <span class="profile_over_view">
                                            {{fullUserData.TotalExp}}</span>
                                    </div>

                                    <!-- Ends full view -->
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">Candidate Summary</div>
                                <div class="panel-body">
                                    <div class="col-md-12 dashContent">
                                        <span class="profile_over_view">
                                            {{fullUserData.summary}}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading">Employement History</div>
                                <div class="panel-body">
                                    <table class="table table-condensed table-bordered table-striped">
									 <tr> 
									   <th>Worked Company</th>
									   <th>Working in same Job ?</th>
									   <th>Worked Join Date</th>
									   <th>Worked End Date</th>
									   <th>Worked Month</th>
									   <th>Worked Year</th>
									   <th>History</th>
									 </tr>
                                        <tbody>
                                            <tr ng-repeat="emp in fullEmpHistory track by $index">
                                                <td>{{emp.workedCompany}}</td>
                                                <td>{{emp.workedCurrentJob == "true" ? "Yes" : "No"}}</td>
                                                <td>{{emp.workedJoinDate}}</td>                                                
                                                <td>{{emp.workedEndDate}}</td>                   
                                                <td>{{emp.workedMonth}}</td>                 
                                                <td>{{emp.workedYear}}</td> 
                                                <td>{{emp.emphistory}}</td>
                                                
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading">Project Details</div>
                                <div class="panel-body">
	                                <table class="table table-condensed table-bordered table-striped">
									 <tr>
									   <th>Client</th>
									   <th>Duration</th>
									   <th>Project Title</th>
									   <th>Project Details</th>
									 </tr>
	                                    <tbody>
	                                        <tr ng-repeat="pro in fullProjectHistory track by $index">
	                                            <td>{{pro.client}}</td>
	                                            <td>{{pro.duration}}</td>
	                                            <td>{{pro.projectTitle}}</td>                                                
	                                            <td>{{pro.projectDetails}}</td>                                                
	                                        </tr>
	                                    </tbody>
	                                </table>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">Resume</div>
                                <div class="panel-body">
                                    <div class="col-md-12 dashContent" ng-show="resumeAvailable">
                                        <span class="profile_over_view">
                                        	Download Candidate Resume  : <a href="{{fullUserData.resumeUploadURL}}">{{fullUserData.resumeUploadName}}</a>
                                        </span>
                                    </div>
                                    <div class="col-md-12 dashContent"  ng-show="!resumeAvailable">
                                        <span class="profile_over_view">
                                        No Resume Uploaded
                                        </span>
                                    </div>                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<!-- panel 7 -->
            <div class="panel-group">
                <div class="panel panel-default">
                    <div class="panel-heading">Search Candidate</div>
                    <div class="panel-body">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 animated fadeInUp">
                            <div class="row">
                                <div class="col-md-4">
                                <select  id="searchExp" name="jobExp" class="form-control" >
                                    <option value="NA">Select experiance</option>
                                    <option value="Fresher">Fresher</option>
                                    <option value="0 - 1 Years">0 - 1 Years</option>
                                    <option value="1 - 2 Years">1 - 2 Years</option>
                                    <option value="2 - 3 Years">2 - 3 Years</option>
                                    <option value="3 - 4 Years">3 - 4 Years</option>
                                    <option value="4 - 5 Years">4 - 5 Years</option>
                                    <option value="5 - 6 Years">5 - 6 Years</option>
                                    <option value="6 - 7 Years">6 - 7 Years</option>
                                    <option value="7 - 8 Years">7 - 8 Years</option>
                                    <option value="8 - 9 Years">8 - 9 Years</option>
                                    <option value="9 - 10 Years">9 - 10 Years</option>
                                    <option value="10 + Years">10 + Years</option>                                    
                                </select>
                                </div>
                                <div class="col-md-4">
                                <select  id="searchQua" name="searchQua" class="form-control form-fixer">
                                    <option value="NA">Select your qualification</option>
                                    <option value="10th">10th</option>
                                    <option value="12th">12th</option>
                                    <option value="Diploma">Diploma</option>
                                    <option value="B.A">B.A</option>
                                    <option value="BCA">BCA</option>
                                    <option value="B.Com">B.Com</option>
                                    <option value="B.Sc">B.Sc</option>
                                    <option value="BE">BE</option>
                                    <option value="Other Graduation">Other Graduation</option>
                                    <option value="M.A">M.A</option>
                                    <option value="M.Com">M.Com</option>
                                    <option value="M.Sc">M.Sc</option>
                                    <option value="MCA">MCA</option>
                                    <option value="Other Post Graduation">Other Post Graduation</option>
                                </select>
                                </div>
                                <div class="col-md-2">
                                    <button id="searchCandidate" type="button" class="btn btn-primary">Search</button>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div>
                                    <div id="target-content"></div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

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


<script src="ctrls/empDash.js"></script>
<script>

// jQuery(document).ready(function() {
 
// // $.ajax({
//             url: "pagination.php?page=1",
//             type: 'GET',
//             async: true,
//             data:
//             {
//                 page : 1
//             },
//             beforeSend: function () {
                
//             },
//             complete: function (data) {
//                 $("#target-content").html(data.responseText);
//             }
//         });
// });
</script>
<script>

    jQuery(document).ready(function() {
    jQuery("#searchCandidate").on('click',function(e){
	e.preventDefault();
		jQuery("#target-content").html('loading...');
		jQuery("#pagination li").removeClass('active');
		jQuery(this).addClass('active');
        var searchExp = $("#searchExp").val();
        var searchQua = $("#searchQua").val();
        var encodedSearch = encodeURI("pagination.php?page=1&searchExp=" + searchExp + "&searchQua=" + searchQua );  
        jQuery("#target-content").load(encodedSearch);
        
    });
});
</script>
