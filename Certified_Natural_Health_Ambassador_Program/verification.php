<?php

// Check if the request method is POST
$SECRET = '123456';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the request body as JSON
    $request_body = file_get_contents('php://input');
    
    // Decode the JSON data
    $data = json_decode($request_body, true);
    var_dump($data);

    // Check if the 'secret' field exists in the JSON data
    if (isset($data['secret'])) {
        // Define your secret
        $SECRET = '12345678';

        // Get the 'secret' value from the JSON data
        $secret = $data['secret'];

        // Perform validation
        if ($secret === $SECRET) {
            // Respond with a JSON object containing the status 'ok'
            $response = array('status' => 'ok');
            header('Content-Type: application/json');
            echo json_encode($response);
        } else {
            // Respond with an error message
            http_response_code(400);
            echo json_encode(array('error' => 'Invalid secret'));
        }
    } else {
        // Respond with an error message
        http_response_code(400);
        echo json_encode(array('error' => 'Missing secret'));
    }
} else {
    // Respond with an error message
    http_response_code(405);
    echo json_encode(array('error' => 'Method Not Allowed'));
}
?>
