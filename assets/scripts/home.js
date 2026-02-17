// Move to mouse
const heroLeft = document.querySelector('.hero-left');
const heroRight = document.querySelector('.hero-right');
document.addEventListener('mousemove', (e) => {
    if (window.innerWidth > 750) {
        const mouseX = e.clientX / window.innerWidth;
        const mouseY = e.clientY / window.innerHeight;

        const FORCE = 10;

        heroLeft.style.transform = `translate(-${mouseX * FORCE}px, ${mouseY * FORCE}px)`;
        heroRight.style.transform = `translate(${mouseX * FORCE}px, -${mouseY * FORCE}px)`;
    } else {
        heroLeft.style.transform = '';
        heroRight.style.transform = '';
    }
});

const swiper = new Swiper(".mySwiper", {
    slidesPerView: 1,
    spaceBetween: 20,
    centeredSlides: false, 
    grabCursor: true,
    loop: true,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    breakpoints: {
        768: {
            slidesPerView: 2,
            spaceBetween: 30,
        },
        1230: {
            slidesPerView: 3,
            spaceBetween: 40,
        },
    },
});