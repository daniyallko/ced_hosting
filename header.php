<?php 
session_start();
if(!isset($_SESSION['cart']))
{
  $_SESSION['cart']= array();
}

require 'class/product.php';

$adm = new product();
$admc = new dbcon();
$show = $adm->categ($admc->conn);

$filename = basename($_SERVER['REQUEST_URI']);
$file = explode('?',$filename);
$menu = array('catpage.php?id=5');


?>
<!DOCTYPE HTML>
<html>
<head>
<title>Planet Hosting a Hosting Category Flat Bootstrap Responsive Website Template | Home :: w3layouts</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Planet Hosting Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.js"></script>
<!---fonts-->
<link href='//fonts.googleapis.com/css?family=Voltaire' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!---fonts-->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" type="text/css">

<!--script-->
<script src="js/modernizr.custom.97074.js"></script>
<script src="js/jquery.chocolat.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<link rel="stylesheet" href="css/chocolat.css" type="text/css" media="screen">
<!--lightboxfiles-->
<link rel="stylesheet" href="css/swipebox.css">
			<script src="js/jquery.swipebox.min.js"></script> 
			    <script type="text/javascript">
					jQuery(function($) {
						$(".swipebox").swipebox();
					});</script>	
<script type="text/javascript" src="js/jquery.hoverdir.js"></script>	
						<script type="text/javascript">
							$(function() {
							
								$(' #da-thumbs > li ').each( function() { $(this).hoverdir(); } );

							});
						</script>						
<!--script-->
</head>
<body>
	<!---header--->
		<div class="header">
			<div class="container">
				<nav class="navbar navbar-default">
					<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
								<i class="sr-only">Toggle navigation</i>
								<i class="icon-bar"></i>
								<i class="icon-bar"></i>
								<i class="icon-bar"></i>
							</button>				  
							<div class="navbar-brand">
								<h1><a href="index.php"> <span id="logo1">Ced</span><span id="logo2">Hosting</span></a></h1>
							</div>
						</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav">
								<li <?php if($file[0]=='index.php') : ?> class="active"<?php endif; ?> ><a href="index.php">Home <i class="sr-only">(current)</i></a></li>
                                <li <?php if($file[0]=='about.php') : ?> class="active"<?php endif; ?>><a href="about.php">About</a></li>
                                <li <?php if($file[0]=='blog.php') : ?> class="active"<?php endif; ?>><a href="blog.php">Blog</a></li>
                                <li <?php if($file[0]=='pricing.php') : ?> class="active"<?php endif; ?>><a href="pricing.php">Pricing</a></li>
                                <li <?php if($file[0]=='services.php') : ?> class="active"<?php endif; ?>><a href="services.php">Services</a></li>
								<li class="dropdown <?php if(in_array($file[0], $menu)) : ?> active <?php endif; ?>">
									<a href="#" class="dropdown-toggle " data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hosting<i class="caret"></i></a>
									<ul class="dropdown-menu">
									<?php foreach($show as $key=>$val) { ?>
									<li <?php if($file[0]==$val['link']) : ?> class="active"<?php endif; ?>><a href='catpage.php?id=<?php echo $val["id"]; ?>'><?php echo $val['prod_name']; ?></a></li>
									<?php } ?>
									</ul>
								
                                <li <?php if($file[0]=='contact.php') : ?> class="active"<?php endif; ?>><a href="contact.php">Contact</a></li>
								<?php if(isset($_SESSION['userdata'])){ ?>
									<li <?php if($file[0]=='logout.php') : ?>class="active"<?php endif; ?>><a href="logout.php">Logout</a></li>
										<?php } else { ?>
                                <li <?php if($file[0]=='login.php') : ?>class="active"<?php endif; ?>><a href="login.php">Login</a></li><?php } ?>
                               <li <?php if($file[0]=='cart.php') : ?> class="active"<?php endif; ?>><a href="cart.php"><i class="fas fa-shopping-cart "></i>
							   <?php if(isset($_SESSION['cart'])){ ?>
							   <span class="badge"><?php echo count($_SESSION['cart']); ?></span><?php } ?></a></li> 
							</ul>
									  
						</div><!-- /.navbar-collapse -->
					</div><!-- /.container-fluid -->
				</nav>
			</div>
		</div>
	<!---header--->
