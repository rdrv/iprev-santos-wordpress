<!DOCTYPE html>
<html lang="pt-br">
<head>

    <?php $home = get_template_directory_uri() ?>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- reset -->
    <link rel="stylesheet" href="<?= $home; ?>/assets/css/reset.css">
    <!-- libs -->
    <link rel="stylesheet" href="<?= $home; ?>/assets/libs/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="<?= $home; ?>/assets/libs/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="<?= $home; ?>/assets/libs/swiper/css/swiper.min.css">
    <!-- fontes -->
    <link rel="stylesheet" href="<?= $home; ?>/assets/css/fontes.css">
    <!-- custom padrao-->
    <link rel="stylesheet" href="<?= $home; ?>/assets/css/componentes.css">
    <link rel="stylesheet" href="<?= $home; ?>/assets/css/cores.css">
    <link rel="stylesheet" href="<?= $home; ?>/assets/css/header.css">
    <link rel="stylesheet" href="<?= $home; ?>/assets/css/footer.css">
    <link rel="stylesheet" href="<?= $home; ?>/assets/css/menu.css">
    <!-- custom especifico -->
    <link rel="stylesheet" href="<?= $home; ?>/assets/css/home.css">

    <title>Title</title>
    
    <?php wp_head(); ?>

</head>
<body>

<header>
    <?php 
        $args = array(
            'theme_location' => 'menu-principal'
        );
        wp_nav_menu($args);
    ?>
</header>