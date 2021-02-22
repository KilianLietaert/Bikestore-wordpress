<?php get_header(  ) ?>

<section class="container-fluid">
        <div class="c-contactform">
            <div class="c-formcontact">
                <h1 class="c-form__h1--contactpagina">Contacteer ons</h1>
                <p class="c-contactform__text">We helpen je graag met al je wensen en vragen. Vul hieronder je bericht in en je krijgt antwoord binnen de 24 uur.</p>
                <form action="">
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control box" placeholder="Naam" />
                    <label class="c-floatingcontact" for="floatingInput">Naam</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input type="email" class="form-control box" placeholder="Email" />
                    <label class="c-floatingcontact" for="floatingInput">Email</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input
                      type="tel" class="form-control box" placeholder="Tel" pattern="((^[+\s0-9]{2,6}[\s\./0-9]*$))"/>
                    <label class="c-floatingcontact" for="floatingInput">Telefoonnummer</label>
                  </div>
                  <div class="form-floating mb-3">
                    <textarea class="form-control c-contactform__textarea box" placeholder="Leave a comment here" id="floatingTextarea2"></textarea>
                    <label class="c-floatingcontact" for="floatingTextarea2">Bericht</label>
                  </div>
                  <div class="col-12">
                    <div class="form-check c-form-check">
                      <input
                        class="form-check-input"
                        type="checkbox"
                        value=""
                        id="nieuwsbrief"
                      />
                      <label class="form-check-label labelcheck" for="flexCheckDefault">
                        Ik ontvang graag de nieuwsbrief
                      </label>
                    </div>
                    <div class="form-check">
                      <input
                        class="form-check-input"
                        type="checkbox"
                        value=""
                        id="privacy"
                      />
                      <label class="form-check-label labelcheck" for="flexCheckDefault">
                        Ik ga akkoord met het privacy statement
                      </label>
                    </div>
                  </div>
                  <div class="col-12 c-button__form">
                    <button class="btn btn-primary o-button" type="submit">
                      Versturen
                    </button>
                  </div>
                </form>
              </div>
        </div>
        <div class="row">
            <div class="c-googlemap col-xl-7 col-lg-7 col-md-12">
                <img class="c-googlemap__map" src="./img/googlmap.png" alt="google map">
            </div>
            <div class="c-contactinfo col-xl-5 col-lg-5 col-md-12">
                <h2 class="c-titel__2">Bikestore</h2>
                <ul class="c-listcontact">
                    <li><?php $value_adres = get_post_meta($post->ID, '_adres_bikestore', true);  $value_huisnr = get_post_meta($post->ID, '_huisnr_bikestore', true); ?></li>
                    <li><?php $value_postcode = get_post_meta($post->ID, '_postcode_bikestore', true); $value_stad = get_post_meta($post->ID, '_stad_bikestore', true); ?> </li>
                   
                    <?php

                        $value_land = get_post_meta($post->ID, '_land_bikestore', true);

                        if ($value_land == 1) {
                        echo "<li>België</li> ";
                        } elseif ($value_land == 2) {
                        echo "<li>Nederland</li>";
                        }  
                        else {
                        echo "<li>Duitsland</li>";
                        }

                        ?>
                </ul>
                <ul class="c-listcontact">
                    <li><?php $value_telefoon = get_post_meta($post->ID, '_telefoon_bikestore', true); ?></li>
                    <li><?php $value_email = get_post_meta($post->ID, '_email_bikestore', true); ?></li>
                </ul>

                <div class="c-contactinfo__plaats">
                    <p class="c-listcontact__text">Wil je graag meer weten over onze elektrische fietsen? </p>
                        <button class="btn btn-primary o-button" type="submit">
                          Proefrit aanvragen
                        </button>
                </div>
            </div>
        </div>
      </section>






<?php get_footer() ?>