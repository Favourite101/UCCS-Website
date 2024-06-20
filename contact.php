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
    
    $response = file_get_contents("https://prod-02.westus2.logic.azure.com:443/workflows/9e307297c1f74d0c9b3ecadd5872e0a0/triggers/When_a_HTTP_request_is_received/paths/invoke?api-version=2016-10-01&sp=%2Ftriggers%2FWhen_a_HTTP_request_is_received%2Frun&sv=1.0&sig=KgjW0PXQhBerq5Cu6YKyJmYlOLPdLZ1TJuDCCMCHZzg", false, $context);

    if ($response !== false) {
        // Simple success check (limited information)
        echo "Data submitted successfully!"; // Replace with your desired action
    } else {
        // Handle potential errors during request
        echo "Error submitting data. Please try again."; // Replace with your desired error message
    }