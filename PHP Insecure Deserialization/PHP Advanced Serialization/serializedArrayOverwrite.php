<?php

$serializedStr = 'a:2:{i:0;i:1;i:0;s:3:"val";}';

$arr = unserialize($serializedStr);

echo sizeof($arr);

var_dump($arr);


?>