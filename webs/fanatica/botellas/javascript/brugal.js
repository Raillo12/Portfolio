const imgs = [
	'brugal/añejo.png',
	'brugal/reserva.png',
	'brugal/blanco.png',
	'brugal/extraviejo.png'
];

const txt = [
	'Ron Brugal Añejo',
	'Ron Brugal Reserva',
	'Ron Brugal Blanco',
	'Ron Brugal Extra Viejo'
];

function verAñejo() {
	var img = document.getElementById('imagen');
	var texto = document.getElementById('ron');

	img.src = imgs[0];
	texto.textContent = txt[0];
}

function verReserva() {
	var img = document.getElementById('imagen');
	var texto = document.getElementById('ron');

	img.src = imgs[1];
	texto.textContent = txt[1];
}

function verBlanco() {
	var img = document.getElementById('imagen');
	var texto = document.getElementById('ron');

	img.src = imgs[2];
	texto.textContent = txt[2];
}

function verExtra() {
	var img = document.getElementById('imagen');
	var texto = document.getElementById('ron');

	img.src = imgs[3];
	texto.textContent = txt[3];
}