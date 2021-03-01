<?php get_header() ?>


<main>
  <div class="c-contact container">
    <div class="c-contactform">
<form action="">
<?php echo do_shortcode('[ninja_form id=3]');?>
</form>

      <?php // echo do_shortcode('[contact-form-7 id="95" title="Contactformulier"]'); ?>
    </div>
    <div class="row">
      <div class="c-googlemap col-xl-7 col-lg-7 col-md-12">
        <div class="c-googlemap__map"><?php echo do_shortcode('[mappress mapid="1" width="96%" height="68%" border-radius="5%"]'); ?></div>
      </div>
      <div class="c-contactinfo col-xl-5 col-lg-5 col-md-12">
        <h2 class="c-titel__2">Bikestore</h2>
        <ul class="c-listcontact">

          <?php


          $contact = array(
            'post_type' => array('contact'),
            'nopaging' => false,
            'posts_per_page' => '4',
            'order' => 'ASC',
            'orderby' => 'date'
          );

          $querycontact = new WP_Query($contact);

          if ($querycontact->have_posts()) :
            while ($querycontact->have_posts()) : $querycontact->the_post();
          ?>

<main>
  <div class="c-contact container">
    <div class="c-contactform">


    </div>
    <div class="row">
      <div class="c-googlemap col-xl-7 col-lg-7 col-md-12">
        <div class="c-googlemap__map"><?php echo the_content()?></div>
      </div>
      <div class="c-contactinfo col-xl-5 col-lg-5 col-md-12">
        <h2 class="c-titel__2">Bikestore</h2>
        <ul class="c-listcontact">

          
              <li><?php echo $value_adres = get_post_meta($post->ID, '_adres_bikestore', true); ?>
                <?php echo $value_huisnr = get_post_meta($post->ID, '_huisnr_bikestore', true); ?></li>
              <li><?php echo $value_postcode = get_post_meta($post->ID, '_postcode_bikestore', true); ?>
                <?php echo $value_stad = get_post_meta($post->ID, '_stad_bikestore', true); ?> </li>

              <?php

              $value_land = get_post_meta($post->ID, '_land_bikestore', true);

              if ($value_land == 1) {
                echo "<li>België</li> ";
              } elseif ($value_land == 2) {
                echo "<li>Nederland</li>";
              } else {
                echo "<li>Duitsland</li>";
              }

              ?>
          <?php
            endwhile;
          endif;
          wp_reset_query();

          ?>
        </ul>
        <ul class="c-listcontact">
          <?php
          if ($querycontact->have_posts()) :
            while ($querycontact->have_posts()) : $querycontact->the_post();
          ?>
              <li><?php echo $value_telefoon = get_post_meta($post->ID, '_telefoon_bikestore', true); ?></li>
              <li><?php echo $value_email = get_post_meta($post->ID, '_email_bikestore', true); ?></li>
          <?php
            endwhile;
          endif;
          wp_reset_query();

          ?>
        </ul>
        <div class="c-contactinfo__plaats">
          <p class="c-listcontact__text">Wil je graag meer weten over onze elektrische fietsen? </p>
          <button class="btn btn-primary o-button" type="submit">
            Proefrit aanvragen
          </button>
        </div>
      </div>
    </div>
  </div>
</main>

<?php get_footer() ?>