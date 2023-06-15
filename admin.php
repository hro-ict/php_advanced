<?php
// Start session
session_start();


if (  !$_SESSION['valid']){
   // header('Refresh: 1; URL = login.php');
    header("Location: login.php");
}

//include "header.php";

require realpath('vendor/autoload.php');

//session_destroy();

// Get data from session
$sessData = !empty($_SESSION['sessData'])?$_SESSION['sessData']:'';

// Get status from session
if(!empty($sessData['status']['msg'])){
    $statusMsg = $sessData['status']['msg'];
    $status = $sessData['status']['type'];
    unset($_SESSION['sessData']['status']);
}

// Include and initialize DB class
//require 'src/DB_class.php';
use DB_namespace\DB;
$db = new DB();

// Fetch the users data
$users = $db->getRows('users', array('order_by'=>'id DESC'));

// Retrieve status message from session
if(!empty($_SESSION['statusMsg'])){
    echo '<p>'.$_SESSION['statusMsg'].'</p>';
    unset($_SESSION['statusMsg']);
}
?>

<nav class="navbar fixed-top navbar-light bg-info">
    <div class="container-fluid ">






    </div>
</nav>

<div class="row mt-5 pt-5">
    <div class="col-md-12 head">

        <!-- Add link -->
        <div class="d-flex justify-content-between ps-5 pe-5">
            <div class="ms-5">
                <a href="add.php" class="btn btn-success"><i class="plus"></i> New Article</a>
            </div>

            <div class="ms-5">
                <h1><span class="badge bg-info">My Articles</span></h1>
            </div>
            <div class="me-5">
                <a href="logout.php" class="btn btn-danger"><i class="plus"></i> Logout</a>
            </div>

        </div>
    </div>

    <!-- Status message -->
    <?php if(!empty($statusMsg)){ ?>
        <div class=" mt-3 mb-3 alert alert-<?php echo $status; ?>"><?php echo $statusMsg; ?></div>

   <?php
        header('Refresh: 3; URL = admin.php');
        ?>

    <?php } ?>

    <!-- List the users -->

    <?php if(!empty($users)){ $i=0; foreach($users as $row){ $i++; ?>
        <div class="row mt-3 mb-3" >
            <div class="col-6" style="margin-left: 25%; margin-right: 25%">
                <div class="card ">
                    <div class="card-header show-hide">
                        <h3 class="text-center ">
                            <?php echo $row['title']; ?>
                        </h3>
                    </div>
                    <div class="card-body">
                        <span class="badge bg-primary">Created at</span>
                        <span class="fw-bold"> <?php echo $row['created']; ?></span> <br>
                        <span class="badge bg-danger">Category</span>
                        <span class="fw-bold"> <?php echo $row['category']; ?></span>
                        <p class="d-none">
                            <?php echo $row['text']; ?>
                        </p>

                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-warning"><i class="bi bi-pencil-fill"></i></a>
                        <a href="action.php?action_type=delete&id=<?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure to delete data?');"><i class="bi bi-trash"></i></a>
                    </div>
                </div>
            </div>
        </div>




    <?php } }else{ ?>
        <tr><td colspan="5">No user(s) found...</td></tr>
    <?php }  ?>

</div>

<script>
    $("body").on("click", ".show-hide", function (){

        $(this).closest("p").addClass("d-none")
        var show_hide= $(this).next().children("p")
        if (show_hide.hasClass("d-none")){
            show_hide.removeClass("d-none")
        }

        else {
            show_hide.addClass("d-none")
        }


    })
</script>
