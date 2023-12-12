<?php
	
	//Datos del Formulario capturando data

	$name=$_POST['name'];
	$email=$_POST['email'];
	$telefono=$_POST['telefono'];
	$message=$_POST['message'];

	// crear variable para el receptor de correo
	$to = "adm@maderaverdehotel.com.pe";

	//Se imprime el mensaje a enviar.
	//datos del cliente

	//crear estructura del formulario.
	$subject = "Hotel Madera Verde - Formulario Web"; 
	
	//MENSAJE DE CORREO ELECTRÓNICO
	$message = "
	
	<h2>Informaci&oacute;n de Cont&aacute;cto</h2>

	<table>
		<tr>
	   		<td><b>Nombre :</b></td><td> $name </td>
	  	</tr>
	  	<tr>
	    	<td><b>Correo Electronico :</b></td><td> $email </td>
	  	</tr>
	  <tr>
	    	<td><b>N° Telefono :</b></td><td> $telefono </td>
	  </tr>
	  <tr>
	    	<td><b>MENSAJE :</b></td><td> $message </td>
	  </tr>
	</table>

	<p> <b> Madera Verde </b> </p>
	";

	// Crear la cabecera del mensaje y formato
	//header('Content-Type: text/html; charset=utf-8');
	$header = "MIME-Version: 1.0\r\n";
	$header = 'From: '.$email."\r\n".
	$header .= 'Bcc: adm.lima@maderaverdehotel.com.pe' . "\r\n"; 
	$header .= 'Content-Type: text/html; charset=utf-8' . "\r\n";
	
	if(@mail($to, $subject, $message, $header))
	 
	{
		echo '<script language="javascript"> alert("El mensaje ha sido enviado correctamente."); </script>';
		echo '<script language="JavaScript"> window.location.href ="http://maderaverdehotel.com.pe/" </script>';
	//	header('location:www.lagranjavilla.com');
	}
	else
	{
		echo "Por favor verifica la informacion";
	}

?>