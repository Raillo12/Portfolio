const imgs = [
	'befeter/dry.png',
	'befeter/black.png',
	'befeter/cero.png',
	'befeter/pink.png'
];

const txt = [
	'Beefeater London Dry Gin',
	'Beefeater Black',
	'Beefeater 0.0',
	'Beefeater Pink Strawberry'
];

function verDry() {
	var img = document.getElementById('imagen');
	var texto = document.getElementById('gin');

	img.src = imgs[0];
	texto.textContent = txt[0];
}

function verBlack() {
	var img = document.getElementById('imagen');
	var texto = document.getElementById('gin');

	img.src = imgs[1];
	texto.textContent = txt[1];
}

function verCero() {
	var img = document.getElementById('imagen');
	var texto = document.getElementById('gin');

	img.src = imgs[2];
	texto.textContent = txt[2];
}

function verPink() {
	var img = document.getElementById('imagen');
	var texto = document.getElementById('gin');

	img.src = imgs[3];
	texto.textContent = txt[3];
}