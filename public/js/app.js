document.addEventListener("DOMContentLoaded", () => {
    const container = document.getElementById('flex-container');
    let openPostIt = null;

    container.addEventListener('click', (e) => {
        const clicked = e.target.closest('.post-it');
        if (!clicked) return;

        if (openPostIt === clicked) {
            clicked.classList.toggle('expanded');

            openPostIt = clicked.classList.contains('expanded') ? clicked : null;
            return;
        }

        if (openPostIt) {
            openPostIt.classList.remove('expanded');
        }

        clicked.classList.add('expanded');
        openPostIt = clicked;
    });
});
