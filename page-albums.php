<?php

/*
	Template Name: Albums
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
       .main {
       background:url(<?php echo $image_url[0]; ?>) #fff center top no-repeat;
       background-size: cover;
       }
     </style>
   <?php
 }  //end if statement
} //end vr_set_featured_background() function

get_header();  ?>

<div class="main">
  <div class="container">

    <?php // Start the loop ?>
    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

      <h2><?php //the_title(); ?></h2>
      <?php the_content(); ?>

    <?php endwhile; // end the loop?>
  </div> <!-- /.container -->
</div> <!-- /.main -->

<!-- Custom loop goes here -->

<div class="albums-container">
    <?php

    $onePageQuery = new WP_Query(
      array(
        'posts_per_page' => -1,
        'post_type' => 'albums',
        'order' => 'DES'
        )
    ); ?>

    <?php if ( $onePageQuery->have_posts() ) : ?>

      <?php while ($onePageQuery->have_posts()) : $onePageQuery->the_post(); ?>
      
        <!-- <section id="<?php echo $post->post_name; ?>"> -->
        <div class="album-item <?php echo $post->post_name; ?>">
          <div class="wow bounceInLeft album-image">
            <p><?php the_post_thumbnail('large'); ?></p>
          </div> <!-- album-image -->
          <div class="wow bounceInRight album-info">
            <h2><?php the_title(); ?></h2>
            <p><?php the_field('album_short_description'); ?></p>
            <p><?php the_field('album_rating'); ?> out of 5 stars</p>
            <p>Released in <?php the_field('album_release_date'); ?></p>
          </div> <!-- album-info -->
            <?php // the_content(); ?>
        </div> <!-- album-item -->  
        <!-- </section> -->
    <?php endwhile; ?>

    <?php wp_reset_postdata(); ?>

  <?php else:  ?>
    <!-- [stuff that happens if there aren't any posts] -->
  <?php endif; ?>
</div> <!-- albums-container --> 
<!-- Custom loop ends here -->

<?php get_footer(); ?>