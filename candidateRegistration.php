<?php
 session_start();
 error_reporting(E_ERROR | E_PARSE);

?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Candidate Register | Job Portal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="jobs" />
    <script type="application/x-javascript"> 
		addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } 
    </script>
    
    <?php include('headFiles.html'); ?>
	<style>
		input[type="text"], input[type="email"], input[type="password"] {
		    padding: 10px !important;
		}
		.form-horizontal .control-label{
			font-weight:600;
    }
    .nav-pills>li>a{
      border-radius: 0px;
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
<div class="container" style="padding-bottom: 10px;">
	  <h2>Candidate Registration</h2>
</div>

<div class="container">
<div class="tab-content vqBox">
   <h5 class="divide-section"><b>Login Details : </b></h5>
   <form style="padding: 10px;" class="form-horizontal" name="canregistration" action="candidateReg.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label class="control-label col-sm-2" >Email : <span style="color:red">*</span></label>
      <div class="col-sm-4">
        <input type="email" class="form-control form-fixer form-fixer"  placeholder="Enter email" name="email" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Password :  <span style="color:red">*</span></label>
      <div class="col-sm-4">          
        <input type="password" class="form-control form-fixer form-fixer"  placeholder="Enter password" name="password" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Retype Password :  <span style="color:red">*</span></label>
      <div class="col-sm-4">          
        <input type="password" class="form-control form-fixer"  placeholder="Re Enter password" name="repassword" required>
      </div>
    </div>
   <h5 class="divide-section"><b>About you :</b></h5>
    <div class="form-group">
      <label class="control-label col-sm-2" >Title:</label>
      <div class="col-sm-1">
	  <select class="form-control form-fixer" name="title" >
	    <option>Mr</option> 
	    <option>Mis</option>
	  </select>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" >First Name :  <span style="color:red">*</span></label>
      <div class="col-sm-4">
        <input type="text" class="form-control form-fixer"  placeholder="First name" name="fname" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" >Last Name :</label>
      <div class="col-sm-4">
        <input type="text" class="form-control form-fixer"  placeholder="Enter Last Name" name="lname">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" >Date Of Birth :</label>
      <div class="col-sm-4">
      <input type="date" name="dob" class="form-control">
		</div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" >Emplyoment Status:</label>
      <div class="col-sm-4">
		<select name="empStatus" class="form-control form-fixer">
		  <option value="0000">Select</option>
		  <option value="working">Working</option>
		  <option value="looking">Looking</option>
		  <option value="study">Studying</option>
		  <option value="both">Working but looking</option>
		</select>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2">Address 1:</label>
      <div class="col-sm-4">
        <input type="text" class="form-control form-fixer" placeholder="Enter Address 1" name="address1">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2">Address 2:</label>
      <div class="col-sm-4">
        <input type="text" class="form-control form-fixer" placeholder="Enter Address 2" name="address2">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2">Address 3:</label>
      <div class="col-sm-4">
        <input type="text" class="form-control form-fixer" placeholder="Enter Address 3" name="address3">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2">Town/City:</label>
      <div class="col-sm-4">
        <input type="text" class="form-control form-fixer" placeholder="Enter Town/city" name="town">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2">Country :</label>
      <div class="col-sm-4">
		<select name="country" class="form-control form-fixer">
		  <option value="india">India</option>
		  <option value="uk">UK</option>
		  <option value="us">US</option>
		</select>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2">Phone :</label>
      <div class="col-sm-4">
        <input type="text" class="form-control form-fixer" placeholder="Enter phone" name="phone">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2">Mobile :  <span style="color:red">*</span></label>
      <div class="col-sm-4">
        <input type="number" class="form-control form-fixer" placeholder="Enter Mobile" name="mobile" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2">LinkedIn Profile URL :</label>
      <div class="col-sm-4  ">
        <input type="url" class="form-control form-fixer" placeholder="Enter URL" name="linked">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2">Your CV :</label>
      <div class="col-sm-4">
    <!-- <input type="file" class="form-control form-fixer" name="resume" accept="file_extension/*"> -->
    <p class="form-control">Candidate can upload only after login</p>
      </div>
    </div>

    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
		<input type="submit" class="btn btn-default" name="registrationSubmit" value="Register" />
      </div>
    </div>

  </form>
	<br />

  </div>
</div>

<?php include('footer.php'); ?>

<script>
//for login 
$(document).ready(function(){
    $("#myBtn").click(function(){
        $("#myModal").modal();
    });
});
</script>

</body>
</html>
