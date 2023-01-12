<?php require_once '../database.php';?>

<html>
<head>
	<title>C19VS - Public Health Facility Display</title>
	<link rel="stylesheet" href="../style.css">
</head>

<h2>Public Health Facilities information:</h2><br>
<div id="tableContainer">
<?php
	$result = $db->prepare('SELECT * FROM c19vs.vaccination_facility');
	$result->execute();
	$allFacilities = $result->fetchAll(PDO::FETCH_ASSOC);
	

	if(is_array($allFacilities) && count($allFacilities) > 0)
	{
		echo "<table><thead><tr>";
	    $attribResult = $db->prepare('DESCRIBE c19vs.vaccination_facility');
		$attribResult->execute();
		$attribNames = $attribResult->fetchAll(PDO::FETCH_COLUMN);
		foreach ($attribNames as $name)
		{
			echo "<th>$name</th>";
		}
		echo "</tr></thead><tbody>";
	    
		foreach($allFacilities as $facility)
		{
		echo "<tr>";
			foreach ($facility as $colItem)
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

