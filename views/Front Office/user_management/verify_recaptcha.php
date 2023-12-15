<?php

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["recaptchaResponse"])) {
    $recaptchaResponse = $_POST["recaptchaResponse"];
    
    // Replace 'YOUR_SECRET_KEY' with your actual reCAPTCHA secret key
    $secretKey = 'YOUR_SECRET_KEY';
    
    // Google reCAPTCHA verification endpoint
    $verifyUrl = "https://www.google.com/recaptcha/api/siteverify";
    
    // Prepare data to send to the reCAPTCHA verification endpoint
    $postData = array(
        'secret' => $secretKey,
        'response' => $recaptchaResponse
    );
    
    // Use cURL to make a POST request to the reCAPTCHA verification endpoint
    $ch = curl_init($verifyUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
    $response = curl_exec($ch);
    curl_close($ch);
    
    // Decode the JSON response from the reCAPTCHA verification endpoint
    $responseData = json_decode($response, true);
    
    // Check if reCAPTCHA verification was successful
    if ($responseData && $responseData['success'] === true) {
        // Return a success message to indicate successful reCAPTCHA verification
        echo "success";
    } else {
        // Return an error message if reCAPTCHA verification fails
        echo "failure";
    }
} else {
    // Handle the case where the request method is not POST or the 'recaptchaResponse' parameter is not set
    echo "invalid_request";
}

?>
