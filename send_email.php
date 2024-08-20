<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];

        $to = "tjdomask@yahoo.com";
        $headers = "From: " . $email;
        $headers .= "Reply-To: " . $email;

        if (mail($to, $subject, $message, $headers)) {
            echo "Email sent successfully!";
        } else {
            echo "Error sending email.";
        }
    }
    ?>
