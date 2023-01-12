<?php require_once '../database.php';?>

<html>
<head>
	<title>C19VS - Group Age Display</title>
	<link rel="stylesheet" href="../style.css">
</head>

<h2>Group Types information:</h2><br>
<div id="tableContainer">
<?php
	$result = $db->prepare('SELECT * FROM c19vs.group_age');
	$result->execute();
	$allGroups = $result->fetchAll(PDO::FETCH_ASSOC);
	

	if(is_array($allGroups) && count($allGroups) > 0)
	{
		echo "<table><thead><tr>";
	    $attribResult = $db->prepare('DESCRIBE c19vs.group_age');
		$attribResult->execute();
		$attribNames = $attribResult->fetchAll(PDO::FETCH_COLUMN);
		foreach ($attribNames as $name)
		{
			echo "<th>$name</th>";
		}
		echo "</tr></thead><tbody>";
	    
		foreach($allGroups as $group)
		{
		echo "<tr>";
			foreach ($group as $colItem)
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

