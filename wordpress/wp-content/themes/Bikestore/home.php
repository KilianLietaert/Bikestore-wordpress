<?php get_header(  ) ?>

<?php
  $home = array(
  'post_type' => array('home'),
  'nopaging' => false,
  'posts_per_page' => '1',
  'order' => 'ASC',
  'orderby' => 'date'
  );
  
  $query_home = new WP_Query($home);

  if ($query_home->have_posts()):
  while ($query_home->have_posts()) : $query_home->the_post();
?>

  <!-- banner met tekst en button -->
  <section>
    <div class="c-bannerhome">
      <div class="container ">
        <div class="row justify-content-center">
          <div class="c-bannerhome__content ">
            <div class="c-bannerhome__deel1">
              <h1 class="c-bannerhome__hoofd--h1"><?php echo $value_home_title_banner = get_post_meta($post->ID, '_home_title_banner', true); ?></h1>
              <h1 class="c-bannerhome__h1"><?php echo $value_home_subtitle_banner = get_post_meta($post->ID, '_home_subtitle_banner', true); ?></h1>
            </div>
            <div class="c-bannerhome__deel2">
              <h1 class="c-bannerhome__h1 c-bannerhome__h1--onder">
              <?php echo $value_home_subtitle2_banner = get_post_meta($post->ID, '_home_subtitle2_banner', true); ?>
              </h1>

                <?php 
                  $locations = get_nav_menu_locations();
                  $idVanNavigatie = $locations['main-menu'];
                  $menu_items = wp_get_nav_menu_items($idVanNavigatie);
 
                  foreach($menu_items as $item){
                      if ($item->title == "Elektrische fietsen"){

                      echo '<a href="'. $item->url .'"><button class="btn-primary o-button c-bannerhome__button">' . get_post_meta($post->ID, '_home_knop_banner', true) . '</button></a>';
                    }
                  }
               ?>

                    

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
    <div class="nb-usp-container">  
      <div class="container">
      <div class="nb-usp-content">
        <ul class="nb-usp-content-row row">
          <li class="c-usp__tekst col-xl-3 col-lg-6 col-md-6 col-sm-12">
            <img class="c-usp__vink" src="<?php echo get_stylesheet_directory_uri() . '/img/check.svg'; ?>" alt="" />
            <?php echo $value_home_service1 = get_post_meta($post->ID, '_home_service1', true); ?>
          </li>
          <li class="c-usp__tekst col-xl-3 col-lg-6 col-md-6 col-sm-12">
            <img class="c-usp__vink" src="<?php echo get_stylesheet_directory_uri() . '/img/check.svg'; ?>" alt="" />
            <?php echo $value_home_service2 = get_post_meta($post->ID, '_home_service2', true); ?>
          </li>
          <li class="c-usp__tekst col-xl-3 col-lg-6 col-md-6 col-sm-12">
            <img class="c-usp__vink" src="<?php echo get_stylesheet_directory_uri() . '/img/check.svg'; ?>" alt="" />
            <?php echo $value_home_service3 = get_post_meta($post->ID, '_home_service3', true); ?>
          </li>
          <li class="c-usp__tekst col-xl-3 col-lg-6 col-md-6 col-sm-12">
            <img class="c-usp__vink" src="<?php echo get_stylesheet_directory_uri() . '/img/check.svg'; ?>" alt="" />
            <?php echo $value_home_service4 = get_post_meta($post->ID, '_home_service4', true); ?>
          </li>
        </ul>
      </div>
    </div>
  </div>

    <div class="container">
  <section class="c-uitleg row">
      <div class="c-uitleg__tekst col-xl-6 col-lg-12 col-md-12 col-sm-12">
        <h1 class="c-uitleg__h1">
        <?php echo $value_home_title_blok1 = get_post_meta($post->ID, '_home_title_blok1', true); ?>
        </h1>
        <p class="c-uitleg__p">
        <?php echo $value_home_text_blok1 = get_post_meta($post->ID, '_home_text_blok1', true); ?>
        </p>

              <?php
                  $locations = get_nav_menu_locations();
                  $idVanNavigatie = $locations['main-menu'];
                  $menu_items = wp_get_nav_menu_items($idVanNavigatie);
 
                  foreach($menu_items as $item){
                      if ($item->title == "Elektrische fietsen"){

                      echo '<a href="'. $item->url .'"><button class="btn-primary o-button c-uitleg__button">' . get_post_meta($post->ID, '_home_text_knop_blok1', true) . '</button></a>';
                    }
                  }
              ?>

      </div>
      <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
        <img class="c-uitleg__img" src="<?php echo get_the_post_thumbnail_url() ?>" alt="family-background-evening-sport-bike" />
      </div>
  </section>
    </div>

  <section>
    <div class="c-image__fixed"></div>
  </section>

  <section class="c-uitproberen ">
    <div class="container">
      <div class="row justify-content-center">
    <div class="c-uitproberen__tekst col-xl-8 col-lg-10 col-md-10 col-sm-10">
      <h1 class="c-uitproberen__h1"><?php echo $value_home_title_blok2 = get_post_meta($post->ID, '_home_title_blok2', true); ?></h1>
      <p class="c-uitproberen__p">
      <?php echo $value_home_text_blok2 = get_post_meta($post->ID, '_home_text_blok2', true); ?>
      </p>

      <?php
                  $locations = get_nav_menu_locations();
                  $idVanNavigatie = $locations['extra-menu'];
                  $menu_items = wp_get_nav_menu_items($idVanNavigatie);
 
                  foreach($menu_items as $item){
                      if ($item->title == "Proefrit"){

                      echo '<a href="'. $item->url .'"><button class="btn-primary o-button c-uitproberen__button">' . get_post_meta($post->ID, '_home_text_knop_blok2', true) . '</button></a>';
                    }
                  }
              ?>
    </div>
  </div>
  </div>
  </section>

