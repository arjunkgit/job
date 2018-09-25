<style>
.list-group-items{
padding: 10px 15px;
margin-bottom: -1px;
background-color: #fff;
border: 1px solid #ddd;	
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

body{
	background: #fefefe !important;
}
.bg-shadow{
	border: 1px solid lightgray;
background: white;
box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.3);
}

.panel-default > .panel-heading {
    color: white;
    background-color: #247177;
    border-color: #ddd;
}
.panel-group {
    margin-bottom: 20px;
    border: 1px solid lightgray;
    background: white;
    box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3);
}

 
</style>
<?php
require_once("db.php");
$email = $_SESSION['username'];
$sql = "SELECT * from candidateRegData where email='".$email."'";
$result = mysqli_query($con, $sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
//	 echo "id: " . $row["id"]. " - Name: " . $row["fname"]. " " . $row["lname"]. "<br>";
?>

<div id="ResultData"  class="alert  alert-dismissable">
	<span class=""></span> 
	<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
	<span id="ResultMessage"></span>
</div>
			  
<div class="container">
	<div class="row">
		<div class="col-md-3 sidebar">
          <ul class="nav nav-sidebar bg-shadow">
            <li><a href="#" onclick="fullProfileView()">Full Profile View</a></li>
<!--            <li><span style="border-bottom: 1px solid black; margin: 15px;">update Profile</span></li>            -->
            <li><a href="#" onclick="selectDivs(0)">Profile Overview</a></li>
            <li><a href="#" onclick="selectDivs(1)">Profile Summary</a></li>
            <li><a href="#" onclick="selectDivs(2)">Employement Details</a></li>
            <li><a href="#" onclick="selectDivs(3)">Project Details</a></li>
            <li><a href="#" onclick="selectDivs(4)">Upload Resume</a></li>
            <li><a href="#" onclick="selectDivs(5)">Account Settings</a></li>
          </ul>
		</div>

		<div class="col-md-9">			
		<div class="row" style="margin-bottom: 10px;">
			<div class="col-md-12">
				 <div class="btn-group pull-right">
					  <button type="button" id="profile_add" class="btn btn-primary padding-left-right">
					  <span class="glyphicon glyphicon-edit"></span>Add</button>
					  <button type="button" id="profile_edit" class="btn btn-primary padding-left-right">
					  <span class="glyphicon glyphicon-edit"></span>Edit</button>
					  <button type="button" id="profile_save" class="btn btn-primary padding-left-right">
					  <span class="glyphicon glyphicon-save"></span>Save</button>
					  <button type="button" id="profile_cancel" class="btn btn-primary padding-left-right">
					  <span class="glyphicon glyphicon-remove"></span>Cancel</button>
				</div> 				
			</div>
		</div>
		<div class="panel-group">
		    <div class="panel panel-default">
		      <div class="panel-heading">Profile Overview</div>
		      <div class="panel-body">
		      	<div class="col-md-2" style="font-size: 24px; font-weight: bold;">Name</div>
		      	<div class="col-md-5" style="font-size: 26px;">
		      	<span class="profile_over_text"><input type="text" class="form-control" name="fname"></span>
		      	<span class="profile_over_view"><?php echo $row["fname"] ?></span>
		      	</div>
				<div class="col-md-3">
					<img src="<?php echo $row["profilePhoto"] ?>" width="100px" height="140px">
				</div>
				<div class="col-md-2">
				<form action="uploadPhoto.php" method="post" enctype="multipart/form-data" style="float: right;">
				   <input type="file" name="fileToUpload" style="width: 90px;"  id="fileToUpload">
				   <button type="submit" name="photoUpload" class="btn btn-info">
				    <span class="glyphicon glyphicon-search"></span> Upload
				  </button>
				</form>
				</div>
				<div style="clear: both;"></div>
		      	<div class="col-md-3 dashTitle">Resume Heading</div>
		      	<div class="col-md-9 dashContent">
		      	<span class="profile_over_text"><input type="text" class="form-control" name="ResumeHeading"></span>
		      	<span class="profile_over_view"><?php echo $row["ResumeHeading"]; ?></span>		      		
		      	</div>

		      	<div class="col-md-3 dashTitle">Current Designation</div>
		      	<div class="col-md-3 dashContent">
		      	<span class="profile_over_text"><input type="text" class="form-control" name="CurrentDesignation"></span>
		      	<span class="profile_over_view"><?php echo $row["CurrentDesignation"] ?></span>		      				      	
		      	</div>

		      	<div class="col-md-3 dashTitle">Current Comapany</div>
		      	<div class="col-md-3 dashContent">
		      	<span class="profile_over_text"><input type="text" class="form-control" name="CurrentComapany"></span>
		      	<span class="profile_over_view"><?php echo $row["CurrentComapany"] ?></span>		      				      		      					</div>

		      	<div class="col-md-3 dashTitle">Total Experiance</div>
		      	<div class="col-md-3 dashContent">
		      	<span class="profile_over_text"><input type="text" class="form-control" name="TotalExp"></span>
		      	<span class="profile_over_view"><?php echo $row["TotalExp"] ?></span>		      				      			    			  	</div>

		      	<div class="col-md-3 dashTitle">LinkedIn URL</div>
		      	<div class="col-md-3 dashContent">
		      	<span class="profile_over_text"><input type="text" class="form-control" name="linked"></span>
		      	<span class="profile_over_view"><?php echo $row["linked"] ?></span>		      				      			    	      					</div>

		      	<div class="col-md-3 dashTitle">Mobile</div>
		      	<div class="col-md-3 dashContent">
		      	<span class="profile_over_text"><input type="text" class="form-control" name="mobile"></span>
		      	<span class="profile_over_view"><?php echo $row["mobile"] ?></span>		      				      			       			      	</div>

		      	<div class="col-md-3 dashTitle">Email</div>
		      	<div class="col-md-3 dashContent">
		      	<span class="profile_over_text"><input type="text" class="form-control" name="email"></span>
		      	<span class="profile_over_view"><?php echo $row["email"] ?></span>		      				      			    	      			      	</div>

		      	<div class="col-md-3 dashTitle">Pincode</div>
		      	<div class="col-md-3 dashContent">
		      	<span class="profile_over_text"><input type="text" class="form-control" name="pincode"></span>
		      	<span class="profile_over_view"><?php echo $row["pincode"] ?></span>		      				      			    	      		</div>

		      	<div class="col-md-3 dashTitle">Gender</div>
		      	<div class="col-md-3 dashContent">
		      	<span class="profile_over_select">
		      	<select class="form-control" name="gender" style="margin-top: 10px;">
		      		<option value="male">Male</option>
		      		<option value="female">female</option>
		      		<option value="other">other</option>
		      	</select>
				</span>
		      	<span class="profile_over_select_view"><?php echo $row["gender"] ?></span>		      				      			   	
		      	</div>
		      	
		      	<div class="col-md-3 dashTitle">DOB</div>
		      	<div class="col-md-3 dashContent">
		      	<span class="profile_over_text"><input style="margin-top: 10px; " type="date" class="form-control" name="month" ></span>
		      	<span class="profile_over_view">
		      	<?php 
			      	//$date = date_create($row["month"]);
					//echo date_format($date, 'Y-m-d');
					echo $row["month"];
			    ?>			    	
			    </span>
		      	</div>

		      	<div class="col-md-3 dashTitle">Address line 1</div>
		      	<div class="col-md-3 dashContent">
		      	<span class="profile_over_text"><input type="text" class="form-control" name="address1"></span>
		      	<span class="profile_over_view"><?php echo $row["address1"] ?></span>
		      	</div>

		      	<div class="col-md-3 dashTitle">Address line 2</div>
		      	<div class="col-md-3 dashContent">
		      	<span class="profile_over_text"><input type="text" class="form-control" name="address2"></span>
		      	<span class="profile_over_view"><?php echo $row["address2"] ?></span>
		      	</div>


		      	<div class="col-md-3 dashTitle">Address line 3</div>
		      	<div class="col-md-3 dashContent">
		      	<span class="profile_over_text"><input type="text" class="form-control" name="address3"></span>
		      	<span class="profile_over_view"><?php echo $row["address3"] ?></span>
		      	</div>

		      	<div class="col-md-3 dashTitle">Town</div>
		      	<div class="col-md-3 dashContent">
		      	<span class="profile_over_text"><input type="text" class="form-control" name="town"></span>
		      	<span class="profile_over_view"><?php echo $row["town"] ?></span>
		      	</div>

<!--
				<div style="clear: both"></div>
		      	<div class="col-md-2 dashTitle">Skills</div>
		      	<div class="col-md-10 dashContent">
		      	<span class="profile_over_text">
					<div id='TextBoxesGroup'>
						<div id="TextBoxDiv1">
					      <input type="text" class="form-control" name="address3" id="textbox1" value="" >
						</div>
					</div>		      				      		
						<input type='button' value='Add Skills' id='addButton'>
						<input type='button' value='Remove Skills' id='removeButton'>
						<input type='button' value='Get all skills' id='getButtonValue'>
		      	</span>
		      	<span class="profile_over_view"><?php echo $row["address3"] ?></span>
		      	</div>


-->

		      </div>		      
		    </div>
		</div>
		<div class="panel-group">
		    <div class="panel panel-default">
		      <div class="panel-heading">Profile Summary</div>
		      <div class="panel-body">
				<div class="dashContent">
		      	<span class="profile_over_text_sum"><textarea class="form-control" name="summary"></textarea></span>
		      	<span class="profile_over_view_sum"><?php echo $row["summary"] ?></span>
				</div>
			  </div>		
			</div>		
		</div>

		<div class="panel-group">
		    <div class="panel panel-default">
		      <div class="panel-heading">Employement Details		      </div>
		      <div class="panel-body">
				<div class="row" style="margin-bottom: 10px;">
					<div class="col-md-12">
						 <div class="btn-group pull-right">
							  <button type="button" id="emp_add" class="btn btn-primary padding-left-right">
							  <span class="glyphicon glyphicon-edit"></span><span id="isAddCancelEmp">Add</span>
						      </button> 
						  <button  id="emp_edit" class="btn btn-primary padding-left-right isEditEmpHistory" type="button">
						  	<span class="glyphicon glyphicon-edit"  id="isEditCancelEmp">Edit</span>
						  </button>							
						</div> 				
					</div>
				</div>		      		
				<div class="dashContent">
				<div id="showAddContents">
				<form action="funcs.php/addEmpHistory" method="post">
				  <div class="col-md-12">
					  <div class="form-group">
					    <label>Company Name:</label>
					    <input type="text" class="form-control" name="workedCompany">
					  </div>				  	
				  </div>
				  <div class="col-md-6">
					  <div class="form-group">
					    <label>Year:</label>
					    <select name="workedYear" class="form-control">
					    	<option value="0">Select Year</option>
					    	<option value="2008">2008</option>
					    	<option value="2009">2009</option>
					    	<option value="2010">2010</option>
					    	<option value="2011">2011</option>
					    	<option value="2012">2012</option>
					    	<option value="2013">2013</option>
					    	<option value="2014">2014</option>
					    	<option value="2015">2015</option>
					    	<option value="2016">2016</option>
					    	<option value="2017">2017</option>
					    	<option value="2018">2018</option>			
					    </select>
					  </div>
				  </div>
				  <div class="col-md-6">
					  <div class="form-group">
					    <label>Month:</label>
					    <select name="workedMonth" class="form-control">
					    	<option value="0">Select Month</option>
					    	<option value="January">January</option>
					    	<option value="February">February</option>
					    	<option value="March">March</option>
					    	<option value="April">April</option>
					    	<option value="May">May</option>
					    	<option value="June">June</option>
					    	<option value="July">July</option>
					    	<option value="August">August</option>
					    	<option value="September">September</option>
					    	<option value="October">October</option>
					    	<option value="November">November</option>			
					    	<option value="December">December</option>			
					    </select>
					  </div>				  	
				  </div>
				  <div class="col-md-6">
					  <div class="form-group">
					    <label>Joined Date:</label>
					    <input type="date" class="form-control" name="workedJoinDate">
					  </div>				  	
				  </div>
				  <div class="col-md-6">
					  <div class="form-group">
					    <label>Relieving Date:</label>
					    <input type="date" class="form-control" name="workedEndDate">
					  </div>				  	
				  </div>
				  <div class="col-md-6">
				    <label><input type="checkbox" name="workedCurrentJob">Is this current Job</label>
				  </div>
					<br/>
					<div class="form-group">
						<label>About Job:</label>
						<textarea id="empHistory" class="form-control" name="empHistory"></textarea>
					</div>
					<div class="form-group">
						<input class="btn btn-primary" type="submit" value="Save Data">			      				
					</div>
				</form>
		      	</div>
		      	<span>
		      		<?php 
					$empHistory = "SELECT * FROM `empHistory` WHERE `email`='$email'";
					$empResult = $con->query($empHistory);
					if ($empResult->num_rows > 0) {
					    // output data of each row
						?>
						 <ul class="list-group" id="groupEmp">
						<?php
					    while($empRow = $empResult->fetch_assoc()) {
						?>
						  <li class="list-group-item">
						  <div class="row">
						  	<div class="col-md-12">
							  <?php echo $empRow["workedCompany"]; ?>
						  	</div>
						  	<div class="col-md-6">
							  <?php echo $empRow["workedYear"]; ?>
						  	</div>
						  	<div class="col-md-6">
							  <?php echo $empRow["workedMonth"]; ?>
						  	</div>
						  	<div class="col-md-12">
							  <?php echo $empRow["workedJoinDate"]; ?>
						  	</div>
						  	<div class="col-md-12">
							  <?php echo $empRow["workedEndDate"]; ?>
						  	</div>
						  	<div class="col-md-12">
							  <?php echo $empRow["empHistory"]; ?>
						  	</div>
						  </div>
						<div style="text-align: right;">
						  <a class="btn btn-primary padding-left-right isDeleteHistory"
							   href='funcs.php/deleteEmpHistory/<?php echo $empRow['id'];?>' >
							  	<span class="glyphicon glyphicon-remove"></span>Delete
						  </a>
						</div>
						  <div style="text-align: right;">
							  <div class="editEmphistoryDiv" >
							  <form action="funcs.php/editEmpHistory"  method="post" >	
							<div class="row">
							  <div class="col-md-9">
						  <input type="text" class="form-control" name="empUpdateVal" value="<?php echo $empRow["empHistory"]; ?>" />
							  </div>					  
								<div class="col-md-3">
								  <button class="btn btn-primary" style="margin-top: 10px;" 
								  type="submit" name="editEmpHistorySubmit">
								  	<span class="glyphicon glyphicon-plus"></span> Update
								  </button>	
								</div>
								  <input hidden="" type="text" value="<?php echo $empRow["id"]; ?>" name="editEmpId" />
							</div>
							  </form>
							  </div>
						  </div>
						  </li>						
						<?php
					    }
					    ?>
					    </ul> 
					    <?php
					} else {
					    echo "0 Employment history found";
					}		      		
		      		?>
		      	</span>
				</div>
			  </div>		
			</div>		
		</div>

		<div class="panel-group">
		    <div class="panel panel-default">
		      <div class="panel-heading">Projects</div>
		      <div class="panel-body">
				<div class="row" style="margin-bottom: 10px;">
					<div class="col-md-12">
						 <div class="btn-group pull-right">
							  <button type="button" id="project_add" class="btn btn-primary padding-left-right">
							  <span class="glyphicon glyphicon-edit"></span><span id="isAddCancelProject">Add</span></button>
						</div> 				
					</div>
				</div>		      		
				<div class="row projectAdd">
				<div id="showAddContents2">
				<form action="funcs.php/addProjectHistory" method="post">
				  <div class="form-group">
				    <label class="control-label col-sm-2 projectAddLabel">Project Titile:</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" name="projectHistoryTitle" placeholder="Enter ">
				    </div>
				  </div>
				  <div class="form-group">
				    <label class="control-label col-sm-2 projectAddLabel">Project Client:</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" name="projectHistoryClient" placeholder="Enter ">
				    </div>
				  </div>
				  <div class="form-group">
				    <label class="control-label col-sm-2 projectAddLabel">Project Duration:</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" name="projectHistoryDuration" placeholder="Enter ">
				    </div>
				  </div>
				  <div class="form-group">
				    <label class="control-label col-sm-2 projectAddLabel">Project Details:</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" name="projectHistoryProjectDetails" placeholder="Enter ">
				    </div>
				  </div>
				  <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10"><br>
				      <button type="submit"  class="btn btn-primary">Submit</button>
				    </div>
				  </div>
				</form>
		      	</div>
				</div>
				<div id="groupProjects" class="">		      	 	
	      		<?php 
				$projectHistory = "SELECT * FROM `projectHistory` WHERE `email`='$email'";
				$projectResult = $con->query($projectHistory);
				$x = 1; 
				if ($projectResult->num_rows > 0) {
					while($projectRow = $projectResult->fetch_assoc()) {
						  ?>
						  <div class="row list-group-projects">
					      	<div class="col-md-12 dashTitle">
					      		<span style="font-size: 16px;font-weight: bold;color: #565656;"><?php echo $x; ?> ) </span>
								 <div class="btn-group pull-right">
								  <a class="btn btn-primary padding-left-right projectDeleteButton"
									   href='funcs.php/deleteProjectHistory/<?php echo $projectRow['id'];?>' >
									  	<span class="glyphicon glyphicon-remove"></span>Delete
								  </a>
								</div>
					      	</div>
					      	<div class="col-md-3 dashTitle">Project Titile</div>
					      	<div class="col-md-3 dashContent">
					      		<span class="profile_over_view">
					      		<?php echo $projectRow["projectTitle"] ?>			      			
					      		</span>		      				      			
					      	</div>
					      	<div class="col-md-3 dashTitle">Project Client</div>
					      	<div class="col-md-3 dashContent">
					      		<span class="profile_over_view">
					      		<?php echo $projectRow["client"] ?>
					      		</span>		      				      			       		
					      	</div>
					      	<div class="col-md-3 dashTitle">Project Duration</div>
					      	<div class="col-md-3 dashContent">
					      		<span class="profile_over_view">
					      		<?php echo $projectRow["duration"] ?>
					      		</span>		      				      			       		
					      	</div>
					      	<div class="col-md-3 dashTitle">Project Details</div>
					      	<div class="col-md-3 dashContent">
					      		<span class="profile_over_view">
					      		<?php echo $projectRow["projectDetails"] ?>
					      		</span>
					      	</div>
						  </div>
						  <?php
						$x++;
		      		}
				} else {
				    echo "No project history found";
				}		      		
				?>
				</div>				
			  </div>		
			</div>		
		</div>
		<div class="panel-group">
		    <div class="panel panel-default">
		      <div class="panel-heading">Upload Resume</div>
		      <div class="panel-body">
				<div class="col-md-6">
					<a href="<?php echo $row["resumeUploadURL"]; ?>"><?php echo $row["resumeUploadName"]; ?></a>
				</div>
				<div class="col-md-6">
				<form action="uploadResume.php" method="post" enctype="multipart/form-data" style="float: right;">
				   <input type="file" name="resumeFileToUpload" style="margin-bottom: 10px;"  id="resumeFileToUpload">
				   <button type="submit" name="resumeUpload" class="btn btn-info" style="width: 100%;">
				    <span class="glyphicon glyphicon-search"></span> Upload
				  </button>
				</form>
				</div>
			  </div>		
			</div>		
		</div>	
		<div class="panel-group">
		    <div class="panel panel-default">
				<!-- 0 = false ***  1 = true -->
		      <div class="panel-heading">Account Settings</div>
		      <div class="panel-body">
				<div class="dashContent">
				<?php 
				if($row["activatePro"] == 0){
				?>
				  <a href="funcs.php/activatePro" class="btn btn-default" onclick="return confirm('Are you sure?')">
					  	<span class="glyphicon glyphicon-add"></span>Activate Account
				  </a>
					<p>Note : Your profile will be visible to the employer.</p> <br/>
				<?php	
				}
				if($row["deactivatePro"] == 0){
				?>
				  <a href="funcs.php/deactivatePro" class="btn btn-default" onclick="return confirm('Are you sure?')">
					  	<span class="glyphicon glyphicon-remove"></span>Deactivate Account
				  </a>				
					<p>Note : Your profile will not be visible to the employer</p><br/>
				<?php					
				}
				if($row["deletePro"] == 0){
				?>
				  <a class="btn btn-default" href="funcs.php/deletePro" onclick="return confirm('Are you surely want to delete your account ?')">
					  	<span class="glyphicon glyphicon-remove"></span>Delete Account
				  </a>				
					<p>Note : Deleting your account would delete all your data and account information which cann't be retrieved back.</p>
				<?php					
				}
				?>
				</div>
			  </div>		
			</div>		
		</div>			
	</div>	
