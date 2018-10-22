<div class="navbar-header">
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="index.php">
    <span style="color: white;font-size: 40px;position: absolute;">
		VoqeoIT
	</span> 
	<!--
	    <img src="images/log.png" width="220" height="35" />
	-->
    </a>
</div>
<!--/.navbar-header-->
<div class="navbar-collapse collapse" id="bs-example-navbar-collapse-1" style="height: 1px;">
    <ul class="nav navbar-nav">
        <li><a href="index.php">Home</a></li>
        <li><a href="aboutus.php">About Us</a></li>
		<?php
		if (isset($_SESSION["username"]))
		{
			echo "<li><a href='currentOpenings.php'>Current Openings</a></li>";			
		}
		else
		if (isset($_SESSION["empusername"])){
						
		}
		else{
			echo "<li><a href='currentOpenings.php'>Current Openings</a></li>";			
		}
		?>        
        <li><a href="contactus.php">Contact Us</a></li>
    </ul>
</div>
<div class="clearfix"> </div>
<!-- for active menu style="background-color: #337e81;" -->
	    
	    