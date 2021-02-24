<?php get_header(  ) ?>

<body>
  <!-- banner met tekst en button -->
  <section>
    <div class="c-bannerhome">
      <div class="container ">
        <div class="row justify-content-center">
          <div class="c-bannerhome__content ">
            <div class="c-bannerhome__deel1">
              <h1 class="c-bannerhome__hoofd--h1"><?php echo $value_home_title_banner = get_post_meta($post->ID, '_home_title_banner', true); ?></h1>
              <h1 class="c-bannerhome__h1"><?php echo $value_home_subtitle_banner = get_post_meta($post->ID, '_home_subtitle_banner', true); ?></h1>
            </div>
            <div class="c-bannerhome__deel2">
              <h1 class="c-bannerhome__h1 c-bannerhome__h1--onder">
              <?php echo $value_home_subtitle2_banner = get_post_meta($post->ID, '_home_subtitle2_banner', true); ?>
              </h1>
              <a href="#"><button class="o-button c-bannerhome__button">
              <?php echo $value_home_knop_banner = get_post_meta($post->ID, '_home_knop_banner', true); ?>
                </button></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
    <div class="nb-usp-container">  
      <div class="container">
      <div class="nb-usp-content">
        <ul class="nb-usp-content-row row">
          <li class="c-usp__tekst col-xl-3 col-lg-6 col-md-6 col-sm-12">
            <img class="c-usp__vink" src="<?php echo get_stylesheet_directory_uri() . '/img/check.svg'; ?>" alt="" />Garantie tot 5
            jaar
          </li>
          <li class="c-usp__tekst col-xl-3 col-lg-6 col-md-6 col-sm-12">
            <img class="c-usp__vink" src="<?php echo get_stylesheet_directory_uri() . '/img/check.svg'; ?>" alt="" />Service op
            locatie
          </li>
          <li class="c-usp__tekst col-xl-3 col-lg-6 col-md-6 col-sm-12">
            <img class="c-usp__vink" src="<?php echo get_stylesheet_directory_uri() . '/img/check.svg'; ?>" alt="" />Proefrit aan
            huis
          </li>
          <li class="c-usp__tekst col-xl-3 col-lg-6 col-md-6 col-sm-12">
            <img class="c-usp__vink" src="<?php echo get_stylesheet_directory_uri() . '/img/check.svg'; ?>" alt="" />Levertijd 5
            dagen
          </li>
        </ul>
      </div>
    </div>
  </div>

    <div class="container">
  <section class="c-uitleg row">
      <div class="c-uitleg__tekst col-xl-6 col-lg-12 col-md-12 col-sm-12">
        <h1 class="c-uitleg__h1">De elektrische fiets met advies op maat</h1>
        <p class="c-uitleg__p">
          Elektrische fietsen zie je overal rondrijden. Het internet staat vol
          met artikels en meningen over deze fietsen. Bij Bikestore willen we
          jou vooral laten <strong> ervaren hoe onze fietsen zijn.</strong>
          <br />
          <br />
          <strong>
            Persoonlijke aanpak en uitmuntende service zijn voor ons heel
            belangrijk.</strong>
          <br />
          <br />
          Voor onze fietsen gebruiken wij enkel de beste onderdelen die er op de
          fietsenmarkt te vinden zijn. Dat garanderen we. Samen met jou kiezen
          we nadien nog enkele accessoires uit en jij hebt de fiets die volledig
          bij jou past.
        </p>
        <a href="#"><button class="o-button c-uitleg__button">
            Aanbod van elektrische fietsen
          </button></a>
      </div>
      <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
        <img class="c-uitleg__img" src="<?php echo get_stylesheet_directory_uri() . '/img/family-background-evening-sport-bike.jpg'; ?>" alt="family-background-evening-sport-bike" />
        
      </div>
  </section>
    </div>

  <section>
    <div class="c-image__fixed"></div>
  </section>

  <section class="c-uitproberen ">
    <div class="container">
      <div class="row justify-content-center">
    <div class="c-uitproberen__tekst col-xl-8 col-lg-10 col-md-10 col-sm-10">
      <h1 class="c-uitproberen__h1">Een e-bike uitproberen?</h1>
      <p class="c-uitproberen__p">
        Met een
        <strong class="c-uitproberen__strong"> gratis proefrit </strong> aan
        huis of op locatie naar keuze laten we je het elektrische fietsen echt
        ervaren. <br />
        Tijdens ons bezoek begeleiden we jou bij de keuze van de fiets die
        perfect bij jou past. We leggen je alles heel goed uit zodat jouw
        e-bike snel jouw beste vriend wordt.
      </p>
      <a href="#"><button class="o-button c-uitproberen__button">
          Boek je proefrit
        </button></a>
    </div>
  </div>
  </div>
  </section>
<div class="container">
  <section class="c-repair">
    <div class="c-repair__inhoud row justify-content-center">
      <div class="c-repair__1 col-xl-6 col-lg-12 col-md-12 col-sm-12">
        <img class="c-repair__img" src="<?php echo get_stylesheet_directory_uri() . '/img/mechanic-repairing-bicycle.jpg'; ?>" alt="" />
      </div>
      <div class="c-repair__2 col-xl-5 col-lg-12 col-md-12 col-sm-12">
        <h1 class="c-repair__h1">
          Een elektrische fiets van Bikestore dat is vooral heel veel service
        </h1>
        <p class="c-repair__p">
          Ook na je aankoop kan je rekenen op de service die je geniet zoals
          bij een lokale fietsenwinkel. <br />
          <br />
          En zelfs meer.
          <br />
          <br />
          Met onze mobiele servicewagens bieden we all-inservice aan huis voor
          levering, onderhoud, herstelling en pechverhelping. Jij hoeft dus
          alleen maar zorgeloos te genieten en te trappen. Want ja, ook met
          een elektrische fiets moet je blijven trappen.
        </p>
      </div>
    </div>
  </section>
  </div>
<div class="container ">
  <section class="c-brochure row justify-content-center">
    <div class="c-brochure__inhoud col-xl-6 col-lg-10 col-md-12 col-sm-12">
      <h1 class="c-brochure__h1">Onze brochure</h1>
      <p class="c-brochure__p">
        Vraag hier onze gratis brochure aan en lees meer over onze unieke
        dienst, servicepakketten en prijzen.
        <br />
        Wil je ook genieten van 1 jaar gratis onderhoud en pechverhelping?
        <br />
        Ontdek het snel…
      </p>
      <a href="#"><button class="o-button c-brochure__button">
          Vraag de gratis brochure aan
        </button></a>
    </div>
  </section>
</div>


<?php get_footer() ?>