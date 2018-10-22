 <div style="margin-top: 1px;">
 	<div class="row">
    	<div class="col-md-6"></div>
        	<div class="col-md-6 pull-right">
            	<div style="color:white;" class="pull-right">
	            	<div>
						<!--
						<b style="background-color:#18484d; padding-right:5px; padding-left:5px;">
						<a style="text-decoration:none;color:white;font-size:12px;" href="#">
						Welcome : <?php  //echo $_SESSION['username']; ?></a></b>
						-->
						<?php
						if (isset($_SESSION["username"]))
						{

						}
						else
						if (isset($_SESSION["empusername"])){
							
						}
						else{
							
						}
						?>
						<?php
						if (isset($_SESSION["username"]))
						{
						?>
						<div class="dropdown">
						    <b  style="font-size: 12px;cursor: pointer;background-color:#18484d;
						    			padding-right:5px;padding-left:5px;padding-top: 2px !important;padding-bottom: 2px !important;" 
						    			class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Logged In
						    			<span class="caret"></span>
						    </b>
						    <ul class="dropdown-menu">
						      <li><a href="dashboard.php">Dashbord</a></li>
						      <li><a href="logout.php">Logout</a></li>
						    </ul>
						    <b style="font-size: 12px;cursor: pointer;background-color:#18484d;padding-right:5px;
						    			padding-left:5px;padding-top: 2px !important;padding-bottom: 2px !important;"
						    			class="btn btn-primary" >
						          <a style="color:white;font-size:12px;text-decoration: none" href="help.php">Help</a>
							</b>
						</div>
						<?php
						}
						else 
						if (isset($_SESSION["empusername"])){
						?>
						<div class="dropdown">
						    <b  style="font-size: 12px;cursor: pointer;background-color:#18484d;
						    	padding-right:5px;padding-left:5px;padding-top: 2px !important;padding-bottom: 2px !important;" 
						    	class="btn btn-primary dropdown-toggle"  data-toggle="dropdown">Logged In
						    	<span class="caret"></span>
						    </b>
						    <ul class="dropdown-menu">
						      <li><a href="dashboard.php">Dashbord</a></li>
						      <li><a href="logout.php">Logout</a></li>
						    </ul>
						    <b style="font-size: 12px;cursor: pointer;background-color:#18484d;padding-right:5px;
						    	padding-left:5px;padding-top: 2px !important;padding-bottom: 2px !important;" 
						    	class="btn btn-primary" >
						    <a style="color:white;font-size:12px;text-decoration: none;" href="help.php">Help</a></b>
					  </div>
						<?php	
						}
						else
						{
						?>
						    <b style="font-size: 12px;cursor: pointer;background-color:#18484d;padding-right:
						    	5px;padding-left:5px;padding-top: 2px !important;padding-bottom: 2px !important;" 
						    	class="btn btn-primary" style="background-color:#18484d;padding-right:5px;padding-left:5px;" >
						    <a  id="myBtn" style="color:white;font-size:12px;text-decoration: none;" href="#">Login / Register</a></b>

						    <b style="font-size: 12px;cursor: pointer;background-color:#18484d;padding-right:5px;
						    	padding-left:5px;padding-top: 2px !important;padding-bottom: 2px !important;" 
						    	class="btn btn-primary" style="background-color:#18484d;padding-right:5px;padding-left:5px;" >
						    <a style="color:white;font-size:12px;text-decoration: none;" href="help.php">Help</a></b>

						<?php
						}
						?>
            	</div> 
        	</div>
    	</div>
	</div>
</div>