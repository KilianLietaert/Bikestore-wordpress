<?php

get_header( 'shop' );
?>

<main class="container-fluid">
    <div class="row">
        <div class="offset-lg-2">
            <h2 class="c-webshopfietsen-titel">Elektrische fietsen</h2>
            <p class="c-webshopfietsen-resultaten"><span>65</span> resultaten</p>
        </div>
    </div>
    <div class="row justify-content-center">
        <aside class="col-lg-2">
          <form class="c-filter">
            <section class="c-filter-section">
            <h3 class="c-filter-section__titel">Merk</h3>
            <label class="c-filter-container">Brinckers
              <input type="checkbox" id="brinckers" name="brinckers" value="brinckers">
              <span class="c-filter-container__checkmark"></span>
            </label>
            <label class="c-filter-container">Cortina e-common
              <input type="checkbox" id="cortinaecommon" name="cortinaecommon" value="cortinaecommon">
              <span class="c-filter-container__checkmark"></span>
            </label>
            <label class="c-filter-container">Cube-kathmandu
              <input type="checkbox" id="cubekathmandu" name="cubekathmandu" value="cubekathmandu">
              <span class="c-filter-container__checkmark"></span>
            </label>
            <label class="c-filter-container">Giant-triple-x
              <input type="checkbox" id="gianttriplex" name="gianttriplex" value="gianttriplex">
              <span class="c-filter-container__checkmark"></span>
            </label>
            <label class="c-filter-container">Moustache
              <input type="checkbox" id="moustache" name="moustache" value="moustache">
              <span class="c-filter-container__checkmark"></span>
            </label>
          </section>
          <section class="c-filter-section">
            <h3 class="c-filter-section__titel">Frametype</h3>
            <label class="c-filter-container">Heren
              <input type="checkbox" id="heren" name="heren" value="heren">
              <span class="c-filter-container__checkmark"></span>
            </label>
            <label class="c-filter-container">Dames
              <input type="checkbox" id="dames" name="dames" value="dames">
              <span class="c-filter-container__checkmark"></span>
            </label>
          </section>
          <section class="c-filter-section">
            <h3 class="c-filter-section__titel">Accu capaciteit (Wh)</h3>
            <label class="c-filter-container">300 Wh
              <input type="checkbox" id="300" name="300" value="300">
              <span class="c-filter-container__checkmark"></span>
            </label>
            <label class="c-filter-container">400 Wh
              <input type="checkbox" id="400" name="400" value="400">
              <span class="c-filter-container__checkmark"></span>
            </label>
            <label class="c-filter-container">450 Wh
              <input type="checkbox" id="450" name="450" value="450">
              <span class="c-filter-container__checkmark"></span>
            </label>
            <label class="c-filter-container">500 Wh
              <input type="checkbox" id="500" name="500" value="500">
              <span class="c-filter-container__checkmark"></span>
            </label>
            <label class="c-filter-container">625 Wh
              <input type="checkbox" id="625" name="625" value="625">
              <span class="c-filter-container__checkmark"></span>
            </label>
          </section>
          <section class="c-filter-section">
            <h3 class="c-filter-section__titel">Aantal versnellingen</h3>
            <label class="c-filter-container">7
              <input type="checkbox" id="7" name="7" value="7">
              <span class="c-filter-container__checkmark"></span>
            </label>
            <label class="c-filter-container">10
              <input type="checkbox" id="10" name="10" value="10">
              <span class="c-filter-container__checkmark"></span>
            </label>
            <label class="c-filter-container">Traploos
              <input type="checkbox" id="traploos" name="traploos" value="traploos">
              <span class="c-filter-container__checkmark"></span>
            </label>
          </section>
          <section class="c-filter-section">
            <h3 class="c-filter-section__titel">Prijs</h3>
            <div class="c-filter-section__pricerange">
              <input type="number" id="7" name="7" placeholder="€500">
              <span>-</span>
              <input type="number" id="10" name="10" placeholder="€5000">
            </div>
          </section>
          <section class="c-filter-section">
          <h3 class="c-filter-section__titel">Kleur</h3>
          <div class="c-filter-section-flexbox">
            <label class="c-filter-section-color">
              <input type="checkbox" name="traploos" value="traploos">
              <span class="c-filter-section-color-checkbox c-filter-section-color-checkbox__black"></span>
            </label>
            <label class="c-filter-section-color">
              <input type="checkbox" name="traploos" value="traploos">
              <span class="c-filter-section-color-checkbox c-filter-section-color-checkbox__darkgreenblue"></span>
            </label>
            <label class="c-filter-section-color">
              <input type="checkbox" name="traploos" value="traploos">
              <span class="c-filter-section-color-checkbox c-filter-section-color-checkbox__greenblue"></span>
            </label>
            <label class="c-filter-section-color">
              <input type="checkbox" name="traploos" value="traploos">
              <span class="c-filter-section-color-checkbox c-filter-section-color-checkbox__gray"></span>
            </label>
            <label class="c-filter-section-color">
              <input type="checkbox" name="traploos" value="traploos">
              <span class="c-filter-section-color-checkbox c-filter-section-color-checkbox__lightgray"></span>
            </label>
            <label class="c-filter-section-color">
              <input type="checkbox" name="traploos" value="traploos">
              <span class="c-filter-section-color-checkbox c-filter-section-color-checkbox__white"></span>
            </label>
            <label class="c-filter-section-color">
              <input type="checkbox" name="traploos" value="traploos">
              <span class="c-filter-section-color-checkbox c-filter-section-color-checkbox__darkblue"></span>
            </label>
            <label class="c-filter-section-color">
              <input type="checkbox" name="traploos" value="traploos">
              <span class="c-filter-section-color-checkbox c-filter-section-color-checkbox__blue"></span>
            </label>
            <label class="c-filter-section-color">
              <input type="checkbox" name="traploos" value="traploos">
              <span class="c-filter-section-color-checkbox c-filter-section-color-checkbox__green"></span>
            </label>
            <label class="c-filter-section-color">
              <input type="checkbox" name="traploos" value="traploos">
              <span class="c-filter-section-color-checkbox c-filter-section-color-checkbox__red"></span>
            </label>
            <label class="c-filter-section-color">
              <input type="checkbox" name="traploos" value="traploos">
              <span class="c-filter-section-color-checkbox c-filter-section-color-checkbox__brown"></span>
            </label>
            <label class="c-filter-section-color">
              <input type="checkbox" name="traploos" value="traploos">
              <span class="c-filter-section-color-checkbox c-filter-section-color-checkbox__allcolors"></span>
            </label>
          </div>
          </section>
          <input type="submit" class="o-button" value="Filteren">
          </form>
        </aside>
        <div class="col-lg-9">
            <?php echo do_shortcode( '[product_category category="elektrische-fiets"]' ) ?>
        </div>
    </div>
</main>

<?php
get_footer( 'shop' );
?>