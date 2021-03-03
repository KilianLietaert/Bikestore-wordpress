<?php get_header( ) ?>
<body>
<?php $catTerms = get_the_terms( $post->ID, 'product_cat' );
                $categorie = $catTerms[0]->slug; 
            ?>
<div class="container">
<div class="row justify-content-center">
<?php echo do_shortcode('[product_page id='.$post->ID.']'); ?>
</div>
  <section class="container-fluid">
    <div class="row">
      <div class="c-productdetail__uitlegblok offset-xl-1 col-xl-6 col-lg-12">
        <div class="c-productdetail__uitlegtekst">
          <h3 class="c-productdetail__uitlegtekst--h3">
            Even voorstellen...
          </h3>
          <p class="c-productdetail__uitlegtekst--p">
          <?php echo $product->get_short_description();?>
          </p>
        </div>
        <div class="c-productdetail__uitlegtekst">
          <h3 class="c-productdetail__uitlegtekst--h3">
            Bafang voorwielmotor
          </h3>
          <p class="c-productdetail__uitlegtekst--p">
          <?php echo do_shortcode( "[product_description id=".$post->ID."]" ); ?>
          </p>
        </div>
        <?php if($categorie == "elektrische-fiets"){?>
        <div>
          <h3 class="c-productdetail__uitlegtekst--h3">Plus- en minpunten</h3>
          <?php 
          
            $voordelen = get_post_meta($post->ID, 'voordelen', true);
            $nadelen = get_post_meta($post->ID, 'nadelen', true);
            
            $voordelen_array = explode(";", $voordelen);
            $nadelen_array = explode(";", $nadelen);
            //var_dump($voordelen_array);
            //var_dump($nadelen_array);

            foreach($voordelen_array as $voordeel){
                echo '<div class="d-flex">';
                echo '<i class="fas fa-plus-circle"></i>';
                echo '<p class="c-productdetail__punten">';
                echo $voordeel;
                echo '</p>';
                echo '</div>';
            }
            foreach($nadelen_array as $nadeel){
                echo '<div class="d-flex">';
                echo '<i class="fas fa-minus-circle"></i>';
                echo '<p class="c-productdetail__punten">';
                echo $nadeel;
                echo '</p>';
                echo '</div>';
            }
          ?>
        </div>
        <?php } ?>
      </div>
      <div class="offset-xl-1 col-xl-4 col-lg-12">
        <div class="c-productdetail__tables">
          <table class="c-table">
            <th>Algemeen</th>
            <?php if($categorie == "elektrische-fiets"){ ?>
            <tr>
              <td class="c-table__links">Type fiets</td>
              <td class="c-table__rechts"><?php echo get_post_meta($post->ID, 'type_fiets', true) ?></td>
            </tr>
            <tr>
              <td class="c-table__links">Merk</td>
              <td class="c-table__rechts"><?php echo get_post_meta($post->ID, 'merk', true) ?></td>
            </tr>
            <tr>
              <td class="c-table__links">Serie</td>
              <td class="c-table__rechts"><?php echo get_post_meta($post->ID, 'serie', true) ?></td>
            </tr>
            <tr>
              <td class="c-table__links">Frametype</td>
              <td class="c-table__rechts"><?php echo get_post_meta($post->ID, 'frametype', true) ?></td>
            </tr>
            <tr>
              <td class="c-table__links">Motorsysteem</td>
              <td class="c-table__rechts"><?php echo get_post_meta($post->ID, 'motorsysteem', true) ?></td>
            </tr>
            <tr>
              <td class="c-table__links">Aantal versnellingen</td>
              <td class="c-table__rechts"><?php echo get_post_meta($post->ID, 'aantal_versnellingen', true) ?></td>
            </tr>
            <tr>
              <td class="c-table__links">Type naaf</td>
              <td class="c-table__rechts"><?php echo get_post_meta($post->ID, 'type_naaf', true) ?></td>
            </tr>
            <tr>
              <td class="c-table__links">Framemateriaal</td>
              <td class="c-table__rechts"><?php echo get_post_meta($post->ID, 'framemateriaal', true) ?></td>
            </tr>
            <?php } ?>
                <?php
                if($categorie == "accessoires"){ 
                    $labels = get_post_meta($post->ID, 'accessoires-label', true);
                    $values = get_post_meta($post->ID, 'accessoires-value', true);
                    $labels_array = explode(";", $labels);
                    $values_array = explode(";", $values);
                    //print_r($labels_array);
                    //print_r($values_array);

                    for($i=0; $i < count($labels_array)-1; $i++){
                        echo "<tr>";
                        echo '<td class="c-table__links">'.$labels_array[$i].'</td>';
                        echo '<td class="c-table__rechts">'.$values_array[$i].'</td>';
                        echo "</tr>";
                    }
                    } ?>
          </table>
        </div>
        <?php if($categorie == "elektrische-fiets"){?>
        <div>    
          <table class="c-table2">
            <th>Accu</th>
            <tr>
              <td class="c-table__links">Standaard accu capaciteit</td>
              <td class="c-table__rechts"><?php echo get_post_meta($post->ID, 'standaard_accu_capaciteit', true) ?></td>
            </tr>
            <tr>
              <td class="c-table__links">Uitneembare accu</td>
              <td class="c-table__rechts"><?php echo get_post_meta($post->ID, 'uitneembare_accu', true) ?></td>
            </tr>
            <tr>
              <td class="c-table__links">Accu positie</td>
              <td class="c-table__rechts"><?php echo get_post_meta($post->ID, 'accu_positie', true) ?></td>
            </tr>
            <tr>
              <td class="c-table__links">Type accu</td>
              <td class="c-table__rechts"><?php echo get_post_meta($post->ID, 'type_accu', true) ?></td>
            </tr>
            <tr>
              <td class="c-table__links">Laadtijd tot volle accu</td>
              <td class="c-table__rechts"><?php echo get_post_meta($post->ID, 'laadtijd_accu', true) ?></td>
            </tr>
            <tr>
              <td class="c-table__links">Accu keuze mogelijk</td>
              <td class="c-table__rechts"><?php echo get_post_meta($post->ID, 'accu_keuze', true) ?></td>
            </tr>
            <tr>
              <td class="c-table__links">Accu laden in fiets</td>
              <td class="c-table__rechts"><?php echo get_post_meta($post->ID, 'accu_laden_in_fiets', true) ?></td>
            </tr>
          </table>
        </div>
        <?php } ?>
      </div>
    </div>
  </section>
  <section class="container-fluid c-gerelateerdefietsen">
    <div class="row">
      <?php echo do_shortcode('[related_products per_page=3]')?>
    </div>
    </section>
</div>
</body>
<?php get_footer( ) ?>