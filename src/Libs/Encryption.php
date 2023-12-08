<?php

namespace Myohanhtet\Libs;

use Exception;
use Myohanhtet\Config\MyLogger;
use Myohanhtet\Config\View;

class Encryption
{
    public static function encryptor($action, $string)
    {
        $output = false;

        $encrypt_method = config('encryption.cipher');
        //pls set your unique hashing key
        $secret_key = config('encryption.key');
        $secret_iv = config('encryption.iv');
        try {
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
            } else {
                throw new Exception('Invalid action provided. Use "en" for encryption or "de" for decryption.');
            }
            return $output;

        } catch (Exception $e) {
            MyLogger::getLogger()->error("Exception happened in Encryption: " . $e->getMessage());
            View::render('errors/500',[],500);
        }
    }

}