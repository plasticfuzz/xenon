<?php
/**
 * Template Name: Our Team
 */
get_header(); $Px = 'our_team_'; ?>
  <div class="banner" style="background-image: url(<?php echo get_field( ($Px.'lead_banner') )['url']; ?>)">
    <div class="pure-g wrapper-1140">
      <div class="pure-u-1">
        <h1 class="banner__title">
          <?php if ( get_field('override_page_title') ) {
            echo get_field('override_page_title');
          } else { the_title(); } ?>
        </h1>    
      </div>  
    </div>    
  </div>

  <main>
    <?php while(have_posts()): the_post() ?>
    <div class="pure-g wrapper-1140">  
      <?php // Knowledge Centre - Leading  ?><div class="lead-box pure-u-1">
        <?php echo get_field( ($Px.'lead_paragraph') ); ?>
      </div>
    </div>  

    <?php $post_count = -1;
    $query = new WP_Query(array(
      'order' => 'DESC',
      'orderby' => 'date',
      'posts_per_page' => $post_count,
      'post_status' => 'publish',
      'post_type' => 'xe-team',
      'ignore_sticky_posts' => true
    )) ?>
    <?php if ($query->have_posts()): while ($query->have_posts()): ?>
      <?php $query->the_post() ?>

      <div class="team-member">
      <?php the_title() ?>
      </div><?php 
      endwhile; ?>

    <?php endif; wp_reset_query() ?>   

    <?php endwhile ?> 
  </main>
<?php get_footer();