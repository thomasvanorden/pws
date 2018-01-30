<?php

function fileTransfer($fileObject,$username) {
  $fileName = $fileObject['name'];
  if ($fileName !== ''){
    $fileContent = file_get_contents($fileObject['tmp_name']);

    $digits = 4;
    $fileprefix = rand(pow(10, $digits-1), pow(10, $digits)-1);
    $temp = explode(".", $fileName);
    $filesuffix = end($temp);

    $my_file = "img/$username/" . $fileprefix . "." . $filesuffix;
    $handle = fopen($my_file, 'w') or die('Cannot open file: ' . $my_file);
    file_put_contents($my_file, $fileContent);
    fclose($handle);

    return $fileprefix . "." . $filesuffix;
  }
  else {
    return "";
  }
}
?>
