<?php
// Replace with your Logic App URL and details
    $logicAppUrl = "https://prod-02.westus2.logic.azure.com:443/workflows/9e307297c1f74d0c9b3ecadd5872e0a0/triggers/When_a_HTTP_request_is_received/paths/invoke?api-version=2016-10-01&sp=%2Ftriggers%2FWhen_a_HTTP_request_is_received%2Frun&sv=1.0&sig=KgjW0PXQhBerq5Cu6YKyJmYlOLPdLZ1TJuDCCMCHZzg";
    $gname = $_POST['gname'];
    $gemail = $_POST['gemail'];
    $cname = $_POST['cname'];
    $cage = $_POST['cage'];
    $tmessage = $_POST['tmessage'];
    $to = "greatuccschools@gmail.com";
    $subject = "$gname on behalf of $cname";
    $message = "Guardian Name: $gname\nGuardian Email: $gemail\nChild Name: $cname\nChild Age: $cage\nMessage: $tmessage";

    // Prepare JSON data
    $data = [
        "task" => $subject,
        "due" => $message,
        "email" => $to,
    ];

    try {
    // Use Guzzle for HTTP requests
    require 'vendor/autoload.php'; // Assuming Guzzle is installed via Composer

    $client = new GuzzleHttp\Client();

    $response = $client->post($logicAppUrl, [
        'headers' => [
        'Content-Type' => 'application/json',
        ],
        'body' => json_encode($data),
    ]);

    // Check for successful response
    if ($response->getStatusCode() === 200) {
        echo "Task submitted successfully!";
    } else {
        echo "Error submitting task: " . $response->getBody();
    }
    } catch (Exception $e) {
    echo "Error: " . $e->getMessage();
    }
        // $gname = $_POST['gname'];
        // $gemail = $_POST['gemail'];
        // $cname = $_POST['cname'];
        // $cage = $_POST['cage'];
        // $tmessage = $_POST['tmessage'];
        
        // $to = "greatuccschools@gmail.com";
        // $subject = "Website Contact Form: $gname on behalf of $cname";
        // $message = "Guardian Name: $gname\nGuardian Email: $gemail\nChild Name: $cname\nChild Age: $cage\nMessage: $tmessage";
        // $headers = "UCCSchools <admin@uccschools.com> \r\n";
        // $headers .= "Reply-To: $gemail \r\n";
        // $headers .= "Content-Type: text/plain; charset=UTF-8 \r\n";
        // if (mail($to, $subject, $message, $headers)) {
        //     echo "Thank you for contacting us! We will get back to you soon.";
        //     } else {
        //     echo "There was an error sending your message. Please try again later.";
        //     }
    ?>
