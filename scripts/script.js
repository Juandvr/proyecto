let boton1 = document.getElementById('guarderia');
let boton2 = document.getElementById('peluqueria');
let boton3 = document.getElementById('paseos');

let guarderia = document.getElementById('servicioGuarderia');
let peluqueria = document.getElementById('servicioPeluqueria');
let paseos = document.getElementById('servicioPaseos');

boton1.addEventListener('click', function() {
    let visible = window.getComputedStyle(guarderia).display !== 'none';

    peluqueria.style.display = 'none';
    paseos.style.display = 'none';

    guarderia.style.display = visible ? 'none' : 'block';
});

boton2.addEventListener('click', function() {
    let visible = window.getComputedStyle(peluqueria).display !== 'none';

    guarderia.style.display = 'none';
    paseos.style.display = 'none';

    peluqueria.style.display = visible ? 'none' : 'block';
});

boton3.addEventListener('click', function() {
    let visible = window.getComputedStyle(paseos).display !== 'none';

    peluqueria.style.display = 'none';
    guarderia.style.display = 'none';

    paseos.style.display = visible ? 'none' : 'block';
});