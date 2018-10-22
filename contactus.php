<?php
	session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Contact Us | Job Portal</title>

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
	.red{
    color:red;
    }
.form-area
{
    background-color: #FAFAFA;
	padding: 10px 40px 60px;
	margin: 10px 0px 60px;
	border: 1px solid GREY;
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

<div class="container">
<div class="row">
<?php
// define variables and set to empty values
$name = $email = $mobile = $subject = $message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = test_input($_POST["name"]);
  $email = test_input($_POST["email"]);
  $mobile = test_input($_POST["mobile"]);
  $subject = test_input($_POST["subject"]);
  $message2 = test_input($_POST["message"]);
?>
<br>
<div class="container">
	<div class="col-md-offset-3 col-md-6">
	  <div class="alert alert-success alert-dismissable">
	    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
			<h3 style=''>Thank you for contacting us ! </h3>
			<p>We will get back to you soon</p>
	  </div>
	</div>
</div>

<?php
$to = "arjunkneworld@gmail.com";
$subject = "Job portal email";

$message = "
<html>
<head>
<title>Contact Us</title>
</head>
<body>
<div style='border:1px solid red;width:100%;'>
<p>Someone has contacted to jobportal :</p>
<br>
<table>
<tr>
<th>Name</th>
<th>Email</th>
<th>Mobile</th>
<th>Subject</th>
<th>Message</th>
</tr>
<tr>
<td>'".$name."'</td>
<td>'".$email."'</td>
<td>'".$mobile."'</td>
<td>'".$subject."'</td>
<td>'".$message2."'</td>
</tr>
</table>
</div>
</body>
</html>
";
// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
// More headers
$headers .= 'From: <webmaster@jobportal.com>' . "\r\n";
$headers .= 'Cc: weboutnow2014@gmail.com' . "\r\n";
mail($to,$subject,$message,$headers);
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?> 
<div class="col-md-offset-4 col-md-4">
    <div class="form-area">  
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
        <br style="clear:both">
                    <h3 style="margin-bottom: 25px; text-align: center;">Contact Us</h3>
    				<div class="form-group">
						<input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="email" name="email" placeholder="Email" required>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile Number" required>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" required>
					</div>
                    <div class="form-group">
                    <textarea class="form-control" type="textarea" id="message" name="message" placeholder="Message" maxlength="140" rows="7"></textarea>
                        <span class="help-block"><p id="characterLeft" class="help-block ">You have reached the limit</p></span>  
                    </div>   
                    <input type="submit" name="submit" class="btn btn-primary pull-right" value="Submit" >           

        </form>
    </div>
</div>
</div>	
</div>

<?php include('footer.php'); ?>

<script>
$(document).ready(function(){
    $("#myBtn").click(function(){
        $("#myModal").modal();
    });

    $('#characterLeft').text('140 characters left');
    $('#message').keydown(function () {
        var max = 140;
        var len = $(this).val().length;
        if (len >= max) {
            $('#characterLeft').text('You have reached the limit');
            $('#characterLeft').addClass('red');
            $('#btnSubmit').addClass('disabled');            
        } 
        else {
            var ch = max - len;
            $('#characterLeft').text(ch + ' characters left');
            $('#btnSubmit').removeClass('disabled');
            $('#characterLeft').removeClass('red');            
        }
    });    

});

</script>

</body>
</html>
