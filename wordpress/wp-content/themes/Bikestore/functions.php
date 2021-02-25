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
  $value_title_banner = get_post_meta($post->ID, '_title_banner', true);
  $value_subtitle_banner = get_post_meta($post->ID, '_subtitle_banner', true);
  $value_knop_banner = get_post_meta($post->ID, '_knop_banner', true);
  $value_title_blok1 = get_post_meta($post->ID, '_title_home_blok1', true);
  $value_text_blok1 = get_post_meta($post->ID, '_text_blok1', true);
  $value_img_blok1 = get_post_meta($post->ID, '_img_blok1', true);
  
  echo "<h1>Homepagina</h1>";
  echo "<h3>Blok 1</h3>";
  echo "Title banner:";
  echo "<br/>";
  echo "<input type='text' id='title_banner' name='title_banner' value='". $value_title_banner ."'>";
  echo "<br/>";
  echo "<br/>";
  echo "Subtitle banner:";
  echo "<br/>";
  echo "<input type='text' id='subtitle_banner' name='subtitle_banner' value='". $value_subtitle_banner ."'>";
  echo "<br/>";
  echo "<br/>";
  echo "Text knop banner:";
  echo "<br/>";
  echo "<input type='text' id='knop_banner' name='knop_banner' value='". $value_knop_banner ."'>";
  echo "<br/>";
  echo "<br/>";
  echo "Titel blok 1: ";
  echo "<br/>";
  echo "<input type='text' id='title_home_blok1' name='title_home_blok1' value='". $value_title_blok1 ."'>";
  echo "<br/>";
  echo "<br/>";
  echo "Tekst blok 1: ";
  echo "<br/>";
  echo "<textarea id='text_blok1' name='text_blok1' rows='4' cols='50' maxlength='400'>" . $value_text_blok1 . "</textarea>";
  echo "<br/>";
  echo "<br/>";
  echo "Foto blok 1: ";
  echo "<br/>";
  echo "<input type='image' id='img_blok1' name='img_blok1' value='". $value_img_blok1 ."'>";
  
}



 //custom post type 2 brochure--------------------------------------------------------------------------
 function bs_register_brochure() {
 
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
  
 function bs_add_custom_box2(){ 
  add_meta_box(
  'bs_brochure_box_id', // Unique ID
  'Info brochure', // Box title
  'bs_custom_box_brochure_html', // Content callback, must be of type callable
  'brochure' // Post type
  ); 
 }
 function bs_custom_box_brochure_html($post){
  //optioneel kan deze callback functie de $post variabele gebruiken als parameter 
  
  //als extra paramter kan je het $post object gebruiken
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
 function bs_save_postdata2($post_id){
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
  
 function bs_add_custom_box3(){ 
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
 function bs_save_postdata3($post_id){
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






  //algemeen
            add_theme_support('post-thumbnails');

  // inladen css / bootstrap css en js
            add_action("wp_enqueue_scripts", "bs_laadCSSenScript");



  // inladen menu's
            add_action('init', 'bs_register_my_menus');


  //custum post home
            add_action('add_meta_boxes', 'bs_add_custom_box_home');
            add_action( 'init', 'bs_register_home');


  //custom post contact
            add_action('save_post', 'bs_save_postdata');
            add_action('add_meta_boxes', 'bs_add_custom_box');
            add_action( 'init', 'bs_register_contact');


  //custom post brochure

            add_action('save_post', 'bs_save_postdata2');
            add_action('add_meta_boxes', 'bs_add_custom_box2');
            add_action( 'init', 'bs_register_brochure'); 



  //custom post footer
            add_action('init', 'bs_register_footer');
            add_action('add_meta_boxes', 'bs_footer_add_custom_box');
            add_action('save_post', 'bs_footer_save_postdata');


  //custom post blog

            add_action('save_post', 'bs_save_postdata3');
            add_action('add_meta_boxes', 'bs_add_custom_box3');
            add_action( 'init', 'bs_register_blog'); 


  // woocommerce
            add_action('after_setup_theme', 'mytheme_add_woocommerce_support');


?>