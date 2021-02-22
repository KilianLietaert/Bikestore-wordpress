
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title><?php echo get_bloginfo('name'); ?></title>
    <?php wp_head() ?>
</head>

<body>

    <header>

        <div class="container-fluid c-navover">

            <div class="c-navover__topnav">
                <div class="row top-nav">
                    <div class="c-zoek col-xl-4 col-lg-4 col-md-6 order-xl-1 order-lg-1 order-md-2 order-sm-3 order-3">
                        <div class="c-zoek__balk">
                            <div class="c-topnav">
                                <div class="search-container">
                                    <form action="#">
                                        <input class="c-topnav__input" type="text" name="search">
                                        <button class="c-topnav__button" type="submit"><img id="zoekimg" src="<?php echo get_stylesheet_directory_uri() . '/img/zoek-icon.png'; ?>"></img></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="c-logo col-xl-4 col-lg-3 col-md-12 order-xl-2 order-lg-2 order-md-1 order-sm-1 order-1">
                        <div>
                            <a href="<?php echo get_home_url(); ?>"><img src="<?php echo get_stylesheet_directory_uri() . '/img/logo.png'; ?>" alt="home"></a>
                        </div>
                    </div>

                    <div class="c-toplist col-xl-4 col-lg-5 col-md-6 order-xl-3 order-lg-3 order-md-3 order-sm-2 order-2">
                        <ul class="c-topnavigation">

                            <?php
                            $locations = get_nav_menu_locations();
                            if (array_key_exists('top-menu', $locations)) {
                                $idVanNavigatie = $locations['top-menu'];
                                $menu_items = wp_get_nav_menu_items($idVanNavigatie);

                                foreach ($menu_items as $item) {
                                    if (home_url($wp->request) . '/' == $item->url) {
                                        echo '<li class="c-topnavigation__line active"><a href="' . $item->url . '">' . $item->title . '</a></li>';
                                    } else {
                                        echo '<li class="c-topnavigation__line active"><a href="' . $item->url . '">' . $item->title . '</a></li>';
                                    }
                                }
                            } else {
                                echo 'Top navigatie niet ingesteld';
                            }
                            ?>

                            <li><a href="#"><svg class="c-svgnav" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <path d="M19.029 13h2.971l-.266 1h-2.992l.287-1zm.863-3h2.812l.296-1h-2.821l-.287 1zm-.576 2h4.387l.297-1h-4.396l-.288 1zm2.684-9l-.743 2h-1.929l-3.474 12h-11.239l-4.615-11h14.812l-.564 2h-11.24l2.938 7h8.428l3.432-12h4.194zm-14.5 15c-.828 0-1.5.672-1.5 1.5 0 .829.672 1.5 1.5 1.5s1.5-.671 1.5-1.5c0-.828-.672-1.5-1.5-1.5zm5.9-7-.9 7c-.828 0-1.5.671-1.5 1.5s.672 1.5 1.5 1.5 1.5-.671 1.5-1.5c0-.828-.672-1.5-1.5-1.5z" />
                                    </svg>&nbsp;0 items</a></li>


                        </ul>
                    </div>

                </div>
            </div>

            <div class="c-navover__nav">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="#"><img src="<?php echo get_stylesheet_directory_uri() . '/img/logo.png'; ?>" alt="logo"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">

                            <?php
                            $locations = get_nav_menu_locations();
                            if (array_key_exists('main-menu', $locations)) {
                                $idVanNavigatie = $locations['main-menu'];
                                $menu_items = wp_get_nav_menu_items($idVanNavigatie);

                                foreach ($menu_items as $item) {
                                    if (home_url($wp->request) . '/' == $item->url) {
                                        echo '<li class="nav-item"> <a class="nav-link active" aria-current="page" href="' . $item->url . '">' . $item->title . '</a> </li>';
                                    } else {
                                        echo '<li class="nav-item"> <a class="nav-link" href="' . $item->url . '">' . $item->title . '</a>';
                                    }
                                }
                            } else {
                                echo 'Hoofd navigatie niet ingesteld';
                            }
                            ?>

                            <li class="nav-item c-navitem-zoekbalk">
                                <div class="c-zoek__balk">
                                    <div class="c-topnav">
                                        <div class="search-container">
                                            <form action="#">
                                                <input class="c-topnav__input" type="text" name="search">
                                                <button class="c-topnav__button" type="submit"><img src="<?php echo get_stylesheet_directory_uri() . '/img/zoek-icon.png'; ?>"></img></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>

            </div>
        </div>

    </header>

