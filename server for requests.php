<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $phone = htmlspecialchars($_POST['phone']);
    $email = htmlspecialchars($_POST['email']);
    $vehicle = htmlspecialchars($_POST['vehicle']);
    $service = htmlspecialchars($_POST['service']);
    $message = htmlspecialchars($_POST['message']);
    
    $to = "your@email.com";
    $subject = "New Service Request from $name";
    $body = "Name: $name\nPhone: $phone\nEmail: $email\nVehicle: $vehicle\nService Needed: $service\nMessage: $message";
    $headers = "From: $email";
    
    if (mail($to, $subject, $body, $headers)) {
        header("Location: thank-you.html");
    } else {
        echo "Error sending message.";
    }
}
?>