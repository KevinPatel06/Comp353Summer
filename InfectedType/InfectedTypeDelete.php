<?php require_once '../database.php';?>

<html>
  <head>
      <title>C19VS - Variant Type Delete</title>
      <link rel="stylesheet" href="../style.css">
  </head>

  <?php
  $display_message = "";
  if (isset($_POST['ID_Nbr'])) 
  {
      $vid = $_POST['ID_Nbr'];
      $IDResult = $db->prepare('SELECT vID FROM c19vs.variants WHERE vID = :ID');
      $IDResult->bindParam(':ID', $vid);
      $IDResult->execute();
      $variants = $IDResult->fetchAll(PDO::FETCH_ASSOC);
      $arr[] = $variants;
      if ($arr[0]) 
      {
          $deletingVariant = $db->prepare('DELETE FROM c19vs.variants WHERE vID = :ID');
          $deletingVariant->bindParam(':ID', $vid);
          $deletingVariant->execute();
          $display_message = "The Variant Type with ID: " . $vid . " is deleted.";
      }
      else
      {
          $display_message = "No Variant Type with ID: " . $vid . " was found.";
      }

  }
  ?>

  <h2>Variant Type Deletion:</h2>
  <div class= "formDiv">
      <h3 class="instruction">Please enter the Variant Type's ID number:</h3>
      <br>
      <form action="InfectedTypeDelete.php" method="POST">
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