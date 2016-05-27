<?php
$seguir = $_REQUEST['seguir'];

if ($seguir == 'sii') {

	$emp_codigoC = $_REQUEST['empresa'];
	require 'PHPMailer-master/class.phpmailer.php';
	require ('bd.php');
	// conecta INFORMIX
	include ('cargaArchTXT.php');
	require ('/var/www/html/control/bd/bdcl.php');
	$flista = "emailsVales.txt";
	$fila = 0;
	$linesl = file($flista);
	$borra = pg_exec($dbc, "DELETE FROM clientemail");
	foreach ($linesl as $line_numl => $linel) {
		//$archtxt=explode(" ",$linel,1);
		//$nui=trim($archtxt[0]);
		$emailAr = trim($linel);
		$fila = $fila + 1;
		$inserta = pg_exec($dbc, "INSERT INTO clientemail (email) VALUES('$emailAr')");
		//include ('IFXsql.php');
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
		<script type="text/javascript">
			$(window).load(function() {
				// Una vez se cargue al completo la página desaparecerá el div "cargando"
				$('#cargando').hide();
			});
		</script>
		<style>
			body {
				background-color: transparent;
				background-image: url("img/wallpaper.jpg");
				/*-webkit-transform: rotate(30deg);
				 -moz-transform: rotate(30deg);
				 -ms-transform: rotate(30deg);
				 -o-transform: rotate(30deg);
				 transform: rotate(30deg);*/
				background-repeat: no-repeat;
				background-position: 50% 50%;
				background-attachment: fixed;
				webkit-background-size: cover;
				-moz-background-size: cover;
				background-size: cover;
				font-family: Arial, Helvetica, sans-serif;
				overflow: auto;div#content {
				display: none;
				font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
				font-size: 14px;
				line-height: 1.428571429;
				color: #333;
				background-color: #fff
			}

		</style>
	</head>
	<body>
		<div id="cargando">
			Cargando...
		</div>
		<img id="gatos" src="http://lorempixel.com/800/600/cats">
		<div class="main" style="text-align: center; width: 80%; padding: 10px;">
		<div class="header" >
			<h1>Cargar Emails Archivo TXT</h1>
		</div>
		<form style="text-align: center; width: 80%; padding-left: 10%;" id='formaImg' name='formaImg' method='POST' action='insertaemail.php' enctype='multipart/form-data' style="width: 100%;" >
			<select id="empresa" name="empresa" required>
				<option value="">Seleccione la empresa</option>
				<?php
				require ('bd.php');
				$qsql = "SELECT emp_nit, emp_nombre, emp_codigo, emp_clave, emp_fechaing, emp_correocont FROM top_empresasval ORDER BY emp_nombre ASC";
				$rsql = ifx_query($qsql, $conn_id);
				while ($rsql && $result = ifx_fetch_row($rsql, 'NEXT')) {
					$num = $num + 1;
					$emp_nit = $result["emp_nit"];
					$emp_codigoL = $result["emp_codigo"];
					$emp_nombre = $result["emp_nombre"];
					$emp_clave = $result["emp_clave"];
					$fch = $result["emp_fechaing"];
					$emp_correocont = $result["emp_correocont"];
					echo "<option value='$emp_codigoL'>$emp_nombre</option>";
				}
				?>
			</select>
			<br>
			<br>
			<input required type="file" name="imagen1" id='imagen1' value=""/>
			<input name='action' type='hidden' value='upload'/>
			<input name="seguir" type="hidden" value="sii">
			<br>
			<br>
			<!--<input class="btn btn-warning btn-lg" name='Submit' type='button' id='Submit' value='Enviar mi Lista'/>-->
			<button class="btn btn-warning btn-lg" type='Submit' id='Submit'>
				cargar archivo
			</button>
			<?php
			if (($men == 's') and ($mE == 's')) {
				echo "<h4 style='color: green;'>Archivo cargado exitosamente!!!<br>Campa&ntilde;a Email Enviada Correctamente!!!";
			} elseif ($men == 'n') {
				echo "<h4 style='color: red;'>Error!!!! al cargar el archivo, extencion no es valida";
			} elseif ($men == 'e') {
				echo "<h4 style='color: red;'>Error!!!! al cargar el archivo";
			}
			?>
			</h4><br><br>
		</form>
	</div>
	</body>
</html>