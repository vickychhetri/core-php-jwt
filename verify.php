<?php
require 'vendor/autoload.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

$secret_key = "password"; // Replace with your secret key
$jwt = $_POST['token']; // Assuming the token is sent in the request

try {
    // Verify the token using the secret key
    $headers1 = $headers = new stdClass();
    $key_to=new Key($secret_key,'HS256');
    $decoded = JWT::decode($jwt,$key_to, $headers1);

    // Token is valid
    echo json_encode(array(
        "message" => "Token is valid",
        "data" => $decoded
    ));
} catch (Exception $e) {
    // Token is invalid
    http_response_code(401);
    echo json_encode(array(
        "message" => "Token is invalid",
        "error" => $e->getMessage()
    ));
}
?>
