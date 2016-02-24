<?php
	include_once('variables.php'); //Include Environment variables
?>
<!doctype html>
<!--[if lt IE 8 ]><html lang="en" class="no-js ie ie7 dark"><![endif]-->
<!--[if IE 8 ]><html lang="en" class="no-js ie dark"><![endif]-->
<!--[if (gt IE 8)|!(IE)]><!--><html lang="en" class="no-js dark"><!--<![endif]-->
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	
	<title>Iniciar Sesión</title>
	<meta name="description" content="">
	<meta name="author" content="">
	
	<!-- Combined stylesheets load -->
	<link href="css/mini74d5.css?files=reset,common,form,standard,special-pages" rel="stylesheet" type="text/css">
    <link href="css/aporte.css" rel="stylesheet" type="text/css">
		
	<!-- Modernizr for support detection, all javascript libs are moved right above </body> for better performance -->
	<script src="js/libs/modernizr.custom.min.js"></script>
	<script src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
	<script type="text/javascript">
	var server = "<?php echo $SERVER; ?>";
	$(document).ready(function(){
		$(".full-width").keyup(function (event) {
			if(event.which == 13)
				$("#enter").click();
		});
	});
	</script>
	<script src="js/login.js"></script>
	<!--
	
	
	
	-->
	
</head>

<!-- the 'special-page' class is only an identifier for scripts -->
<body class="special-page login-bg dark">
<!-- The template uses conditional comments to add wrappers div for ie8 and ie7 - just add .ie, .ie7 or .ie6 prefix to your css selectors when needed -->
<!--[if lt IE 9]><div class="ie"><![endif]-->
<!--[if lt IE 8]><div class="ie7"><![endif]-->

	<section id="message" class="logo">

		<img src="images/fake-logo.png" alt="Logo">
	</section>
	
	<section id="login-block">
		<div class="block-border"><div class="block-content">
			
			<!--
			IE7 compatibility: if you want to remove the <h1>,
			add style="zoom:1" to the above .block-content div
			-->
			<h1>Ingreso al sistema</h1>
			<div class="block-header">
            	<div class="no_usuario"><?php if (isset($_GET['us'])) echo "Usuario o contraseña incorrectos"; ?></div>
            </div>
				
			<form class="form with-margin" name="login-form" id="login-form" method="post" action="#">
				<div id="loginUsuario">
				<input type="hidden" name="a" id="a" value="send">
					<p class="inline-small-label">
						<label for="v_usuario"><span class="big">Usuario</span></label>
						<input type="text" name="login" id="v_usuario" class="full-width" value="" maxlength="100">
					</p>
					<p class="inline-small-label">
						<label for="v_clave"><span class="big">Contraseña</span></label>
						<input type="password" name="pass" id="v_clave" class="full-width" value="" maxlength="50">
					</p>
					
					<button type="button" onclick="loginUsuario()" class="float-right" id="enter">Entrar</button>
					<br><br>
				</div>
			</form>
		</div></div>
	</section>
	
	
</body>
</html>
