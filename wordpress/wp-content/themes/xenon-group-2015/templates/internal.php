<?php
/**
 * Template Name: Internal
 */
get_header(); $Px = 'int_'; ?>
  <?php $banner_url = get_field( ($Px.'lead_banner') ); ?>
  <div class="banner" <?php if($banner_url) echo 'style="background-image: url('. $banner_url['url'] . ')"' ?>>
    <div class="banner___decoration">
    </div>
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

      <?php
        $aside_testimonial = get_field( ($Px.'aside_testimonial') );
        $aside_articles = get_field( ($Px.'aside_articles') );
        $column_layout  = $testimonial || $aside_articles; ?>

      <?php // Boolean based on if [aside] has content.
      if( $column_layout ) : ?>
        <div class="pure-g wrapper-1140 column-layout">
          <div class="pure-u-1 pure-u-md-3-5 pure-u-lg-3-5">
      <?php endif; ?>

      <?php $lead_p = get_field( ($Px.'lead_paragraph') );
      if ($lead_p) : ?>        
        <div class="pure-g wrapper-1140">  
          <?php // Internal - Leading  ?><div class="lead-box pure-u-1">
            <?php echo $lead_p; ?>
          </div>
        </div><?php
      endif; ?>

      <?php $introduction_callout = get_field( ($Px.'show_int') );
      if ($introduction_callout) : 
        $banner_url = get_field( ($Sx.'background') ); ?>
        <div class="introduction-box" style="background-image: url(<?php echo $banner_url['url']; ?>)">
          <div class="introduction-box__overlay"></div>
          <div class="introduction-box__content pure-g wrapper-1080">
            <?php // Internal - Introduction Callout ?>
            <div class="pure-u-1 introduction-box__content__wrap js-introduction-box">
              <h2 class="introduction-box__content__title"><?php echo get_field( ($Px.'int_vid_title') ); ?></h2>
              <?php echo get_field( ($Px.'int_vid_paragraph') ); ?>
            </div>
            <div class="introduction-box__content__video pure-u-1">
              <?php
              $iframe = get_field( ($Px.'int_vid_embed') );
              preg_match('/src="(.+?)"/', $iframe, $matches);
              $src = $matches[1];
              $params = array(
                'controls'    => 1,
                'hd'        => 1,
                'autohide'    => 1
              );
              $new_src = add_query_arg($params, $src);
              $iframe = str_replace($src, $new_src, $iframe);
              $attributes = 'frameborder="0" class="js-introduction-box"';
              $iframe = str_replace('></iframe>', ' style="width: 100%; height: 400px" ' . $attributes . '></iframe>', $iframe);

              echo $iframe; ?>        
            </div>        
          </div>    
        </div><?php
      endif; ?>

      <?php $above_tab_content = get_field( ($Px.'qualifications') );
      if ($above_tab_content) : ?>
        <div class="pure-g wrapper-1140">
          <?php // Internal - Above Tab Content ?><div class="pure-u-1">
            <?php echo $above_tab_content; ?>
          </div>
        </div><?php
      endif; ?>

      <?php // Internal - Content Tabs 
        if ( ($Px.'show_content_tabs') && have_rows( ($Px.'tabs') ) ) : ?>
          <div class="pure-g wrapper-1140 tabs">
            <nav role='navigation' class="transformer-tabs pure-u-1">
              <ul><?php 
                for ( $i = 0; have_rows( ($Px.'tabs') ); $i++ ) : the_row(); ?>
                  <li>
                    <a href="#<?php echo make_slug( get_sub_field( ($Px.'tab_title') ) ); ?>" 
                       class="<?php echo ($i === 0) ? 'active' : ''; ?>">
                       <?php echo get_sub_field( ($Px.'tab_title') ); ?>
                     </a>
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
      
      <div class="pure-g wrapper-1140">
        <?php // Internal - Below Tab Content
          $below_tab_content_primary = get_field( ($Px.'why_study') );
          $vertical_list = get_field( ($Px.'show_vertical_list') );
          $vertical_list_title = get_field( ($Px.'list_title') );
          if ( $below_tab_content_primary ) : ?>
            <div class="pure-u-1 <?php echo ($vertical_list) ? 'pure-u-lg-1-2' : '' ?>"><?php echo $below_tab_content_primary; ?>          
            </div>
          <?php endif;
          if ( $vertical_list && have_rows( ($Px.'list') ) ) : ?>
            <div class="pure-u-1 pure-u-lg-1 <?php echo ($below_tab_content_primary) ? 'key-point-list__container' : '' ?>"><?php if ($vertical_list_title) : ?>
                <h4><?php echo $vertical_list_title ?></h4><?php 
              endif; ?>
              <ul class="key-point-list <?php echo ($vertical_list_title) ? '' : 'm-20-top' ?>">
                <?php for ( $i = 1; have_rows( ($Px.'list') ); $i++ ) : 
                the_row(); ?><li class="key-point-list__item">
                <a class="js-accordion-link" href="#">
                  <?php echo get_sub_field( ($Px.'list_item_title') ); ?>
                </a>
                <div><p>
                  <?php echo get_sub_field( ($Px.'list_item_content') ); ?></p>
                </div>
                </li><?php endfor; ?> 
              </ul>
            </div>
          <?php endif; ?>

        <?php $below_tab_content_secondary = get_field( ($Px.'course_fees') );
        if ($below_tab_content_secondary) : ?>         
          <div class="pure-u-1">
            <?php echo $below_tab_content_secondary; ?>          
          </div><?php 
        endif; ?>   
      </div>

      <?php $next_steps = get_field( ($Px.'show_next_steps') );
      if ($next_steps) : 
          $icon = '<i class="is-invisible--lt-md icon-chevron-right icon-md f-right"></i>'; ?>  
        <div class="next-steps-callout">
          <div class="pure-g wrapper-1140 next-steps-callout__content">
            <?php // Internal - Next Steps Callout ?><div class="pure-u-1">
              <h5 class="next-steps-callout__content__title">
                <?php echo get_field( ($Px.'next_steps_title') ); ?>
              </h5>
              <?php echo get_field( ($Px.'next_steps_paragraph') ); ?>
              <a href="" class="btn btn--blue btn--lg btn--lg--padded m-20-top m-10-bottom">                          
                <?php echo get_field( ($Px.'next_steps_cta') );
                echo ($column_layout) ? $icon : '' ?>
              </a>
            </div>
          </div>    
        </div><?php
      endif; ?>

      <?php // Boolean based on if [aside] has content.
      if( $column_layout ) : ?>      
        </div>
        <div class="pure-u-1 pure-u-md-2-5 pure-u-lg-2-5 aside-column">   
          <?php // Aside testimonials 
            if( $aside_testimonial ) :
              $post = $aside_testimonial;
              $testimonials_url = get_field('testimonials_page', 'option');
              setup_postdata( $post ); $Sx = 'tes_'; ?>
                <aside class="testimonial-box m-20-bottom">
                  <div class="pure-u-1 testimonial-box__content">
                    <p class="testimonial-box__content__paragraph">
                      <?php the_field( ($Sx . 'body') ); ?>        
                    </p>
                    <p class="testimonial-box__attr"><strong><?php the_field( ($Sx . 'name') ) ?></strong><br>
                    <?php the_field( ($Sx . 'title') ) ?>, <?php the_field( ($Sx . 'company') ) ?></p>
                    <?php if ($testimonials_url) : ?>
                      <a class="testimonial-box__view-all" href="<?php echo get_the_permalink($testimonials_url) ?>">View all testimonials <i class="icon-chevron-right icon-sm f-right"></i></a>
                    <?php endif; ?>
                  </div>  
                </aside>                           
              <?php wp_reset_postdata(); 
            endif; ?>             
          <?php // Aside articles 
              if( $aside_articles ): ?>
                <?php foreach( $aside_articles as $post): ?>
                  <aside class="aside-box m-20-bottom">
                    <div class="pure-g">                      
                    <?php setup_postdata($post); ?>
                    <?php if ( has_post_thumbnail() ) :
                      $image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), medium );
                      $style = 'style="background-image: url(
                        ' . $image[0] . ')"';
                    else :
                      $style = 'style="background-image: url(
                        http://placehold.it/200x200&text=Featured+Image)"';
                    endif; ?>
                    <div <?php echo $style ?> class="pure-u-1 aside-box__image"></div>      
                    <a href="<?php the_permalink() ?>" class="pure-u-1 aside-box__content">
                      <h5 class="aside-box__content__title"><?php echo the_title() ?></h5>
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
                <?php endforeach; ?>
              <?php wp_reset_postdata(); 
            endif; ?>         
          </div>       
        </div>
      <?php endif; ?>

    <?php endwhile ?>       
  </main>
<?php get_footer();