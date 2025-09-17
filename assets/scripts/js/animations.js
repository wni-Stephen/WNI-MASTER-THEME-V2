// animations.js

function initAnimations() {
    if (typeof gsap === 'undefined' || typeof ScrollTrigger === 'undefined') return;

    // 1️⃣ Fade in elements on scroll
    gsap.from('.animate-on-scroll', {
        scrollTrigger: {
            trigger: '.animate-on-scroll',
            start: 'top 80%',
            toggleActions: 'play none none reverse'
        },
        opacity: 0,
        y: 50,
        duration: 1
    });

    // 2️⃣ Staggered fade in for list items
    gsap.from('.staggered-items .item', {
        scrollTrigger: {
            trigger: '.staggered-items',
            start: 'top 80%',
        },
        opacity: 0,
        y: 30,
        stagger: 0.2,
        duration: 0.8
    });

    // 3️⃣ Slide in from left for sections
    gsap.from('.slide-left', {
        scrollTrigger: {
            trigger: '.slide-left',
            start: 'top 80%',
        },
        opacity: 0,
        x: -100,
        duration: 1
    });

    // 4️⃣ Slide in from right for sections
    gsap.from('.slide-right', {
        scrollTrigger: {
            trigger: '.slide-right',
            start: 'top 80%',
        },
        opacity: 0,
        x: 100,
        duration: 1
    });

    // 5️⃣ Scale in (zoom effect)
    gsap.from('.scale-in', {
        scrollTrigger: {
            trigger: '.scale-in',
            start: 'top 80%',
        },
        opacity: 0,
        scale: 0.8,
        duration: 0.8
    });

    // 6️⃣ Hero Swiper slide animation
    gsap.from('.hero-swiper .swiper-slide', {
        scrollTrigger: {
            trigger: '.hero-section',
            start: 'top center',
        },
        opacity: 0,
        y: 100,
        stagger: 0.2,
        duration: 1
    });

    // 7️⃣ Testimonials slider animation
    gsap.from('.testimonials-section .swiper-slide', {
        scrollTrigger: {
            trigger: '.testimonials-section',
            start: 'top 80%',
        },
        opacity: 0,
        y: 50,
        stagger: 0.2,
        duration: 1
    });
}

// Make it global so it can be called from functions.js
window.initAnimations = initAnimations;