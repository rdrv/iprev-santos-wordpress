<footer class="section-inicial bg-cinza">
    <ul class="container informacoes-footer">
      <li>Rua Dr. Assis Corrêa, 20 - Gonzaga - Santos/SP - Cep: 11.055-310</li>
      <li>Tel: (013) 3202-9099</li>
      <li>iprev@santos.sp.gov.br</li>
    </ul>
  </div>
  <p class="footer-copyright bg-branco">&copy; 2019 - Atlantic Solutions. All Rights Reserved.</p>
</footer>

<?php $home = get_template_directory_uri() ?>

<!-- jquery -->
<script src="<?= $home; ?>/assets/libs/jquery/jquery-3.3.1.slim.min.js"></script>
<!-- bootstrap -->
<script src="<?= $home; ?>/assets/libs/bootstrap/bootstrap.min.js"></script>
<script src="<?= $home; ?>/assets/libs/bootstrap/popper.min.js"></script>
<!-- side menu -->
<script src="<?= $home; ?>/assets/libs/multilevel-sidebar-menu/hc-offcanvas-nav.js"></script>
<script src="<?= $home; ?>/assets/libs/multilevel-sidebar-menu/init.js"></script>

<!-- lib especifica -->
<?php

    if($js_lib_especifica) {
        foreach ($js_lib_especifica as $item) {
?>
        <script src="<?= $home; ?>/assets/libs/<?= $item; ?>.js"></script>
<?php
        }
    }
?>
 
<!-- js especifico -->
<?php
    if($js_especifico) {
        foreach ($js_especifico as $item) {
?>
        <script src="<?= $home; ?>/assets/js/<?= $item; ?>.js"></script>
<?php
        }
    }
?>

<?php wp_footer(); ?>

</body>
</html>