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
    <!-- <p class="text-center c-bedankt__p"></p>
    <p class="text-center c-bedankt__p--margin">Veel leesplezier! Via deze link kan je terugkeren naar de <a href="index.html">homepagina.</a></p>
    <div class="text-center">
      <a class="c-folder__aanvraag-form-link" href="#">
        <button class="o-button c-folder__aanvraag-form-button">
            Neem contact op
        </button>
    </a>
    </div>  -->
    <?php echo the_content() ?>
  </section>

  <?php
            endwhile;
          endif;
          wp_reset_query();

          ?>

<?php get_footer() ?>