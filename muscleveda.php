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
					<h2 class="text-uppercase text-white mrb-10">Brands</h2>
					<ul class="mb-0 justify-content-center">
						<li class="breadcrumb-item"><a href="<?php echo FULLURL ?>" class="text-white">Home</a></li>
						<li class="breadcrumb-item text-primary-color">Muscleveda</li>
					</ul>
				</div>
			</div>
		</div>
	</section> 

	        <!-- Start Blog Details Area -->
        <section style="margin-top: 70px" class="blog-details-area ptb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12">
                        <div class="blog-details-desc">
                            <div class="article-image">
                                <img src="images/muscleveda.jpg" alt="image">
                            </div>

                            <div style="margin-top: 40px" class="article-content">
                               
                                <h3 style="margin-bottom: 20px" class="widget-title">Muscleveda</h3>
                                

                                <p>Muscleveda is a new age ayurvedic product that strives to bring the ancient and time-tested goodness of Ayurveda to the world. Founded by BK Chaurasia Ji whose expertise spans since 1979, is spreading the rays of Ayurveda. More than 40 years of Ayurvedic Heritage, formulations, and knowledge has been passed down from generation to generation through dedicated practice by his family. </p>

                                <p>After treating thousands of patients around the globe and perfecting unique blends through careful expertise, today, the company owns 100+ ISO and GMP approved formulations for ayurvedic proprietary medicine. Keeping in line with our dedication to quality, now we have decided to enlighten the world with them benefits of Ayurvedic health supplements for bodybuilders and athletes. </p>

                                <p>At BK Arogyam, we aim to make the traditional science of Ayurveda appealing and accessible to modern consumers both in India and abroad. All the products bear the mark Ayurvedic because we believe that Ayurveda should reach each house and become a household lifestyle choice for health and wellness, globally.</p>

                                <p>When it comes to quality building of fitness and nutrition, nowadays we generally tend to think about protein intake. Proteins are perhaps the first images to pop into our heads when anyone mention supplements for muscle growth but there is narrow perception of what really constitutes vital nutrients for bodybuilding or strength training. Because of the peoples change in interest towards Ayurveda many dietitians and athletes not point to ayurvedic diet recommendations, this makes perfect sense.</p>

                                <p>Ayurveda encourages diet that aims to nourish the body and mind. This basically means that your diet needs to be personalized to meet your specific needs either it is mental, physical, or spiritual. When you are planning your diet then you need to consider some Ayurvedic health supplements because it also make sense to adhere to the philosophy of Ayurveda. Ayurveda says to have moderation of food intake, emphasizing greater awareness about food and drink intake, as well as consumption habits, with an aim being balanced nutrition.</p>

                                <p style="margin-bottom: 100px">These Muscleveda Ayurvedic premium quality products are combination of benefits of ayurveda and health supplements, and do not have side-effects on any of the essential organs of human body. These are specially designed for bodybuilders and athletics. </p>

                              
                            </div>    
                            <section>
                                <div class="section-content">
                                    <div class="container">
                                        <div class="row">
                                            
                                            <div class="col-md-6 col-lg-3 col-xl-3 wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="500ms">
                                                <div class="team-block mrb-30">
                                                    <div class="team-upper-part">
                                                        <img class="img-full" src="images/packeagesname/arogyam rasayan.jpg" style="" alt="">
                                                        <!--    <div class="overlay">
                                                            <ul class="social-list vertical-style list-sm">
                                                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                                            </ul> 
                                                        </div> -->
                                                    </div>
                                                    <div class="team-bottom-part text-center">
                                                        <h4 class="team-title mrb-5"><a href="#">Arogyam Rasayan</a></h4>
                                                        <h6 class="designation">&#8377; 2000 </h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-lg-3 col-xl-3 wow fadeInRight" data-wow-delay="0ms" data-wow-duration="500ms">
                                                <div class="team-block mrb-30">
                                                    <div class="team-upper-part">
                                                        <img class="img-full" src="images/packeagesname/emergency kit.jpg" style="" alt="">
                                                    <!--    <div class="overlay">
                                                            <ul class="social-list vertical-style list-sm">
                                                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                                            </ul> 
                                                        </div> -->
                                                    </div>
                                                    <div class="team-bottom-part text-center">
                                                        <h4 class="team-title mrb-5"><a href="#">Emergency Kit</a></h4>
                                                        <h6 class="designation">&#8377; 2000</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6 col-lg-3 col-xl-3 wow fadeInRight" data-wow-delay="0ms" data-wow-duration="500ms">
                                                <div class="team-block mrb-30">
                                                    <div class="team-upper-part">
                                                        <img class="img-full" src="images/packeagesname/diabetes care package.jpg" style="" alt="">
                                                        <!--    <div class="overlay">
                                                            <ul class="social-list vertical-style list-sm">
                                                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                                            </ul> 
                                                        </div> -->
                                                    </div>
                                                    <div class="team-bottom-part text-center">
                                                        <h4 class="team-title mrb-5"><a href="#">Diabetes Care</a></h4>
                                                        <h6 class="designation">&#8377; 2000</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-lg-3 col-xl-3 wow fadeInRight" data-wow-delay="0ms" data-wow-duration="500ms">
                                                <div class="team-block mrb-30">
                                                    <div class="team-upper-part">
                                                        <img class="img-full" src="images/packeagesname/Kidney Stone.jpg" style="" alt="">
                                                    <!--    <div class="overlay">
                                                            <ul class="social-list vertical-style list-sm">
                                                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                                            </ul> 
                                                        </div> -->
                                                    </div>
                                                    <div class="team-bottom-part text-center">
                                                        <h4 class="team-title mrb-5"><a href="#">Kidney Stone</a></h4>
                                                        <h6 class="designation">&#8377; 5000</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            
                                        </div>
                                    </div>
                                </div>
                            </section>                                
                        </div>
                    </div>

                     <div class="col-lg-4 col-md-12">
                        <aside class="widget-area" id="secondary">
                           
                            <section class="widget widget_fovia_posts_thumb">
                                <h3 class="widget-title">Our Services</h3>

                                <article style="margin-top: 20px" class="item">
                                    <div class="info">
                                        <h4 class="title usmall"><a href="kidneycare.php">Bk Kidney Care</a></h4>
                                    </div>

                                    <div class="clear"></div>
                                </article>

                                <article style="margin-top: 20px" class="item">
                                    <div class="info">
                                        <h4 class="title usmall"><a href="diabetescare.php">Bk Diabetes Care</a></h4>
                                    </div>

                                    <div class="clear"></div>
                                </article>

                                <article style="margin-top: 20px" class="item">
                                    <div class="info">
                                        <h4 class="title usmall"><a href="heartcare.php">Bk Heart Care</a></h4>
                                    </div>

                                    <div class="clear"></div>
                                </article>
                                <article style="margin-top: 20px" class="item">
                                    <div class="info">
                                        <h4 class="title usmall"><a href="cancercare.php">Bk Cancer Care</a></h4>
                                    </div>

                                    <div class="clear"></div>
                                </article>
                                 <article style="margin-top: 20px" class="item">
                                    <div class="info">
                                        <h4 class="title usmall"><a href="kayasuddhi.php">Kaya Suddhi</a></h4>
                                    </div>

                                    <div class="clear"></div>
                                </article>
                                 <article style="margin-top: 20px" class="item">
                                    <div class="info">
                                        <h4 class="title usmall"><a href="immunitybooster.php">Immunity Booster</a></h4>
                                    </div>

                                    <div class="clear"></div>
                                </article>
                             
                            </section>
                             <aside class="widget-area" id="secondary">
                           
                            <section class="widget widget_fovia_posts_thumb">
                                <h3 class="widget-title">Releted Brands</h3>
                              

                                <article style="margin-top: 20px" class="item">
                                    <div class="info">
                                        <h4 class="title usmall"><a href="muscleveda.php">Muscleveda</a></h4>
                                    </div>

                                    <div class="clear"></div>
                                </article>

                               <article style="margin-top: 20px" class="item">
                                    <div class="info">
                                        <h4 class="title usmall"><a href="arogyaveda.php">Arogyaveda</a></h4>
                                    </div>

                                    <div class="clear"></div>
                                </article>
                           
                                <article style="margin-top: 20px" class="item">
                                    <div class="info">
                                        <h4 class="title usmall"><a href="rupam.php">Rupam</a></h4>
                                    </div>

                                    <div class="clear"></div>
                                </article>
                                  <article style="margin-top: 20px" class="item">
                                    <div class="info">
                                        <h4 class="title usmall"><a href="nutriveda.php">Nutriveda</a></h4>
                                    </div>

                                    <div class="clear"></div>
                                </article>
                            </section>
                        </aside>
                </div>
            </div>
       </div>
    </section>
        <!-- End Blog Details Area -->




	<?php include("inc/footer.php")?>





</body>
</html>