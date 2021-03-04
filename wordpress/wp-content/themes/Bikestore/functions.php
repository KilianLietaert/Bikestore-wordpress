<?php

function mytheme_add_woocommerce_support()
{
  add_theme_support('woocommerce');
}

function bs_laadCSSenScript()
{
  $pathTheme = get_template_directory_uri();
  wp_enqueue_style("bootstrap", $pathTheme . '/css/bootstrap.min.css');
  wp_enqueue_style('bikestore', $pathTheme . '/css/screen.css', ['bootstrap']);

  wp_enqueue_script('bootstrapjs', $pathTheme . '/script/bootstrap.min.js');
  wp_enqueue_script('menujs', $pathTheme . '/script/fietsaanvraag-uur.js');
}


function bs_register_my_menus()
{
  register_nav_menus(
    array(
      'top-menu' => __('topnav Menu'),
      'main-menu' => __('Hoofd Menu'),
      'footer-menu' => __('Voet Menu'),
      'extra-menu' => __('extra pagina s Menu')
    )
  );
}


function get_url_by_slug($slug) {
  $page_url_id = get_page_by_path( $slug );
  $page_url_link = get_permalink($page_url_id);
  return $page_url_link;
 }


function bs_register_contact()
{

  $labels_contact = array(
    'name' => 'Contact',
    'singular_name' => 'Contact',
    'menu_name' => 'Contact',
    'name_admin_bar' => 'Contact',
    'archives' => 'Contact archief',
    'attributes' => 'Contact Attributes',
    'parent_item_colon' => 'Parent Item:',
    'all_items' => 'All Items',
    'add_new_item' => 'Voeg nieuw contact toe',
    'add_new' => 'Nieuw contact',
    'new_item' => 'Nieuw contact',
    'edit_item' => 'Wijzig contact',
    'update_item' => 'Update contact',
    'view_item' => 'Toon contact',
    'view_items' => 'Toon contact',
    'search_items' => 'Doorzoek contact',
    'not_found' => 'Not found',
    'not_found_in_trash' => 'Not found in Trash',
    'featured_image' => 'Featured Image',
    'set_featured_image' => 'Set featured image',
    'remove_featured_image' => 'Remove featured image',
    'use_featured_image' => 'Use as featured image',
    'insert_into_item' => 'Insert into item',
    'uploaded_to_this_item' => 'Uploaded to this item',
    'items_list' => 'Contact lijst',
    'items_list_navigation' => 'Contact lijst navigation',
    'filter_items_list' => 'Filter contact lijst',
  );

  $args_contact = array(

  'label' => 'Contact',
  'description' => 'Contact  (adres, nummer, email)',
  'labels' => $labels_contact,
  'supports' => array( 'title', 'editor', 'thumbnail', 'revisions', 'custom-fields' ),
  'hierarchical' => false,
  'public' => true,
  'show_ui' => true,
  'show_in_menu' => true,
  'menu_position' => 5,
  'menu_icon' => 'dashicons-phone',
  'show_in_admin_bar' => true,
  'show_in_nav_menus' => true,
  'can_export' => true,
  'has_archive' => true,
  'exclude_from_search' => false,
  'publicly_queryable' => true,
  'capability_type' => 'page',
  'show_in_rest' => true,

  );
  register_post_type('contact', $args_contact);
}

function bs_add_custom_box()
{
  add_meta_box(
    'bs_contact_box_id', // Unique ID
    'Info contact', // Box title
    'bs_custom_box_contact_html', // Content callback, must be of type callable
    'contact' // Post type
  );
}
function bs_custom_box_contact_html($post)
{
  //optioneel kan deze callback functie de $post variabele gebruiken als parameter 

  //als extra paramter kan je het $post object gebruiken
  $value_title = get_post_meta($post->ID, '_title_contact', true);
  $value_paragraaf = get_post_meta($post->ID, '_paragraaf_contact', true);
  $value_title_gegevens = get_post_meta($post->ID, '_title_gegevens', true);
  $value_adres = get_post_meta($post->ID, '_adres_bikestore', true);
  $value_huisnr = get_post_meta($post->ID, '_huisnr_bikestore', true);
  $value_postcode = get_post_meta($post->ID, '_postcode_bikestore', true);
  $value_stad = get_post_meta($post->ID, '_stad_bikestore', true);
  $value_land = get_post_meta($post->ID, '_land_bikestore', true);
  $value_telefoon = get_post_meta($post->ID, '_telefoon_bikestore', true);
  $value_email = get_post_meta($post->ID, '_email_bikestore', true);
  $value_text_button = get_post_meta($post->ID, '_text_button', true);
  $value_title_boven_button = get_post_meta($post->ID, '_title_boven_button', true);

  

  echo "<h1>Gegevens Bedrijf</h1>";
  echo "<br/>";
  echo "Titel boven formulier: ";
  echo "<br/>";
  echo "<input type='text' id='title_contact' name='title_contact' value='" . $value_title . "'>";
  echo "<br/>";
  echo "<br/>";
  echo "Tekstblok boven formulier: ";
  echo "<br/>";
  echo "<textarea id='paragraaf_contact' name='paragraaf_contact' rows='6' cols='50' maxlength='500'>" . $value_paragraaf . "</textarea>";
  echo "<br/>";
  echo "<br/>";
  echo "Titel Bedrijf: ";
  echo "<br/>";
  echo "<input type='text' id='title_gegevens' name='title_gegevens' value='" . $value_title_gegevens . "'>";
  echo "<br/>";
  echo "<br/>";
  echo "Straatnaam: ";
  echo "<br/>";
  echo "<input type='text' id='adres_bikestore' name='adres_bikestore' value='" . $value_adres . "'>";
  echo "<br/>";
  echo "<br/>";
  echo "Huisnummer: ";
  echo "<br/>";
  echo "<input type='number' id='huisnr_bikestore' name='huisnr_bikestore' value='" . $value_huisnr . "'>";
  echo "<br/>";
  echo "<br/>";
  echo "Postcode: ";
  echo "<br/>";
  echo "<input type='number' id='postcode_bikestore' name='postcode_bikestore' value='" . $value_postcode . "'>";
  echo "<br/>";
  echo "<br/>";
  echo "Stad: ";
  echo "<br/>";
  echo "<input type='text' id='stad_bikestore' name='stad_bikestore' value='" . $value_stad . "'>";
  echo "<br/>";
  echo "<br/>";
  echo "Land: ";
  echo "<br/>";
  echo "<select name='land_bikestore' id='land_bikestore'>";
  echo "<option value='1' " . ($value_land == 1 ? "selected" : "") . ">België</option>";
  echo "<option value='2' " . ($value_land == 2 ? "selected" : "") . ">Nederland</option>";
  echo "<option value='3' " . ($value_land == 3 ? "selected" : "") . ">Duitsland</option>";
  echo "</select>";
  echo "<br/>";
  echo "<br/>";
  echo "Telefoonnummer: ";
  echo "<br/>";
  echo "<input type='number' pattern='((^[+\s0-9]{2,6}[\s\./0-
  9]*$))' id='telefoon_bikestore' name='telefoon_bikestore' value='" . $value_telefoon . "'>";
  echo "<br/>";
  echo "<br/>";
  echo "Email: ";
  echo "<br/>";
  echo "<input type='email' id='email_bikestore' name='email_bikestore' value='" . $value_email . "'>";
  echo "<br/>";
  echo "<br/>";
  echo "Titel boven button : ";
  echo "<br/>";
  echo "<input type='text' id='title_boven_button' name='title_boven_button' value='" . $value_title_boven_button . "'>";
  echo "<br/>";
  echo "<br/>";
  echo "Tekst button blok : ";
  echo "<br/>";
  echo "<input type='text' id='text_button' name='text_button' value='" . $value_text_button . "'>";
}
function bs_save_postdata($post_id)
{
  //bepaal het (custom) type van de post
  $naam_post_type = get_post_type($post_id);
  if ($naam_post_type) {
    //het gaat om een Custom post type want er bestaat een post_type (het is niet leeg)
    if ($naam_post_type == "contact") {
      //het custom post type is van het type contact


       //opslaan van een INPUT:textbox
       if (array_key_exists('title_contact', $_POST)) {
        update_post_meta(
          $post_id,
          '_title_contact',
          $_POST['title_contact']
        );
      }

      if (array_key_exists('paragraaf_contact', $_POST)) {
        update_post_meta(
          $post_id,
          '_paragraaf_contact',
          $_POST['paragraaf_contact']
        );
      }

      if (array_key_exists('title_gegevens', $_POST)) {
        update_post_meta(
          $post_id,
          '_title_gegevens',
          $_POST['title_gegevens']
        );
      }

      //opslaan van een INPUT:textbox
      if (array_key_exists('adres_bikestore', $_POST)) {
        update_post_meta(
          $post_id,
          '_adres_bikestore',
          $_POST['adres_bikestore']
        );
      }

      if (array_key_exists('huisnr_bikestore', $_POST)) {
        update_post_meta(
          $post_id,
          '_huisnr_bikestore',
          $_POST['huisnr_bikestore']
        );
      }

      if (array_key_exists('postcode_bikestore', $_POST)) {
        update_post_meta(
          $post_id,
          '_postcode_bikestore',
          $_POST['postcode_bikestore']
        );
      }

      if (array_key_exists('stad_bikestore', $_POST)) {
        update_post_meta(
          $post_id,
          '_stad_bikestore',
          $_POST['stad_bikestore']
        );
      }


      if (array_key_exists('telefoon_bikestore', $_POST)) {
        update_post_meta(
          $post_id,
          '_telefoon_bikestore',
          $_POST['telefoon_bikestore']
        );
      }

      if (array_key_exists('email_bikestore', $_POST)) {
        update_post_meta(
          $post_id,
          '_email_bikestore',
          $_POST['email_bikestore']
        );
      }

      //opslaan van een SELECT periode
      if (array_key_exists('land_bikestore', $_POST)) {
        update_post_meta(
          $post_id,
          '_land_bikestore',
          $_POST['land_bikestore']
        );
      }

      //opslaan van een INPUT:textbox
      if (array_key_exists('text_button', $_POST)) {
        update_post_meta(
          $post_id,
          '_text_button',
          $_POST['text_button']
        );
      }

      //opslaan van een INPUT:textbox
      if (array_key_exists('title_boven_button', $_POST)) {
        update_post_meta(
          $post_id,
          '_title_boven_button',
          $_POST['title_boven_button']
        );
      }
    }
  }
}

// einde contact--------------------

// custom post footer--------------------------

function bs_register_footer()
{

  $footerar = array(
    'name'                  => 'Footer',
    'singular_name'         => 'Footer',
    'menu_name'             => 'Footer',
    'name_admin_bar'        => 'Footer',
    'archives'              => 'Footer archief',
    'attributes'            => 'Footer Attributes',
    'parent_item_colon'     => 'Parent Item:',
    'all_items'             => 'All Items',
    'add_new_item'          => 'Voeg nieuw footer toe',
    'add_new'               => 'Nieuw footer',
    'new_item'              => 'Nieuw footer',
    'edit_item'             => 'Wijzig footer',
    'update_item'           => 'Update footer',
    'view_item'             => 'Toon footer',
    'view_items'            => 'Toon footer',
    'search_items'          => 'Doorzoek footer',
    'not_found'             => 'Not found',
    'not_found_in_trash'    => 'Not found in Trash',
    'featured_image'        => 'Featured Image',
    'set_featured_image'    => 'Set featured image',
    'remove_featured_image' => 'Remove featured image',
    'use_featured_image'    => 'Use as featured image',
    'insert_into_item'      => 'Insert into item',
    'uploaded_to_this_item' => 'Uploaded to this item',
    'items_list'            => 'Footer lijst',
    'items_list_navigation' => 'Footer lijst navigation',
    'filter_items_list'     => 'Filter footer lijst',
  );
  $footer = array(
    'label'                 => 'Footer',
    'description'           => 'Footer (overzicht footer)',
    'labels'                => $footerar,
    'supports'              => array('title', 'editor', 'thumbnail', 'revisions', 'custom-fields'),
    'hierarchical'          => false,
    'public'                => true,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'menu_position'         => 5,
    'menu_icon'             => 'dashicons-table-row-after',
    'show_in_admin_bar'     => true,
    'show_in_nav_menus'     => true,
    'can_export'            => true,
    'has_archive'           => true,
    'exclude_from_search'   => false,
    'publicly_queryable'    => true,
    'capability_type'       => 'page',
    'show_in_rest'          => true,
  );
  register_post_type('footer', $footer);
}


