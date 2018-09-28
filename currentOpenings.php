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
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- Custom Theme files -->
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link href='//fonts.googleapis.com/css?family=Roboto:100,200,300,400,500,600,700,800,900'
        rel='stylesheet' type='text/css'>
    <!----font-Awesome----->
    <link href="css/font-awesome.css" rel="stylesheet">
    <!----font-Awesome----->
    <style>
    	.jobID {
			display : none;	
			
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
		<?php
		 require_once("db.php");

		if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        $no_of_records_per_page = 10;
        $offset = ($pageno-1) * $no_of_records_per_page;

        $total_pages_sql = "SELECT COUNT(*) FROM jobsPost";
        $result = mysqli_query($con,$total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);

        $sql = "SELECT * FROM jobsPost LIMIT $offset, $no_of_records_per_page";
//        $res_data = mysqli_query($con,$sql);
//        while($row = mysqli_fetch_array($res_data)){
         		
		
//		$email = $_SESSION['username'];
		//$sql = "SELECT * from jobsPost";
		$res_data = mysqli_query($con, $sql);
		if ($res_data->num_rows > 0) {
		    while($row = $res_data->fetch_assoc()) {
		//	 echo "id: " . $row["id"]. " - Name: " . $row["fname"]. " " . $row["lname"]. "<br>";
		?>
			<div class="col-md-12" style="padding: 2px;"> 
			</div>
		<?php
			}
		}
		?>		
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