</div>
<?php
    }
} 
?>
</div>

<script type="text/javascript">

$(document).ready(function(){

    var counter = 2;

    $("#addButton").click(function () {

	if(counter>10){
            alert("Only 10 skills allowed");
            return false;
	}

	var newTextBoxDiv = $(document.createElement('div'))
	     .attr("id", 'TextBoxDiv' + counter);

	newTextBoxDiv.after().html('<label>Skill #'+ counter + ' : </label>' +
	      '<input type="text" class="form-control" name="address3' + counter +
	      '" id="textbox' + counter + '" value="" >');
							
	newTextBoxDiv.appendTo("#TextBoxesGroup");


	counter++;
     });

     $("#removeButton").click(function () {
	if(counter==1){
          alert("No more textbox to remove");
          return false;
       }

	counter--;

        $("#TextBoxDiv" + counter).remove();

     });

     $("#getButtonValue").click(function () {

	var msg = '';
	for(i=1; i<counter; i++){
	if(i < counter-1){
		   	  msg +=  $('#textbox' + i).val() + "*";
	}
	else{
		   	  msg +=  $('#textbox' + i).val() ;
	}
	}
    	  alert(msg);
     });
  });



function hideOrshow(){
	var totalDivs = $(".dashContent").length;
	for(i=0;i<totalDivs; i++){
		if($(".dashContent").eq(i).find(".profile_over_view").text() == "")
		{
			$(".dashContent").eq(i).prev().hide();
			$(".dashContent").eq(i).hide();			
		}
		else{
			$(".dashContent").eq(i).prev().show();
			$(".dashContent").eq(i).show();						
		}
	}

}

