<?php

require_once "_helper.php";

$jwt = $_GET["jwt"];

$tokenParts = explode(".", $jwt);
$header = base64_decode($tokenParts[0]);
$payload = base64_decode($tokenParts[1]);
$signatureProvided = $tokenParts[2];

$base64UrlHeader = base64UrlEncode($header);
$base64UrlPayload = base64UrlEncode($payload);
$signature = hash_hmac("sha256", $base64UrlHeader . "." . $base64UrlPayload, SECRET, true);
$base64UrlSignature = base64UrlEncode($signature);

$signatureValid = ($base64UrlSignature === $signatureProvided);

echo $signatureValid ? "Valid" : "Invalid";