<?php

require_once "_helper.php";

$header = json_encode([
    "alg" => "HS256",
    "typ" => "JWT",
]);

$payload = json_encode([
    "name" => "sina",
]);

$base64UrlHeader = base64UrlEncode($header);
$base64UrlPayload = base64UrlEncode($payload);

$signature = hash_hmac("sha256", $base64UrlHeader . "." . $base64UrlPayload, SECRET, true);
$base64UrlSignature = base64UrlEncode($signature);
$jwt = $base64UrlHeader . "." . $base64UrlPayload . "." . $base64UrlSignature;

echo $jwt;



