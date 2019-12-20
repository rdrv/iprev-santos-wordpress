<form action="<?= home_url('/noticias') ?>" method="get">
    <button type="submit" name="filtro" value="oi">Filtro</button>
    <button type="submit" name="filtro" value="oi2">Filtro</button>
</form>

<?php

                  $args = array( 
                      'post_type' => 'noticias',
                      'posts_per_page' => '3',
                      'tax_query' => array(
                          array(
                              'taxonomy' => 'filtro',
                              'field' => 'slug',
                              'terms' => 'destaques'
                          ),
                      ),
                  );
                  $loop = new WP_Query( $args ); 
                  if( $loop->have_posts() ) {
                      while( $loop->have_posts() ) {
                          $loop->the_post();
          ?>
                <?php the_title(); ?>
                <?php the_content(); ?>

          <?php 
                      }
                    }
          ?>

<?php wp_pagenavi( array( 'query' => $loop ) ); ?>