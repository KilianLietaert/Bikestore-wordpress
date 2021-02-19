<?php

    function cg_add_theme_scripts() {
            wp_enqueue_style( 'screen', get_template_directory_uri() . '/css/screen.css');
    }
        add_action( 'wp_enqueue_scripts', 'cg_add_theme_scripts' );

        add_theme_support( 'post-thumbnails' );


    function cl_laadEigenCSS(){
      $pathVanTheme = get_template_directory_uri();
      wp_enqueue_style( "planetbucks",$pathVanTheme. '/css/screen.css' );
    }


            add_action('wp_enqueue_scripts', 'cg_add_theme_scripts');
            add_theme_support('post-thumbnails');
?>
