<?php

if (isset($_POST["submit"])){

  include_once "dbh.inc.php";
  $uid = mysqli_real_escape_string($conn, $_POST["uid"]);
  $email = mysqli_real_escape_string($conn, $_POST["email"]);
  $pwd = mysqli_real_escape_string($conn, $_POST["pwd"]);

  if (empty($uid) || empty($email) || empty($pwd)) {
    // change index.html to index.php
    header("Location: ../index.html?signup=empty")
    exit();
  } else {
    // Check if input characters are valid
    if (!preg_match("/^[a-zA-z]*$/", $uid)) {
      header("Location: ../index.html?signup=invalid")
      exit();

    } else {
      //Check if email is valid
      if (filter_var($email, FILTER_VALIDATE_EMAIL)){
        header("Location: ../index.html?signup=email")
        exit();

      }else {
        $sql = "SELECT * FROM users WHERE user_uid= 'uid'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0) {
          header("Location: ../index.html?signup=usertaken")
          exit();

        } else {
          // hash the password
          $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
          // Insert the user into the database
          $sql = "INSERT INTO users (user_email,user_uid, user_pwd) VALUES ('$uid', '$email',"$pwd")";
          mysqli_quert($conn, $sql);
          header("Location: ../index.html?signup=success")
          exit();
        }
      }
    }
  }

} else{
  header("Location:../index.html");
  exit();
}
