<?php require_once '../database.php';?>

<html>
<head>
	<title>C19VS - Province Display</title>
	<link rel="stylesheet" href="../style.css">
</head>

<h2>Province information:</h2><br>

<?php
	$result = $db->prepare('SELECT * FROM c19vs.province');
	$result->execute();
	$allProvinces = $result->fetchAll(PDO::FETCH_ASSOC);

	if(is_array($allProvinces) && count($allProvinces) > 0)
	{
		echo "<table><thead><tr>";
	    $attribResult = $db->prepare('DESCRIBE c19vs.province');
		$attribResult->execute();
		$attribNames = $attribResult->fetchAll(PDO::FETCH_COLUMN);
		foreach ($attribNames as $name)
		{
			echo "<th>$name</th>";
		}
		echo "</tr></thead><tbody>";
	    
		foreach($allProvinces as $province)
		{
		echo "<tr>";
			foreach ($province as $colItem)
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

</body>
</html>

