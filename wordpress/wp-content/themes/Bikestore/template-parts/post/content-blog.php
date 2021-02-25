



        
        
        <!-- bericht 1 -->
        <div class="c-blogoverzicht__bericht row offset-1">
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
                > Door <?php echo $value_auteur = get_post_meta($post->ID, '_auteur_blog', true); ?> , <?php the_time('j/m/y') ?> </small
              >
            </div>

            <div>
              <a href="<?php echo wp_get_shortlink( ) ?>"
                ><button class="o-button c-blogoverzicht__button">
                  Meer
                </button></a>
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