function bs_footer_add_custom_box()
{
  add_meta_box(
    'ih_footer_box_id',   // Unique ID
    'Info footer',        // Box title
    'bs_custom_box_footer_html',   // Content callback, must be of type callable
    'footer'              // Post type
  );
}

function bs_custom_box_footer_html($post)
{
  //optioneel kan deze callback functie de $post variabele gebruiken als parameter  

  //als extra paramter kan je het $post object gebruiken
  $value_titel1 = get_post_meta($post->ID, '_footer_titel1', true);
  $value_titel2 = get_post_meta($post->ID, '_footer_titel2', true);
  $value_titel3 = get_post_meta($post->ID, '_footer_titel3', true);
  $value_titel4 = get_post_meta($post->ID, '_footer_titel4', true);


  echo "<h1>informatie over de footer</h1>";
  echo "Titel 1: ";
  echo "<input type='text' id='footer_titel1' name='footer_titel1' value='" . $value_titel1 . "'>";
  echo "<br/>";
  echo "Titel 2: ";
  echo "<input type='text' id='footer_titel2' name='footer_titel2' value='" . $value_titel2 . "'>";
  echo "<br/>";
  echo "Titel 3: ";
  echo "<input type='text' id='footer_titel3' name='footer_titel3' value='" . $value_titel3 . "'>";
  echo "<br/>";
  echo "Titel 4: ";
  echo "<input type='text' id='footer_titel4' name='footer_titel4' value='" . $value_titel4 . "'>";
  echo "<br/>";
}

function bs_footer_save_postdata($post_id)
{
  //bepaal het (custom) type van de post
  //is het een post,page,vastgoed,foto,... die je bewaart?
  $naam_post_type = get_post_type($post_id);
  if ($naam_post_type) {
    //het gaat om een Custom post type want er bestaat een post_type (het is niet leeg)
    if ($naam_post_type == "footer") {
      //het custom post type is van het type vastgoed

      //opslaan van een INPUT:titel1
      if (array_key_exists('footer_titel1', $_POST)) {
        update_post_meta(
          $post_id,
          '_footer_titel1',
          $_POST['footer_titel1']
        );
      }
      //opslaan van een INPUT:titel2
      if (array_key_exists('footer_titel2', $_POST)) {
        update_post_meta(
          $post_id,
          '_footer_titel2',
          $_POST['footer_titel2']
        );
      }
      //opslaan van een INPUT:titel3
      if (array_key_exists('footer_titel3', $_POST)) {
        update_post_meta(
          $post_id,
          '_footer_titel3',
          $_POST['footer_titel3']
        );
      }
      //opslaan van een INPUT:titel4
      if (array_key_exists('footer_titel4', $_POST)) {
        update_post_meta(
          $post_id,
          '_footer_titel4',
          $_POST['footer_titel4']
        );
      }
      //opslaan van een text
    }
  }
}

// eind footer




//custom post type home------------------------------------------------------------------------------

function bs_register_home() {
 
  $labels_home = array(
  'name' => 'Home',
  'singular_name' => 'Home',
  'menu_name' => 'Home',
  'name_admin_bar' => 'Home',
  'archives' => 'Home archief',
  'attributes' => 'Home Attributes',
  'parent_item_colon' => 'Parent Item:',
  'all_items' => 'All Items',
  'add_new_item' => 'Voeg nieuw home toe',
  'add_new' => 'Nieuw home',
  'new_item' => 'Nieuw home',
  'edit_item' => 'Wijzig home',
  'update_item' => 'Update home',
  'view_item' => 'Toon home',
  'view_items' => 'Toon home',
  'search_items' => 'Doorzoek home',
  'not_found' => 'Not found',
  'not_found_in_trash' => 'Not found in Trash',
  'featured_image' => 'Foto blok 1',
  'set_featured_image' => 'Set featured image',
  'remove_featured_image' => 'Remove featured image',
  'use_featured_image' => 'Use as featured image',
  'insert_into_item' => 'Insert into item',
  'uploaded_to_this_item' => 'Uploaded to this item',
  'items_list' => 'Home lijst',
  'items_list_navigation' => 'Home lijst navigation',
  'filter_items_list' => 'Filter home lijst',
  );
  $args_home = array(
  'label' => 'Home',
  'description' => 'Home (titel, paragraaf)',
  'labels' => $labels_home,
  'supports' => array( 'title', 'editor', 'thumbnail', 'revisions', 'custom-fields' ),
  'hierarchical' => false,
  'public' => true,
  'show_ui' => true,
  'show_in_menu' => true,
  'menu_position' => 5,
  'menu_icon' => 'dashicons-admin-home',
  'show_in_admin_bar' => true,
  'show_in_nav_menus' => true,
  'can_export' => true,
  'has_archive' => true,
  'exclude_from_search' => false,
  'publicly_queryable' => true,
  'capability_type' => 'page',
  'show_in_rest' => true,
  );

  register_post_type( 'home', $args_home );

}

add_filter( 'kdmfi_featured_images', function( $featured_images ) {
  // Add featured-image-2 to pages and posts
  $args_home_1 = array(
    'id' => 'featured-image-2',
    'desc' => 'Your description here.',
    'label_name' => 'Foto blok 2',
    'label_set' => 'Set featured image 2',
    'label_remove' => 'Remove featured image 2',
    'label_use' => 'Set featured image 2',
    'post_type' => array( 'home', 'post' ),
  );

  // Add the featured images to the array, so that you are not overwriting images that maybe are created in other filter calls
  $featured_images[] = $args_home_1;

  // Important! Return all featured images
  return $featured_images;
});

function bs_add_custom_box_home(){ 
  add_meta_box(
  'bs_home_box_id', // Unique ID
  'Info home', // Box title
  'bs_custom_box_home_html', // Content callback, must be of type callable
  'home' // Post type
  ); 
}

function bs_custom_box_home_html($post){

  //banner
  $value_home_title_banner = get_post_meta($post->ID, '_home_title_banner', true);
  $value_home_subtitle_banner = get_post_meta($post->ID, '_home_subtitle_banner', true);
  $value_home_subtitle2_banner = get_post_meta($post->ID, '_home_subtitle2_banner', true);
  $value_home_knop_banner = get_post_meta($post->ID, '_home_knop_banner', true);

  //Balk services
  $value_home_service1 = get_post_meta($post->ID, '_home_service1', true);
  $value_home_service2 = get_post_meta($post->ID, '_home_service2', true);
  $value_home_service3 = get_post_meta($post->ID, '_home_service3', true);
  $value_home_service4 = get_post_meta($post->ID, '_home_service4', true);

  //blok 1
  $value_home_title_blok1 = get_post_meta($post->ID, '_home_title_blok1', true);
  $value_home_text_blok1 = get_post_meta($post->ID, '_home_text_blok1', true);
  $value_home_text_knop_blok1 = get_post_meta($post->ID, '_home_text_knop_blok1', true);
  $value_home_img_blok1 = get_post_meta($post->ID, '_home_img_blok1', true);

  //blok 2
  $value_home_title_blok2 = get_post_meta($post->ID, '_home_title_blok2', true);
  $value_home_text_blok2 = get_post_meta($post->ID, '_home_text_blok2', true);
  $value_home_text_knop_blok2 = get_post_meta($post->ID, '_home_text_knop_blok2', true);
  $value_home_img_blok2 = get_post_meta($post->ID, '_home_img_blok2', true);

  //blok 3
  $value_home_title_blok3 = get_post_meta($post->ID, '_home_title_blok3', true);
  $value_home_text_blok3 = get_post_meta($post->ID, '_home_text_blok3', true);
  $value_home_text_knop_blok3 = get_post_meta($post->ID, '_home_text_knop_blok3', true);
  $value_home_img_blok3 = get_post_meta($post->ID, '_home_img_blok3', true);


   //blok 4
   $value_home_title_blok4 = get_post_meta($post->ID, '_home_title_blok4', true);
   $value_home_text_blok4 = get_post_meta($post->ID, '_home_text_blok4', true);
   $value_home_text_knop_blok4= get_post_meta($post->ID, '_home_text_knop_blok4', true);
  
  
  echo "<h1>Homepagina</h1>";

  //Banner
  echo "<h3>Banner</h3>";
  echo "Titel banner:";
  echo "<br/>";
  echo "<input type='text' id='home_title_banner' name='home_title_banner' value='". $value_home_title_banner ."'>";
  echo "<br/>";
  echo "<br/>";
  echo "Subtitel banner:";
  echo "<br/>";
  echo "<input type='text' id='home_subtitle_banner' name='home_subtitle_banner' value='". $value_home_subtitle_banner ."'>";
  echo "<br/>";
  echo "<br/>";
  echo "Subtitel 2 banner:";
  echo "<br/>";
  echo "<input type='text' id='home_subtitle2_banner' name='home_subtitle2_banner' value='". $value_home_subtitle2_banner ."'>";
  echo "<br/>";
  echo "<br/>";
  echo "Tekst knop banner:";
  echo "<br/>";
  echo "<input type='text' id='home_knop_banner' name='home_knop_banner' value='". $value_home_knop_banner ."'>";
  echo "<br/>";
  echo "<br/>";

  //Balk onder banner
  echo "<h3>Balk services</h3>";
  echo "Service 1:";
  echo "<br/>";
  echo "<input type='text' id='home_service1' name='home_service1' value='". $value_home_service1 ."'>";
  echo "<br/>";
  echo "<br/>";
  echo "Service 2:";
  echo "<br/>";
  echo "<input type='text' id='home_service2' name='home_service2' value='". $value_home_service2 ."'>";
  echo "<br/>";
  echo "<br/>";
  echo "Service 3:";
  echo "<br/>";
  echo "<input type='text' id='home_service3' name='home_service3' value='". $value_home_service3 ."'>";
  echo "<br/>";
  echo "<br/>";
  echo "Service 4:";
  echo "<br/>";
  echo "<input type='text' id='home_service4' name='home_service4' value='". $value_home_service4 ."'>";
  echo "<br/>";
  echo "<br/>";

  //Blok 1
  echo "<h3>Blok 1</h3>";
  echo "Titel blok 1: ";
  echo "<br/>";
  echo "<input type='text' id='home_title_blok1' name='home_title_blok1' value='". $value_home_title_blok1 ."'>";
  echo "<br/>";
  echo "<br/>";
  echo "Tekst blok 1: ";
  echo "<br/>";
  echo "<textarea id='home_text_blok1' name='home_text_blok1' rows='6' cols='50' maxlength='800'>" . $value_home_text_blok1 . "</textarea>";
  echo "<br/>";
  echo "<br/>";
  echo "Tekst knop blok 1:";
  echo "<br/>";
  echo "<input type='text' id='home_text_knop_blok1' name='home_text_knop_blok1' value='". $value_home_text_knop_blok1 ."'>";

  //Blok 2
  echo "<h3>Blok 2</h3>";
  echo "Titel blok 2:";
  echo "<br/>";
  echo "<input type='text' id='home_title_blok2' name='home_title_blok2' value='". $value_home_title_blok2 ."'>";
  echo "<br/>";
  echo "<br/>";
  echo "Tekst blok 2:";
  echo "<br/>";
  echo "<textarea id='home_text_blok2' name='home_text_blok2' rows='6' cols='50' maxlength='500'>" . $value_home_text_blok2 . "</textarea>";
  echo "<br/>";
  echo "<br/>";
  echo "Tekst knop blok 2:";
  echo "<br/>";
  echo "<input type='text' id='home_text_knop_blok2' name='home_text_knop_blok2' value='". $value_home_text_knop_blok2 ."'>";
  
  //Blok 3
  echo "<h3>Blok 3</h3>";
  echo "Titel blok 3: ";
  echo "<br/>";
  echo "<input type='text' id='home_title_blok3' name='home_title_blok3' value='". $value_home_title_blok3 ."'>";
  echo "<br/>";
  echo "<br/>";
  echo "Tekst blok 3: ";
  echo "<br/>";
  echo "<textarea id='home_text_blok3' name='home_text_blok3' rows='6' cols='50' maxlength='900'>" . $value_home_text_blok3 . "</textarea>";
  echo "<br/>";
  echo "<br/>";
  echo "Tekst knop blok 3: ";
  echo "<br/>";
  echo "<input type='text' id='home_text_knop_blok3' name='home_text_knop_blok3' value='". $value_home_text_knop_blok3 ."'>";
 

  //Blok 4
  echo "<h3>Blok 4</h3>";
  echo "Titel blok 4:";
  echo "<br/>";
  echo "<input type='text' id='home_title_blok4' name='home_title_blok4' value='". $value_home_title_blok4 ."'>";
  echo "<br/>";
  echo "<br/>";
  echo "Tekst blok 4:";
  echo "<br/>";
  echo "<textarea id='home_text_blok4' name='home_text_blok4' rows='4' cols='50' maxlength='500'>" . $value_home_text_blok4 . "</textarea>";
  echo "<br/>";
  echo "<br/>";
  echo "Tekst knop blok 4:";
  echo "<br/>";
  echo "<input type='text' id='home_text_knop_blok4' name='home_text_knop_blok4' value='". $value_home_text_knop_blok4 ."'>";
}


