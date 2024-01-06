<?php 

    require "database.php";
    
    $sql = "SELECT * FROM blogs";
    $result = $conn->query($sql);

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Blogs</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

<div class="container-fluid bg-body-tertiary">
    <div class="container">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">About</a>
                </li>
            </ul>
            <form class="d-flex" role="search">
                <a href="login-form.php" class="btn btn-outline-success" type="submit">Login</a>
            </form>
            </div>
        </div>
        </nav>
    </div>
</div>

<div class="container mt-4">
    <div class="row">
        <?php
            if ($result->num_rows > 0) {
                // output data of each row
                while($blog = $result->fetch_assoc()) {
                    $shortDesc = strlen($blog['body']) > 150 ? substr($blog['body'],0,150)."..." : $blog['body'];
        ?>
                <div class="col-md-4">
                    <div class="card">
                        <img src="/admin/assets/uploads/<?php echo $blog['img'] ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $blog['title'] ?></h5>
                            <p class="card-text"><?php echo $shortDesc ?></p>
                            <a href="#" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
        <?php
                }
            } else {
                echo('<div class="alert alert-info">No blogs at the moment. Check again later...</div>');
            }
        ?>
        
    </div>    
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
</body>
</html>