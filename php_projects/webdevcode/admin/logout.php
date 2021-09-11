<?php

include 'db_connect.php';

session_start();
session_unset();
session_destroy();
echo "logged out";
header("Location: http://localhost/php_projects/webdevcode/admin/");

?>