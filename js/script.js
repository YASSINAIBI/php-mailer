var swiper = new Swiper('.swiper-container-one', {
    slidesPerView: 1,
    loop: true,
    effect: 'fade',
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    autoplay: {
        delay: 2500,
        disableOnInteraction: false,
    },
  });

var swiper2 = new Swiper('.swiper-container-two', {
    slidesPerView: 3,
    loop: true,
    spaceBetween: 30,
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
    autoplay: {
        delay: 2500,
        disableOnInteraction: false,
    },
    breakpoints: {
        1920: {
            slidesPerView: 3,
            spaceBetween: 30
        },
        1028: {
            slidesPerView: 3,
            spaceBetween: 30
        },
        480: {
            slidesPerView: 1,
            spaceBetween: 30
        }
    },
  });