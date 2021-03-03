<?php get_header( )?>

<section class="c-blog__hoofdfoto">
      <div class="container c-blog__container">
        <img
          class="c-blog__image"
          src="<?php the_post_thumbnail_url(); ?>"
          alt=""
        />
        <div class="centered c-blog__titel">
          <h1 class="c-blog__titel--h1"><?php echo $value_titel1 = get_post_meta($post->ID, '_titel1_blog', true); ?></h1>
        </div>
      </div>
    </section>

    <div class="c-titel__blog">
      <h1 class="c-titel__blog--h1"><?php echo $value_titel2 = get_post_meta($post->ID, '_titel2_blog', true); ?></h1>
    </div>

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