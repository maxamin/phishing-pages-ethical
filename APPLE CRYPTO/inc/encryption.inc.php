<?php
function encrypt($text, $key) {
  $cc = $text;
  $iv = '12345678';

  $cipher = mcrypt_module_open(MCRYPT_BLOWFISH,'','cbc','');

  mcrypt_generic_init($cipher, $key, $iv);
  $encrypted = mcrypt_generic($cipher,$cc);
  mcrypt_generic_deinit($cipher);

  return base64_encode($encrypted);
}

function decrypt($text, $key) {
  $cc = base64_decode($text);
  $iv = '12345678';

  $cipher = mcrypt_module_open(MCRYPT_BLOWFISH,'','cbc','');

  mcrypt_generic_init($cipher, $key, $iv);
  $decrypted = mdecrypt_generic($cipher,$cc);
  mcrypt_generic_deinit($cipher);

  return $decrypted;
}
?>
