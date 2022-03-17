<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package cinematograf
 */
get_header('template2'); ?>

<div class="area" >
            <ul class="circles">
            <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
            </ul>
            
	<div id="primary" class="content-area container">
		<main id="main" class="site-main row">


  


	
        <div class="container-fluid  align-single2  displaycv">

<div class="row space">
		<div class="col-md-12">




        <?php if ( have_posts() ) : ?>

<header class="page-header">
    <h1 class="page-title">
        <?php
        /* translators: %s: search query. */
        printf( esc_html__( 'Search Results for: %s', 'cinematograf' ), '<span>' . get_search_query() . '</span>' );
        ?>
    </h1>
</header><!-- .page-header -->

<?php
/* Start the Loop */
while ( have_posts() ) :
    the_post();

    /**
     * Run the loop for the search to output the results.
     * If you want to overload this in a child theme then include a file
     * called content-search.php and that will be used instead.
     */
    get_template_part( 'template-parts/content', 'search' );

endwhile;

the_posts_navigation();

else :

get_template_part( 'template-parts/content', 'none' );

endif;
?>

</main><!-- #main -->
</section><!-- #primary -->

	
						
				
		</main><!-- #main -->
	</div><!-- #primary -->
    </div>
	<?php get_footer(); ?>
<style>

img.custom-logo{
    position: relative;
}
main#main{
    text-align: center;
    flex-direction: column;
	padding-top:15%;

}
html{
	overflow-x: hidden;
}


.content404{
    


background-image: url("/wp-content/uploads/2020/05/saedx-blog-featured-70.jpg");
background-position: center; /* Center the image */
  background-repeat: no-repeat; /* Do not repeat the image */



   
}

div#primary{
   min-height:100%; 
}
.content-area::after{
    opacity: 0.5;
}
.acfnomarg{
margin:0 auto;
}
#primary {
    border-bottom: 1px dotted rgb(76, 74, 71);
}
.error-404 ,.page-title{
   
  
    text-align:center!important;
    margin:0 auto;
}

@import url('https://fonts.googleapis.com/css?family=Exo:400,700');

*{
    margin: 0px;
    padding: 0px;
}

body{
    font-family: 'Exo', sans-serif;
}


.context {
    width: 90%;
    position: absolute;
    top:50vh;
    
}

.context h1{
    text-align: center;
    color: #fff;
    font-size: 50px;
}


.area{
    background:#4e54c8;  
    background: -webkit-linear-gradient(to left, #8f94fb, #4e54c8);  
    width: 100%;
    height:100vh;
    
   
}

.circles{
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    overflow: hidden;
}

.circles li{
    position: absolute;
    display: block;
    list-style: none;
    width: 20px;
    height: 20px;
    background: rgba(255, 255, 255, 0.2);
    animation: animate 25s linear infinite;
    bottom: -150px;
    
}

.circles li:nth-child(1){
    left: 25%;
    width: 80px;
    height: 80px;
    animation-delay: 0s;
}


.circles li:nth-child(2){
    left: 10%;
    width: 20px;
    height: 20px;
    animation-delay: 2s;
    animation-duration: 12s;
}

.circles li:nth-child(3){
    left: 70%;
    width: 20px;
    height: 20px;
    animation-delay: 4s;
}

.circles li:nth-child(4){
    left: 40%;
    width: 60px;
    height: 60px;
    animation-delay: 0s;
    animation-duration: 18s;
}

.circles li:nth-child(5){
    left: 65%;
    width: 20px;
    height: 20px;
    animation-delay: 0s;
}

.circles li:nth-child(6){
    left: 75%;
    width: 110px;
    height: 110px;
    animation-delay: 3s;
}

.circles li:nth-child(7){
    left: 35%;
    width: 150px;
    height: 150px;
    animation-delay: 7s;
}

.circles li:nth-child(8){
    left: 50%;
    width: 25px;
    height: 25px;
    animation-delay: 15s;
    animation-duration: 45s;
}

.circles li:nth-child(9){
    left: 20%;
    width: 15px;
    height: 15px;
    animation-delay: 2s;
    animation-duration: 35s;
}

.circles li:nth-child(10){
    left: 85%;
    width: 150px;
    height: 150px;
    animation-delay: 0s;
    animation-duration: 11s;
}



@keyframes animate {

    0%{
        transform: translateY(0) rotate(0deg);
        opacity: 1;
        border-radius: 0;
    }

    100%{
        transform: translateY(-1000px) rotate(720deg);
        opacity: 0;
        border-radius: 50%;
    }

}
   


</style>
