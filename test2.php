<?php



require  "test.php";

use MyApp\Logger;
use MyApp\Notifier;
use MyApp\User;




$logger = new Logger();
$logger->log("Log this message");

$notifier = new Notifier();
$notifier->notify("Notify this message");

$user = new User("John");
$user->log("Log this message");
$user->notify("Notify this message");