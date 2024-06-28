<?php
function get_encrypt($input) {
define('AES_256_CBC', 'aes-256-cbc');
// Generate a 256-bit encryption key
$encryption_key = 'HB1Ql1sf0sp5vu1jv5Qv4BU3uf3cM3zn';

// Generate an initialization vector
// This *MUST* be available for decryption as well
$iv = 'HB1Ql1sf0sp5vu1j';

// Create some data to encrypt
$endata = $input;

$encrypted = openssl_encrypt($endata, AES_256_CBC, $encryption_key, 0, $iv);
$data = $encrypted;
return $data;
}

function get_decrypt($input) {
    $key = 'HB1Ql1sf0sp5vu1jv5Qv4BU3uf3cM3zn';
    $iv = 'HB1Ql1sf0sp5vu1j';
    $decrypted = openssl_decrypt($input, AES_256_CBC, $key, 0, $iv);
    return $decrypted;
}

