<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];

    try {
        require_once "dbh.inc.php";
        require_once "signup_model.inc.php";
        require_once "signup_contr.inc.php";
        
        //Error handlers
        $errors = [];
        if (is_input_empty($username, $pwd, $email)) {
            $errors["empty_input"] = "Fill in all fields:";
        }
        if (is_email_invalid($email) !== false) {
            $errors["invalid_email"] = "use valid email:";
        }
        if (get_username($pdo,$username)) {
            $errors["username_taken"] = "username already taken:";
        }
        if (is_email_registered($pdo, $email)) {
            $errors["email_used"] = "Email already registered:";
        }
    require_once 'config_session.inc.php';
    if ($errors) {
        $_SESSION["errors_signup"] = $errors;
        $signupData = [
            "username" => $username,
            "email" => $email,
        ];

        $_SESSION["signup_data"] = $signupData;
        header("Location: ../signup.php");

        die();
    }   
    create_user($pdo, $username, $email, $pwd);

    header("Location: ../signup.php?signup=success");
    $pdo = null;
    $stmt = null;
    die();

    } catch (PDOException $th) {
        die("connection failed " . $th -> getMessage());
    }
} else{
    header("Location: ../index.php");
    die();
}

