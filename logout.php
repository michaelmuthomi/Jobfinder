<?php
// Start the session
session_start();

// Perform logout actions
// For example, you can unset or destroy session variables, clear session data, etc.
session_unset();
session_destroy();

// Redirect the user to the login page or any other desired page
header('Location: login');
exit;
?>
