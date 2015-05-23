<?php 

$aside_one = get_field('ab_aside_box_1');
$aside_two = get_field('ab_aside_box_2'); ?>

  <div class="pure-g wrapper-1140">  
    <div class="pure-u-1 pure-u-md-1-2">
      <div class="callout  js-aside-box">
        <h5 class="callout__title"><?php 
        $newsletter_title = get_field('newsletter_title', 'option');

        if($newsletter_title) {
          echo $newsletter_title;
        } else {
          echo 'You must setup the [newsletter] on the XE Settings page.';
        }; ?>

        </h5>
        <p class="callout__paragraph"><?php
        $newsletter_paragraph = get_field('newsletter_paragraph', 'option');

        if($newsletter_paragraph) {
          echo $newsletter_paragraph;
        } else {
          echo 'You must setup the [newsletter] on the XE Settings page.';
        }; ?>
        </p>
        <form class="callout_form js-newsletter-form"
          data-ajax-post="newsletter">
          <input type="text" class="input--full-width"
            name="xe_newsletter_name"  placeholder="full name" required>
          <input type="email" class="input--full-width"
            name="xe_newsletter_email" placeholder="email@example.com" required>
          <button class="input--submit input--full-width js-submit m-10-top">Keep me updated<i class="icon-chevron-right icon-md"></i></button>
        </form>
      </div>
    </div>
    <?php if( $aside_one ) : 
      $post = $aside_one; setup_postdata( $post ); ?>
      <div class="pure-u-1 pure-u-md-1-4">
        <aside class="aside-box  js-aside-box">
          <div class="pure-g">
            <?php if ( has_post_thumbnail() ) :
              $image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), medium );
              $style = 'style="background-image: url(
                ' . $image[0] . ')"';
            else :
              $style = 'style="background-image: url(
                http://placehold.it/300x150&text=Featured+Image)"';
            endif; ?>        
            <div <?php echo $style ?> class="pure-u-1 aside-box__image">
            </div>
            <a href="<?php the_permalink() ?>" class="pure-u-1 aside-box__content">
              <h5 class="aside-box__content__title"><?php the_title() ?></h5>
              <p class="aside-box__content__paragraph">
                  <?php $excerpt = get_the_excerpt();
                  if ($excerpt) {
                    echo $excerpt;
                  } else {
                    echo 'Oh no!<br>Looks like this post does not have an excerpt, please go to this page and configure it.';
                  } ?>
              </p>
            </a>               
          </div>
        </aside>
      </div><?php 
    wp_reset_postdata(); endif; ?>    

    <?php if( $aside_two ) : 
      $post = $aside_two; setup_postdata( $post ); ?>
      <div class="pure-u-1 pure-u-md-1-4">
        <aside class="aside-box  js-aside-box">
          <div class="pure-g">
            <?php if ( has_post_thumbnail() ) :
              $image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), medium );
              $style = 'style="background-image: url(
                ' . $image[0] . ')"';
            else :
              $style = 'style="background-image: url(
                http://placehold.it/300x150&text=Featured+Image)"';
            endif; ?>        
            <div <?php echo $style ?> class="pure-u-1 aside-box__image">
            </div>
            <a href="<?php the_permalink() ?>" class="pure-u-1 aside-box__content">
              <h5 class="aside-box__content__title"><?php the_title() ?></h5>
              <p class="aside-box__content__paragraph">
                  <?php $excerpt = get_the_excerpt();
                  if ($excerpt) {
                    echo $excerpt;
                  } else {
                    echo 'Oh no!<br>Looks like this post does not have an excerpt, please go to this page and configure it.';
                  } ?>
              </p>
            </a>               
          </div>
        </aside>
      </div><?php 
      wp_reset_postdata(); endif; ?>   
  </div>