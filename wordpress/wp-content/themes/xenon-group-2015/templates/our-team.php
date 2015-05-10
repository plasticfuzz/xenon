<?php
/**
 * Template Name: Our Team
 */
get_header(); $Px = 'our_team_'; $Sx = 'team_mem_'; $Tx = 'tut_'; ?>
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
          <?php // Our Team - Leading  ?><div class="lead-box pure-u-1">
            <?php echo $lead_p; ?>
          </div>
        </div><?php
      endif; ?>

      <?php 
      $posts = get_field( ($Px.'members') );
      if( $posts ) : ?>
        <div class="pure-g wrapper-1140">
          <div class="pure-u-1">
            <h2>Our Team</h2>        
          </div>                   
          <?php foreach( $posts as $post) : ?>
            <?php setup_postdata($post); ?>
            <div class="pure-u-1 pure-u-md-1-2 pure-u-lg-1-4">
              <?php $banner_url = get_field( ($Sx.'background') ); ?>
              <div class="our-team-member-box our-team-member-box--bg  js-member-box" style="background-image: url(<?php echo $banner_url['url']; ?>)">
                <div class="our-team-member-box__overlay"></div>              
                <div class="our-team-member-box__wrap">
                  <h6 class="our-team-member-box__title  js-members-box-title">
                    <?php echo get_the_title() ?>
                    <span>
                      <?php echo get_field( ($Sx.'job_title') ) ?>         
                    </span>
                    <i class="icon-chevron-up icon-xl is-invisible--lt-sm  js-members-box-title-icon"></i>
                  </h6>  
                  <div class="our-team-member-box__content">
                    <img src="http://placehold.it/480x300" alt="">            
                    <?php echo get_field( ($Sx.'bio') ) ?>               
                  </div> 
                </div>         
              </div>
            </div>
          <?php endforeach; wp_reset_postdata(); ?>
          <?php if( get_field( ($Px.'show_work') ) ) : ?>
            <div class="pure-u-1 pure-u-md-1-2 pure-u-lg-1-4">
              <a href="" class="our-team-member-box our-team-member-box--work-with-fm js-member-box">
                <div class="our-team-member-box__overlay"></div>
                <div class="our-team-member-box__content our-team-member-box__content--table">
                  <div class="our-team-member-box__content__center">
                    <h6 class="our-team-member-box__title">
                      Want to work in FM?
                      <span>Get in touch</span>
                    </h6>                    
                  </div>
                </div>
              </a>
            </div>
          <?php endif; ?>
        </div>
      <?php endif;  ?>

      <?php 
      $posts = get_field( ($Px.'tutors') );
      if( $posts ) : ?>
        <div class="pure-g wrapper-1140"> 
          <div class="pure-u-1">
            <h2>Our Tutors</h2>        
          </div>                         
          <?php foreach( $posts as $post) : ?>
            <?php setup_postdata($post); ?>
            <div class="pure-u-1 pure-u-md-1-3">
              <div class="our-team-tutor-box  js-tutor-box"> 
                <div class="our-team-tutor-box__content">
                  <h6 class="our-team-tutor-box__title">
                    <?php echo get_the_title() ?>
                    <span>
                      <?php echo get_field( ($Tx.'accreditations') ) ?>         
                    </span>
                  </h6>                 
                  <?php echo get_field( ($Tx.'experience') ) ?>               
                </div>                             
              </div>
            </div>
          <?php endforeach; wp_reset_postdata(); ?>
          <?php if( get_field( ($Px.'show_tutor') ) ) : ?>
            <div class="pure-u-1 pure-u-md-1-3">
              <a href="" class="our-team-tutor-box our-team-tutor-box--become-tutor js-tutor-box">
                <div class="our-team-tutor-box__overlay"></div>
                <div class="our-team-tutor-box__content our-team-tutor-box__content--table">
                  <div class="our-team-tutor-box__content__center">
                    <h6 class="our-team-tutor-box__title">
                      Interested in becoming a tutor?
                      <span>Get in touch</span>
                    </h6>                    
                  </div>
                </div>
              </a>
            </div>
          <?php endif; ?>          
        </div>
      <?php endif; ?>

    <?php endwhile ?> 
  </main>
<?php get_footer();