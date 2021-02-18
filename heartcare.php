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
					<h2 class="text-uppercase text-white mrb-10">Service</h2>
					<ul class="mb-0 justify-content-center">
						<li class="breadcrumb-item"><a href="<?php echo FULLURL ?>" class="text-white">Home</a></li>
						<li class="breadcrumb-item text-primary-color">Bk Heart Care</li>
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
                                <img src="images/services/bkheart.png" alt="image">
                            </div>

                            <div style="margin-top: 40px" class="article-content">
                               
                                <h3 style="margin-bottom: 20px" class="widget-title">Bk Heart Care</h3>
                                

                                <p>Heart diseases are commonly known as Cardio vascular disease; it includes all the diseases of the heart and circulation. It refers to the condition that involved clot or narrowed blood vessels that leads to chest pain, stroke or heart attack. This damage to the structure of walls can be of three main types- clogging of vessels, damaged area due to free radical activity, and loss of thickness of vessel wall. The most common symptoms of heart diseases are loss of appetite, heavy sensation in the heart, breathlessness, changes in complexion, confusion, and drowsiness, etc. </p>

                                <p>Death due to heart diseases in India increased from 1.3 million in 1992 2.8 billion in 2016, and more than half of the death caused by heart problems in 2016 were in person less than 70 years of age., according to the study “the changing patterns of cardiovascular disease and their risk factors”.</p>

                                <h4>How Ayurveda can help in curing heart disease?</h4>
                                <p>In India if we talk about heart disease then the major cause is the unhealthy lifestyle but low levels of physical activity and heavy intake of unhealthy processed food. The Western Lifestyle that Indians have adopted builds the cholesterol in the arteries which restricts the blood flow and causes heart diseases. Only Ayurvedic treatment is able to cure heart disease from root cause and provide permanent relief it includes personalized diet plan, herbal medication, yoga, pranayam, meditation, therapeutic practices, and other several lifestyle changes. The treatment help in controlling an eliminating the factors that contribute to heart disease and does provide a solution to heart disease with no side- effects.</p>

                                <h4>Diseases-</h4>
                                <hr style=" height: 2px; width: 150px; left: 0; margin-top: -0px; background: #54c934;" >
                                <ol style="margin-bottom: 50px">
                                <li>• Coronary heart disease.</li> 
                                <li>• High blood pressure i.e. hypertension.</li> 
                                <li>• Cardiac arrest.</li>
                                <li>• Heart failure.</li>
                                <li>• Peripheral artery disease.</li> 
                                <li>• Stroke</li>
                                <li>• Congenital heart disease.</li>
                                </ol>
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
                                <h3 class="widget-title">Releted Services</h3>

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
                                        <h4 class="title usmall"><a href="kayasuddhi.php">Kaya Suddhi</a></h4>
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
                                        <h4 class="title usmall"><a href="immunitybooster.php">Immunity Booster</a></h4>
                                    </div>

                                    <div class="clear"></div>
                                </article>
                             
                            </section>
                             <aside class="widget-area" id="secondary">
                           
                            <section class="widget widget_fovia_posts_thumb">
                                <h3 class="widget-title">Our Brands</h3>
                              

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