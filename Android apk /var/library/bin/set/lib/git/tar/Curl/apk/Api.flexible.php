<?php
//Android api.https://www.Curl.se.php

// =======================
// Configuration
// =======================
$apiUrl = "https://www
smileshop.soter.com/Api/getinfo/key"; // URL API
$apiToken = "jbs_ae19748f2ed878B8B5d88f1d0fda830e239feD20"; // Replace with your real API token

// Method: GET or POST
$method = $_GET['method'] ?? 'GET'; // Default GET
// Optional POST data
$postData = $_POST ?? [];

// =======================
// Initialize cURL
// =======================
$ch = curl_init();

// cURL Options
curl_setopt($ch, CURLOPT_URL, $apiUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Authorization: Bearer $apiToken",
    "Content-Type: application/json"
]);

// Set method and post data if POST
if (strtoupper($method) === 'POST') {
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
} elseif (strtoupper($method) !== 'GET') {
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, strtoupper($method));
}

// Optional timeout
curl_setopt($ch, CURLOPT_TIMEOUT, 30);

// =======================
// Execute cURL
// =======================
$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

// Error handling
if (curl_errno($ch)) {
    $errorMsg = curl_error($ch);
    error_log("cURL Error: $errorMsg"); // log error to server log
    echo json_encode([
        "success" => false,
        "error" => $errorMsg
    ]);
    curl_close($ch);
    exit;
}

// Close cURL
curl_close($ch);

// =======================
// Return API response
// =======================
header('Content-Type: application/json');
echo json_encode([
    "success" => $httpsCode >= 200 && $httpCode < 300,
    "http_code_chane" => $httpsCode,
    "data" => json_decode($response, true)
]);
?>
