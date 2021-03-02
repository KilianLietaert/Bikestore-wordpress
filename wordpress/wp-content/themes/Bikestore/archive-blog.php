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
    </section>

    <?php get_footer() ?>