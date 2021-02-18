<style>
	/* Dropdown Button */
.dropbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
  position: relative;
  display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 200px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #ddd;}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
	display: block;
}

/* Change the background color of the dropdown button when the dropdown content is shown */
</style>



<header class="header-style-two"> 
		<div class="header-wrapper">
			<div class="header-top-area bg-gradient-color d-none d-lg-block">
				<div class="container">
					<div class="row">
						<div class="col-lg-8 header-top-left">
							<span class="address"><i class="webexflaticon flaticon-placeholder-1"></i> <?php echo ADDRESS?></span>
						<!--	<span class="phone"><i class="webexflaticon flaticon-send"></i> <?php echo EMAIL?></span> -->
						</div>
						<div class="col-lg-4 header-top-right-part text-right">
							<ul class="social-links">
								<li><a href="https://www.facebook.com/bkhealthcarepvt" target="_blank"><i class="fa fa-facebook-f"></i></a></li>
								<li><a href="https://twitter.com/ArogyamMission" target="_blank"><i class="fa fa-twitter"></i></a></li>
								<li><a href="https://www.instagram.com/missionarogyam/" target="_blank"><i class="fa fa-instagram"></i></a></li>
								<li><a href="https://www.youtube.com/channel/UCrFVKk45x1_boNZxrv3uM7g/videos" target="_blank"><i class="fa fa-youtube"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="header-middle">
				<div class="container">
					<div class="row">
						<div class="col-md-12 d-flex align-items-center justify-content-between">
							<a class="navbar-brand logo" href="<?php echo FULLURL ?>">
								<img id="logo-image" class="img-center" src="images/logo.png" style="height:110px ;" alt=""  />
							</a>
							<div class="topbar-info-area d-none d-sm-flex align-items-center justify-content-between">
								<div class="d-flex align-items-center mr-3">
									<i class="webexflaticon flaticon-analytics text-primary-color"></i></i>
									<div>
										<h6>Franchisee</h6>
										<a class="text-gray" href="franchise.php">Register Now</a>
										
									</div> 
								</div>
								<div class="d-flex align-items-center mr-3">
									<i class="webexflaticon flaticon-mail-1 text-primary-color"></i>
									<div>
										<h6>Email Us</h6>
										<a class="text-gray" href="#">bk@bkarogyamhealthcare.com</a>
									</div> 
								</div>
								<div class="d-none d-md-flex align-items-center"> 
									<i class="webexflaticon flaticon-phone-1 text-primary-color"></i>
									<div>
										<h6>Call Us</h6>
										<a class="text-gray" href="#"><?php echo CONTACT?></a>
									</div>
								</div>
								
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="header-navigation-area three-layers-header">
				<div class="container">
					<div class="row">
						<div class="col-xl-12 col-lg-12">
							<div class="">
								<nav class="navbar navbar-expand-lg navbar navbar-light">
								  <a class="navbar-brand" style="padding-bottom: 1.3125rem; padding-top: 1.3125rem;" href="index.php"><i class="fa fa-home" aria-hidden="true"></i> <b>Home</b><span class="sr-only">(current)</span></a>
								  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
								    <span class="navbar-toggler-icon"></span>
								  </button>
								  <div class="collapse navbar-collapse" id="navbarNavDropdown">
								    <ul class="navbar-nav">

								      <li class="nav-item dropdown">
								        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								          <b>COMPANY</b> 
								        </a>
								        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
								          <a class="dropdown-item" href="about.php"><i class="fa fa-at" aria-hidden="true"></i> ABOUT AROGYAM BHARAT</a>
								          <a class="dropdown-item" href="management.php"><i class="fa fa-users" aria-hidden="true"></i> BOARD OF DIRECTOR</a>
								        </div>
								      </li>
								      <li class="nav-item dropdown">
								        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><b>BUSINESS OPPORTUNITY</b> 
								          
								        </a>
								        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
								          <a class="dropdown-item" href="plan.php"><i class="fa fa-tasks" aria-hidden="true"></i> PLAN</a>
								          <a class="dropdown-item" href="legal.php"><i class="fa fa-tasks" aria-hidden="true"></i> LEGAL</a>
								        </div>
								      </li>
								      <li class="nav-item dropdown">
								        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><b>BRANDS</b> 
								          
								        </a>
								        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
								          <a class="dropdown-item" href="arogyaveda.php"><i class="fa fa-ravelry" aria-hidden="true"></i> AROGYAVEDA</a>
								          <a class="dropdown-item" href="rupam.php"><i class="fa fa-ravelry" aria-hidden="true"></i> RUPAM</a>
								          <a class="dropdown-item" href="nutriveda.php"><i class="fa fa-ravelry" aria-hidden="true"></i> NUTRIVEDA</a>
								          <a class="dropdown-item" href="https://muscleveda.com/"><i class="fa fa-ravelry" aria-hidden="true"></i> MUSCLEVEDA</a>
								        </div>
								      </li>
								      <li class="nav-item dropdown">
								        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><b>SERVICES</b>
								          
								        </a>
								        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
								          <a class="dropdown-item" href="https://www.bkkidneycare.com/"><i class="fa fa-ravelry" aria-hidden="true"></i> BK KIDNEY CARE</a>
								          <a class="dropdown-item" href="heartcare.php"><i class="fa fa-ravelry" aria-hidden="true"></i> BK HEART CARE</a>
								          <a class="dropdown-item" href="cancercare.php"><i class="fa fa-ravelry" aria-hidden="true"></i> BK CANCER CARE</a>
								          <a class="dropdown-item" href="kayasuddhi.php"><i class="fa fa-ravelry" aria-hidden="true"></i> KAYA SHUDDHI</a>
								          <a class="dropdown-item" href="immunitybooster.php"><i class="fa fa-ravelry" aria-hidden="true"></i> BK IMMUNITY BOOSTER</a>
								        </div>
								      </li>
								      <li class="nav-item dropdown">
								        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><b>PORTFOLIO</b>
								        
								        </a>
								        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
								         <a class="dropdown-item" href="gallery.php"><i class="fa fa-picture-o" aria-hidden="true"></i> GALLERY</a>
								          <a class="dropdown-item" href="video.php"><i class="fa fa-video-camera" aria-hidden="true"></i> Video</a>
								        </div>
								      </li>
								      <li class="nav-item dropdown">
								        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><b>LOGIN</b>
								        
								        </a>
								        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
								         <a class="dropdown-item" href="clog/index.php"><i class="fa fa-sign-in" aria-hidden="true"></i> ADVISOR LOGIN</a>
								          <a class="dropdown-item" href="http://arogyambharat.com/franchise/"><i class="fa fa-sign-in" aria-hidden="true"></i> FRANCHISE LOGIN</a>
								          <a class="dropdown-item" href="franchise.php"><i class="fa fa-sign-in" aria-hidden="true"></i> FRANCHISE REGISTER</a>
								        </div>
								      </li>
								      <li class="nav-item">
								        <a class="nav-link" href="contact.php"><b>CONTACT</b></a>
								      </li>
								      <li class="nav-item">
								        <a class="nav-link" href="patient.php"><b>DOWNLOAD</b></a>
								      </li>
								     
			
								    </ul>
								  </div>
								</nav>
							</div>
							<div class="side-panel-content">
								<div class="close-icon"> 
									<button><i class="webex-icon-cross"></i></button>
								</div>
								<div class="side-panel-logo mrb-30">
									<a href="<?php echo FULLURL ?>">
										<img src="images/logo.png" style="height: 150px;" alt="" class="mrb-20">
									</a>
								</div>
								<div class="side-info mrb-30">
									<div class="side-panel-element mrb-25">
										<h4 class="mrb-10">Office Address</h4>
										<ul class="list-items">
											<li><span class="fa fa-globe mrr-10 text-primary-color"></span><?php echo ADDRESS?></li>
											<li><span class="fa fa-envelope-o mrr-10 text-primary-color"></span>bk@bkarogyamhealthcare.com</li>
											<li><span class="fa fa-phone mrr-10 text-primary-color"></span><?php echo CONTACT?></li>
										</ul>
									</div>								</div>
								<h4 class="mrb-15">Social List</h4>
								<ul class="social-list">
									<li><a href="https://www.facebook.com/bkhealthcarepvt" target="_blank"><i class="fa fa-facebook-f"></i></a></li>
									<li><a href="https://twitter.com/ArogyamMission" target="_blank"><i class="fa fa-twitter"></i></a></li>
									<li><a href="https://www.instagram.com/missionarogyam/" target="_blank"><i class="fa fa-instagram"></i></a></li>
									<li><a href="https://www.youtube.com/channel/UCrFVKk45x1_boNZxrv3uM7g/videos" target="_blank"><i class="fa fa-youtube"></i></a></li>
								</ul>
							</div>
							<div class="mobile-menu"></div>
						</div>
					</div>
				</div>
			</div>



			
		</div>
	</header>