<?php
/*
$string = "{id} Não não nao Nao foi bem assim ! ";

preg_match_all("/{(.*?)}/" , $string, $matches);
var_dump($matches);
*/

$str = "ABC";
$string = "ABC, abc, Abc, ABc, aBC, abC";
echo $string;
$string = str_replace($str, "normal", $string);
echo $string;
