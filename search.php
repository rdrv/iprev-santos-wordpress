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
    <?= the_excerpt()?>
    
    <?php if(get_post_type() === 'noticias') { ?>
        <strong>Tipo: </strong>
        <span>Notícia</span>
        <br>
        <strong>Tags: </strong>
        <span class="taxonomies"><?php the_taxonomies(); ?></span>
    <?php } else { ?>
        <strong>Tipo: </strong>
        <span>Página</span>
        <?php } ?>
        <br>
        <strong>Data: </strong>
        <span><?php echo get_the_date(); ?></span>
<?php
    }
} else { ?>

    <p>nada encontrado.</p>

<?php } ?>

<br>

<?php wp_pagenavi(); ?>

<?php 
    $js_especifico = array('search');  
    require_once('footer.php');
?>