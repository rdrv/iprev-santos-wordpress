<?php 
    require_once('header.php');
?>

    <?php
          $args = array( 
            'post_type' => 'metricas'
          );
            $loop = new WP_Query( $args ); 
            if( $loop->have_posts() ) {
              while( $loop->have_posts() ) {
                $loop->the_post();
                $metrica_meta_data = get_post_meta( $post->ID )
          ?>
          
            <?php the_post_thumbnail('full', array('class'=>'desempenho-servicos-img')) ?>
            <strong>
              <?= $metrica_meta_data['metrica'][0]; ?>
            </strong>
            <p>
              <?php the_title() ?>
            </p>
          <?php } 
            }
          ?>

<?php  
    require_once('footer.php');
?>