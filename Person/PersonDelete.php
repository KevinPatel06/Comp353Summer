<?php require_once '../database.php';?>

<html>
  <head>
      <title>C19VS - Person Delete</title>
      <link rel="stylesheet" href="../style.css">
  </head>

  <?php
  $display_message = "";
  if (isset($_POST['ID_Nbr'])) 
  {
      $pid = $_POST['ID_Nbr'];
      $IDResult = $db->prepare('SELECT pID FROM c19vs.person WHERE pID = :ID');
      $IDResult->bindParam(':ID', $pid);
      $IDResult->execute();
      $person = $IDResult->fetchAll(PDO::FETCH_ASSOC);
      $arr[] = $person;
      if ($arr[0]) 
      {
          $deletingPsn = $db->prepare('DELETE FROM c19vs.person WHERE pID = :ID');
          $deletingPsn->bindParam(':ID', $pid);
          $deletingPsn->execute();
          $display_message = "The person with ID: " . $pid . " is deleted.";
      }
      else
      {
          $display_message = "No person with ID: " . $pid . " was found.";
      }

  }
  ?>

  <h2>Person Deletion:</h2>
  <div class= "formDiv">
      <h3 class="instruction">Please enter the Person's ID number:</h3>
      <br>
      <form action="personDelete.php" method="POST">
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