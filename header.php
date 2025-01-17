<!DOCTYPE html>
<html lang="pt-br">

<head>

    <?php 
      $home = get_template_directory_uri();
      $homeUrl = home_url();
    ?>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- reset -->
    <link rel="stylesheet" href="<?= $home; ?>/assets/css/reset.css">
    <!-- libs -->
    <link rel="stylesheet" href="<?= $home; ?>/assets/libs/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="<?= $home; ?>/assets/libs/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="<?= $home; ?>/assets/libs/swiper/css/swiper.min.css">
    <link rel="stylesheet" href="<?= $home; ?>/assets/libs/multilevel-sidebar-menu/hc-offcanvas-nav.css">
    <?php
      if($css_lib_especifico) {
        foreach ($css_lib_especifico as $item) {
    ?>
        <link rel="stylesheet" href="<?= $home; ?>/assets/libs/<?= $item; ?>.css">
    <?php
        }
      }
    ?>
    <?php
      if($js_lib_especifico) {
        foreach ($js_lib_especifico as $item) {
    ?>
        <script src="<?= $home; ?>/assets/libs/<?= $item; ?>.js"></script>
    <?php
        }
      }
    ?>
    <!-- css comum -->
    <link rel="stylesheet" href="<?= $home; ?>/assets/css/comum.css">
    <link rel="stylesheet" href="<?= $home; ?>/assets/css/header.css">
    <link rel="stylesheet" href="<?= $home; ?>/assets/css/footer.css">
    <!-- css especifico -->
    <?php
      if($css_especifico) {
        foreach ($css_especifico as $item) {
    ?>
        <link rel="stylesheet" href="<?= $home; ?>/assets/css/<?= $item; ?>.css">
    <?php
        }
      }
    ?>

    <title>
      <?php title_dinamico(); ?>
    </title>
    
    <?php wp_head(); ?>

</head>

<body>

<header class="bg-branco">
    
    <nav class="container pt-padrao pb-padrao">
      
      <ul class="navigation-top-menu">
        <i class="fas fa-bars hamburguer-icon texto-dourado toggle"></i>
        <a href="<?= $homeUrl; ?>" class="logo">
          <img src="<?= $home; ?>/assets/img/logo.png" class="logo" alt="Logo do Instituto De Previdência Social Dos Servidores Públicos Municipais De Santos">
        </a>
        <h1 class="h1-top-menu">Instituto de Previdência Social dos Servidores Públicos Municipais de Santos</h1>
      </ul>
      
      <ul class="icones-top-menu">
        <li><i class="fas fa-home home-icon pl-padrao texto-dourado">&nbsp;Home</i></li>
        <li><i class="fas fa-envelope webmail-icon pl-padrao texto-dourado">&nbsp;Webmail</i></li>
      </ul>
      
      <div class="wrapper cf">
        <nav id="main-nav">
          <li>Home</li>
            <?php 
                $args = array(
                    'theme_location' => 'menu-principal'
                );
                wp_nav_menu($args);
            ?> 
        </nav>
      </div>
      
    </nav>
    
</header>

