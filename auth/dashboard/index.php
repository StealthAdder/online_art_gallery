<?php
    // Restrict URl ACCESS
    session_start();
    if(!isset($_SESSION['auth_name'])) {
        header("Location: /online_art_gallery/auth/index.php?AcessDenied!");
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Online Art Gallery</title>
<!-- // Stylesheets // -->
<!-- <link rel="stylesheet" type="text/css" href="/online_art_gallery/css/style.css" />
<link rel="stylesheet" type="text/css" href="/online_art_gallery/css/ddsmoothmenu.css" />
<link rel="stylesheet" type="text/css" href="/online_art_gallery/css/contentslider.css" />
<link rel="stylesheet" type="text/css" href="/online_art_gallery/css/jquery.fancybox-1.3.1.css" />
<link rel="stylesheet" type="text/css" href="/online_art_gallery/css/slider.css" />
<link rel="stylesheet" type="text/css" href="/online_art_gallery/css/jquery-ui.css"> -->

<!-- // Javascripts // -->
<!-- <script type="text/javascript" src="/online_art_gallery/js/jquery-1.10.2.js"></script>
<script type="text/javascript" src="/online_art_gallery/js/validation.js"></script>
<script type="text/javascript" src="/online_art_gallery/js/jquery.easing.1.2.js"></script>
<script type="text/javascript" src="/online_art_gallery/js/jquery.anythingslider.js"></script>
<script type="text/javascript" src="/online_art_gallery/js/anythingslider.js"></script>
<script type="text/javascript" src="/online_art_gallery/js/animatedcollapse.js"></script>
<script type="text/javascript" src="/online_art_gallery/js/ddsmoothmenu.js"></script>
<script type="text/javascript" src="/online_art_gallery/js/menu.js"></script>
<script type="text/javascript" src="/online_art_gallery/js/contentslider.js"></script>
<script type="text/javascript" src="/online_art_gallery/js/ddaccordion.js"></script>
<script type="text/javascript" src="/online_art_gallery/js/acrodin.js"></script>
<script type="text/javascript" src="/online_art_gallery/js/jquery.fancybox-1.3.1.js"></script>
<script type="text/javascript" src="/online_art_gallery/js/lightbox.js"></script>
<script type="text/javascript" src="/online_art_gallery/js/menu-collapsed.js"></script>
<script type="text/javascript" src="/online_art_gallery/js/cufon-yui.js"></script>
<script type="text/javascript" src="/online_art_gallery/js/trebuchet_ms_400-trebuchet_ms_700-trebuchet_ms_italic_700-trebuchet_ms_italic_400.font.js"></script>
<script type="text/javascript" src="/online_art_gallery/js/cufon.js"></script>
<script type="text/javascript" src="/online_art_gallery/js/jquery.validate.js"></script>
<script type="text/javascript" src="/online_art_gallery/js/jquery-ui.js"></script>
<link href='/online_art_gallery/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>
<script src="/online_art_gallery/js/jquery.dataTables.min.js"></script> -->

    <title>Dashboard</title>
  </head>
  <body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Online Art Gallery</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#">Store</a></li>
                <li><a href="#">Page 2</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['auth_name'];?></a></li>
                <li><a href="/online_art_gallery/auth/includes/auth.logout.php"><span class="glyphicon glyphicon-log-in"></span> Logut</a></li>
            </ul>
        </div>
    </nav>

<div>
    <h4 class="heading colr">All Avialbale Arts</h4>

    <div class="static">
    <!-- type_id ?? -->
    <?php

        include ("/var/www/html/access/access_art.php");

        $con = mysqli_connect($server, $user, $pass, $db);
        unset($server, $user, $pass, $db);
        $SQL="SELECT * FROM `art`, `Artists`, `type` WHERE product_type_id = type_id AND product_company_id = company_id";
        $rs=mysqli_query($con,$SQL) or die(mysqli_error($con));
    ?>
    <?php 
        // whats sr_no=1?
                    $sr_no=1;
                    while($data = mysqli_fetch_assoc($rs))
                    {
                    ?>

        <!-- Generating Gallery view for art -->
                    <div style="float:left; border:1px solid; margin:8px; padding:8px">
        <!-- a tag creates the url for product after clicking the art from home page  -done-->
        <!-- Check product-details.php -notdone //// -->
                        <a href="/online_art_gallery/auth/dashboard/product-details.php?product_id=<?php echo $data[product_id] ?>">
            <!-- Load image of the icon -->
            <img src="<?=$SERVER_PATH.'/online_art_gallery/uploads/'.$data[product_image]?>" style="height:180px; width:150px"></a><br>
                        
            <!-- Name of the image -->
            <div style="text-align:center; border-top:2px solid; padding: 5px 0px; font-weight:bold; font-size:14px;">
            <?=$data[product_name]?>
            </div></div>
        <?php } ?></div>
        <div class="clear"></div>
    </div>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>