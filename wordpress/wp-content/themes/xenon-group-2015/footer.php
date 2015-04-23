  <?php // Enable Multiboxes and Newsletter Signup
    if ( get_field('enable_multiboxes_newsletter') ) { 
      locate_template('templates/inc/multiboxes-newsletter.php', true);
    } ?>

  <footer class="footer">
    <div class="pure-g wrapper-1140">
      <div class="pure-u-1 pure-u-lg-1-2">
        <p class="footer__paragraph">
          Copyright &copy; 2005-<?php echo date('Y') ?><br>
          Xenon Group The Xenon Group is the trading name of Xenon Management Training and Recruitment Ltd.          
        </p>
      </div>
      <div class="pure-u-1 pure-u-lg-1-2 footer__navigation">
        <?php if ( has_nav_menu( 'footer-nav' ) ) : ?>
          <nav class="footer__navigation__content">
            <ul>
              <?php
                wp_nav_menu(array(
                    'menu' => 'Footer Nav',
                    'theme_location' => 'footer-nav',
                    'depth' => 1,
                    'container' => false,
                    'container_class' => false,
                    'menu_class' => false,
                    'items_wrap' => '%3$s',
                  )
                )
              ?>  
            </ul>
          </nav><?php 
        endif; ?>
      </div>
    </div>
  </footer>

  <?php wp_footer() ?>
  <script src="//cdn.polyfill.io/v1/polyfill.min.js"></script>  
  </body>
</html>
