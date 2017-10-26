<?php
if (isset($_POST['submit'])) {
    // If the user has actually submitted
    include_once 'database.php';

    // Inputs

    $first = mysqli_real_escape_string($connection, $_POST['first']);
    $last = mysqli_real_escape_string($connection, $_POST['last']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $uid = mysqli_real_escape_string($connection, $_POST['uid']);
    $pwd = mysqli_real_escape_string($connection, $_POST['pwd']);

    // Errors
    // Check for empty
    if (empty($first) || empty($last) || empty($email) || empty($uid) || empty($pwd) ) {
        // Redirect them to the signup page if empty
       header("Location: ../signup.php?register=empty");
       exit();
    } else {
        // Check if valid
        if (!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last) ) {
            // Redirect them to the signup page if invalid
            header("Location: ../signup.php?register=invalid");
            exit();
        } else {
            // Check if email is valid
             if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                 // Redirect them to the signup page if invalid
                 header("Location: ../signup.php?register=emailinvalid");
                 exit();
             } else {
                 // Check for username
                 $sql = "SELECT * FROM users WHERE user_uid='$uid'";
                 $result = mysqli_query($connection, $sql);
                 $resultCheck = mqsqli_num_rows($result);

                 if ($resultCheck > 0) {
                     // Redirect if username exists
                     header("Location: ../signup.php?register=usernameExists");
                     exit();
                 } else (
                     // Hash the password and insert into the database
                     $hashPwd = password_hash($pwd, PASSWORD_DEFAULT);
                     $sqlInsert = "INSERT INTO users (user_first, user_last, user_email, user_uid, user_pwd) VALUES ('$first', '$last', '$email', '$uid', '$hashPwd');";
                     $result = mysql_query($connection, $sqlInsert);
                     // Signup Success
                     header("Location: ../signup.php?register=successfull");
                     exit();
                 )
             }
        }
    }


} else {
    // Redirect them to the signup page if they haven't
    header("Location: ../signup.php");
    exit();
}