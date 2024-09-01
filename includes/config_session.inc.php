<?php

ini_set('sessoin.use_only_cookies', 1);
ini_set('sessoin.use_strict_mode', 1);

session_set_cookie_params([
    'lifetime' => 1800,
    'domain' => 'localhost',
    'path' => '/',
    'secure' => true,
    'httponly' => true,
]);

session_start();
if (!isset($_SESSION["last_regeneration"])) {
    regenerate_session();

} else {
    $interval = 60 * 30;
    if (time() - $_SESSION["last_regeneration"] >= $interval) {
        regenerate_session();
    }
}

function regenerate_session() {
    session_regenerate_id();
    $_SESSION["last_regeneration"] = time();
}