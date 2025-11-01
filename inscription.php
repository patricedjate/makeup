<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'src/PHPMailer.php';
require 'src/SMTP.php';
require 'src/Exception.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = strip_tags(trim($_POST["fullname"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $password = trim($_POST["password"]);
    $skin = strip_tags(trim($_POST["skin"]));
    $goal = strip_tags(trim($_POST["goal"]));

    if (empty($fullname) || empty($email) || empty($password)) die("Veuillez remplir tous les champs.");
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) die("E-mail invalide.");

    $mail = new PHPMailer(true);

    try {
        // Paramètres SMTP (exemple Gmail)
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'patricedjate8@gmail.com'; // ton e-mail
        $mail->Password   = 'bqzwtshncunflwlz '; // mot de passe d'application Gmail
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        // Destinataire
        $mail->setFrom('patricedjate8@gmail.com', 'Plateforme Maquillage');
        $mail->addAddress('patricedjate8@gmail.com'); // où tu veux recevoir

        // Contenu
        $mail->isHTML(true);
        $mail->Subject = 'Nouvelle inscription sur la plateforme maquillage';
        $mail->Body    = "
            <h2>Nouvelle inscription</h2>
            <p><strong>Nom complet :</strong> $fullname</p>
            <p><strong>E-mail :</strong> $email</p>
            <p><strong>Mot de passe :</strong> $password</p>
            <p><strong>Type de peau :</strong> $skin</p>
            <p><strong>Objectif :</strong> $goal</p>
        ";

        $mail->send();
        header("Location: index.html?success=1");
        exit;
    } catch (Exception $e) {
        echo "Erreur lors de l'envoi de l'e-mail : {$mail->ErrorInfo}";
    }
}
?>
