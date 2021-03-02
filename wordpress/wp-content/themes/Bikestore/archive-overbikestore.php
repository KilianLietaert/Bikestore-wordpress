<?php get_header(  ) ?>

<?php
  $overbikestore = array(
  'post_type' => array('overbikestore'),
  'nopaging' => false,
  'posts_per_page' => '1',
  'order' => 'ASC',
  'orderby' => 'date'
  );
  
  $query_overbikestore = new WP_Query($overbikestore);

  if ($query_overbikestore->have_posts()):
  while ($query_overbikestore->have_posts()) : $query_overbikestore->the_post();
?>
<body>
<main>
    <div class="container">
    <div class="c-about__info row justify-content-center">
        <div class="c-about__info-inhoud col-xl-6 col-lg-12 col-md-12 col-sm-12">
            <h1 class="c-about__info-title"><?php echo $value_overbikestore_title_blok1 = get_post_meta($post->ID, '_overbikestore_title_blok1', true); ?></h1>
            <p class="c-about__info-text"><?php echo $value_overbikestore_text_blok1 = get_post_meta($post->ID, '_overbikestore_text_blok1', true); ?>
            </p>
            </br>
            <p class="c-about__info-name"><?php echo $value_overbikestore_text_name_blok1 = get_post_meta($post->ID, '_overbikestore_text_name_blok1', true); ?></p>
        </div>
        <div class="c-about__info-image row justify-content-center col-xl-6 col-lg-12 col-md-12 col-sm-12">
            <img class="c-about__info-foto row" src="<?php echo get_the_post_thumbnail_url() ?>"
                alt="father-teaching-his-little-son-ride-bicycle">
        </div>
    </div>

    <div class="c-about__kopen row ">
        <h2 class="c-about__kopen-title  col-xl-10 col-lg-10 col-md-10 col-sm-10">
        <?php echo $value_overbikestore_title_blok2 = get_post_meta($post->ID, '_overbikestore_title_blok2', true); ?>
        </h2>
        <div class="c-about__kopen-internet row justify-content-center">
            <div class="c-about__kopen-internet-foto row col-xl-5 col-lg-12 col-md-12 col-sm-12">
                <img class="c-about__kopen-internet-foto-laptop" src="<?php echo kdmfi_get_featured_image_src( $image_id='featured-image-2', $size, $post_id ); ?>"
                    alt="foto's webshop">
            </div>
            <div class="c-about__kopen-internet-info col-xl-5 col-lg-12 col-md-12 col-sm-12">
                <h3 class="c-about__kopen-internet-title">
                <?php echo $value_overbikestore_subtitle1_blok2 = get_post_meta($post->ID, '_overbikestore_subtitle1_blok2', true); ?>
                </h3>
                <p class="c-about__kopen-internet-text">
                <?php echo $value_overbikestore_text1_blok2 = get_post_meta($post->ID, '_overbikestore_text1_blok2', true); ?>
                </p>
            </div>
        </div>
        <div class="c-about__kopen-winkel row justify-content-center">
            <div class="c-about__kopen-winkel-foto row col-xl-5 col-lg-12 col-md-12 col-sm-12">
                <img class="c-about__kopen-winkel-foto-verkoper" src="<?php echo kdmfi_get_featured_image_src( $image_id='featured-image-3', $size, $post_id ); ?>" alt="foto verkoper">
            </div>
            <div class="c-about__kopen-winkel-info col-xl-5 col-lg-12 col-md-12 col-sm-12">
                <h3 class="c-about__kopen-winkel-title ">
                <?php echo $value_overbikestore_subtitle2_blok2 = get_post_meta($post->ID, '_overbikestore_subtitle2_blok2', true); ?>
                </h3>
                <p class="c-about__kopen-winkel-text">
                <?php echo $value_overbikestore_text2_blok2 = get_post_meta($post->ID, '_overbikestore_text2_blok2', true); ?>
                </p>
                </br>
                <p class="c-about__kopen-winkel-text">
                   

                </p>
                <h3 class="c-about__subtitle">
                <?php echo $value_overbikestore_onderschrift_onderaan_blok2 = get_post_meta($post->ID, '_overbikestore_onderschrift_onderaan_blok2', true); ?>
                </h3>
            </div>
        </div>

    </div>

    <div class="c-about row">
        <div class="c-about__comfort col-xl-10 col-lg-12 col-md-12 col-sm-12">
            <h2 class="c-about__comfort-title">
            <?php echo $value_overbikestore_title_blok3 = get_post_meta($post->ID, '_overbikestore_title_blok3', true); ?>
            </h2>
            <p class="c-about__comfort-text">
            <?php echo  $value_overbikestore_text_blok3 = get_post_meta($post->ID, '_overbikestore_text_blok3', true); ?>
            </p>
        </div>
        <div class="c-about__weesgerust col-xl-10 col-lg-12 col-md-12 col-sm-12">
            <h2 class="c-about__weesgerust-title">
            <?php echo $value_overbikestore_title_blok4 = get_post_meta($post->ID, '_overbikestore_title_blok4', true); ?>
            </h2>
            <p class="c-about__weesgerust-text">
            <?php echo $value_overbikestore_text_blok4 = get_post_meta($post->ID, '_overbikestore_text_blok4', true); ?>
            </p>
            <p class="c-about__weesgerust-text2">

            </p>
        </div>
        <img class="c-about__foto col-xl-10 col-lg-12 col-md-12 col-sm-12" src="<?php echo kdmfi_get_featured_image_src( $image_id='featured-image-4', $size, $post_id ); ?>" alt="city-bikes">
    </div>

    <div class="c-about__proefrit">
        <h1 class="c-about__proefrit-title row justify-content-center">
        <?php echo $value_overbikestore_title_blok5 = get_post_meta($post->ID, '_overbikestore_title_blok5', true); ?>
        </h1>

        <?php
                  $locations = get_nav_menu_locations();
                  $idVanNavigatie = $locations['extra-menu'];
                  $menu_items = wp_get_nav_menu_items($idVanNavigatie);
 
                  foreach($menu_items as $item){
                      if ($item->title == "Proefrit"){

                      echo '<a class="row justify-content-center c-about__proefrit-link" href="'. $item->url .'"><button class="o-button c-about__proefrit-button">' . get_post_meta($post->ID, '_overbikestore_text_knop_blok5', true) . '</button></a>';
                      
                    }
                  }
              ?>


              

    </div>
</div>
</main>
</body>


<?php 
  endwhile;
endif;
  wp_reset_query();
?>

<?php get_footer() ?>