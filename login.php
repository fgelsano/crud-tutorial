<?php

session_start();

require "database.php";

$email = $_POST['email'];
$pass = $_POST['password'];

$sql = "SELECT id, first_name, last_name, password, role FROM users WHERE username='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($user = $result->fetch_assoc()) {
      if($user['password'] == $pass){
        $_SESSION['userId'] = $user['id'];
        $_SESSION['firstname'] = $user['first_name'];
        $_SESSION['lastname'] = $user['last_name'];
        $_SESSION['role'] = $user['role'];
        $_SESSION['status'] = "logged in";
        header("Location: ../admin/dashboard.php");
      } else {
        header('location: login-form.php?error=password');
      }
    }
} else {
    echo "Sorry, no user found!";
}
  