function bs_home_save_postdata($post_id){
  //bepaal het (custom) type van de post
  $naam_post_type = get_post_type($post_id);
  if ($naam_post_type) {
    //het gaat om een Custom post type want er bestaat een post_type (het is niet leeg)
    if ($naam_post_type == "home") {
      //het custom post type is van het type home

      // opslaan data banner
      //opslaan van een INPUT: title home
      if (array_key_exists('home_title_banner', $_POST)) {
        update_post_meta(
          $post_id,
          '_home_title_banner',
          $_POST['home_title_banner']
        );
      }
      //opslaan van een INPUT:subtitle 1
      if (array_key_exists('home_subtitle_banner', $_POST)) {
        update_post_meta(
          $post_id,
          '_home_subtitle_banner',
          $_POST['home_subtitle_banner']
        );
      }
      //opslaan van een INPUT:subtitle 2
      if (array_key_exists('home_subtitle2_banner', $_POST)) {
        update_post_meta(
          $post_id,
          '_home_subtitle2_banner',
          $_POST['home_subtitle2_banner']
        );
      }
      //opslaan van een INPUT: text button
      if (array_key_exists('home_knop_banner', $_POST)) {
        update_post_meta(
          $post_id,
          '_home_knop_banner',
          $_POST['home_knop_banner']
        );
      }

      // opslaan data balk onder banner
      //opslaan van een INPUT: service 1
      if (array_key_exists('home_service1', $_POST)) {
        update_post_meta(
          $post_id,
          '_home_service1',
          $_POST['home_service1']
        );
      }
      //opslaan van een INPUT:service 2
      if (array_key_exists('home_service2', $_POST)) {
        update_post_meta(
          $post_id,
          '_home_service2',
          $_POST['home_service2']
        );
      }
      //opslaan van een INPUT:service 3
      if (array_key_exists('home_service3', $_POST)) {
        update_post_meta(
          $post_id,
          '_home_service3',
          $_POST['home_service3']
        );
      }
      //opslaan van een INPUT: service 4
      if (array_key_exists('home_service4', $_POST)) {
        update_post_meta(
          $post_id,
          '_home_service4',
          $_POST['home_service4']
        );
      }
      
      // opslaan data blok 1 
      //opslaan van een INPUT: title blok 1
      if (array_key_exists('home_title_blok1', $_POST)) {
        update_post_meta(
          $post_id,
          '_home_title_blok1',
          $_POST['home_title_blok1']
        );
      }
      //opslaan van een INPUT: text blok 1
      if (array_key_exists('home_text_blok1', $_POST)) {
        update_post_meta(
          $post_id,
          '_home_text_blok1',
          $_POST['home_text_blok1']
        );
      }
      //opslaan van een INPUT: text knop blok1
      if (array_key_exists('home_text_knop_blok1', $_POST)) {
        update_post_meta(
          $post_id,
          '_home_text_knop_blok1',
          $_POST['home_text_knop_blok1']
        );
      }
      //opslaan van een INPUT: image blok 1
      if (array_key_exists('home_img_blok1', $_POST)) {
        update_post_meta(
          $post_id,
          '_home_img_blok1',
          $_POST['home_img_blok1']
        );
      }

      // opslaan data blok 2 
      //opslaan van een INPUT: title blok 2
      if (array_key_exists('home_title_blok2', $_POST)) {
        update_post_meta(
          $post_id,
          '_home_title_blok2',
          $_POST['home_title_blok2']
        );
      }
      //opslaan van een INPUT: text blok 2
      if (array_key_exists('home_text_blok2', $_POST)) {
        update_post_meta(
          $post_id,
          '_home_text_blok2',
          $_POST['home_text_blok2']
        );
      }
      //opslaan van een INPUT: text knop blok 2
      if (array_key_exists('home_text_knop_blok2', $_POST)) {
        update_post_meta(
          $post_id,
          '_home_text_knop_blok2',
          $_POST['home_text_knop_blok2']
        );
      }

      // opslaan data blok 3
      //opslaan van een INPUT: title blok 3
      if (array_key_exists('home_title_blok3', $_POST)) {
        update_post_meta(
          $post_id,
          '_home_title_blok3',
          $_POST['home_title_blok3']
        );
      }
      //opslaan van een INPUT: text blok 3
      if (array_key_exists('home_text_blok3', $_POST)) {
        update_post_meta(
          $post_id,
          '_home_text_blok3',
          $_POST['home_text_blok3']
        );
      }

      //opslaan van een INPUT: text knop blok 3
      if (array_key_exists('home_text_knop_blok3', $_POST)) {
        update_post_meta(
          $post_id,
          '_home_text_knop_blok3',
          $_POST['home_text_knop_blok3']
        );
      }

      // opslaan data blok 4
      //opslaan van een INPUT: title blok 4
      if (array_key_exists('home_title_blok4', $_POST)) {
        update_post_meta(
          $post_id,
          '_home_title_blok4',
          $_POST['home_title_blok4']
        );
      }
      //opslaan van een INPUT: text blok 4
      if (array_key_exists('home_text_blok4', $_POST)) {
        update_post_meta(
          $post_id,
          '_home_text_blok4',
          $_POST['home_text_blok4']
        );
      }
      //opslaan van een INPUT: backgroudn image blok 4
      if (array_key_exists('home_text_knop_blok4', $_POST)) {
        update_post_meta(
          $post_id,
          '_home_text_knop_blok4',
          $_POST['home_text_knop_blok4']
        );
      }
    }
  }
}


//custom post type 2 brochure--------------------------------------------------------------------------

function bs_register_brochure()
{
 
  $labels_brochure = array(
  'name' => 'Brochure',
  'singular_name' => 'Brochure',
  'menu_name' => 'Brochure',
  'name_admin_bar' => 'Brochure',
  'archives' => 'Brochure archief',
  'attributes' => 'Brochure Attributes',
  'parent_item_colon' => 'Parent Item:',
  'all_items' => 'All Items',
  'add_new_item' => 'Voeg nieuw brochure toe',
  'add_new' => 'Nieuw brochure',
  'new_item' => 'Nieuw brochure',
  'edit_item' => 'Wijzig brochure',
  'update_item' => 'Update brochure',
  'view_item' => 'Toon brochure',
  'view_items' => 'Toon brochure',
  'search_items' => 'Doorzoek brochure',
  'not_found' => 'Not found',
  'not_found_in_trash' => 'Not found in Trash',
  'featured_image' => 'Featured Image',
  'set_featured_image' => 'Set featured image',
  'remove_featured_image' => 'Remove featured image',
  'use_featured_image' => 'Use as featured image',
  'insert_into_item' => 'Insert into item',
  'uploaded_to_this_item' => 'Uploaded to this item',
  'items_list' => 'Brochure lijst',
  'items_list_navigation' => 'Brochure lijst navigation',
  'filter_items_list' => 'Filter brochure lijst',
  );
  $args_brochure = array(
  'label' => 'Brochure',
  'description' => 'Brochure (titel, paragraaf)',
  'labels' => $labels_brochure,
  'supports' => array( 'title', 'editor', 'thumbnail', 'revisions', 'custom-fields' ),
  'hierarchical' => false,
  'public' => true,
  'show_ui' => true,
  'show_in_menu' => true,
  'menu_position' => 5,
  'menu_icon' => 'dashicons-analytics',
  'show_in_admin_bar' => true,
  'show_in_nav_menus' => true,
  'can_export' => true,
  'has_archive' => true,
  'exclude_from_search' => false,
  'publicly_queryable' => true,
  'capability_type' => 'page',
  'show_in_rest' => true,
  );
  register_post_type( 'brochure', $args_brochure );
}


function bs_add_custom_box_brochure(){ 
  add_meta_box(
  'bs_brochure_box_id', // Unique ID
  'Info brochure', // Box title
  'bs_custom_box_brochure_html', // Content callback, must be of type callable
  'brochure' // Post type
  ); 
}

function bs_custom_box_brochure_html($post){

  //$value_titel = get_post_meta($post->ID, '_titel_brochure', true);
  $value_uitleg = get_post_meta($post->ID, '_uitleg_brochure', true);
  $value_titelform1 = get_post_meta($post->ID, '_titelform1_brochure', true);
  $value_titelform2 = get_post_meta($post->ID, '_titelform2_brochure', true);
  $value_extrainfo1 = get_post_meta($post->ID, '_extrainfo1_brochure', true);
  $value_extrainfo2 = get_post_meta($post->ID, '_extrainfo2_brochure', true);
  $value_extrainfo3 = get_post_meta($post->ID, '_extrainfo3_brochure', true);
  
  echo "<h1>Extra info over brochure</h1>";
  echo "<br/>";
  echo "Titel 1 bovenaan formulier: ";
  echo "<br/>";
  echo "<input type='text' id='titelform1_brochure' name='titelform1_brochure' value='". $value_titelform1 ."'>";
  echo "<br/>";
  echo "<br/>";
  echo "Titel 2 bovenaan formulier: ";
  echo "<br/>";
  echo "<input type='text' id='titelform2_brochure' name='titelform2_brochure' value='". $value_titelform2 ."'>";
  echo "<br/>";
  echo "<br/>";
  echo "Extra info overder formulier 1: ";
  echo "<br/>";
  echo "<input type='text' id='extrainfo1_brochure' name='extrainfo1_brochure' value='". $value_extrainfo1 ."'>";
  echo "<br/>";
  echo "<br/>";
  echo "Extra info overder formulier 2: ";
  echo "<br/>";
  echo "<input type='text' id='extrainfo2_brochure' name='extrainfo2_brochure' value='". $value_extrainfo2 ."'>";
  echo "<br/>";
  echo "<br/>";
  echo "Extra info overder formulier 3: ";
  echo "<br/>";
  echo "<input type='text' id='extrainfo3_brochure' name='extrainfo3_brochure' value='". $value_extrainfo3 ."'>";
}

function bs_save_postdata_brochure($post_id){
  //bepaal het (custom) type van de post
  
  $naam_post_type = get_post_type($post_id);
  if ($naam_post_type){
  //het gaat om een Custom post type want er bestaat een post_type (het is niet leeg)
  if ($naam_post_type == "brochure"){
  
  
  //opslaan van een INPUT:textbox titel
  /*if (array_key_exists('titel_brochure', $_POST)) {
  update_post_meta(
  $post_id,
  '_titel_brochure',
  $_POST['titel_brochure']
  );
  }

 
  if (array_key_exists('uitleg_brochure', $_POST)) {
    update_post_meta(
    $post_id,
    '_uitleg_brochure',
    $_POST['uitleg_brochure']
    );
    }*/

  //opslaan van een INPUT:textbox
  if (array_key_exists('titelform1_brochure', $_POST)) {
    update_post_meta(
    $post_id,
    '_titelform1_brochure',
    $_POST['titelform1_brochure']
    );
    }

    //opslaan van een INPUT:textbox
  if (array_key_exists('titelform2_brochure', $_POST)) {
    update_post_meta(
    $post_id,
    '_titelform2_brochure',
    $_POST['titelform2_brochure']
    );
    }

     //opslaan van een INPUT:textbox
  if (array_key_exists('extrainfo1_brochure', $_POST)) {
    update_post_meta(
    $post_id,
    '_extrainfo1_brochure',
    $_POST['extrainfo1_brochure']
    );
    }

    if (array_key_exists('extrainfo2_brochure', $_POST)) {
      update_post_meta(
      $post_id,
      '_extrainfo2_brochure',
      $_POST['extrainfo2_brochure']
      );
      }

      if (array_key_exists('extrainfo3_brochure', $_POST)) {
        update_post_meta(
        $post_id,
        '_extrainfo3_brochure',
        $_POST['extrainfo3_brochure']
        );
        }

  }
  } 
}

//custum post type over bikestore----------------------------------------------------------------------

