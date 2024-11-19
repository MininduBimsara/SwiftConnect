<?php

    session_start();
    session_unset();
    session_destroy();

    // Clear cookies on logout
    setcookie("email", "", time() - 3600, "/");
    setcookie("password", "", time() - 3600, "/");

    echo "<script>
    window.location.href = 'http://localhost/SwiftConnect/home.php';
    </script>";

?>