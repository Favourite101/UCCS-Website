<?php
    $gname = $_POST['gname'];
    $gemail = $_POST['gemail'];
    $cname = $_POST['cname'];
    $cage = $_POST['cage'];
    $tmessage = $_POST['tmessage'];
    $to = "greatuccschools@gmail.com";
    $subject = "$gname on behalf of $cname";
    $message = "Guardian Name: $gname\nGuardian Email: $gemail\nChild Name: $cname\nChild Age: $cage\nMessage: $tmessage";
