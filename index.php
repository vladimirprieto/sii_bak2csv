<?php

// error_reporting(E_ERROR | E_WARNING | E_PARSE);

$directorio = __DIR__.'/xml';

//para Windows
// $archivos  = scandir($directorio);


//alternativa *nix
//eliminamos los directorios *nix ".." y "."
$archivos = array_diff( scandir($directorio), ['..', '.'] );

?>

<html>
<body>

	<form action="wrap.php" method="get">
	<table>
		<tr>
			<td>

				listado a obtener:

				<select name="listado">
					<option value="dtes">dtes</option>
					<option value="detalle">detalle</option>
				</select>

			</td>
		</tr>

		<tr>
			<td>
				archivo a analizar:
				<select name="archivo_bak">
				<?php foreach ($archivos as $i => $nombre) { ?>

					<option value="<?= __DIR__.'/xml/'.$nombre ?>"><?= $nombre ?></option>

				</select>
				<?php } ?>

			</td>
		</tr>
	</table>

	<input type="submit" value="vamos!">

	</form>

</body>
</html>