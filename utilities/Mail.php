<?php


class Mail
{

    public function sendMail($naam, $email, $telefoon, $onderwerp, $bericht){
        $to = "info@gameplayparty.com";
        $phone = $telefoon;
        $subject = $onderwerp;
        $msg = $bericht;

        $message = '<html lang="nl-NL"><body>';
        $message .= '<img src="../assets/img/logo.svg" alt="Logo" />';
        $message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
        $message .= "<tr style='background: #eee;'><td><strong>Name:</strong> </td><td>" . $naam . "</td></tr>";
        $message .= "<tr><td><strong>Email:</strong> </td><td>" . $email . "</td></tr>";
        $message .= "<tr><td><strong>Bericht:</strong> </td><td>" . $msg . "</td></tr>";
        $message .= "</table>";
        $message .= "</body></html>";

        $headers = "From: $email" . "\r\n";
        $headers .= "Telefoon: $phone" . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

        mail($to,$subject,$message,$headers);
    }

}