function bs_register_overbikestore() {
 
  $labels_overbikestore = array(
  'name' => 'Over bikestore',
  'singular_name' => 'Over bikestore',
  'menu_name' => 'Over bikestore',
  'name_admin_bar' => 'Over bikestore',
  'archives' => 'Over bikestore archief',
  'attributes' => 'Over bikestore Attributes',
  'parent_item_colon' => 'Parent Item:',
  'all_items' => 'All Items',
  'add_new_item' => 'Voeg nieuw over bikestore toe',
  'add_new' => 'Nieuw over bikestore',
  'new_item' => 'Nieuw over bikestore',
  'edit_item' => 'Wijzig over bikestore',
  'update_item' => 'Update over bikestore',
  'view_item' => 'Toon over bikestore',
  'view_items' => 'Toon over bikestore',
  'search_items' => 'Doorzoek over bikestore',
  'not_found' => 'Not found',
  'not_found_in_trash' => 'Not found in Trash',
  'featured_image' => 'Foto blok 1',
  'set_featured_image' => 'Set featured image',
  'remove_featured_image' => 'Remove featured image',
  'use_featured_image' => 'Use as featured image',
  'insert_into_item' => 'Insert into item',
  'uploaded_to_this_item' => 'Uploaded to this item',
  'items_list' => 'Over bikestore lijst',
  'items_list_navigation' => 'Over bikestore lijst navigation',
  'filter_items_list' => 'Filter over bikestore  lijst',
  );
  $args_overbikestore = array(
  'label' => 'Over bikestore ',
  'description' => 'Over bikestore (titel, paragraaf)',
  'labels' => $labels_overbikestore,
  'supports' => array( 'title', 'editor', 'thumbnail', 'revisions', 'custom-fields' ),
  'hierarchical' => false,
  'public' => true,
  'show_ui' => true,
  'show_in_menu' => true,
  'menu_position' => 5,
  'menu_icon' => 'dashicons-info-outline',
  'show_in_admin_bar' => true,
  'show_in_nav_menus' => true,
  'can_export' => true,
  'has_archive' => true,
  'exclude_from_search' => false,
  'publicly_queryable' => true,
  'capability_type' => 'page',
  'show_in_rest' => true,
  );

  register_post_type( 'overbikestore', $args_overbikestore );

}

add_filter( 'kdmfi_featured_images', function( $featured_images ) {
  // Add featured-image-2 to pages and posts
  $args_overbikestore_1 = array(
    'id' => 'featured-image-2',
    'desc' => 'Your description here.',
    'label_name' => 'Foto blok 2',
    'label_set' => 'Set featured image 2',
    'label_remove' => 'Remove featured image 2',
    'label_use' => 'Set featured image 2',
    'post_type' => array( 'overbikestore', 'post' ),
  );

  $args_overbikestore_2 = array(
    'id' => 'featured-image-3',
    'desc' => 'Your description here.',
    'label_name' => 'Foto blok 3',
    'label_set' => 'Set featured image 3',
    'label_remove' => 'Remove featured image 3',
    'label_use' => 'Set featured image 3',
    'post_type' => array( 'overbikestore', 'post' ),
  );

  $args_overbikestore_3 = array(
    'id' => 'featured-image-4',
    'desc' => 'Your description here.',
    'label_name' => 'Foto blok 4',
    'label_set' => 'Set featured image 4',
    'label_remove' => 'Remove featured image 4',
    'label_use' => 'Set featured image 4',
    'post_type' => array( 'overbikestore', 'post' ),
  );

  // Add the featured images to the array, so that you are not overwriting images that maybe are created in other filter calls
  $featured_images[] = $args_overbikestore_1;
  $featured_images[] = $args_overbikestore_2;
  $featured_images[] = $args_overbikestore_3;


  // Important! Return all featured images
  return $featured_images;
});

function bs_add_custom_box_overbikestore(){ 
  add_meta_box(
  'bs_overbikestore_box_id', // Unique ID
  'Info over bikestore', // Box title
  'bs_custom_box_overbikestore_html', // Content callback, must be of type callable
  'Over bikestore' // Post type
  ); 
}

function bs_custom_box_overbikestore_html($post){

  //blok 1
  $value_overbikestore_title_blok1 = get_post_meta($post->ID, '_overbikestore_title_blok1', true);
  $value_overbikestore_text_blok1 = get_post_meta($post->ID, '_overbikestore_text_blok1', true);
  $value_overbikestore_text_name_blok1 = get_post_meta($post->ID, '_overbikestore_text_name_blok1', true);
  $value_overbikestore_img_blok1 = get_post_meta($post->ID, '_overbikestore_img_blok1', true);

  //blok 2
  $value_overbikestore_title_blok2 = get_post_meta($post->ID, '_overbikestore_title_blok2', true);
  $value_overbikestore_img1_blok2 = get_post_meta($post->ID, '_overbikestore_img1_blok2', true);
  $value_overbikestore_subtitle1_blok2 = get_post_meta($post->ID, '_overbikestore_subtitle1_blok2', true);
  $value_overbikestore_text1_blok2 = get_post_meta($post->ID, '_overbikestore_text1_blok2', true);

  $value_overbikestore_img2_blok2 = get_post_meta($post->ID, '_overbikestore_img2_blok2', true);
  $value_overbikestore_subtitle2_blok2 = get_post_meta($post->ID, '_overbikestore_subtitle2_blok2', true);
  $value_overbikestore_text2_blok2 = get_post_meta($post->ID, '_overbikestore_text2_blok2', true);
  $value_overbikestore_onderschrift_onderaan_blok2 = get_post_meta($post->ID, '_overbikestore_onderschrift_onderaan_blok2', true);


  //blok 3
  $value_overbikestore_title_blok3 = get_post_meta($post->ID, '_overbikestore_title_blok3', true);
  $value_overbikestore_text_blok3 = get_post_meta($post->ID, '_overbikestore_text_blok3', true);

   //blok 4
   $value_overbikestore_title_blok4 = get_post_meta($post->ID, '_overbikestore_title_blok4', true);
   $value_overbikestore_text_blok4 = get_post_meta($post->ID, '_overbikestore_text_blok4', true);
   $value_overbikestore_img_blok4= get_post_meta($post->ID, '_overbikestore_img_blok4', true);

   //blok 5
   $value_overbikestore_title_blok5 = get_post_meta($post->ID, '_overbikestore_title_blok5', true);
   $value_overbikestore_text_knop_blok5 = get_post_meta($post->ID, '_overbikestore_text_knop_blok5', true);
  
  
  echo "<h1>Over bikestore</h1>";

  //Blok 1
    echo "<h3>blok 1</h3>";
    echo "Titel blok 1:";
    echo "<br/>";
    echo "<input type='text' id='overbikestore_title_blok1' name='overbikestore_title_blok1' value='".  $value_overbikestore_title_blok1 ."'>";
    echo "<br/>";
    echo "<br/>";
    echo "Tekst blok 1:";
    echo "<br/>";
    echo "<textarea id='overbikestore_text_blok1' name='overbikestore_text_blok1' rows='6' cols='50' maxlength='800'>" . $value_overbikestore_text_blok1 . "</textarea>";
    echo "<br/>";
    echo "<br/>";
    echo "Tekst auteur blok 1:";
    echo "<br/>";
    echo "<input type='text' id='overbikestore_text_name_blok1' name='overbikestore_text_name_blok1' value='". $value_overbikestore_text_name_blok1 ."'>";
    echo "<br/>";
    echo "<br/>";

  //Blok 2
    echo "<h3>blok 2</h3>";
    echo "Titel blok 2:";
    echo "<br/>";
    echo "<input type='text' id='overbikestore_title_blok2' name='overbikestore_title_blok2' value='".  $value_overbikestore_title_blok2 ."'>";
    echo "<br/>";
    echo "<br/>";
    echo "Subtitel 1 blok 2:";
    echo "<br/>";
    echo "<input type='text' id='overbikestore_subtitle1_blok2' name='overbikestore_subtitle1_blok2' value='".  $value_overbikestore_subtitle1_blok2 ."'>";
    echo "<br/>";
    echo "<br/>";
    echo "Tekst 1 blok 2:";
    echo "<br/>";
    echo "<textarea id='overbikestore_text1_blok2' name='overbikestore_text1_blok2' rows='6' cols='50' maxlength='350'>" . $value_overbikestore_text1_blok2 . "</textarea>";
    echo "<br/>";
    echo "<br/>";
    echo "Subtitel 2 blok 2:";
    echo "<br/>";
    echo "<input type='text' id='overbikestore_subtitle2_blok2' name='overbikestore_subtitle2_blok2' value='".   $value_overbikestore_subtitle2_blok2 ."'>";
    echo "<br/>";
    echo "<br/>";
    echo "Tekst 2 blok 2:";
    echo "<br/>";
    echo "<textarea id='overbikestore_text2_blok2' name='overbikestore_text2_blok2' rows='6' cols='50' maxlength='550'>" . $value_overbikestore_text2_blok2 . "</textarea>";
    echo "<br/>";
    echo "<br/>";
    echo "Onderschrift blok 2:";
    echo "<br/>";
    echo "<textarea id='overbikestore_onderschrift_onderaan_blok2' name='overbikestore_onderschrift_onderaan_blok2' rows='4' cols='50' maxlength='150'>" . $value_overbikestore_onderschrift_onderaan_blok2 . "</textarea>";
    echo "<br/>";
    echo "<br/>";

  //Blok 3
    echo "<h3>blok 3</h3>";
    echo "Titel blok 3:";
    echo "<br/>";
    echo "<input type='text' id='overbikestore_title_blok3' name='overbikestore_title_blok3' value='".   $value_overbikestore_title_blok3 ."'>";
    echo "<br/>";
    echo "<br/>";
    echo "Tekst blok 3:";
    echo "<br/>";
    echo "<textarea id='overbikestore_text_blok3' name='overbikestore_text_blok3' rows='6' cols='50' maxlength='1500'>" . $value_overbikestore_text_blok3 . "</textarea>";
    echo "<br/>";
    echo "<br/>";

  //Blok 4
    echo "<h3>blok 4</h3>";
    echo "Titel blok 4:";
    echo "<br/>";
    echo "<input type='text' id='overbikestore_title_blok4' name='overbikestore_title_blok4' value='".  $value_overbikestore_title_blok4 ."'>";
    echo "<br/>";
    echo "<br/>";
    echo "Tekst blok 4:";
    echo "<br/>";
    echo "<textarea id='overbikestore_text_blok4' name='overbikestore_text_blok4' rows='6' cols='50' maxlength='1500'>" . $value_overbikestore_text_blok4 . "</textarea>";
    echo "<br/>";
    echo "<br/>";
    
  //Blok 5
    echo "<h3>blok 5</h3>";
    echo "Titel blok 5:";
    echo "<br/>";
    echo "<input type='text' id='overbikestore_title_blok5' name='overbikestore_title_blok5' value='".  $value_overbikestore_title_blok5 ."'>";
    echo "<br/>";
    echo "<br/>";
    echo "Tekst knop blok 5:";
    echo "<br/>";
    echo "<input type='text' id='overbikestore_text_knop_blok5' name='overbikestore_text_knop_blok5' value='".  $value_overbikestore_text_knop_blok5 ."'>";
    echo "<br/>";
    echo "<br/>";
}

