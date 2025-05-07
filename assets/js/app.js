const changesSlider = new Swiper('.home_slider', {
    effect: "slide",
    grabCursor: true,
    centeredSlides: true,
    initialSlide: 1,
    slidesPerView: "auto",
    spaceBetween: 60,
    pagination: {
        el: ".home-pagination",
        clickable: true,
    },
    breakpoints: {
        1440: {
            slidesPerView: "auto",
        },
        1024: {
            slidesPerView: "auto",
        },

        768: {
            slidesPerView: "auto",
            spaceBetween: 20,
        },

        0: {
            slidesPerView: 1,
        }
    }
});

const products_slider = new Swiper('.products_slider', {
    effect: "slide",
    grabCursor: true,
    slidesPerView: 4,
    spaceBetween: 20,
    navigation: {
        nextEl: ".new-next",
        prevEl: ".new-prev",
    },
    breakpoints: {
        1440: {
            slidesPerView: 4,
        },
        1024: {
            slidesPerView: 3,
        },

        768: {
            slidesPerView: 2,
        },

        0: {
            slidesPerView: 1,
        }
    }
});

const footer = new Swiper('.footer_slider', {
    loop: true,
    slidesPerView: 5,
    spaceBetween: 30,
    speed: 5000,
    autoplay: {
        delay: 0,
        disableOnInteraction: false,
    },
    freeMode: true,
    simulateTouch: false,
    breakpoints: {
        320: {
            slidesPerView: 2,
            spaceBetween: 10,
        },
        480: {
            slidesPerView: 3,
            spaceBetween: 15,
        },
        768: {
            slidesPerView: 3,
            spaceBetween: 20,
        },
        1024: {
            slidesPerView: 5,
            spaceBetween: 30,
        }
    }
});


document.addEventListener('DOMContentLoaded', function () {
    jQuery(document.body).on('added_to_cart', function(event, fragments, cart_hash, $button) {
        const toast = document.createElement('div');
        toast.textContent = 'Produsul a fost adăugat cu succes în coș!';
        toast.style.position = 'fixed';
        toast.style.bottom = '30px';
        toast.style.right = '30px';
        toast.style.padding = '15px 25px';
        toast.style.background = '#6e71bd';
        toast.style.color = '#fff';
        toast.style.borderRadius = '8px';
        toast.style.boxShadow = '0 4px 12px rgba(0,0,0,0.15)';
        toast.style.zIndex = 9999;
        toast.style.fontSize = '16px';
        document.body.appendChild(toast);
        setTimeout(() => {
            toast.remove();
        }, 3000);
    });
});

// slider

document.querySelectorAll('.thumbnail-slider').forEach((thumbnailEl, index) => {
    const mainSliderEl = document.querySelectorAll('.main-slider')[index];

    if (!mainSliderEl) return;

    const thumbnailSlider = new Swiper(thumbnailEl, {
        spaceBetween: 16,
        slidesPerView: 5,
        loop: false,
        breakpoints: {
            1400: { slidesPerView: 4 },
            1200: { slidesPerView: 4 },
            768: { slidesPerView: 4 },
            0: { slidesPerView: 3 },
        }
    });

    new Swiper(mainSliderEl, {
        effect: "slide",
        grabCursor: true,
        loop: false,
        navigation: {
            nextEl: `.discover-next-${index}`,
            prevEl: `.discover-prev-${index}`,
        },
        spaceBetween: 30,
        slidesPerView: "auto",
        thumbs: {
            swiper: thumbnailSlider
        },
        breakpoints: {
            1440: { slidesPerView: "auto", spaceBetween: 30 },
            1024: { slidesPerView: "auto", spaceBetween: 10 },
            768: { slidesPerView: 1, spaceBetween: 10 },
            480: { slidesPerView: 1, spaceBetween: 10 },
        }
    });
});

document.querySelectorAll('.accordion-header').forEach((header) => {
    header.addEventListener('click', () => {
        const parentItem = header.parentElement;
        const content = header.nextElementSibling;

        // Închide toate celelalte elemente
        document.querySelectorAll('.accordion-item').forEach((item) => {
            if (item !== parentItem) {
                item.classList.remove('active');
            }
        });

        parentItem.classList.toggle('active');
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const firstAccordionItem = document.querySelector('.accordion-item');
    const firstAccordionContent = firstAccordionItem.querySelector('.accordion-content');

    firstAccordionItem.classList.add('active');
    firstAccordionContent.style.display = 'block';
});

document.querySelector('.navbar__toggle').addEventListener('click', function () {
    document.querySelector('.navbar__menu__items').classList.toggle('active');
});