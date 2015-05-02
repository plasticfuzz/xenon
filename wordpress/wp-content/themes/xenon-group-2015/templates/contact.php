<?php
/**
 * Template Name: Contact
 */
get_header(); $Px = 'contact_'; ?>
  <?php $banner_url = get_field( ($Px.'lead_banner') ); ?>
  <div class="banner" <?php if($banner_url) echo 'style="background-image: url('. $banner_url['url'] . ')"' ?>>
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
      <?php $lead_p = get_field( ($Px.'lead_paragraph') );
      if ($lead_p) : ?>        
        <div class="pure-g wrapper-1140">  
          <?php // Contact - Leading  ?><div class="lead-box pure-u-1">
            <?php echo $lead_p; ?>
          </div>
        </div><?php
      endif; ?>
      <p>Work in progress</p>
    <?php endwhile ?> 
  </main>
<?php get_footer();