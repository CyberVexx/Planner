document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll('.post-it').forEach(postit => {
        postit.addEventListener('click', () => {
            document.querySelectorAll('.post-it').forEach(p => {
                if (p !== postit) p.classList.remove('expanded');
            });

            // Toggle the clicked one
            postit.classList.toggle('expanded');
        });
    });
});
