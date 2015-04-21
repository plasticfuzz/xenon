<?php
/**
 * Template Name: Knowledge Centre
 */
get_header(); $Px = 'kno_cent_' ?>
  <main>
    <?php while(have_posts()): the_post() ?>

      <?php // Knowledge Centre - Leading  ?><div>
        <?php echo get_field( ($Px.'lead_paragraph') ); ?>
      </div>

      <?php // Knowledge Centre - Introduction Callout ?><div>
        <h2><?php echo get_field( ($Px.'int_vid_title') ); ?></h2>
        <?php echo get_field( ($Px.'int_vid_paragraph') ); ?>
      </div>

      <?php // Knowledge Centre - Above Tab Content ?><div>
        <?php echo get_field( ($Px.'qualifications') ); ?>
      </div>

      <?php // Knowledge Centre - Content Tabs 
        if ( have_rows( ($Px.'tabs') ) ) : ?><div>
          <ul>
            <?php while ( have_rows( ($Px.'tabs') ) ) : the_row(); ?><li>
              <a href="#"><?php echo get_sub_field( ($Px.'tab_title') ); ?></a>
            </li><?php endwhile; ?> 
          </ul>

          <?php while ( have_rows( ($Px.'tabs') ) ) : the_row(); ?>
            <div>
              <?php echo get_sub_field( ($Px.'tab_paragraph') ); ?>            
            </div>
          <?php endwhile;
        endif; ?> 
      </div>      


      <?php // Knowledge Centre - Below Tab Content
        if ( get_field( ($Px.'why_study') ) ) : ?><div>
          <?php echo get_field( ($Px.'why_study') ); ?>          
        </div><?php endif;
        
        if ( have_rows( ($Px.'list') ) ) : ?><div>
          <h4><?php echo count(get_field( ($Px.'list') ) ); ?> REASONS TO STUDY WITH XENON GROUP</h4>
          <ul>
            <?php for ( $i = 1; have_rows( ($Px.'list') ); $i++ ) : 
            the_row(); ?><li><p><?php echo $i, '. ', get_sub_field( ($Px.'list_item') ); ?>
            </p></li><?php endfor; ?> 
          </ul><?php
        endif; ?> 
      </div>

      <div>
        <?php echo get_field( ($Px.'course_fees') ); ?>          
      </div>      

    <?php endwhile ?>
  </main>
<?php get_footer();