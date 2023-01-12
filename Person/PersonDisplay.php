<?php require_once '../database.php';?>

<html>
<head>
	<title>C19VS - Person Display</title>
	<link rel="stylesheet" href="../style.css">
</head>

<h2>Persons information:</h2><br>
<div id="tableContainer">
<?php
	$result = $db->prepare('SELECT * FROM c19vs.person');
	$result->execute();
	$allPeople = $result->fetchAll(PDO::FETCH_ASSOC);

	if(is_array($allPeople) && count($allPeople) > 0)
	{
		echo "<table><thead><tr>";
	    $attribResult = $db->prepare('DESCRIBE c19vs.person');
		$attribResult->execute();
		$attribNames = $attribResult->fetchAll(PDO::FETCH_COLUMN);
		foreach ($attribNames as $name)
		{
			echo "<th>$name</th>";
		}
		echo "</tr></thead><tbody>";
	    
		foreach($allPeople as $person)
		{
		echo "<tr>";
			foreach ($person as $colItem)
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

