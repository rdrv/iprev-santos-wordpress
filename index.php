<?php
    $css_especifico = array('home', 'noticias');    
    require_once('header.php');
?>

<?php 
  $home = get_template_directory_uri();
  $homeUrl = home_url();
?>
    
<!-- pesquisa -->

<section class="pesquisa-home bg-preto-translucido">

    <div class="container pesquisa-home-input-container">
      <?php get_search_form() ?>
    </div>
    
    <div class="pesquisa-home-icones-container-bg bg-dourado-translucido bg-top-gradient">
      
      <div class="container pesquisa-home-icones-container">
        
        <!-- Navegador Direita -->
        <i class="fas fa-chevron-left navegador-esquerda texto-branco"></i>
        
        <div class="swiper-container">
          
          <ul class="swiper-wrapper">
            <li class="swiper-slide pesquisa-home-icone">
              <img src="<?= $home; ?>/assets/img/home/holerite-ir.svg" class="pesquisa-home-icone-img">
              <p class="pesquisa-home-icone-texto texto-branco">Holerite e Informe de Rendimentos</p>
            </li>
            <li class="swiper-slide pesquisa-home-icone">
              <img src="<?= $home; ?>/assets/img/home/simulador.svg" class="pesquisa-home-icone-img">
              <p class="pesquisa-home-icone-texto texto-branco">Simulador de aposentadoria</p>
            </li>
            <li class="swiper-slide pesquisa-home-icone">
              <img src="<?= $home; ?>/assets/img/home/regras-pensao.svg" class="pesquisa-home-icone-img">
              <p class="pesquisa-home-icone-texto texto-branco">Regras de pensão</p>
            </li>
            <li class="swiper-slide pesquisa-home-icone">
              <img src="<?= $home; ?>/assets/img/home/regras-aposentadoria.svg" class="pesquisa-home-icone-img">
              <p class="pesquisa-home-icone-texto texto-branco">Regras e Aposentadoria</p>
            </li>
          </ul>
          
        </div>
        
        <!-- Navegador Esquerda -->
        <i class="fas fa-chevron-right navegador-direita texto-branco"></i>
        
      </div>
      
    </div>
    
</section>

<!-- noticias / destaques  -->

<section class="section-inicial">
    
    <div class="container">
      
        <h3 class="titulo-padrao">Destaques</h3>
      
        <div class="container-noticias">

          <?php
                  $args = array( 
                      'post_type' => 'noticias',
                      'posts_per_page' => '3',
                      'tax_query' => array(
                          array(
                              'taxonomy' => 'filtro',
                              'field' => 'slug',
                              'terms' => 'destaques'
                          ),
                      ),
                  );
                  $loop = new WP_Query( $args ); 
                  if( $loop->have_posts() ) {
                      while( $loop->have_posts() ) {
                          $loop->the_post();
          ?>

            <div class="box-noticia">
              <div style="background: url(<?= get_the_post_thumbnail_url(); ?>);" class="box-noticia-img">
              </div>
              <div class="box-noticia-texto">
                <h3 class="titulo-padrao texto-dourado pb-padrao"><?php the_title(); ?></h3>
                <?php the_excerpt() ?>
                <a href="<?php the_permalink() ?>" class="botao-padrao botao-dourado botao-noticias">
                  Saiba Mais <i class="fas fa-share-alt"></i>
                </a>
              </div>
            </div>

          <?php
              } 
          }
          ?>

        </div>
      
    </div>
      
</section>

<!-- navegue por perfil -->

