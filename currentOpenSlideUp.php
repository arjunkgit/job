<?php
 require_once("db.php");
         $sql = "SELECT * FROM jobspost  ORDER BY jobID ASC LIMIT 10, 10";
         		$res_data = mysqli_query($con, $sql);

?>
<style>
  .panel-default {
    border-color: unset;
    border: 0px;
    border: 1px solid #e2e2e2;
}
.panel-default>.panel-heading {
    color: #fff;
    background-color: #0e5b62;
    border-color: #ddd;
    font-size: 14px;
    font-weight: bold;
}

.panel-body {
    margin-bottom: 10px;
    font-size: 13px;
    color: #545454;
}
.panel-default {
			border-color: unset;
			border: 1px solid #e0e0e0;
			padding: 0px;
			margin: 5px;
		}

</style>
<div class="currentUp">
<div class="headings" >Current Openings</h5></div>
 <marquee height="450px"  scrollamount="5" direction = "up">
<?php
	if ($res_data->num_rows > 0) {
		while($row = $res_data->fetch_assoc()) { 
?> 
<div class="panel panel-default">
  <div class="panel-heading"><?php echo $row["jobName"]; ?></div>
  <div class="panel-body">
	<div>
  	<?php if($row["minSalary"] != "" || !empty($row["minSalary"])){
		?>
		<span class="current-postedby col-md-12 current-body-font">
		<p class="salarySnippet">₹<?php echo $row["minSalary"]; echo " to  ₹"; echo $row["maxSalary"];?></p>
		</span>
		<?php
		}
	?>	
	</div>
	<div>
		<p><?php echo $row["qua"]; ?></p>
        <p><?php echo $row["city"]; ?>, <?php echo $row["state"]; ?></p>
	</div>
  </div>
</div>
<?php
 		}
 	}
 ?>
</marquee>	
</div>
