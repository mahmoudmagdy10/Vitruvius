AOS.init({
    duration: 800,
});

//  Initialize Swiper

var swiper = new Swiper(".mySwiper", {
    slidesPerView: 1,
    spaceBetween: 10,
    loop: true,
    autoplay: true,
    speed: 800,
    breakpoints: {
    // when window width is >= 320px
    576: {
        slidesPerView: 2,
        spaceBetween: 30
    },
    // when window width is >= 480px
    768: {
        slidesPerView: 3,
        spaceBetween: 10
    },
    // when window width is >= 640px
    991: {

        slidesPerView: 3,
        spaceBetween: 20
    },
    }
    ,
    navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
    },
}

);
