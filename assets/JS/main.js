let car_right = document.getElementById('eee')
let car_left = document.getElementById('iii')
let body = document.querySelector('body');
window.addEventListener('scroll', function(){
    let value = window.scrollY
    car_left.style.marginLeft = value * 5 + 'px';

    car_right.style.marginRight = value * 2 + 'px';
})
