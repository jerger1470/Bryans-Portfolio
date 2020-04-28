<?php

if (isset($_POST['submit'])){
    $name = $_POST['name'];
    $mailFrom = $_POST['mail'];
    $message = $_POST['message'];
    
    $mailTo = "contactme@bryanmjerger.net";
    $headers = "From: ".$mailFrom;
    $txt = "You have recieved an Email from ".$name ".\n\n".$message;

    mail($mailTo, $subject, $txt, $headers);
    header("location: contact.php?mailsent");
}