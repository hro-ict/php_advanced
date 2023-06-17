<?php
// Start session
session_start();
//include "header.php";
require realpath('vendor/autoload.php');

// Get data from session
$sessData = !empty($_SESSION['sessData'])?$_SESSION['sessData']:'';

// Get status from session
if(!empty($sessData['status']['msg'])){
    $statusMsg = $sessData['status']['msg'];
    $status = $sessData['status']['type'];
    unset($_SESSION['sessData']['status']);
}

// Include and initialize DB class
//require_once 'DB_class.php';
use DB_namespace\DB;

$db = new DB();


// Fetch the user data by ID
if(!empty($_GET['id'])){
    $conditons = array(
        'where' => array(
            'id' => $_GET['id']
        ),
        'return_type' => 'single'
    );
    $userData = $db->getRows('users', $conditons);
}

// Redirect to list page if invalid request submitted
if(empty($userData)){
    header("Location: index.php");
    exit;
}

// Get submitted form data
$postData = array();
if(!empty($sessData['postData'])){
    $postData = $sessData['postData'];
    unset($_SESSION['postData']);
}
?>

<div class="row bg-dark">
    <div class="col-md-12 head">
        <h5>Edit User</h5>

        <!-- Back link -->
        <div class="float-right mt-5 ms-5">
            <a href="index.php" class="btn btn-success"><i class="back"></i> Back</a>
        </div>
    </div>

    <!-- Status message -->
    <?php if(!empty($statusMsg)){ ?>
        <div class="alert alert-<?php echo $status; ?>"><?php echo $statusMsg; ?></div>
    <?php } ?>

    <div class="col-md-12 p-5">
        <form method="post" action="action.php" class="form mt-5">
            <div class="form-group">
                <label class="fw-bold text-white">Title</label>
                <input type="text" class="form-control" name="title" value="<?php echo !empty($postData['title'])?$postData['title']:$userData['title']; ?>" required="">
            </div>
            <div class="form-group">
                <label class="fw-bold text-white mt-3">Category</label>
                <input type="text" class="form-control" name="category" value="<?php echo !empty($postData['category'])?$postData['category']:$userData['category']; ?>" required="">
            </div>
            <div class="form-group">
                <label class="fw-bold text-white mt-3">Text</label>





                <textarea cols="30" rows="10"  class="form-control p-0" name="text"  required="">
                <?php echo !empty($postData['text'])?$postData['text']:$userData['text']; ?>

                </textarea>
            </div>
            <input type="hidden" name="id" value="<?php echo $userData['id']; ?>"/>
            <input type="hidden" name="action_type" value="edit"/>
            <input type="submit" class="form-control btn btn-primary mt-3" name="submit" value="Update Article"/>
        </form>
    </div>
</div>