function bs_overbikestore_save_postdata($post_id){
  //bepaal het (custom) type van de post
  $naam_post_type = get_post_type($post_id);
  if ($naam_post_type) {
    //het gaat om een Custom post type want er bestaat een post_type (het is niet leeg)
    if ($naam_post_type == "overbikestore") {
      //het custom post type is van het type overbikestore

      // opslaan data over bikestore pagina
      //opslaan van een INPUT: titel blok 1
      if (array_key_exists('overbikestore_title_blok1', $_POST)) {
        update_post_meta(
          $post_id,
          '_overbikestore_title_blok1',
          $_POST['overbikestore_title_blok1']
        );
      }
      //opslaan van een INPUT:text blok 1
      if (array_key_exists('overbikestore_text_blok1', $_POST)) {
        update_post_meta(
          $post_id,
          '_overbikestore_text_blok1',
          $_POST['overbikestore_text_blok1']
        );
      }
      //opslaan van een INPUT: text name onder tekst blok 2
      if (array_key_exists('overbikestore_text_name_blok1', $_POST)) {
        update_post_meta(
          $post_id,
          '_overbikestore_text_name_blok1',
          $_POST['overbikestore_text_name_blok1']
        );
      }

      // opslaan data blok 2
      //opslaan van een INPUT: titel blok 2
      if (array_key_exists('overbikestore_title_blok2', $_POST)) {
        update_post_meta(
          $post_id,
          '_overbikestore_title_blok2',
          $_POST['overbikestore_title_blok2']
        );
      }
      //opslaan van een INPUT:subtitle 1 blok 2
      if (array_key_exists('overbikestore_subtitle1_blok2', $_POST)) {
        update_post_meta(
          $post_id,
          '_overbikestore_subtitle1_blok2',
          $_POST['overbikestore_subtitle1_blok2']
        );
      }
      //opslaan van een INPUT: text 1 blok 2
      if (array_key_exists('overbikestore_text1_blok2', $_POST)) {
        update_post_meta(
          $post_id,
          '_overbikestore_text1_blok2',
          $_POST['overbikestore_text1_blok2']
        );
      }

      //opslaan van een INPUT: title 2 blok 2
      if (array_key_exists('overbikestore_subtitle2_blok2', $_POST)) {
        update_post_meta(
          $post_id,
          '_overbikestore_subtitle2_blok2',
          $_POST['overbikestore_subtitle2_blok2']
        );
      }
      //opslaan van een INPUT: text 2 blok 2
      if (array_key_exists('overbikestore_text2_blok2', $_POST)) {
        update_post_meta(
          $post_id,
          '_overbikestore_text2_blok2',
          $_POST['overbikestore_text2_blok2']
        );
      }
      //opslaan van een INPUT: onderschrift blok 2
      if (array_key_exists('overbikestore_onderschrift_onderaan_blok2', $_POST)) {
        update_post_meta(
          $post_id,
          '_overbikestore_onderschrift_onderaan_blok2',
          $_POST['overbikestore_onderschrift_onderaan_blok2']
        );
      }
      

      // opslaan blok 3
      //opslaan van een INPUT: titel blok 3
      if (array_key_exists('overbikestore_title_blok3', $_POST)) {
        update_post_meta(
          $post_id,
          '_overbikestore_title_blok3',
          $_POST['overbikestore_title_blok3']
        );
      }
      //opslaan van een INPUT: tekst blok 3
      if (array_key_exists('overbikestore_text_blok3', $_POST)) {
        update_post_meta(
          $post_id,
          '_overbikestore_text_blok3',
          $_POST['overbikestore_text_blok3']
        );
      }

      // opslaan data blok 4
      //opslaan van een INPUT: title blok 4
      if (array_key_exists('overbikestore_title_blok4', $_POST)) {
        update_post_meta(
          $post_id,
          '_overbikestore_title_blok4',
          $_POST['overbikestore_title_blok4']
        );
      }
      //opslaan van een INPUT: text blok 4
      if (array_key_exists('overbikestore_text_blok4', $_POST)) {
        update_post_meta(
          $post_id,
          '_overbikestore_text_blok4',
          $_POST['overbikestore_text_blok4']
        );
      }

      // opslaan data blok 5
      //opslaan van een INPUT: title blok 3
      if (array_key_exists('overbikestore_title_blok5', $_POST)) {
        update_post_meta(
          $post_id,
          '_overbikestore_title_blok5',
          $_POST['overbikestore_title_blok5']
        );
      }
      //opslaan van een INPUT: text blok 3
      if (array_key_exists('overbikestore_text_blok3', $_POST)) {
        update_post_meta(
          $post_id,
          '_overbikestore_text_blok3',
          $_POST['overbikestore_text_blok3']
        );
      }


      // opslaan data blok 4
      //opslaan van een INPUT: title blok 4
      if (array_key_exists('overbikestore_title_blok4', $_POST)) {
        update_post_meta(
          $post_id,
          '_overbikestore_title_blok4',
          $_POST['overbikestore_title_blok4']
        );
      }
      //opslaan van een INPUT: text blok 4
      if (array_key_exists('overbikestore_title_blok5', $_POST)) {
        update_post_meta(
          $post_id,
          '_overbikestore_title_blok5',
          $_POST['overbikestore_title_blok5']
        );
      }
      //opslaan van een INPUT: backgroudn image blok 4
      if (array_key_exists('overbikestore_text_knop_blok5', $_POST)) {
        update_post_meta(
          $post_id,
          '_overbikestore_text_knop_blok5',
          $_POST['overbikestore_text_knop_blok5']
        );
      }
    }
  }
}



//custom post type  blog--------------------------------------------------------------------------
function bs_register_blog() {
 
  $labels_blog = array(
  'name' => 'Blog',
  'singular_name' => 'Blog',
  'menu_name' => 'Blog',
  'name_admin_bar' => 'Blog',
  'archives' => 'Blog archief',
  'attributes' => 'Blog Attributes',
  'parent_item_colon' => 'Parent Item:',
  'all_items' => 'All Items',
  'add_new_item' => 'Voeg nieuw blog toe',
  'add_new' => 'Nieuw blog',
  'new_item' => 'Nieuw blog',
  'edit_item' => 'Wijzig blog',
  'update_item' => 'Update blog',
  'view_item' => 'Toon blog',
  'view_items' => 'Toon blog',
  'search_items' => 'Doorzoek blog',
  'not_found' => 'Not found',
  'not_found_in_trash' => 'Not found in Trash',
  'featured_image' => 'Featured Image',
  'set_featured_image' => 'Set featured image',
  'remove_featured_image' => 'Remove featured image',
  'use_featured_image' => 'Use as featured image',
  'insert_into_item' => 'Insert into item',
  'uploaded_to_this_item' => 'Uploaded to this item',
  'items_list' => 'Blog lijst',
  'items_list_navigation' => 'Blog lijst navigation',
  'filter_items_list' => 'Filter blog lijst',
  );
  $args_blog = array(
  'label' => 'Blog',
  'description' => 'Blog (titel, paragraaf)',
  'labels' => $labels_blog,
  'supports' => array( 'title', 'editor', 'thumbnail', 'revisions', 'custom-fields' ),
  'hierarchical' => false,
  'public' => true,
  'show_ui' => true,
  'show_in_menu' => true,
  'menu_position' => 5,
  'menu_icon' => 'dashicons-format-status',
  'show_in_admin_bar' => true,
  'show_in_nav_menus' => true,
  'can_export' => true,
  'has_archive' => true,
  'exclude_from_search' => false,
  'publicly_queryable' => true,
  'capability_type' => 'page',
  'show_in_rest' => true,
  );
  register_post_type( 'blog', $args_blog );
  
}
  
 function bs_add_custom_box_blog(){ 
  add_meta_box(
  'bs_blog_box_id', // Unique ID
  'Info blog', // Box title
  'bs_custom_box_blog_html', // Content callback, must be of type callable
  'blog' // Post type
  ); 
 }

 function bs_custom_box_blog_html($post){
  //optioneel kan deze callback functie de $post variabele gebruiken als parameter 
  
  //als extra paramter kan je het $post object gebruiken

  $value_titel1 = get_post_meta($post->ID, '_titel1_blog', true);
  $value_titel2 = get_post_meta($post->ID, '_titel2_blog', true);
  $value_auteur = get_post_meta($post->ID, '_auteur_blog', true);
  
  echo "<h1>Info overzicht blog</h1>";
  echo "<br/>";
  echo "Titel op afbeelding: ";
  echo "<br/>";
  echo "<br/>";
  echo "<input type='text' id='titel1_blog' name='titel1_blog' value='". $value_titel1 ."'>";
  echo "<br/>";
  echo "<br/>";
  echo "Titel voor overzicht: ";
  echo "<br/>";
  echo "<br/>";
  echo "<input type='text' id='titel2_blog' name='titel2_blog' value='". $value_titel2 ."'>";
  echo "<br/>";
  echo "<br/>";
  echo "<br/>";
  echo "<br/>";
  echo "<h1>Auteur tevoegen</h1>";
  echo "<br/>";
  echo "Auteur blogbericht: ";
  echo "<br/>";
  echo "<br/>";
  echo "<input type='text' id='auteur_blog' name='auteur_blog' value='". $value_auteur ."'>";
 }
 function bs_save_postdata_blog($post_id){
  //bepaal het (custom) type van de post
  
  $naam_post_type = get_post_type($post_id);
  if ($naam_post_type){
  //het gaat om een Custom post type want er bestaat een post_type (het is niet leeg)
  if ($naam_post_type == "blog"){

    if (array_key_exists('titel1_blog', $_POST)) {
      update_post_meta(
      $post_id,
      '_titel1_blog',
      $_POST['titel1_blog']
      );
      }

      if (array_key_exists('titel2_blog', $_POST)) {
        update_post_meta(
        $post_id,
        '_titel2_blog',
        $_POST['titel2_blog']
        );
        }
  
    if (array_key_exists('auteur_blog', $_POST)) {
      update_post_meta(
      $post_id,
      '_auteur_blog',
      $_POST['auteur_blog']
      );
      }

  }
  } 
 }


  //custom post type  proefrit--------------------------------------------------------------------------
function bs_register_proefrit() {
 
  $labels_proefrit = array(
  'name' => 'Proefrit',
  'singular_name' => 'Proefrit',
  'menu_name' => 'Proefrit',
  'name_admin_bar' => 'Proefrit',
  'archives' => 'Proefrit archief',
  'attributes' => 'Proefrit Attributes',
  'parent_item_colon' => 'Parent Item:',
  'all_items' => 'All Items',
  'add_new_item' => 'Voeg nieuw proefrit toe',
  'add_new' => 'Nieuw proefrit',
  'new_item' => 'Nieuw proefrit',
  'edit_item' => 'Wijzig proefrit',
  'update_item' => 'Update proefrit',
  'view_item' => 'Toon proefrit',
  'view_items' => 'Toon proefrit',
  'search_items' => 'Doorzoek proefrit',
  'not_found' => 'Not found',
  'not_found_in_trash' => 'Not found in Trash',
  'featured_image' => 'Featured Image',
  'set_featured_image' => 'Set featured image',
  'remove_featured_image' => 'Remove featured image',
  'use_featured_image' => 'Use as featured image',
  'insert_into_item' => 'Insert into item',
  'uploaded_to_this_item' => 'Uploaded to this item',
  'items_list' => 'Proefrit lijst',
  'items_list_navigation' => 'Proefrit lijst navigation',
  'filter_items_list' => 'Filter proefrit lijst',
  );
  $args_proefrit = array(
  'label' => 'Proefrit',
  'description' => 'Proefrit (titel, paragraaf)',
  'labels' => $labels_proefrit,
  'supports' => array( 'title', 'editor', 'thumbnail', 'revisions', 'custom-fields' ),
  'hierarchical' => false,
  'public' => true,
  'show_ui' => true,
  'show_in_menu' => true,
  'menu_position' => 5,
  'menu_icon' => 'dashicons-plugins-checked',
  'show_in_admin_bar' => true,
  'show_in_nav_menus' => true,
  'can_export' => true,
  'has_archive' => true,
  'exclude_from_search' => false,
  'publicly_queryable' => true,
  'capability_type' => 'page',
  'show_in_rest' => true,
  );
  register_post_type( 'proefrit', $args_proefrit );
  
}

