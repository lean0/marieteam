<?php
session_start ();
require("class/Database.php");
$db = new Database();
$t=time();
if (isset($_SESSION['logged']) && ($t - $_SESSION['logged'] > 1800)) {
    session_destroy();
    session_unset();
}else {$_SESSION['logged'] = time();}