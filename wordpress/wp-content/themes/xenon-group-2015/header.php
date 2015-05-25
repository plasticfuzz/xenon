<?php
  $tel = get_field('primary_telephone_number', 'option');
  $login_url = get_field('login_page', 'option'); 
  $linkedin_url = get_field('linkedin_profile', 'option'); 
  $twitter_url = get_field('twitter_profile', 'option'); ?>        
<!doctype html>
<!--[if lt IE 7 ]><html class="ie6" <?php language_attributes() ?>><![endif]-->
<!--[if IE 7 ]>   <html class="ie7" <?php language_attributes() ?>><![endif]-->
<!--[if IE 8 ]>   <html class="ie8" <?php language_attributes() ?>><![endif]-->
<!--[if IE 9 ]>   <html class="ie9" <?php language_attributes() ?>><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html class="" <?php language_attributes() ?>><!--<![endif]-->
<head>
  <meta charset="<?php bloginfo('charset') ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title><?php wp_title() ?></title>
  <link rel="stylesheet"
        href="<?php echo get_stylesheet_uri() . "?v=1" ?>" />

  <!--[if lt IE 9]>
  <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.6.2/html5shiv.js"></script>
  <script src="//s3.amazonaws.com/nwapi/nwmatcher/nwmatcher-1.2.5-min.js"></script>
  <script src="//html5base.googlecode.com/svn-history/r38/trunk/js/selectivizr-1.0.3b.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.1.0/respond.min.js"></script>
  <![endif]-->

  <link rel="apple-touch-icon" sizes="57x57" href="<?php echo asset_uri('/favicon/apple-touch-icon-57x57.png') ?>">
  <link rel="apple-touch-icon" sizes="60x60" href="<?php echo asset_uri('favicon/apple-touch-icon-60x60.png') ?>">
  <link rel="apple-touch-icon" sizes="72x72" href="<?php echo asset_uri('favicon/apple-touch-icon-72x72.png') ?>">
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo asset_uri('favicon/apple-touch-icon-76x76.png') ?>">
  <link rel="apple-touch-icon" sizes="114x114" href="<?php echo asset_uri('favicon/apple-touch-icon-114x114.png') ?>">
  <link rel="apple-touch-icon" sizes="120x120" href="<?php echo asset_uri('favicon/apple-touch-icon-120x120.png') ?>">
  <link rel="apple-touch-icon" sizes="144x144" href="<?php echo asset_uri('favicon/apple-touch-icon-144x144.png') ?>">
  <link rel="apple-touch-icon" sizes="152x152" href="<?php echo asset_uri('favicon/apple-touch-icon-152x152.png') ?>">
  <link rel="apple-touch-icon" sizes="180x180" href="<?php echo asset_uri('favicon/apple-touch-icon-180x180.png') ?>">
  <link rel="icon" type="image/png" href="<?php echo asset_uri('favicon/favicon-32x32.png') ?>" sizes="32x32">
  <link rel="icon" type="image/png" href="<?php echo asset_uri('favicon/android-chrome-192x192.png') ?>" sizes="192x192">
  <link rel="icon" type="image/png" href="<?php echo asset_uri('favicon/favicon-96x96.png ') ?>" sizes="96x96">
  <link rel="icon" type="image/png" href="<?php echo asset_uri('favicon/favicon-16x16.png ') ?>" sizes="16x16">
  <link rel="manifest" href="<?php echo asset_uri('favicon/manifest.json ') ?>">
  <link rel="shortcut icon" href="<?php echo asset_uri('favicon/favicon.ico') ?>">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="msapplication-TileImage" content="<?php echo asset_uri('favicon/mstile-144x144.png') ?>">
  <meta name="msapplication-config" content="<?php echo asset_uri('favicon/browserconfig.xml') ?>">
  <meta name="theme-color" content="#ffffff">

  <?php wp_head() ?>
</head>
<body>
  <header class="header">
    <div class="pure-g wrapper-1140">
      <div class="pure-u-1">
        <div class="header__external is-invisible--lt-lg">
          <ul>
            <?php if ($linkedin_url) : ?>          
              <li>
              <a href="<?php echo $linkedin_url; ?>" class="icon-linkedin-with-circle a-social"></a></li>
            <?php endif; ?>
            <?php if ($twitter_url) : ?>          
              <li>
              <a href="<?php echo $twitter_url; ?>" class="icon-twitter-with-circle a-social"></a></li>
            <?php endif; ?>
            <?php if ($tel) : ?>
              <li><a href="tel:<?php echo preg_replace('/\s+/', '', $tel); ?>" class="a-tel">
                <?php echo $tel; ?>
              </a></li>
            <?php endif; ?>
            <?php if ($login_url) : ?>
              <li><a href="<?php echo $login_url; ?>" class="a-login">
              <i class="icon-login icon-xs"></i>
              Login
              </a></li>        
            <?php endif; ?>                            
          </ul>
        </div>
      </div>
      <div class="pure-u-1-2 pure-u-lg-1-3 header__logo">
        <a title="<?php bloginfo('name') ;?>" 
            href="<?php echo bloginfo('url') ?>">
          <img src="<?php echo asset_uri(
            'images/logo--hi-res.png') ?>" alt="Xenon Group">
        </a>
      </div>      
      <div class="pure-u-1-2 header__operators">
        <?php 
        if ($tel) : ?>
          <a href="tel:<?php echo preg_replace('/\s+/', '', $tel); ?>" class="icon-phone icon-lg header__operators__phone"></a>
        <?php endif ?>      
        <a href="" class="icon-menu icon-xl header__operators__menu  js-toggle-header-nav"></a>
      </div>  
      <?php if ( has_nav_menu( 'header-nav' ) ) : 
        $login_url = get_field('login_page', 'option'); ?>       
        <nav class="pure-u-1 pure-u-lg-2-3 header__navigation">
          <div class="header__navigation__content default-state  js-header-nav">
            <ul>
              <?php
                wp_nav_menu(array(
                    'menu' => 'Header Nav',
                    'theme_location' => 'header-nav',
                    'depth' => 2,
                    'container' => false,
                    'container_class' => false,
                    'menu_class' => false,
                    'items_wrap' => '%3$s',
                  )
                )
              ?>  
              <?php if ($login_url) : ?>
                <li class="login-link"><a href="<?php echo $login_url; ?>" class="a-login">Login</a></li>        
              <?php endif; ?>
            </ul>
          </div>
        </nav>
      <?php endif; ?>
    </div>
  </header>