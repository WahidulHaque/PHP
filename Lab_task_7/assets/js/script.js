// ELEMENT SELECTION
const menuBtn = document.querySelector('#btn-sidebar');
const sidebar = document.querySelector('.sidebar');
const home    = document.querySelector('.home_content');

menuBtn.addEventListener('click',function(){
    sidebar.classList.toggle('active');
    home.classList.toggle('active');
});
