<?php
/**
 * Created by PhpStorm.
 * User: terry
 * Date: 10/13/15
 * Time: 11:26 PM
 */
session_start()
?>
<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js"> <!--<![endif]-->
<!--

Grill Template

http://www.templatemo.com/free-website-templates/417-grill

-->
<head>
  <meta charset="utf-8">
  <title>Grill Responsive Web Template</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width">

  <link
      href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800'
      rel='stylesheet' type='text/css'>

  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/terry_styles.css">
  <link rel="stylesheet" href="css/font-awesome.css">
  <link rel="stylesheet" href="css/templatemo_style.css">
  <link rel="stylesheet" href="css/templatemo_misc.css">
  <link rel="stylesheet" href="css/flexslider.css">
  <link rel="stylesheet" href="css/testimonails-slider.css">

  <script src="js/vendor/modernizr-2.6.1-respond-1.1.0.min.js"></script>
</head>
<body>
<!--[if lt IE 7]>
<p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser
  today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better
  experience this site.</p>
<![endif]-->

<header>
  <div id="top-header">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="home-account">
            <a href="#">Home</a>
            <a href="#">My account</a>
          </div>
        </div>
        <div class="col-md-6">
          <div class="cart-info">
            <i class="fa fa-shopping-cart"></i>
(<a href="#">5 items</a>) in your cart (<a href="#">$45.80</a>)
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="main-header">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="logo">
            <a href="#"><img src="images/logo.png" title="Grill Template" alt="Grill Website Template"></a>
          </div>
        </div>
        <div class="col-md-6">
          <div class="main-menu">
            <ul>
              <li><a href="index.php">Home</a></li>
              <li><a href="aboutus.php">About </a></li>
              <li><a href="contactus.php">Contact </a></li>
              <li><a href="products.php">Products</a></li>
              <li><a href="blog.php">Blog</a></li>
              <li><a href="calendar.php">Calendar</a></li>
              <li><a href="articles.php">Articles</a></li>
              <li><a href="preferences.php">Preferences</a></li>
              <li><a href="registration.php">Registration</a></li>

              <?php
                if ( empty($_SESSION['username']) ) {
                  echo "<li><a href=login.php>Login</a></li>";
                }
                else {
                  echo "<li><a href=login.php>Logout</a></li>";
                }
              ?>
            </ul>
          </div>
        </div>
        <div class="col-md-3">
          <div class="search-box">
            <form name="search_form" method="get" class="search_form">
              <input id="search" type="text"/>
              <input type="submit" id="search-button"/>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>
