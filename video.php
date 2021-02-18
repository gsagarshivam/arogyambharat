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
	<title>About Us | <?php echo COMPANY;?></title>
	<link rel="stylesheet" type="text/css" href="style.css">
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
					<h2 class="text-uppercase text-white mrb-10">Video</h2>
					<ul class="mb-0 justify-content-center">
						<li class="breadcrumb-item"><a href="<?php echo FULLURL ?>" class="text-white">Home</a></li>
						<li class="breadcrumb-item text-primary-color">Video</li>
					</ul>
				</div>
			</div>
		</div>
	</section> 
	<!-- Page Title End -->

   <!-- About Section Start -->
	<section class="about-section pdt-105 pdb-60 pdb-lg-45">
		<div class="container">
			<div class="row">

				<div class="col-md-6 col-xl-6 wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1000ms">
					<iframe width="580" height="480" src="https://www.youtube.com/embed/EO-DlKlRXfY" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
				<div class="col-md-6 col-xl-6 wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1000ms">
					<iframe width="580" height="480" src="https://www.youtube.com/embed/Zc4v4TXVTcU" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>

				<div class="col-md-6 col-xl-6 wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1000ms">
					<iframe width="580" height="480" src="https://www.youtube.com/embed/fZEw1DOLRlw" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
				<div class="col-md-6 col-xl-6 wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1000ms">

					<iframe width="580" height="480" src="https://www.youtube.com/embed/RXkXpPQR8fE" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			
				</div>
				
				
			</div>
		</div>
	</section>
    <!-- About Section End -->

	<?php include("inc/footer.php")?>
	<!-- Footer Area End -->

</body>
</html>