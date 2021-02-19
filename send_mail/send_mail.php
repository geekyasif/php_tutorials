<?php

$to = "mohammadasif08737@gmail.com";
$subject = "Email verification";
$message = "click here to activate your account";
$headers = "from: mdasif08737@gmail.com";

if(mail($to,$subject,$message,$headers)){
    echo "mail sent successfully";
}else{
    die("mail not sent");
}


?>