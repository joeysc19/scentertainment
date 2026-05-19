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
