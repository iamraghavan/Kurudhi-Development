<?php

$login_error_message = '';
$register_error_message = '';
$register_success_message = '';

// check Register request
if (!empty($_POST['Submit'])) {
    // validated user input
    if ($_POST['username'] == "") {
        $register_error_message = 'First name field is required!';
    } else if ($_POST['email'] == "") {
        $register_error_message = 'Email field is required!';
    } else if ($_POST['password'] == "") {
        $register_error_message = 'Password field is required!';
    } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $register_error_message = 'Invalid email address!';
    } else if ($app->isEmail($_POST['email'])) {
        $register_error_message = 'Email is already in use!';
    } else {
        if ($app->Register($_POST['username'], $_POST['email'], $_POST['password'])) {
            // show success message and ask user to check email for verification link
            $register_success_message = 'Your account is created successfully, please check your email for verification link to activate your account.';
        }
    }
}

?>