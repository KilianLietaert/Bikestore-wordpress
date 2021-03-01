<?php get_header(  ) ?>

<?php
  $proefrit = array(
  'post_type' => array('proefrit'),
  'nopaging' => false,
  'posts_per_page' => '1',
  'order' => 'ASC',
  'orderby' => 'date'
  );
  
  $query_proefrit = new WP_Query($proefrit);

  if ($query_proefrit->have_posts()):
  while ($query_proefrit->have_posts()) : $query_proefrit->the_post();
?>

<main class="c-container">
    <section class="c-intro">
      <div class="container">
        <div class="row">
          <div class="c-intro__foto col-xxl-5 col-xl-12 col-lg-12">
    <img class="c-intro__foto--g" src="<?php the_post_thumbnail_url(); ?>" alt="bikster">
  </div>

  <div class="c-blokpadding  col-xxl-7  col-lg-12">
            <div class="c-more__blok1 ">
      <h2 class="c-intro__h"><?php the_title() ?></h2>
      <p class="c-intro__text"><?php the_content() ?></p>
    </div>

    <div class="c-more__blok2">
      <p class="c-intro__text--tijd"><?php echo $value_tijd = get_post_meta($post->ID, '_tijd_proefrit', true); ?></p>

      <div class="c-uur">
        <div>
          <h5 class="js-firstnumber">2</h5>
        </div>
        <div>
          <h5 class="js-secondnumber">4</h5>
        </div>
        <div>
          <h5>U</h5>
        </div>
      </div>
    </div>

    <div>
    </div>
</section>

<section class="c-textover">
  <h2 class="c-tussentitel"><?php echo $value_foto = get_post_meta($post->ID, '_foto_proefrit', true); ?> </h2>
</section>

<section class="c-more">
  <div class="container c-container__padding">

    <div class="c-textcenter">
      <div class="row">
        <p class="col-12 c-intro__text c-intro__text--responsief"><?php echo $value_icoon1 = get_post_meta($post->ID, '_icoon1_proefrit', true); ?></p>

        <div class="col-12 c-icons">

          <ul class="c-icon">
            <li><img src="<?php echo kdmfi_get_featured_image_src( $image_id='featured-image-2', $size, $post_id ); ?>" alt="bedrijf"></li>
            <li><img src="<?php echo kdmfi_get_featured_image_src( $image_id='featured-image-3', $size, $post_id ); ?>"></li>
            <li><img src="<?php echo kdmfi_get_featured_image_src( $image_id='featured-image-4', $size, $post_id ); ?>"></li>
            <li><img src="<?php echo kdmfi_get_featured_image_src( $image_id='featured-image-5', $size, $post_id ); ?>" alt="geen geld"></li>
          </ul>

        </div>

        <p class="col-12 c-intro__text c-intro__text--small c-intro__text--responsief2"><?php echo $value_icoon2 = get_post_meta($post->ID, '_icoon2_proefrit', true); ?></p>
      </div>
    </div>

    <hr class="c-line">


   

  </div>
</section>
 <!-- <section>
      <div class="c-form">
        <h1 class="c-form__h1 text-center c-margin">Boek uw afspraak nu!</h1>
        <form action="">
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="Voornaam" />
            <label for="floatingInput">Voornaam</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="" placeholder="Naam" />
            <label for="floatingInput">Naam</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="" placeholder="Straatnaam" />
            <label for="floatingInput">Straatnaam</label>
          </div>
          <div class="row g-2">
            <div class="col-md">
              <div class="form-floating mb-3">
                <input type="number" class="form-control" id="floatingInputGrid" placeholder="Nr" />
                <label for="floatingInputGrid">Nr</label>
              </div>
            </div>
            <div class="col-md">
              <div class="form-floating mb-3">
                <input type="number" class="form-control" id="floatingInputGrid" placeholder="Postcode" />
                <label for="floatingSelectGrid">Postcode</label>
              </div>
            </div>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="Plaatsnaam" />
            <label for="floatingInput">Plaatsnaam</label>
          </div>
          <div class="form-floating mb-3">
            <input type="email" class="form-control" id="" placeholder="Email" />
            <label for="floatingInput">Email</label>
          </div>
          <div class="form-floating mb-3">
            <input type="tel" class="form-control" id="" placeholder="Tel" pattern="((^[+\s0-9]{2,6}[\s\./0-
            9]*$))" />
            <label for="floatingInput">Telefoonnummer</label>
          </div>
          <div class="row g-2">
            <div class="col-md">
              <div class="form-floating mb-3">
                <select class="form-select" id="floatingSelectGrid" aria-label="Floating label select example">
                  <option selected>Kies uw model van fiets</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
                <label for="floatingSelectGrid"></label>
              </div>
            </div>
            <div class="col-md">
              <div class="form-floating mb-3">
                <input type="date" class="form-control" id="floatingInputGrid" placeholder="Datum"
                  value="10/02/2021" />
                <label for="floatingInputGrid"></label>
              </div>
            </div>
          </div>
          <div class="col-12">
            <div class="form-check c-form-check">
              <input class="form-check-input" type="checkbox" value="" id="nieuwsbrief" />
              <label class="form-check-label labelcheck" for="flexCheckDefault">
                Ik ontvang graag de nieuwsbrief
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="privacy" />
              <label class="form-check-label labelcheck" for="flexCheckDefault">
                Ik ga akkoord met het privacy statement
              </label>
            </div>
          </div>
          <div class="col-12 c-button__form">
            <button class="btn btn-primary o-button" type="submit">
              Proefrit aanvragen
            </button>
          </div>
        </form>
      </div>
      </div>
    </section> -->
</main>             


<?php 
  endwhile;
endif;
  wp_reset_query();
?>




<?php get_footer() ?>