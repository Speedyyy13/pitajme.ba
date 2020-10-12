const menu = document.querySelector('#mobile-menu');
const navLinks =  document.querySelector('.nav-links');
const links = document.querySelectorAll('.nav-links li');
const pozicija = document.querySelector('.pozicija');
const vise= document.querySelector('.btn');
const submenu = document.querySelector('.submenu');
const header = document.querySelector('.head');

menu.addEventListener('click', ()=>{
  menu.classList.toggle("is-active");
  navLinks.classList.toggle("active");
  pozicija.classList.toggle("lijevo");
  document.body.classList.toggle("lock-scroll");
  links.forEach(link =>{
    link.classList.toggle("fade");
  })
});

vise.addEventListener('click', (e)=>{
  e.preventDefault();
  if(submenu.style.display === 'none'){
    submenu.style.display = 'block';
  }
  else{
    submenu.style.display = 'none';
  }
  return false;
});

window.addEventListener('scroll', ()=>{
  const visina_skrola = window.pageYOffset;
  const visina_headera = header.getBoundingClientRect().height;
  if(visina_skrola > visina_headera){
    header.classList.add('fixed-header');
    header.classList.remove('header');
  }
  else{
    header.classList.remove('fixed-header');
    header.classList.add('header');
  }
})
