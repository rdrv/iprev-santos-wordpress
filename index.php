<?php get_header(); ?>
    
    <h1>Home</h1>

    <?php
        $args = array( 
            'post_type' => 'noticias',
            'posts_per_page' => '3',
            'tax_query' => array(
                array(
                    'taxonomy' => 'filtro',
                    'field' => 'slug',
                    'terms' => 'home'
                ),
            ),
        );
        $loop = new WP_Query( $args ); 
        if( $loop->have_posts() ) {
            while( $loop->have_posts() ) {
                $loop->the_post();
    ?>
    <a href ="<?php the_permalink() ?>">
        <?php the_post_thumbnail(); ?>
        <h2><?php the_title(); ?></h2>
        <p><?php the_content(); ?></p>
    </a>
    <?php
            } 
        }
    ?>

<?php get_footer(); ?>
