<?php
get_header(); ?>
  <div class="banner">
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
        <?php the_content() ?>
      </div>
    </div>
    <?php endwhile ?>     
  </main>
<?php get_footer();