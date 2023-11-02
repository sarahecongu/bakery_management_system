let navbar = document.querySelector('.navbar');
document.querySelector('#menu-btn').onclick = ()=>{
navbar.classList.toggle('active');
}

window.onscroll = () =>{
    navbar.classList.remove('active');
}

let slides = document.querySelectorAll('.home .slides-container .slide');
let index = 0;

function next() {
    slides[index].classList.remove('active');
    index = (index + 1) % slides.length;
    slides[index].classList.add('active');
    
}

function prev() {
    slides[index].classList.remove('active');
    index = (index - 1 + slides.length) % slides.length;
    slides[index].classList.add('active');
    
}
function next() {
    slides[index].classList.remove('active');
    index = (index + 1) % slides.length;
    slides[index].classList.add('active');
    
}

function prev() {
    slides[index].classList.remove('active');
    index = (index - 1 + slides.length) % slides.length;
    slides[index].classList.add('active');
    
}

var product_id = document.getElementsByClassName("add");
for (var i = 0; i < product_id.length; i++) {
  product_id[i].addEventListener("click",function (event) {
  var target = event.target;
  var id = target.getAttribute("data-id"); 
  
  
  alert(id);
  })

  
}