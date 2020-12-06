var slideIndex

window.onload = function (event) {
  slideIndex = 1;
  showSlides(slideIndex);
}

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = $(".slidediv");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    var current =  $(".slidediv")[i];
    $(current).fadeOut(800);
  }
  var show = $(".slidediv")[slideIndex-1];
  $(show).delay(800).fadeIn(1500);
}