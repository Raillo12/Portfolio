const imgs = ['bluelabel.png', 'barcelo.png', 'puerto.png', 'au.png'];
const botellas = [
    'Johnnie Walker Blue Label', 
    'Ron Barceló Gran Añejo', 
    'Puerto de Indias Strawberry Flavour', 
    'AU Vodka Blubble Gum'
];

function verWhisky() {
    var img = document.getElementById('imagen');
    var texto = document.getElementById('texto');

    img.src = imgs[0];
    texto.textContent = botellas[0];
}

function verRon() {
    var img = document.getElementById('imagen');
    var texto = document.getElementById('texto');

    img.src = imgs[1];
    texto.textContent = botellas[1];
}

function verGin() {
    var img = document.getElementById('imagen');
    var texto = document.getElementById('texto');

    img.src = imgs[2];
    texto.textContent = botellas[2];
}

function verVodka() {
    var img = document.getElementById('imagen');
    var texto = document.getElementById('texto');

    img.src = imgs[3];
    texto.textContent = botellas[3];
}