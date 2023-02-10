<?php
$str="Hi this is encrypted data";
// $str = "Gb++rGO3q7Xh0/AQG6Am6D9UyNJT4bRI+Q==";
$key ='123456!@#$%*&^';
$chiper="AES-128-CTR";
$ivLen=openssl_cipher_iv_length($chiper);
$iv = openssl_random_pseudo_bytes(16);
// $iv=1234567891234567;
$options=0;


echo openssl_encrypt($str,$chiper,$key,$options,$iv);

?>