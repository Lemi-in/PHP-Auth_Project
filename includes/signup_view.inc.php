<?php

declare(strict_types=1);

function signup_input() {


    if (isset($_SESSION["signup_data"]["username"]) && isset($_SESSION["errors_signup"]["username_taken"])) {
        echo '<input type="text" id="username" name="username" placeholder="Enter your username" value="' . $_SESSION["signup_data"]["username"] . '">';
    } else {
        echo '<input type="text" id="username" name="username" placeholder="Enter your username">';
    }

    echo ' <input type="pwd" id="pwd" name="pwd" placeholder="Enter your password" >';

    if (isset($_SESSION["signup_data"]["email"]) && isset($_SESSION["errors_signup"]["email_used"]) && isset($_SESSION["errors_signup"]["invalid_email"])) {
        echo '<input type="text" id="email" name="email" placeholder="Enter your email" value="' . $_SESSION["signup_data"]["email"] . '">';
    } else {
        echo '<input type="text" id="email" name="email" placeholder="Enter your email">';
    }

}

function check_signup_errors() {
    if (isset($_SESSION["signup_error"])) {
        $errors = $_SESSION["signup_error"];
        unset($_SESSION["signup_error"]);


        foreach ($errors as $error){
            echo '<p class = "form-error">' . $error . '</p>';
        }
    } else if (isset($_GET["signup"])) {
        if ($_GET["signup"] === "success") {
            echo '<p class = "form-success">Signup successful</p>';
        }
    }
}