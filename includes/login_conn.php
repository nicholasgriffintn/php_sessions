<?php

session_start();

if (isset($_POST['submit'])) {
    include 'database.php';

    // Inputs
    $uid = mysqli_real_escape_string($connection, $_POST['$uid']);
    $pwd = mysqli_real_escape_string($connection, $_POST['$pwd']);

    // Errors
    // Check for empty inputs
    if (empty($uid) || empty($pwd)) {
        // Redirect them to the index page if empty
       header("Location: ../index.php?login=empty");
       exit();
    } else {
        // Check if username exists
        $sql = "SELECT * FROM users WHERE user_uid='$uid'";
        $result = mysqli_query($connection, $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck < 1) {
            // Redirect them to the index page if user doesn't exist
            header("Location: ../index.php?login=error");
            exit();
        } else {
            if ($row = mysqli_fetch_assoc($result)) {
                // Retrieve and dehash the password
                $hashPwdCheck = password_verify($pwd, $row['user_pwd']);
                if ($hashPwdCheck == false) {
                    // Redirect them to the index page if password doesn't match
                    header("Location: ../index.php?login=error");
                    exit();
                } elseif ($hashPwdCheck == true) {
                    // Log in the user
                    $_SESSION['u_id'] = $row['user_id'];
                    $_SESSION['u_first'] = $row['user_first'];
                    $_SESSION['u_last'] = $row['user_last'];
                    $_SESSION['u_email'] = $row['user_email'];
                    $_SESSION['u_uid'] = $row['user_uid'];
                    // Redirect them to the index page if success
                    header("Location: ../index.php?login=success");
                    exit();
                }
            }
        }
    }

}