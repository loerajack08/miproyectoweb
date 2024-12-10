
/*
este es el escript que usa el boton tipo 
amburguesa jack 
acuardate que 
solo estoy aprendiendo js y
hoy toco comentarios jaja 

*/

document.addEventListener('DOMContentLoaded', () => {
    const hamburger = document.getElementById('hamburger');
    const menu = document.getElementById('menu');

    // Alternar menú y animación del botón
    hamburger.addEventListener('click', () => {
        menu.classList.toggle('active');
        hamburger.classList.toggle('open'); // Agrega clase al botón
    });
});
