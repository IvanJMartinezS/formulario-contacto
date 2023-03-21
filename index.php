<?php

require("mail.php");

//var_dump($_POST);
//die();

function validate($name, $email, $subject, $message, $form){
    return !empty($name) && !empty($email) && !empty($subject) && !empty($message);
}

$status = "";

if( isset($_POST["form"]) ){

    //if(validate($_POST["$name"], $_POST["$email"], $_POST["$subject"], $_POST["$message"])){
    if( validate(... $_POST) ){

        $name = $_POST["name"];
        $email = $_POST["email"];
        $subject = $_POST["subject"];
        $message = $_POST["message"];

        $body = "$name <$email> te envia el siguiente mensaje: <br><br> $message";
        /*  // Sanitizando los datos
        $name = htmlentities($_POST['name']);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $subject = htmlentities($_POST['subject']);
        $message = htmlentities($_POST['message']); */
        

        //evita las etiquetas <> para ataques XSS con script maliciosos de javascript
        //hay varias formas de evitar esto -> htmlspecialchars() y strip_tags()
        
        /* $name = strip_tags($_POST["name"]);
        $email = strip_tags($_POST["email"]);
        $subject = strip_tags($_POST["subject"]);
        $message = strip_tags($_POST["message"]); */
        //Mandar el correo
        sendMail($subject, $body, $email, $name, true);


        $status = "succes";

    }else{
        $status = "danger";
    }

}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Formulario de contacto</title>
</head>
<body>

    <?php if($status == "danger"): ?>

    <div class="alert danger">
        <span>Surgió un problema</span>
    </div>

    <?php endif; ?>
    
    <?php if($status == "succes"): ?>

    <div class="alert success">
        <span>¡Mensaje enviado con éxito!</span>
    </div>

    <?php endif; ?>


    <form action="./" method="post">

        <h1>¡Contáctanos!</h1>

        <div class="input-group">
            <label for="name">Nombre:</label>
            <input type="text" name="name" id="name">
        </div>

        <div class="input-group">
            <label for="email">Correo:</label>
            <input type="email" name="email" id="email">
        </div>

        <div class="input-group">
            <label for="subject">Asunto:</label>
            <input type="text" name="subject" id="subject">
        </div>

        <div class="input-group">
            <label for="message">Mensaje:</label>
            <textarea name="message" id="message"></textarea>
        </div>

        <div class="button-container">
            <button name="form" type="submit">Enviar</button>
        </div>

        <div class="contact-info">
            
            <div class="info">
                <span><i class="fas fa-map-marker-alt"></i> 13 Saw Mill Circle, North Olmested.</span>
            </div>

            <div class="info">
                <span><i class="fas fa-phone"></i> +1 123 456 7890</span>
            </div>

        </div>

    </form>

    <script src="https://kit.fontawesome.com/bbff992efd.js" crossorigin="anonymous"></script>
    
</body>
</html>