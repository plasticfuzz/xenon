<?php
/**
 * Template Name: Our Team
 */
get_header(); $Px = 'our_team_'; $Sx = 'team_mem_'; $Tx = 'tut_'; ?>
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

      <?php 
      $posts = get_field( ($Px.'members') );
      if( $posts ): ?>
        <div class="pure-g wrapper-1140">
          <div class="pure-u-1">
            <h2>Our Team</h2>        
          </div>                   
          <?php foreach( $posts as $post) : ?>
            <?php setup_postdata($post); ?>
            <div class="pure-u-1 pure-u-md-1-2 pure-u-lg-1-4">
              <div class="our-team-tutor-box">
                <?php echo get_the_title() ?>              
                <?php echo get_field( ($Sx.'job_title') ) ?>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      <?php endif; wp_reset_postdata(); ?>

      <?php 
      $posts = get_field( ($Px.'tutors') );
      if( $posts ): ?>
        <div class="pure-g wrapper-1140"> 
          <div class="pure-u-1">
            <h2>Our Tutors</h2>        
          </div>                         
          <?php foreach( $posts as $post) : ?>
            <?php setup_postdata($post); ?>
            <div class="pure-u-1 pure-u-md-1-2 pure-u-lg-1-4">
              <div class="our-team-tutor-box">
                <?php echo get_the_title() ?>              
                <?php echo get_field( ($Tx.'accreditations') ) ?>
                <?php echo get_field( ($Tx.'experience') ) ?>                
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      <?php endif; wp_reset_postdata(); ?>

    <?php endwhile ?> 
  </main>
<?php get_footer();