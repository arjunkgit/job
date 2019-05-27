<?php
	session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Current Openings | Job Portal</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="jobs" />
    <script type="application/x-javascript"> 
		addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } 
    </script>
    
	<?php include('headFiles.html'); ?>
    <style>
    	.jobID {
			display : none;	
			
		}
		.loginButtons {
			width: 50%;
			margin: 0 auto;
		}
		.action_btn {
			display: inline-block;
			width: calc(50% - 4px);
			margin: 0 auto;
		}
		
.jobSearch input[type=text] {
    padding: 10px !important;
    font-size: 17px;
    border: 1px solid grey;
    float: left;
    width: 80%;
    border-radius: 0px;
}
.jobSearch button {
    float: left;
    width: 20%;
    padding: 10px;
    background: #247177;
    color: white;
    font-size: 17px;
    border: 1px solid grey;
    border-left: none;
    cursor: pointer;
}
.jobSearch button:hover {
    background: #144245;
}
.jobSearch::after {
    content: "";
    clear: both;
    display: table;
}
.searchBringFront{
    position: relative;
    z-index: 999;
}		
    </style>
</head>
<body>
<nav class="navbar navbar-default" role="navigation">
<div class="container">
	<?php include('loginwindow.php'); ?>
	<?php include('loginmenu.php'); ?>
</div>
<div class="container">
	<?php include('topMenu.php'); ?>
</div>
</nav>
<br>

<div class="container">
	<div class="row">
		<div class="col-md-3">
			<?php include('ourServicesLeft.php'); ?>			
		</div>
		<div id="currentBox" class="col-md-6" style="padding: 2px;">
		<div class="searchBringFront">
		    <p class="search-job-headline">Search for Jobs</p>
			<form class="jobSearch" action="searchPage.php">
			<input type="text" placeholder="Search Job.. EX: Software Engineer, Support ..." name="search">
			<button type="submit">Search</button>
			</form>
		</div>
		<br>
		<?php
		 require_once("db.php");

		if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        $no_of_records_per_page = 10;
        $offset = ($pageno-1) * $no_of_records_per_page;

        $total_pages_sql = "SELECT COUNT(*) FROM jobspost";
        $result = mysqli_query($con,$total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);

        $sql = "SELECT * FROM jobspost  ORDER BY jobID ASC LIMIT $offset, $no_of_records_per_page";
