<?php
session_start();
require_once("dbcn.php"); 
if(isset($_POST['send']))
{
    
    $form_name                  =isset($_POST['form_name'])?$_POST['form_name']:'';
    $form_phone  				=isset($_POST['form_phone'])?$_POST['form_phone']:'';
    $form_email                 =isset($_POST['form_email'])?$_POST['form_email']:'';
    $aadhar_card  				=isset($_POST['aadhar_card'])?$_POST['aadhar_card']:'';
    $cwp  						=isset($_POST['cwp'])?$_POST['cwp']:'';
    $address                    =isset($_POST['address'])?$_POST['address']:'';

    $to 		= "missionarogyam@gmail.com"; // this is your Email address
    $from 		= isset($_POST['form_email'])?$_POST['form_email']:''; // this is the sender's Email address
  
    $subject    = "THANK YOU";
    $subject2   = "THANK YOU\n\n";
    $message   .= "Greetings of the day,Hope this message finds you well. Thank you for joining our Mission. We will contact you as soon as possible.\n\n;
                    Thanks and regards. \n\n; 
                    Mission Arogyam.";
                                
   $message2   .= "Greetings of the day,Hope this message finds you well. Thank you for joining our Mission. We will contact you as soon as possible.\n\n;
                    Thanks and regards. \n\n; 
                    Mission Arogyam.";

    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    mail($to,$subject,$message,$headers);
    mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
    
    // You can also use header('Location: thank_you.php'); to redirect to another page.
    
	// //Headers
	// $headers  = "MIME-Version: 1.0\r\n";
	// $headers .= "Content-type: text/html; charset=UTF-8\r\n";
	// $headers .= "From: <".$from. ">" ;

    //--------------------------Insert Page------------------------------------//




    //--------------------------Insert Page------------------------------------//

    $qry="INSERT INTO franchise_htc(form_name,form_phone,form_email,aadhar_card,cwp,address)values(
    '$form_name',
    '$form_phone',
    '$form_email',
    '$aadhar_card',
    '$cwp',
    '$address'
    )";


    $res=mysqli_query($conn,$qry) or die(mysqli_error($conn));
    $msg="Franchise From Save Successfullys";
    header("Location:franchise.php");
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
	<title>Franchise | <?php echo COMPANY;?></title>
    <?php include("inc/common_head.php")?> 
</head>
<style>

	.form-it{
		box-shadow: none;
    outline: none;
    border: 1px solid #e3e3e3;
    background: #f1fced;
    font-size: 16px;
    font-weight: 400;
    font-family: "Montserrat", sans-serif;
    color: #2e2e45;
    height: auto;
    padding: 20px;
    resize: none;
    min-width: 100%;
    height: 56px;
	}
</style>
<body>

	<!-- header Start -->
	<?php include("inc/header.php")?>
	<!-- header End -->
	<!-- Page Title Start -->
    <section class="page-title-section">
		<div class="container">
			<div class="row">
				<div class="col-xl-12 text-center">
					<h2 class="text-uppercase text-white mrb-10">Franchise</h2>
					<ul class="mb-0 justify-content-center">
						<li class="breadcrumb-item"><a href="<?php echo FULLURL ?>" class="text-white">Home</a></li>
						<li class="breadcrumb-item text-primary-color">Franchise</li>
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
										<input type="text" name="form_phone" placeholder="Phone" class="form-control" required>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group mrb-25">
										<input type="email" name="form_email" placeholder="Email(Optional)" class="form-control">
									</div>
								</div>
								<div class="col-lg-6">
										<div class="formselect">
										<select class="form-it" name="aadhar_card">
										 
										  <option value="bams">BAMS</option>
										  <option value="practicedoctor">PRACTICE DOCTOR</option>
										  <option value="allopath">ALLOPATH & OTHERS</option>
										 
										</select>
									</div>
										
								</div>
								<div class="col-lg-12">
									<div class="form-group mrb-25">
										<input type="text" name="cwp" placeholder="Current Work" class="form-control" required>
									</div>
								</div>	
								<div class="col-lg-12">
									<div class="form-group mrb-25">
										<textarea rows="4" name="address" placeholder="Address" class="form-control"></textarea>
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