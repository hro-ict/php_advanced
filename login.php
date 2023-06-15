<?php
// Start session
//session_start();
ob_start();
session_start();
//include "header.php";

if (  $_SESSION['valid']){
    // header('Refresh: 1; URL = login.php');
    header("Location: admin.php");
}


require realpath('vendor/autoload.php');


use Login_namespace\Login;
$login = new Login();


$msg = '';

if (isset($_POST['login']) && !empty($_POST['username'])
    && !empty($_POST['password'])) {

    $username= $_POST['username'];
    $password= $_POST['password'];

    if ($login->getUser($username, $password)){
        $_SESSION['valid'] = true;
        $_SESSION['timeout'] = time();
        $_SESSION['username'] = $username;


        $msg= '<h4 class="text-center mt-5 ms-5 "><span class="alert alert-info ">Login successfully</span></h4>';
        header('Refresh: 3; URL = admin.php');
    }

 else {
     $msg= '<h4 class="text-center mt-5 ms-5 "><span class="alert alert-danger ">Wrong username or Password</span></h4>';
    }


 echo $msg;


}

?>

<div class="container ps-5 pe-5 pt-5 mt-5">
    <form action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);
    ?>" method="post">

        <div class="form-outline mb-4">
            <input name="username" type="text" id="form2Example1" class="form-control" />
            <label class="form-label" for="form2Example1">Username</label>
        </div>

        <!-- Password input -->
        <div class="form-outline mb-4">
            <input name="password" type="password" id="form2Example2" class="form-control" />
            <label class="form-label" for="form2Example2">Password</label>
        </div>

        <!-- 2 column grid layout for inline styling -->
        <div class="row mb-4">
            <div class="col d-flex justify-content-center">
                <!-- Checkbox -->

            </div>


        </div>

        <!-- Submit button -->
        <button name="login" type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>


    </form>
</div>