<div class="container">
  <section class="c-repair">
    <div class="c-repair__inhoud row justify-content-center">
      <div class="c-repair__1 col-xl-6 col-lg-12 col-md-12 col-sm-12">
        <img class="c-repair__img" src="<?php echo kdmfi_get_featured_image_src( $image_id='featured-image-2', $size, $post_id ); ?>" alt="" />
      </div>
      <div class="c-repair__2 col-xl-5 col-lg-12 col-md-12 col-sm-12">
        <h1 class="c-repair__h1">
          <?php echo $value_home_title_blok3 = get_post_meta($post->ID, '_home_title_blok3', true); ?>
        </h1>
        <p class="c-repair__p">
          <?php echo $value_home_text_blok3 = get_post_meta($post->ID, '_home_text_blok3', true); ?>
        </p>
        <?php
                  $locations = get_nav_menu_locations();
                  $idVanNavigatie = $locations['main-menu'];
                  $menu_items = wp_get_nav_menu_items($idVanNavigatie);
 
                  foreach($menu_items as $item){
                      if ($item->title == "Over bikestore"){

                      echo '<a href="'. $item->url .'"><button class="btn-primary o-button c-overons__button">' . get_post_meta($post->ID, '_home_text_knop_blok3', true) . '</button></a>';
                    }
                  }
          ?>
      </div>
    </div>
  </section>
  </div>
<div class="container ">
  <section class="c-brochure row justify-content-center">
    <div class="c-brochure__inhoud col-xl-6 col-lg-10 col-md-12 col-sm-12">
      <h1 class="c-brochure__h1">        
        <?php echo $value_home_title_blok4 = get_post_meta($post->ID, '_home_title_blok4', true); ?>
      </h1>
      <p class="c-brochure__p">
        <?php echo $value_home_text_blok4 = get_post_meta($post->ID, '_home_text_blok4', true); ?>
      </p>

      <?php
                  $locations = get_nav_menu_locations();
                  $idVanNavigatie = $locations['extra-menu'];
                  $menu_items = wp_get_nav_menu_items($idVanNavigatie);
 
                  foreach($menu_items as $item){
                      if ($item->title == "Brochure"){

                      echo '<a href="'. $item->url .'"><button class="btn-primary o-button c-brochure__button">' . get_post_meta($post->ID, '_home_text_knop_blok4', true) . '</button></a>';
                    }
                  }
              ?>

    </div>
  </section>
</div>


<?php 
  endwhile;
endif;
  wp_reset_query();
?>

<?php get_footer() ?>