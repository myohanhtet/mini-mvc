<?php

namespace Myohanhtet\Libs;

class Encryption
{
    public static function encryptor($action, $string): bool|string
    {
        $output = false;

        $encrypt_method = config('encryption.cipher');
        //pls set your unique hashing key
        $secret_key = config('encryption.key');
        $secret_iv = config('encryption.iv');

        // hash
        $key = hash('sha256', $secret_key);

        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
        $iv = substr(hash('sha256', $secret_iv), 0, 16);

        //do the encryption given text/string/number
        if( $action == 'en' ) {
            $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
            $output = base64_encode($output);
        }
        else if( $action == 'de' ){
            //decrypt the given text/string/number
            $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        }

        return $output;
    }

}