function showEdit(editableObj) {
	$(editableObj).css("background","yellow");
} 
function showAdd(){
	$("#profile_add").show();
	$("#profile_save").hide();
		
}
function hideAdd(){
	$("#profile_add").hide();	
	$("#profile_save").hide();
}
function showAddContents(){
	
}
function fullProfileView(){
	var totalDivs = $(".panel-group").length;
	var totalProjects = $("#groupProjects")[0].childElementCount;
	var totalEmps = $("#groupEmp")[0].childElementCount;

	var i = 0; 
	$(".projectDeleteButton").hide();
	$(".isEditEmpHistory").hide();
	$(".isDeleteHistory").hide();
	$("#profile_edit").parent().parent().parent().hide();
	$("#emp_add").hide();
	$("#project_add").hide();

//	$("#profile_add").parent().parent().parent().hide();

	for(i=0;i<totalDivs; i++){
		$(".panel-group").eq(i).show();
		currentDiv = 99;			
	}
	for(var m = 1; m <= totalProjects; m++){
		$("#groupProjects").children().eq(m).hide();
	}
	for(var n = 1; n <= totalEmps; n++){
		$("#groupEmp").children().eq(n).hide();
	}
	
}

function selectDivs(a){
	var totalDivs = $(".panel-group").length;
	var groupProjects = $("#groupProjects");
	var i = 0; 
	var totalProjects = $("#groupProjects")[0].childElementCount;
	var totalEmps = $("#groupEmp")[0].childElementCount;

	$("#profile_edit").parent().parent().parent().show();

	for(i=0;i<totalDivs; i++){
		if(i == a){
			$(".panel-group").eq(i).show();
			currentDiv = i;
			$("#profile_edit").show();
			if(i == 2 || i == 90){
			console.log("you are in " + i);				
				$("#profile_edit").hide();
				hideAdd();
				$(".projectDeleteButton").show();
				$(".isEditEmpHistory").show();
				$(".isDeleteHistory").show();
				$("#project_add").hide();
				$("#emp_add").show();
				
//				$("#emp_add").show();
				for(var n = 1; n <= totalEmps; n++){
					$("#groupEmp").children().eq(n).show();
				}

			}else
			if(i == 3 || i == 90){
			console.log("you are in " + i);				
				$(".projectDeleteButton").show();
				$("#profile_edit").hide();
				$("#project_add").show();
				$("#emp_add").hide();
				for(var m = 1; m <= totalProjects; m++){
					$("#groupProjects").children().eq(m).show();
				}												
			}else
			if(i == 4 || i == 90){
			console.log("you are in " + i);				
				$("#profile_edit").hide();
				$("#emp_add").hide();
				$("#profile_add").hide();
			}
			if(i == 5 || i == 90){
			console.log("you are in " + i);				
				$("#profile_edit").hide();
				$("#emp_add").hide();
				$("#profile_add").hide();
			}else{
			console.log("you are in " + i);				
				hideAdd();
			}
		}else		
		$(".panel-group").eq(i).hide();
	}	
}

