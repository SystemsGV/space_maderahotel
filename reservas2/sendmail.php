<?php
$name = $_POST['name'];
$email = $_POST['email'];
$telephone = $_POST['telephone'];
$country = $_POST['country'];
$inparty = $_POST['inparty'];
$arrival = $_POST['arrival'];
$departure = $_POST['departure'];
$request = $_POST['request'];


$msg = "<font face=’Verdana’ size=’3'><b>Reservation Form</b></font><br><hr><p>";
$msg .= "<font face=’Verdana’ size=’1'><b>Name:</b><font color=#ff0000> \t$name</font></font><br>";
$msg .= "<font face=’Verdana’ size=’1'><b>E-mail:</b><font color=#ff0000> \t$email</font></font><br>";
$msg .= "<font face=’Verdana’ size=’1'><b>Telephone:</b><font color=#ff0000> \t$telephone</font></font><br>";
$msg .= "<font face=’Verdana’ size=’1'><b>Country:</b><font color=#ff0000> \t$country</font></font><br>";
$msg .= "<font face=’Verdana’ size=’1'><b>Inparty:</b><font color=#ff0000> \t$inparty</font></font><br>";
$msg .= "<font face=’Verdana’ size=’1'><b>Arrival date:</b><font color=#ff0000> \t$arrival</font></font><br>";
$msg .= "<font face=’Verdana’ size=’1'><b>Departure:</b><font color=#ff0000> \t$departure</font></font><br>";
$msg .= "<font face=’Verdana’ size=’1'><b>Request:</b><font color=#ff0000> \t$request</font></font><br>";

$mensagem = "$msg";
$rem = "$email";
$dest = "roca.salazarocampo87@gmail.com";
$subject = "Rio Apartments Rental: Reservation Form";
$headers  = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
$headers .= "From: $email <$name>\r\n";
if(!mail($dest,$subject,$mensagem,$headers)){
print "Sorry, your e-mail was not sent.";
} else {
echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL=http://www.rioapartmentsrental.com/email_sucess.html'>";

}
?>