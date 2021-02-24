<?php get_header( )?>

<section class="c-blog__hoofdfoto">
      <div class="container c-blog__container">
        <img
          class="c-blog__image"
          src="img/cropped-shot-male-hand-black-glove-pressing-button-with-index-finger-control-panel-electirc-bike-biker-switching-speed-mode-before-riding-his-motor-powered-booster-bicycle-uphill.jpg"
          alt=""
        />
      </div>
    </section>

    <div class="c-titel__blogdetail offset-lg-2 row">
      <h1 class="c-titel__blogdetail--h1">
      <?php echo get_the_title(  ) ?>
      </h1>
      <p class="c-titel__blogdetail--p offset-lg-2">
      <?php $value_auteur = get_post_meta($post->ID, '_auteur_blog', true); $value_datum = get_post_meta($post->ID, '_datum_blog', true); ?>
      </p>
    </div>

    <section class="c-blogdetail">
      <div class="c-blogdetail__div1 offset-lg-2">
        <p class="c-blogdetail__div1--p">
          <?php the_content( ) ?>
        </p>
        <br />
        <!-- <p class="c-blogdetail__div1--p">
          Bij Bikestore staat veiligheid hoog in het vaandel. Eén van de meest
          voorkomende vragen over e-bikes is hoe je de accu het beste kunt
          gebruiken. Het antwoord: zoals elke andere accu of krachtige batterij,
          dus met de nodige voorzichtigheid.
        </p>
        <br />
        <p class="c-blogdetail__div1--p">
          Het is goed om te weten dat de accu’s van Bikestore voldoen aan de
          hoogste standaarden en worden getest volgens strenge Europese normen.
          Ze hebben alle wettelijke certificaten en zijn beschermd tegen
          overbelasting, kortsluiting, piekspanning en wisselende temperaturen.
        </p>
      </div>
      <div class="c-blogdetail__div2 offset-lg-2">
        <h2 class="c-blogdetail__div2--h2">
          Tips bij het gebruik van e-bike accu's
        </h2>
        <p class="c-blogdetail__div2--p">
          Desondanks bestaat er altijd een kans dat je accu defect raakt, met in
          het ergste geval ontbranding tot gevolg. De oorzaak van ontbranding
          ligt meestal in verkeerd gebruik, beschadigingen of gebruik van de
          verkeerde oplader. Met inachtneming van de onderstaande 5 tips houd je
          de kans op ongelukken zo klein mogelijk.
        </p> -->
      </div>

      <!-- <div class="row c-blogdetail__div3 ">
        <div class="c-blogdetail__lijn offset-lg-1">
          <div class="circle-d circle-d1">1</div>
          <div class="circle-d circle-d2">2</div>
          <div class="circle-d circle-d3">3</div>
          <div class="circle-d circle-d4">4</div>
          <div class="circle-d circle-d5">5</div>
        </div>
        <div class="offset-lg-2 c-blogdetail__div3--p"> 
          <p class="">
            <strong> Volg het laadadvies</strong> <br>
            Houd altijd zicht op de accu wanneer deze aan de oplader ligt. De
            hele nacht opladen raden we af! Laad de accu van je e-bike altijd op
            in een droge omgeving, bij voorkeur in een ruimte die voorzien is
            van een rookmelder. Een omgevingstemperatuur tussen 10 en 25 graden
            Celsius is ideaal. Handleiding kwijt? Neem dan contact met ons op,
            we sturen je graag een nieuwe.
          </p>
          <br />
          <p>
            <strong>
              Parkeer je e-bike in de zomer in de schaduw en niet in de felle
              zon</strong
            > <br>
            Leg de accu niet in direct zonlicht of op de verwarming. Een droge
            omgeving met een temperatuur tussen 10 en 25 graden is het beste.
            Bewaar de accu in de winter in een vorstvrije omgeving.
          </p>
          <br />
          <p>
            <strong>
              Gebruik alleen deze originele oplader met de bijgeleverde
              snoeren</strong
            ><br>
            Iedere Bikestore e-bike wordt geleverd met een originele
            gecertificeerde accu en oplader. Is je oplader beschadigd? Neem dan
            gewoon contact met ons op, dan zorgen wij voor een nieuwe. Gebruik
            nooit een oplader van een ander merk of type e-bike.
          </p>
          <br />
          <p>
            <strong> Is je accu of je e-bike gevallen? </strong> <br>
            Valschade kan je accu inwendig beschadigen, ook zonder zichtbare
            beschadigingen. Probeer de accu na een val niet meer op te laden,
            maar laat ‘m zo snel mogelijk door een specialist nakijken. Probeer
            de accu nooit zelf open te maken of te repareren. Ondeskundig
            gebruik is zeer gevaarlijk.
          </p>
          <br />
          <p>
            <strong> Controleer de accu regelmatig op beschadigingen</strong> <br>
            Merk je iets bijzonders aan je accu, zoals lekkage, een sterke geur,
            overmatige hitte, rook of vonken tijdens het opladen? Haal dan de
            accu direct van de stroom af. Leg de accu buiten, uit de buurt van
            brandbare materialen. Let hierbij goed op je eigen veiligheid! Neem
            bij ontbranding direct contact op met 112 en zeg hierbij dat het om
            een e-bike accu gaat. Informeer ons zodra de situatie veilig is.
          </p>
        </div>
        </div>
      </div> -->
    </section>


    <?php get_footer() ?>