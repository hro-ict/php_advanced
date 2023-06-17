<?php
// Start session
session_start();

// Include and initialize DB class
//require_once 'DB_class.php';
//use DB_namespace\DB;

require realpath('vendor/autoload.php');
use Login_namespace\Login;
$login = new Login();

$login->getUser("admin", "1234");




