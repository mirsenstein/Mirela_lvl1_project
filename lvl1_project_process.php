<?php

$stringArray= ["abc", 
 "def", 
 "ghi"];


$str_zero = $stringArray[0];
$last_char = strlen($str_zero) - 1;
$str_glue = $str_zero[$last_char];
$count = count($stringArray);

for ($i=1; $i < $count; $i++) { 
	$str = $stringArray[$i];
	$str_glue = $str_glue . $str[0];
	$len = strlen($str);
	if (($i == ($count - 1))&&($len==1)) {
		$arr_glue[] = $str_glue;
	}
	if ($len > 1) {
		$arr_glue[] = $str_glue;
		$str_glue = $str[$len-1];
	} 

}


echo "<pre>" . print_r($arr_glue,1) . "</pre>";

$flag1 = 0;
$flag2 = 0;
$min = 0;
$last2 = 0;
for ($j=0; $j < count($arr_glue); $j++) { 
	$glue_str = $arr_glue[$j];
	$len = strlen($glue_str);
	if ($len==2) {
		if ($glue_str[0]!=$glue_str[1]) {
			$flag1++;
		};
	}elseif ($len > 2){
		$max = 1;
		for ($k=0; $k < strlen($glue_str); $k++) { 
			$new = substr_count($glue_str, $glue_str[$k]);
			if ($new > $max) {
				$max = $new;
			};
		};
		$flag2 = strlen($glue_str) - $max;
		$last2 = $last2 + $flag2;
	};
	// echo '<br>' . $arr_glue[$j] . ' - flag1= ' . $flag1 .  ' flag2= ' . $flag2 . ' last2= '. $last2 . '<br>';
};

// echo $flag1 . ', ' . $last2;
$min = $flag1 + $last2;
print $min;