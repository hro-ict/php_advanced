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

// Get submitted form data
$postData = array();
if(!empty($sessData['postData'])){
    $postData = $sessData['postData'];
    unset($_SESSION['postData']);
}
?>

<div class="row p-5 bg-secondary">
    <div class=" head">

        <div class="container mt-5" style="margin-right: 25%; margin-left: 25%">
             <span class="badge bg-danger ">
            <h3 class=" gw-bold text-white text-center">Add New Article</h3>
        </span>
        </div>



        <!-- Back link -->
        <div class="float-right">
            <a href="admin.php" class="btn btn-success"><i class="back"></i> Back</a>
        </div>
    </div>

    <!-- Status message -->
    <?php if(!empty($statusMsg)){ ?>
        <div class="alert alert-<?php echo $status; ?>"><?php echo $statusMsg; ?></div>
    <?php } ?>

    <div class="col-p-5">
        <form method="post" action="action.php" class="form">
            <div class="form-group mt-5">
                <label class="fw-bold text-white">Title</label>
                <input type="text" class="form-control" name="title" value="<?php echo !empty($postData['title'])?$postData['title']:''; ?>" required="">
            </div>
            <div class="form-group">
                <label class="fw-bold text-white mt-3 ">Category</label>
                <input type="text" class="form-control" name="category" value="<?php echo !empty($postData['category'])?$postData['category']:''; ?>" required="">
            </div>
            <div class="form-group">
                <label class="fw-bold text-white mt-3 ">Text</label>
                <textarea name="text" class="form-control md-textarea" rows="20" required="">
                <?php echo !empty($postData['text'])?$postData['text']:''; ?>
                </textarea>



            </div>
            <input type="hidden" name="action_type" value="add"/>
            <input type="submit" class="form-control btn mt-3 btn-primary " name="submit" value="Add Article"/>
        </form>
    </div>
</div>


