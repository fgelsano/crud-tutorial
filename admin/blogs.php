<?php
    session_start();
    require "../database.php";
    if($_SESSION['role'] != 0){
        header("location: dashboard.php");
    }

    $sql = "SELECT * from users";
    $result = $conn->query($sql);

    $error = false;

    if(isset($_GET['error'])){
        $error = true;
    }

    $blogs = "SELECT * from blogs";
    $blogsResult = $conn->query($blogs);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Users</title>
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
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="users.php">Users</a>
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
                <div class="container-fluid mx-3">
                    <div class="container mt-3">
                        <div class="alert alert-danger <?php echo($error ? "d-block" : "d-none") ?>">
                            <strong>Error:</strong>
                            Something is wrong with your entry causing the action to fail. Please try again.
                        </div>
                        <div class="row">
                            <div class="offset-md-10 md-2 col-12">
                                <a href="new-blog-form.php" class="btn btn-primary block">New Blog</a>
                            </div>
                        </div>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Action</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Author</th>
                                    <th scope="col">Date Posted</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                if($blogsResult->num_rows > 0){
                                    while($blog = $blogsResult->fetch_assoc()){
                                    $authorId = $blog['author'];
                                    $authorSql = "SELECT first_name, last_name from users where id='$authorId'";
                                    $searchAuthor = $conn->query($authorSql);
                                    $authorName = $searchAuthor->fetch_assoc();
                            ?> 
                                <tr>
                                    <td><a href="">Edit</a> | <a href="">Delete</a></td>
                                    <td width="10%"><img src="<?php echo $blog['img'] ?>" alt="" width="100%"></td>
                                    <td><?php echo $blog['title'] ?></td>
                                    <td><?php echo ($authorName['first_name'] . " " . $authorName['last_name']) ?></td>
                                    <td><?php echo $blog['created_at'] ?></td>
                                </tr>
                            <?php
                                    }
                                }
                            ?>
                                
                            </tbody>
                        </table>
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
