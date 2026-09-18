let slideIndex = 0;
showSlides(slideIndex);

function plusSlides(n) {
    showSlides(slideIndex += n);
}

function currentSlides(n) {
    showSlides(slideIndex = n);
}

function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName("slide");
    let dots = document.getElementsByClassName("dot");
    if (n > slides.length) { slideIndex = 1; }
    if (n < 1) { slideIndex = slides.length; }
    for (i = 0; i < slides.length; i++) {
        slides[i].classList.remove("active");
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].classList.remove("active");
    }
    slides[slideIndex - 1].classList.add ("active");
    dots[slideIndex - 1].classList.add("active");
}

document.querySelector(".slide-arrow.prev").addEventListener("click", () => plusSlides(-1));
document.querySelector(".slide-arrow.next").addEventListener("click", () => plusSlides(1));

document.querySelectorAll(".dot").forEach((dot, index) => {
    dot.addEventListener("click", () => currentSlides(index + 1));
});

if (navigator.vibrate) {
    const sosBtn = document.getElementById("SOS");
    if (sosBtn) {
        sosBtn.addEventListener("click", () => window.navigator.vibrate(200));
    }
}