<?php get_header(  ) ?>

<?php
  $service = array(
  'post_type' => array('service'),
  'nopaging' => false,
  'posts_per_page' => '1',
  'order' => 'ASC',
  'orderby' => 'date'
  );
  
  $query_service = new WP_Query($service);

  if ($query_service->have_posts()):
  while ($query_service->have_posts()) : $query_service->the_post();
?>

<main>
        <div class="container">
            <div class="c-service">
                <h1 class="c-service__title"><?php echo $value_service_title_blok1 = get_post_meta($post->ID, '_service_title_blok1', true); ?></h1>
                <div class="c-service__advies row justify-content-center ">
                    <div class="c-service__advies-foto col-xxl-6 col-xl-6 col-lg-12 col-md-12 col-sm-12">
                        <img class="c-service__advies-foto" src="<?php echo get_the_post_thumbnail_url() ?>" alt="monaco_fiets" />
                    </div>
                    <div class="c-service__advies-info col-xxl-6  col-xl-6 col-lg-12 col-md-12 col-sm-12">
                        <h2 class="c-service__advies-title"><?php echo $value_service_subtitle_blok1 = get_post_meta($post->ID, '_service_subtitle_blok1', true); ?></h2>
                        <p class="c-service__advies-text">
                        <?php echo $value_service_text__blok1 = get_post_meta($post->ID, '_service_text__blok1', true); ?> </p>
                        </br>
                        <p class="c-service__advies-text">

                        </p>
                        </br>
                        <p class="c-service__advies-text">

                        </p>
                    </div>
                </div>
            </div>
        </div> 

        <div class="c-service__blok">
            <div class="c-service__services row justify-content-center ">
                <div class="c-service__services-levering row justify-content-center col-xl-3 col-lg-12 col-md-12 col-sm-10">
                    <h2 class="c-service__services-levering-title">
                    <?php echo $value_service_title_service1 = get_post_meta($post->ID, '_service_title_service1', true); ?></h2>
                    <img class="c-service__services-levering-image" src="<?php echo kdmfi_get_featured_image_src( $image_id='featured-image-2', $size, $post_id ); ?>" alt="logo_levering" />
                    <p class="c-service__services-levering-text">
                    <?php echo $value_service_text_service1 = get_post_meta($post->ID, '_service_text_service1', true); ?></p>
                </div>

                <div class="c-service__services-onderhoud row justify-content-center col-xl-3 col-lg-12 col-md-12 col-sm-10">
                    <h2 class="c-service__services-onderhoud-title">
                    <?php echo $value_service_title_service2 = get_post_meta($post->ID, '_service_title_service2', true); ?></h2>
                    <img class="c-service__services-onderhoud-image" src="<?php echo kdmfi_get_featured_image_src( $image_id='featured-image-3', $size, $post_id ); ?>" alt="logo_onderhoud" />
                    <p class="c-service__services-onderhoud-text">
                    <?php echo $value_service_text_service2 = get_post_meta($post->ID, '_service_text_service2', true); ?>
                    </p>
                </div>

                <div class="c-service__services-herstelling row justify-content-center col-xl-3 col-lg-12 col-md-10 col-sm-12">
                    <h2 class="c-service__services-herstelling-title">
                    <?php echo $value_service_title_service3 = get_post_meta($post->ID, '_service_title_service3', true); ?></h2>
                    <img class="c-service__services-herstelling-image" src="<?php echo kdmfi_get_featured_image_src( $image_id='featured-image-4', $size, $post_id ); ?>"
                        alt="logo_onderhoud" />
                    <p class="c-service__services-herstelling-text">
                    <?php echo $value_service_text_service3 = get_post_meta($post->ID, '_service_text_service3', true); ?></p>
                </div>
            </div>
        </div>
        <div class="container">
            <h2 class="c-service__verhelping-title"><?php echo $value_service_title_blok3 = get_post_meta($post->ID, '_service_title_blok3', true); ?></h2>
            <div class="c-service__verhelping row justify-content-center ">
                <div class="c-service__verhelping-pech col-lg-6 col-md-12 col-sm-12">
                    <h3 class="c-service__verhelping-pech-title"><?php echo $value_service_subtitle1_blok3 = get_post_meta($post->ID, '_service_subtitle1_blok3', true); ?></h1>
                        <p class="c-service__verhelping-pech-text">
                        <?php echo $value_service_text1_blok3 = get_post_meta($post->ID, '_service_text1_blok3', true); ?>
                        </p>
                        <img class="c-service__verhelping-pech-foto" src="<?php echo kdmfi_get_featured_image_src( $image_id='featured-image-5', $size, $post_id ); ?>" alt="women-with-flat-tire">
                </div>
                <div class="c-service__verhelping-garantie col-lg-6 col-md-12 col-sm-12 ">
                    <h3 class="c-service__verhelping-garantie-title"><?php echo $value_service_subtitle2_blok3 = get_post_meta($post->ID, '_service_subtitle2_blok3', true); ?></h1>
                        <p class="c-service__verhelping-garantie-text">
                        <?php echo $value_service_text2_blok3 = get_post_meta($post->ID, '_service_text2_blok3', true); ?></p>
                        </br>
                        <p class="c-service__verhelping-garantie-text">
                        </br>
                        <p class="c-service__verhelping-garantie-text">
                        </p>
                        </br>
                        <p class="c-service__verhelping-garantie-text">
                        </p>
                </div>
            </div>

            <div class="c-service__verzekering row justify-content-center">
                <div class="c-service__verzekering-logo col-lg-6 col-md-12 col-sm-12">
                    <img class="c-service__verzekering-image" src="<?php echo kdmfi_get_featured_image_src( $image_id='featured-image-6', $size, $post_id ); ?>"
                        alt="logo-verzekering">
                </div>
                <div class="c-service__verzekering-info col-lg-6 col-md-12 col-sm-12">
                    <h2 class="c-service__verzekering-title"><?php echo $value_service_title_blok4 = get_post_meta($post->ID, '_service_title_blok4', true); ?></h2>
                    <p class="c-service__verzekering-text">
                    <?php echo $value_service_text_blok4 = get_post_meta($post->ID, '_service_text_blok4', true); ?>
                    </p>
                    <div class="c-service__verzekering-pakket">
                        <h1 class="c-service__verzekering-pakket-title">
                        <?php echo $value_service_subtitle_blok4 = get_post_meta($post->ID, '_service_subtitle_blok4', true); ?></h1>

                        <?php
                            $locations = get_nav_menu_locations();
                            $idVanNavigatie = $locations['extra-menu'];
                            $menu_items = wp_get_nav_menu_items($idVanNavigatie);
            
                            foreach($menu_items as $item){
                                if ($item->title == "Brochure"){

                                echo '<a class=" c-service__verzekering-pakket-link" href="'. $item->url .'"><button class="o-button c-service__verzekering-pakket-button">' . get_post_meta($post->ID, '_service_text_knop_blok4', true) . '</button></a>';
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </main>

<?php 
  endwhile;
endif;
  wp_reset_query();
?>

<?php get_footer() ?>