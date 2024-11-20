<?php
// Prevent direct access to this file
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: contact.html");
    exit();
}

// Configure error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Sanitize and validate input data
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Get and sanitize form data
$name = sanitize_input($_POST['name'] ?? '');
$email = sanitize_input($_POST['email'] ?? '');
$subject = sanitize_input($_POST['subject'] ?? '');
$message = sanitize_input($_POST['message'] ?? '');

// Validate email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo json_encode(["status" => "error", "message" => "Invalid email address"]);
    exit();
}

// Prepare email content
$to = "tjdomask@yahoo.com";
$email_subject = "Portfolio Contact: $subject";
$email_body = "You have received a new message from your portfolio website.\n\n".
    "Name: $name\n".
    "Email: $email\n".
    "Subject: $subject\n\n".
    "Message:\n$message";

// Prepare headers
$headers = "From: $email\r\n";
$headers .= "Reply-To: $email\r\n";
$headers .= "X-Mailer: PHP/" . phpversion();

// Send email
try {
    if (mail($to, $email_subject, $email_body, $headers)) {
        http_response_code(200);
        echo json_encode(["status" => "success", "message" => "Message sent successfully!"]);
    } else {
        throw new Exception("Failed to send email");
    }
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(["status" => "error", "message" => "Failed to send message. Please try again later."]);
}
?>
