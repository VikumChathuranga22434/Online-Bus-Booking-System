<?php 

	function encrypt($plaintext)
	{
	    $key = hex2bin("bcb04b7e103a0cd8b54763051cef08bc55abe029fdebae5e1d417e2ffb2a00a3");
	    $iv_size = openssl_cipher_iv_length("AES-128-CBC");
	    $iv = openssl_random_pseudo_bytes($iv_size);
	    $ciphertext = openssl_encrypt($plaintext, "AES-128-CBC", $key, OPENSSL_RAW_DATA, $iv);
	    $ciphertext = $iv . $ciphertext;
	    $ciphertext_base64 = base64_encode($ciphertext);
	    return $ciphertext_base64;
	}

	function decrypt($cText)
	{
	    $ciphertext_dec = base64_decode($cText);
	    $iv_size = openssl_cipher_iv_length("AES-128-CBC");
	    $iv_dec = substr($ciphertext_dec, 0, $iv_size);
	    $ciphertext_dec = substr($ciphertext_dec, $iv_size);
	    $key = hex2bin("bcb04b7e103a0cd8b54763051cef08bc55abe029fdebae5e1d417e2ffb2a00a3");
	    $plaintext_dec = openssl_decrypt($ciphertext_dec, "AES-128-CBC", $key, OPENSSL_RAW_DATA, $iv_dec);
	    return $plaintext_dec;
	}


?>