<?php require_once '../database.php';?>

<html>
  <head>
      <title>C19VS - Public Health Facility Delete</title>
      <link rel="stylesheet" href="../style.css">
  </head>

  <?php
  $display_message = "";
  if (isset($_POST['ID_Nbr'])) 
  {
      $vfid = $_POST['ID_Nbr'];
      $IDResult = $db->prepare('SELECT vfID FROM c19vs.vaccination_facility WHERE vfID = :ID');
      $IDResult->bindParam(':ID', $vfid);
      $IDResult->execute();
      $place = $IDResult->fetchAll(PDO::FETCH_ASSOC);
      $arr[] = $place;
      if ($arr[0]) 
      {
          $deletingPlace = $db->prepare('DELETE FROM c19vs.vaccination_facility WHERE vfID = :ID');
          $deletingPlace->bindParam(':ID', $vfid);
          $deletingPlace->execute();
          $display_message = "The facility with ID: " . $vfid . " is deleted.";
      }
      else
      {
          $display_message = "No facility with ID: " . $vfid . " was found.";
      }

  }
  ?>

  <h2>Public Health Facility Deletion:</h2>
  <div class= "formDiv">
      <h3 class="instruction">Please enter the Facility's ID number:</h3>
      <br>
      <form action="PublicHealthFacilityDelete.php" method="POST">
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