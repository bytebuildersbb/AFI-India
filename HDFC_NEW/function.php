<?php
function get_encrypt($input) {
define('AES_256_CBC', 'aes-256-cbc');
// Generate a 256-bit encryption key
$encryption_key = 'Gu5Tk4rw7NY5hU6Fr9an6tq1yD9WI3fY';

// Generate an initialization vector
// This *MUST* be available for decryption as well
$iv = 'Gu5Tk4rw7NY5hU6F';

// Create some data to encrypt
$endata = $input;

$encrypted = openssl_encrypt($endata, AES_256_CBC, $encryption_key, 0, $iv);
$data = $encrypted;
return $data;
}

function get_decrypt($input) {
    $key = 'Gu5Tk4rw7NY5hU6Fr9an6tq1yD9WI3fY';
    $iv = 'Gu5Tk4rw7NY5hU6F';
    $decrypted = openssl_decrypt($input, AES_256_CBC, $key, 0, $iv);
    return $decrypted;
}

