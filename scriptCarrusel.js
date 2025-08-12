let slideIndex = 1;
showSlides(slideIndex);

function autoSlide(){
    plusSlides(1);

let intervalID = setInterval(autoSlide,10);

function resetInterval(){
    clearInterval(intervalID);
    intervalID = setInterval(autoSlide, 10);
}

function plusSlides(n) {
    showSlides(slideIndex += n);
    resetInterval();
}

}

function currentSlide(n) {
    showSlides(slideIndex = n);
    resetInterval();
}

function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName("carousel-slide")[0].getElementsByTagName("img");
    let dots = document.getElementsByClassName("dot");

    if (n > slides.length) {
        slideIndex = 1;
    }
    if (n < 1) {
        slideIndex = slides.length;
    }

    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    
    
    const slideImage = slides[slideIndex - 1];
    const dotIndicator = dots[slideIndex - 1];
    
    if (slideImage) {
        slideImage.style.display = "block";
    }
    if (dotIndicator) {
        dotIndicator.className += " active";
    }
}