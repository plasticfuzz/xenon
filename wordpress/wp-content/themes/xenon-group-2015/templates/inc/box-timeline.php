<?php $timeline_url = get_field('timeline_page', 'option') ?>

<?php if ($timeline_url1) : ?>
<div class="pure-g wrapper-1140 m-10-top">  
  <div class="pure-u-1">
    <div class="multi-box__single">
      <div class="pure-g">
        <a href="<?php echo get_the_permalink($timeline_url) ?>" class="pure-u-1 pure-u-md-1-2 multi-box__single__content multi-box__single--flip__content">
          <div class="multi-box__single__content--fixed">
            <h5 class="multi-box__single__content__title multi-box__single__content__title--jumbo"><?php the_field('tl_title', 
              $timeline_url) ?></h5>
            <p class="multi-box__single__content__paragraph">
              <?php the_field('tl_lead_paragraph', $timeline_url) ?>
            </p>
          </div>
        </a>
        <?php if ( has_post_thumbnail($timeline_url) ) :
          $image = wp_get_attachment_image_src( get_post_thumbnail_id(
            $timeline_url), 'large' );
          $style = 'style="background-image: url(
            ' . $image[0] . ')"';
        else :
          $style = 'style="background-image: url(
            http://placehold.it/500x300&text=Featured+Image)"';
        endif; ?>        
        <div <?php echo $style ?> class="pure-u-1 pure-u-md-1-2 multi-box__single__image multi-box__single__image--double multi-box__single__image--fixed">
        </div>
      </div>
    </div>
  </div>   
</div>
<?php endif;  ?>