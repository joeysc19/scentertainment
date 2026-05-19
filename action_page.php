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



All
Images
Videos
News
More
Sign in


how do i do this? <p>If you click the "Submit" button, the form-data will be sent to a page called "/action_page.php".</p>
To make a form send data to "/action_page.php" when a submit button is clicked, you need to use the HTML <form> element with the action attribute. 
HTML Implementation
html
<form action="/action_page.php" method="post">
  <!-- Input fields go here -->
  <label for="fname">First name:</label><br>
  <input type="text" id="fname" name="fname"><br><br>
  
  <!-- The Submit Button -->
  <input type="submit" value="Submit">
</form>
Use code with caution.
Key Components
action="/action_page.php": Specifies the destination URL where the data is sent.
method="post": Sends the data securely in the background (use "get" if you want data visible in the URL).
name attribute: Required on all inputs so the PHP page can identify the data.
type="submit": Creates the button that triggers the action. 
To help customize this, could you tell me what data fields you want in your form or what server language you are using to handle the data?








7 sites
How to Create a Booking System with HTML Forms
26 Dec 2023 — To submit HTML forms, use the tag with an action attribute to specify the URL where the form data will be sent. Then, use the or t...


LinkedIn
W3Schools Tryit Editor
html > p > This example contains a form with two submit buttons. The first submit button submits the form data to "/action_page. p...

W3Schools
What is the action attribute in an HTML form?
21 July 2022 — The action attribute 📌 The action attribute in a form specifies the URL to which the form's data is sent when submitted, determin...


Facebook
Show all
name and email address
Updated HTML Form
Here is the code updated with input fields specifically for the name and email address:
html
<form action="/action_page.php" method="post">
  <!-- Name Field -->
  <label for="name">Name:</label><br>
  <input type="text" id="name" name="user_name" required><br><br>

  <!-- Email Field -->
  <label for="email">Email Address:</label><br>
  <input type="email" id="email" name="user_email" required><br><br>
  
  <!-- Submit Button -->
  <input type="submit" value="Submit">
</form>
Use code with caution.
Key Changes
type="email": Ensures the browser validates that the user enters a real email format.
required: Prevents the form from submitting if these fields are left empty.
name attributes: Changed to user_name and user_email so your PHP script can easily read them.
Would you like help writing the PHP code for /action_page.php to process this data, or do you need to add styling to make the form look better?




writing php code
To capture and process the name and email data sent from your form, you need to create a file named action_page.php in your root folder.
PHP Implementation
php
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
Use code with caution.
Key Security Features
$_POST: Automatically reads the data sent from your HTML form fields using their name attributes.
htmlspecialchars(): Prevents malicious scripts from running if a user types HTML code into the name field.
FILTER_VALIDATE_EMAIL: Double-checks on the server side that the email is real and properly structured.
What would you like to do with the data next? I can show you how to save it to a database or send it to your inbox as an email.




send it in an email
To send the form data to your email inbox, update your action_page.php file using PHP's native mail() function.
Updated PHP Code
php
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
