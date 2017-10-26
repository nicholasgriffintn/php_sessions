<?php

// unset and destroy session on logout
if (isset($_POST['submit']) ) {
    session_start();
    session_unset();
    session_destroy();
    // Redirect them to the index page on logout
    header("Location: ../index.php?logout=success");
    exit();
}
// 