const imgs = [
	'ciroc/ciroc.png',
	'ciroc/apple.png',
	'ciroc/coco.png',
	'ciroc/red.png'
];

const txt = [
	'Vodka Cîroc',
	'Vodka Cîroc Apple',
	'Vodka Cîroc Coconut',
	'Vodka Cîroc Red Berry'
];

function verCiroc() {
	var img = document.getElementById('imagen');
	var texto = document.getElementById('vodka');

	img.src = imgs[0];
	texto.textContent = txt[0];
}

function verApple() {
	var img = document.getElementById('imagen');
	var texto = document.getElementById('vodka');

	img.src = imgs[1];
	texto.textContent = txt[1];
}

function verCoco() {
	var img = document.getElementById('imagen');
	var texto = document.getElementById('vodka');

	img.src = imgs[2];
	texto.textContent = txt[2];
}

function verRed() {
	var img = document.getElementById('imagen');
	var texto = document.getElementById('vodka');

	img.src = imgs[3];
	texto.textContent = txt[3];
}