
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>My Blogs</title>
</head>



<nav class="navbar
				navbar-expand-lg
				navbar-light
				bg-light fixed-top mb-5 ">

    <div class="collapse navbar-collapse justify-content-end"
         id="navbarSupportedContent">
        <ul class="navbar-nav">
            <li class="nav-item">

                <?php

                if ( isset( $_SESSION['valid'])){
                  echo  '<span class="badge bg-danger">
                <a class="nav-link active"
                   aria-current="page"
                   href="logout.php">Logout</a>
                    </span>';

                }


                else {
                    echo  '<span class="badge bg-danger">
                <a class="nav-link active"
                   aria-current="page"
                   href="login.php">Login</a>
                    </span>';
                }
                ?>


            </li>
            <li class="nav-item ms-3 me-5">
                <span class="badge bg-info">
                <a class="nav-link" href="contact.php">Contact</a>
                    </span>
            </li>
            <li class="nav-item">
                <a class="navbar-brand" href="#"><img
                        src=
                        "./images/myblog2.PNG"
                        alt="" width="100"
                        height="30">
                </a>
            </li>
        </ul>
    </div>
</nav>