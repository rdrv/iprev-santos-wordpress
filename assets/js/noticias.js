// highlight filtro taxonomia

const formFiltrar = document.querySelectorAll('.form-filtrar-noticias button');

formFiltrar.forEach(item => {
    item.classList.remove('filtro-active');
});

const hiddenInfo = document.querySelector('.hidden-info').innerHTML;

const currentId = '#' + hiddenInfo;

if (hiddenInfo) {
    document.querySelector(currentId).classList.add('filtro-active');
} else {
    document.querySelector('#todas').classList.add('filtro-active');
}
