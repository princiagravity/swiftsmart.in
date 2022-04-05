<?php

class RijndaelOpenSSL
{
  
const METHOD = 'AES-128-CBC';

public function decrypt($inputText, $password)
{
    $ivlen = openssl_cipher_iv_length($cipher="AES-128-CBC");
    $ivdata = openssl_random_pseudo_bytes($ivlen);       
    $iv = substr($password, 0, 16);     
    $output = openssl_decrypt(base64_decode($inputText), 'AES-128-CBC', $password, OPENSSL_RAW_DATA, $iv."\0");
    return  $output;
}
}

$encryptedData=$_POST['c'];

$rijndael = new RijndaelOpenSSL();
$decryptedData = $rijndael->decrypt($encryptedData, "8S4KSKTZO097XV3");

?>

<<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
   
</head>
<body>
<?php echo (string)$decryptedData ; ?>
</body>
</html>
