<?php
	require("Db.class.php");

	$db = new Db();

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	    
	    $usuario = $_REQUEST['login'];
	    $contrasena = $_REQUEST['password'];

	    $usu = $db->query("SELECT * FROM Usuario WHERE usuario = :usu AND contrasena = :pw", array('usu' => $usuario, 'pw' => MD5($contrasena)));

	    if (empty($usu)) {
	        echo "Usuario y/o contraseña incorrectos.";
	    } else {
	        echo "<h1>Conexión exitosa.</h1>";
	    }
	    
	}
?>
<!DOCTYPE html>
<!DOCTYPE html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if IE 9]>    <html class="no-js ie9" lang="en"> <![endif]-->
<!-- Consider adding an manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 9]><!--> <html class="no-js" lang="en" itemscope itemtype="http://schema.org/Product"> <!--<![endif]-->
<head>
		<meta charset="utf-8">
	
	<!-- Use the .htaccess and remove these lines to avoid edge case issues.
			 More info: h5bp.com/b/78 -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title>Powered By Gumby</title>
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="humans.txt">

	<link rel="shortcut icon" href="favicon.png" type="image/x-icon" />

	<!-- Facebook Metadata /-->
	<meta property="fb:page_id" content="" />
	<meta property="og:image" content="" />
	<meta property="og:description" content=""/>
	<meta property="og:title" content=""/>

	<!-- Google+ Metadata /-->
	<meta itemprop="name" content="">
	<meta itemprop="description" content="">
	<meta itemprop="image" content="">

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">

	<!-- We highly recommend you use SASS and write your custom styles in sass/_custom.scss.
		 However, there is a blank style.css in the css directory should you prefer -->
	<link rel="stylesheet" href="css/gumby.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<!-- <link rel="stylesheet" href="css/style.css"> -->

	<script src="js/libs/modernizr-2.6.2.min.js"></script>
</head>
<script type="text/javascript">
	function validar() {
		var formulario = document.getElementById('form1');
		var usu = formulario.login.value;
		var pwd = formulario.password.value;
		var mens = '';
		
		if (usu.length == 0) {
			mens += 'El campo Usuario está vacio.\n';
		}
		if (pwd.length == 0) {
			mens += 'El campo Contraseña está vacio.\n';
		}

		if (mens.length > 0) {
			alert(mens);
		} else {
			form1.submit();
		}
	}
</script>
<body>

<!-- Grab Google CDN's jQuery, fall back to local if offline -->
	<!-- 2.0 for modern browsers, 1.10 for .oldie -->
	<script>
	var oldieCheck = Boolean(document.getElementsByTagName('html')[0].className.match(/\soldie\s/g));
	if(!oldieCheck) {
	document.write('<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"><\/script>');
	} else {
	document.write('<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"><\/script>');
	}
	</script>
	<script>
	if(!window.jQuery) {
	if(!oldieCheck) {
	  document.write('<script src="js/libs/jquery-2.0.2.min.js"><\/script>');
	} else {
	  document.write('<script src="js/libs/jquery-1.10.1.min.js"><\/script>');
	}
	}
	</script>

	<!--
	Include gumby.js followed by UI modules followed by gumby.init.js
	Or concatenate and minify into a single file -->
	<script gumby-touch="js/libs" src="js/libs/gumby.js"></script>
	<script src="js/libs/ui/gumby.retina.js"></script>
	<script src="js/libs/ui/gumby.fixed.js"></script>
	<script src="js/libs/ui/gumby.skiplink.js"></script>
	<script src="js/libs/ui/gumby.toggleswitch.js"></script>
	<script src="js/libs/ui/gumby.checkbox.js"></script>
	<script src="js/libs/ui/gumby.radiobtn.js"></script>
	<script src="js/libs/ui/gumby.tabs.js"></script>
	<script src="js/libs/ui/gumby.navbar.js"></script>
	<script src="js/libs/ui/jquery.validation.js"></script>
	<script src="js/libs/gumby.init.js"></script>

	<!--
	Google's recommended deferred loading of JS
	gumby.min.js contains gumby.js, all UI modules and gumby.init.js

	Note: If you opt to use this method of defered loading,
	ensure that any javascript essential to the initial
	display of the page is included separately in a normal
	script tag.

	<script type="text/javascript">
	function downloadJSAtOnload() {
	var element = document.createElement("script");
	element.src = "js/libs/gumby.min.js";
	document.body.appendChild(element);
	}
	if (window.addEventListener)
	window.addEventListener("load", downloadJSAtOnload, false);
	else if (window.attachEvent)
	window.attachEvent("onload", downloadJSAtOnload);
	else window.onload = downloadJSAtOnload;
	</script> -->

	<script src="js/plugins.js"></script>
	<script src="js/main.js"></script>

	<!-- Change UA-XXXXX-X to be your site's ID -->
	<!--<script>
	window._gaq = [['_setAccount','UAXXXXXXXX1'],['_trackPageview'],['_trackPageLoadTime']];
	Modernizr.load({
	  load: ('https:' == location.protocol ? '//ssl' : '//www') + '.google-analytics.com/ga.js'
	});
	</script>-->

	<!-- Prompt IE 6 users to install Chrome Frame. Remove this if you want to support IE 6.
	   chromium.org/developers/how-tos/chrome-frame-getting-started -->
	<!--[if lt IE 7 ]>
	<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
	<script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
	<![endif]-->

<!-- <form method="POST" action="" id="form1" name="form1">

	<table border="1" cellspacing="0" align="center">
		<tr>
			<td>Usuario:</td>
			<td><input type="text" name="login"/></td>
		</tr>
		<tr>
			<td>Contrase&ntilde;a:</td>
			<td><input type="password" name="password"/></td>
		</tr>
		<tr align="center">
			<td><button type="reset">Limpiar</button></td>
			<td><button type="button" onclick="validar();">Enviar</button></td>
		</tr>
	</table>

</form> -->
<form method="POST" action="" id="form1" name="form1">
	<div class="row">
	  <div class="four columns">
	  	<div class="field">
	    	<td><input class="field" type="text" placeholder="Usuario" name="login"/></td>
	  	</div>
	  </div>
	</div>
	<div class="row">
	  <div class="four columns">
	  	<div class="field">
	    	<td><input class="field" type="password" placeholder="Contraseña" name="password"/></td>
	    </div>
	  </div>
	</div>
	<div class="row">
	  <div class="four columns">
	  	<div class="medium default btn"><td><button type="reset">Limpiar</button></td></div>
	  	<div class="medium success btn"><a href="Demo.html" type="button" onclick="validar();">Enviar</a></div>
	  </div>
	</div>
</form>

<div>
	<li class="success label"><a href="crear.php">Crear Nuevo Usuario</a></li>
</div>
		

</body>
</html>