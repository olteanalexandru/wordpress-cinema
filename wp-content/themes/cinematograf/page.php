<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package cinematograf
 */

get_header('template2'); ?>



<div id="primary" class="content-area">
		<main id="main" class="site-main container-fluid  fixed-top " >
        <div class="row bckdwhite">


		<div class="col-md-6 marg0 ">
		<div class="content23">





<div class="  align-single2  displaycv">

<div class="row space">
		<div class="col-md-12 acfnomarg white">

        <?php	dynamic_sidebar('banner_widget_sidebar'); ?>
<?php
        while ( have_posts() ) :
			the_post();


		

		endwhile; // End of the loop.
		?>
        </div>
        
</div>
<div class="col-md-3 width23">
		</div></div>
<?php
get_template_part( 'template-parts/content', 'page' );
// If comments are open or we have at least one comment, load up the comment template.
if ( comments_open() || get_comments_number() ) :
    comments_template();
endif; ?>

        
		</main><!-- #main -->
	</div><!-- #primary -->


</div>

<div>










</div>
</div>

        </div>
		</main><!-- #main -->
	</div><!-- #primary -->









   




<style>

.bckdwhite{
    background-color:white;
    margin:0;
}
.displaycv{
    display:block;
    text-align: center;
}
   
.white{
    color:black;
}
.marg0{
	display:block;
    margin: auto;
padding-top:5%;
padding-bottom:15%;
text-align:left!important;
padding-left:1%;
background-color:white;
margin:0px auto;
border-left:solid 2px rgb(206, 141, 37 , 0.235);
	border-right:solid 2px rgb(206, 141, 37 , 0.235);
}

.acfnomarg{
    margin:0 auto;
}
#primary {
    border-bottom: 1px dotted rgb(76, 74, 71);
}
</style>







<?php 
get_footer('template2'); 
?> 