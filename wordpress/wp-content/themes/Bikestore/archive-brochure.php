<?php get_header(  ) ?>



        <div class="c-folder">
            <div class="c-folder__info row ">
                <h1 class="c-folder__info-title col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <?php $value_titel = get_post_meta($post->ID, '_titel_brochure', true); ?>
                </h1>

                <p class="c-folder__info-text col-lg-12 col-md-12 col-sm-12 ">
                <?php the_content( ) ?>
                    <!-- Wilt u meer weten over onze elektrische fietsen? Bent u benieuwd wat Bikestore u allemaal te bieden
                    heeft? Vraag een gratis brochure aan. U ontvangt
                    <strong class="c-folder__info-text-strong">direct onze digitale brochure.</strong>
                    </br>
                    De brochure staat boordevol informatie over onze elektrische fietsen. -->
                </p>
            </div>
            <div class="c-folder__aanvraag row justify-content-center">
                <div class="c-folder__aanvraag-foto col-xl-4 col-lg-12 col-md-12 col-sm-12">
                    <img class="c-folder__aanvraag-foto-brochure" src="<?php echo get_the_post_thumbnail_url()?>" alt="foto brochure">
                </div>
                <div class="c-folder__aanvraag-formulier col-xl-6 col-lg-10 col-md-10 col-sm-10">
                    <h2 class="c-folder__aanvraag-formulier-title">
                    <?php $value_titelform1 = get_post_meta($post->ID, '_titelform1_brochure', true); ?>
                    </h2>

                    <h3 class="c-folder__aanvraag-formulier-subtitle">
                    <?php $value_titelform2 = get_post_meta($post->ID, '_titelform2_brochure', true); ?>
                    </h3>
                    <!-- 
                    <form class="c-folder__aanvraag-form" action="">

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control box" placeholder="Naam" />
                            <label class="c-floatingcontact" for="floatingInput">Naam</label>
                          </div>

                          <div class="form-floating mb-3">
                            <input type="email" class="form-control box" placeholder="Email" />
                            <label class="c-floatingcontact" for="floatingInput">Email</label>
                          </div>
                        <div>

                            <input class="c-folder__aanvraag-formulier-checkbox" type="checkbox" id="brochure" name="brochure" value="brochure">
                            <label class="c-folder__aanvraag-formulier-checkbox-text" for="vehicle1" >Ik ontvang graag de nieuwsbrief</label>
                        </div>
                    </form>

                    <a class="c-folder__aanvraag-form-link" href="#">
                        <button class="o-button c-folder__aanvraag-form-button">
                            Brochure aanvragen
                        </button>
                    </a> -->


                    <ul class="c-folder__aanvraag-info">
                        <li class="c-folder__aanvraag-info-item"><?php $value_extrainfo1 = get_post_meta($post->ID, '_extrainfo1_brochure', true); ?> </li>
                        <li class="c-folder__aanvraag-info-item"><?php $value_extrainfo2 = get_post_meta($post->ID, '_extrainfo2_brochure', true); ?> 
                        </li>
                        <li class="c-folder__aanvraag-info-item"><?php $value_extrainfo3 = get_post_meta($post->ID, '_extrainfo3_brochure', true); ?> 
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    





<?php get_footer() ?>