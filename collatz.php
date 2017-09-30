<form method="GET">
  <input type="text" name="i">
  <input type="submit">
</form>

<?php 
    $time_start = microtime(true); 
    if (isset($_GET['i'])) {
        $number = (int) $_GET['i'];	
    } else {
	    die ('Error: Argument not specified.');
    }

    $cycles = 0;
    if ($number == 0){
	    die ('Error: Unexpected argument.');
    }

    function isEven ($i){
	    //When given decimal numbers, function will
	    //chop off numbers after the dot for some mystical reason...
	    $mod = $i % 2;
	    if ($mod == 0) {
		    //Number is even, return true
		    return true;
	    }
	    //Number is not even, return false
	    return false;
    }

    function even ($i){
	    //Do this.
	    return $i/2;
    }

    function odd ($i){
	    //Do that.
	    return $i*3+1;
    }

    while ($number != 1){
	    //Cycle through until one.
	    $cycles = $cycles + 1;
	    echo $number . "<br/>";
	    if (isEven($number)){
		    //Number is even
		    $number = even($number);
		    continue;
	    }
		//Number is odd
		$number = odd($number);
    }

    echo 1 . "\n";
    //Bam! Finished.
    $time_end = microtime(true);
    $total = ($time_end - $time_start)/60;
    echo "Operation completed in $cycles cycles and it took $total seconds.";