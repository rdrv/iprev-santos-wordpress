<?php 

// theme supports

add_theme_support('post-thumbnails');
add_theme_support('html5', array('search-form'));

// create/register menu

function habilita_menu() {
    register_nav_menu('menu-principal', 'main-menu');
}

add_action('init', 'habilita_menu');

// create dynamic title of page

function title_dinamico() {
    
    bloginfo('name');

    if(!is_home() && is_page('search')) {
      echo(' | ');
      the_title();
    }
    
}

// post type noticias - create/register custom post type

function post_type_noticias() {

    $nomeSingular = 'Notícia';
    $nomePlural = 'Notícias';
    $imagemPrincipal = 'Imagem Principal';
    $description = 'Notícias do IPREV Santos';
    
    $labels = array(
        'name' => $nomePlural,
        'name_singular' => $nomeSingular,
        'add_new' => 'Adicionar nova',
        'add_new_item' => 'Adicionar nova ' . $nomeSingular,
        'edit_item' => 'Editar ' . $nomeSingular,
        'featured_image' => $imagemPrincipal,
        'set_featured_image' => 'Definir ' . $imagemPrincipal,
        'remove_featured_image' => 'Remover ' . $imagemPrincipal,
        'use_featured_image' => 'Usar esta ' . $imagemPrincipal,
        'search_items' => 'Pesquisar',
        'view_item' => 'Ver ' . $nomeSingular,
        'view_items' => 'Ver ' . $nomePlural,
        'item_published' => $nomeSingular . ' Publicada'
    );

    $supports = array(
        'title',
        'editor',
        'excerpt',
        'thumbnail',
    );
    
    $args = array(
        'labels' => $labels,
        'public' => true,
        'description' => $description,
        'menu_icon' => 'dashicons-format-quote',
        'supports' => $supports,
        'show_in_rest' => true
    );

    register_post_type('noticias', $args);

}

add_action('init', 'post_type_noticias');

// post type noticias - create/register taxonomy

function registra_filtro() {
    $nomePlural = 'Filtros';
    $nomeSingular = 'Filtro';
    
    $labels = array(
        'name' => $nomePlural,
        'singular_name' => $nomeSingular,
        'edit_item' => 'Editar ' . $nomeSingular,
        'add_new_item' => 'Adicionar novo ' . $nomeSingular,
        'search_items' => 'Pesquisar ' . $nomePlural
    );
    
    $args = array(
        'labels' => $labels,
        'public' => true,
        'hierarchical' => true,
        'show_admin_column' => true,
        'show_in_rest' => true
    );
    
    register_taxonomy('filtro', 'noticias', $args);
}

add_action('init', 'registra_filtro');

// post type noticias - return post thumbnail url in api 

function get_post_meta_for_api( $object ) {

    $more_post_meta['image_url'] = get_the_post_thumbnail_url( $object['id'], 'large' );    

    return $more_post_meta;
}

function create_api_posts_meta_field() {
 
    register_rest_field( 'noticias', 'main_image', array(
       'get_callback'    => 'get_post_meta_for_api',
       'schema'          => null,
    	)
	);

}

add_action( 'rest_api_init', 'create_api_posts_meta_field' );

// post type noticias - return post taxonomy in api 

function get_post_taxonomy_for_api( $object ) {

    $more_post_taxonomy['taxonomy_names'] = wp_get_object_terms( $object['id'], 'filtro');

    return $more_post_taxonomy;
}

function create_api_posts_taxonomy_field() {
 
    register_rest_field( 'noticias', 'taxonomy', array(
       'get_callback'    => 'get_post_taxonomy_for_api',
       'schema'          => null,
    	)
	);

}

add_action( 'rest_api_init', 'create_api_posts_taxonomy_field' );

// post type metricas - create/register custom post type

function post_type_metricas() {

    $nomeSingular = 'Métrica';
    $nomePlural = 'Métricas';
    $imagemPrincipal = 'Imagem Principal';
    $description = 'Métricas do IPREV Santos';
    
    $labels = array(
        'name' => $nomePlural,
        'name_singular' => $nomeSingular,
        'add_new' => 'Adicionar nova',
        'add_new_item' => 'Adicionar nova ' . $nomeSingular,
        'edit_item' => 'Editar ' . $nomeSingular,
        'featured_image' => $imagemPrincipal,
        'set_featured_image' => 'Definir ' . $imagemPrincipal,
        'remove_featured_image' => 'Remover ' . $imagemPrincipal,
        'use_featured_image' => 'Usar esta ' . $imagemPrincipal,
        'search_items' => 'Pesquisar',
        'view_item' => 'Ver ' . $nomeSingular,
        'view_items' => 'Ver ' . $nomePlural,
        'item_published' => $nomeSingular . ' Publicada'
    );

    $supports = array(
        'title',
        'thumbnail',
    );
    
    $args = array(
        'labels' => $labels,
        'public' => true,
        'description' => $description,
        'menu_icon' => 'dashicons-performance',
        'supports' => $supports,
        'exclude_from_search' => true
    );

    register_post_type('metricas', $args);

}

add_action('init', 'post_type_metricas');

// post type metricas - create/register meta_boxes

function html_input_metrica( $post ) { 
    $post_meta_data = get_post_meta( $post->ID );    
?>
    <div>
        <input type="text" id="metrica" class="metrica" name="metrica"
        value="<?= $post_meta_data['metrica'][0]; ?>">
    </div>
<?php }

function meta_box_metricas() {
    add_meta_box(
        'input_metrica',
        'Métrica',
        'html_input_metrica',
        'metricas',
        'normal',
        'high'
    );
}

add_action('add_meta_boxes', 'meta_box_metricas');

function atualiza_metrica( $post_id ) {
    if( isset($_POST['metrica']) ) {
        update_post_meta($post_id, 'metrica', sanitize_text_field($_POST['metrica']));
    }
}

add_action('save_post', 'atualiza_metrica');

// post type metricas - create/register taxonomy

function registra_tag_metrica() {

    $nomePlural = 'Tags';
    $nomeSingular = 'Tag';
    
    $labels = array(
        'name' => $nomePlural,
        'singular_name' => $nomeSingular,
        'edit_item' => 'Editar ' . $nomeSingular,
        'add_new_item' => 'Adicionar novo ' . $nomeSingular,
        'search_items' => 'Pesquisar ' . $nomePlural
    );
    
    $args = array(
        'labels' => $labels,
        'public' => true,
        'hierarchical' => true,
        'show_admin_column' => true,
        'show_in_rest' => true
    );
    
    register_taxonomy('tag', 'metricas', $args);
}

add_action('init', 'registra_tag_metrica');