const cards = document.querySelectorAll('.token-card');
const finePointer = window.matchMedia('(hover: hover) and (pointer: fine) and (prefers-reduced-motion: no-preference)').matches;

if (finePointer) {
    cards.forEach((card) => {
        card.addEventListener('pointermove', (event) => {
            const bounds = card.getBoundingClientRect();
            const x = event.clientX - bounds.left;
            const y = event.clientY - bounds.top;
            const normalizedX = (x / bounds.width) * 2 - 1;
            const normalizedY = (y / bounds.height) * 2 - 1;

            card.style.setProperty('--pointer-x', `${x}px`);
            card.style.setProperty('--pointer-y', `${y}px`);
            card.style.transform = `perspective(800px) translate3d(${normalizedX * 2}px, ${normalizedY * 2}px, 0) rotateX(${normalizedY * -3}deg) rotateY(${normalizedX * 3}deg)`;
            card.classList.add('pointer-active');
        });

        card.addEventListener('pointerleave', () => {
            card.classList.remove('pointer-active');
            card.style.removeProperty('--pointer-x');
            card.style.removeProperty('--pointer-y');
            card.style.removeProperty('transform');
        });
    });
}