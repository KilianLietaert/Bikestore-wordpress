<footer class="c-footer">
    <div class="c-footer__row1 row justify-content-center">
        <div class="c-footer__menu col-2 col-xl-2 col-lg-5 col-md-5 col-sm-10">
            <h1 class="c-footer__title">


                <?php echo $value_titel1 = get_post_meta($post->ID, '_footer_titel1', true); ?> </h1>


            <ul class="c-footer__menu-list">

                <?php
                $locations = get_nav_menu_locations();
                if (array_key_exists('footer-menu', $locations)) {
                    $idVanNavigatie = $locations['footer-menu'];
                    $menu_items = wp_get_nav_menu_items($idVanNavigatie);

                    foreach ($menu_items as $item) {
                        if (home_url($wp->request) . '/' == $item->url) {
                            echo '<li class="c-footer__menu-item active"><a href="' . $item->url . '">' . $item->title . '</a></li>';
                        } else {
                            echo '<li class="c-footer__menu-item"><a href="' . $item->url . '">' . $item->title . '</a></li>';
                        }
                    }
                } else {
                    echo 'Top navigatie niet ingesteld';
                }
                ?>
            </ul>
        </div>

        <div class="c-footer__informatie col-2 col-xl-2 col-lg-5 col-md-5 col-sm-10 ">
            <h1 class="c-footer__title"> <?php echo $value_titel2 = get_post_meta($post->ID, '_footer_titel2', true); ?> </h1>
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
            <h1 class="c-footer__title"><?php echo $value_titel3 = get_post_meta($post->ID, '_footer_titel3', true); ?></h1>
            <div class="c-footer__contact-adres">
                <p><?php echo $value_adres = get_post_meta($post->ID, '_adres_bikestore', true);
                    $value_huisnr = get_post_meta($post->ID, '_huisnr_bikestore', true); ?></p>
                <p><?php echo $value_postcode = get_post_meta($post->ID, '_postcode_bikestore', true);
                    $value_stad = get_post_meta($post->ID, '_stad_bikestore', true); ?> </p>
                <?php

                echo $value_land = get_post_meta($post->ID, '_land_bikestore', true);

                if ($value_land == 1) {
                    echo "<li>België</li> ";
                } elseif ($value_land == 2) {
                    echo "<li>Nederland</li>";
                } else {
                    echo "<li>Duitsland</li>";
                }

                ?>
            </div>
            <div class="c-footer__contact-gegevens">
                <p><?php echo $value_telefoon = get_post_meta($post->ID, '_telefoon_bikestore', true); ?></p>
                <p><?php echo $value_email = get_post_meta($post->ID, '_email_bikestore', true); ?></p>
            </div>
        </div>

        <div class="c-footer__overons col-3 col-xl-3 col-lg-5 col-md-5 col-sm-10">
            <h1 class="c-footer__title"><?php echo $value_titel4 = get_post_meta($post->ID, '_footer_titel4', true); ?></h1>
            <p>
                <?php echo $value_text = get_post_meta($post->ID, '_footer_text', true); ?>
            </p>
        </div>
    </div>
    <div class="c-footer__row2 row">
        <div class="c-footer__icon col-xl-3 col-lg-4 col-md-4 col-sm-10 ">
            <img class="c-footer__icon-facebook" src="icons/facebook_design.svg" alt="Facebook" />
            <img class="c-footer__icon-instagram" src="icons/instagram_design.svg" alt="Instagram" />
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