<section class="section-inicial">
    
    <div class="container">
      
      <h3 class="titulo-padrao">Navegue por perfil</h3>

      <ul class="categorias-icone-container">
        <li class="categorias-icone">
          <img src="<?= $home; ?>/assets/img/home/aposentado.svg" class="categorias-icone-img">
          <p class="categorias-icone-texto">Aposentados</p>
        </li>
        <li class="categorias-icone">
          <img src="<?= $home; ?>/assets/img/home/pensionista.svg" class="categorias-icone-img">
          <p class="categorias-icone-texto">Pensionistas</p>
        </li>
        <li class="categorias-icone">
          <img src="<?= $home; ?>/assets/img/home/servidores-ativos.svg" class="categorias-icone-img">
          <p class="categorias-icone-texto">Servidores Ativos</p>
        </li>
        <li class="categorias-icone">
          <img src="<?= $home; ?>/assets/img/home/outros-usuarios.svg" class="categorias-icone-img">
          <p class="categorias-icone-texto">Mais Usuários</p>
        </li>
      </ul>
      
    </div>
    
</section>

<!-- desempenho dos serviços -->

<section class="section-padrao text-center bg-marrom">
    
    <div class="container text-center">
      
      <h3 class="titulo-padrao texto-branco">Desempenho dos Serviços</h3>
      
      <ul class="container-desempenho-servicos">
        <?php
          $args = array( 
            'post_type' => 'metricas',
            'posts_per_page' => '3',
            'tax_query' => array(
              array(
                  'taxonomy' => 'categoria',
                  'field' => 'slug',
                  'terms' => 'destaques'
              ),
            ),
          );
            $loop = new WP_Query( $args ); 
            if( $loop->have_posts() ) {
              while( $loop->have_posts() ) {
                $loop->the_post();
                $metrica_meta_data = get_post_meta( $post->ID )
          ?>
          <li class="desempenho-servicos">
            <?php the_post_thumbnail('full', array('class'=>'desempenho-servicos-img')) ?>
            <strong class="desempenho-servicos-numero texto-branco">
              <?= $metrica_meta_data['metrica'][0]; ?>
            </strong>
            <p class="desempenho-servicos-texto texto-branco">
              <?php the_title() ?>
            </p>
          </li>
          <?php } 
            }
          ?>
      </ul>

      <a href="#" class="botao-padrao botao-marrom">
        Saiba Mais
      </a>
      
    </div>
    
</section>

<!-- ouvidoria -->

<section class="section-padrao section-ouvidoria bg-dourado-translucido">
    <div class="container text-center">
      <img src="<?= $home; ?>/assets/img/home/ouvidoria.svg" class="ouvidoria-icone">
      <p class="titulo-padrao texto-branco ouvidoria-titulo">Ouvidoria</p>
      <p class="descricao-padrao texto-branco pb-padrao">Amigo cidadão, a Ouvidoria foi criada para atendê-los. O nosso princípio é a integridade, transparência, imparcialidade, justiça e sigilo, para que haja sucesso de todo o trabalho a ser desenvolvido.</p>
      <a href="#" class="botao-padrao botao-dourado">
        Entrar em contato
      </a>
    </div>
</section>

<!-- transparência e legislação -->

<section class="section-padrao section-ouvidoria bg-marrom">
    <div class="container text-center">
      <img src="<?= $home; ?>/assets/img/home/transparencia-legislacao.svg" class="ouvidoria-icone">
      <p class="titulo-padrao texto-branco ouvidoria-titulo">Tansparência e Legislação</p>
      <p class="descricao-padrao texto-branco pb-padrao">Visite nosso portal da Transparência.</p>
      <a href="#" class="botao-padrao botao-marrom">
        Saiba Mais
      </a>
    </div>
</section>

<!-- sobre o iprev -->

<section class="section-padrao section-ouvidoria bg-branco">
    <div class="container text-center">
      <img src="<?= $home; ?>/assets/img/logo.png" class="ouvidoria-icone-2">
      <p class="titulo-padrao ouvidoria-titulo">Sobre o IPREV</p>
      <p class="descricao-padrao pb-padrao">Conheça melhor o Instituto de Previdência Social dos Servidores Públicos Municipais de Santos</p>
      <a href="#" class="botao-padrao botao-dourado">
        Saiba Mais
      </a>
    </div>
</section>

<!-- footer -->

<?php
    $js_lib_especifica = array('swiper/js/swiper.min');  
    $js_especifico = array('home', 'search-btn-fix');  
    require_once('footer.php');
?>
