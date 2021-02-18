<?php 
require_once("dbcn.php");
?>

<style>
	.profitBox {
    width: 100%;
    min-height: 170px;
    text-align: center;
    display: block;
    cursor: pointer;

}
.plan-img{
	width: 900px;
}
.profitBox .accumulativeBg {
    background: #c8ae6f;
    border-radius: inherit;
    border-radius: 30px;
}
.profitBox .directorBg {
    background: #c88c6f;
    border-radius: inherit;
    border-radius: 30px;
}
.profitBox .leadershipBg {
    background: #c86f6f;
    border-radius: inherit;
    border-radius: 30px;
}
.profitBox .travelBg {
    background: #76a1cc;
    border-radius: inherit;
    border-radius: 30px;
}
.profitBox .houseBg {
    background: #8a95a0;
    border-radius: inherit;
    border-radius: 30px;
}
.profitBox .retailBg {
    background: #5b7c9d;
    border-radius: inherit;
    border-radius: 30px;
}
.profitBox .carBg {
    background: #85749a;
    border-radius: inherit;
    border-radius: 30px;
}
.benifit ul li {
    display: block;
    padding: 10px 0;
}
	.profitBox .savingBg {
    background: #809f3c;
    border-radius: inherit;
    border-radius: 30px;
}
@media (min-width: 480px){
.profitBox span {
    display: block;
    width: 150px;
    height: 150px;
}
}
.profitBox span {
    display: block;
    width: 110px;
    height: 110px;
    margin: 0 auto;
    background: #999;
    color: #fff;
    border-radius: 50%;
    position: relative;
}
@media (min-width: 1340px){
.col-lg-3 {
    width: 25%;
}
}
.benifit {
    background: #e2edfe;
    padding: 20px 0 0;
    margin: 0;

}
.companyPage .cd-tabs-content h2 {
    background: 0 0;
    color: #444;
    margin: 0 0 20px;
}
.benifit .title, .marketingPlan .title {
    font-size: 17px;
}
.companyPage .title {
    background: #333;
    color: #fff;
    padding-top: 20px;
}
@media (min-width: 768px){
.title {
    font-size: 28px;
}
}
.title {
    font-size: 20px;
    padding: 10px 0;
    text-align: center;
}
.li {
    list-style: none;
}
@media (min-width: 1340px){
.col-lg-offset-2 {
    margin-left: 16.66666667%;
}
}
@media (min-width: 1340px){
.col-lg-8 {
    width: 66.66666667%;
}
}
@media (min-width: 1340px){
.col-lg-1, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-lg-10, .col-lg-11, .col-lg-12 {
    float: left;
}
}
@media (min-width: 480px){
.profitBox span small {
    width: 150px;
    min-height: 78px;
    top: 50%;
    left: 50%;
    margin: -34px 0 0 -75px;
    font-size: 55px;
}
}

.profitBox span small {
    display: block;
    position: absolute;
    width: 110px;
    min-height: 52px;
    top: 50%;
    left: 50%;
    margin: -26px 0 0 -55px;
    font-size: 36px;
    font-weight: 500;
}
@media (min-width: 480px){
.profitBox b {
    bottom: 10px;
}
}
.profitBox b {
    font-size: 20px;
    position: absolute;
    bottom: 5px;
    left: 50%;
    margin-left: -9px;
}

