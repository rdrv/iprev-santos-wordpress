<?php
    $css_especifico = array('single');
    require_once('header.php');
?>

<?php 

    if( have_posts() ) {
        while( have_posts() ) {
            the_post();
?>

<div class="single-img">
    <?php the_post_thumbnail(); ?>
</div>
<div class="container">
    <h1>
        <?php the_title(); ?>
    </h1>
    <?php the_content(); ?>
    <?php the_date(); ?>
</div>

<?php
    }
}
?>

<?php
    require_once('footer.php');
?>