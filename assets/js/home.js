// swiper slider on header

const spaceBetween = 30;

const homeIconesContainerSlider = new Swiper('.swiper-container', {
    slidesPerView: 4,
    spaceBetween: spaceBetween,
    loop: true,
    navigation: {
        nextEl: '.navegador-direita',
        prevEl: '.navegador-esquerda',
    },
    breakpoints: {
        992: {
            slidesPerView: 3,
            spaceBetween: spaceBetween,
        },
        768: {
            slidesPerView: 2,
            spaceBetween: spaceBetween,
        },
        576: {
            slidesPerView: 1
        }
    }
});

// fix edit btn show on hover and focus input

const removeEditBtn = event => {

    const input = document.querySelector('.pesquisa-home-input');

    input.addEventListener(event, function() {
        document.querySelector('.is-link-container').style.display = 'none';
    });

};

removeEditBtn('focus');
removeEditBtn('mouseover');