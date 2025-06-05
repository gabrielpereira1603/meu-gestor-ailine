// resources/js/app.js

import './bootstrap';

import { gsap } from "gsap";
import { CustomEase } from "gsap/CustomEase";
import { CustomBounce } from "gsap/CustomBounce";
import { CustomWiggle } from "gsap/CustomWiggle";
import { RoughEase, ExpoScaleEase, SlowMo } from "gsap/EasePack";

import { Draggable } from "gsap/Draggable";
import { DrawSVGPlugin } from "gsap/DrawSVGPlugin";
import { EaselPlugin } from "gsap/EaselPlugin";
import { Flip } from "gsap/Flip";
import { GSDevTools } from "gsap/GSDevTools";
import { InertiaPlugin } from "gsap/InertiaPlugin";
import { MotionPathHelper } from "gsap/MotionPathHelper";
import { MotionPathPlugin } from "gsap/MotionPathPlugin";
import { MorphSVGPlugin } from "gsap/MorphSVGPlugin";
import { Observer } from "gsap/Observer";
import { Physics2DPlugin } from "gsap/Physics2DPlugin";
import { PhysicsPropsPlugin } from "gsap/PhysicsPropsPlugin";
import { PixiPlugin } from "gsap/PixiPlugin";
import { ScrambleTextPlugin } from "gsap/ScrambleTextPlugin";
import { ScrollTrigger } from "gsap/ScrollTrigger";
import { ScrollSmoother } from "gsap/ScrollSmoother";
import { ScrollToPlugin } from "gsap/ScrollToPlugin";
import { SplitText } from "gsap/SplitText";
import { TextPlugin } from "gsap/TextPlugin";

gsap.registerPlugin(
    Draggable,
    ScrollTrigger,
    ScrollSmoother,
    Flip,
    InertiaPlugin,
    MotionPathPlugin,
    MorphSVGPlugin,
    Observer,
    Physics2DPlugin,
    PhysicsPropsPlugin,
    PixiPlugin,
    ScrambleTextPlugin,
    DrawSVGPlugin,
    EaselPlugin,
    GSDevTools,
    MotionPathHelper,
    SplitText,
    TextPlugin,
    RoughEase,
    ExpoScaleEase,
    SlowMo,
    CustomEase,
    CustomBounce,
    CustomWiggle
);

document.addEventListener('DOMContentLoaded', () => {
    // Função que exibe o cupom flutuante ao clicar
    function showCoupon(x, y) {
        const coupon = document.createElement('div');
        coupon.textContent = '🎁 Cupom: AMOR2025';
        coupon.classList.add(
            'fixed',
            'px-3',
            'py-1',
            'bg-red-500',
            'text-white',
            'font-semibold',
            'rounded-md',
            'shadow-lg',
            'z-50'
        );
        coupon.style.left = `${x - 50}px`;
        coupon.style.top = `${y - 40}px`;
        coupon.style.opacity = '0';

        document.body.appendChild(coupon);

        gsap.timeline()
            .to(coupon, { opacity: 1, duration: 0.3, ease: 'power1.out' })
            .to(coupon, { opacity: 1, duration: 1.2 })
            .to(coupon, {
                opacity: 0,
                duration: 0.6,
                ease: 'power1.in',
                onComplete: () => coupon.remove()
            });
    }

    // 1) Animação de subida e rotação 3D dos corações
    const hearts = document.querySelectorAll('.heart');
    hearts.forEach((heart) => {
        const delayStart = Math.random() * 1.5;

        gsap.timeline({ repeat: -1, delay: delayStart })
            .fromTo(
                heart,
                { y: 0, rotationY: 0, opacity: 0 },
                {
                    y: -300 - Math.random() * 100,
                    rotationY: 180 * (Math.random() > 0.5 ? 1 : -1),
                    opacity: 1,
                    duration: 4 + Math.random() * 2,
                    ease: 'power1.out'
                }
            )
            .to(heart, { opacity: 0, duration: 1, ease: 'power1.in' })
            .set(heart, { y: 0, rotationY: 0 });
    });

    // 2) Cliques nos corações: efeito “pop” + exibe cupom
    hearts.forEach((heart) => {
        heart.style.cursor = 'pointer';

        heart.addEventListener('click', (event) => {
            event.stopPropagation();

            gsap.fromTo(
                heart,
                { scale: 1, color: heart.classList.contains('text-red-400') ? '#f87171' : '#ec4899' },
                {
                    scale: 1.4,
                    color: '#ffffff',
                    duration: 0.3,
                    yoyo: true,
                    repeat: 1,
                    ease: 'power1.inOut'
                }
            );

            const { clientX, clientY } = event;
            showCoupon(clientX, clientY);
        });
    });
});
