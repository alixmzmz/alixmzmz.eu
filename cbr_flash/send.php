<?php
if(isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["message"]) ){
    $fecha = date("D-M-y H:i");
	$mymail = "lorem@ipsum.net";
	$subject = "Desde el Sitio.. =)";
	$contenido = $_POST["nombre"]." Escribio :\n";
	$contenido .= $_POST["mensaje"]."\n\n";
	$contenido .= "el mensaje se escribio el ".$fecha;
	$header = "From:".$_POST["mail"]."\nReply-To:".$_POST["mail"]."\n";
	$header .= "X-Mailer:PHP/".phpversion()."\n";
	$header .= "Mime-Version: 1.0\n";
	$header .= "Content-Type: text/plain";
	mail($mymail, $subject, utf8_decode($contenido) ,$header);
	echo "&estatus=ok&";
}
?>