.w3-container, .w3-panel {
    padding: 0.01em 16px;
    margin-top: 43px;
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
	<meta name="keywords" content="  " />
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

	<title>Plan | <?php echo COMPANY;?></title>
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
					<h2 class="text-uppercase text-white mrb-10">Plan</h2>
					<ul class="mb-0 justify-content-center">
						<li class="breadcrumb-item"><a href="<?php echo FULLURL ?>" class="text-white">Home</a></li>
						<li class="breadcrumb-item text-primary-color">Plan</li>
					</ul>
				</div>
			</div>
		</div>
	</section> 
	<!-- Page Title End -->
    			<!-- Pricing Plan -->
		<section class="pricing section-space">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-12">
						<div class="section-title default text-center">
							<div class="section-top">
								<h1 style="margin-top: 100px"><span>Opportunities</span></h1>
							</div>
						</div>  
					</div>
				</div>
				<div style="text-align: center; margin-bottom: 100px">
					<p>The starting point of any journey is the knowledge. If you have the knowledge about the path on which you are going to travel then your journey can be made easier and more successful. We emphasize that when you register yourself as an Arogyam advisor, please read the Healthcare Plan and understand the opportunity which lies in front of you to fulfill your dreams.</p>
					
					<p>The starting point of any journey is the knowledge. If you have the knowledge about the path on which you are going to travel then your journey can be made easier and more successful. We emphasize that when you register yourself as an Arogyam advisor, please read the Healthcare Plan and understand the opportunity which lies in front of you to fulfill your dreams.</p>
				</div>
				
		</section>
		 		<div class="benifit">
                  <div style="margin-right: 0px; margin-left: 0px;" class="row">
                    <div class="col-xs-12 col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
                      <h2 class="title" >10 ways of income</h2>
                      <ul>
                        <li class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                          <a class="profitBox benefitBtn wow bounceIn" data-wow-delay="0.2s" >
                           <span class="savingBg" onclick="document.getElementById('id01').style.display='block'"> <small>10-20</small> <b>%</b> </span>
                            <p >Retail Income</p>
                          </a>
                        </li>
                        <li class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                          <a class="profitBox benefitBtn wow bounceIn" data-wow-delay="0.2s" >
                          	<span class="accumulativeBg"> 
                              <small  onclick="document.getElementById('id02').style.display='block'"> 10</small><b>%</b> </span>
                            <p>Direct Sales Income </p>
                          </a>
                        </li>
                        <li class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                          <a class="profitBox benefitBtn wow bounceIn" data-wow-delay="0.2s"  > 
                              <span  onclick="document.getElementById('id03').style.display='block'" class="directorBg"> <small>30</small><b>%</b></span>
                            <p>Arogyam Group  Income </p>
                          </a>
                        </li>

                            <li class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                          <a class="profitBox benefitBtn wow bounceIn" data-wow-delay="0.2s" > 
                              <span   onclick="document.getElementById('id04').style.display='block'" class="savingBg"><small> 10 </small><b>%</b> </span>
                            <p>Arogyam Leadership Income</p>
                          </a>
                        </li>

                        <li class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                          <a class="profitBox benefitBtn wow bounceIn" data-wow-delay="0.3s" >
                              <span  onclick="document.getElementById('id05').style.display='block'" class="leadershipBg"> <small>7</small><b>%</b> </span>
                            <p>Arogyam Consistency Income</p>
                          </a>
                        </li>

                       	<li class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                          <a class="profitBox benefitBtn wow bounceIn" data-wow-delay="0.3s" >
                              <span  onclick="document.getElementById('id06').style.display='block'" class="travelBg"> <small>10</small><b>%</b> </span>
                            <p>Arogyam Health Club Fund </p>
                          </a>
                        </li>

                        <li class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                          <a class="profitBox benefitBtn wow bounceIn" data-wow-delay="0.3s" > 
                          	<span  onclick="document.getElementById('id07').style.display='block'" class="carBg"> <small>10 </small> <b>%</b></span>
                            <p>Arogyam Luxury  Income </p>
                          </a>
                        </li>
                        <li class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                          <a class="profitBox benefitBtn wow bounceIn" data-wow-delay="0.3s"  > 
                          	<span  onclick="document.getElementById('id08').style.display='block'" class="houseBg"> <small>8</small><b>%</b> </span>
                            <p>Arogyam Car Fund </p>
                          </a>
                        </li>

                        <li class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                          <a class="profitBox benefitBtn wow bounceIn" data-wow-delay="0.2s" >
                              <span  onclick="document.getElementById('id09').style.display='block'" class="retailBg"><small> 8 </small><b>%</b> </span>
                            <p>Arogyam Travel Fund </p>
                          </a>
                        </li>

                        <li class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                          <a class="profitBox benefitBtn wow bounceIn" data-wow-delay="0.2s"  > 
                              <span  onclick="document.getElementById('id10').style.display='block'" class="directorBg"> <small>8</small><b>%</b></span>
                            <p>Arogyam House Fund </p>
                          </a>
                        </li>                         
                      </ul>
                    </div>
                  </div>
                </div>	
		<!--/ End Pricing Plan -->	
	<!-- Footer Area Start -->
	<?php include("inc/footer.php")?>
	<!-- Footer Area End -->

	<div id="id01" class="w3-modal">
	    <div class="w3-modal-content">
	      <div class="w3-container">
	        <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span>
	        <p style="margin-top: 20px;">Retail Income </p>
	        <img style="padding-bottom: 30px " src="images/plan/Slide8.PNG">
	      </div>
	    </div>
	  </div>
	</div>

	<div id="id02" class="w3-modal">
	    <div class="w3-modal-content">
	      <div class="w3-container">
	        <span onclick="document.getElementById('id02').style.display='none'" class="w3-button w3-display-topright">&times;</span>
	         <p style="margin-top: 20px;">Direct Sales Income</p>
	        <img style="padding-bottom: 30px " src="images/plan/Slide9.PNG">
	      </div>
	    </div>
	  </div>
	</div>

	<div id="id03" class="w3-modal">
	    <div class="w3-modal-content">
	      <div class="w3-container">
	        <span onclick="document.getElementById('id03').style.display='none'" class="w3-button w3-display-topright">&times;</span>
	         <p style="margin-top: 20px;">Arogyam Group  Income </p>
	        <img style="padding-bottom: 30px " src="images/plan/Slide10.PNG">
	      </div>
	    </div>
	  </div>
	</div>

	<div id="id04" class="w3-modal">
	    <div class="w3-modal-content">
	      <div class="w3-container">
	        <span onclick="document.getElementById('id04').style.display='none'" class="w3-button w3-display-topright">&times;</span>
	         <p style="margin-top: 20px;">Arogyam Leadership Income </p>
	        <img style="padding-bottom: 30px " src="images/plan/Slide11.PNG">
	      </div>
	    </div>
	  </div>
	</div>

	<div id="id05" class="w3-modal">
	    <div class="w3-modal-content">
	      <div class="w3-container">
	        <span onclick="document.getElementById('id05').style.display='none'" class="w3-button w3-display-topright">&times;</span>
	         <p style="margin-top: 20px;">Arogyam Consistency Income</p>
	        <img style="padding-bottom: 30px " src="images/plan/Slide12.PNG">
	      </div>
	    </div>
	  </div>
	</div>

	<div id="id06" class="w3-modal">
	    <div class="w3-modal-content">
	      <div class="w3-container">
	        <span onclick="document.getElementById('id06').style.display='none'" class="w3-button w3-display-topright">&times;</span>
	         <p style="margin-top: 20px;">Arogyam Health Club Fund</p>
	        <img style="padding-bottom: 30px " src="images/plan/Slide13.PNG">
	      </div>
	    </div>
	  </div>
	</div>

	<div id="id07" class="w3-modal">
	    <div class="w3-modal-content">
	      <div class="w3-container">
	        <span onclick="document.getElementById('id07').style.display='none'" class="w3-button w3-display-topright">&times;</span>
	         <p style="margin-top: 20px;">Arogyam Luxury  Income </p>
	        <img style="padding-bottom: 30px " src="images/plan/Slide14.PNG">
	      </div>
	    </div>
	  </div>
	</div>

	<div id="id08" class="w3-modal">
	    <div class="w3-modal-content">
	      <div class="w3-container">
	        <span onclick="document.getElementById('id08').style.display='none'" class="w3-button w3-display-topright">&times;</span>
	         <p style="margin-top: 20px;">Arogyam Car Fund </p>
	        <img style="padding-bottom: 30px " src="images/plan/Slide15.PNG">
	      </div>
	    </div>
	  </div>
	</div>

	<div id="id09" class="w3-modal">
	    <div class="w3-modal-content">
	      <div class="w3-container">
	        <span onclick="document.getElementById('id09').style.display='none'" class="w3-button w3-display-topright">&times;</span>
	         <p style="margin-top: 20px;">Arogyam Travel Fund</p>
	        <img style="padding-bottom: 30px " src="images/plan/Slide16.PNG">
	      </div>
	    </div>
	  </div>
	</div>

	<div id="id10" class="w3-modal">
	    <div class="w3-modal-content">
	      <div class="w3-container">
	        <span onclick="document.getElementById('id10').style.display='none'" class="w3-button w3-display-topright">&times;</span>
	         <p style="margin-top: 20px;">Arogyam House Fund</p>
	        <img style="padding-bottom: 30px " src="images/plan/Slide17.PNG">
	      </div>
	    </div>
	  </div>
	</div>

<script>
var x = document.getElementById("myDialog"); 

function showDialog() { 
  x.show(); 
} 

function closeDialog() { 
  x.close(); 
} 
</script>
</body>
</html>