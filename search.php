<?php
    $css_especifico = array('home', 'noticias');    
    require_once('header.php');
?>

<?php

    if( have_posts() ) {
        while( have_posts() ) {
            the_post();
?>
    <h2><?= the_title()?></h2>
    <?php the_excerpt()?>
    
    <?php if(get_post_type() === 'noticias') { ?>
        <strong>Tags: </strong>    
    <?php } the_taxonomies(); ?>
    <br>

    <strong>Data: </strong>
    <span><?php echo get_the_date(); ?></span>

<?php
    }
}
?>
<br>
<?php wp_pagenavi(); ?>

<?php
    $lib_especifica = array('swiper/js/swiper.min.js');  
    $js_especifico = array('home');  
    require_once('footer.php');
?>