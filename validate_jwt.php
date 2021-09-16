<?php

require_once "_helper.php";

$jwt = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJuYW1lIjoic2luYSJ9.kgWBk-E4TlFS-v9mcVhOlskj1M_0o72dNCZr3kV4JzI";

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