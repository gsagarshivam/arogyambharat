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
    <title><?php echo COMPANY?></title>
    <link rel="stylesheet" type="text/css" href="style.css">
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
						<li class="breadcrumb-item text-primary-color">Arogyaveda</li>
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
                                <img src="images/arogyveda.jpg" alt="image">
                            </div>

                            <div style="margin-top: 40px" class="article-content">
                               
                                <h3 style="margin-bottom: 20px" class="widget-title">Arogyaveda</h3>
                                

                                <p>We need Ayurveda to maintain not only our body i.e. physical well-being but also to give peace to our mind and soul. Ayurveda gives a lifestyle that is healthy and keeps us away from diseases. Ayurveda is the most ancient Medical Science originated 5000 years ago in India and Ayurveda is taking the world by the storm because it cure diseases from the root cause and is able to give permanent solutions.</p>

                                <p>India is the birthplace of Ayurveda. In practices of Ayurveda, healing is based on the body doshas or type. The primary doshas are a variety of emotional, psychological, and physical qualities of a person that are vata, pitta and kapha. Ayurveda has natural treatment, therapies, and procedures with herbal and organic medicines. These techniques heal the body without leaving any side effects on any other vital organs.</p>

                                <p>In India, if we talk about diseases then the major cause is the unhealthy lifestyle but low levels of physical activity and heavy intake of unhealthy processed food. The Western Lifestyle that Indians have adopted weakens the immunity system of human body and causes several diseases. Only Ayurvedic treatment is able to cure these diseases from root cause and provide permanent relief. It includes personalized diet plan, herbal medication, yoga, pranayam, meditation, therapeutic practices, and other several lifestyle changes. The Ayurvedic treatment helps in controlling and eliminating the factors that contribute to these diseases and does provide a solution to several diseases with no side- effects. </p>

                                <p>Only Ayurveda is the source through which can become healthy and regain our original health. Ayurveda is to promote health, increase resistance, and to cure disease. The two main aims of Ayurveda are to maintain equilibrium and repair in case of derangement. This seems so simple yet so unattainable in today's life.</p>

                                <p style="margin-bottom: 100px">The Arogyaveda presents you with Ayurvedic premium quality products of all kinds of diseases from fever to cancer. These products have capability to cure all types of diseases from the root cause and do not have any side-effect on any of the organ of the body.</p>
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
        </section>
        <!-- End Blog Details Area -->




	<?php include("inc/footer.php")?>





</body>
</html>