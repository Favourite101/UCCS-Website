<?php
// Replace with your Logic App URL and details
    $logicAppUrl = "https://prod-02.westus2.logic.azure.com/workflows/9e307297c1f74d0c9b3ecadd5872e0a0/triggers/When_a_HTTP_request_is_received/paths/invoke?api-version=2016-10-01&sp=%2Ftriggers%2FWhen_a_HTTP_request_is_received%2Frun&sv=1.0&sig=KgjW0PXQhBerq5Cu6YKyJmYlOLPdLZ1TJuDCCMCHZzg;"
    $gname = $_GET['gname'];
    $gemail = $_GET['gemail'];
    $cname = $_GET['cname'];
    $cage = $_GET['cage'];
    $tmessage = $_GET['tmessage'];
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

    $promise = $client-> getAsync($logicAppUrl, $options)->then( 
        function ($response) {
            return $response->getStatusCode();
        }, function ($exception) {
            return $exception->getResponse();
        }
    );

    $response = $promise->wait();
    // Requires Laravel to run Log::info(). Check the documentation of your preferred framework for logging instructions.
    Log::info(print_r($response, TRUE));