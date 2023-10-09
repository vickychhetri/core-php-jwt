<?php
require 'vendor/autoload.php';

use Firebase\JWT\JWT;

$secret_key = "password"; // Replace with your secret key
$issuer_claim = "google";   // Replace with your issuer (your website or application)
$audience_claim = "kids"; // Replace with your audience (the client's domain)

$issuedat_claim = time(); // Timestamp of the time when the token was generated
$notbefore_claim = $issuedat_claim + 10; // Token can't be used before this time
$expire_claim = $issuedat_claim + 3600; // Token will expire after 1 hour

$token = array(
    "iss" => $issuer_claim,
    "aud" => $audience_claim,
    "iat" => $issuedat_claim,
    "nbf" => $notbefore_claim,
    "exp" => $expire_claim,
    "kid" => "hiu32332" // Add a key ID here
);

// Encode the token using the secret key
$jwt = JWT::encode($token, $secret_key,'HS256');

echo json_encode(array(
    "message" => "Token generated successfully",
    "token" => $jwt
));
?>
