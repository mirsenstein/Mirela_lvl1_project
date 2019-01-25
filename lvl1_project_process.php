<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
<?php
echo '<link rel="stylesheet" href="style.css">
	<title>Document</title>
</head>

<body>
	<div id="instructions">
		<p>Брой промени за поредицата</p>';
		

$input_string = implode('', $_POST);
print '<p>"' . $input_string . '"</p>';
$stringArray = explode('-', $input_string);
$str_zero = $stringArray[0];
$last_char = strlen($str_zero) - 1;
$str_glue = $str_zero[$last_char];
$count = count($stringArray);

if (!empty($stringArray)){
	if($count>1){
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

		$single_change = 0;
		$multi_change = 0;
		$min_changes = 0;
		$all_multi_change = 0;
		for ($j=0; $j < count($arr_glue); $j++) { 
			$glue_str = $arr_glue[$j];
			$len = strlen($glue_str);
			if ($len==2) {
				if ($glue_str[0]!=$glue_str[1]) {
					$single_change++;
				};
			}elseif ($len > 2){
				$max = 1;
				for ($k=0; $k < strlen($glue_str); $k++) { 
					$new = substr_count($glue_str, $glue_str[$k]);
					if ($new > $max) {
						$max = $new;
					};
				};
				$multi_change = strlen($glue_str) - $max;
				$all_multi_change = $all_multi_change + $multi_change;
			};
		};
		$min_changes = $single_change + $all_multi_change;
		echo '<div id="results">'. $min_changes .'</div>';
	}else{
		echo '<div id="results">0</div>';
	}
}
?>
<form action="index.html" method="">
			<button name="count" type="submit">Хайде пак!</button>
		</form>
	</div>
</body>
</html>