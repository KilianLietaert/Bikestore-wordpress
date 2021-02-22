<?php


function bs_laadCSSenScript()
{
  $pathTheme = get_template_directory_uri();
  wp_enqueue_style("bootstrap", $pathTheme . '/css/bootstrap.min.css');
  wp_enqueue_style('Bikestore', $pathTheme . '/css/screen.css', ['bootstrap']);

  wp_enqueue_script('bootstrapjs', $pathTheme . '/script/bootstrap.min.js');
  //wp_enqueue_script('menujs', $pathTheme . '/script/.js');
}

function wpb_custom_new_menu()
{
  register_nav_menus(
    array(
      'my-custom-menu' => __('My Custom Menu'),
      'extra-menu' => __('Extra Menu')
    )
  );
}

function bs_register_my_menus()
{
  register_nav_menus(
    array(
      'main-menu' => __('Hoofd Menu'),
      'footer-menu' => __('voet Menu')
    )
  );
}


add_action("wp_enqueue_scripts", "bs_laadCSSenScript");
add_action('init', 'bs_register_my_menus');
add_theme_support('post-thumbnails');


add_action('init', 'wpb_custom_new_menu');

?>