<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $logicAppUrl = getenv('LOGIC_APP_URL');
        $gname = $_POST['gname'];
        $gemail = $_POST['gemail'];
        $cname = $_POST['cname'];
        $cage = $_POST['cage'];
        $tmessage = $_POST['tmessage'];
        $subject = "$gname on behalf of $cname";
        $message = "Guardian Name: $gname\nGuardian Email: $gemail\nChild Name: $cname\nChild Age: $cage\nMessage: $tmessage";

        $postData = http_build_query([
            'subject' => $subject,
            'body' => $message
        ]);
        
        $context = stream_context_create([
            'http' => [
                'method' => 'POST',
                'header' => "Content-Type: application/x-www-form-urlencoded\r\n",
                'content' => $postData
            ]
        ]);
        
        $response = file_get_contents($logicAppUrl, false, $context);
    }