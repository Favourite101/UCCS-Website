<?php
    $gname = $_POST['gname'];
    $gemail = $_POST['gemail'];
    $cname = $_POST['cname'];
    $cage = $_POST['cage'];
    $tmessage = $_POST['tmessage'];
    $to = "greatuccschools@gmail.com";
    $subject = "$gname on behalf of $cname";
    $message = "Guardian Name: $gname\nGuardian Email: $gemail\nChild Name: $cname\nChild Age: $cage\nMessage: $tmessage";

    $postData = http_build_query([
        'task' => $subject,
        'due' => $message,
        'email' => $to
    ]);
    
    $context = stream_context_create([
        'http' => [
            'method' => 'POST',
            'header' => "Content-Type: application/x-www-form-urlencoded\r\n",
            'content' => $postData
        ]
    ]);
    
    $response = file_get_contents(getenv($LOGIC_APP_URL), false, $context);

    if ($response !== false) {
        // Simple success check (limited information)
        echo "Data submitted successfully!"; // Replace with your desired action
    } else {
        // Handle potential errors during request
        echo "Error submitting data. Please try again."; // Replace with your desired error message
    }