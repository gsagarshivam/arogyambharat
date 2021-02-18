<?php 
require_once("dbcn.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="author" content="Abaclor">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content=" ">
	<meta name="keywords" content="  " />
	<title>Career | <?php echo COMPANY;?></title>
    <?php include("inc/common_head.php")?> 
</head>

<body>

	<!-- header Start -->
	<?php include("inc/header.php")?>
	<!-- header End -->
	<!-- Page Title Start -->
	<section class="pdt-120 pdb-50 section-white-typo" data-background="images/about-banner.png" data-overlay-dark="4">
		<div class="container">
			<div class="row">
				<div class="col-xl-12 text-center">
					<h2 class="text-uppercase text-white mrb-10">Career</h2>
					<ul class="mb-0 justify-content-center">
						<li class="breadcrumb-item"><a href="<?php echo FULLURL ?>" class="text-white">Home</a></li>
						<li class="breadcrumb-item text-primary-color">Career</li>
					</ul>
				</div>
			</div>
		</div>
	</section>
	<!-- Page Title End -->

    
		<section class="about">
			<div class="container mt-5 mb-5">
				<div class="item-list">
                    <div class="row">  
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="sec-title">
                                <h2 class="left">What are you looking for?</h2><br>
                                <p><?php echo COMPANY?> core values prove to be the guiding principles behind our phenomenal growth, helping it to become one of India`s leading direct selling companies.</p>
                                </div>
                                    <ul class="order-list primary-color"> 
                                    <li>To Join <?php echo COMPANY;?> Minimum age limit of member is 18 years.</li> 
                                    <li>Free Joining/Registration-Anyone can join in our company by filling up the registration form and become an Inactive Member or Red ID.</li> 
                                    <li>To become an Active Member or get additional benefits you need to Green your ID .</li> 
                                    <li>For Activate Member Id or Green Id Direct Seller need to produce valid Receipt given by the company registered outlet/franchisee Centre/Online.</li>  
                                    <li>Direct Seller/any desirable person is strictly prohibited to pay/ deposit any sum in the company account for purchasing products or any purpose.</li>
                                    <li>He /she will pay at the company registered outlet/ franchisee Centre/Online at the time of getting product only.</li>
                                    <li>Once you become green you will be eligible for all payout under my terms and conditions.</li>
                                    <li>Admin will generate pin and member can topup their ids using desired E-pin only.</li>
                                    </ul>
                                </div> 
                            </div>					
				        </div>
                    </div>
                </div>
            </div>
		</section>
	<!-- Footer Area Start -->
	<?php include("inc/footer.php")?>
	<!-- Footer Area End -->

</body>
</html>