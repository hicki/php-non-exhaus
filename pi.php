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
function bcfact($n)
{
    return ($n == 0 || $n== 1) ? 1 : bcmul($n,bcfact($n-1));
}
function bcpi($precision)
{
    $num = 0;$k = 0;
    bcscale($precision+3);
    $limit = ($precision+3)/14;
    while($k < $limit)
    {
        $num = bcadd($num, bcdiv(bcmul(bcadd('13591409',bcmul('545140134', $k)),bcmul(bcpow(-1, $k), bcfact(6*$k))),bcmul(bcmul(bcpow('640320',3*$k+1),bcsqrt('640320')), bcmul(bcfact(3*$k), bcpow(bcfact($k),3)))));
        ++$k;
    }
    return bcdiv(1,(bcmul(12,($num))),$precision);
}

echo bcpi($_GET['i']);
echo "<br/>";
$time_end = microtime(true);
$total = number_format(($time_end - $time_start)/60, 10, '.', '');
$about = number_format($total/$_GET['i']*1000, 10, '.', '');
echo "Operation was completed in $total s, 1 digit is generated in about $about ms";
}
?>