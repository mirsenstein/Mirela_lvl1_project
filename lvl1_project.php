<?php

$stringArray = ["mkaak", 
			  "ma",
			 "ba",
			 "a",
			 "bkk",
			 "cllllll",
			 "a",
			 "ass",
			];

// $flag = 0;
$str_zero = $stringArray[0];
$last_char = strlen($str_zero) - 1;
$str_glue = $str_zero[$last_char];
$count = count($stringArray);

for ($i=1; $i < $count; $i++) { 
	$str = $stringArray[$i];
	$str_glue = $str_glue . $str[0];
	$len = strlen($str);
	if ($len > 1) {
		$arr_glue[] = $str_glue;
		$str_glue = "";
		$str_glue = $str[1];
	} 
}
var_dump($arr_glue);
