<?php

include 'includes/signup_view.inc.php';
include 'includes/config_session.inc.php';
include 'includes/signup.inc.php';
 
?>

<!DOCTYPE html>
<html lang="en"> n
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-Up Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="signup-container"> 
        <h2>Login</h2>
        <form action="includes/login.inc.php" method="post">

            <input type="text" id="username" name="username" placeholder="Enter your username" >
            <input type="password" id="password" name="password" placeholder="Enter your password" >

            <!-- Submit Button -->
            <button type="submit" class="submit-btn">Login</button>
        </form>
    </div>
        <div class="signup-container">

        <h2>Sign Up</h2>
        <form action="includes/signup.inc.php" method="post" >
        <?php
        signup_input()
        ?>
            <!-- Submit Button -->
            <button type="submit" class="submit-btn">Sign Up</button>
        </form>

    <?php
    check_signup_errors();
    ?>
    </div>




</body>
</html>
