<?php

$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$tel = filter_var(trim($_POST['tel']), FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
$message = filter_var(trim($_POST['message']), FILTER_SANITIZE_FULL_SPECIAL_CHARS);

$to = "objednavky@prevezto.sk";
$subject = "Nová správa z Prevezto.sk";
$body = "Name: $name\nPhone: $tel\nEmail: $email\nMessage: $message";

$headers = "From: $email";

if (mail($to, $subject, $body, $headers)) {
  $response = array('success' => true);
} else {
  $response = array('success' => false);
}

echo json_encode($response);
