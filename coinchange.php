<?php
// https://www.hackerrank.com/challenges/coin-change
error_reporting(E_ALL);
$_fp = fopen("php://stdin", "r");

function num_ways($amt, $denom){

	$sol = array(array());

	// amount == 0
	for ($i = 0; $i < count($denom); $i++){
		$sol[0][$i] = 1;
	}

	// Fill in solution matrix from bottom up
	for ($i = 1; $i < ($amt+1); $i++){
		for ($j = 0; $j < count($denom); $j++){
			// solutions including coin
			$x = ($i-$denom[$j] >= 0) ? $sol[$i-$denom[$j]][$j] : 0;
			// solutions excluding coin
			$y = ($j >= 1) ? $sol[$i][$j-1] : 0;

			$sol[$i][$j] = $x + $y;
		}
	}

	return $sol[$amt][count($denom)-1];

}

list($amount, $num_denoms) = explode(" ", trim(fgets($_fp)));
$denominations = explode(" ", trim(fgets($_fp)));
fwrite(STDOUT, num_ways($amount, $denominations));

?>
