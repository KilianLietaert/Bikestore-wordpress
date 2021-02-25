<?php get_header( )?>


<section class="c-blogoverzicht">
      <div class="row">
        <!-- bericht 1 -->
        <div class="c-blogoverzicht__bericht row offset-1">

        <?php
 
            $arg = array(
            'post_type' => array('blog'),
            'nopaging' => false,
            'posts_per_page' => '5',
            'order' => 'ASC',
            'orderby' => 'date'
            );
            
            $query = new WP_Query($arg);
            
            if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post();
            get_template_part('template-parts/post/content', 'blog');
            endwhile;
            endif;
            wp_reset_query();
            
          ?>
          <div class="c-blogoverzicht__lijn">
            <div class="circle"></div>
            <div class="circle"></div>
            <div class="circle"></div>
          </div>
          <div class="column">
            <div class="c-blogoverzicht__berichtinfo">
              <p class="c-blogoverzicht__berichtinfo--p">
              <?php echo get_the_title(  ) ?>
              </p>
              <small class="c-blogoverzicht__berichtinfo--small"
                >Door <?php the_author();?> , <?php the_time('j/m/y') ?></small
              >
            </div>
            <div>
              <a href="<?php echo wp_get_shortlink_url( ) ?>"
                ><button class="o-button c-blogoverzicht__button">
                  Meer
                </button></a
              >
            </div>
          </div> 
        </div>
       
        <!-- <div class="c-blogoverzicht__bericht row offset-1">
          <a href="#"
            ><button class="o-button c-blogoverzicht__button2">
              Lees meer <i class="fas fa-chevron-right"></i></button
          ></a>
        </div> -->
      </div>
    </section>

    <?php get_footer() ?>