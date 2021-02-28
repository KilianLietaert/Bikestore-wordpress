<?php
$arg = array(
    'post_type' => array('footer'),
    'nopaging' => false,
    'posts_per_page' => '1',
    'order' => 'ASC',
    'orderby' => 'date'
);

$query = new WP_Query($arg);
?>

<footer class="c-footer">
    <div class="c-footer__row1 row justify-content-center">
        <div class="c-footer__menu col-2 col-xl-2 col-lg-5 col-md-5 col-sm-10">
            <h1 class="c-footer__title">

                <?php

                if ($query->have_posts()) :
                    while ($query->have_posts()) : $query->the_post();
                        echo $value_titel1 = get_post_meta($post->ID, '_footer_titel1', true);
                    endwhile;
                endif;
                wp_reset_query();

                ?>
            </h1>


            <ul class="c-footer__menu-list">

                <?php
                $locations = get_nav_menu_locations();
                if (array_key_exists('footer-menu', $locations)) {
                    $idVanNavigatie = $locations['footer-menu'];
                    $menu_items = wp_get_nav_menu_items($idVanNavigatie);

                    foreach ($menu_items as $item) {
                        if (home_url($wp->request) . '/' == $item->url) {
                            echo '<li class="c-footer__menu-item active"><a class="c-footer__informatie-link active" href="' . $item->url . '">' . $item->title . '</a></li>';
                        } else {
                            echo '<li class="c-footer__menu-item"><a class="c-footer__informatie-link" href="' . $item->url . '">' . $item->title . '</a></li>';
                        }
                    }
                } else {
                    echo 'Top navigatie niet ingesteld';
                }
                ?>
            </ul>
        </div>

        <div class="c-footer__informatie col-2 col-xl-2 col-lg-5 col-md-5 col-sm-10 ">
            <h1 class="c-footer__title">

                <?php


                if ($query->have_posts()) :
                    while ($query->have_posts()) : $query->the_post();
                        echo $value_titel2 = get_post_meta($post->ID, '_footer_titel2', true);
                    endwhile;
                endif;
                wp_reset_query();

                ?>

            </h1>
            <div class="c-footer__informatie-links">
                <?php
                $locations = get_nav_menu_locations();
                if (array_key_exists('extra-menu', $locations)) {
                    $idVanNavigatie = $locations['extra-menu'];
                    $menu_items = wp_get_nav_menu_items($idVanNavigatie);

                    foreach ($menu_items as $item) {
                        if (home_url($wp->request) . '/' == $item->url) {
                            echo '<a class="c-footer__informatie-link active" href="' . $item->url . '">' . $item->title . '</a>';
                        } else {
                            echo '<a class="c-footer__informatie-link" href="' . $item->url . '">' . $item->title . '</a>';
                        }
                    }
                } else {
                    echo 'Top navigatie niet ingesteld';
                }
                ?>
            </div>
        </div>
        <div class="c-footer__contact col-2 col-xl-2 col-lg-5 col-md-5 col-sm-10 ">
            <h1 class="c-footer__title">

                <?php

                if ($query->have_posts()) :
                    while ($query->have_posts()) : $query->the_post();
                        echo $value_titel3 = get_post_meta($post->ID, '_footer_titel3', true);
                    endwhile;
                endif;
                wp_reset_query();

                ?>

            </h1>
            <div class="c-footer__contact-adres">

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

                        <p><?php echo $value_adres = get_post_meta($post->ID, '_adres_bikestore', true); ?>
                            <?php echo $value_huisnr = get_post_meta($post->ID, '_huisnr_bikestore', true); ?></p>
                        <p><?php echo $value_postcode = get_post_meta($post->ID, '_postcode_bikestore', true); ?>
                            <?php echo $value_stad = get_post_meta($post->ID, '_stad_bikestore', true); ?></p>
                        <?php

                        $value_land = get_post_meta($post->ID, '_land_bikestore', true);

                        if ($value_land == 1) {
                            echo "<p>België</p> ";
                        } elseif ($value_land == 2) {
                            echo "<p>Nederland</p>";
                        } else {
                            echo "<p>Duitsland</p>";
                        }

                        ?>
                <?php
                    endwhile;
                endif;
                wp_reset_query();

                ?>

            </div>
            <div class="c-footer__contact-gegevens">
                <?php

                if ($querycontact->have_posts()) :
                    while ($querycontact->have_posts()) : $querycontact->the_post();
                ?>
                        <p>tel: <?php echo $value_telefoon = get_post_meta($post->ID, '_telefoon_bikestore', true); ?></p>

                        <p><?php echo $value_email = get_post_meta($post->ID, '_email_bikestore', true); ?></p>
                <?php
                    endwhile;
                endif;
                wp_reset_query();

                ?>

            </div>
        </div>

        <div class="c-footer__overons col-3 col-xl-3 col-lg-5 col-md-5 col-sm-10">
            <h1 class="c-footer__title">

                <?php

                if ($query->have_posts()) :
                    while ($query->have_posts()) : $query->the_post();
                        echo $value_titel4 = get_post_meta($post->ID, '_footer_titel4', true);
                    endwhile;
                endif;
                wp_reset_query();

                ?>

            </h1>

               <!-- Begin Mailchimp Signup Form -->
                <link href="//cdn-images.mailchimp.com/embedcode/slim-10_7.css" rel="stylesheet" type="text/css">
                <div id="mc_embed_signup">
                <form action="https://howest.us7.list-manage.com/subscribe/post?u=475c8d1f6547efcf9fcdc44e6&amp;id=b7efd8c974" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                    <div id="mc_embed_signup_scroll" class="form-nieuwsbrief">
                        <input type="email" value="" name="EMAIL" class="form-control box form-nieuwsbrief__input" id="mce-EMAIL" placeholder="email address" required>
                        <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                        <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_475c8d1f6547efcf9fcdc44e6_b7efd8c974" tabindex="-1" value=""></div>
                        <div class="clear"> 
                            <a href="#">
                            <button class="o-button c-brochure__button" type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe"">
                                Inschrijven
                            </button>
                            </a>
                    </div>
                    </div>
                </form>
                </div>

               

                <!--End mc_embed_signup-->

        </div>
    </div>
    <div class="c-footer__row2 row">
        <div class="c-footer__icon col-xl-3 col-lg-4 col-md-4 col-sm-10 ">
            <a href="https://www.facebook.com/howestbe"> <img class="c-footer__icon-facebook" src="<?php echo get_stylesheet_directory_uri() . '/img/facebook_design.svg'; ?>" alt="Facebook" /></a>
            <a href="https://www.instagram.com/howestbe/"> <img class="c-footer__icon-instagram" src="<?php echo get_stylesheet_directory_uri() . '/img/instagram_design.svg'; ?>" alt="Instagram" /></a>
        </div>
        <div class="c-footer__copyright col-lg-6 col-md-6 col-sm-10">
            <p class="c-footer__copyright-text">
                Wordpress theme &copy; 2021 | All Rights Reserved
            </p>
        </div>
    </div>
</footer>
</body>
<?php wp_footer(); ?>

</html>