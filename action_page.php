<?php
// Check if the form was submitted via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Collect and sanitize input data to prevent security vulnerabilities
    $name = htmlspecialchars(trim($_POST['user_name']));
    $email = filter_var(trim($_POST['user_email']), FILTER_SANITIZE_EMAIL);

    // Validate that fields are not empty
    if (empty($name) || empty($email)) {
        echo "Please fill in all required fields.";
        exit;
    }

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
        exit;
    }

    // Process the data (Example: Display a success message)
    echo "<h1>Thank you, " . $name . "!</h1>";
    echo "<p>Your email (" . $email . ") has been received.</p>";
} else {
    // Redirect users who try to access the file directly
    echo "Direct access not allowed.";
}
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // 1. Collect and sanitize input data
    $name = htmlspecialchars(trim($_POST['user_name']));
    $email = filter_var(trim($_POST['user_email']), FILTER_SANITIZE_EMAIL);

    // 2. Validate inputs
    if (empty($name) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid input. Please go back and try again.";
        exit;
    }

    // 3. Set up email details
    $to = "asap@asapentertainment.com.au"; // <-- REPLACE WITH YOUR EMAIL
    $subject = "New Form Submission from " . $name;
    
    // 4. Construct the message body
    $message = "You have received a new message from your website form.\n\n";
    $message .= "Name: " . $name . "\n";
    $message .= "Email: " . $email . "\n";

    // 5. Set email headers
    $headers = "From: webmaster@yourdomain.com\r\n"; // <-- USE A DOMAIN EMAIL
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // 6. Send the email
    if (mail($to, $subject, $message, $headers)) {
        echo "<h1>Success!</h1><p>Your message has been sent.</p>";
    } else {
        echo "<h1>Error</h1><p>Failed to send email. Check server configuration.</p>";
    }
} else {
    echo "Direct access not allowed.";
}
?>
