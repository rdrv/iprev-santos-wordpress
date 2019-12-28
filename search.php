<?php
    $css_lib_especifico = array('ligne_paginatejs/css/paginate', 'ligne_paginatejs/css/ligne');
    $js_lib_especifico = array('ligne_paginatejs/js/paginate');
    $css_especifico = array('noticias');   
    require_once('header.php');
?>

<h2>Resultados para: <strong><?= $_GET['s']; ?></strong></h2>

<?php if( have_posts() ) { ?>
    
    <div class="input-group hide">
        <label for="searchBox">Filtrar</label>
        <input type="search" id="searchBox" placeholder="Filtrar...">
    </div>
        
    <table class="lista-noticias">
        
        <?php while( have_posts() ) {
                the_post(); ?>
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
                <strong>Data: </strong>
                <span><?php echo get_the_date(); ?></span>
            </td>
            <?php if(get_post_type() === 'noticias') { ?>
            <td>
                <strong>Tipo: </strong>
                <span>Notícia</span>
            </td>
            <td>
                <strong>Tags: </strong>
                <span class="taxonomies"><?php the_taxonomies(); ?></span>
            </td>
            <?php } else { ?>
            <td>
                <strong>Tipo: </strong>
                <span>Página</span>
            </td>
            <?php } ?>
        </tr>

        <?php } ?>

    </table>

<?php } 
    else { ?>

    <p>nada encontrado.</p>

<?php } ?>

<?php
    $js_lib_especifica = array('ligne_paginatejs/js/init');
    $js_especifico = array('taxonomy');
    require_once('footer.php');
?>