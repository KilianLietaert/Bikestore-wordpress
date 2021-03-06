<?php get_header( )?>

<section class="container-fluid c-bedankt">
<?php

$bedank = array(
  'post_type' => array('bedank'),
  'nopaging' => false,
  'posts_per_page' => '4',
  'order' => 'ASC',
  'orderby' => 'date'
); 
$querybedank = new WP_Query($bedank);

if ($querybedank->have_posts()) :
  while ($querybedank->have_posts()) : $querybedank->the_post();
?>
    <h2 class="text-center"> <?php echo the_title() ?> </h2>
    <?php echo the_content() ?>
    <div class="text-center">
    <?php
           $locations = get_nav_menu_locations();
           $idVanNavigatie = $locations['main-menu'];
          $menu_items = wp_get_nav_menu_items($idVanNavigatie);
 
            foreach($menu_items as $item){
                if ($item->title == "Contact"){

                   echo '<a   class="c-folder__aanvraag-form-link" href="'. $item->url .'"><button class="btn-primary o-button c-folder__aanvraag-form-button">' . get_post_meta($post->ID, '_button_bedank', true) . '</button></a>';
                }
                
              }
              ?>
                  </div>

  </section>

  <?php
            endwhile;
          endif;
          wp_reset_query();

          ?>

<?php get_footer() ?>