<div class="navbar-header">
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="http://voqeoit.com">
		<span style="color: black;font-weight: 600; font-size: 1.6rem;line-height: 100%;text-decoration: none;text-transform: uppercase;font-family: sans-serif;">VOQEO</span>
		<span style="font-weight: 300;font-size: 1.6rem;line-height: 100%;" class="span12">IT</span>
	<!--
	    <img src="images/log.png" width="220" height="35" /> 
	-->
    </a>
</div>

<!--/.navbar-header-->
<div class="navbar-collapse collapse top-nav-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
        <li><a href="http://www.voqeoit.com">Home</a></li>
		<li><a href="http://www.voqeoit.com/#services">Services</a></li>
		
		<?php
		if (isset($_SESSION["username"]))
		{
			echo "<li><a href='currentOpenings.php'>Current Opening</a></li>";			
		}
		else
		if (isset($_SESSION["empusername"])){
						
		}
		else{
			echo "<li><a href='http://www.voqeoit.com/#current-opening'>Current Opening</a></li>";			
		}
		?>        
        <li><a href="http://www.voqeoit.com/#clients-1">Client</a></li>
        <li><a href="http://www.voqeoit.com/#contact-1">Contact</a></li>
        <li><a href="http://www.voqeoit.com/#testimonials-5">Testimonials</a></li>
    </ul>
</div>
<div class="clearfix"> </div>
<!-- for active menu style="background-color: #337e81;" -->
	    
	    
