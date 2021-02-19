<?php

session_start();
session_unset();
session_destroy();

header('Location: http://localhost/learnphp/harry_login/login.php');
exit;


?>