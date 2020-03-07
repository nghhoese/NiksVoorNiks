document.querySelector('#menu').addEventListener('click',function(){
 const navs = document.querySelectorAll('.nav')
 navs.forEach(nav => nav.classList.toggle('toggleshow'));
})
document.querySelector('.biggerfont').addEventListener('click',function(){
console.log('hello');

if(document.querySelector('.container').style.fontSize == '150%'){
document.querySelector('.container').style.fontSize = '100%';
var x = document.querySelectorAll(".nav a");
var i;
for (i = 0; i < x.length; i++) {
  x[i].style.fontSize = "17px";
} 

}else{
console.log('get here');
document.querySelector(".container").style.fontSize = "150%";
var x = document.querySelectorAll(".nav a");
var i;
for (i = 0; i < x.length; i++) {
  x[i].style.fontSize = "150%";
} 

}
})

