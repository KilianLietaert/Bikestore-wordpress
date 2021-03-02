<?php get_header(  ) ?>



        <div class="c-folder">
            <div class="c-folder__info row ">
                <h1 class="c-folder__info-title col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <?php the_title( ) ?>
                </h1>

                <p class="c-folder__info-text col-lg-12 col-md-12 col-sm-12 ">
                <?php the_content( ) ?>
            
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
                    
                    <form class="c-folder__aanvraag-form" action="">

                    <?php echo do_shortcode('[ninja_form id=2]'); ?>
                        
                    </form>


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