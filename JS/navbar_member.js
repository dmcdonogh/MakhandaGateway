const hamburger = document.getElementById('hamburger');
const navMenu = document.getElementById('dropdownMenu');

if (hamburger && navMenu) {

    const button = hamburger.querySelector('button');

    button.addEventListener('click', function (event) {
        event.stopPropagation();

        navMenu.classList.toggle('active');
        hamburger.classList.toggle('active');
    });

    document.addEventListener('click', function () {
        navMenu.classList.remove('active');
        hamburger.classList.remove('active');
    });
}
