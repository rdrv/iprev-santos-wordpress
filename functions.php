<?php 

// theme supports

add_theme_support('post-thumbnails');

// create/register menu

function habilita_menu() {
    register_nav_menu('menu-principal', 'main-menu');
}

add_action('init', 'habilita_menu');

// create dynamic title of page

function title_dinamico() {
    
    bloginfo('name');

    if(!is_home()) {
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
        'add_new_item' => 'Adicionar nova ' . $nomeSingular,
        'edit_item' => 'Editar ' . $nomeSingular,
        'featured_image' => $imagemPrincipal,
        'set_featured_image' => 'Definir ' . $imagemPrincipal,
        'remove_featured_image' => 'Remover ' . $imagemPrincipal,
        'use_featured_image' => 'Usar esta ' . $imagemPrincipal
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
        'menu_icon' => 'dashicons-media-document',
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

// post type métricas


