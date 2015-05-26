<?php
/**
 * Template Name: Homepage
 */
get_header(); $Px = 'hp_'; ?>
<?php // Homepage - Hero Slider
  if (have_rows( ($Px.'hero_slider') ) ) : ?>
    <div class="hero-slider">            
      <?php for ( $i = 0; have_rows( ($Px.'hero_slider') ); $i++ ) : 
        the_row(); 
        $title = get_sub_field( ($Px.'hero_slider_title') ); 
        $body  = get_sub_field( ($Px.'hero_slider_body') ); 
        $image = get_sub_field( ($Px.'hero_slider_image') );

        if ( $image ) :
          $image = wp_get_attachment_image_src( $image, 'large' );
          $style = 'style="background-image: url(
            ' . $image[0] . ')"';
        else :
          $style = 'style="background-image: url(
            http://placehold.it/300x150&text=Featured+Image)"';
        endif; ?> 

        <div <?php echo $style ?> class="hero-slider__image">
          <div class="hero-slider__overlay"></div>        
          <div class="pure-g wrapper-1140">
            <div class="pure-u-1 pure-u-md-3-5 hero-slider__content">
              <h1 class="hero-slider__content__title">
                <?php echo $title ?>
              </h1> 
              <div class="hero-slider__content__body">
                <?php echo $body ?>                               
              </div>              
            </div>
          </div>
        </div><?php
      endfor; ?>
    </div>                          
  <?php endif; ?> 

  <main>
    <?php while(have_posts()): the_post() ?>
      <?php // Homepage - Page Links
        $page_link_1 = get_field( ($Px.'page_link_1') );
        $page_link_2 = get_field( ($Px.'page_link_2') );
        $page_link_3 = get_field( ($Px.'page_link_3') );
        $page_link_4 = get_field( ($Px.'page_link_4') ); ?>

    <div class="pure-g wrapper-1140 has-hero-slider">
      <div class="pure-u-1">
        <div class="multi-box">
          <div class="pure-g pure-g-nested">
            <?php if ($page_link_1) : 
              $post = $page_link_1; setup_postdata( $post ); ?>    
              <div class="pure-u-1 pure-u-md-1-3">
                <div class="multi-box__single multi-box__single--flip multi-box__single--purple  js-multi-box">
                  <?php if ( has_post_thumbnail() ) :
                    $image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium' );
                    $style = 'style="background-image: url(
                      ' . $image[0] . ')"';
                  else :
                    $style = 'style="background-image: url(
                      http://placehold.it/410x290&text=Featured+Image)"';
                  endif; ?>               
                  <div <?php echo $style ?> class="multi-box__single__image multi-box__single--flip__image">
                  </div>
                  <a href="<?php the_permalink() ?>" class="multi-box__single__content multi-box__single--flip__content">
                    <h5 class="multi-box__single__content__title">
                    <?php the_title() ?></h5>
                    <p class="multi-box__single__content__paragraph">
                    <?php $excerpt = get_the_excerpt();
                    if ($excerpt) {
                      echo $excerpt;
                    } else {
                      echo 'Oh no!<br>Looks like this post does not have an excerpt, please go to this page and configure it.';
                    } ?>
                    </p>
                  </a>
                </div>
              </div>
            <?php wp_reset_postdata(); endif; ?>
            <?php if ($page_link_2) : 
              $post = $page_link_2; setup_postdata( $post ); ?>    
              <div class="pure-u-1 pure-u-md-1-3">
                <div class="multi-box__single multi-box__single--flip multi-box__single--red  js-multi-box">
                  <?php if ( has_post_thumbnail() ) :
                    $image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium' );
                    $style = 'style="background-image: url(
                      ' . $image[0] . ')"';
                  else :
                    $style = 'style="background-image: url(
                      http://placehold.it/410x300&text=Featured+Image)"';
                  endif; ?>               
                  <div <?php echo $style ?> class="multi-box__single__image multi-box__single--flip__image">
                  </div>
                  <a href="<?php the_permalink() ?>" class="multi-box__single__content multi-box__single--flip__content">
                    <h5 class="multi-box__single__content__title">
                    <?php the_title() ?></h5>
                    <p class="multi-box__single__content__paragraph">
                    <?php $excerpt = get_the_excerpt();
                    if ($excerpt) {
                      echo $excerpt;
                    } else {
                      echo 'Oh no!<br>Looks like this post does not have an excerpt, please go to this page and configure it.';
                    } ?>
                    </p>
                  </a>
                </div>
              </div>
            <?php wp_reset_postdata(); endif; ?>
            <?php if ($page_link_3) : 
              $post = $page_link_3; setup_postdata( $post ); ?>    
              <div class="pure-u-1 pure-u-md-1-3">
                <div class="multi-box__single multi-box__single--flip multi-box__single--green  js-multi-box">
                  <?php if ( has_post_thumbnail() ) :
                    $image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium' );
                    $style = 'style="background-image: url(
                      ' . $image[0] . ')"';
                  else :
                    $style = 'style="background-image: url(
                      http://placehold.it/410x290&text=Featured+Image)"';
                  endif; ?>               
                  <div <?php echo $style ?> class="multi-box__single__image multi-box__single--flip__image">
                  </div>
                  <a href="<?php the_permalink() ?>" class="multi-box__single__content multi-box__single--flip__content">
                    <h5 class="multi-box__single__content__title">
                    <?php the_title() ?></h5>
                    <p class="multi-box__single__content__paragraph">
                    <?php $excerpt = get_the_excerpt();
                    if ($excerpt) {
                      echo $excerpt;
                    } else {
                      echo 'Oh no!<br>Looks like this post does not have an excerpt, please go to this page and configure it.';
                    } ?>
                    </p>
                  </a>
                </div>
              </div>
            <?php wp_reset_postdata(); endif; ?>           
            <div class="pure-u-1">
              <?php if ($page_link_4) : 
                $post = $page_link_4; setup_postdata( $post ); ?>
                <div class="multi-box__single  js-multi-box">
                  <div class="pure-g">
                    <a href="<?php the_permalink() ?>" class="pure-u-1 pure-u-md-1-2 multi-box__single__content multi-box__single--flip__content">
                      <div class="multi-box__single__content--fixed">
                        <h5 class="multi-box__single__content__title multi-box__single__content__title--jumbo">
                          <?php the_title() ?>                        
                        </h5>
                        <p class="multi-box__single__content__paragraph">
                          <?php $excerpt = get_the_excerpt();
                          if ($excerpt) {
                            echo $excerpt;
                          } else {
                            echo 'Oh no!<br>Looks like this post does not have an excerpt, please go to this page and configure it.';
                          } ?>                        
                        </p>
                      </div>
                    </a>
                    <?php if ( has_post_thumbnail() ) :
                      $image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' );
                      $style = 'style="background-image: url(
                        ' . $image[0] . ')"';
                    else :
                      $style = 'style="background-image: url(
                        http://placehold.it/410x290&text=Featured+Image)"';
                    endif; ?>                                  
                    <div <?php echo $style ?> class="pure-u-1 pure-u-md-1-2 multi-box__single__image multi-box__single__image--fixed">
                    </div>
                  </div>
                </div>
              <?php wp_reset_postdata(); endif ?>
            </div>           
          </div>           
        </div>    
      </div>
    </div>
    <?php endwhile ?>

    <?php if ( get_field('enable_asideboxes_newsletter') ) { 
      locate_template('templates/inc/aside-boxes-newsletter.php',
        true);
    } ?>
            
    <?php // Homepage - Client Slider
      $show_client_slider = get_field( ($Px.'show_client_slider') ); 
      if ($show_client_slider) : 
        $title = get_field( ($Px.'client_slider_title') ); ?>
        <div class="pure-g wrapper-1140 our-clients m-20-top"> 
          <div class="pure-u-1">
            <h4 class="our-clients__title"><?php echo $title; ?> 
              <a class="our-clients__prev icon-chevron-left icon-md js-client-slider-prev" href="#"></a>
              <a class="our-clients__next icon-chevron-right icon-md js-client-slider-next" href="#"></a>
            </h4>
          </div>
          <div class="clients-slider">      
            <?php for ( $i = 0; have_rows( ($Px.'client_slider') ); $i++ ) : 
              the_row(); $client = get_sub_field( ($Px.'client_logo') ); ?>
              <div class="pure-u-1">
                <?php echo wp_get_attachment_image( $client, 'medium' ); ?>
              </div><?php
            endfor; ?>
          </div>                          
        </div>
      <?php endif; ?>    
  </main>
<?php get_footer();