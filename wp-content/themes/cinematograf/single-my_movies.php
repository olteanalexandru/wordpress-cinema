<?php
/*
 * Template Name: Single movie

 */
get_header('template2');
?>


<?php
while (have_posts()) : the_post(); ?>



<div id="primary" class="content-area">
		<main id="main" class="site-main container-fluid  fixed-top " >
        <div class="row">
		

		<div class="col-md-6 marg0 ">
		<div class="content23">




<div class="  align-single2  displaycv">

<div class="row space">
		<div class="col-md-6 acfnomarg">

<p> <h2> Movie: </h2><?php the_field('title'); ?></p>
<h2> Release date: </h2> <p>   <?php the_field('release_date'); ?> </p>

<h2 > In brief: </h2> <p class="ovfl">  <?php the_field('movie_description:'); ?>   </p>
<h2> Main Actors: </h2> <p>  <?php the_field('actors'); ?>  </p>
<h2> genre: </h2> <p>  <?php $genre_terms = get_field( 'genre' ); ?>
<?php if ( $genre_terms ): ?>
	<?php foreach ( $genre_terms as $genre_term ): ?>
		<?php echo $genre_term->name; ?>
	<?php endforeach; ?>
<?php endif; ?>  </p>
</div>


<div class="col-md-6 acfnomarg">
<img class="imgcoversingle" src="<?php echo the_field('movie_cover');?>" alt="Movie's Cover" >
</div>




</div>
<div class="embed-container">
    <?php the_field('trailer'); ?>
</div>
<div>






</div>
</div>	</div><!-- #primary -->

        </div>
        </main><!-- #main -->
        <?php



// If comments are open or we have at least one comment, load up the comment template.
if ( comments_open() || get_comments_number() ) :
    comments_template();
endif;



?>
		
        </div>

















<style>

.ovfl{
   width:70%;
 
    word-wrap: break-word;
}
  
.imgcoversingle{
      width:85%;
    
      
      
      display:inline-block;
   }

   .align-single{

padding-left:10%;

 }
    .embed-container { 
        position: relative; 
        padding-bottom: 56.25%;
        overflow: hidden;
        max-width: 100%;
        height: auto;
       
    } 

    .embed-container iframe,
    .embed-container object,
    .embed-container embed { 
        position: absolute;
        top: 10%; 
left: 50%;
transform: translateX(-50%);
        width:80%;
        height: 100%;
    }
    .displaycv{
    display:block;
    text-align: left;
}
   

.marg0{
	display:block;
    margin:0 auto;
padding-top:5%;
padding-bottom:15%;
text-align:left!important;
padding-left:3%;
background-color:#000009;
margin:0px auto;
border-left:solid 1px rgb(206, 141, 37 , 0.135);
	border-right:solid 1px rgb(206, 141, 37 , 0.135);
}

#primary {
    border-bottom: 1px dotted rgb(76, 74, 71);
}
</style>






<?php endwhile;
get_footer('template2'); 
?> 
