<?php
require_once __DIR__.'/vendor/autoload.php';
use MbString\MbString;
$mb = new MbString;
$str = '我是编码函数';
$strRe = $mb->strRev($str); // 数函码编理处是我
