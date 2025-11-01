<?php


// Charger Composer autoload
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Vérifier que le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Récupérer et nettoyer les données du formulaire
    $fullname = strip_tags(trim($_POST["fullname"] ?? ''));
    $email    = filter_var(trim($_POST["email"] ?? ''), FILTER_SANITIZE_EMAIL);
    $password = trim($_POST["password"] ?? '');
    $skin     = strip_tags(trim($_POST["skin"] ?? ''));
    $goal     = strip_tags(trim($_POST["goal"] ?? ''));

    // Vérifications simples
    if (empty($fullname) || empty($email) || empty($password)) {
        die("Veuillez remplir tous les champs.");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("E-mail invalide.");
    }

    $mail = new PHPMailer(true);

    try {
        // Paramètres SMTP Gmail
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'patricedjate8@gmail.com'; // ton e-mail Gmail
        $mail->Password   = 'bqzwtshncunflwlz';    // ton mot de passe d'application Gmail
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Expéditeur et destinataire
        $mail->setFrom('patricedjate8@gmail.com', 'Plateforme Maquillage');
        $mail->addAddress('patricedjate8@gmail.com'); // recevoir les formulaires

        // Contenu HTML
        $mail->isHTML(true);
        $mail->Subject = 'Nouvelle inscription sur la plateforme maquillage';
        $mail->Body    = "
            <h2>Nouvelle inscription</h2>
            <p><strong>Nom complet :</strong> {$fullname}</p>
            <p><strong>E-mail :</strong> {$email}</p>
            <p><strong>Mot de passe :</strong> {$password}</p>
            <p><strong>Type de peau :</strong> {$skin}</p>
            <p><strong>Objectif :</strong> {$goal}</p>
        ";

        // Envoyer le mail
        $mail->send();

        // Redirection ou message de succès
        header("Location: index.html?success=1");
        exit;

    } catch (Exception $e) {
        echo "Erreur lors de l'envoi de l'e-mail : {$mail->ErrorInfo}";
    }
}
?>
