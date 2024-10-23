const imgs = [
	'jameson/jameson.png',
	'jameson/orange.png',
	'jameson/black.png',
	'jameson/18.png'
];

const txt = [
	'Jameson Whisky',
	'Jameson Whisky Orange',
	'Jameson Whisky Black Barrel',
	'Jameson Whisky 18 Años'
];

function verJameson() {
	var img = document.getElementById('imagen');
	var texto = document.getElementById('whisky');

	img.src = imgs[0];
	texto.textContent = txt[0];
}

function verOrange() {
	var img = document.getElementById('imagen');
	var texto = document.getElementById('whisky');

	img.src = imgs[1];
	texto.textContent = txt[1];
}

function verBlack() {
	var img = document.getElementById('imagen');
	var texto = document.getElementById('whisky');

	img.src = imgs[2];
	texto.textContent = txt[2];
}

function verAños() {
	var img = document.getElementById('imagen');
	var texto = document.getElementById('whisky');

	img.src = imgs[3];
	texto.textContent = txt[3];
}