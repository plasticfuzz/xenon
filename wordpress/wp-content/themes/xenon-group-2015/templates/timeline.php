<?php
/**
 * Template Name: Timeline
 */
get_header(); $Px = 'tl_'; ?>
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
          <?php // Our Team - Leading  ?><div class="lead-box text-gray pure-u-1">
            <?php echo $lead_p; ?>
          </div>
        </div><?php
      endif; ?>
      
      <?php // Timeline - Posts
      if ( have_rows( ($Px.'posts') ) ) : ?>
          <div class="pure-g wrapper-1140">
            <div class="pure-u-1">
              <h2><?php the_field( ($Px.'title') ); ?></h2>
            </div>          
            <div class="pure-u-1">
              <div class="timeline">
                <?php while ( have_rows( ($Px.'posts') ) ) : the_row();
                  $side = get_sub_field( ($Px.'post_position') ) ?>
                  <div class="timeline__block">
                    <div class="timeline__block__date">
                      <span><?php the_sub_field( ($Px.'post_date') ) ?></span>
                    </div>      
                    <div class="timeline__block__content
                      <?php echo ($side === 'left') ? 'f-left' : 'f-right' ?>">
                      <?php the_sub_field( ($Px.'post') ) ?> 
                    </div>
                  </div>
                <?php endwhile; ?>
                <div class="timeline__block">
                  <div class="timeline__block__onwards">
                    <span>Onwards</span>
                  </div> 
                </div>
              </div>
            </div>
          </div><?php
      endif ?>
    <?php endwhile ?>     
  </main>
<?php get_footer();