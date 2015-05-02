<?php
/**
 * Template Name: Internal
 */
get_header(); $Px = 'int_'; ?>
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
        <?php // Knowledge Centre - Leading  ?><div class="lead-box pure-u-1">
          <?php echo $lead_p; ?>
        </div>
      </div><?php
    endif; ?>

    <?php $introduction_callout = get_field( ($Px.'show_int') );
    if ($introduction_callout) : ?>    
      <div class="introduction-box" style="background-image: url(<?php echo ( get_field( ($Px.'int_background') ) ) ? get_field( ($Px.'int_background') )['url'] : '' ?>)">
        <div class="introduction-box__overlay"></div>
        <div class="introduction-box__content pure-g wrapper-1080">
          <?php // Knowledge Centre - Introduction Callout ?>
          <div class="pure-u-1 pure-u-md-1-2 introduction-box__content__wrap js-introduction-box">
            <h2 class="introduction-box__content__title"><i class="icon-video icon-lg"></i><?php echo get_field( ($Px.'int_vid_title') ); ?></h2>
            <?php echo get_field( ($Px.'int_vid_paragraph') ); ?>
          </div>
          <div class="introduction-box__content__video pure-u-1 pure-u-sm-1-2 pure-u-md-1-2">
            <?php
            $iframe = get_field( ($Px.'int_vid_embed') );
            preg_match('/src="(.+?)"/', $iframe, $matches);
            $src = $matches[1];
            $params = array(
              'controls'    => 0,
              'hd'        => 1,
              'autohide'    => 1
            );
            $new_src = add_query_arg($params, $src);
            $iframe = str_replace($src, $new_src, $iframe);
            $attributes = 'frameborder="0" class="js-introduction-box"';
            $iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);

            echo $iframe; ?>        
          </div>        
        </div>    
      </div><?php
    endif; ?>

    <?php $above_tab_content = get_field( ($Px.'qualifications') );
    if ($above_tab_content) : ?>
      <div class="pure-g wrapper-1140">
        <?php // Knowledge Centre - Above Tab Content ?><div class="pure-u-1">
          <?php echo $above_tab_content; ?>
        </div>
      </div><?php
    endif; ?>

    <?php // Knowledge Centre - Content Tabs 
      if ( ($Px.'show_content_tabs') && have_rows( ($Px.'tabs') ) ) : ?>
        <div class="pure-g wrapper-1140 tabs">
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
    
    <div class="pure-g wrapper-1140">
      <?php // Knowledge Centre - Below Tab Content
        $vertical_list = get_field( ($Px.'show_vertical_list') );
        $vertical_list_title = get_field( ($Px.'list_title') );
        if ( get_field( ($Px.'why_study') ) ) : ?>
          <div class="pure-u-1 <?php echo ($vertical_list) ? 'pure-u-lg-1-2' : '' ?>">
            <?php echo get_field( ($Px.'why_study') ); ?>          
          </div>
        <?php endif;
        if ( $vertical_list && have_rows( ($Px.'list') ) ) : ?>
          <div class="pure-u-1 pure-u-lg-1-2"><?php 
            if ($vertical_list_title) : ?>
              <h4><?php echo $vertical_list_title ?></h4><?php 
            endif; ?>
            <ul class="key-point-list <?php echo ($vertical_list_title) ? '' : 'm-20-top' ?>">
              <?php for ( $i = 1; have_rows( ($Px.'list') ); $i++ ) : 
              the_row(); ?><li class="key-point-list__item"><p><?php echo 
              get_sub_field( ($Px.'list_item_title') ); ?>
              </p></li><?php endfor; ?> 
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
    if ($next_steps) : ?>  
      <div class="next-steps-callout">
        <div class="pure-g wrapper-1140 next-steps-callout__content">
          <?php // Knowledge Centre - Next Steps Callout ?><div class="pure-u-1">
            <h5 class="next-steps-callout__content__title">
              <?php echo get_field( ($Px.'next_steps_title') ); ?>
            </h5>
            <?php echo get_field( ($Px.'next_steps_paragraph') ); ?>
            <a href="" class="btn btn--blue btn--lg btn--lg--padded m-20-top m-10-bottom">
            <?php echo get_field( ($Px.'next_steps_cta') ); ?></a>
          </div>
        </div>    
      </div><?php
    endif; ?>
    <?php endwhile ?> 
  </main>
<?php get_footer();