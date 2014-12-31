<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>The Classic Magazine</title>
	<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" /> 
	<link rel="stylesheet" type="text/css" href="<?php
bloginfo('stylesheet_url');
?>" /> 
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
  <?php
wp_head();
?>

</head>
<body>

<nav class="navbar navbar-fixed-top" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="/">
      	<img src="http://www.mag.thhsclassic.com/wp-content/themes/wp/images/logo-1.png" alt="">
      </a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="/">Home</a></li>
        <li class="dropdown-user">
          <a href="#" class="dropdown-toggle">
            Issues <span class="caret"></span>
          </a>
          
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">October 2014</a></li>
  	        <li><a href="#">November 2014</a></li>
            <li><a href="#">December 2014</a></li> 
          </ul>
        </li>
		  </ul>	
    </div><!--/.nav-collapse -->
  </div>
</nav>

