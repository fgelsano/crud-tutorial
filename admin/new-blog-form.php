<?php
    session_start();
    require "../database.php";
    if($_SESSION['role'] != 0){
        header("location: dashboard.php");
    }

    $sql = "SELECT * from users";
    $result = $conn->query($sql);

    if(isset($_GET['error'])){
        $error = $_GET['error'];
        if($error == "too-large"){
            $errorMsg = "Sorry, your image file is too large. Accepted file size is 5mb.";
        } else if($error == "invalid-file"){
            $errorMsg = "Sorry, your image file is invalid. Accepted files are: png, jpg, jpeg, gif.";
        } else if($error == "not-img"){
            $errorMsg = "Sorry, your file is not an image.";
        } else {
            $errorMsg = "Sorry, something went wrong. Please try again.";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>New Blog</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-white" id="sidebar-wrapper">
                <div class="sidebar-heading border-bottom bg-light">Start Bootstrap</div>
                <div class="list-group list-group-flush">
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="dashboard.php">Dashboard</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3 active" href="#!">Blogs</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3">Users</a>
                </div>
            </div>
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                    <div class="container-fluid">
                        <button class="btn btn-primary" id="sidebarToggle">Toggle Menu</button>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Hi <?php echo $_SESSION['firstname'] ?></a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="logout.php">Logout</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- Page content-->
                <div class="container-fluid mt-5 mx-3">
                    <div class="container">
                        <div class="alert alert-danger mx-3 mb-3 <?php echo(isset($_GET['error']) ? "d-block" : "d-none" ) ?>">
                                <strong>Error: </strong><?php echo isset($errorMsg) ? $errorMsg : ''  ?>
                        </div>
                    
                        <div class="card mx-3">
                            <div class="card-header">
                                New Blog
                            </div>
                            <form action="save-blog.php" method="post" enctype="multipart/form-data">
                                <div class="card-body">
                                        <input class="form-control" name="blog-title" type="text" placeholder="Blog Title" aria-label="default input example">                                    
                                        <div class="form-floating mt-3">
                                            <textarea class="form-control" name="blog-body" placeholder="Type your blog contents here..." id="floatingTextarea" style="height: 100px"></textarea>
                                            <label for="floatingTextarea">Type your blog contents here...</label>
                                        </div>
                                        <div class="my-3">
                                            <input class="form-control" name="blog-img" type="file" id="formFile">
                                        </div>
                                </div>
                                <div class="card-footer">
                                    <input type="submit" class="btn btn-primary" value="Save" name="submit">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
