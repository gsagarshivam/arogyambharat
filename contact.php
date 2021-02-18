<?php
session_start();
require_once("dbcn.php"); 

if(isset($_POST['send']))
{
$name= $_POST['form_name'];
$phone=$_POST['form_phone']; 
$email=$_POST["form_email"];
$sub=$_POST['form_subject'];
$from_msg=$_POST['form_message'];
$regexEmail = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/'; 


if( $_SESSION['security_code'] != $_POST['security_code'] && !empty($_SESSION['security_code'] ) ) {
$err1="Enter the correct verification code"; 
unset($_SESSION['security_code']);
}

else if((trim($name)=="")||(trim($phone)=="")||(trim($sub)=="")||(trim($from_msg)==""))
  	{
	$err1= "Fill required fields!";
	}
	/*else if(!preg_match($regexEmail,$email))
	{
	$err1= "Please enter correct Email-ID!";	
	}	
	*/	
	else  
	{
	$message = "
    Dear Administrator,<br />
    A new message has been submitted via contact us.<br /><br />
    <b>Details</b><br /> 
    --------------------------------- <br />
    Name: $name<br />
    Phone: $phone<br />
    Email: $email<br />
    Subject: $sub<br />
    Message: $from_msg<br />
    ";
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= "From: " . "$email". "\r\n" .
    "Reply-To:" . "$email". "\r\n" .
    "X-Mailer: PHP/" . phpversion();
    mail(FORMEMAIL, $sub, $message, $headers);
    $msg="Your message has been send to administrator.";   
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="author" content="Abaclor">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content=" ">
	<meta name="keywords" content=" " />
	<title>Contact Us | <?php echo COMPANY;?></title>
    <?php include("inc/common_head.php")?> 
</head>

<body>

	<!-- header Start -->
	<?php include("inc/header.php")?>
	<!-- header End -->
	<!-- Page Title Start -->
    <section class="page-title-section">
		<div class="container">
			<div class="row">
				<div class="col-xl-12 text-center">
					<h2 class="text-uppercase text-white mrb-10">Contact Us</h2>
					<ul class="mb-0 justify-content-center">
						<li class="breadcrumb-item"><a href="<?php echo FULLURL ?>" class="text-white">Home</a></li>
						<li class="breadcrumb-item text-primary-color">Contact Us</li>
					</ul>
				</div>
			</div>
		</div>
	</section>
	<!-- Page Title End -->
	<!-- Contact Section Start -->
	<section class="contact-section pdt-100 pdb-95 pdb-md-110">
		<div class="container">
			<div class="row">
				<div class="col-lg-7">
					<div class="contact-form mrb-md-40">
						<h2 class="mrb-40 f-weight-400 solid-bottom-line">Send<span class="f-weight-700 text-primary-color"> Message</span></h2>
						<?php if(isset($err1)){echo "<div class=\"alert alert-danger\">".$err1."</div>";}?>
            			<?php if(isset($msg)){echo "<div class=\"alert alert-success\">".$msg."</div>";}?>
						<form action="#" method="POST">
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group mrb-25">
										<input type="text" name="form_name" placeholder="Name" class="form-control" required>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group mrb-25">
										<input type="email" name="form_email" placeholder="Email(Optional)" class="form-control">
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group mrb-25">
										<input type="text" name="form_subject" placeholder="Subject" class="form-control" required>
									</div>
								</div>
								
								<div class="col-lg-6">
									<div class="form-group mrb-25">
										<input type="text" name="form_phone" placeholder="Phone" class="form-control" required>
									</div>
								</div>
								<div class="col-lg-12">
									<div class="form-group mrb-25">
										<textarea rows="4" name="form_message" placeholder="Messages" class="form-control" required></textarea>
									</div>
								</div>
								<div class="col-12">
										<div class="form-group">
										<label><input type="text" aria-required="true" id="security_code" name="security_code" maxlength="100" size="12" class="form-control text-left" required/></label>
											<img src="CaptchaSecurityImages.php?width=100&height=40&characters=5" style="width: 100px;"/>			
										</div>
									</div>
								<div class="col-lg-8">
									<div class="form-group">
										<button type="submit" name="send" class="cs-btn-one btn-md btn-round btn-gradient-color element-shadow">Submit Now</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
				<div class="col-lg-5">
					<h2 class="mrb-40 f-weight-400 solid-bottom-line">Our<span class="f-weight-700 text-primary-color"> Address</span></h2>
					<div class="contact-block d-flex mrb-30">
						<div class="contact-icon">
							<i class="webex-icon-map1"></i>
						</div>
						<div class="contact-details mrl-30">
							<h5 class="icon-box-title mrb-10">Our Address</h5>
							<p class="mrb-0"><?php echo ADDRESS?></p>
						</div>
					</div>
					<div class="contact-block d-flex mrb-30">
						<div class="contact-icon">
							<i class="webex-icon-Phone2"></i>
						</div>
						<div class="contact-details mrl-30">
							<h5 class="icon-box-title mrb-10">Phone Number</h5>
							<p class="mrb-0"><?php echo CONTACT?></p>
						</div>
					</div>
					<div class="contact-block d-flex">
						<div class="contact-icon">
							<i class="webex-icon-envelope"></i>
						</div>
						<div class="contact-details mrl-30">
							<h5 class="icon-box-title mrb-10">Email Us</h5>
							<p class="mrb-0">bk@bkarogyamhealthcare.com</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<div class="contact-section">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12 p-0">
					<!-- Google Map Start -->
					<div class="mapouter fixed-height ">
						<div class="gmap_canvas">
						<iframe src="<?php echo GOOGLEMAP;?>" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
						</div>
					</div>
					<!-- Google Map End -->
				</div>
			</div>
		</div>
	</div>
	<!-- Contact Section End -->
	<!-- Footer Area Start -->
	<?php include("inc/footer.php")?>
	<!-- Footer Area End -->

</body>
</html>