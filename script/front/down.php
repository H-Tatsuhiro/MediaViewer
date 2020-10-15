<?php
//パス
$fpath = './imgtest2ascii_code.png';
//ファイル名
$fname = '画像名.txt';

header('Content-Type: application/force-download');
header('Content-Length: '.filesize($fpath));
header('Content-disposition: attachment; filename="'.$fname.'"');
readfile($fpath);
?>
