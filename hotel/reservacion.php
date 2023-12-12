<?php
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$checkin = $_POST['checkin'];
$checkout = $_POST['checkout'];
$adultos = $_POST['adultos'];
$ninos = $_POST['ninos'];

$fecha = explode('/',$checkin );
$fecha_con_formato = $fecha[1].'/'.$fecha[0].'/'.$fecha[2];

$fecha1 = explode('/',$checkout );
$fecha_con_formato1 = $fecha1[1].'/'.$fecha1[0].'/'.$fecha1[2];

function comprobar_email($email){ 
   	$mail_correcto = 0; 
   	//compruebo unas cosas primeras 
   	if ((strlen($email) >= 6) && (substr_count($email,"@") == 1) && (substr($email,0,1) != "@") && (substr($email,strlen($email)-1,1) != "@")){ 
      	if ((!strstr($email,"'")) && (!strstr($email,"\"")) && (!strstr($email,"\\")) && (!strstr($email,"\$")) && (!strstr($email," "))) { 
         	//miro si tiene caracter . 
         	if (substr_count($email,".")>= 1){ 
            	//obtengo la terminacion del dominio 
            	$term_dom = substr(strrchr ($email, '.'),1); 
            	//compruebo que la terminación del dominio sea correcta 
            	if (strlen($term_dom)>1 && strlen($term_dom)<5 && (!strstr($term_dom,"@")) ){ 
               	//compruebo que lo de antes del dominio sea correcto 
               	$antes_dom = substr($email,0,strlen($email) - strlen($term_dom) - 1); 
               	$caracter_ult = substr($antes_dom,strlen($antes_dom)-1,1); 
               	if ($caracter_ult != "@" && $caracter_ult != "."){ 
                  	$mail_correcto = 1; 
               	} 
            	} 
         	} 
      	} 
   	} 
   	if ($mail_correcto) 
      	return 1; 
   	else 
      	return 0; 
}


$msg = "<font face=’Verdana’ size=’3'><b>Formulario de Reservacion</b></font><br><hr><p>";
$msg .= "<font face=’Verdana’ size=’1'><b>Nombre:</b><font color=#ff0000> \t$nombre</font></font><br>";
$msg .= "<font face=’Verdana’ size=’1'><b>E-mail:</b><font color=#ff0000> \t$email</font></font><br>";
$msg .= "<font face=’Verdana’ size=’1'><b>Telefono:</b><font color=#ff0000> \t$telefono</font></font><br>";
$msg .= "<font face=’Verdana’ size=’1'><b>Fecha de Ingreso:</b><font color=#ff0000> \t$fecha_con_formato</font></font><br>";
$msg .= "<font face=’Verdana’ size=’1'><b>Fecha de Salida:</b><font color=#ff0000> \t$fecha_con_formato1</font></font><br>";
$msg .= "<font face=’Verdana’ size=’1'><b>Numero de Adultos:</b><font color=#ff0000> \t$adultos</font></font><br>";
$msg .= "<font face=’Verdana’ size=’1'><b>Numero de Ni&ntilde;os:</b><font color=#ff0000> \t$ninos</font></font><br>";


$mensagem = "$msg";
$rem = "Enviado desde mi Pagina Web";
$dest = "adm@maderaverdehotel.com.pe";
$subject = "Hotel Madera Verde - Reservaciones";
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
$headers .= 'Bcc: adm.lima@maderaverdehotel.com.pe' . "\r\n";
$headers .= "From: $rem \r\n";
if(!mail($dest,$subject,$mensagem,$headers)){
print "Por favor verifica la informacion";
} else {
echo '<script language="javascript"> alert("El mensaje ha sido enviado correctamente."); </script>';
echo '<script language="JavaScript"> window.location.href ="http://maderaverdehotel.com.pe/" </script>';

}
?>