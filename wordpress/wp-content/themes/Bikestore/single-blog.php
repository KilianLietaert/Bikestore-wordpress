<?php get_header( )?>

<section class="c-blog__hoofdfoto">
  <div class="container">

      <div class="container c-blog__container">
        <img
          class="c-blog__image"
          src="<?php the_post_thumbnail_url(); ?>"
          alt=""
        />
      </div>
  </div>
    </section>
    <div class="container">

    <div class="c-titel__blogdetail offset-lg-2 row">
      <h1 class="c-titel__blogdetail--h1">
      <?php echo get_the_title(  ) ?>
      </h1>
      <p class="c-titel__blogdetail--p offset-lg-2">
      Door <?php echo $value_auteur = get_post_meta($post->ID, '_auteur_blog', true); ?> , <?php the_time('j/m/y') ?> 
      </p>
    </div>
    </div>


    <section class="c-blogdetail">    
      <div class="container">
        <div class="c-blogdetail__div1 offset-lg-2">
        <?php the_content() ?>      
      </div>

    </section>

    <?php get_footer() ?>