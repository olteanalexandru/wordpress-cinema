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









<div class="container-fluid " >
	<div class="row john" id="john">
		<div class="col-3">
        <?php
		the_custom_logo();
        ?>
        </div>	
	
		<div class="col-9">
		
				<div class="col-12 d-flex  flex-row-reverse">



				<a href="/my-account/">	<button type="button" class=" btn  btn-md " >
	              <p class="clasabtn"><i class="fas fa-user-circle"> my account</i> </p>
					</button> </a>
				
					
<a href="/basket/">
					<button type="button" class="  btn widthwoo  btn-md " >
				<p class="clasabtn"> <i class="fas fa-shopping-basket"> </i>  <?php global $woocommerce; ?>
<a class="your-class-name fas2" href="<?php echo $woocommerce->cart->get_cart_url(); ?>"
title="<?php _e('Cart View', 'woothemes'); ?>">
<?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woothemes'),
$woocommerce->cart->cart_contents_count);?> -
<?php echo $woocommerce->cart->get_cart_total(); ?>   </P>
					</button> </a>
					
           
                    
					
				
                    </div>
                    </div>
                    </div>
                  
		<div class="container">

			<div class="row ">
				<div class="col-12 responsive21">    
		
     

       


		<div id="page" class="site ">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'cinematograf' ); ?></a>
  
	<header id="masthead" class="site-header">
   
		<nav id="site-navigation" class="main-navigation">
      
            <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'cinematograf' ); ?></button>
          
			<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
				
			) );
			?>
			
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

    </div>
</div>
		</div>
        </div>
       
		
      
<style>
.container-fluid{
    overflow-x:hidden;
}
.container-fluid.fluid23{
    overflow-x:visible;

}

.flexcenter{
    flex-direction: column-reverse; 
}

ul#mega-menu-menu-1{
    white-space: nowrap;
}



.site-branding img.custom-logo{
    background-color:rgb(50, 44, 52,0.2);
}

.col-12.responsive21{
    z-index:99;
}

ul#mega-menu-menu-1{
    margin-top: -2.5%;
    position:relative;
    top:-2.5%;
}

.search.clasabtn{
;
    

    z-index: 300000;
    


}

}

.clasabtn{
    color:#b4ae9f;
    
   
}
button.btn.widthwoo.btn-md{
    white-space: nowrap;
}
.fas{
	color:white!important;
	font-size:12px;
}
.fas2{
    color:white!important;
   
}


#john{
   

    position: sticky!important;
   
    z-index:600;
    background-color:transparent;
  
	}
	
    .btn{
		text-align:center;
      
        height:50PX;
		background-color:rgb(42, 42, 48,0.4);
        margin-right:20px;
        }
		.btn:hover {
			background-image: url("/wp-content/uploads/2020/03/asta.png");
		}
		
	
		body{
			background-color:rgb(50, 44, 52);
		}


nav , header, #site-navigation{
	z-index:6!important; 
	

}
ul#mega-menu-menu-1{
	background-color:transparent!important;
}


    
           
   
    
 
 
    


</style>





<div id="content" class="site-content">
<body>
		


