<?php
if (!isset($_GET['i']))
{
?>
	<form method="GET">
		<input type="text" name="i" >
		<input type="submit">
	</form>
<?php
}
else
{
?>
	<form method="GET">
		<input type="text" name="i" >
		<input type="submit">
	</form>
<?php
$time_start = microtime(true); 

if (isset($_GET['i'])){
	$number = (int) $_GET['i'];	
} else {
	die ('Error: Argument not specified.');
}

echo (($number * $number) + $number)/2
echo 1 . "\n";

//Bam! Finished.
$time_end = microtime(true);
$total = ($time_end - $time_start)/60;
echo "Operation completed in $cycles cycles and it took $total seconds.";

}
?>
