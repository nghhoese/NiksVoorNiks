document.querySelector('#menu').addEventListener('click',function(){
 const navs = document.querySelectorAll('.nav')
 navs.forEach(nav => nav.classList.toggle('toggleshow'));
})


