<?php

require "../database.php";

$lastname   = $_POST['lastname'];
$firstname  = $_POST['firstname'];
$email      = $_POST['email'];
$password   = $_POST['password'];
$role       = $_POST['role'];

$sql = "INSERT INTO users (first_name, last_name, username, password, role) VALUES ('$firstname', '$lastname', '$email', '$password', '$role')";

if ($conn->query($sql)) {
    header("location: users.php");
} else {
    header("location: users.php?error");
}
  