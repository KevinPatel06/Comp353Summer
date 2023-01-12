<?php require_once '../database.php';?>

<html>
<head>
	<title>C19VS - Vaccine Type Display</title>
	<link rel="stylesheet" href="../style.css">
</head>

<h2>Vaccine Types information:</h2><br>
<div id="tableContainer">
<?php
	$result = $db->prepare('SELECT * FROM c19vs.vaccine');
	$result->execute();
	$allVaccines = $result->fetchAll(PDO::FETCH_ASSOC);
	

	if(is_array($allVaccines) && count($allVaccines) > 0)
	{
		echo "<table><thead><tr>";
	    $attribResult = $db->prepare('DESCRIBE c19vs.vaccine');
		$attribResult->execute();
		$attribNames = $attribResult->fetchAll(PDO::FETCH_COLUMN);
		foreach ($attribNames as $name)
		{
			echo "<th>$name</th>";
		}
		echo "</tr></thead><tbody>";
	    
		foreach($allVaccines as $vaccine)
		{
		echo "<tr>";
			foreach ($vaccine as $colItem)
			{
				//if its empty
				if($colItem == '')
				{
					echo "<td>None</td>";
				}
				else
				{
					echo "<td>'$colItem'</td>";
				}
			}
		echo "</tr>";	
		}
	}
	echo "</tbody></table>";
	?>
</div>
</body>
</html>

