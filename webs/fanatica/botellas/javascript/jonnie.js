const imgs = [
	'jonnie/red.png',
	'jonnie/black.png',
	'jonnie/green.png',
	'jonnie/blue.png'
];

const txt = [
	'Red Label Whisky',
	'Black Label Whisky',
	'Green Label Whisky',
	'Blue Label Whisky'
];

function verRed() {
	var img = document.getElementById('imagen');
	var texto = document.getElementById('whisky');

	img.src = imgs[0];
	texto.textContent = txt[0];
}

function verBlack() {
	var img = document.getElementById('imagen');
	var texto = document.getElementById('whisky');

	img.src = imgs[1];
	texto.textContent = txt[1];
}

function verGreen() {
	var img = document.getElementById('imagen');
	var texto = document.getElementById('whisky');

	img.src = imgs[2];
	texto.textContent = txt[2];
}

function verBlue() {
	var img = document.getElementById('imagen');
	var texto = document.getElementById('whisky');

	img.src = imgs[3];
	texto.textContent = txt[3];
}