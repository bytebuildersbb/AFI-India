<?php
function encryptData($data, $secret_key = 'tush-15082001-goyal') {
    $cipher = "aes-128-gcm";
    $ivlen = openssl_cipher_iv_length($cipher);
    $iv = openssl_random_pseudo_bytes($ivlen);
    $tag = '';
    $ciphertext = openssl_encrypt($data, $cipher, $secret_key, OPENSSL_RAW_DATA, $iv, $tag);
    return base64_encode($iv . $tag . $ciphertext);
}

function decryptData($encrypted_data, $secret_key = 'tush-15082001-goyal') {
    $cipher = "aes-128-gcm";
    $decoded = base64_decode($encrypted_data);
    $ivlen = openssl_cipher_iv_length($cipher);
    $iv = substr($decoded, 0, $ivlen);
    $tag = substr($decoded, $ivlen, 16);
    $ciphertext = substr($decoded, $ivlen + 16);
    return openssl_decrypt($ciphertext, $cipher, $secret_key, OPENSSL_RAW_DATA, $iv, $tag);
}
?>
