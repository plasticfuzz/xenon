<?php
/**
 * Template Name: Homepage
 */
get_header(); $Px = 'hp_'; ?>
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
  <div class="pure-g wrapper-1140">  
    <div class="pure-u-1">
      <div class="multi-box">
        <div class="pure-g pure-g-nested">
          <div class="pure-u-1 pure-u-md-1-3">
            <div class="multi-box__single multi-box__single--flip multi-box__single--purple  js-multi-box">
              <div class="multi-box__single__image multi-box__single--flip__image"
              style="background-image: url(http://placekitten.com.s3.amazonaws.com/homepage-samples/408/287.jpg)">
              </div>
              <a href="#" class="multi-box__single__content multi-box__single--flip__content">
                <h5 class="multi-box__single__content__title">Course Fees</h5>
                <p class="multi-box__single__content__paragraph">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.</p>
              </a>
            </div>
          </div>
          <div class="pure-u-1 pure-u-md-1-3">
            <div class="multi-box__single multi-box__single--flip multi-box__single--red  js-multi-box">
              <div class="multi-box__single__image multi-box__single--flip__image"
              style="background-image: url(http://placekitten.com.s3.amazonaws.com/homepage-samples/408/287.jpg)">
              </div>
              <a href="#" class="multi-box__single__content multi-box__single--flip__content">
                <h5 class="multi-box__single__content__title">Course Fees</h5>
                <p class="multi-box__single__content__paragraph">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.</p>
              </a>
            </div>
          </div>
          <div class="pure-u-1 pure-u-md-1-3">
            <div class="multi-box__single multi-box__single--flip multi-box__single--green  js-multi-box">
              <div class="multi-box__single__image multi-box__single--flip__image"
              style="background-image: url(http://placekitten.com.s3.amazonaws.com/homepage-samples/408/287.jpg)">
              </div>
              <a href="#" class="multi-box__single__content multi-box__single--flip__content">
                <h5 class="multi-box__single__content__title">Course Fees</h5>
                <p class="multi-box__single__content__paragraph">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.</p>
              </a>
            </div>
          </div>
          <div class="pure-u-1">
            <div class="multi-box__single  js-multi-box">
              <div class="pure-g">
                <a href="#" class="pure-u-1 pure-u-md-1-2 multi-box__single__content multi-box__single--flip__content">
                  <div class="multi-box__single__content--fixed">
                    <h5 class="multi-box__single__content__title multi-box__single__content__title--jumbo">Course Fees</h5>
                    <p class="multi-box__single__content__paragraph">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.</p>
                  </div>
                </a>              
                <div class="pure-u-1 pure-u-md-1-2 multi-box__single__image multi-box__single__image--fixed"
                style="background-image: url(http://placekitten.com.s3.amazonaws.com/homepage-samples/408/287.jpg)">
                </div>
              </div>
            </div>
          </div>           
        </div>           
      </div>    
    </div>
  </div>
    <?php endwhile ?>     
  </main>
<?php get_footer();