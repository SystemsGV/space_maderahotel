<?php
	// crear variable para el receptor de correo. Imprimir todo el formulario de html en php
	$email_to = "sugerencias@maderaverdehotel.com.pe";
	//Datos del Cliente
	$first_name = $_POST['nombre'];
	$first_ape = $_POST['apellidos'];
	$tipo = $_POST['tipo'];
	$tipo_numero = $_POST['numero'];
	$departa = $_POST['depart'];
	$distrito = $_POST['distrito'];
	$domicilio = $_POST['domicilio'];
	$telefono = $_POST['telefono'];
    $email_from = $_POST['email'];
	//Información General:
	$subject = $_POST['tipoderq'];
    $opcion = $_POST['opcion'];
	$descripcion = $_POST['descripcion'];
	$monto = $_POST['monto'];	
	//Detalle de su reclamo:
	$tipoderq = $_POST['subject'];
	$fecha = $_POST['fecha'];
	$message = $_POST['message'];
	//Creando estructura de html para los datos
    $email_message ="
        <h2>Datos de la Persona que presenta el Reclamo:</h2>
		<table>
			<tr>
				<td><b>Nombres :</b></td>
				<td> $first_name</td> <td><b>Apellidos :</b> $first_ape</td>
			</tr>
			<tr>
				<td><b>Tipo de Documento :</b></td>
				<td> $tipo</td> <td><b>Numero :</b> $tipo_numero</td>
			</tr>
			<tr>
				<td><b>Departamento :</b></td>
				<td> $departa</td> <td><b>Distrito :</b> $distrito</td>
			</tr>
			<tr>
				<td><b>Domicilio :</b></td>
				<td> $domicilio</td> <td><b>Telefono :</b> $telefono</td>
			</tr>
			<tr>
				<td><b>Email :</b></td>
				<td> $email_from</td> <td></td>
			</tr>
		</table>
	    <h2>Informaci&oacute;n General:</h2>
		<table>
			<tr>
				<td><b>Identificaci&oacute;n del bien contratado :</b></td>
				<td> $opcion</td> <td><b>Local :</b> $tipoderq</td> 
			</tr>
			<tr>
				<td><b>Monto Reclamado :</b></td>
				<td> $monto</td> <td><b>Descripcion :</b> $descripcion</td> <td></td>
			</tr>
		</table>
		<h2>Detalle de su reclamo:</h2>
		<table>
			<tr>
				<td><b>Detalle :</b></td>
				<td> $subject</td> <td><b>Fecha de la solicitud :</b> $fecha</td> <td></td>
			</tr>
			<tr>
				<td><b>Detalle del Mensaje :</b></td>
				<td> $message</td> <td></td> <td></td>
			</tr>
		</table>
		<table>
			<tr>
				<td></td>
				<td><h2><b>Hotel Madera Verde<h2></b></td> <td></td>
			</tr>
		</table>";
		
	$header = "MIME-Version: 1.0\r\n";
	$header = 'From: '.$email_from."\r\n".
	$header .= 'Bcc: adm@maderaverdehotel.com.pe, informes@maderaverdehotel.com.pe' . "\r\n";
	$header .= 'Content-Type: text/html; charset=utf-8' . "\r\n";
	$header .= 'Cc: '.$email_from. "\r\n";
	$header .= 'X-Mailer: PHP/' . phpversion() ."\r\n";
	
	if(@mail($email_to, $subject, $email_message, $header))
	{
		//Sale un alerta de confirmación de que el mensaje se ha enviado.
		echo '<script language="javascript"> alert("El mensaje ha sido enviado correctamente."); </script>';
		//Redirección a la pagina que gusten
		echo '<script language="JavaScript"> window.location.href ="https://www.maderaverdehotel.com.pe/" </script>';
		//header('location:www.lagranjavilla/zonaecologica/');
	}
	else { echo "Por favor verifica la informacion"; }
?>