//        $res_data = mysqli_query($con,$sql);
//        while($row = mysqli_fetch_array($res_data)){
         		
		
//		$email = $_SESSION['username'];
		//$sql = "SELECT * from jobspost";
		$res_data = mysqli_query($con, $sql);
		if ($res_data->num_rows > 0) {
		    while($row = $res_data->fetch_assoc()) {
		//	 echo "id: " . $row["id"]. " - Name: " . $row["fname"]. " " . $row["lname"]. "<br>";
		?>
			<div class="col-md-12" style="padding: 2px;"> 
			    <div class="panel panel-primary">
			      <div class="panel-heading">
			      <h5>
			      	<a target="_blank"  href="jobview.php?id=<?php echo $row["jobID"]; ?>">
			      	<?php echo $row["jobName"]; ?>			      	
			      </a>
			      </h5>
			      </div>
			      <div class="panel-body" style="padding: 0px;">
			      	<div class="jobID"></div>
					<div class="current-role col-md-12 current-body-font"><p style="color: #ababab;"> <?php if($row["jobExp"] != "" ){ ?> <span class="glyphicon glyphicon-list-alt"></span> <?php echo $row["jobExp"]; ?> <?php } ?> <?php if($row["city"] != ""){ ?> <span class="glyphicon glyphicon-map-marker"></span> <?php echo $row["city"]; ?> <?php } ?> </p></div>
				<div class="current-skill col-md-12 current-body-font"><?php if($row["qua"] != ""){ ?> <p>Qualification : <?php echo $row["qua"]; ?></p> <?php } ?></div>
					<?php if($row["minSalary"] != "" || !empty($row["minSalary"])){
					?>
						<div class="current-postedby col-md-12 current-body-font"><p class="salarySnippet">₹<?php echo $row["minSalary"]; echo " to  ₹"; echo $row["maxSalary"];?></p></div>
					<?php
					}
					?>			        
					<?php
						if (isset($_SESSION["username"]))
						{
					?>		
					<div class="col-md-12">
                    <?php   
                        $userEmail = $_SESSION["username"];	
                        $rowJobs = $row["jobID"];
                        $jobsappliedQuery = "SELECT userEmail FROM jobsapplied WHERE jobsPostId=$rowJobs";	
						$jobsPostedResult = mysqli_query($con, $jobsappliedQuery);
                        if(mysqli_num_rows($jobsPostedResult) > 0){
							while ($row1 = mysqli_fetch_array($jobsPostedResult)) {
								if($row1['userEmail'] == $userEmail){
									$isJobApplied = "yes";
									break;
								}else{
									$isJobApplied = "no";
								}
							}
                        }else{
                            $isJobApplied = "no";
                        }

                        if($isJobApplied == "yes" ){
                        ?> 
                            <button type="button" disabled="disabled" class="btn btn-primary btn-sm btn-block">Applied</button>
                        <?php                                
                        }else{
                        ?> 
          					<button type="button" jobsPostedBy="<?php echo $row["email"]; ?>" jobID="<?php echo $row["jobID"]; ?>" class="btn btn-primary btn-sm btn-block jobApplyBtn">Apply</button>
                        <?php
                        }
                    ?>
					</div>
					<?php
						}else{
					?>
					<div style="margin: 20px;padding: 15px;"></div>
					<div class="loginButtons">
                    		<button name="loginButton" class="btn btn-primary btn-sm action_btn loginButton" type="button" value="login" onClick="openModel()">Login</button>
                    		<button name="registerButton" class="btn btn-primary btn-sm action_btn registerButton" type="button" value="Register" onclick="openModel()">Register</button>
                    </div>
					<!--<div class="col-md-6">  -->
					<!--	<button type="button" class="btn btn-primary btn-sm btn-block" style="width:100px;" onClick="openModel()">Login</button>-->
					<!--</div>-->
					<!--<div class="col-md-6">  -->
					<!--	<button type="button" class="btn btn-primary btn-sm btn-block" style="width:100px; float: right;" onClick="openModel()">Register</button>-->
					<!--</div>-->
					<?php							
						}
					?>
					<br>
 <div class="col-md-12">
<div style="margin-top:5px;margin-bottom: 5px;">Share this job via :  </div>    
<!-- AddToAny BEGIN -->
<div class="a2a_kit a2a_kit_size_32 a2a_default_style" data-a2a-url="http://voqeoit.com/job/jobview.php?id=<?php echo $row["jobID"]; ?>" data-a2a-title="Apply to this job : <?php echo $row["jobName"]; ?>">
<a class="a2a_dd" href="https://www.addtoany.com/share"></a>
<a class="a2a_button_facebook"></a>
<a class="a2a_button_twitter"></a>
<a class="a2a_button_google_plus"></a>
<a class="a2a_button_linkedin"></a>
<a class="a2a_button_whatsapp"></a>
<a class="a2a_button_google_gmail"></a>
</div>
<script async src="https://static.addtoany.com/menu/page.js"></script>
<!-- AddToAny END -->
</div>					
			      </div>
			    </div>
			</div>
		<?php
			}
		}else{
      ?>
    <div>Thank you for your interest. <br>We do not have this job opening at the moment. Please search for new job </div>
    
    <?php
      }		?>		
		<div  style="clear: both;">
		    <ul class="pagination">
		        <li><a href="?pageno=1">&laquo;&laquo; First</a></li>
		        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
		            <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">&laquo; Prev</a>
		        </li>
		        <?php
		        
		        	for($z=1;$z<=$total_pages;$z++){			
		        ?>
		        <li class="<?php if($pageno == $z){ echo 'pageActive'; } ?>">
		            <a href="<?php  if($pageno == $z){ echo '#'; } else { echo "?pageno=".($z); }  ?>"><?php echo $z; ?></a>
		        </li>
				<?php 
					}
				?>		        
		        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
		            <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next &raquo;</a>
		        </li>
		        <li><a href="?pageno=<?php echo $total_pages; ?>">Last &raquo;&raquo;</a></li>
		    </ul>			
		</div>
		</div>
		<div class="col-md-3">
			<?php include('currentOpenSlideUp.php'); ?>			
		</div>
	</div>	
</div>
<?php include('footer.php'); ?>
<script>
function openModel(){
        $("#myModal").modal();	
}
$(document).ready(function(){
    $("#myBtn").click(function(){
        $("#myModal").modal();
    });

});

$(document).on("click",".jobApplyBtn", function () {
   var appliedJobID = $(this).attr('jobID'); 
   var jobsPostedBy = $(this).attr('jobsPostedBy');
   var currentButton = $(this);
    $.post("funcs.php/addAppliedJobs",
    {
        appliedJobID: appliedJobID,
        jobsPostedBy : jobsPostedBy
    },
    function(data){
        if(data.trim() == "success"){
            console.log(data.trim());
            $(currentButton).text("Applied");
            $(currentButton).prop("disabled",true);
        }
    });
});

</script>

</body>
</html>
