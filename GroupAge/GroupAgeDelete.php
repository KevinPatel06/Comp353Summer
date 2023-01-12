<?php require_once '../database.php';?>

<html>
  <head>
      <title>C19VS - Group Age Delete</title>
      <link rel="stylesheet" href="../style.css">
  </head>

  <?php
  $display_message = "";
  if (isset($_POST['ID_Nbr'])) 
  {
      $gid = $_POST['ID_Nbr'];
      $IDResult = $db->prepare('SELECT gID FROM c19vs.group_age WHERE gID = :ID');
      $IDResult->bindParam(':ID', $gid);
      $IDResult->execute();
      $group = $IDResult->fetchAll(PDO::FETCH_ASSOC);
      $arr[] = $group;
      if ($arr[0]) 
      {
          $deletingGroup = $db->prepare('DELETE FROM c19vs.group_age WHERE gID = :ID');
          $deletingGroup->bindParam(':ID', $gid);
          $deletingGroup->execute();
          $display_message = "The Group Age with ID: " . $gid . " is deleted.";
      }
      else
      {
          $display_message = "No Group Age with ID: " . $gid . " was found.";
      }

  }
  ?>

  <h2>Group Age Deletion:</h2>
  <div class= "formDiv">
      <h3 class="instruction">Please enter the Group Age's ID number:</h3>
      <br>
      <form action="GroupAgeDelete.php" method="POST">
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