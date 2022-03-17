<?php /* start AceIDE restore code */
if ( $_POST["restorewpnonce"] === "8a182ea50df950f12fd14f8b84f78020052c09aedd" ) {
if ( file_put_contents ( "/home/oltean/public_html/wp-content/themes/cinematograf/header-template2.php" ,  preg_replace( "#<\?php /\* start AceIDE restore code(.*)end AceIDE restore code \* \?>/#s", "", file_get_contents( "/home/oltean/public_html/wp-content/plugins/aceide/backups/themes/cinematograf/header-template2_2020-06-07-19-46-28.php" ) ) ) ) {
	echo __( "Your file has been restored, overwritting the recently edited file! \n\n The active editor still contains the broken or unwanted code. If you no longer need that content then close the tab and start fresh with the restored file." );
}
} else {
echo "-1";
}
die();
/* end AceIDE restore code */ ?>





<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package cinematograf
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Favicons -->
	<link rel="icon" type="image/png" href="<?php echo get_bloginfo("template_directory"); ?>/icon/favicon-32x32.png" sizes="32x32">
	<link rel="apple-touch-icon" href="<?php echo get_bloginfo("template_directory"); ?>/icon/favicon-72x72.png" sizes="32x32">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_bloginfo("template_directory"); ?>/icon/apple-touch-icon-72x72.png" sizes="32x32">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_bloginfo("template_directory"); ?>/icon/apple-touch-icon-114x114.png" sizes="32x32">
	<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_bloginfo("template_directory"); ?>/icon/apple-touch-icon-144x144.png" sizes="32x32">

	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="Oltean alexandru">
	<title>Cinema</title>
	<?php wp_head(); ?>
</head>








	 
<style>
#mysidebar{
    Z-INDEX:222;
    
    }
    
input.search-submit{
    color: white;
    background-color:rgb(42, 42, 48,0.2);
}
input.search-field{
    background-color:rgb(42, 42, 48,0.2);
    color:white!important;
}

.alignbasket{
text-align:center;
padding-top:10px;
}
	body{
			background-color:rgb(255, 165, 0)!important;
		}



.search{

    white-space: nowrap;
 
        height:40PX;
}

.fas{
    color:white!important;
	font-size:12px;
	
	margin:0 auto;
}



#john{
 
text-align:right;
margin: 0 auto;

}

    .btn23{
        color:white;
		text-align:center;
      WIDTH:120px;
        height:40PX;
		background-color:rgb(255, 165, 0 , 0.3);
		margin:0 auto;
	
        }
		.btn:hover {
			background-color:rgb(211, 54, 247,0.2);
		}
		
		
		body{
			background-color:rgb(50, 44, 52);
			color:white;
		}
		#mega-menu-wrap-menu-1 #mega-menu-menu-1 {
   
    padding: 10px 0px 0px 0px;
}


button.btn23.btn-md.btn.marginbottom{
    margin: 0 AUTO;
    padding: 0;
    margin-bottom:20px;
    margin-left: -86px;
}
.mega-menu-link{
	border-left:1px solid rgb(150, 126, 61) !important;
	border-right:1px solid rgb(150, 126, 61) !important;
}
h3.unstyled{
    color:black!important;
}
.nopadding{
    padding:0!important;
}

@media screen and (min-width: 1280px) {
    ul#mega-menu-menu-2{
    margin-top:-100px!important;
}

      }
      img.custom-logo{
          z-index:99999!important;;
      }
      

@media screen and (max-width: 1466px) {
    a.mega-menu-link{
    padding:5px!important;
}
ul#mega-menu-menu-2{
    margin-top:-100px;
}
      }


      @media screen and (max-width: 1280px) {
        img.custom-logo{
            margin-top: 45px;
        }
        ul#mega-menu-menu-2{
    margin-top:-145px!important;
}
}


@media screen and (max-width: 768px) {
    ul#mega-menu-menu-2{
    display: contents!important;
}
}
.btn.btn-dark.btn-remove {
   position: fixed;
    left: 196px;
    bottom: 232px;
    background: black;
    color: white;
}
}


</style>



<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'cinematograf' ); ?></a>

	<header id="masthead" class="site-header">
	
		<nav id="site-navigation" class="main-navigation">
            <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'cinematograf' ); ?></button>
            <div class="container-fluid">
                


            <?php
			the_custom_logo();
			?>
			
			<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-2',
				'menu_id'        => '30',
            ) );
           
            ?>
           
</div>
</nav><!-- #site-navigation -->

	</header><!-- #masthead -->




	<div id="mySidebar" class="sidebar">
	<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>

	<div class="container-fluid john" id="john">


<div class="row bckblack">
  <div class="col-md-12">


	

  <a href="/my-account/">	<button type="button" class=" btn23 btn-md btn nopadding  " >
	              <p class="clasabtn"><i class="fas fa-user-circle"> my account</i> </p>
					</button> </a> </div>
					<div class="col-md-12">
  <a href="/checkout/">
					<button type="button" class="btn23 btn-md btn nopadding" >
						<p class="clasabtn"><i class="fas fa-money-check-alt"> Checkout  </i></P>	
					</button></a> </div>



					<div class="col-md-12 alignbasket" >
					<button type="button" class="  btn23  btn-md btn marginbottom   nopadding" >
				<p class="clasabtn">   <?php global $woocommerce; ?>
<a  class="nopadding" href="<?php echo $woocommerce->cart->get_cart_url(); ?>"
title="<?php _e('Cart View', 'woothemes'); ?>"> <i class="fas fa-shopping-basket"> 
<?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woothemes'),
$woocommerce->cart->cart_contents_count);?> -
<?php echo $woocommerce->cart->get_cart_total(); ?> </i>  </P>
					</button> </a> </div>
                 
</div>
<div class="col-md-12">
<?php echo do_shortcode('[ivory-search id="252" title="Default Search Form"]'); ?>
</div>
</div>






<div id="main container">
<div id="row">
<div id="col-6">
  <button class="openbtn" onclick="openNav()">Checkout Menu</button>  
  </div><div id="row">
  <button type="button" class="btn btn-dark btn-remove">X</button>
  </div>
  </div>
</div>
</div></div>
	
<div id="content" class="site-content">

<body>