<form role="search" action="<?= home_url('/') ?>" method="get">
    <label for="pesquisa" class="label-pesquisa">
        <input type="search" value="<?= get_search_query(); ?>" name="s" title="Search" class="pesquisa-home-input" placeholder="O que você procura?" />
        <i class="fas fa-search texto-dourado pesquisa-home-input-lupa bg-branco"></i>
    </label>
</form>