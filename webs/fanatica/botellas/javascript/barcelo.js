const imgs = [
	'barcelo/añejo.png',
	'barcelo/granañejo.png',
	'barcelo/signio.png',
	'barcelo/imperial.png'
];

const txt = [
	'Ron Barceló Añejo',
	'Ron Barceló Gran Añejo',
	'Ron Barceló Signio',
	'Ron Barceló Imperial'
];

function verAñejo() {
	var img = document.getElementById('imagen');
	var texto = document.getElementById('ron');

	img.src = imgs[0];
	texto.textContent = txt[0];
}

function verGran() {
	var img = document.getElementById('imagen');
	var texto = document.getElementById('ron');

	img.src = imgs[1];
	texto.textContent = txt[1];
}

function verSignio() {
	var img = document.getElementById('imagen');
	var texto = document.getElementById('ron');

	img.src = imgs[2];
	texto.textContent = txt[2];
}

function verImperial() {
	var img = document.getElementById('imagen');
	var texto = document.getElementById('ron');

	img.src = imgs[3];
	texto.textContent = txt[3];
}