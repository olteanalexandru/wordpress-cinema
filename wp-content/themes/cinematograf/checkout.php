<?php
/*Template Name: Checkout page template*/


get_header('template2');
?>



<div id="primary" class="content-area">
		<main id="main" class="site-main container  fixed-top " >
        <div class="row">
		
		<div class="col-md-12 acfnomarg white">

<?php

echo do_shortcode('[woocommerce_checkout]');

?>


</div>

        </div>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php
 get_footer('template2'); 
 
?>