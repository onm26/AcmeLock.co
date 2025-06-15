<?php
// Check that the form was submitted using POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Clean and store user inputs
    $name = htmlspecialchars(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars(trim($_POST["message"]));

    // Validate that all fields are filled and email is correct
    if (!empty($name) && !empty($email) && !empty($message) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<h2>Thank you, $name!</h2><p>Thank you! A representative will be in contact soon.</p>";
    } else {
        echo "<h2>Error:</h2><p>Ensure all fields are filled correctly.</p>";
    }

} else {
    // If the page was accessed directly, not by POST
    echo "<h2>Access Denied</h2><p>This page can only process form submissions.</p>";
}
?>