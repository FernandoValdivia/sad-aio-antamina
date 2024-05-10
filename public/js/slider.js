var i = 0;
var images = [];
var time = 3000;
var slideshow = document.getElementById('slideshow');

// Lista de imágenes
images[0] = 'img/1.png';
images[1] = 'img/2.png';
images[2] = 'img/3.png';
images[3] = 'img/4.png';
images[4] = 'img/5.png';
images[5] = 'img/6.png';
images[6] = 'img/7.png';
images[7] = 'img/8.png';

// Cambiar imagen
function changeImg() {    
    slideshow.classList.remove('show'); // Eliminamos la clase 'show' para hacer la opacidad 0

    setTimeout(function() {
        slideshow.src = images[i]; // Cambiamos la imagen después de que la opacidad es 0
        slideshow.classList.add('show'); // Agregamos la clase 'show' para hacer la opacidad 1
    }, 1000);

    if (i < images.length - 1) {
        i++;
    } else {
        i = 0;
    }

    setTimeout(changeImg, time);
}

slideshow.src = images[0];
window.onload = changeImg;