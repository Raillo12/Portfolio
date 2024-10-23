let cont = 0;

function verBotellas() {
	document.getElementById('db');
	document.getElementById('o1');

	cont++;

	if (cont == 1) {
		db.innerHTML = `
				    <br><a href='botellas/jack.html'><b>Jack Daniels</b></a><br>
				    <a href='botellas/jonnie.html'><b>Johnnie Walker</b></a><br>
				    <a href='botellas/jameson.html'><b>Jameson</b></a><br>
				    <a href='botellas/barcelo.html'><b>Barceló</b></a><br>
				    <a href='botellas/brugal.html'><b>Brugal</b></a><br>
				    <a href='botellas/ciroc.html'><b>Ciroc</b></a><br>
				    <a href='botellas/befeter.html'><b>Beefeater</b></a><br>
		`;

		o1.innerHTML = "Ocultar Tipos";	
	} else {
		db.innerHTML = " ";
		o1.innerHTML = "Ver Tipos";
		cont = 0;
	}
}

function verCocteles() {
	document.getElementById('dc');
	document.getElementById('o2');

	cont++;

	if (cont == 1) {
		dc.innerHTML = `
				    <br><a href='cocteles/mojito.html'><b>Mojito</b></a><br>
				    <a href='cocteles/piña.html'><b>Piña Colada</b></a><br>
				    <a href='cocteles/sanf.html'><b>San Francisco</b></a><br>
				    <a href='cocteles/daikiri.html'><b>Daikiri</b></a><br>
				    <a href='cocteles/caipi.html'><b>Caipirinha</b></a><br>
				    <a href='cocteles/sex.html'><b>Sex on the Beach</b></a><br>
				    <a href='cocteles/aperol.html'><b>Aperol Spritz</b></a><br>
		`;

		o2.innerHTML = "Ocultar Tipos";	
	} else {
		dc.innerHTML = " ";
		o2.innerHTML = "Ver Tipos";
		cont = 0;
	}
}

function verShishas() {
	document.getElementById('ds');
	document.getElementById('o3');

	cont++;

	if (cont == 1) {
		ds.innerHTML = `
				    <br><a href='shishas/white.html'><b>White Cake</b></a><br>
				    <a href='shishas/moon.html'><b>Moon Dream</b></a><br>
				    <a href='shishas/queen.html'><b>Dancing Queen</b></a><br>
				    <a href='shishas/nana.html'><b>Black Nana</b></a><br>
				    <a href='shishas/blue.html'><b>Blue Yellow</b></a><br>
				    <a href='shishas/apple.html'><b>Doble Manzana</b></a><br>
				    <a href='shishas/lkill.html'><b>Lady Killer</b></a><br>
		`;

		o3.innerHTML = "Ocultar Tipos";	
	} else {
		ds.innerHTML = " ";
		o3.innerHTML = "Ver Tipos";
		cont = 0;
	}
}