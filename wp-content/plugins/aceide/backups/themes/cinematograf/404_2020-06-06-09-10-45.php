<?php /* start AceIDE restore code */
if ( $_POST["restorewpnonce"] === "8a182ea50df950f12fd14f8b84f78020b089eeb0a5" ) {
if ( file_put_contents ( "/home/oltean/public_html/wp-content/themes/cinematograf/404.php" ,  preg_replace( "#<\?php /\* start AceIDE restore code(.*)end AceIDE restore code \* \?>/#s", "", file_get_contents( "/home/oltean/public_html/wp-content/plugins/aceide/backups/themes/cinematograf/404_2020-06-06-09-10-45.php" ) ) ) ) {
	echo __( "Your file has been restored, overwritting the recently edited file! \n\n The active editor still contains the broken or unwanted code. If you no longer need that content then close the tab and start fresh with the restored file." );
}
} else {
echo "-1";
}
die();
/* end AceIDE restore code */ ?><?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package cinematograf
 */

?>
<?php
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


  


	
	
		<div class="page-content">
			
			<h1 class="page-title"><?php esc_html_e( '404 - Page not found
Uh oh. ¯\_(ツ)_/¯', 'cinematograf' ); ?></h1>
		</header><!-- .page-header -->

		
			<p><?php esc_html_e( 'Looks like nothing is here. Maybe try a search ?', 'cinematograf' ); ?></p>
			<?php
echo do_shortcode('[ivory-search id="252" title="Default Search Form"]');
?>
			
			

			
		



				
			</div><!-- .widget -->

			</div><!-- .widget -->
		
		
		</section><!-- .error-404 -->
	
						
				
		</main><!-- #main -->
	</div><!-- #primary -->
	<?php get_footer(); ?>
<style>

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


