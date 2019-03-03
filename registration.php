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
    
    <?php include('headFiles.html'); ?>
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

<div class="container vqBox" style="padding-bottom: 10px;">
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
      <label class="control-label col-sm-3" >Email : <span style="color:red">*</span></label>
      <div class="col-sm-5">
        <input type="email" class="form-control form-fixer form-fixer"  placeholder="Enter email" name="email" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-3" for="pwd">Password :  <span style="color:red">*</span></label>
      <div class="col-sm-5">          
        <input type="password" class="form-control form-fixer form-fixer"  placeholder="Enter password" name="password" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-3" for="pwd">Retype Password :  <span style="color:red">*</span></label>
      <div class="col-sm-5">          
        <input type="password" class="form-control form-fixer"  placeholder="Re Enter password" name="repassword" required>
      </div>
    </div>
   <h5 class="divide-section"><b>About you :</b></h5>
    <div class="form-group">
      <label class="control-label col-sm-3" >Title:</label>
      <div class="col-sm-2">
	  <select class="form-control form-fixer" name="title" >
	    <option>Mr</option> 
	    <option>Mis</option>
	  </select>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-3" >First Name :  <span style="color:red">*</span></label>
      <div class="col-sm-5">
        <input type="text" class="form-control form-fixer"  placeholder="First name" name="fname" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-3" >Last Name :</label>
      <div class="col-sm-5">
        <input type="text" class="form-control form-fixer"  placeholder="Enter Last Name" name="lname">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-3" >Date Of Birth :</label>
      <div class="col-sm-5">
      <input type="date" name="dob" class="form-control">
		</div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-3" >Emplyoment Status:</label>
      <div class="col-sm-5">
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
      <label class="control-label col-sm-3">Address 1:</label>
      <div class="col-sm-5">
        <input type="text" class="form-control form-fixer" placeholder="Enter Address 1" name="address1">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-3">Address 2:</label>
      <div class="col-sm-5">
        <input type="text" class="form-control form-fixer" placeholder="Enter Address 2" name="address2">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-3">Address 3:</label>
      <div class="col-sm-5">
        <input type="text" class="form-control form-fixer" placeholder="Enter Address 3" name="address3">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-3">Town/City:</label>
      <div class="col-sm-5">
        <input type="text" class="form-control form-fixer" placeholder="Enter Town/city" name="town">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-3">Country :</label>
      <div class="col-sm-5">
		<select name="country" class="form-control form-fixer">
		  <option value="india">India</option>
		  <option value="uk">UK</option>
		  <option value="us">US</option>
		</select>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-3">Phone :</label>
      <div class="col-sm-5">
        <input type="text" class="form-control form-fixer" placeholder="Enter phone" name="phone">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-3">Mobile :  <span style="color:red">*</span></label>
      <div class="col-sm-5">
        <input type="number" class="form-control form-fixer" placeholder="Enter Mobile" name="mobile" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-3">LinkedIn Profile URL :</label>
      <div class="col-sm-5  ">
        <input type="url" class="form-control form-fixer" placeholder="Enter URL" name="linked">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-3">Your CV :</label>
      <div class="col-sm-5">
    <!-- <input type="file" class="form-control form-fixer" name="resume" accept="file_extension/*"> -->
    <p class="form-control">Candidate can upload only after login</p>
      </div>
    </div>

    <div class="form-group">        
      <div class="col-sm-offset-3 col-sm-9">
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
      <label class="control-label col-sm-4 col-md-3" >Email : <span style="color:red">*</span></label>
      <div class="col-sm-5 col-md-4">
        <input type="email" class="form-control form-fixer"  placeholder="Enter email" name="email" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-4 col-md-3" for="pwd">Password :  <span style="color:red">*</span></label>
      <div class="col-sm-5 col-md-4">          
        <input type="password" class="form-control form-fixer"  placeholder="Enter password" name="password" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-4 col-md-3" for="pwd">Retype Password :  <span style="color:red">*</span></label>
      <div class="col-sm-5 col-md-4">          
        <input type="password" class="form-control form-fixer"  placeholder="Re Enter password" name="repassword" required>
      </div>
    </div>
    <h5 class="divide-section"><b>About You : </b></h5>
    <div class="form-group">
      <label class="control-label col-sm-4 col-md-3" >Company name : <span style="color:red">*</span></label>
      <div class="col-sm-5 col-md-4">
        <input type="text" class="form-control form-fixer"  placeholder="Company name" name="companyname" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-4 col-md-3" >Industry type : </label>
      <div class="col-sm-5 col-md-4">
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
      <label class="control-label col-sm-4 col-md-3" >Company or Consultant :  <span style="color:red">*</span></label>
      <div class="col-sm-5 col-md-4">
	    <label class="radio-inline">
	      <input  type="radio" name="companyorconsult" value="Company">Company
	    </label>
	    <label class="radio-inline">
	      <input type="radio" name="companyorconsult" value="Consultant">Consultant
	    </label>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-4 col-md-3" >Contact person name :  <span style="color:red">*</span></label>
      <div class="col-sm-5 col-md-4">
        <input type="text" class="form-control form-fixer"  placeholder="Contact Person Name" name="contactpername" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-4 col-md-3" >Designation :</label>
      <div class="col-sm-5 col-md-4">
        <input type="text" class="form-control form-fixer"  placeholder="Designation" name="designation">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-4 col-md-3" >Office Address :</label>
      <div class="col-sm-5 col-md-4">
        <input type="text" class="form-control form-fixer"  placeholder="Office Address" name="officeaddress">
      </div>
    </div> 
     <div class="form-group">
      <label class="control-label col-sm-4 col-md-3">Country :</label>
      <div class="col-sm-5 col-md-4">
		<select name="country" class="form-control form-fixer">
		  <option value="india">India</option>
		  <option value="uk">UK</option>
		  <option value="us">US</option>
		</select>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-4 col-md-3">City :</label>
      <div class="col-sm-5 col-md-4">
        <input type="text" class="form-control form-fixer" placeholder="City" name="city">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-4 col-md-3">Pincode :</label>
      <div class="col-sm-5 col-md-4"> 
        <input type="text" class="form-control form-fixer" placeholder="Pincode" name="pincode">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-4 col-md-3">Mobile :  <span style="color:red">*</span></label>
      <div class="col-sm-5 col-md-4">
        <input type="number" class="form-control form-fixer" placeholder="Enter Mobile" name="mobile" required>
      </div>
    </div> 
    <div class="form-group">
      <label class="control-label col-sm-4 col-md-3">Alternate Email :</label>
      <div class="col-sm-5 col-md-4">
        <input type="email" class="form-control form-fixer" placeholder="Alternate Email" name="alteremail">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-7">From 1st July 2017 GST is mandatory for all transaction</label>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-4 col-md-3">GST :</label>
      <div class="col-sm-8 col-md-9">
	    <label class="radio-inline">
	      <input type="radio" name="gst">GST Unregistered
	    </label>
	    <label class="radio-inline">
	      <input type="radio" name="gst">GST Registered
	    </label>
      </div>
    </div>
    <!-- <div class="form-group">
      <label class="control-label col-sm-4 col-md-3">Upload Profile Photo :</label>
      <div class="col-sm-5 col-md-4">
	  <input type="file" class="form-control form-fixer" name="profilephoto" accept="file_extension/*">
      </div>
    </div> -->
    <div class="form-group">
    <div class="col-sm-4 col-md-3"></div>
      <div class="col-sm-8 col-md-9">
    		<label class="checkbox-inline"><input type="checkbox" name="agree" value="agree" required>I Agree to <a href="#">Terms & Condition</a></label>
      </div>
    </div>
    <div class="form-group">
    <div class="col-sm-4 col-md-3"></div>
      <div class="col-sm-8 col-md-9">
    		<label class="checkbox-inline"><input type="checkbox" name="getemail" value="getemail">I want to receive promotions on my email id</label>
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-4 col-sm-8 col-md-offset-3 col-md-9">
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
