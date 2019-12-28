<?php
    $css_lib_especifico = array('ligne_paginatejs/css/paginate', 'ligne_paginatejs/css/ligne');
    $js_lib_especifico = array('ligne_paginatejs/js/paginate');
    $css_especifico = array('noticias');   
    require_once('header.php');
?>

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
                <h2>
                    <a href="<?php the_permalink() ?>">
                        <?= the_title()?>
                    </a>
                </h2>
            </td>
            <td>
                <?= the_excerpt()?>
            </td>
            <td>
                <strong>Data: </strong>
                <span><?php echo get_the_date(); ?></span>
            </td>
        </tr>

        <?php } ?>

    </table>

<?php }  ?>

<?php
    $js_lib_especifica = array('ligne_paginatejs/js/init');
    $js_especifico = array('taxonomy');
    require_once('footer.php');
?>