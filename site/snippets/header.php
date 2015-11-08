<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0">

  <title><?php echo $site->title()->html() ?> | <?php echo $page->title()->html() ?></title>
  <meta name="description" content="<?php echo $site->description()->html() ?>">
  <meta name="keywords" content="<?php echo $site->keywords()->html() ?>">
  <link rel="shortcut icon" type="image/png" href="<?php echo($site->url() . '/assets/images/favicon.png')?> "/>

  <?php

    echo css('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css');
    echo css('https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css');

    echo js('https://code.jquery.com/jquery-2.1.4.min.js');
    echo js('assets/js/jquery.fitvids.js');
    echo js('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js');
    echo js('assets/js/main.js');
    echo css('assets/css/main.css');

  ?>

</head>
<body>

  <header class="header" role="banner">
  <div class="top"></div>
   <div class="container">
    <h1><a href="<?php echo $site->url() ?>"><span class="titleFirst">De <span class="Ttuut">t</span><span class="skew1">u</span><span class="skew2">u</span><span class="Ttuut">t</span> van</span><span class="titleSecond">tegenwoordig<strong>.</strong>be</span></a></h1>
    <div class="social">
      <ul>
        <li><a href="http://www.twitter.com/detuutbe" target="_blank"><i class="fa fa-twitter"></i></a></li>
        <li><a href="https://www.facebook.com/tuutvantegenwoordig" target="_blank"><i class="fa fa-facebook"></i></a></li>
        <!--<li><a href="#" class="search"><i class="fa fa-search"></i></a></li>-->
      </ul>
    </div>
        </div>
        <?php snippet('menu') ?>
     <div class="uuu"></div>
  </header>