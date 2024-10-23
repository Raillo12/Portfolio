const imgs = ['mercurial.jpg', 'nemeziz.png', 'disruptor.png'];
const botines = ["Nike Mercurial Superfly", "Adidas Nemeziz Sg Pro", "Fila Disruptor II"];

function verBotinNike() {
	var img = document.getElementById('imagen');
	var botin = document.getElementById('texto');

	imagen.src = imgs[0];
	texto.innerHTML = botines[0];
}

function verBotinAdidas() {
	var img = document.getElementById('imagen');
	var botin = document.getElementById('texto');

	imagen.src = imgs[1];
	texto.innerHTML = botines[1];
}

function verBotinFila() {
	var img = document.getElementById('imagen');
	var botin = document.getElementById('texto');

	imagen.src = imgs[2];
	texto.innerHTML = botines[2];
}