$( document ).ready(function() {
	var currentDiv = 99;
	fullProfileView();

	$("#profile_save").hide();
	$(".profile_over_text").hide();
	$("#profile_cancel").hide();
	$(".profile_over_select").hide();
	$(".profile_over_text_sum").hide();
	$("#showAddContents").hide();
	$("#showAddContents2").hide();
	$(".editEmphistoryDiv").hide();
	$("#project_add").hide();
	

 $(".isEditEmpHistory").click(function(){
	$(".editEmphistoryDiv").toggle();
});

 $("#project_add").click(function(){
	 $("#isAddCancelProject").text(function(i, text){
          return text === "Add" ? "Cancel" : "Add";
      }) 	
	$("#showAddContents2").toggle();
});
 $("#emp_add").click(function(){
	 $("#isAddCancelEmp").text(function(i, text){
          return text === "Add" ? "Cancel" : "Add";
      }) 	
	$("#showAddContents").toggle();
});
 $("#emp_edit").click(function(){
	 $("#isEditCancelEmp").text(function(i, text){
          return text === "Edit" ? "Cancel" : "Edit";
      }) 	
});

 $("#profile_edit").click(function(){
 	$(".dashTitle").css("margin-top","15px");
	$("#profile_edit").hide();
	$(".profile_over_view").hide();
	$(".profile_over_select_view").hide();
	$(".profile_over_text").show();
	$(".profile_over_select").show();
	$("#profile_save").show();	
	$("#profile_cancel").show();
	$(".profile_over_view_sum").hide();
	$(".profile_over_text_sum").show();

	put_profile_input();
    });

 $("#profile_save").click(function(){
//	validation();
	$(".profile_over_view").show();
	$(".profile_over_select_view").show();
	$(".profile_over_text").hide();
	$(".profile_over_select").hide();
	$("#profile_save").hide();
	$("#profile_cancel").hide();
	$(".dashTitle").css("margin-top", "0px");
	$("#profile_edit").show();
	$(".profile_over_view_sum").show();
	$(".profile_over_text_sum").hide();

	profile_save_data();
	update_profile_view();

	if(1 == 1)
	{
	}
	else{
		
	}
    });
	$("#profile_add").click(function(){
		$("#showAddContents").show();
		$("#showAddContents2").show();
		$("#profile_save").hide();
		$("#profile_cancel").show();
		$("#profile_edit").hide();

	});
 $("#profile_cancel").click(function(){
	$(".profile_over_view").show();
	$(".profile_over_select_view").show();
	$(".profile_over_text").hide();
	$(".profile_over_select").hide();
	$("#profile_save").hide();
	$("#profile_cancel").hide();

	$(".dashTitle").css("margin-top", "0px");
	$(".profile_over_view_sum").show();
	$(".profile_over_text_sum").hide();
	$("#profile_edit").show();

	$("#showAddContents").hide();
	$("#showAddContents2").hide();

    });


});

