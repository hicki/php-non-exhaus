<?php
if (empty($_GET))
{
    ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Triangle Rectangle</title>
        <meta charset="utf-8" />
    </head>
    <body>
        <h2>Triangle rectangle</h2>
        
        
        <?php


        echo "Donnez la longueur d'un des côtés d'un triangle (pas le plus grand des côtés).";?><form method="get" action="triangle2.php"><p><input type="text" name="value1"/></p>
        <p>Donnez la longueur d'un autre côtés du triangle (pas le plus grand des côtés).</p><p><input type="text" name="value2"/></p>
        <p>Donnez la longueur du plus grand côté du triangle.</p><p><input type="text" name="value3"/></p>
        <input type="submit" value="Envoyer" /></form>

        
        
        
    </body>
</html>
<?php } else { ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Triangle Rectangle</title>
        <meta charset="utf-8" />
    </head>
    <body>
        <h2>Triangle rectangle</h2>
        

        <?php
		// La précision dépend de votre directive precision
		$value1 = (($_GET['value1']) * ($_GET['value1']));
		$value2 = (($_GET['value2']) * ($_GET['value2'])); 
		$value3 = (($_GET['value3']) * ($_GET['value3']));
		$value4 = ($value1 + $value2);
		if ($value3 == $value4)
		{
			echo "On considere le triangle ABC tel que AB = ";
			echo htmlspecialchars(sqrt($value1));
			echo " cm, BC = ";
			echo htmlspecialchars(sqrt($value2));
			echo " cm. AC est le plus grand côté et AC x AC =";
			echo htmlspecialchars(sqrt($value3));
			echo " x ";
			echo htmlspecialchars(sqrt($value3));
			echo " = ";
			echo ((sqrt($value3)) * (sqrt($value3)));
			echo " cm.<br/>AB x AB =";
			echo htmlspecialchars(sqrt($value1));
			echo " x ";
			echo htmlspecialchars(sqrt($value1));
			echo " = ";
			echo ((sqrt($value1)) * (sqrt($value1)));
			echo " cm. <br/>BC x BC =";
			echo htmlspecialchars(sqrt($value2));
			echo " x ";
			echo htmlspecialchars(sqrt($value2));
			echo " = ";
			echo ((sqrt($value2)) * (sqrt($value2)));
			echo "cm.<br/> Alors AB x AB + BC x BC = AC.<br/> On peut donc en deduire que ABC est rectangle.";
		}
		else
		{
			
			echo "On considere le triangle ABC tel que AB = ";
			echo htmlspecialchars(sqrt($value1));
			echo " cm, BC = ";
			echo htmlspecialchars(sqrt($value2));
			echo " cm. AC est le plus grand côté et AC x AC =";
			echo htmlspecialchars(sqrt($value3));
			echo " x ";
			echo htmlspecialchars(sqrt($value3));
			echo " = ";
			echo ((sqrt($value3)) * (sqrt($value3)));
			echo " cm.<br/>AB x AB =";
			echo htmlspecialchars(sqrt($value1));
			echo " x ";
			echo htmlspecialchars(sqrt($value1));
			echo " = ";
			echo ((sqrt($value1)) * (sqrt($value1)));
			echo " cm. <br/>BC x BC =";
			echo htmlspecialchars(sqrt($value2));
			echo " x ";
			echo htmlspecialchars(sqrt($value2));
			echo " = ";
			echo ((sqrt($value2)) * (sqrt($value2)));
			echo "cm.<br/> Alors AB x AB + BC x BC n'est pas égal à AC.<br/> On peut donc en deduire que ABC n'est pas rectangle.";
		}
		
		?>
        <form method="get" action="triangle.php"><input type="submit" value="Recommencer" /></form>
        
    </body>
</html>
<?php } ?>
