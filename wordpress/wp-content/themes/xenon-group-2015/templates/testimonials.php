<?php
/**
 * Template Name: Testimonials Archive
 */
get_header(); $Px = 'tes_'; ?>
  <main>
  <?php // Testimonials - Archive 
    $testimonials = get_field( ($Px.'testimonials_list') );
    $testimonials_idx = count($testimonials);

    if ($testimonials) : $idx = -1;  
      foreach( $testimonials as $post): setup_postdata($post);
        $idx++; ?>

        <?php if ($idx % 4 === 0) : ?>
          <div class="pure-g wrapper-1140">
        <?php endif; ?>

        <div class="pure-u-1 pure-u-md-1-2 pure-u-lg-1-4">
          <aside class="testimonial-box  js-testimonial-box">
            <div class="pure-u-1 testimonial-box__content">
              <p class="testimonial-box__content__paragraph">
                <?php the_field( ($Px . 'body') ); ?>        
              </p>
              <p class="testimonial-box__attr"><strong><?php the_field( ($Px . 'name') ) ?></strong><br>
              <?php the_field( ($Px . 'title') ) ?>, <?php the_field( ($Px . 'company') ) ?></p>
            </div>  
          </aside> 
        </div>

        <?php if ( ( $idx+1 ) % 4 === 0 || $idx === $testimonials_idx-1 ) : ?>
          </div>
        <?php endif; ?>

      <?php endforeach; wp_reset_postdata(); ?>
    <?php endif; ?>
  </main>
<?php get_footer();