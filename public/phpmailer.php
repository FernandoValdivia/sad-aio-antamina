<?php
/* if (!isset($_POST['__sname']) &&
    !isset($_POST['__sfullname']) &&
    !isset($_POST['__semail']) &&
    !isset($_POST['__ssubject']) &&
    !isset($_POST['__smessage'])){
        header("Location: /");
} */

if($_SERVER['REQUEST_METHOD'] != 'POST' ){
    header("Location: /" );
}

require 'phpmailer/PHPMailer.php';
require 'phpmailer/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;

/* variables del formulario */
$name = $_POST['__sname'];
$fullname = $_POST['__sfullname'];
$email = $_POST['__semail'];
$message = $_POST['__smessage'];

/* Fecha Actual para el Asunto del Formulario */
date_default_timezone_set('America/Lima');
$fechaActual = date('y-m-d h:i:s');

/* no coloca nombres */
if(empty(trim($name))) $name = 'Anonymous';
if(empty(trim($fullname))) $name = '';

/* cuerpo del correo */
$body = <<<HTML
    <h1>Sugerencia desde la web SAD AIO</h1>
    <h2>De: $name $fullname / $email</h2>
    <h2>Sugerencia:</h2>
    <p>$message</p> 
HTML;

/* PHPMailer */
$mailer = new PHPMailer();
$mailer->CharSet = 'UTF-8';
$mailer->Encoding = 'base64';
$mailer->setFrom($email, "$name $fullname");
$mailer->addAddress('administracion@competitividadccd.com', 'Administración CCD');
$mailer->Subject = "Sugerencia de la web $fechaActual";
$mailer->msgHTML($body);
$mailer->AltBody = strip_tags($body);

$res = $mailer->send();

/* correo enviado o no enviado */
if($res){
    echo'<script type="text/javascript">
        alert("Su sugerencia fue enviada correctamente, muchas gracias por sus comentarios!");
        window.location.href = "/";
        </script>';
} else {
    echo'<script type="text/javascript">
        alert("No se pudo enviar la sugerencia, vuelva a intentarlo");
        window.location.href = "/";
        </script>';
}