<?php
    $gname = $_POST['gname'];
    $gemail = $_POST['gemail'];
    $cname = $_POST['cname'];
    $cage = $_POST['cage'];
    $tmessage = $_POST['tmessage'];
    
    $to = "greatuccschools@gmail.com";
    $subject = "Website Contact Form: $gname on behalf of $cname";
    $message = "Guardian Name: $gname\nGuardian Email: $gemail\nChild Name: $cname\nChild Age: $cage\nMessage: $tmessage";
    $headers = "From: noreply@uccschools.com \r\n";
    $headers .= "Reply-To: $gemail \r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8 \r\n";
    if (mail($to, $subject, $message, $headers)) {
        echo "Thank you for contacting us! We will get back to you soon.";
        } else {
        echo "There was an error sending your message. Please try again later.";
        }
