document.querySelector('#menu').addEventListener('click',function(){
 const navs = document.querySelectorAll('.nav')
 navs.forEach(nav => nav.classList.toggle('toggleshow'));
})
document.querySelector('.biggerfont').addEventListener('click',function(){
if(document.querySelector('*').fontSize == '100%';){
document.querySelector('*').fontSize = '150%';
}else{
document.querySelector('*').fontSize = '100%';
}
})

