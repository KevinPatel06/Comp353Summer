<?php require_once '../database.php';?>

<html>

<head>
      <title>C19VS - Group Age Create</title>
      <link rel="stylesheet" href="../style.css">
</head>

  <?php
  $display_message = "";
  
  if(isset($_POST['gid'])) 
  {
    $gid = $_POST['gid'];
    $range_desc = $_POST['range_desc'];
    

    
    $pkCheck = $db->prepare('SELECT count(*) AS total FROM c19vs.group_age WHERE gID = :gid');
    $pkCheck->bindParam(':gid', $gid);
    $pkCheck->execute();
    $PKResult = $pkCheck->fetch(PDO::FETCH_ASSOC);
    if($PKResult['total'] == 0)
    {
      try
      {
        $newGroup = $db->prepare('INSERT INTO c19vs.group_age VALUES (:gid, :range_desc)');
        $newGroup->bindParam(':gid', $gid);
        $newGroup->bindParam(':range_desc', $range_desc);
        $newGroup->execute();

        $display_message = "The group age with ID: " . $gid . " was created.";
      }
      catch(PDOException $e)
      {
        die('Error with input values: ' . $e->getMessage());
      }
      
    }
    else
    {
      $display_message = "A group age with ID: " . $gid . " already exists.";
    }
  }
  ?>
  <h2>Group Age Creation:</h2>
  <div class= "formDiv">
    <h3 class="instruction">Please enter the Group Age's information:</h3>
    <br>
    <form action="GroupAgeCreate.php" method="POST">
      <br>
      <h4>GID</h4>
      <input type="text" id="gid" name="gid" placeholder="Format: gID0" required pattern="[0-9]+">
      <br>

      <br>
      <h4>Range Description</h4>
      <input type="text" id="range_desc" name="range_desc" placeholder="Format: 10-20 or 60+-">
      <br>

      <br>
      <div id="subButtonContainer">
          <input type="submit" value="Submit">
      </div>
      <h3><?php echo $display_message;?></h3>

    </form>
  </div>

  </body>

</html>