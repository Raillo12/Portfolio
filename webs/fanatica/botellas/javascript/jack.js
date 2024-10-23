const imgs = [
	'jack/jack.png',
	'jack/bounded.png',
	'jack/apple.png',
	'jack/miel.png'
];

const txt = [
	'Jack Daniels Whisky',
	'Jack Daniels Whisky Bounded',
	'Jack Daniels Whisky Apple',
	'Jack Daniels Whisky Honey'
];

function verJack() {
	var img = document.getElementById('imagen');
	var texto = document.getElementById('whisky');

	img.src = imgs[0];
	texto.textContent = txt[0];
}

function verBounded() {
	var img = document.getElementById('imagen');
	var texto = document.getElementById('whisky');

	img.src = imgs[1];
	texto.textContent = txt[1];
}

function verApple() {
	var img = document.getElementById('imagen');
	var texto = document.getElementById('whisky');

	img.src = imgs[2];
	texto.textContent = txt[2];
}

function verMiel() {
	var img = document.getElementById('imagen');
	var texto = document.getElementById('whisky');

	img.src = imgs[3];
	texto.textContent = txt[3];
}