<?php 
require_once("dbcn.php");

?>
<style>
.portfolio-wrapper .content-overlay {
    background: #1A2C79;
    background: -webkit-linear-gradient(left, #1A2C79 2%, #e80566 82%);
    background: linear-gradient(to right, #85be8a 2%, #05e814 82%);
    position: absolute;
    height: 100%;
    width: 100%;
    left: 0;
    top: 0;
    bottom: 0;
    right: 0;
    opacity: 0;
    -webkit-transition: all 0.4s ease-in-out 0s;
    -moz-transition: all 0.4s ease-in-out 0s;
    transition: all 0.4s ease-in-out 0s;
}

</style>
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
    <link rel="stylesheet" type="text/css" href="css2/style.css">
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
					<h2 class="text-uppercase text-white mrb-10">Gallery</h2>
					<ul class="mb-0 justify-content-center">
						<li class="breadcrumb-item"><a href="<?php echo FULLURL ?>" class="text-white">Home</a></li>
						<li class="breadcrumb-item text-primary-color">Gallery</li>
					</ul>
				</div>
			</div>
		</div>
	</section> 


     <!--our work or portfolio section start-->
     <section class="our-portfolio-section ptb-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-heading text-center mb-5">
                       
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    
                    <div class="portfolio-container" id="MixItUp">
                       
                        <div class="mix portfolio-item other animation" data-ref="mixitup-target">
                            <div class="portfolio-wrapper">
                                <a href="#">
                                    <div class="content-overlay"></div>
                                    <img class="img-fluid" src="images/gallery/pride.jpg" alt="portfolio"/>
                                    <div class="content-details fadeIn-bottom text-white">
                                        <h5 class="text-white mb-1">Bk Arogyam  </h5>
                                       
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="mix portfolio-item animation" data-ref="mixitup-target">
                            <div class="portfolio-wrapper">
                                <a href="#">
                                    <div class="content-overlay"></div>
                                    <img class="img-fluid" src="images/gallery/9.jpg" alt="portfolio"/>
                                    <div class="content-details fadeIn-bottom text-white">
                                        <h5 class="text-white mb-1">Bk Arogyam </h5>
                                       
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="mix portfolio-item branding" data-ref="mixitup-target">
                            <div class="portfolio-wrapper">
                                <a href="#">
                                    <div class="content-overlay"></div>
                                    <img class="img-fluid" src="images/gallery/8.jpg" alt="portfolio"/>
                                    <div class="content-details fadeIn-bottom text-white">
                                        <h5 class="text-white mb-1">Bk Arogyam  </h5>
                                       
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="mix portfolio-item branding" data-ref="mixitup-target">
                            <div class="portfolio-wrapper">
                                <a href="#">
                                    <div class="content-overlay"></div>
                                    <img class="img-fluid" src="images/gallery/10.jpg" alt="portfolio"/>
                                    <div class="content-details fadeIn-bottom text-white">
                                        <h5 class="text-white mb-1">Bk Arogyam  </h5>
                                       
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="mix portfolio-item branding" data-ref="mixitup-target">
                            <div class="portfolio-wrapper">
                                <a href="#">
                                    <div class="content-overlay"></div>
                                    <img class="img-fluid" src="images/gallery/11.jpg" alt="portfolio"/>
                                    <div class="content-details fadeIn-bottom text-white">
                                        <h5 class="text-white mb-1">Bk Arogyam  </h5>
                                       
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="mix portfolio-item branding" data-ref="mixitup-target">
                            <div class="portfolio-wrapper">
                                <a href="#">
                                    <div class="content-overlay"></div>
                                    <img class="img-fluid" src="images/gallery/12.jpg" alt="portfolio"/>
                                    <div class="content-details fadeIn-bottom text-white">
                                        <h5 class="text-white mb-1">Bk Arogyam  </h5>
                                       
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="mix portfolio-item animation other" data-ref="mixitup-target">
                            <div class="portfolio-wrapper">
                                <a href="#">
                                    <div class="content-overlay"></div>
                                    <img class="img-fluid" src="images/gallery/7.jpg" alt="portfolio"/>
                                    <div class="content-details fadeIn-bottom text-white">
                                        <h5 class="text-white mb-1">Bk Arogyam </h5>
                                       
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="mix portfolio-item branding " data-ref="mixitup-target">
                            <div class="portfolio-wrapper">
                                <a href="#">
                                    <div class="content-overlay"></div>
                                    <img class="img-fluid" src="images/gallery/6.jpg" alt="portfolio"/>
                                    <div class="content-details fadeIn-bottom text-white">
                                        <h5 class="text-white mb-1">Bk Arogyam </h5>
                                       
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="mix portfolio-item branding " data-ref="mixitup-target">
                            <div class="portfolio-wrapper">
                                <a href="#">
                                    <div class="content-overlay"></div>
                                    <img class="img-fluid" src="images/gallery/5.jpg" alt="portfolio"/>
                                    <div class="content-details fadeIn-bottom text-white">
                                        <h5 class="text-white mb-1">Bk Arogyam </h5>
                                       
                                    </div>
                                </a>
                            </div>
                        </div>
                        
                        <div class="mix portfolio-item branding " data-ref="mixitup-target">
                            <div class="portfolio-wrapper">
                                <a href="#">
                                    <div class="content-overlay"></div>
                                    <img class="img-fluid" src="images/gallery/3.jpg" alt="portfolio"/>
                                    <div class="content-details fadeIn-bottom text-white">
                                        <h5 class="text-white mb-1">Bk Arogyam </h5>
                                       
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="mix portfolio-item branding " data-ref="mixitup-target">
                            <div class="portfolio-wrapper">
                                <a href="#">
                                    <div class="content-overlay"></div>
                                    <img class="img-fluid" src="images/gallery/2.jpg" alt="portfolio"/>
                                    <div class="content-details fadeIn-bottom text-white">
                                        <h5 class="text-white mb-1">Bk Arogyam </h5>
                                       
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="mix portfolio-item branding " data-ref="mixitup-target">
                            <div class="portfolio-wrapper">
                                <a href="#">
                                    <div class="content-overlay"></div>
                                    <img class="img-fluid" src="images/gallery/1.jpg" alt="portfolio"/>
                                    <div class="content-details fadeIn-bottom text-white">
                                        <h5 class="text-white mb-1">Bk Arogyam </h5>
                                       
                                    </div>
                                </a>
                            </div>
                        </div>
  

        
                        <div class="gap"></div>
                        <div class="gap"></div>
                        <div class="gap"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--our work or portfolio section end-->

	

	<?php include("inc/footer.php")?>






</body>
</html>