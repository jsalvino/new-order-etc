<?php get_header(); ?>

<div class="section">
  <div class="innerWrapper">
    <div class="full">
      <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	        <h2><?php the_title(); ?></h2>
	        <p><?php the_post_thumbnail(); ?></p>
	        <p>Released in <?php the_field('album_release_date'); ?></p>
	        <p><?php the_field('album_short_description'); ?></p>
	        <p><?php the_field('album_rating'); ?> out of 5 stars</p>
	        <p><?php the_content(); ?></p>
      <?php endwhile; // end of the loop. ?>
    </div>
  </div> <!-- /.innerWrapper -->
</div> <!-- /.section -->

<?php get_footer(); ?>