add_filter( 'kdmfi_featured_images', function( $featured_images ) {
  // Add featured-image-2 to pages and posts
  $args_proefrit_1 = array(
    'id' => 'featured-image-2',
    'desc' => 'Your description here.',
    'label_name' => 'Icoon 1',
    'label_set' => 'Set featured image 2',
    'label_remove' => 'Remove featured image 2',
    'label_use' => 'Set featured image 2',
    'post_type' => array( 'proefrit', 'post' ),
  );

  $args_proefrit_2 = array(
    'id' => 'featured-image-3',
    'desc' => 'Your description here.',
    'label_name' => 'Icoon 2',
    'label_set' => 'Set featured image 3',
    'label_remove' => 'Remove featured image 3',
    'label_use' => 'Set featured image 3',
    'post_type' => array( 'proefrit', 'post' ),
  );

  $args_proefrit_3 = array(
    'id' => 'featured-image-4',
    'desc' => 'Your description here.',
    'label_name' => 'Icoon 3',
    'label_set' => 'Set featured image 4',
    'label_remove' => 'Remove featured image 4',
    'label_use' => 'Set featured image 4',
    'post_type' => array( 'proefrit', 'post' ),
  );

  $args_proefrit_4 = array(
    'id' => 'featured-image-5',
    'desc' => 'Your description here.',
    'label_name' => 'Icoon 4',
    'label_set' => 'Set featured image 5',
    'label_remove' => 'Remove featured image 5',
    'label_use' => 'Set featured image 5',
    'post_type' => array( 'proefrit', 'post' ),
  );

  $args_proefrit_5 = array(
    'id' => 'featured-image-6',
    'desc' => 'Your description here.',
    'label_name' => 'Foto blok 4',
    'label_set' => 'Set featured image 6',
    'label_remove' => 'Remove featured image 6',
    'label_use' => 'Set featured image 6',
    'post_type' => array( 'proefrit', 'post' ),
  );

  // Add the featured images to the array, so that you are not overwriting images that maybe are created in other filter calls
  $featured_images[] = $args_proefrit_1;
  $featured_images[] = $args_proefrit_2;
  $featured_images[] = $args_proefrit_3;
  $featured_images[] = $args_proefrit_4;
  $featured_images[] = $args_proefrit_5;


  // Important! Return all featured images
  return $featured_images;
});
 
  
 function bs_add_custom_box_proefrit(){ 
  add_meta_box(
  'bs_proefrit_box_id', // Unique ID
  'Info proefrit', // Box title
  'bs_custom_box_proefrit_html', // Content callback, must be of type callable
  'proefrit' // Post type
  ); 
 }

 function bs_custom_box_proefrit_html($post){
  //optioneel kan deze callback functie de $post variabele gebruiken als parameter 
  
  //als extra paramter kan je het $post object gebruiken

  $value_title_blok1_proefrit = get_post_meta($post->ID, '_title_blok1_proefrit', true);
  $value_text_blok1_proefrit = get_post_meta($post->ID, '_text_blok1_proefrit', true);
  $value_tijd = get_post_meta($post->ID, '_tijd_proefrit', true);
  $value_foto = get_post_meta($post->ID, '_foto_proefrit', true);
  $value_icoon1 = get_post_meta($post->ID, '_icoon1_proefrit', true);
  $value_icoon2 = get_post_meta($post->ID, '_icoon2_proefrit', true);
  $value_titelform = get_post_meta($post->ID, '_titelform_proefrit', true);

  echo "<h1>Inhoud proefrit</h1>";
  echo "<br/>";
  echo "Titel blok 1:";
  echo "<br/>";
  echo "<br/>";
  echo "<input type='text' id='title_blok1_proefrit' name='title_blok1_proefrit' value='".  $value_title_blok1_proefrit ."'>";
  echo "<br/>";
  echo "<br/>";
  echo "Tekst blok 1: ";
  echo "<br/>";
  echo "<br/>";
  echo "<textarea id='text_blok1_proefrit' name='text_blok1_proefrit' rows='4' cols='50' maxlength='600'>" . $value_text_blok1_proefrit . "</textarea>";
  echo "<br/>";
  echo "<br/>";
  echo "Tekstblok bij klok: ";
  echo "<br/>";
  echo "<br/>";
  echo "<textarea id='tijd_proefrit' name='tijd_proefrit' rows='4' cols='50' maxlength='600'>" . $value_tijd . "</textarea>";
  echo "<br/>";
  echo "<br/>";
  echo "Tekstblok over de foto: ";
  echo "<br/>";
  echo "<br/>";
  echo "<textarea id='foto_proefrit' name='foto_proefrit' rows='4' cols='50' maxlength='600'>" . $value_foto . "</textarea>";
  echo "<br/>";
  echo "<br/>";
  echo "Tekstblok boven de iconen: ";
  echo "<br/>";
  echo "<br/>";
  echo "<textarea id='icoon1_proefrit' name='icoon1_proefrit' rows='4' cols='50' maxlength='600'>" . $value_icoon1 . "</textarea>";
  echo "<br/>";
  echo "<br/>";
  echo "Tekstblok onder de iconen: ";
  echo "<br/>";
  echo "<br/>";
  echo "<textarea id='icoon2_proefrit' name='icoon2_proefrit' rows='4' cols='50' maxlength='600'>" . $value_icoon2 . "</textarea>";
  echo "<br/>";
  echo "<br/>";
  echo "Titel boven formulier:";
  echo "<br/>";
  echo "<br/>";
  echo "<input type='text' id='titelform_proefrit' name='titelform_proefrit' value='".  $value_titelform ."'>";
  
 }

 function bs_save_postdata_proefrit($post_id){

  //bepaal het (custom) type van de post
  
  $naam_post_type = get_post_type($post_id);
  if ($naam_post_type){
  //het gaat om een Custom post type want er bestaat een post_type (het is niet leeg)
  if ($naam_post_type == "proefrit"){

  if (array_key_exists('title_blok1_proefrit', $_POST)) {
    update_post_meta(
    $post_id,
    '_title_blok1_proefrit',
    $_POST['title_blok1_proefrit']
    );
    }

    if (array_key_exists('text_blok1_proefrit', $_POST)) {
      update_post_meta(
      $post_id,
      '_text_blok1_proefrit',
      $_POST['text_blok1_proefrit']
      );

      } if (array_key_exists('tijd_proefrit', $_POST)) {
        update_post_meta(
        $post_id,
        '_tijd_proefrit',
        $_POST['tijd_proefrit']
        );
        }

    if (array_key_exists('foto_proefrit', $_POST)) {
      update_post_meta(
      $post_id,
      '_foto_proefrit',
      $_POST['foto_proefrit']
      );
      }

    if (array_key_exists('icoon1_proefrit', $_POST)) {
      update_post_meta(
      $post_id,
      '_icoon1_proefrit',
      $_POST['icoon1_proefrit']
      );
      }
      if (array_key_exists('icoon2_proefrit', $_POST)) {
        update_post_meta(
        $post_id,
        '_icoon2_proefrit',
        $_POST['icoon2_proefrit']
        );
        }        
        if (array_key_exists('titelform_proefrit', $_POST)) {
          update_post_meta(
          $post_id,
          '_titelform_proefrit',
          $_POST['titelform_proefrit']
          );
          }
    

  }
  } 
 }



// custum post type sevice pagina----------------------------------------------------------------

function bs_register_service() {
 
  $labels_service = array(
  'name' => 'Service',
  'singular_name' => 'Service',
  'menu_name' => 'Service',
  'name_admin_bar' => 'Service',
  'archives' => 'Service archief',
  'attributes' => 'Service Attributes',
  'parent_item_colon' => 'Parent Item:',
  'all_items' => 'All Items',
  'add_new_item' => 'Voeg nieuw service toe',
  'add_new' => 'Nieuw service',
  'new_item' => 'Nieuw service',
  'edit_item' => 'Wijzig service',
  'update_item' => 'Update service',
  'view_item' => 'Toon service',
  'view_items' => 'Toon service',
  'search_items' => 'Doorzoek service',
  'not_found' => 'Not found',
  'not_found_in_trash' => 'Not found in Trash',
  'featured_image' => 'Foto blok 1',
  'set_featured_image' => 'Set featured image',
  'remove_featured_image' => 'Remove featured image',
  'use_featured_image' => 'Use as featured image',
  'insert_into_item' => 'Insert into item',
  'uploaded_to_this_item' => 'Uploaded to this item',
  'items_list' => 'Service lijst',
  'items_list_navigation' => 'Service lijst navigation',
  'filter_items_list' => 'Filter service  lijst',
  );
  $args_service = array(
  'label' => 'Service ',
  'description' => 'Service (titel, paragraaf)',
  'labels' => $labels_service,
  'supports' => array( 'title', 'editor', 'thumbnail', 'revisions', 'custom-fields' ),
  'hierarchical' => false,
  'public' => true,
  'show_ui' => true,
  'show_in_menu' => true,
  'menu_position' => 5,
  'menu_icon' => 'dashicons-admin-generic',
  'show_in_admin_bar' => true,
  'show_in_nav_menus' => true,
  'can_export' => true,
  'has_archive' => true,
  'exclude_from_search' => false,
  'publicly_queryable' => true,
  'capability_type' => 'page',
  'show_in_rest' => true,
  );

  register_post_type( 'service', $args_service );

}

add_filter( 'kdmfi_featured_images', function( $featured_images ) {
  // Add featured-image-2 to pages and posts
  $args_service_1 = array(
    'id' => 'featured-image-2',
    'desc' => 'Your description here.',
    'label_name' => 'Foto service 1 blok 2',
    'label_set' => 'Set featured image 2',
    'label_remove' => 'Remove featured image 2',
    'label_use' => 'Set featured image 2',
    'post_type' => array( 'service', 'post' ),
  );

  $args_service_2 = array(
    'id' => 'featured-image-3',
    'desc' => 'Your description here.',
    'label_name' => 'Foto service 2 blok 2',
    'label_set' => 'Set featured image 3',
    'label_remove' => 'Remove featured image 3',
    'label_use' => 'Set featured image 3',
    'post_type' => array( 'service', 'post' ),
  );

  $args_service_3 = array(
    'id' => 'featured-image-4',
    'desc' => 'Your description here.',
    'label_name' => 'Foto service 3 blok 2',
    'label_set' => 'Set featured image 4',
    'label_remove' => 'Remove featured image 4',
    'label_use' => 'Set featured image 4',
    'post_type' => array( 'service', 'post' ),
  );

  $args_service_4 = array(
    'id' => 'featured-image-5',
    'desc' => 'Your description here.',
    'label_name' => 'Foto blok 3',
    'label_set' => 'Set featured image 5',
    'label_remove' => 'Remove featured image 5',
    'label_use' => 'Set featured image 5',
    'post_type' => array( 'service', 'post' ),
  );

  $args_service_5 = array(
    'id' => 'featured-image-6',
    'desc' => 'Your description here.',
    'label_name' => 'Foto blok 4',
    'label_set' => 'Set featured image 6',
    'label_remove' => 'Remove featured image 6',
    'label_use' => 'Set featured image 6',
    'post_type' => array( 'service', 'post' ),
  );

  // Add the featured images to the array, so that you are not overwriting images that maybe are created in other filter calls
  $featured_images[] = $args_service_1;
  $featured_images[] = $args_service_2;
  $featured_images[] = $args_service_3;
  $featured_images[] = $args_service_4;
  $featured_images[] = $args_service_5;


  // Important! Return all featured images
  return $featured_images;
});

function bs_add_custom_box_service(){ 
  add_meta_box(
  'bs_service_box_id', // Unique ID
  'Info service', // Box title
  'bs_custom_box_service_html', // Content callback, must be of type callable
  'service' // Post type
  ); 
}

