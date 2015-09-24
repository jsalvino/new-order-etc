<?php

/*
	Template Name: Music
*/
add_action( 'wp_head', 'vr_set_featured_background', 99);
  function vr_set_featured_background() {
  $image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), full, false );
 if ($image_url[0]) {
   ?>
     <style>
     
       html,body {
       height:100%;
       margin:0!important;
       }
       .music {
       background-image: linear-gradient(rgba(255, 255, 255, 0.7), rgba(255, 255, 255, 0.7)), url(<?php echo $image_url[0]; ?>);
       background-size: cover;
       background-position: center 25%;
       background-repeat: no-repeat;
       }
     </style>
   <?php
 }  //end if statement
} //end vr_set_featured_background() function

get_header();  ?>

<div class="main music wow bounceInDown">
  <div class="container">

    <?php // Start the loop ?>
    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

      <h2><?php the_title(); ?></h2>
      <?php // the_content(); ?>

    <?php endwhile; // end the loop?>
  </div> <!-- /.container -->
</div> <!-- /.main -->

<div class="music-intro">
<?php // Start the loop ?>
    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

      <h2><?php //the_title(); ?></h2>
      <?php the_content(); ?>

    <?php endwhile; // end the loop?>
</div>

<?php get_footer(); ?>