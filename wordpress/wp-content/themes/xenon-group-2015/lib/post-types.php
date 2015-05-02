<?php

function register_post_types() {
  // array(<singular>, <plural>, <has-icon>, <slug>, array(<feature>))
  //
  // Post type name is `xe-singular` with spaces replaced with
  // dashes.
  // If <has-icon> is true then the default post icon will not be used.
  // Instead a menu-icon-<post-type-name> class will be added to the <li> in
  // the admin menu, allowing the image to be provided by targeting the
  // .wp-menu-image class.
  // If the slug is null the default is the lowercase plural name.
  $default_features = array('title', 'editor', 'thumbnail', 'excerpt');
  $post_types = array(
    array('Team', 'Team Members', true, 'team',
      $default_features),
    array('Tutor', 'Tutors', true, 'tutor',
      $default_features),
    array('Testimonial', 'Testimonials', true, 'testimonial',
      $default_features),        
  );
  foreach ($post_types as $cfg) {
    $singularName = $cfg[0];
    $pluralName = $cfg[1];
    $postTypeName = 'xe-' . str_replace(' ', '-', strtolower($singularName));
    $hasIcon = count($cfg) > 2 && $cfg[2];
    $slug = count($cfg) > 3 && $cfg[3] !== null ? $cfg[3] :
        str_replace(' ', '-', strtolower($pluralName));
    $features = count($cfg) > 4 ? $cfg[4] : false;
    register_post_type($postTypeName, array(
      'labels' => make_post_type_labels($singularName, $pluralName),
      'public' => true,
      'menu_position' => 4,
      'menu_icon' => $hasIcon ? '' : null,
      'supports' => $features,
      'has_archive' => false,
      'rewrite' => array('slug' => $slug)
    ));
  }
}

