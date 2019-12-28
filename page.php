<?php 

    if( have_posts() ) {
        while( have_posts() ) {
            the_post();
?>

    <?php
        if(is_page('noticias')) { 
            require_once('noticias.php');
        }
    ?>

    <?php
        if(is_page('metricas')) { 
            require_once('metricas.php');
        }
    ?>

<?php
    }
}
?>