<?php
session_start(); 
require("botdetect.php"); 


if (isset($_POST['submit'])){
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $mailFrom = $_POST['mail'];
    $message = $_POST['message'];
    
    $mailTo = "contactme@bryanmjerger.net";
    $headers = "From: ".$mailFrom;
    $txt = "You have recieved an Email from ".$name.".\n\n".$message;

    // Captcha validation 
    $ExampleCaptcha = new Captcha("ExampleCaptcha");
    $ExampleCaptcha->UserInputID = "CaptchaCode";
    $isHuman = $ExampleCaptcha->Validate();

    if (!$isHuman) { 
    // Captcha validation failed, redirect back to form page
    header("Location: contact.php?captchaValid=false");
    exit;
}

    mail($mailTo, $subject, $txt, $headers);
    header("location: contact.php?mailsent");
}