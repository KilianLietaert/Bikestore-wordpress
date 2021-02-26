<?php

function mytheme_add_woocommerce_support()
{
  add_theme_support('woocommerce');
}

function bs_laadCSSenScript()
{
  $pathTheme = get_template_directory_uri();
  wp_enqueue_style("bootstrap", $pathTheme . '/css/bootstrap.min.css');
  wp_enqueue_style('Bikestore', $pathTheme . '/css/screen.css', ['bootstrap']);

  wp_enqueue_script('bootstrapjs', $pathTheme . '/script/bootstrap.min.js');
  //wp_enqueue_script('menujs', $pathTheme . '/script/.js');
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
  $value_adres = get_post_meta($post->ID, '_adres_bikestore', true);
  $value_huisnr = get_post_meta($post->ID, '_huisnr_bikestore', true);
  $value_postcode = get_post_meta($post->ID, '_postcode_bikestore', true);
  $value_stad = get_post_meta($post->ID, '_stad_bikestore', true);
  $value_land = get_post_meta($post->ID, '_land_bikestore', true);
  $value_telefoon = get_post_meta($post->ID, '_telefoon_bikestore', true);
  $value_email = get_post_meta($post->ID, '_email_bikestore', true);

  echo "<h1>Gegevens Bikestore</h1>";
  echo "<br/>";
  echo "Straatnaam: ";
  echo "<input type='text' id='adres_bikestore' name='adres_bikestore' value='" . $value_adres . "'>";
  echo "<br/>";
  echo "Huisnummer: ";
  echo "<input type='number' id='huisnr_bikestore' name='huisnr_bikestore' value='" . $value_huisnr . "'>";
  echo "<br/>";
  echo "Postcode: ";
  echo "<input type='number' id='postcode_bikestore' name='postcode_bikestore' value='" . $value_postcode . "'>";
  echo "<br/>";
  echo "Stad: ";
  echo "<input type='text' id='stad_bikestore' name='stad_bikestore' value='" . $value_stad . "'>";
  echo "<br/>";
  echo "Land: ";
  echo "<select name='land_bikestore' id='land_bikestore'>";
  echo "<option value='1' " . ($value_land == 1 ? "selected" : "") . ">België</option>";
  echo "<option value='2' " . ($value_land == 2 ? "selected" : "") . ">Nederland</option>";
  echo "<option value='3' " . ($value_land == 3 ? "selected" : "") . ">Duitsland</option>";
  echo "</select>";
  echo "<br/>";
  echo "Telefoonnummer: ";
  echo "<input type='number' pattern='((^[+\s0-9]{2,6}[\s\./0-
  9]*$))' id='telefoon_bikestore' name='telefoon_bikestore' value='" . $value_telefoon . "'>";
  echo "<br/>";
  echo "Email: ";
  echo "<input type='email' id='email_bikestore' name='email_bikestore' value='" . $value_email . "'>";
}
function bs_save_postdata($post_id)
{
  //bepaal het (custom) type van de post
  $naam_post_type = get_post_type($post_id);
  if ($naam_post_type) {
    //het gaat om een Custom post type want er bestaat een post_type (het is niet leeg)
    if ($naam_post_type == "contact") {
      //het custom post type is van het type project



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

  $value_text = get_post_meta($post->ID, '_footer_text', true);

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
  echo "Text bij titel 4: ";
  echo "<textarea id='footer_text' name='footer_text' rows='4' cols='50' maxlength='400'>" . $value_text . "</textarea>";
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
      if (array_key_exists('footer_text', $_POST)) {
        update_post_meta(
          $post_id,
          '_footer_text',
          $_POST['footer_text']
        );
      }
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
  echo "<textarea id='home_text_blok1' name='home_text_blok1' rows='6' cols='50' maxlength='600'>" . $value_home_text_blok1 . "</textarea>";
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
  echo "<textarea id='home_text_blok2' name='home_text_blok2' rows='6' cols='50' maxlength='600'>" . $value_home_text_blok2 . "</textarea>";
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
  echo "<textarea id='home_text_blok3' name='home_text_blok3' rows='6' cols='50' maxlength='600'>" . $value_home_text_blok3 . "</textarea>";

  //Blok 4
  echo "<h3>Blok 4</h3>";
  echo "Titel blok 4:";
  echo "<br/>";
  echo "<input type='text' id='home_title_blok4' name='home_title_blok4' value='". $value_home_title_blok4 ."'>";
  echo "<br/>";
  echo "<br/>";
  echo "Tekst blok 4:";
  echo "<br/>";
  echo "<textarea id='home_text_blok4' name='home_text_blok4' rows='4' cols='50' maxlength='200'>" . $value_home_text_blok4 . "</textarea>";
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

function bs_register_brochure(){ 
 
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

  $value_titel = get_post_meta($post->ID, '_titel_brochure', true);
  $value_uitleg = get_post_meta($post->ID, '_uitleg_brochure', true);
  $value_titelform1 = get_post_meta($post->ID, '_titelform1_brochure', true);
  $value_titelform2 = get_post_meta($post->ID, '_titelform2_brochure', true);
  $value_extrainfo1 = get_post_meta($post->ID, '_extrainfo1_brochure', true);
  $value_extrainfo2 = get_post_meta($post->ID, '_extrainfo2_brochure', true);
  $value_extrainfo3 = get_post_meta($post->ID, '_extrainfo3_brochure', true);
  
  echo "<h1>Extra info over brochure</h1>";
  echo "Grote titel op de pagina: ";
  echo "<input type='text' id='titel_brochure' name='titel_brochure' value='". $value_titel ."'>";
  echo "<br/>";
  // echo "Infoblok bovenaan: ";
  // echo "<textarea rows='5' cols='30' id='uitleg_brochure' name='uitleg_brochure' value='". $value_uitleg ."'>";
  // echo "<br/>";
  echo "Titel 1 bovenaan formulier: ";
  echo "<input type='text' id='titelform1_brochure' name='titelform1_brochure' value='". $value_titelform1 ."'>";
  echo "<br/>";
  echo "Titel 2 bovenaan formulier: ";
  echo "<input type='text' id='titelform2_brochure' name='titelform2_brochure' value='". $value_titelform2 ."'>";

  echo "<br/>";
  echo "Extra info overder formulier 1: ";
  echo "<input type='text' id='extrainfo1_brochure' name='extrainfo1_brochure' value='". $value_extrainfo1 ."'>";
  echo "<br/>";
  echo "Extra info overder formulier 2: ";
  echo "<input type='text' id='extrainfo2_brochure' name='extrainfo2_brochure' value='". $value_extrainfo2 ."'>";
  echo "<br/>";
  echo "Extra info overder formulier 3: ";
  echo "<input type='text' id='extrainfo3_brochure' name='extrainfo3_brochure' value='". $value_extrainfo3 ."'>";
}

function bs_save_postdata_brochure($post_id){
  //bepaal het (custom) type van de post
  
  $naam_post_type = get_post_type($post_id);
  if ($naam_post_type){
  //het gaat om een Custom post type want er bestaat een post_type (het is niet leeg)
  if ($naam_post_type == "brochure"){
  
  
  //opslaan van een INPUT:textbox titel
  if (array_key_exists('titel_brochure', $_POST)) {
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
    }

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
    echo "<textarea id='overbikestore_text_blok1' name='overbikestore_text_blok1' rows='6' cols='50' maxlength='700'>" . $value_overbikestore_text_blok1 . "</textarea>";
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
    echo "<textarea id='overbikestore_text1_blok2' name='overbikestore_text1_blok2' rows='6' cols='50' maxlength='700'>" . $value_overbikestore_text1_blok2 . "</textarea>";
    echo "<br/>";
    echo "<br/>";
    echo "Subtitel 2 blok 2:";
    echo "<br/>";
    echo "<input type='text' id='overbikestore_subtitle2_blok2' name='overbikestore_subtitle2_blok2' value='".   $value_overbikestore_subtitle2_blok2 ."'>";
    echo "<br/>";
    echo "<br/>";
    echo "Tekst 2 blok 2:";
    echo "<br/>";
    echo "<textarea id='overbikestore_text2_blok2' name='overbikestore_text2_blok2' rows='6' cols='50' maxlength='600'>" . $value_overbikestore_text2_blok2 . "</textarea>";
    echo "<br/>";
    echo "<br/>";
    echo "Onderschrift blok 2:";
    echo "<br/>";
    echo "<textarea id='overbikestore_onderschrift_onderaan_blok2' name='overbikestore_onderschrift_onderaan_blok2' rows='4' cols='50' maxlength='200'>" . $value_overbikestore_onderschrift_onderaan_blok2 . "</textarea>";
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
    echo "<textarea id='overbikestore_text_blok3' name='overbikestore_text_blok3' rows='6' cols='50' maxlength='700'>" . $value_overbikestore_text_blok3 . "</textarea>";
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
    echo "<textarea id='overbikestore_text_blok4' name='overbikestore_text_blok4' rows='6' cols='50' maxlength='700'>" . $value_overbikestore_text_blok4 . "</textarea>";
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

  $value_inleiding = get_post_meta($post->ID, '_inleiding_blog', true);
  $value_tsstitel1 = get_post_meta($post->ID, '_tsstitel1_blog', true);
  $value_tsstitel2 = get_post_meta($post->ID, '_tsstitel2_blog', true);
  $value_tsstitel3 = get_post_meta($post->ID, '_tsstitel3_blog', true);
  $value_tsstitel4 = get_post_meta($post->ID, '_tsstitel4_blog', true);
  $value_tsstitel5 = get_post_meta($post->ID, '_tsstitel5_blog', true);
  $value_tsstitel6 = get_post_meta($post->ID, '_tsstitel6_blog', true);
  $value_tsstitel7 = get_post_meta($post->ID, '_tsstitel7_blog', true);
  $value_para1 = get_post_meta($post->ID, '_para1_blog', true);
  $value_para2 = get_post_meta($post->ID, '_para2_blog', true);
  $value_para3 = get_post_meta($post->ID, '_para3_blog', true);
  $value_para4 = get_post_meta($post->ID, '_para4_blog', true);
  $value_para5 = get_post_meta($post->ID, '_para5_blog', true);
  $value_para6 = get_post_meta($post->ID, '_para6_blog', true);
  $value_para7 = get_post_meta($post->ID, '_para7_blog', true);
  $value_slot = get_post_meta($post->ID, '_slot_blog', true);
  $value_auteur = get_post_meta($post->ID, '_auteur_blog', true);
  
  echo "<h1>De blog opbouwen</h1>";
  echo "Inleiding: ";
  echo "<textarea id='inleiding_blog' name='inleiding_blog' rows='6' cols='100' maxlength='600'>" . $value_inleiding . "</textarea>";
  echo "<br/>";
  echo "Tussentitel 1: ";
  echo "<input type='text' id='tsstitel1_blog' name='tsstitel1_blog' value='". $value_tsstitel1 ."'>";
  echo "<br/>";
  echo "Tekstblok 1: ";
  echo "<textarea id='para1_blog' name='para1_blog' rows='6' cols='100' maxlength='600'>" . $value_para1 . "</textarea>";
  echo "<br/>";
  echo "Tussentitel 2: ";
  echo "<input type='text' id='tsstitel2_blog' name='tsstitel2_blog' value='". $value_tsstitel2 ."'>";
  echo "<br/>";
  echo "Tekstblok 2: ";
  echo "<textarea id='para2_blog' name='para2_blog' rows='6' cols='100' maxlength='600'>" . $value_para2 . "</textarea>";
  echo "<br/>";
  echo "Tussentitel 3 : ";
  echo "<input type='text' id='tsstitel3_blog' name='tsstitel3_blog' value='". $value_tsstitel3 ."'>";
  echo "<br/>";
  echo "Tekstblok 3: ";
  echo "<textarea id='para3_blog' name='para3_blog' rows='6' cols='100' maxlength='600'>" . $value_para3 . "</textarea>";
  echo "<br/>";
  echo "Tussentitel 4: ";
  echo "<input type='text' id='tsstitel4_blog' name='tsstitel4_blog' value='". $value_tsstitel4 ."'>";
  echo "<br/>";
  echo "Tekstblok 4: ";
  echo "<textarea id='para4_blog' name='para4_blog' rows='6' cols='100' maxlength='600'>" . $value_para4 . "</textarea>";
  echo "<br/>";
  echo "Tussentitel 5: ";
  echo "<input type='text' id='tsstitel5_blog' name='tsstitel5_blog' value='". $value_tsstitel5 ."'>";
  echo "<br/>";
  echo "Tekstblok 5: ";
  echo "<textarea id='para5_blog' name='para5_blog' rows='6' cols='100' maxlength='600'>" . $value_para5 . "</textarea>";
  echo "<br/>";
  echo "Tussentitel 6: ";
  echo "<input type='text' id='tsstitel6_blog' name='tsstitel6_blog' value='". $value_tsstitel6 ."'>";
  echo "<br/>";
  echo "Tekstblok 6: ";
  echo "<textarea id='para6_blog' name='para6_blog' rows='6' cols='100' maxlength='600'>" . $value_para6 . "</textarea>";
  echo "<br/>";
  echo "Tussentitel 7: ";
  echo "<input type='text' id='tsstitel7_blog' name='tsstitel7_blog' value='". $value_tsstitel7 ."'>";
  echo "<br/>";
  echo "Tekstblok 7: ";
  echo "<textarea id='para7_blog' name='para7_blog' rows='6' cols='100' maxlength='600'>" . $value_para7 . "</textarea>";
  echo "<br/>";
  echo "Slot zin: ";
  echo "<textarea id='slot_blog' name='slot_blog' rows='4' cols='100' maxlength='200'>" . $value_slot . "</textarea>";
  echo "<br/>";
  echo "Auteur blogbericht: ";
  echo "<input type='text' id='auteur_blog' name='auteur_blog' value='". $value_auteur ."'>";
 }

 function bs_save_postdata_blog($post_id){
  //bepaal het (custom) type van de post
  
  $naam_post_type = get_post_type($post_id);
  if ($naam_post_type){
  //het gaat om een Custom post type want er bestaat een post_type (het is niet leeg)
  if ($naam_post_type == "blog"){

  if (array_key_exists('inleiding_blog', $_POST)) {
    update_post_meta(
    $post_id,
    '_inleiding_blog',
    $_POST['inleiding_blog']
    );
    }

    if (array_key_exists('tsstitel1_blog', $_POST)) {
      update_post_meta(
      $post_id,
      '_tsstitel1_blog',
      $_POST['tsstitel1_blog']
      );
      }

      if (array_key_exists('para1_blog', $_POST)) {
        update_post_meta(
        $post_id,
        '_para1_blog',
        $_POST['para1_blog']
        );
        }


        if (array_key_exists('tsstitel2_blog', $_POST)) {
          update_post_meta(
          $post_id,
          '_tsstitel2_blog',
          $_POST['tsstitel2_blog']
          );
          }
    
          if (array_key_exists('para2_blog', $_POST)) {
            update_post_meta(
            $post_id,
            '_para2_blog',
            $_POST['para2_blog']
            );
            }

            if (array_key_exists('tsstitel3_blog', $_POST)) {
              update_post_meta(
              $post_id,
              '_tsstitel3_blog',
              $_POST['tsstitel3_blog']
              );
              }
        
              if (array_key_exists('para3_blog', $_POST)) {
                update_post_meta(
                $post_id,
                '_para3_blog',
                $_POST['para3_blog']
                );
                }


                if (array_key_exists('tsstitel4_blog', $_POST)) {
                  update_post_meta(
                  $post_id,
                  '_tsstitel4_blog',
                  $_POST['tsstitel4_blog']
                  );
                  }
            
                  if (array_key_exists('para4_blog', $_POST)) {
                    update_post_meta(
                    $post_id,
                    '_para4_blog',
                    $_POST['para4_blog']
                    );
                    }

                    if (array_key_exists('tsstitel5_blog', $_POST)) {
                      update_post_meta(
                      $post_id,
                      '_tsstitel5_blog',
                      $_POST['tsstitel5_blog']
                      );
                      }
                
                      if (array_key_exists('para5_blog', $_POST)) {
                        update_post_meta(
                        $post_id,
                        '_para5_blog',
                        $_POST['para5_blog']
                        );
                        }

                        if (array_key_exists('tsstitel6_blog', $_POST)) {
                          update_post_meta(
                          $post_id,
                          '_tsstitel6_blog',
                          $_POST['tsstitel6_blog']
                          );
                          }
                    
                          if (array_key_exists('para6_blog', $_POST)) {
                            update_post_meta(
                            $post_id,
                            '_para6_blog',
                            $_POST['para6_blog']
                            );
                            }

                            if (array_key_exists('tsstitel7_blog', $_POST)) {
                              update_post_meta(
                              $post_id,
                              '_tsstitel7_blog',
                              $_POST['tsstitel7_blog']
                              );
                              }
                        
                              if (array_key_exists('para7_blog', $_POST)) {
                                update_post_meta(
                                $post_id,
                                '_para7_blog',
                                $_POST['para7_blog']
                                );
                                }


                                if (array_key_exists('slot_blog', $_POST)) {
                                  update_post_meta(
                                  $post_id,
                                  '_slot_blog',
                                  $_POST['slot_blog']
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
    echo "<textarea id='service_text_service1' name='service_text_service1' rows='6' cols='50' maxlength='700'>" . $value_service_text_service1 . "</textarea>";
    echo "<br/>";
    echo "<br/>";
    echo "Subtitel midden blok 2:";
    echo "<br/>";
    echo "<input type='text' id='service_title_service2' name='service_title_service2' value='".   $value_service_title_service2 ."'>";
    echo "<br/>";
    echo "<br/>";
    echo "Tekst midden blok 2:";
    echo "<br/>";
    echo "<textarea id='service_text_service2' name='service_text_service2' rows='6' cols='50' maxlength='600'>" . $value_service_text_service2 . "</textarea>";
    echo "<br/>";
    echo "<br/>";
    echo "Subtitel rechts blok 2:";
    echo "<br/>";
    echo "<input type='text' id='service_title_service3' name='service_title_service3' value='".   $value_service_title_service3 ."'>";
    echo "<br/>";
    echo "<br/>";
    echo "Tekst rechts blok 2:";
    echo "<br/>";
    echo "<textarea id='service_text_service3' name='service_text_service3' rows='6' cols='50' maxlength='600'>" . $value_service_text_service3 . "</textarea>";
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
    echo "<textarea id='service_text1_blok3' name='service_text1_blok3' rows='6' cols='50' maxlength='700'>" . $value_service_text1_blok3 . "</textarea>";
    echo "<br/>";
    echo "<br/>";
    echo "Subtitel rechts blok 3:";
    echo "<br/>";
    echo "<input type='text' id='service_subtitle2_blok3' name='service_subtitle2_blok3' value='".    $value_service_subtitle2_blok3 ."'>";
    echo "<br/>";
    echo "<br/>";
    echo "Tekst rechts blok 3:";
    echo "<br/>";
    echo "<textarea id='service_text2_blok3' name='service_text2_blok3' rows='6' cols='50' maxlength='700'>" . $value_service_text2_blok3 . "</textarea>";
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
    echo "<textarea id='service_text_blok4' name='service_text_blok4' rows='6' cols='50' maxlength='700'>" . $value_service_text_blok4 . "</textarea>";
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


// inladen css / bootstrap css en js
  add_action("wp_enqueue_scripts", "bs_laadCSSenScript");



// suport post-thumbnail
  add_theme_support('post-thumbnails');


// inladen menu's
  add_action('init', 'bs_register_my_menus');


//custom post footer
  add_action('init', 'bs_register_footer');
  add_action('add_meta_boxes', 'bs_footer_add_custom_box');
  add_action('save_post', 'bs_footer_save_postdata');


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




  // woocommerce
            add_action('after_setup_theme', 'mytheme_add_woocommerce_support');


// woocommerce
  add_action('after_setup_theme', 'mytheme_add_woocommerce_support');


?>