<?php require_once '../database.php';?>

<html>
  <head>
      <title>C19VS - Vaccine Type Delete</title>
      <link rel="stylesheet" href="../style.css">
  </head>

  <?php
  $display_message = "";
  if (isset($_POST['ID_Nbr'])) 
  {
      $vaxid = $_POST['ID_Nbr'];
      $IDResult = $db->prepare('SELECT vaxID FROM c19vs.vaccine WHERE vaxID = :ID');
      $IDResult->bindParam(':ID', $vaxid);
      $IDResult->execute();
      $vaccine = $IDResult->fetchAll(PDO::FETCH_ASSOC);
      $arr[] = $vaccine;
      if ($arr[0]) 
      {
          $deletingVax = $db->prepare('DELETE FROM c19vs.vaccine WHERE vaxID = :ID');
          $deletingVax->bindParam(':ID', $vaxid);
          $deletingVax->execute();
          $display_message = "The Vaccine Type with ID: " . $vaxid . " is deleted.";
      }
      else
      {
          $display_message = "No Vaccine Type with ID: " . $vaxid . " was found.";
      }

  }
  ?>

  <h2>Vaccine Type Deletion:</h2>
  <div class= "formDiv">
      <h3 class="instruction">Please enter the Vaccine Type's ID number:</h3>
      <br>
      <form action="VaccineTypeDelete.php" method="POST">
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