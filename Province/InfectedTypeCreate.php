<?php require_once '../database.php';?>

<html>

<head>
      <title>C19VS - Variant Type Create</title>
      <link rel="stylesheet" href="../style.css">
</head>

  <?php
  $display_message = "";
  
  if(isset($_POST['vid'])) 
  {
    $vid = $_POST['vid'];
    $var_name = $_POST['var_name'];
    
    $pkCheck = $db->prepare('SELECT count(*) AS total FROM c19vs.variants WHERE vID = :vid');
    $pkCheck->bindParam(':vid', $vid);
    $pkCheck->execute();
    $PKResult = $pkCheck->fetch(PDO::FETCH_ASSOC);
    if($PKResult['total'] == 0)
    {
      try
      {
        $newFacility = $db->prepare('INSERT INTO c19vs.variants VALUES (:vid, :var_name)');

        $newFacility->bindParam(':vid', $vid);
        $newFacility->bindParam(':var_name', $var_name);
        $newFacility->execute();

        $display_message = "The Variant Type with ID: " . $vid . " was created.";
      }
      catch(PDOException $e)
      {
        die('Error with input values: ' . $e->getMessage());
      }
      
    }
    else
    {
      $display_message = "A Variant Type with ID: " . $vid . " already exists.";
    }
  }
  ?>
  <h2>Variant Type Creation:</h2>
  <div class= "formDiv">
    <h3 class="instruction">Please enter the Variant Type's information:</h3>
    <br>
    <form action="InfectedTypeCreate.php" method="POST">
      <br>
      <h4>VID</h4>
      <input type="text" id="vid" name="vid" placeholder="Format: vID0" required>
      <br>

      <br>
      <h4>Variant Name</h4>
      <input type="text" id="var_name" name="var_name" placeholder="eg: Delta">
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