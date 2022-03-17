<?php
/*Template Name: horror*/
get_header('template2'); ?>

<?php 

$args = array(
    'post_type' => 'my_movies',
    'posts_per_page' => -1,
    'tag_id' => 71
);
$query = new WP_Query($args);
while($query -> have_posts()) : $query -> the_post();
?>
 
 
  


 <div id="primary" class="content-area">
		<main id="main" class="site-main container-fluid  fixed-top " >
        <div class="row">
		

		<div class="col-md-6 marg0 ">
		<div class="content23">





<div class="  align-single2  displaycv">

<div class="row space">
		<div class="col-md-6 acfnomarg">

    
<p > <h2> Movie: </h2> <h4><?php the_title();?> </h4> <br> ( <?php the_field('release_date'); ?> )</p>
<h2> Main Actors: </h2> <p>  <?php the_field('actors'); ?>  </p>  
<h2> Genre: </h2> <p>  <?php  $genre_terms = get_field( 'genre', $term ); ?>
<?php if ( $genre_terms ): ?>
	<?php foreach ( $genre_terms as $genre_term ): ?>
		<?php echo $genre_term->name; ?>
	<?php endforeach; ?>
<?php endif; ?> 
  </p>  
<a href="<?php echo get_permalink( $id ) ?>">view more</a>
<h4>
<?php the_tags(); ?> </h4>
</div>

	



		<div class="col-md-6">
        <img class="imgcoversingle" src="<?php echo the_field('movie_cover');?>" alt="Movie's Cover" >
		</div>
	</div>

<div>



</div>

   

</div>

<div>










</div>
</div>

        </div>
		</main><!-- #main -->
	</div><!-- #primary -->



<style>

.displaycv{
    display:block;
}
  
   .marg0{
	display:block;
    margin: auto;
padding-top:5%;
padding-bottom:15%;
text-align:left!important;
padding-left:3%;
background-color:#000009;
margin:0px auto;
border-left:solid 1px rgb(206, 141, 37 , 0.135);
	border-right:solid 1px rgb(206, 141, 37 , 0.135);
}

.acfnomarg{
    margin:0 auto;
}
#primary {
    border-bottom: 1px dotted rgb(76, 74, 71);
}

</style>



 
    <?php endwhile; wp_reset_query();
get_footer('template2'); 
?> 