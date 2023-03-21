<?php
//Load Composer's autoloader
require("vendor/autoload.php");

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\SMTP;
//use PHPMailer\PHPMailer\Exception;

function sendMail($subject, $body, $email, $name, $html = false){

    //Configuracion inicial del servidor de correos
    $phpmailer = new PHPMailer();
    $phpmailer->isSMTP();
    $phpmailer->Host = 'smtp.mailtrap.io';
    $phpmailer->SMTPAuth = true;
    $phpmailer->Port = 0000;
    $phpmailer->Username = 'XXX';
    $phpmailer->Password = 'XXX';

    

    //Añadiendo destinatarios
    
    //to
    $phpmailer->setFrom('contact@miempresa.com', 'Mi empresa'); // este correo lo edita gmail
    
    //from
    $phpmailer->addAddress($email, $name); //a esta direccion de correo llega el correo

    //Definiendo el contenido de mi email
    $phpmailer->isHTML($html);                                  //Set email format to HTML
    $phpmailer->Subject = $subject;
    $phpmailer->Body    = $body;    

    //Mandar el email
    $phpmailer->send();
}
?>
