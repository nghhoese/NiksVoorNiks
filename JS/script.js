var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  slides[slideIndex-1].style.display = "block";   
  setTimeout(showSlides, 5000); //TEST
}

document.querySelector('#menu').addEventListener('click',function(){
 const navs = document.querySelectorAll('.nav')
 navs.forEach(nav => nav.classList.toggle('toggleshow'));
})

