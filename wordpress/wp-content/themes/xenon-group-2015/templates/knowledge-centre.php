<?php
/**
 * Template Name: Knowledge Centre
 */
get_header(); $Px = 'kno_cent_'; ?>
  <div class="banner" style="background-image: url(<?php echo get_field( ($Px.'lead_banner') )['url']; ?>)">
    <div class="pure-g wrapper-1140">
      <div class="pure-u-1">
        <h1 class="banner__title">CORPORATE FACILITIES MANAGEMENT TRAINING PROGRAMMES</h1>    
      </div>  
    </div>    
  </div>
  <main>
    <?php while(have_posts()): the_post() ?>
    <div class="pure-g wrapper-1140">  
      <?php // Knowledge Centre - Leading  ?><div class="pure-u-1">
        <?php echo get_field( ($Px.'lead_paragraph') ); ?>
      </div>
    </div>  

    <div class="introduction__callout">
      <div class="pure-g wrapper-1140">
        <?php // Knowledge Centre - Introduction Callout ?>
        <div class="pure-u-1">
          <h2><?php echo get_field( ($Px.'int_vid_title') ); ?></h2>
          <?php echo get_field( ($Px.'int_vid_paragraph') ); ?>
        </div>
      </div>    
    </div>

    <div class="pure-g wrapper-1140">
      <?php // Knowledge Centre - Above Tab Content ?><div class="pure-u-1">
        <?php echo get_field( ($Px.'qualifications') ); ?>
      </div>
    </div>

    <?php // Knowledge Centre - Content Tabs 
      if ( have_rows( ($Px.'tabs') ) ) : ?>
        <div class="pure-g wrapper-1140">
          <ul class="pure-u-1">
            <?php while ( have_rows( ($Px.'tabs') ) ) : the_row(); ?><li>
              <a href="#"><?php echo get_sub_field( ($Px.'tab_title') ); ?></a>
            </li><?php endwhile; ?> 
          </ul>

          <?php while ( have_rows( ($Px.'tabs') ) ) : the_row(); ?>
            <div class="pure-u-1">
              <?php echo get_sub_field( ($Px.'tab_paragraph') ); ?>            
            </div>
          <?php endwhile; ?>
        </div>                
      <?php 
    endif; ?> 

    <div class="pure-g wrapper-1140">
      <?php // Knowledge Centre - Below Tab Content
        if ( get_field( ($Px.'why_study') ) ) : ?>
          <div class="pure-u-1 pure-u-lg-1-2">
            <?php echo get_field( ($Px.'why_study') ); ?>          
          </div>
        <?php endif;
        if ( have_rows( ($Px.'list') ) ) : ?>
          <div class="pure-u-1 pure-u-lg-1-2">
            <h4><?php echo count(get_field( ($Px.'list') ) ); ?> REASONS TO STUDY WITH XENON GROUP</h4>
            <ul>
              <?php for ( $i = 1; have_rows( ($Px.'list') ); $i++ ) : 
              the_row(); ?><li><p><?php echo $i, '. ', get_sub_field( ($Px.'list_item') ); ?>
              </p></li><?php endfor; ?> 
            </ul>
          </div>
        <?php endif; ?> 
      <div class="pure-u-1">
        <?php echo get_field( ($Px.'course_fees') ); ?>          
      </div>      
    </div>


    <div class="next-steps__callout">
      <div class="pure-g wrapper-1140">
        <?php // Knowledge Centre - Next Steps Callout ?><div class="pure-u-1">
          <h5>
            <?php echo get_field( ($Px.'next_steps_title') ); ?>
          </h5>
          <?php echo get_field( ($Px.'next_steps_paragraph') ); ?>
          <a href="">
          <?php echo get_field( ($Px.'next_steps_cta') ); ?></a>
        </div>
      </div>    
    </div>



    <?php endwhile ?>
    </div>  
  </main>
<?php get_footer();