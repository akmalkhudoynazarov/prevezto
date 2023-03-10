<?php
session_start(); // Start the session

if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $tel = $_POST['tel'];
    $email = $_POST['email'];
    $wherefrom = $_POST['wherefrom'];
    $whereto = $_POST['whereto'];
    $message = $_POST['message'];

    // Error handling
    if (empty($fname) || empty($email) || empty($message)) {
        $_SESSION['response'] = 'Chyba: Vyplňte všetky povinné polia.';
        header("Location: index.php");
        exit();
    } else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['response'] = 'Chyba: Neplatná e-mailová adresa.';
            header("Location: index.php");
            exit();
        } else {
            // Mail send
            $mailto = 'objednavky@prevezto.sk';
            $subject = 'Sprava';
            $headers = 'Od: Prevezto';
            $txt = 'Dostali ste e-mail od' . $fname . ".\n\n" . $message;

            mail($mailto, $subject, $txt, $headers);
            $_SESSION['response'] = 'Správa bola úspešne odoslaná.';
            header("Location: index.php");
            exit();
        }
    }
} else {
    header("Location: index.php");
    exit();
}
