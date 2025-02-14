<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Dotenv\Dotenv;

// Include PHPMailer and dotenv
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';
require 'vendor/autoload.php';

// Load environment variables
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $mail = new PHPMailer(true);

    try {
        // SMTP Configuration
        $mail->isSMTP();
        $mail->Host = $_ENV['SMTP_HOST'];
        $mail->SMTPAuth = true;
        $mail->Username = $_ENV['SMTP_USER'];
        $mail->Password = $_ENV['SMTP_PASS'];
        $mail->SMTPSecure = $_ENV['SMTP_SECURE'];
        $mail->Port = $_ENV['SMTP_PORT'];

        // Sender & Recipient
        $mail->setFrom($_ENV['SMTP_USER'], 'Website Contact Form');
        $mail->addAddress($_ENV['SMTP_USER'], 'Successfull Maswanganyi');
        $mail->addReplyTo($email, $name);

        // Email Content
        $mail->isHTML(true);
        $mail->Subject = "New Message from: $name";
        $mail->Body = "
            <strong>Name:</strong> $name <br>
            <strong>Email:</strong> $email <br>
            <strong>Telephone:</strong> $telephone <br>
            <strong>Subject:</strong> $subject <br>
            <strong>Message:</strong> $message
        ";

        // Send email
        if ($mail->send()) {
            echo "<script>alert('✅ Email sent successfully!'); window.location.href='Contact_me.php';</script>";
        } else {
            echo "<script>alert('❌ Failed to send email.'); window.location.href='Contact_me.php';</script>";
        }
    } catch (Exception $e) {
        echo "<script>alert('❌ Email could not be sent. Error: {$mail->ErrorInfo}'); window.location.href='Contact_me.php';</script>";
    }
}
?>
