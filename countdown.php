<?php
$secondes = 30;  // les secondes  < 60 [the seconds]
$redirection = 'http://www.the-scientist.fr'; // quand le compteur arrive à 0 [when the computer arrives at 0]
                                            // j'ai mis une redirection [I put a redirection]
/*******************************************************************************
    * Ne pas toucher [DO NOT TOUCH]
    ***************************************************************************/
$annee = date("Y");  // par defaut cette année [by default this year]
$mois  = date("m");  // par defaut ce mois [by default this month]
$jour  = date("d");  // par defaut aujourd'hui [by default today]



/*******************************************************************************
    * calcul des secondes [calculate the seconds]
    ***************************************************************************/

$secondes = mktime(date("H") + $heures,
                            date("i") + $minutes,
                            date("s") + $secondes,
                            $mois,
                            $jour,
                            $annee
                            ) - time();
?>

<html>
    <head>
        <title>compte a rebour</title>
        <script type="text/javascript">
            var temps = <?php echo $secondes;?>;
            var timer =setInterval('CompteaRebour()',1000);
            
            function CompteaRebour(){
                temps-- ;
                j = parseInt(temps) ;
                h = parseInt(temps/3600) ;
                m = parseInt((temps%3600)/60) ;
                s = parseInt((temps%3600)%60) ;
                document.getElementById('minutes').innerHTML= (s<10 ? "0"+s : s) + ' s ';
                if ((s == 0 && m ==0 && h ==0)) {
                   clearInterval(timer);
                   url = "<?php echo $redirection;?>"
                   Redirection(url)
                }
            }

            function Redirection(url) {
                setTimeout("window.location=url", 500)
            }
        </script>
    </head>

    <body onload="timer">
        <?php // la condition est que le nombre de seconde soit etre superieur a 24 heures [the condition is that the number of seconds is greater than 24 hours]
            if ($secondes <= 3600*24): 
        ?>
                <p>Il vous reste comme temps <span id="minutes">Il vous reste comme temps </span></p>
        <?php endif ?>
    <body>
<html>

