
<?php
 get_header(); 

$args = array(
    'post_type' => 'my_movies',
    'posts_per_page' => -1,
);

$the_query = new WP_Query( $args ); ?>
 
<?php if ( $the_query->have_posts() ) : ?>
<!-- home -->

        
<section class="home ">
		<!-- home bg -->
		<div class="owl-carousel home__bg ">
			<div class="item home__cover" data-bg="<?php echo get_bloginfo("template_directory"); ?>/img/home/home__bg.jpg"></div>
			<div class="item home__cover" data-bg="<?php echo get_bloginfo("template_directory"); ?>/img/home/home__bg2.jpg"></div>
			<div class="item home__cover" data-bg="<?php echo get_bloginfo("template_directory"); ?>/img/home/home__bg3.jpg"></div>
			<div class="item home__cover" data-bg="<?php echo get_bloginfo("template_directory"); ?>/img/home/home__bg4.jpg"></div>
		</div>
		<!-- end home bg -->

		<div class="container-fluid fluid23">
			<div class="row">
				<div class="col-12">
					<h1 class="home__title"><b>Latest</b> Movies in our Database </h1>

					
				</div>


				

				<div class="col-12">
					<div class="owl-carousel home__carousel">
						
				
					<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

			<div class="item">
                            <!-- card -->
                            
							<div class="card card--big">
								<div class="card__cover">
								<img src="<?php the_field('movie_cover'); ?>" alt="Movie's Cover">
									<a href="<?php echo get_permalink( $id ) ?>" class="card__play">
										<i class="icon ion-ios-play"></i>
									</a>
								</div>
								<div class="card__content">
									<h3 class="card__title">  <a href="<?php echo get_permalink( $id ) ?> ">       <?php the_field( 'title' ); ?></a></h3>
									<span class="card__category">
                                <?php    $terms = get_term( 'genre' );
 

  
 foreach ( $terms as $term ) {


 
                                  ?>  <a href="<?php esc_url( $term_link ) ?>">

                             <?php   }
                                ?>
<?php $genre_terms = get_field( 'genre' ); ?>
<?php if ( $genre_terms ): ?>
	<?php foreach ( $genre_terms as $genre_term ): ?>
		<?php echo $genre_term->name; ?>
	<?php endforeach; ?>
<?php endif; ?></a>
									</span>
									<span class="card__rate"></i><?php the_field( 'release_date' ); ?></span>
								</div>
							</div>
							<!-- end card -->
							</div>
					
							
					

                        
                            <?php endwhile; ?>
                       </div>
                </div>
            </div>
            <div class="col-12">
					<button class="home__nav home__nav--prev" type="button">
						<i class="icon ion-ios-arrow-round-back"></i>
					</button>
					<button class="home__nav home__nav--next" type="button">
						<i class="icon ion-ios-arrow-round-forward"></i>
					</button>
				</div>
                </div>
	</section>
	<!-- end home -->
  

	<?php wp_reset_postdata(); ?>
 
 <?php else : ?>
	 <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
 <?php endif; ?>

 <?php
echo do_shortcode('[smartslider3 slider=1]');
?>










<div id="primary" class="content-area">
		<main id="main" class="site-main container-fluid  fixed-top " >
        <div class="row">
		<div class="col-md-3 width23">
		</div>

		<div class="col-md-6 marg0 ">
		<div class="content23">
		

<h1 class="text-info">Movies currently in cinema:<h1>

<?php
echo do_shortcode('[events-calendar-templates template="default" style="style-1" category="all" date_format="default" start_date="" end_date="" limit="5" order="ASC" hide-venue="yes" time="future" featured-only="false" columns="2" autoplay="true" tags="" venues="" organizers="" socialshare="yes"]
');
?>





        </div>
</div>
<div class="col-md-3 width23">
		</div>
        </div>
		</main><!-- #main -->
	</div><!-- #primary -->


<style>

.home{
	margin-top:0px !important;
}
.marg0{
	display:block;
    margin:0 auto!important;
    margin-left:0px!important;
    margin-right:0px!important;
padding-top:5%;
padding-bottom:15%;
text-align:left!important;
padding-left:3%;
margin:0px auto;
background-color:rgb(0, 0, 0 ,0.1);

border-left:dotted 1px rgb(206, 141, 37 , 0.135);
	border-right:dotted 1px rgb(206, 141, 37 , 0.135);
}
.width23{
    background-color:rgb(0, 0, 0 , 0.6);
}
main#main{
    padding:0px;
}
.row{
margin:0 auto ;
padding:0px;
}
div#n2-ss-1{
	background-color:rgb(0, 0, 0 , 0.3);
}

  .has-text-align-left , tr{
    text-align:left;
  }
</style>






 

 <?php get_footer(); ?>