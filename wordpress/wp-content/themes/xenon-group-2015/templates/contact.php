<?php
/**
 * Template Name: Contact
 */
get_header(); $Px = 'co_'; ?>
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
            $lead_t = get_field( ($Px.'show_lead_tel') );
      if ($lead_p) : ?>        
        <div class="pure-g wrapper-1140">  
          <?php // Contact - Leading  ?><div class="lead-box pure-u-1 <?php echo ($lead_t) ? 'm-10-bottom' : ''; ?>">
            <?php echo $lead_p; ?>
          </div>
        </div><?php
      endif;
      if ($lead_t) :
        $primary_tel = get_field('primary_telephone_number', 'option'); ?>
        <div class="pure-g wrapper-1140">  
          <?php // Contact - Leading  ?><div class="lead-box lead-box--telephone pure-u-1">
            <?php if ($primary_tel) {
              echo 'Tel: ' . $primary_tel;
            } else {
              echo "Tel Number not configured inside XE Settings page.";
            } ?>
          </div>
        </div><?php
      endif; ?>      
      <div class="pure-g wrapper-1140">
      <?php // Contact - Locations
        if ( have_rows( ($Px.'locations') ) ) : ?>
          <div class="pure-u-1 pure-u-lg-1-2">            
            <?php for ( $i = 0; have_rows( ($Px.'locations') ); $i++ ) : the_row(); ?>
              <div class="callout callout-well">
                <div class="pure-g">
                  <div class="pure-u-1 pure-u-md-1-2">
                    <h2 class="callout__title callout__title--leading"><?php the_sub_field( ($Px.'location_title') ) ?></h2>
                    <p class="callout__paragraph callout__paragraph--leading m-20-top">
                      <?php the_sub_field( ($Px.'location_address') ) ?>
                    </p>
                    <?php $tel = get_sub_field( ($Px.'location_tel') ); ?>
                    <a href="tel:<?php echo preg_replace('/\s+/', '', $tel); ?>" class="m-20-top">
                      Tel: <?php echo $tel; ?>
                    </a>
                  </div>
                  <div class="pure-u-1 pure-u-md-1-2 gmap-wrap">
                    <?php $loc = get_sub_field( ($Px.'location_map') ); ?>
                    <div style="width:100%;height:100%" class="gmap" 
                      data-lat="<?php echo $loc['lat'] ?>" 
                      data-lng="<?php echo $loc['lng'] ?>"></div>
                  </div>              
                </div>
              </div><?php 
            endfor; ?>
          </div><?php 
        endif; ?> 
        <div class="pure-u-1 pure-u-lg-1-2">
          <div class="callout">
            <h2 class="callout__title callout__title--leading">Contact Us</h2>
            <form class="callout_form js-contact-form"
              data-ajax-post="contact">
              <input type="text" class="input--full-width"
                name="xe_contact_name"  placeholder="full name" required>
              <input type="email" class="input--full-width"
                name="xe_contact_email" placeholder="email@example.com" required>
              <input type="text" class="input--full-width"
                name="xe_contact_tel" placeholder="telephone" required>
              <textarea name="xe_contact_message" class="input--full-width"  placeholder="message"></textarea>                
              <button class="input--submit input--full-width input--center--gt-md input--3-4-width--gt-md js-submit m-10-top">Submit</button>
            </form>
          </div>
        </div>      
      </div>      
    <?php endwhile ?>     
  </main>
<?php get_footer();