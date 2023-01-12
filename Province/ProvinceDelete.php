<?php require_once '../database.php';?>

<html>
  <head>
      <title>C19VS - Group Age Delete</title>
      <link rel="stylesheet" href="../style.css">
  </head>

  <?php
  $display_message = "";
  if (isset($_POST['prov_name'])) 
  {
      $prov_name = $_POST['prov_name'];
      $NameResult = $db->prepare('SELECT province FROM c19vs.province WHERE province = :name');
      $NameResult->bindParam(':name', $prov_name);
      $NameResult->execute();
      $provinces = $NameResult->fetchAll(PDO::FETCH_ASSOC);
      $arr[] = $provinces;
      if ($arr[0]) 
      {
          $deletingProv = $db->prepare('DELETE FROM c19vs.province WHERE province = :name');
          $deletingProv->bindParam(':ID', $prov_name);
          $deletingProv->execute();
          $display_message = "The Province with name: " . $prov_name . " is deleted.";
      }
      else
      {
          $display_message = "No Province with name: " . $prov_name . " was found.";
      }

  }
  ?>

  <h2>Province Deletion:</h2>
  <div class= "formDiv">
      <h3 class="instruction">Please enter the Province's name:</h3>
      <br>
      <form action="ProvinceDelete.php" method="POST">
          <br>
          <h4>ID</h4>
          <br>
          <input type="text" id="prov_name" name="prov_name">
          <br><br>
          <div id="subButtonContainer">
          <input type="submit" value="Delete">
          </div>
          <h3><?php echo $display_message;?></h3>
      </form>
  </div>

  </body>

</html>