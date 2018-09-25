<?php
 session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Register | Job Portal</title>

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

<div class="container" style="border: 1px solid #e6e6e6;padding-bottom: 10px;">
<br>
  <h2>Register as</h2>
  <ul class="nav nav-pills">
    <li class="active"><a data-toggle="pill" href="#candidate">Candidate</a></li>
    <li><a data-toggle="pill" href="#emp">Employer</a></li>
  </ul>
<div class="tab-content" style="background-color: white;">
    <div id="candidate" class="tab-pane fade in active">
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
      <div class="col-sm-2">
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
      <div class="col-sm-3">
		<select name="day" class="form-control form-fixer">
		<option value="0">Day</option>
		<?php 
		for($i=1;$i<13;$i++){
			echo "<option value='".$i."'>" .$i. "</option>";
		}
		?>
		</select>
		</div>
      <div class="col-sm-4">
		<select name="month" class="form-control form-fixer">
		  <option value="null">Month</option>
		  <option value="January">January</option>
		  <option value="February">February</option>
		</select>
		</div>
      <div class="col-sm-3">
		<select name="year" class="form-control form-fixer">
		  <option value="0000">Year</option>
		  <option value="1985">1985</option>
		  <option value="1986">1986</option>
		  <option value="1987">1987</option>
		  <option value="1988">1988</option>
		</select>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" >Emplyoment Status:</label>
      <div class="col-sm-3">
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
      <div class="col-sm-3">
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
      <div class="col-sm-6">
        <input type="url" class="form-control form-fixer" placeholder="Enter URL" name="linked">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2">Your CV :</label>
      <div class="col-sm-3">
	  <input type="file" class="form-control form-fixer" name="resume" accept="file_extension/*">
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
<div id="emp" class="tab-pane fade">
<h5 class="divide-section"><b>Login Details : </b></h5>
   <form class="form-horizontal" name="empregistration" action="employerReg.php" style="padding: 10px;" method="post">
    <div class="form-group">
      <label class="control-label col-sm-2" >Email : <span style="color:red">*</span></label>
      <div class="col-sm-10">
        <input type="email" class="form-control form-fixer form-fixer"  placeholder="Enter email" name="email" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Password :  <span style="color:red">*</span></label>
      <div class="col-sm-3">          
        <input type="password" class="form-control form-fixer form-fixer"  placeholder="Enter password" name="password" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Retype Password :  <span style="color:red">*</span></label>
      <div class="col-sm-10">          
        <input type="password" class="form-control form-fixer"  placeholder="Re Enter password" name="repassword" required>
      </div>
    </div>
<h5 class="divide-section"><b>About You : </b></h5>
    <div class="form-group">
      <label class="control-label col-sm-2" >Company name : </label>
      <div class="col-sm-2">
        <input type="text" class="form-control form-fixer"  placeholder="Company name" name="companyname" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" >Industry type : </label>
      <div class="col-sm-3">
	  <select class="form-control form-fixer" name="indtype" >
	  <option value="SelectType">Select Type</option>		
	  <option value="Application">Application</option>
	  <option value="Support">Support</option>
	  <option value="BPO">BPO</option>
	  <option value="Software">Software</option>
	  </select>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" >Company or Consultant :  <span style="color:red">*</span></label>
      <div class="col-sm-10">
	    <label class="radio-inline">
	      <input  type="radio" name="companyorconsult" value="Company">Company
	    </label>
	    <label class="radio-inline">
	      <input type="radio" name="companyorconsult" value="Consultant">Consultant
	    </label>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" >Contact person name :  <span style="color:red">*</span></label>
      <div class="col-sm-3">
        <input type="text" class="form-control form-fixer"  placeholder="Contact Person Name" name="contactpername" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" >Designation :</label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-fixer"  placeholder="Designation" name="designation">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" >Office Address :</label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-fixer"  placeholder="Office Address" name="officeaddress">
      </div>
    </div> 
     <div class="form-group">
      <label class="control-label col-sm-2">Country :</label>
      <div class="col-sm-3">
		<select name="country" class="form-control form-fixer">
		  <option value="india">India</option>
		  <option value="uk">UK</option>
		  <option value="us">US</option>
		</select>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2">City :</label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-fixer" placeholder="City" name="city">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2">Pincode :</label>
      <div class="col-sm-3"> 
        <input type="text" class="form-control form-fixer" placeholder="Pincode" name="pincode">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2">Mobile :  <span style="color:red">*</span></label>
      <div class="col-sm-4">
        <input type="number" class="form-control form-fixer" placeholder="Enter Mobile" name="mobile" required>
      </div>
    </div> 
    <div class="form-group">
      <label class="control-label col-sm-2">Alternate Email :</label>
      <div class="col-sm-10">
        <input type="email" class="form-control form-fixer" placeholder="Alternate Email" name="alteremail">
      </div>
    </div>
    <div class="col-md-1"></div>
    <h5 class="col-md-11">From 1st July 2017 GST is mandatory for all transaction</h5>
    <div class="form-group">
      <label class="control-label col-sm-2">GST:</label>
      <div class="col-sm-10">
	    <label class="radio-inline">
	      <input type="radio" name="gst">GST Unregistered
	    </label>
	    <label class="radio-inline">
	      <input type="radio" name="gst">GST Registered
	    </label>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2">Upload Profile Photo :</label>
      <div class="col-sm-3">
	  <input type="file" class="form-control form-fixer" name="profilephoto" accept="file_extension/*">
      </div>
    </div>
    <div class="form-group">
    <div class="col-md-1"></div>
      <div class="col-sm-11">
		<label class="checkbox-inline"><input type="checkbox" name="agree" value="agree">I Agree to <a href="#">Terms & Condition</a></label>
      </div>
    </div>
    <div class="form-group">
    <div class="col-md-1"></div>
      <div class="col-sm-11">
		<label class="checkbox-inline"><input type="checkbox" name="getemail" value="getemail">I want to receive promotions on my email id</label>
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
		<input type="submit" class="btn btn-default" name="registrationSubmit" value="Register" />
      </div>
    </div>
<br>
  </form>
    </div>
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
