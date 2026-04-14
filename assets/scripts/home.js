// Animation du hero
document.addEventListener('mousemove', (e) => {
    const heroLeft = document.querySelector('.hero-left');
    const heroRight = document.querySelector('.hero-right');

    if (heroLeft && heroRight && window.innerWidth > 750) {
        const mouseX = e.clientX / window.innerWidth;
        const mouseY = e.clientY / window.innerHeight;

        const FORCE = 10;

        heroLeft.style.transform = `translate(-${mouseX * FORCE}px, ${mouseY * FORCE}px)`;
        heroRight.style.transform = `translate(${mouseX * FORCE}px, -${mouseY * FORCE}px)`;
    } else if (heroLeft && heroRight) {
        heroLeft.style.transform = '';
        heroRight.style.transform = '';
    }
});

// Gestion du Swiper
let swiperInstance = null;

function initSwiper() {
    if (document.querySelector(".mySwiper")) {
        swiperInstance = new Swiper(".mySwiper", {
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
            autoplay: {
                delay: 3000,
                disableOnInteraction: false, 
            },
        });
    }
}

document.addEventListener('turbo:load', initSwiper);

// On supprimer le swiper pour le récréé et s'assurer qu'il fonctionne bien sinon bug
document.addEventListener('turbo:before-cache', () => {
    if (swiperInstance) {
        swiperInstance.destroy(true, true);
        swiperInstance = null;
    }
});