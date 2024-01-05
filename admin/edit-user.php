<?php
session_start();
require "../database.php";

$id = $_GET['id'];

$sql = "SELECT * FROM users WHERE id='$id'";
$result = $conn->query($sql);

$user = $result->fetch_assoc();

var_dump($user['role']);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Edit User</title>
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
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Blogs</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3 <?php echo($role == 0 ? "d-block active" : "d-none") ?>" href="users.php">Users</a>
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
                    <div class="card mx-3">
                        <div class="card-header">
                            New User Form
                        </div>
                        <form action="update-user.php?id=<?php echo($user['id']) ?>" method="post">
                            <div class="card-body">
                                
                                    <div class="row">
                                        <div class="col-8">
                                            <input class="form-control" name="email" type="email" placeholder="Email address" aria-label="default input example" value="<?php echo($user['username']) ?>">
                                        </div>
                                        <div class="col-4">
                                            <input class="form-control" name="password" type="password" placeholder="Password" aria-label="default input example" value="<?php echo($user['password']) ?>">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-6">
                                            <input class="form-control" name="lastname" type="text" placeholder="Last Name" aria-label="default input example" value="<?php echo($user['last_name']) ?>">
                                        </div>
                                        <div class="col-6">
                                            <input class="form-control" name="firstname" type="text" placeholder="First Name" aria-label="default input example" value="<?php echo($user['first_name']) ?>">
                                        </div>
                                    </div>
                                    <div class="form-check form-check-inline mt-3">
                                        <input class="form-check-input" name="role" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="0" <?php echo($user['role'] == 0 ? "checked" : "") ?>>
                                        <label class="form-check-label" for="inlineRadio1"><span class="badge bg-danger">Admin User</span></label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="role" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="1" <?php echo($user['role'] == 1 ? "checked" : "") ?>>
                                        <label class="form-check-label" for="inlineRadio2"><span class="badge bg-warning">Regular user</span></label>
                                    </div>
                            </div>
                            <div class="card-footer">
                                <input type="submit" value="Save User" class="btn btn-primary btn-sm">
                                <a href="users.php" class="btn btn-secondary btn-sm">Back</a>
                            </div>
                        </form>
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