function put_profile_input(){
	var elems = document.getElementsByClassName("profile_over_view");
	var arr = [];
	var select_elems = document.getElementsByClassName("profile_over_select_view");
	var arr_select = [];
	var textarea_elems = document.getElementsByClassName("profile_over_view_sum");
	var arr_textarea = [];
	for(var i = 0; i < elems.length; i++) {
	    arr.push(elems[i].innerHTML.trim());
	}

	$('span').find('input').each(function(index){
		var all_input_names = this.name;
		var all_input_val = $("input[name="+all_input_names+"]").val();
		$("input[name="+all_input_names+"]").val(arr[index]);		
	});
	for(var i = 0; i < select_elems.length; i++)	
	{
	    arr_select.push(select_elems[i].innerHTML);
	}

	$('span').find('select').each(function(index){
		var all_select_names = this.name;
		var all_select_val = $("select[name="+all_select_names+"]").val();		
		$("select[name="+all_select_names+"]").val(arr_select[index]);		
	});
	for(var i = 0; i < textarea_elems.length; i++) {
	    arr_textarea.push(textarea_elems[i].innerHTML);
	}

	$('span').find('textarea').each(function(index){
		var all_textarea_names = this.name;
		var all_textarea_val = $("textarea[name="+all_textarea_names+"]").val();
		
		$("textarea[name="+all_textarea_names+"]").val(arr_textarea[index]);		
	});



}

