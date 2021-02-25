<?php get_header( )?>


<section class="c-blogoverzicht">
      <div class="row">

        <?php
 
            $arg = array(
            'post_type' => array('blog'),
            'nopaging' => false,
            'posts_per_page' => '5',
            'order' => 'DESC',
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