<?php
    $css_especifico = array('home', 'noticias');    
    require_once('header.php');
?>

<?php 

    if( have_posts() ) {
        while( have_posts() ) {
            the_post();
?>

    <?php the_title(); ?>
    <?php the_content(); ?>

    <?php if(is_page('noticias')) { 
        require_once('noticias.php');
     } ?>

<?php
    }
}
?>

<?php
    $lib_especifica = array('swiper/js/swiper.min.js');  
    $js_especifico = array('home');  
    require_once('footer.php');
?>