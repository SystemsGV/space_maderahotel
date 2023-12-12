<?php 
$mail ='roca.salazarocampo87@gmail.com'; 
$subject ="reservacion on_line"; 
$check_in_date = $_POST['check_in_date']; 
$check_out_date = $_POST['check_out_date']; 
$adults_number = $_POST['adults_number']; 
$children_number = $_POST['children_number']; 
$name = $_POST['name']; 
$telefono = $_POST['telefono']; 
$room = $_POST['room']; 
$email = $_POST['email']; 
$comentario = $_POST['comentario']; 
$asunto="ENVIO CONTACTO"; 


$message = ' ';
$header = 'From: ' . $email . " \r\n"; 
$header .= 'Bcc: sistemas.st@lagranjavilla.com' . "\r\n"; 
$header .= "Content-type: text/html\r\n"; 
$header .= "Mime-Version: 1.0 \r\n";  

"Fecha de ingreso:".$check_in_date. 
"Fecha de salida:".$check_out_date. 
"Cantidad de adultos:".$adults_number. 
"Cantidad de ninos:".$children_number. 
"Nombre:".$name. 
"Telefono:".$telefono. 
"Habitacion:".$room. 
"Codigo_Postal:".$email. 
"E-Mail:".$email. 
"Comentario:".$comentario.""; 
if (@mail($mail, $name, $telefono, $email, $check_in_date, $check_out_date, $adults_number, $children_number, $asunto, $comentario, $header))

{
		echo '<script language="javascript"> alert("El mensaje ha sido enviado correctamente."); </script>';
		echo '<script language="JavaScript"> window.location.href ="http://www.lagranjavilla.com/maderaverde/contactenos/index.html" </script>';
	//	header('location:www.lagranjavilla.com');
	}
?>