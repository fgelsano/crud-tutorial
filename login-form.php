<?php
    session_start();

    if(isset($_SESSION['status'])){
        if($_SESSION['status'] == "logged in"){
            header("location: admin/dashboard.php");
        }
    }

    if(!empty($_GET['error'])){
        $error = $_GET['error'];
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row mt-5">
            <div class="offset-4 col-md-4">
                <form action="login.php" method="POST">
                    <div class="mb-0">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control mb-0" id="exampleInputEmail1" aria-describedby="emailHelp">                    </div>
                        <small class="text-danger mt-0 <?php echo($error=="username" ? 'd-block' : 'd-none') ?>">Invalid username!</small>
                    <div class="mt-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                        <small class="text-danger mt-0 <?php echo($error=="password" ? 'd-block' : 'd-none') ?>">Invalid password!</small>
                    </div>    
                    <div class="d-grid gap-2 col-12 mt-3">
                        <input class="btn btn-primary" type="submit" value="Login">
                        <a href="index.php" class="btn btn-secondary" type="button">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>