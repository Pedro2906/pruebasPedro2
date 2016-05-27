
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
			#cargando {
				width: 100%;
				height: 600px;
				text-align: center;
				background-color: #5DB596;
				position: absolute;
				z-index: 9999;
				vertical-align:middle;
				padding-top: 5%;
				overflow-y:hidden;
			}
			* {
				margin: 0;
			}
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
			<img src="../images/loading (6).gif">
		</div>
		<img id="gatos" src="http://lorempixel.com/800/600/cats" width="60%">
	</body>
</html>