function validation(){
	var arr = [];	
	var arr_select = [];	
	var elems = document.getElementsByClassName("profile_over_view");
	var select_elems = document.getElementsByClassName("profile_over_select_view");
	$('span').find('input').each(function(index){
		var all_input_names = this.name;
		var all_input_val = $("input[name="+all_input_names+"]").val();
		arr.push(all_input_val);
		if(all_input_val=="")
		{
			setResult("error","Please fill all the fields");
			all_input_names.focus();
			return false;
		}
		else if(all_input_names == "mobile"){
			if(isNaN(all_input_val))
			{
				setResult("error", "PLease Enter a Number");
				all_input_names.focus();
				return false;
			}
		}
		else if(all_input_names == "pincode"){
			if(isNaN(all_input_val)){
				setResult("error", "Pincode should be in number");
				all_input_names.focus();
				return false;				
			}
		}

	});


}
function update_profile_view(){

	var arr = [];	
	var arr_select = [];	
	var arr_textarea = [];
	
	var elems = document.getElementsByClassName("profile_over_view");
	var select_elems = document.getElementsByClassName("profile_over_select_view");
	var textarea_elems = document.getElementsByClassName("profile_over_view_sum");	

	$('span').find('input').each(function(index){
		var all_input_names = this.name;
		var all_input_val = $("input[name="+all_input_names+"]").val();
		arr.push(all_input_val);
	});
	$('span').find('select').each(function(index){
		var all_select_names = this.name;
		var all_select_val = $("select[name="+all_select_names+"]").val();
		arr_select.push(all_select_val);
	});
	$('span').find('textarea').each(function(index){
		var all_textarea_names = this.name;
		var all_textarea_val = $("textarea[name="+all_textarea_names+"]").val();
		arr_textarea.push(all_textarea_val);
	});

	for(var i = 0; i < elems.length; i++) {
	    elems[i].innerText = arr[i];
	}
	for(var i = 0; i < select_elems.length; i++) {
	    select_elems[i].innerText = arr_select[i];
	}
	for(var i = 0; i < textarea_elems.length; i++) {
	    textarea_elems[i].innerText = arr_textarea[i];
	}


}

