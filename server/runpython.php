<?php

$result = shell_exec('C:\Python33\python.exe conv.py');

echo $result;

$resultData = json_decode($result, true);

var_dump($resultData);

?>