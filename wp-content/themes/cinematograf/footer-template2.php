<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package cinematograf
 */

?>

	</div><!-- #content -->
</body>





<div class="ftrbrd">
  <footer>
	<div class="top-footer d-flex justify-content-end ">
    <div class="container-fluid stanga-margine">
      <div class="row">
          <div class="col-sm-6 col-md-6 col-lg-3 asd list-unstyled">
              <h3 class="white unstyled">About us:</h3>
              <p class="lead text-secondary  cevabot">
              The newest cinema in your city with all the facilities.
               Book your ticket online or in the cinema at any time.
                  
              </p>
              <div class="white">
              <?php dynamic_sidebar('smartslider_area_1'); ?>
              </div>
          </div>
        <div class="col-sm-6 col-md-3 col-lg-3  ">
          <ul class="list-unstyled p-2 font-weight-bold">
            <li class=" d-inline"><h3 class="white unstyled" >Services we provide</h3></li>
            <li><a class="cevabot white d-inline" >- 2D si 3D Movies</a></li>
            <li><a class="cevabot d-inline" href="/4d/">4D movies</a></li>
            <li><a class="cevabot d-inline" href="/foodcourt/">Food Court and drinks</a></li>
          </ul>
        </div>
        <!-- End of .col-sm-3 -->
        <div class="col-sm-6 col-md-6 col-lg-3 font-weight-bold">
          <ul class="list-unstyled p-2">
            <li><h3 class="white unstyled">See also:</h3></li>

            <li><a class="cevabot d-inline" href="/tarife/" target="_blank">Pricing</a></li>
            <li><a class="cevabot d-inline" href="/ochelari/" target="_blank">Renting glasses</a></li>
            <li><a class="cevabot d-inline" href="/cookie/" target="_blank">cookie policy</a></li>
            <li><a class="cevabot d-inline" href="/contact/" target="_blank">Contact Us</a></li>
          </ul>
        </div>
        <!-- End of .col-sm-3 -->

        <div class="col-sm-6 col-md-6 col-lg-3 font-weight-bold">
          <ul class="list-unstyled p-2">
            <li ><h3 class="white unstyled">Connect</h3></li>
            <li><a class="cevabot d-inline" href="https://www.facebook.com/">Facebook <i class="fab fa-facebook-square"></i></a></li>
            <li><a class="cevabot d-inline" href="https://twitter.com/">Twitter <i class="fab fa-twitter-square"></i></a></li>
            <li><a class="cevabot d-inline" href="https://www.youtube.com/watch?v=i6OwxEd0Th0&t=48s">Youtube <i class="fab fa-youtube"></i></a></li>
            <li><a class="cevabot d-inline" href="https://pinterest.com/">Pinterest <i class="fab fa-pinterest"></i></a></li>
          </ul>
        </div>
        
      </div>
  
    </div> <!-- end container -->
  </div>
  </div>


 
<div class="container-fluid cevabot text-secondary copyright">

  copyright MaxCinema <?php echo comicpress_copyright(); ?>
  </div>
  </footer>
  <style>
      .copyright{
          text-align:center;
          display:block;
          
          height:30px;
      }
      .container-fluid.cevabot.text-secondary.copyright{
        margin-top: 10px;
}


      }
      h3.unstyled{
          color:white!important;
      }
  .ftrbrd{
    border:1px solid black;
border-radius:3px;
position: relative;
  bottom: 0px;
  
  }
  .d-inline{
    white-space:nowrap; 
     overflow:hidden;
  }
footer{
max-width:70%;
margin-top:20px!important;
margin:0 auto;


}
ul {
  list-style-type: none;
 }

  .top-footer{
    
    text-decoration: none;
    border-top: solid 1px rgb(206, 141, 37 , 0.065);
   
  }
  .stanga-margine{
	  
	 opacity:1;
  }
  .cevabot{
	text-decoration: none;
    color:grey!important;
    font-weight: 550;
    

  }
  .text-secondary{
    font-weight: 450!important;
  }
  .container-fluid , .top-footer{
    max-width:100%;
    margin:0px;
    padding:0px;
    
  }
 
  .unstyled{
    list-style-image: none;
  list-style: none;
  list-style-type: none;
  }
 
  </style>













		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->


  
<?php wp_footer(); ?>

</body>
</html>