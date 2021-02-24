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


//custom post type 1: Contact-------------------------------------------------------------------


//custom post type 1: Contact-------------------------------------------------------------------
 

function bs_register_contact()
{

  $labels = array(
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
  $args = array(
    'label' => 'Contact',
    'description' => 'Contact  (adres, nummer, email)',
    'labels' => $labels,
    'supports' => array('title', 'editor', 'thumbnail', 'revisions', 'custom-fields'),
    'hierarchical' => false,
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_position' => 5,
    'menu_icon' => 'dashicons-location',
    'show_in_admin_bar' => true,
    'show_in_nav_menus' => true,
    'can_export' => true,
    'has_archive' => true,
    'exclude_from_search' => false,
    'publicly_queryable' => true,
    'capability_type' => 'page',
    'show_in_rest' => true,
  );
  register_post_type('contact', $args);
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

  $test1 = array(
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
  $test = array(
    'label'                 => 'Footer',
    'description'           => 'Footer (overzicht footer)',
    'labels'                => $test1,
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
  register_post_type('footer', $test);
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

// inladen css / bootstrap css en js
add_action("wp_enqueue_scripts", "bs_laadCSSenScript");

// suport post-thumbnail
add_theme_support('post-thumbnails');

// inladen menu's
add_action('init', 'bs_register_my_menus');


 //custum post type : HomePagina
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
  'add_new_item' => 'Voeg nieuw Home toe',
  'add_new' => 'Nieuw home',
  'new_item' => 'Nieuw home',
  'edit_item' => 'Wijzig home',
  'update_item' => 'Update home',
  'view_item' => 'Toon home',
  'view_items' => 'Toon home',
  'search_items' => 'Doorzoek home',
  'not_found' => 'Not found',
  'not_found_in_trash' => 'Not found in Trash',
  'featured_image' => 'Featured Image',
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
  'description' => 'Home  (adres, nummer, email)',
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

function bs_add_custom_box_home(){ 
  add_meta_box(
  'bs_home_box_id', // Unique ID
  'Info home', // Box title
  'bs_custom_box_home_html', // Content callback, must be of type callable
  'home' // Post type
  ); 
}

function bs_custom_box_home_html($post){
  //optioneel kan deze callback functie de $post variabele gebruiken als parameter 
  
  //als extra paramter kan je het $post object gebruiken
  //banner
  $value_home_title_banner = get_post_meta($post->ID, '_home_title_banner', true);
  $value_home_ubtitle_banner = get_post_meta($post->ID, '_home_subtitle_banner', true);
  $value_home_knop_banner = get_post_meta($post->ID, '_home_knop_banner', true);

  //Balk services
  $value_home_service1 = get_post_meta($post->ID, '_home_service1', true);
  $value_home_service2 = get_post_meta($post->ID, '_home_service2', true);
  $value_home_service3 = get_post_meta($post->ID, '_home_service3', true);
  $value_home_service4 = get_post_meta($post->ID, '_Home_service4', true);

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
  echo "<input type='text' id='home_service2' name='home_service2' value='". $value_home_service1 ."'>";
  echo "<br/>";
  echo "<br/>";
  echo "Service 3:";
  echo "<br/>";
  echo "<input type='text' id='home_service3' name='home_service3' value='". $value_home_service1 ."'>";
  echo "<br/>";
  echo "<br/>";
  echo "Service 4:";
  echo "<br/>";
  echo "<input type='text' id='home_service4' name='home_service4' value='". $value_home_service1 ."'>";
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
  echo "<textarea id='home_text_blok1' name='home_text_blok1' rows='4' cols='50' maxlength='400'>" . $value_home_text_blok1 . "</textarea>";
  echo "<br/>";
  echo "<br/>";
  echo "Tekst knop blok 1:";
  echo "<br/>";
  echo "<input type='text' id='home_text_knop_blok1' name='home_text_knop_blok1' value='". $value_home_text_knop_blok1 ."'>";
  echo "<br/>";
  echo "<br/>";
  echo "Foto blok 1: ";
  echo "<br/>";
  echo "<input type='image' id='home_img_blok1' name='home_img_blok1' value='". $value_home_img_blok1 ."'>";

  //Blok 2
  echo "<h3>Blok 2</h3>";
  echo "Titel blok 2:";
  echo "<br/>";
  echo "<input type='text' id='home_title_blok2' name='home_title_blok2' value='". $value_home_title_blok2 ."'>";
  echo "<br/>";
  echo "<br/>";
  echo "Tekst blok 2:";
  echo "<br/>";
  echo "<textarea id='home_text_blok2' name='home_text_blok2' rows='4' cols='50' maxlength='400'>" . $value_home_text_blok2 . "</textarea>";
  echo "<br/>";
  echo "<br/>";
  echo "Tekst knop blok 2:";
  echo "<br/>";
  echo "<input type='text' id='home_text_knop_blok2' name='home_text_knop_blok2' value='". $value_home_text_knop_blok2 ."'>";
  echo "<br/>";
  echo "<br/>";
  echo "Foto achtergrond blok 2: ";
  echo "<br/>";
  echo "<input type='image' id='home_img_blok2' name='home_img_blok2' value='". $value_home_img_blok2 ."'>";
  
  //Blok 3
  echo "<h3>Blok 3</h3>";
  echo "Titel blok 3: ";
  echo "<br/>";
  echo "<input type='text' id='home_title_home_blok3' name='home_title_home_blok3' value='". $value_home_title_blok3 ."'>";
  echo "<br/>";
  echo "<br/>";
  echo "Tekst blok 3: ";
  echo "<br/>";
  echo "<textarea id='home_text_blok3' name='home_text_blok3' rows='4' cols='50' maxlength='400'>" . $value_home_text_blok3 . "</textarea>";
  echo "<br/>";
  echo "<br/>";
  echo "Tekst knop blok 3:";
  echo "<br/>";
  echo "<input type='text' id='home_text_knop_blok3' name='home_text_knop_blok3' value='". $value_home_text_knop_blok3 ."'>";
  echo "<br/>";
  echo "<br/>";
  echo "Foto blok 3: ";
  echo "<br/>";
  echo "<input type='image' id='home_img_blok3' name='home_img_blok3' value='". $value_home_img_blok3 ."'>";

  //Blok 4
  echo "<h3>Blok 4</h3>";
  echo "Titel blok 4:";
  echo "<br/>";
  echo "<input type='text' id='home_title_blok4' name='home_title_blok4' value='". $value_home_title_blok4 ."'>";
  echo "<br/>";
  echo "<br/>";
  echo "Tekst blok 4:";
  echo "<br/>";
  echo "<textarea id='home_text_blok4' name='home_text_blok4' rows='4' cols='50' maxlength='400'>" . $value_home_text_blok4 . "</textarea>";
  echo "<br/>";
  echo "<br/>";
  echo "Tekst knop blok 4:";
  echo "<br/>";
  echo "<input type='text' id='home_text_knop_blok4' name='home_text_knop_blok4' value='". $value_home_text_knop_blok4 ."'>";
}

function bs_footer_save_postdata($post_id){
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

//custom post contact
add_action('save_post', 'bs_save_postdata');
add_action('add_meta_boxes', 'bs_add_custom_box');
add_action('init', 'bs_register_contact');


//custom post footer
add_action('init', 'bs_register_footer');
add_action('add_meta_boxes', 'bs_footer_add_custom_box');
add_action('save_post', 'bs_footer_save_postdata');


  //custum post home
            add_action('add_meta_boxes', 'bs_add_custom_box_home');
            add_action( 'init', 'bs_register_home');

  //custom post contact
            add_action('save_post', 'bs_save_postdata');
            add_action('add_meta_boxes', 'bs_add_custom_box');
            add_action( 'init', 'bs_register_contact');



// woocommerce
add_action('after_setup_theme', 'mytheme_add_woocommerce_support');


?>