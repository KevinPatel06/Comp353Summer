<?php require_once '../database.php';?>

<html>
<head>
	<title>C19VS - Public Health Worker Display</title>
	<link rel="stylesheet" href="../style.css">
</head>

<h2>Public Health Worker information:</h2><br>
<div id="tableContainer">
<?php
	$result = $db->prepare('SELECT * FROM c19vs.public_healthcare_worker');
	$result->execute();
	$allWorkers = $result->fetchAll(PDO::FETCH_ASSOC);
	

	if(is_array($allWorkers) && count($allWorkers) > 0)
	{
		echo "<table><thead><tr>";
	    $attribResult = $db->prepare('DESCRIBE c19vs.public_healthcare_worker');
		$attribResult->execute();
		$attribNames = $attribResult->fetchAll(PDO::FETCH_COLUMN);
		foreach ($attribNames as $name)
		{
			echo "<th>$name</th>";
		}
		echo "</tr></thead><tbody>";
	    
		foreach($allWorkers as $worker)
		{
		echo "<tr>";
			foreach ($worker as $colWorker)
			{
				//if its empty
				if($colWorker == '')
				{
					echo "<td>None</td>";
				}
				else
				{
					echo "<td>'$colWorker'</td>";
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

