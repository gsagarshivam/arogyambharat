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
	<meta name="keywords" content=" " />
	<link rel="stylesheet" type="text/css" href="style.css">
    <title><?php echo COMPANY?></title>
    <?php include("inc/common_head.php")?>

</head>

<body>
	
	<!-- header Start -->
	<?php include("inc/header.php")?>

    <section class="page-title-section">
		<div class="container">
			<div class="row">
				<div class="col-xl-12 text-center">
					<h2 class="text-uppercase text-white mrb-10">Board Of Director</h2>
					<ul class="mb-0 justify-content-center">
						<li class="breadcrumb-item"><a href="<?php echo FULLURL ?>" class="text-white">Home</a></li>
						<li class="breadcrumb-item text-primary-color">Board Of Director</li>
					</ul>
				</div>
			</div>
		</div>
	</section> 

	<section class="about-section pdt-105 pdb-60 pdb-lg-45">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-xl-6 wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1000ms">
					<div class="about-image">
						<img class="image-link mrb-lg-50 mrt-5" src="images/bksir.png" style="height: 450px;" alt="">
					</div>
				</div>
				<div class="col-md-12 col-xl-6 wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1000ms">
				<!--	<h5 class="mrb-15 text-primary-color text-underline"> Welcome to <?php echo COMPANY?></h5> -->
					<h2 class="mrb-25">Dr. Brijesh Chaurasia</h2>
					<p class="lead f-weight-600"></p>
					<p class="mrb-25">
                    Dr. B.K. Chaurasia, an internationally acclaimed physician and researcher, worked in the field of Kidney & Diabetes disease treatment by ayurveda for 20 years and produced brilliant results for numerous types of malignancies at all stages. He has been a forerunner in treating Kidney disease by ayurveda. With an uncommon knack towards research and medicine, Dr. B.K. Chaurasia is a true promoter and Kidney curer through science or ayurvedic medicine. Always valuing honesty, commitment, accountability, integrity, uprightness and dedication, his one dream is to make Kidney Care Medicine available to as many people as possible, at an affordable cost.He then undertook his post-graduation in Ayurveda in 2006 and later finished his Diploma in Medico-Legal Systems from Symbiosis Center of Health Care, Pune. It was during this time that he invented the Kidney care center.
                    </p>					
					
				</div>
			</div>
		</div>
	</section>
	<section class="about-section pdt-105 pdb-60 pdb-lg-45">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-xl-6 wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1000ms">
				<!--	<h5 class="mrb-15 text-primary-color text-underline"> Welcome to <?php echo COMPANY?></h5> -->
                  

                    <h2 class="mrb-25">Mrs.Shimali Chaurasia</h2>
					<p class="lead f-weight-600"></p>
					<p class="mrb-25">
                      Mrs.Shimali Chaurasia is the MD of <?php echo COMPANY ?>.  She has been on various International TV channels and national channels for interviews. She has written articles on various health columns in different newspapers. Shehas presented various papers and given lectures at various National and International Forums..
                    </p>					
					
				</div>
				<div class="col-md-12 col-xl-6 wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1000ms">
					<div class="about-image">
						<img class="image-link mrb-lg-50 mrt-5" src="images/shimali chaurasia.png" style="height: 400px;" alt="">
					</div>
				</div>
				
			</div>
		</div>
	</section>
	
	<section>
		<div class="section-content">
			<div class="container">
				<div class="row">
					<div class="owl-carousel client-items">
					<div class="  wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="500ms">
						<div class="team-block mrb-30">
							<div class="team-upper-part">
								<img class="img-full" src="images/dr. jitendra.png" style="" alt="">
								<div class="overlay">
									<ul class="social-list vertical-style list-sm">
										<li><a href="https://www.facebook.com/bkhealthcarepvt" target="_blank"><i class="fa fa-facebook-f"></i></a></li>
								<li><a href="https://twitter.com/ArogyamMission" target="_blank"><i class="fa fa-twitter"></i></a></li>
								<li><a href="https://www.instagram.com/missionarogyam/" target="_blank"><i class="fa fa-instagram"></i></a></li>
								<li><a href="https://www.youtube.com/channel/UCrFVKk45x1_boNZxrv3uM7g/videos" target="_blank"><i class="fa fa-youtube"></i></a></li>
									</ul>
								</div>
							</div>
							<div class="team-bottom-part text-center">
								<h4 class="team-title mrb-5"><a href="#">Dr. Jitendra</a></h4>
								<h6 class="designation">Doctor </h6>
							</div>
						</div>
					</div>
					<div class=" wow fadeInRight" data-wow-delay="0ms" data-wow-duration="500ms">
						<div class="team-block mrb-30">
							<div class="team-upper-part">
								<img class="img-full" src="images/dr.deepak.png" alt="">
								<div class="overlay">
									<ul class="social-list vertical-style list-sm">
										<li><a href="https://www.facebook.com/bkhealthcarepvt" target="_blank"><i class="fa fa-facebook-f"></i></a></li>
								<li><a href="https://twitter.com/ArogyamMission" target="_blank"><i class="fa fa-twitter"></i></a></li>
								<li><a href="https://www.instagram.com/missionarogyam/" target="_blank"><i class="fa fa-instagram"></i></a></li>
								<li><a href="https://www.youtube.com/channel/UCrFVKk45x1_boNZxrv3uM7g/videos" target="_blank"><i class="fa fa-youtube"></i></a></li>
									</ul>
								</div>
							</div>
							<div class="team-bottom-part text-center">
								<h4 class="team-title mrb-5"><a href="#">Dr.Deepak</a></h4>
								<h6 class="designation">Doctor</h6>
							</div>
						</div>
					</div>
					
                    <div class="  wow fadeInRight" data-wow-delay="0ms" data-wow-duration="500ms">
						<div class="team-block mrb-30">
							<div class="team-upper-part">
								<img class="img-full" src="images/shashi.png" alt="">
								<div class="overlay">
									<ul class="social-list vertical-style list-sm">
										<li><a href="https://www.facebook.com/bkhealthcarepvt" target="_blank"><i class="fa fa-facebook-f"></i></a></li>
								<li><a href="https://twitter.com/ArogyamMission" target="_blank"><i class="fa fa-twitter"></i></a></li>
								<li><a href="https://www.instagram.com/missionarogyam/" target="_blank"><i class="fa fa-instagram"></i></a></li>
								<li><a href="https://www.youtube.com/channel/UCrFVKk45x1_boNZxrv3uM7g/videos" target="_blank"><i class="fa fa-youtube"></i></a></li>
									</ul> 
								</div>
							</div>
							<div class="team-bottom-part text-center">
								<h4 class="team-title mrb-5"><a href="#">Dr.Shashi</a></h4>
								<h6 class="designation">Doctor</h6>
							</div>
						</div>
					</div>
					<div class="  wow fadeInRight" data-wow-delay="0ms" data-wow-duration="500ms">
						<div class="team-block mrb-30">
							<div class="team-upper-part">
								<img class="img-full" src="images/rat.png" alt="">
								<div class="overlay">
								<ul class="social-list vertical-style list-sm">
									<li><a href="https://www.facebook.com/bkhealthcarepvt" target="_blank"><i class="fa fa-facebook-f"></i></a></li>
									<li><a href="https://twitter.com/ArogyamMission" target="_blank"><i class="fa fa-twitter"></i></a></li>
									<li><a href="https://www.instagram.com/missionarogyam/" target="_blank"><i class="fa fa-instagram"></i></a></li>
									<li><a href="https://www.youtube.com/channel/UCrFVKk45x1_boNZxrv3uM7g/videos" target="_blank"><i class="fa fa-youtube"></i></a></li>
									</ul> 
								</div>
							</div>
							<div class="team-bottom-part text-center">
								<h4 class="team-title mrb-5"><a href="#">Dr.Ratnesh</a></h4>
								<h6 class="designation">Doctor</h6>
							</div>
						</div>
					</div>
                    <div class="  wow fadeInRight" data-wow-delay="0ms" data-wow-duration="500ms">
						<div class="team-block mrb-30">
							<div class="team-upper-part">
								<img class="img-full" src="images/ritesh.png" alt="">
								<div class="overlay">
									<ul class="social-list vertical-style list-sm">
										<li><a href="https://www.facebook.com/bkhealthcarepvt" target="_blank"><i class="fa fa-facebook-f"></i></a></li>
								<li><a href="https://twitter.com/ArogyamMission" target="_blank"><i class="fa fa-twitter"></i></a></li>
								<li><a href="https://www.instagram.com/missionarogyam/" target="_blank"><i class="fa fa-instagram"></i></a></li>
								<li><a href="https://www.youtube.com/channel/UCrFVKk45x1_boNZxrv3uM7g/videos" target="_blank"><i class="fa fa-youtube"></i></a></li>
									</ul> 
								</div>
							</div>
							<div class="team-bottom-part text-center">
								<h4 class="team-title mrb-5"><a href="#">Dr.Ritesh</a></h4>
								<h6 class="designation">Doctor</h6>
							</div>
						</div>
					</div>
                    </div>
				</div>
			</div>
		</div> 
	</section>






	<?php include("inc/footer.php")?>





</body>
</html>