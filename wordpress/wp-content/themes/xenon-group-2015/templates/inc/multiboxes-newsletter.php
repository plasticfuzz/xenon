<?php
  $multi_box_blue   = get_field('multi_box_blue', 'option');
  $multi_box_yellow = get_field('multi_box_yellow', 'option');
  $multi_box_red    = get_field('multi_box_red', 'option');
  $multi_box_green  = get_field('multi_box_green', 'option');
  //$multi_box_blue && $multi_box_yellow && $multi_box_red && $multi_box_green
  if ( 1 === 1 ) : ?>
<div class="pure-g wrapper-1140">  
  <div class="pure-u-1 pure-u-lg-2-3">
    <div class="multi-box js-multi-box-container">
      <div class="pure-g pure-g-nested">
        <div class="pure-u-1 pure-u-md-1-2">
        <?php if( $multi_box_blue ) : 
          $post = $multi_box_blue; setup_postdata( $post ); ?>
          <div class="multi-box__single multi-box__single--blue  js-multi-box">
            <div class="pure-g">
              <?php if ( has_post_thumbnail() ) :
                $image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), medium );
                $style = 'style="background-image: url(
                  ' . $image[0] . ')"';
              else :
                $style = 'style="background-image: url(
                  http://placehold.it/200x200&text=Featured+Image)"';
              endif; ?>
              <div <?php echo $style ?> class="pure-u-1-3 multi-box__single__image"></div>
              <a href="<?php the_permalink() ?>" class="pure-u-2-3 multi-box__single__content">
                <h5 class="multi-box__single__content__title">
                <?php the_title() ?><i class="icon-triangle-right icon-md f-right"></i></h5>
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
          </div><?php
          wp_reset_postdata(); endif; ?>
        </div>
        <div class="pure-u-1 pure-u-md-1-2">
        <?php if( $multi_box_yellow ) : 
          $post = $multi_box_yellow; setup_postdata( $post ); ?>
          <div class="multi-box__single multi-box__single--yellow  js-multi-box">
            <div class="pure-g">
              <?php if ( has_post_thumbnail() ) :
                $image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), medium );
                $style = 'style="background-image: url(
                  ' . $image[0] . ')"';
              else :
                $style = 'style="background-image: url(
                  http://placehold.it/200x200&text=Featured+Image)"';
              endif; ?>
              <div <?php echo $style ?> class="pure-u-1-3 multi-box__single__image"></div>
              <a href="<?php the_permalink() ?>" class="pure-u-2-3 multi-box__single__content">
                <h5 class="multi-box__single__content__title">
                <?php the_title() ?><i class="icon-triangle-right icon-md f-right"></i></h5>
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
          </div><?php
          wp_reset_postdata(); endif; ?>
        </div>
        <div class="pure-u-1 pure-u-md-1-2">
        <?php if( $multi_box_red ) : 
          $post = $multi_box_red; setup_postdata( $post ); ?>
          <div class="multi-box__single multi-box__single--red  js-multi-box">
            <div class="pure-g">
              <?php if ( has_post_thumbnail() ) :
                $image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), medium );
                $style = 'style="background-image: url(
                  ' . $image[0] . ')"';
              else :
                $style = 'style="background-image: url(
                  http://placehold.it/200x200&text=Featured+Image)"';
              endif; ?>
              <div <?php echo $style ?> class="pure-u-1-3 multi-box__single__image"></div>
              <a href="<?php the_permalink() ?>" class="pure-u-2-3 multi-box__single__content">
                <h5 class="multi-box__single__content__title">
                <?php the_title() ?><i class="icon-triangle-right icon-md f-right"></i></h5>
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
          </div><?php
          wp_reset_postdata(); endif; ?>
        </div>
        <div class="pure-u-1 pure-u-md-1-2">
        <?php if( $multi_box_green ) : 
          $post = $multi_box_green; setup_postdata( $post ); ?>
          <div class="multi-box__single multi-box__single--green  js-multi-box">
            <div class="pure-g">
              <?php if ( has_post_thumbnail() ) :
                $image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), medium );
                $style = 'style="background-image: url(
                  ' . $image[0] . ')"';
              else :
                $style = 'style="background-image: url(
                  http://placehold.it/200x200&text=Featured+Image)"';
              endif; ?>
              <div <?php echo $style ?> class="pure-u-1-3 multi-box__single__image"></div>
              <a href="<?php the_permalink() ?>" class="pure-u-2-3 multi-box__single__content">
                <h5 class="multi-box__single__content__title">
                <?php the_title() ?><i class="icon-triangle-right icon-md f-right"></i></h5>
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
          </div><?php
          wp_reset_postdata(); endif; ?>
        </div>            
      </div>           
    </div>    
  </div>
  <div class="pure-u-1 pure-u-lg-1-3">
    <div class="callout  js-callout-container">
      <h5 class="callout__title">Facilities management newsletter</h5>
      <p class="callout__paragraph">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid mollitia sit, assumenda et vel doloremque delectus accusamus, illum culpa.</p>
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
</div>
<?php else : ?>
  <div class="pure-g wrapper-1140">
    <div class="pure-u-1">
      <p><strong>You must setup the [multi-boxes] on the XE Settings page in order for them to appear.</strong></p>
    </div>
  </div>
<?php endif; ?>