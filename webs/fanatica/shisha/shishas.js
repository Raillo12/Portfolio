const imagen_p = document.querySelector('.imagen-p'); // Seleccionamos la imagen principal
const galeria = document.querySelectorAll('.g-img'); // Seleccionamos todas las imágenes de la galería
const descripcion = document.querySelector('#descripcion'); // Seleccionamos el contenedor de la descripción

// Recorremos todas las imágenes de la galería
galeria.forEach(g => {
    g.addEventListener('click', function() {
        const active = document.querySelector('.active'); // Buscamos la imagen activa actual
        if (active) {
            active.classList.remove('active'); // Quitamos la clase 'active' de la imagen actual
        }
        g.classList.add('active'); // Añadimos la clase 'active' a la imagen clickeada
        imagen_p.src = g.src; // Cambiamos la imagen principal por la imagen clickeada
        descripcion.textContent = g.getAttribute('data-descripcion'); // Actualizamos la descripción
    });
});
