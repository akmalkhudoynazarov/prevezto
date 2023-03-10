<?php
// Get the form data
$name = $_POST['name'];
$tel = $_POST['tel'];
$email = $_POST['email'];
$wherefrom = $_POST['wherefrom'];
$whereto = $_POST['whereto'];
$message = $_POST['message'];

// Validate the name and email
if (empty($name) || empty($email)) {
  // Send an error response
  $response = ['message' => 'Please provide your name and email.'];
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  // Send an error response
  $response = ['message' => 'Please provide a valid email address.'];
} else {
  // Send the input data to the mail address
  $to = 'digitalwebproducts@gmail.com';
  $subject = 'New Form Submission';
  $body = "Name: $name\nTel: $tel\nEmail: $email\nWherefrom: $wherefrom\nWhereto: $whereto\nMessage: $message";
  $headers = "From: $name <$email>";

  if (mail($to, $subject, $body, $headers)) {
    // Send a success response
    $response = ['message' => 'Your form has been submitted successfully. We will get back to you soon.'];
  } else {
    // Send an error response
    $response = ['message' => 'An error occurred while sending the form data. Please try again later.'];
  }
}

// Set the response header
header('Content-Type: application/json');

// Send the response data
echo json_encode($response);
