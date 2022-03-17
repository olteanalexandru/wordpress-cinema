<?php
/*Template Name: All timers*/
get_header('template2'); ?>

<?php
$args = array(
    'post_type' => 'my_movies',
    'posts_per_page' => -1,
    'meta_key'   => 'all_timer'
    
    
);
?>
<H1 style="text-align:center;">Movies that remain relevant:</H1>
<?php

$query = new WP_Query($args);
while($query -> have_posts()) : $query -> the_post();
?>



  

    
  


<div class="container-fluid  align-single2  displaycv">

<div class="row space">
		<div class="col-md-6">

    
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

   




<style>

.displaycv{
    display:block;
}
   .space{
       padding:40px;
       padding-left:35px;
       padding-top:100px;
       border-bottom:1px solid rgb(173, 55, 15 , .4);
   }

</style>



 
    <?php endwhile; wp_reset_query();

get_footer('template2'); 
?> 