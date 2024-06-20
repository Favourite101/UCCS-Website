<?php
// Replace with your Logic App URL and details
    $gname = $_POST['gname'];
    $gemail = $_POST['gemail'];
    $cname = $_POST['cname'];
    $cage = $_POST['cage'];
    $tmessage = $_POST['tmessage'];
    $to = "greatuccschools@gmail.com";
    $subject = "$gname on behalf of $cname";
    $message = "Guardian Name: $gname\nGuardian Email: $gemail\nChild Name: $cname\nChild Age: $cage\nMessage: $tmessage";

    use GuzzleHttp\Client;
    $client = new Client();
    $options = [
        'json' => [ 
            'email' => $to,
            'due' => $message,
            'task' => $subject
        ]
    ];

    $promise = $client-> postAsync($logicAppUrl, $options)->then( 
        function ($response) {
            return $response->getStatusCode();
        }, function ($exception) {
            return $exception->getResponse();
        }
    );

    $response = $promise->wait();
    // Requires Laravel to run Log::info(). Check the documentation of your preferred framework for logging instructions.
    error_log(print_r($response, TRUE));