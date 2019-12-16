let spaceBetween = 30;
let homeIconesContainerSlider = new Swiper('.swiper-container', {
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