function bs_custom_box_service_html($post){

  //blok 1
  $value_service_title_blok1 = get_post_meta($post->ID, '_service_title_blok1', true);  
  $value_service_img_blok1 = get_post_meta($post->ID, '_service_img_blok1', true);
  $value_service_subtitle_blok1 = get_post_meta($post->ID, '_service_subtitle_blok1', true);
  $value_service_text__blok1 = get_post_meta($post->ID, '_service_text__blok1', true);

  //blok 2 :services--------------------
  //service 1
  $value_service_title_service1 = get_post_meta($post->ID, '_service_title_service1', true);
  $value_service_img_service1 = get_post_meta($post->ID, '_service_img_service1', true);
  $value_service_text_service1 = get_post_meta($post->ID, '_service_text_service1', true);

  //service 2
  $value_service_title_service2 = get_post_meta($post->ID, '_service_title_service2', true);
  $value_service_img_service2 = get_post_meta($post->ID, '_service_img_service2', true);
  $value_service_text_service2 = get_post_meta($post->ID, '_service_text_service2', true);

  //service 3
  $value_service_title_service3 = get_post_meta($post->ID, '_service_title_service3', true);
  $value_service_img_service3 = get_post_meta($post->ID, '_service_img_service3', true);
  $value_service_text_service3 = get_post_meta($post->ID, '_service_text_service3', true);
  //--------------------------------------

  //blok 3
  $value_service_title_blok3 = get_post_meta($post->ID, '_service_title_blok3', true);
  $value_service_subtitle1_blok3 = get_post_meta($post->ID, '_service_subtitle1_blok3', true);
  $value_service_text1_blok3 = get_post_meta($post->ID, '_service_text1_blok3', true);
  $value_service_img_blok3 = get_post_meta($post->ID, '_service_img_blok3', true);
  $value_service_subtitle2_blok3 = get_post_meta($post->ID, '_service_subtitle2_blok3', true);
  $value_service_text2_blok3 = get_post_meta($post->ID, '_service_text2_blok3', true);

   //blok 4
   $value_service_img_blok4= get_post_meta($post->ID, '_service_img_blok4', true);
   $value_service_title_blok4 = get_post_meta($post->ID, '_service_title_blok4', true);
   $value_service_text_blok4 = get_post_meta($post->ID, '_service_text_blok4', true);
   $value_service_subtitle_blok4 = get_post_meta($post->ID, '_service_subtitle_blok4', true);
   $value_service_text_knop_blok4 = get_post_meta($post->ID, '_service_text_knop_blok4', true);

  
  echo "<h1>Service</h1>";

  //Blok 1
    echo "<h3>blok 1</h3>";
    echo "Titel service pagina:";
    echo "<br/>";
    echo "<input type='text' id='service_title_blok1' name='service_title_blok1' value='".  $value_service_title_blok1 ."'>";
    echo "<br/>";
    echo "<br/>";
    echo "Subtitel blok 1:";
    echo "<br/>";
    echo "<input type='text' id='service_subtitle_blok1' name='service_subtitle_blok1' value='".  $value_service_subtitle_blok1 ."'>";
    echo "<br/>";
    echo "<br/>";
    echo "Tekst blok 1:";
    echo "<br/>";
    echo "<textarea id='service_text__blok1' name='service_text__blok1' rows='6' cols='50' maxlength='1000'>" . $value_service_text__blok1 . "</textarea>";
    echo "<br/>";
    echo "<br/>";

  //Blok 2
    echo "<h3>blok 2</h3>";
    echo "Subtitel links blok 2:";
    echo "<br/>";
    echo "<input type='text' id='service_title_service1' name='service_title_service1' value='".  $value_service_title_service1 ."'>";
    echo "<br/>";
    echo "<br/>";
    echo "Tekst links blok 2:";
    echo "<br/>";
    echo "<textarea id='service_text_service1' name='service_text_service1' rows='6' cols='50' maxlength='500'>" . $value_service_text_service1 . "</textarea>";
    echo "<br/>";
    echo "<br/>";
    echo "Subtitel midden blok 2:";
    echo "<br/>";
    echo "<input type='text' id='service_title_service2' name='service_title_service2' value='".   $value_service_title_service2 ."'>";
    echo "<br/>";
    echo "<br/>";
    echo "Tekst midden blok 2:";
    echo "<br/>";
    echo "<textarea id='service_text_service2' name='service_text_service2' rows='6' cols='50' maxlength='500'>" . $value_service_text_service2 . "</textarea>";
    echo "<br/>";
    echo "<br/>";
    echo "Subtitel rechts blok 2:";
    echo "<br/>";
    echo "<input type='text' id='service_title_service3' name='service_title_service3' value='".   $value_service_title_service3 ."'>";
    echo "<br/>";
    echo "<br/>";
    echo "Tekst rechts blok 2:";
    echo "<br/>";
    echo "<textarea id='service_text_service3' name='service_text_service3' rows='6' cols='50' maxlength='500'>" . $value_service_text_service3 . "</textarea>";
    echo "<br/>";
    echo "<br/>";
    

  //Blok 3
    echo "<h3>blok 3</h3>";
    echo "Titel blok 3:";
    echo "<br/>";
    echo "<input type='text' id='service_title_blok3' name='service_title_blok3' value='".    $value_service_title_blok3 ."'>";
    echo "<br/>";
    echo "<br/>";
    echo "Subtitel links blok 3:";
    echo "<br/>";
    echo "<input type='text' id='service_subtitle1_blok3' name='service_subtitle1_blok3' value='".   $value_service_subtitle1_blok3 ."'>";
    echo "<br/>";
    echo "<br/>";
    echo "Tekst links blok 3:";
    echo "<br/>";
    echo "<textarea id='service_text1_blok3' name='service_text1_blok3' rows='6' cols='50' maxlength='800'>" . $value_service_text1_blok3 . "</textarea>";
    echo "<br/>";
    echo "<br/>";
    echo "Subtitel rechts blok 3:";
    echo "<br/>";
    echo "<input type='text' id='service_subtitle2_blok3' name='service_subtitle2_blok3' value='".    $value_service_subtitle2_blok3 ."'>";
    echo "<br/>";
    echo "<br/>";
    echo "Tekst rechts blok 3:";
    echo "<br/>";
    echo "<textarea id='service_text2_blok3' name='service_text2_blok3' rows='6' cols='50' maxlength='1500'>" . $value_service_text2_blok3 . "</textarea>";
    echo "<br/>";
    echo "<br/>";

  //Blok 4
    echo "<h3>blok 4</h3>";
    echo "Titel blok 4:";
    echo "<br/>";
    echo "<input type='text' id='service_title_blok4' name='service_title_blok4' value='".   $value_service_title_blok4 ."'>";
    echo "<br/>";
    echo "<br/>";
    echo "Tekst blok 4:";
    echo "<br/>";
    echo "<textarea id='service_text_blok4' name='service_text_blok4' rows='6' cols='50' maxlength='600'>" . $value_service_text_blok4 . "</textarea>";
    echo "<br/>";
    echo "<br/>";
    echo "Subtitel blok 4:";
    echo "<br/>";
    echo "<input type='text' id='service_subtitle_blok4' name='service_subtitle_blok4' value='".  $value_service_subtitle_blok4 ."'>";
    echo "<br/>";
    echo "<br/>";
    echo "Tekst knop blok 4:";
    echo "<br/>";
    echo "<input type='text' id='service_text_knop_blok4' name='service_text_knop_blok4' value='".  $value_service_text_knop_blok4 ."'>";

    echo "<br/>";
    echo "<br/>";
    
}

function bs_service_save_postdata($post_id){
  //bepaal het (custom) type van de post
  $naam_post_type = get_post_type($post_id);
  if ($naam_post_type) {
    //het gaat om een Custom post type want er bestaat een post_type (het is niet leeg)
    if ($naam_post_type == "service") {
      //het custom post type is van het type service

      // opslaan data over bikestore pagina
      //opslaan van een INPUT: titel blok 1
      if (array_key_exists('service_title_blok1', $_POST)) {
        update_post_meta(
          $post_id,
          '_service_title_blok1',
          $_POST['service_title_blok1']
        );
      }
      //opslaan van een INPUT:subtitel blok 1
      if (array_key_exists('service_subtitle_blok1', $_POST)) {
        update_post_meta(
          $post_id,
          '_service_subtitle_blok1',
          $_POST['service_subtitle_blok1']
        );
      }
      //opslaan van een INPUT: tekst blok 1
      if (array_key_exists('service_text__blok1', $_POST)) {
        update_post_meta(
          $post_id,
          '_service_text__blok1',
          $_POST['service_text__blok1']
        );
      }

      // opslaan data blok 2
      //opslaan van een INPUT: titel service 1 blok 2
      if (array_key_exists('service_title_service1', $_POST)) {
        update_post_meta(
          $post_id,
          '_service_title_service1',
          $_POST['service_title_service1']
        );
      }
      //opslaan van een INPUT:tekst service 1 blok 2
      if (array_key_exists('service_text_service1', $_POST)) {
        update_post_meta(
          $post_id,
          '_service_text_service1',
          $_POST['service_text_service1']
        );
      }


      //opslaan van een INPUT: titel service 2 blok 2
      if (array_key_exists('service_title_service2', $_POST)) {
        update_post_meta(
          $post_id,
          '_service_title_service2',
          $_POST['service_title_service2']
        );
      }
      //opslaan van een INPUT: tekst service 2 blok 2
      if (array_key_exists('service_text_service2', $_POST)) {
        update_post_meta(
          $post_id,
          '_service_text_service2',
          $_POST['service_text_service2']
        );
      }

      //opslaan van een INPUT: titel service 3 blok 2
      if (array_key_exists('service_title_service3', $_POST)) {
        update_post_meta(
          $post_id,
          '_service_title_service3',
          $_POST['service_title_service3']
        );
      }
      //opslaan van een INPUT: tekst service 3 blok 2
      if (array_key_exists('service_text_service3', $_POST)) {
        update_post_meta(
          $post_id,
          '_service_text_service3',
          $_POST['service_text_service3']
        );
      }

      //opslaan van een INPUT: titel blok 3
      if (array_key_exists('service_title_blok3', $_POST)) {
        update_post_meta(
          $post_id,
          '_service_title_blok3',
          $_POST['service_title_blok3']
        );
      }
      //opslaan van een INPUT: Subtitle 1 blok 3
      if (array_key_exists('service_subtitle1_blok3', $_POST)) {
        update_post_meta(
          $post_id,
          '_service_subtitle1_blok3',
          $_POST['service_subtitle1_blok3']
        );
      }
      //opslaan van een INPUT: Tekst 1 blok 3
      if (array_key_exists('service_text1_blok3', $_POST)) {
        update_post_meta(
          $post_id,
          '_service_text1_blok3',
          $_POST['service_text1_blok3']
        );
      }
      //opslaan van een INPUT: Subtitel 2 blok 3
      if (array_key_exists('service_subtitle2_blok3', $_POST)) {
        update_post_meta(
          $post_id,
          '_service_subtitle2_blok3',
          $_POST['service_subtitle2_blok3']
        );
      }
      //opslaan van een INPUT: tekst 2 blok 3
      if (array_key_exists('service_text2_blok3', $_POST)) {
        update_post_meta(
          $post_id,
          '_service_text2_blok3',
          $_POST['service_text2_blok3']
        );
      }


      // opslaan data blok 4
      //opslaan van een INPUT: title blok 4
      if (array_key_exists('service_title_blok4', $_POST)) {
        update_post_meta(
          $post_id,
          '_service_title_blok4',
          $_POST['service_title_blok4']
        );
      }
      //opslaan van een INPUT: text blok 4
      if (array_key_exists('service_text_blok4', $_POST)) {
        update_post_meta(
          $post_id,
          '_service_text_blok4',
          $_POST['service_text_blok4']
        );
      }
      //opslaan van een INPUT: subtitle blok 4
      if (array_key_exists('service_subtitle_blok4', $_POST)) {
        update_post_meta(
          $post_id,
          '_service_subtitle_blok4',
          $_POST['service_subtitle_blok4']
        );
      }
      //opslaan van een INPUT: text knop blok 4
      if (array_key_exists('service_text_knop_blok4', $_POST)) {
        update_post_meta(
          $post_id,
          '_service_text_knop_blok4',
          $_POST['service_text_knop_blok4']
        );
      }
    }
  }
}




 //custom post type  bedank op formulier--------------------------------------------------------------------------
 function bs_register_bedank() {
 
  $labels_bedank = array(
  'name' => 'Bedank',
  'singular_name' => 'Bedank',
  'menu_name' => 'Bedank',
  'name_admin_bar' => 'Bedank',
  'archives' => 'Bedank archief',
  'attributes' => 'Bedank Attributes',
  'parent_item_colon' => 'Parent Item:',
  'all_items' => 'All Items',
  'add_new_item' => 'Voeg nieuw bedank toe',
  'add_new' => 'Nieuw bedank',
  'new_item' => 'Nieuw bedank',
  'edit_item' => 'Wijzig bedank',
  'update_item' => 'Update bedank',
  'view_item' => 'Toon bedank',
  'view_items' => 'Toon bedank',
  'search_items' => 'Doorzoek bedank',
  'not_found' => 'Not found',
  'not_found_in_trash' => 'Not found in Trash',
  'featured_image' => 'Featured Image',
  'set_featured_image' => 'Set featured image',
  'remove_featured_image' => 'Remove featured image',
  'use_featured_image' => 'Use as featured image',
  'insert_into_item' => 'Insert into item',
  'uploaded_to_this_item' => 'Uploaded to this item',
  'items_list' => 'Bedank lijst',
  'items_list_navigation' => 'Bedank lijst navigation',
  'filter_items_list' => 'Filter bedank lijst',
  );
  $args_bedank = array(
  'label' => 'Bedank',
  'description' => 'Bedank (titel, paragraaf)',
  'labels' => $labels_bedank,
  'supports' => array( 'title', 'editor', 'thumbnail', 'revisions', 'custom-fields' ),
  'hierarchical' => false,
  'public' => true,
  'show_ui' => true,
  'show_in_menu' => true,
  'menu_position' => 5,
  'menu_icon' => 'dashicons-yes-alt',
  'show_in_admin_bar' => true,
  'show_in_nav_menus' => true,
  'can_export' => true,
  'has_archive' => true,
  'exclude_from_search' => false,
  'publicly_queryable' => true,
  'capability_type' => 'page',
  'show_in_rest' => true,
  );
  register_post_type( 'bedank', $args_bedank );
  
 }

  function bs_add_custom_box_bedank(){ 
  add_meta_box(
  'bs_bedank_box_id', // Unique ID
  'Info bedank', // Box title
  'bs_custom_box_bedank_html', // Content callback, must be of type callable
  'bedank' // Post type
  ); 
 }

 
 function bs_custom_box_bedank_html($post){
  //optioneel kan deze callback functie de $post variabele gebruiken als parameter 
  
  //als extra paramter kan je het $post object gebruiken


  $value_button = get_post_meta($post->ID, '_button_bedank', true);

  echo "<h1>Button bedankpagina</h1>";
  echo "Tekst in de button: ";
  echo "<br/>";
  echo "<br/>";
  echo "<input type='text' id='button_bedank' name='button_bedank' value='". $value_button ."'>";
  
 }

 function bs_save_postdata_bedank($post_id){
  //bepaal het (custom) type van de post
  
  $naam_post_type = get_post_type($post_id);
  if ($naam_post_type){
  //het gaat om een Custom post type want er bestaat een post_type (het is niet leeg)
  if ($naam_post_type == "bedank"){

  
      if (array_key_exists('button_bedank', $_POST)) {
        update_post_meta(
        $post_id,
        '_button_bedank',
        $_POST['button_bedank']
        );
        }          

}
 } 
}





