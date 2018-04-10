<?php
	require("Db.class.php");

	// Creates the instance
	$db = new Db();

	//var_dump($_REQUEST);
	//$GLOBALS
	//$_SERVER
	//$_REQUEST
	//$_POST
	//$_GET
	//$_FILES
	//$_ENV
	//$_COOKIE
	//$_SESSION

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	    
	    $usuario = $_REQUEST['user'];
	    $contrasena = $_REQUEST['passwd'];
	    $email = $_REQUEST['email'];

	    $db->bind("usuario", $usuario);
	    $usu = $db->query("SELECT * FROM Usuario WHERE usuario = :usuario");

	    if (empty($usu)) {
	        
	        $insert = $db->query("INSERT INTO Usuario VALUES (:usu, :pw, :email )", array("usu" => $usuario
	        																			 ,"pw" => md5($contrasena)
	        																			 ,"email" => $email));
	        echo "El usuario " . $usuario . " fue creado exitosamente.";

	    } else {
	        echo "El usuario " . $usuario . " ya existe en la Base de Datos.";
	    }
	    
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Crear Usuario</title>
</head>
<script type="text/javascript">
	function validar() {
		var formulario = document.getElementById('form1');
		var usu = formulario.user.value;
		var pwd = formulario.passwd.value;
		var pwd2 = formulario.passwd2.value;
		var mens = '';
		
		if (usu.length == 0) {
			mens += 'El campo Usuario está vacio.\n';
		}
		if (pwd.length == 0) {
			mens += 'El campo Contraseña está vacio.\n';
		}
		if (pwd2.length == 0) {
			mens += 'El campo Confirmación de Contraseña está vacio.\n';
		}

		if (!(pwd == pwd2)) {
			mens += 'Las contraseñas no coinciden.\n';
		}

		if (mens.length > 0) {
			alert(mens);
		} else {
			form1.submit();
		}
	}
</script>
<body>

<form method="post" id="form1" name="form1">
	<table border="1" cellpadding="8" cellspacing="0" align="center">
		<tr>
			<td>Usuario: </td>
			<td><input type="text" name="user" required="required"></td>
		</tr>
		<tr>
			<td>Contraseña: </td>
			<td><input type="password" name="passwd" required="required"></td>
		</tr>
		<tr>
			<td>Confirme la Contraseña: </td>
			<td><input type="password" name="passwd2" required="required"></td>
		</tr>
		<tr>
			<td>Email: </td>
			<td><input type="email" name="email" required="required"></td>
		</tr>
		<tr align="center">
			<td><button type="reset">Limpiar</button></td>
			<td><button type="button" id="crear" onclick="validar()">Crear</button></td>
		</tr>
	</table>
</form>

<p>
	<a href="login.php">Inicio Login</a>
</p>

</body>
</html>