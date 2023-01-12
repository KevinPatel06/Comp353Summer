<?php require_once '../database.php';?>

<html>
  <head>
      <title>C19VS - Public Health Worker Delete</title>
      <link rel="stylesheet" href="../style.css">
  </head>

  <?php
  $display_message = "";
  if (isset($_POST['ID_Nbr'])) 
  {
      $eid = $_POST['ID_Nbr'];
      $IDResult = $db->prepare('SELECT eID FROM c19vs.public_healthcare_worker WHERE eID = :ID');
      $IDResult->bindParam(':ID', $eid);
      $IDResult->execute();
      $worker = $IDResult->fetchAll(PDO::FETCH_ASSOC);
      $arr[] = $worker;
      if ($arr[0]) 
      {
          $deletingWorker = $db->prepare('DELETE FROM c19vs.public_healthcare_worker WHERE eID = :ID');
          $deletingWorker->bindParam(':ID', $eid);
          $deletingWorker->execute();
          $display_message = "The health worker with ID: " . $eid . " is deleted.";
      }
      else
      {
          $display_message = "No health worker with ID: " . $eid . " was found.";
      }

  }
  ?>

  <h2>Public Health Worker Deletion:</h2>
  <div class= "formDiv">
      <h3 class="instruction">Please enter the Worker's ID number:</h3>
      <br>
      <form action="PublicHealthWorkerDelete.php" method="POST">
          <br>
          <h4>ID</h4>
          <br>
          <input type="text" id="ID_Nbr" name="ID_Nbr">
          <br><br>
          <div id="subButtonContainer">
          <input type="submit" value="Delete">
          </div>
          <h3><?php echo $display_message;?></h3>
      </form>
  </div>

  </body>

</html>