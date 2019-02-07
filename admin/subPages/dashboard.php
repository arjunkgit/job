<div ng-controller="dashboard">
<style>
.jb-grid-tile {
	border:1px solid #d4d4d4;
	background-color: white;
}
</style>
<div class="row">
	<div class="col-md-6">
		<div class="panel panel-default">
		  <div class="panel-heading">Statistcs</div>
		  <div class="panel-body">
			 <ul class="list-group">
<?php 
		require_once ("../../db.php");
		//Queries
		$totalJobs = "SELECT * FROM `jobspost`";
		$totalEmp = "SELECT * FROM `employerregdata`";
		$totalSeek = "SELECT * FROM `candidateregdata`";
		
		//execute
		$totalJobsResult = mysqli_query($con, $totalJobs);		
		$totalEmpResult = mysqli_query($con, $totalEmp);		
		$totalSeeksResult = mysqli_query($con, $totalSeek);		
		
		
		//Show result
		echo '<li class="list-group-item">Number of Jobs Posted <span class="badge">'.mysqli_num_rows($totalJobsResult).'</span></li>';
		echo '<li class="list-group-item">Number of Employer <span class="badge">'.mysqli_num_rows($totalEmpResult).'</span></li>';
		echo '<li class="list-group-item">Number of  Job Seekers <span class="badge">'.mysqli_num_rows($totalSeeksResult).'</span></li>';
		mysqli_close($con);
?>			 
			</ul> 
		  </div>
		</div>	
	</div>	
	<div class="col-md-6">
		<div class="panel panel-default">
		  <div class="panel-heading">Panel Heading</div>
		  <div class="panel-body">Panel Content</div>
		</div>	
	</div>	
</div>

<!-- ctrl ends down-->
</div>


