<?php 

// theme supports
// theme supports

add_theme_support('post-thumbnails');

function habilita_menu() {
    register_nav_menu('menu-principal', 'main-menu');
}

add_action('init', 'habilita_menu');

// post type noticias
// post type noticias

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

// post type métricas
// post type métricas