function profile_save_data(){
var currentPanelGroup = $('.col-md-9 .panel-group').eq(currentDiv);

$(currentPanelGroup).find('span').find('select').each(function(){
	var all_select_names = this.name;
	var all_select_val = $("select[name="+all_select_names+"]").val();

	$.ajax({ 
		url: "saveedit.php",
		type: "POST",
		data:'column='+all_select_names+'&editval='+all_select_val,
			//column = question & editval=q1kj & id=1
		success: function(data){
		//console.log(data);
			if(data == "success")
    		setResult("success", "Record updated Successfully");
	    	else
	    	setResult("error", "Error in processing data")

		}         
	});
});

$(currentPanelGroup).find('span').find('input').each(function(){
	var all_input_names = this.name;
	var all_input_val = $("input[name="+all_input_names+"]").val();
	$.ajax({ 
		url: "saveedit.php",
		type: "POST",
		data:'column='+all_input_names+'&editval='+all_input_val,
			//column = question & editval=q1kj & id=1
		success: function(data){
			if(data == "success")
    		setResult("success", "Record updated Successfully");
	    	else
	    	setResult("error", "Error in processing data")
		}         
   });	
});

$(currentPanelGroup).find('span').find('textarea').each(function(){
	var all_textarea_names = this.name;
	var all_textarea_val = $("textarea[name="+all_textarea_names+"]").val();

	$.ajax({ 
		url: "saveedit.php",
		type: "POST",
		data:'column='+all_textarea_names+'&editval='+all_textarea_val,
			//column = question & editval=q1kj & id=1
		success: function(data){
		//console.log(data);
			if(data == "success")
    		setResult("success", "Record updated Successfully");
	    	else
	    	setResult("error", "Error in processing data")

		}         
	});
});

}

