<?php
    $css_lib_especifico = array('ligne_paginatejs/css/paginate', 'ligne_paginatejs/css/ligne');
    $js_lib_especifico = array('ligne_paginatejs/js/paginate');
    $css_especifico = array('noticias');   
    require_once('header.php');
?>

<?php the_title(); ?>
<?php the_content(); ?>

<?php $filtros = get_terms('filtro'); ?>

<form class="form-filtrar-noticias" action="<?= home_url('/noticias') ?>" method="get">
    <button id="todas" class="botao-filtrar-noticias" type="submit">Todas</button>
    <?php foreach($filtros as $filtro) { ?>
        <button id="<?= $filtro->slug; ?>" class="botao-filtrar-noticias" type="submit" name="filtro" value="<?= $filtro->slug; ?>">
            <?= $filtro->name; ?>
        </button>
    <?php } ?>
</form>

<small class="hidden-info hide"><?= $_GET['filtro'] ?></small>

<div class="input-group hide">
    <label for="searchBox">Filtrar</label>
    <input type="search" id="searchBox" placeholder="Filtrar...">
</div>

<table class="lista-noticias">

    <?php

            $existeBusca = array_key_exists('filtro', $_GET);

            if($existeBusca && $_GET['filtro'] === '') {
                wp_redirect( home_url('/noticias') );
            }

            if($existeBusca) {
                $taxQuery = array(
                    array(
                        'taxonomy' => 'filtro',
                        'field' => 'slug',
                        'terms' => $_GET['filtro']
                    ),
                );
            }

            $args = array( 
                'post_type' => 'noticias',
                'tax_query' => $taxQuery
            );

            $loop = new WP_Query( $args ); 
            if( $loop->have_posts() ) {
                while( $loop->have_posts() ) {
                    $loop->the_post();
    ?>
        <tr class="lista-noticias-item">
            <td>
                <h3>
                    <a href="<?php the_permalink() ?>">
                        <?= the_title()?>
                    </a>
                </h3>
            </td>
            <td>
                <?= the_excerpt()?>
            </td>
            <td>
                <strong>Tags: </strong>
                <span class="taxonomies"><?php the_taxonomies(); ?></span>
            </td>
            <td>
                <strong>Data: </strong>
                <span><?php echo get_the_date(); ?></span>
            </td>
        </tr>

    <?php 
        }
    }
    ?>

</table>

<?php
    $js_lib_especifica = array('ligne_paginatejs/js/init');
    $js_especifico = array('taxonomy', 'noticias');
    require_once('footer.php');
?>

