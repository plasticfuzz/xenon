<?php
/**
 * Template Name: Internal Page
 */
get_header(); $Px = 'kno_cent_'; ?>
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
      
      <div class="pure-u-1 pure-u-lg-3-4">
        <div class="wrapper-1140">
          <?php // Knowledge Centre - Above Tab Content ?><div class="pure-u-1">
            <?php echo get_field( ($Px.'qualifications') ); ?>
          </div>
        </div>

        <?php // Knowledge Centre - Content Tabs 
          if ( have_rows( ($Px.'tabs') ) ) : ?>
            <div class="wrapper-1140 tabs">
              <nav role='navigation' class="transformer-tabs pure-u-1">
                <ul><?php 
                  for ( $i = 0; have_rows( ($Px.'tabs') ); $i++ ) : the_row(); ?>
                    <li>
      <a href="#<?php echo make_slug( get_sub_field( ($Px.'tab_title') ) ); ?>" 
         class="<?php echo ($i === 0) ? 'active' : ''; ?>">
         <?php echo get_sub_field( ($Px.'tab_title') ); ?></a>
                    </li>
                  <?php endfor; ?> 
                </ul>
              </nav>

              <?php for ( $i = 0; have_rows( ($Px.'tabs') ); $i++ ) : the_row(); ?>
                <div id="<?php echo make_slug( get_sub_field( ($Px.'tab_title') ) ); ?>" class="transformer-tabs__tab pure-u-1 <?php echo ($i === 0) ? 'active' : ''; ?>">
                  <div class="transformer-tabs__tab__content">
                    <?php echo get_sub_field( ($Px.'tab_paragraph') ); ?>     
                  </div>
                </div>
              <?php endfor; ?>
            </div>                
          <?php 
        endif; ?> 
        
        <div class="wrapper-1140">
          <?php // Knowledge Centre - Below Tab Content
            if ( get_field( ($Px.'why_study') ) ) : ?>
              <div class="pure-u-1 pure-u-lg-1-2">
                <?php echo get_field( ($Px.'why_study') ); ?>          
              </div>
            <?php endif;
            if ( have_rows( ($Px.'list') ) ) : ?>
              <div class="pure-u-1 pure-u-lg-1-2">
                <h4><?php echo count(get_field( ($Px.'list') ) ); ?> REASONS TO STUDY WITH XENON GROUP</h4>
                <ul class="key-point-list">
                  <?php for ( $i = 1; have_rows( ($Px.'list') ); $i++ ) : 
                  the_row(); ?><li class="key-point-list__item"><p><?php echo $i, '. ', get_sub_field( ($Px.'list_item') ); ?>
                  </p></li><?php endfor; ?> 
                </ul>
              </div>
            <?php endif; ?> 
          <div class="pure-u-1">
            <?php echo get_field( ($Px.'course_fees') ); ?>          
          </div>      
        </div>

        <div class="wrapper-1140">
          <?php // Knowledge Centre - Next Steps Callout ?><div class="">
            <h5 class="">
              <?php echo get_field( ($Px.'next_steps_title') ); ?>
            </h5>
            <?php echo get_field( ($Px.'next_steps_paragraph') ); ?>
            <a href="" class="btn btn--blue btn--lg btn--lg--padded m-20-top m-10-bottom">
            <?php echo get_field( ($Px.'next_steps_cta') ); ?><i class="icon-chevron-right icon-md"></i></a>
          </div>
        </div>    
      </div>
      <div class="pure-u-1 pure-u-lg-1-4">
        <aside class="aside-box  js-aside-box">
          <div class="pure-g">
            <div class="pure-u-1 aside-box__image"
            style="background-image: url(http://placekitten.com.s3.amazonaws.com/homepage-samples/408/287.jpg)">          
            </div>  
            <a href="#" class="pure-u-1 aside-box__content">
              <h5 class="aside-box__content__title">Course Fees</h5>
              <p class="aside-box__content__paragraph">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.</p>
            </a>               
          </div>
        </aside>
        <aside class="aside-box  js-aside-box">
          <div class="pure-g">
            <div class="pure-u-1 aside-box__image"
            style="background-image: url(http://placekitten.com.s3.amazonaws.com/homepage-samples/408/287.jpg)">          
            </div>  
            <a href="#" class="pure-u-1 aside-box__content">
              <h5 class="aside-box__content__title">Course Fees</h5>
              <p class="aside-box__content__paragraph">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.</p>
            </a>               
          </div>
        </aside>              
      </div>
    </div>
    <?php endwhile ?> 
  </main>
<?php get_footer();