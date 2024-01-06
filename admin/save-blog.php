<?php
session_start();
require "../database.php";

$title   = $_POST['blog-title'];
$body  = $_POST['blog-body'];
$img      = $_FILES['blog-img'];
$authorId = $_SESSION['userId'];
$created_at = date('Y-m-d H:i:s');
$updated_at = date('Y-m-d H:i:s');

$target_dir = "assets/uploads/";
$target_file = $target_dir . basename($_FILES["blog-img"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["blog-img"]["tmp_name"]);
  if($check !== false) {
    $uploadOk = 1;
    
    // Check file size
    if ($_FILES["blog-img"]["size"] > 500000) {
        header("location: new-blog-form.php?error=too-large");
        $uploadOk = 0;
    }
    
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        header("location: new-blog-form.php?error=invalid-file");
        $uploadOk = 0;
    }
    
    if ($uploadOk == 0) {
        header("location: new-blog-form.php?error=upload-failed");
    } else {
        if (move_uploaded_file($_FILES["blog-img"]["tmp_name"], $target_file)) {
            // echo "The file ". htmlspecialchars( basename( $_FILES["blog-img"]["name"])). " has been uploaded.";
            header("location: blogs.php?blog=saved");
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
  } else {
    header("location: new-blog-form.php?error=not-img");
    $uploadOk = 0;
  }
}

var_dump('niabot na ko diri!');

// $sql = "INSERT INTO blogs (title, body, img, author, created_at) VALUES ('$title', '$body', '$target_file', '$authorId', '$created_at')";

// if ($conn->query($sql)) {
//     header("location: blogs.php?save=true");
// } else {
//     header("location: new-blog-form.php?error=save-failed");
// }
  