// inladen css / bootstrap css en js
  add_action("wp_enqueue_scripts", "bs_laadCSSenScript");




// suport post-thumbnail
  add_theme_support('post-thumbnails');


// inladen menu's
  add_action('init', 'bs_register_my_menus');


// inladen css / bootstrap css en js
add_action("wp_enqueue_scripts", "bs_laadCSSenScript");

  //custum post home
    add_action( 'init', 'bs_register_home');
    add_action('add_meta_boxes', 'bs_add_custom_box_home');
    add_action('save_post', 'bs_home_save_postdata');

  //custum post over bikestore
    add_action( 'init', 'bs_register_overbikestore');
    add_action('add_meta_boxes', 'bs_add_custom_box_overbikestore');
    add_action('save_post', 'bs_overbikestore_save_postdata');

  //custom post contact
    add_action('save_post', 'bs_save_postdata');
    add_action('add_meta_boxes', 'bs_add_custom_box');
    add_action( 'init', 'bs_register_contact');


  //custom post brochure
    add_action('save_post', 'bs_save_postdata_brochure');
    add_action('add_meta_boxes', 'bs_add_custom_box_brochure');
    add_action( 'init', 'bs_register_brochure'); 


  //custom post footer
     add_action('init', 'bs_register_footer');
     add_action('add_meta_boxes', 'bs_footer_add_custom_box');
     add_action('save_post', 'bs_footer_save_postdata');


  //custom post blog
     add_action('save_post', 'bs_save_postdata_blog');
     add_action('add_meta_boxes', 'bs_add_custom_box_blog');
     add_action( 'init', 'bs_register_blog'); 

  //custum post over bikestore
    add_action( 'init', 'bs_register_service');
    add_action('add_meta_boxes', 'bs_add_custom_box_service');
    add_action('save_post', 'bs_service_save_postdata');


  //custom post proefrit

            add_action('save_post', 'bs_save_postdata_proefrit');
            add_action('add_meta_boxes', 'bs_add_custom_box_proefrit');
            add_action( 'init', 'bs_register_proefrit'); 

  //custom post bedank
            add_action('save_post', 'bs_save_postdata_bedank');
            add_action('add_meta_boxes', 'bs_add_custom_box_bedank');
            add_action( 'init', 'bs_register_bedank'); 


  // woocommerce
add_action('after_setup_theme', 'mytheme_add_woocommerce_support');

/* New Sidebar */
function my_new_sidebar_widget_init() {
  register_sidebar( array(
    'name'          => 'New Sidebar',
    'id'            => 'my_new_sidebar',
    'before_widget' => '<div>',
    'after_widget'  => '</div>',
    'before_title'  => '<h2>',
    'after_title'   => '</h2>',
  ) );
}
add_action('widgets_init', 'my_new_sidebar_widget_init');

add_filter('woocommerce_product_data_tabs', 'specs_fietsen_tabs' );
function specs_fietsen_tabs( $tabs ){
 
	//unset( $tabs['inventory'] );
 
	$tabs['Specificaties'] = array(
		'label'    => 'Specificaties',
		'target'   => 'specs_product_data',
		'priority' => 21,
	);
	return $tabs;
 
}
 
/*
 * Tab content
 */
add_action( 'woocommerce_product_data_panels', 'specs_product_panels' );
function specs_product_panels(){
 
	echo '<div id="specs_product_data" class="panel woocommerce_options_panel">';
    echo '<h1 style="margin-left:10px; font-weight:500;">Algemeen</h1>';
    
    woocommerce_wp_text_input(
        array(
            'id'                => 'type_fiets',
            'value'             => get_post_meta( get_the_ID(), 'type_fiets', true ),
            'label'             => 'Type fiets')
    );

	woocommerce_wp_text_input( 
        array(
		'id'                => 'merk',
		'value'             => get_post_meta( get_the_ID(), 'merk', true ),
		'label'             => 'Merk')
    );
 
    

    woocommerce_wp_text_input(
        array(
            'id'                => 'serie',
            'value'             => get_post_meta( get_the_ID(), 'serie', true ),
            'label'             => 'Serie')
    );

    woocommerce_wp_text_input(
        array(
            'id'                => 'frametype',
            'value'             => get_post_meta( get_the_ID(), 'frametype', true ),
            'label'             => 'Frametype')
    );

    woocommerce_wp_text_input(
        array(
            'id'                => 'motorsysteem',
            'value'             => get_post_meta( get_the_ID(), 'motorsysteem', true ),
            'label'             => 'Motorsysteem')
    );

    woocommerce_wp_text_input(
        array(
            'id'                => 'motorpositie',
            'value'             => get_post_meta( get_the_ID(), 'motorpositie', true ),
            'label'             => 'Motorpositie')
    );

    woocommerce_wp_text_input(
        array(
            'id'                => 'aantal_versnellingen',
            'value'             => get_post_meta( get_the_ID(), 'aantal_versnellingen', true ),
            'label'             => 'Aantal versnellingen')
    );

    woocommerce_wp_text_input(
        array(
            'id'                => 'type_naaf',
            'value'             => get_post_meta( get_the_ID(), 'type_naaf', true ),
            'label'             => 'Type naaf')
    );

    woocommerce_wp_text_input(
        array(
            'id'                => 'framemateriaal',
            'value'             => get_post_meta( get_the_ID(), 'framemateriaal', true ),
            'label'             => 'Framemateriaal')
    );

    echo '<h1 style="margin-left:10px; font-weight:500;">Accu</h1>';

    woocommerce_wp_text_input(
        array(
            'id'                => 'standaard_accu_capaciteit',
            'value'             => get_post_meta( get_the_ID(), 'standaard_accu_capaciteit', true ),
            'label'             => 'Standaard accu capaciteit')
    );

    woocommerce_wp_select( array(
		'id'          => 'uitneembare_accu',
		'value'       => get_post_meta( get_the_ID(), 'uitneembare_accu', true ),
		'label'       => 'Uitneembare accu',
		'options'     => array('ja' => 'Ja', 'nee' => 'Nee'),
	) );

    woocommerce_wp_text_input(
        array(
            'id'                => 'accu_positie',
            'value'             => get_post_meta( get_the_ID(), 'accu_positie', true ),
            'label'             => 'Accu positie')
    );

    woocommerce_wp_text_input(
        array(
            'id'                => 'type_accu',
            'value'             => get_post_meta( get_the_ID(), 'type_accu', true ),
            'label'             => 'Type accu')
    );

    woocommerce_wp_text_input(
        array(
            'id'                => 'laadtijd_accu',
            'value'             => get_post_meta( get_the_ID(), 'laadtijd_accu', true ),
            'label'             => 'Laadtijd tot volle accu')
    );

    woocommerce_wp_select( array(
		'id'          => 'accu_keuze',
		'value'       => get_post_meta( get_the_ID(), 'accu_keuze', true ),
		'label'       => 'Accu keuze mogelijk',
		'options'     => array('ja' => 'Ja', 'nee' => 'Nee'),
	) );

    woocommerce_wp_select( array(
		'id'          => 'accu_laden_in_fiets',
		'value'       => get_post_meta( get_the_ID(), 'accu_laden_in_fiets', true ),
		'label'       => 'Accu laden in fiets',
		'options'     => array('ja' => 'Ja', 'nee' => 'Nee'),
	) );
  echo '<h1 style="margin-left:10px; font-weight:500;">Voordelen en nadelen</h1>';
  woocommerce_wp_text_input(
    array(
        'id'                => 'voordelen',
        'value'             => get_post_meta( get_the_ID(), 'voordelen', true ),
        'label'             => 'voordelen')
);
  woocommerce_wp_text_input(
  array(
      'id'                => 'nadelen',
      'value'             => get_post_meta( get_the_ID(), 'nadelen', true ),
      'label'             => 'nadelen')
);

echo '<h1 style="margin-left:10px; font-weight:500;">Accessoires specificaties</h1>';
  woocommerce_wp_text_input(
    array(
        'id'                => 'accessoires-label',
        'value'             => get_post_meta( get_the_ID(), 'accessoires-label', true ),
        'label'             => 'accessoires-label')
);
  woocommerce_wp_text_input(
  array(
      'id'                => 'accessoires-value',
      'value'             => get_post_meta( get_the_ID(), 'accessoires-value', true ),
      'label'             => 'accessoires-value')
);
	
echo '<p class="form-field"><label for="accessoires-type">accessoires-type</label><input type="text" class="short" style="" name="accessoires-type" id="accessoires-type" placeholder=""></p>'; 
echo '<p class="form-field"><label for="accessoires-waarde">accessoires-waarde</label><input type="text" class="short" style="" name="accessoires-waarde" id="accessoires-waarde" placeholder=""></p>'; 
echo '<p class="form-field"><button type="button" class="accessoires-toevoegen">Toevoegen</button></p>';
echo '<ul class="accessoires-list"></ul>';
echo '</div>';

}
 
/*
 * Save
 */
function webroom_add_custom_js_file_to_admin( $hook ) {
  wp_enqueue_script ( 'custom-post-type.js', get_template_directory_uri() . '/script/custom-post-type.js' );
}
add_action('admin_enqueue_scripts', 'webroom_add_custom_js_file_to_admin');


function fiets_specs_save_fields( $id ){

 
	  update_post_meta( $id, 'type_fiets', $_POST['type_fiets'] );
    update_post_meta( $id, 'merk', $_POST['serie'] );
    update_post_meta( $id, 'serie', $_POST['merk'] );
    update_post_meta( $id, 'frametype', $_POST['frametype'] );
    update_post_meta( $id, 'motorsysteem', $_POST['motorsysteem'] );
    update_post_meta( $id, 'motorpositie', $_POST['motorpositie'] );
    update_post_meta( $id, 'aantal_versnellingen', $_POST['aantal_versnellingen'] );
    update_post_meta( $id, 'type_naaf', $_POST['type_naaf'] );
    update_post_meta( $id, 'framemateriaal', $_POST['framemateriaal'] );

    update_post_meta( $id, 'standaard_accu_capaciteit', $_POST['standaard_accu_capaciteit'] );
    update_post_meta( $id, 'uitneembare_accu', $_POST['uitneembare_accu'] );
    update_post_meta( $id, 'accu_positie', $_POST['accu_positie'] );
    update_post_meta( $id, 'type_accu', $_POST['type_accu'] );
    update_post_meta( $id, 'laadtijd_accu', $_POST['laadtijd_accu'] );
    update_post_meta( $id, 'accu_keuze', $_POST['accu_keuze'] );
    update_post_meta( $id, 'accu_laden_in_fiets', $_POST['accu_laden_in_fiets'] );

    update_post_meta( $id, 'voordelen', $_POST['voordelen'] );
    update_post_meta( $id, 'nadelen', $_POST['nadelen'] );

    update_post_meta( $id, 'accessoires-label', $_POST['accessoires-label'] );
    update_post_meta( $id, 'accessoires-value', $_POST['accessoires-value'] );

 
}
add_action( 'woocommerce_process_product_meta', 'fiets_specs_save_fields' );

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

/**
 * Remove product data tabs
 */
add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );

function woo_remove_product_tabs( $tabs ) {

    unset( $tabs['description'] );      	// Remove the description tab
    unset( $tabs['reviews'] ); 			// Remove the reviews tab
    unset( $tabs['additional_information'] );  	// Remove the additional information tab

    return $tabs;
}

//Hide Price Range for WooCommerce Variable Products
/*add_filter( 'woocommerce_variable_sale_price_html', 
'lw_variable_product_price', 10, 2 );
add_filter( 'woocommerce_variable_price_html', 
'lw_variable_product_price', 10, 2 );*/


/*function sv_remove_product_page_skus( $enabled ) {
  if ( ! is_admin() && is_product() ) {
      return false;
  }

  return $enabled;
}
add_filter( 'wc_product_sku_enabled', 'sv_remove_product_page_skus' );*/

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);

add_shortcode( 'product_description', 'display_product_description' );
function display_product_description( $atts ){
    $atts = shortcode_atts( array(
        'id' => get_the_id(),
    ), $atts, 'product_description' );

    global $product;

    if ( ! is_a( $product, 'WC_Product') )
        $product = wc_get_product($atts['id']);

    return $product->get_description();
}?>

