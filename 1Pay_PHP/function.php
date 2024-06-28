<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/*
  Merchant has to enter the API Key shared by 1Pay in the below variable 'key' to Encrypt/Decrypt the Transaction Request/Response.
  Algorithm used for encryption is AES.
  Merchant Encryption Key will be different for TEST and PRODUCTION environment.
 */

function get_encrypt($input) {


    //for php 5.x.x to 7.0.x
    $key = 'jpuT6032jpuT6032'; // 16 Characters String 
    $size = mcrypt_get_block_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_ECB);

    $input = get_pkcs5_pad($input, $size);

    $td = mcrypt_module_open(MCRYPT_RIJNDAEL_128, '', MCRYPT_MODE_ECB, '');

    $iv = mcrypt_create_iv(mcrypt_enc_get_iv_size($td), MCRYPT_RAND);

    mcrypt_generic_init($td, $key, $iv);
    $data = mcrypt_generic($td, $input);

    mcrypt_generic_deinit($td);
    mcrypt_module_close($td);
    $data = base64_encode($data);

    //die;
    return $data;
}

function get_pkcs5_pad($text, $blocksize) {
    $pad = $blocksize - (strlen($text) % $blocksize);
    return $text . str_repeat(chr($pad), $pad);
}

function get_decrypt($input) {
    $key = 'jpuT6032jpuT6032';

    $decrypted = mcrypt_decrypt(
            MCRYPT_RIJNDAEL_128, $key, base64_decode($input), MCRYPT_MODE_ECB
    );
    $dec_s = strlen($decrypted);
    $padding = ord($decrypted[$dec_s - 1]);
    $decrypted = substr($decrypted, 0, -$padding);


    return $decrypted;
}
