<?php
require_once("dbcn.php");

?>
<style>

.card{
background-image: url("../static/img/leafe2.png");
width:290px;
height: 400px;
margin-left: 170px;
border-radius: 10px;
border: 0px solid;
padding: 10px;
box-shadow: 2px 10px 17px 10px #888888;
}
.heading{
margin-left: 150px;
margin-top: 100px;
}
.downlodbtn{
background-color: green;
width: 120px;
border-radius: 40px;
padding: 10px;
margin-top: 0px;
margin-left: 20px;
text-align: center;
height: 45px;
color: #fff;
}
.readbtn{
background-color: green;
width: 100px;
border-radius: 40px;
padding: 10px;
margin-top: -36px;
margin-left: 120px;
text-align: center;
height: 45px;

}
.patientimg{
width: 150px;
margin-left: 64px;
margin-top: 20px;
border-width: 20px;
border-color: white;
}
.patientname{
font-size: 20px;
color: black;
margin-top: 20px;
text-align: center;
font-family: bold;
font-weight: 900;
}
.patientdiseases{
font-size: 14px;
color: black;
margin-top: 31px;
text-align: center;

}
.hr{
width: 400px;
border-width: 5px;
margin-left: 0px;
}
.row {

margin-right: 0px !important;
margin-left: -15px;
}


@media only screen and (max-width: 600px) {
.card{
background-color: forestgreen;
width:600px;
height: 400px;
margin-left: 60px;
border-radius: 10px;
margin-top: 20px;
}

.row{
width: 400px;


}


.hr{
width: 221px;
border-width: 5px;
margin-left: 0px;
}
.heading{
margin-left: 10px;
margin-top: 100px;
}
.patientimg{
width: 150px;
margin-left: 82px;
margin-top: 20px;
border-width: 20px;
border-color: white;
}
.downlodbtn {
background-color: green;
width: 106px;
border-radius: 40px;
padding: 10px;
margin-top: 0px;
margin-left: 41px;
text-align: center;
height: 40px;
}
.readbtn {
background-color: green;
width: 87px;
border-radius: 40px;
padding: 10px;
margin-top: -40px;
margin-left: 120px;
text-align: center;
height: 45px;
}
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<title><?php echo COMPANY?></title>
<?php include("inc/common_head.php")?>

</head>

<body>

<!-- header Start -->
<?php include("inc/header.php")?>



<!-- Start Page Title Area -->
<section class="page-title-section">
<div class="container">
<div class="row">
<div class="col-xl-12 text-center">
<h2 class="text-uppercase text-white mrb-10">Download</h2>
<ul class="mb-0 justify-content-center">
<li class="breadcrumb-item"><a href="<?php echo FULLURL ?>" class="text-white">Home</a></li>
<li class="breadcrumb-item text-primary-color">Download</li>
</ul>
</div>
</div>
</div>
</section>
<!-- End Page Title Area -->

<h3 class="heading">
    <b> Our <span style="color: green"> PDF'S </span></b>
    <hr class="hr" >
</h3>

<!-- Patient Report Start -->
<div class="row">
    <div class="card" style="width: 23rem;">
        <img src="images/arogyam/fr.jpg" class="card-img-top center" alt="">
        <div class="card-body">
            <h5 class="card-title">Arogyam Health Awareness Program :</h5>
            <p class="card-text ">Make Aware society with Arogyam Health Program .</p>
            <div class="downlodbtn">
            <a href="hepr.pdf" target="_blank" download="Health"><span style="color: white">Download</span></a>
            <div class="readbtn">
                <form method="post" action="download.php">
                    <input type="hidden" name="hepr" value="hepr">
                    <button style="background-color: transparent;" target="_blank"><span style="color: white; cursor: pointer;">Read</span></button>
                </form>
            </div>
        </div>
        </div>
    </div>
    <div class="card" style="width: 23rem;">
        <img src="images/arogyam/bkfront.jpg" class="card-img-top" alt="">
        <div class="card-body">
            <h5 class="card-title">BK Arogyam Healthcare joining Form :</h5>
            <p class="card-text ">Just Make people wealthy with Mission: Arogyam Bharat .</p>
            <div class="downlodbtn">
            <a href="form.pdf" target="_blank" download="Form"><span style="color: white">Download</span></a>
            <div class="readbtn">
                <form method="post" action="download.php">
                    <input type="hidden" name="form" value="form">
                    <button style="background-color: transparent;"  ><span style="color: white; cursor: pointer;">Read</span></button>
                </form>
            </div>
        </div>
        </div>
    </div>

    <div class="card" style="width: 23rem;">
        <img src="images/arogyam/image.jpg" class="card-img-top" alt="">
        <div class="card-body">
            <h5 class="card-title">BK Arogyaveda Product Catalog :</h5>
            <p class="card-text ">Be healthy and safe with arogyaveda products .</p>
            <div class="downlodbtn">
            <a href="pecat.pdf" target="_blank" download="Product Catalog"><span style="color: white">Download</span></a>
            <div class="readbtn">
                <form method="post" action="download.php">
                    <input type="hidden" name="pecat" value="pecat">
                    <button style="background-color: transparent;"><span style="color: white; cursor: pointer;">Read</span></button>
                </form>
            </div>
        </div>
        </div>
    </div>


</div>
<br>
<br>
<br>
<br>
<br>
<br>
<?php include("inc/footer.php")?>

</body>
</html>