function saveToDatabase(editableObj,column) {
	$.ajax({ 
		url: "saveedit.php",
		type: "POST",
		data:'column='+column+'&editval='+editableObj.innerHTML,
			//column = question & editval=q1kj & id=1
		success: function(data){
			if(data == "success")
    		setResult("success", "Record updated Successfully");
	    	else
	    	setResult("error", "Error in processing data")
		}         
   });
   $(editableObj).css("background","#FDFDFD");
}

function setResult(resultType, resultData){
    var resultType = resultType;
    var resultData = resultData;
    if(resultType == "success"){
    	$("#ResultData").css("display", "block");
        $("#ResultData").addClass("alert alert-success alert-dismissable fade in");
        $("#ResultMessage").text(resultData); 
        $("#ResultData span:first-child").addClass("glyphicon glyphicon-ok");   
        $("#ResultData").fadeTo(2000, 1).slideUp(500, function(){
			$("#ResultData").css("display", "none"); 
            $("#ResultMessage").text("");     
	});
    }else if(resultType == "error"){
    	$("#ResultData").css("display", "block");
        $("#ResultData").addClass("alert alert-danger alert-dismissable fade in");
        $("#ResultMessage").text(resultData); 
        $("#ResultData span:first-child").addClass("glyphicon glyphicon-hand-right");   
        $("#ResultData").fadeTo(2000, 1).slideUp(500, function(){	
        	$("#ResultData").css("display", "none"); 
            $("#ResultMessage").text(""); 
        });        
    }else { }
    return;
}

</script>
