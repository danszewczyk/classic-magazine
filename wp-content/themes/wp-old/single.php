<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title><?php
the_title();
?> - Classic Magazine</title>
<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" /> 
	<link rel="stylesheet" type="text/css" href="<?php
bloginfo('stylesheet_url');
?>" /> 
<style>
/*Styles*/
</style>

</head>
<body>

<nav class="navbar navbar-fixed-top single" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="/">
        <img src="http://www.mag.thhsclassic.com/wp-content/themes/wp/images/logo-1-black.png" alt="">
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

<?php
while (have_posts()):
    the_post();
    $url = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
?>
 

 




<div class="hero-image" style="background: url('<?php
    echo $url;
?>') no-repeat fixed; background-position: center center; -webkit-background-size: cover;
-moz-background-size: cover;
-o-background-size: cover;
background-size: cover;">
<h2><?php
    the_title();
?></h2>
</div>

<section class="page-content">
	<?php
    the_content();
?>	
</section>


<?php
endwhile;
?>

</body>
</html>