<?php require_once '../database.php';?>

<html>

<head>
      <title>C19VS - Vaccination Type Create</title>
      <link rel="stylesheet" href="../style.css">
</head>

  <?php
  $display_message = "";
  
  if(isset($_POST['vaxid'])) 
  {
    $vaxid = $_POST['vaxid'];
    $vax_name = $_POST['vax_name'];
    $date_approve = $_POST['date_approve'];
    $date_sus = $_POST['date_sus'];
    $status = $_POST['status'];
    
    $pkCheck = $db->prepare('SELECT count(*) AS total FROM c19vs.vaccine WHERE vaxID = :vaxid');
    $pkCheck->bindParam(':vaxid', $vaxid);
    $pkCheck->execute();
    $PKResult = $pkCheck->fetch(PDO::FETCH_ASSOC);
    if($PKResult['total'] == 0)
    {
      try
      {
        $newFacility = $db->prepare('INSERT INTO c19vs.vaccine VALUES (:vaxid, :vax_name, :date_approve, :date_sus, :status)');

        $newFacility->bindParam(':vaxid', $vaxid);
        $newFacility->bindParam(':vax_name', $vax_name);
        $newFacility->bindParam(':date_approve', $date_approve);
        $newFacility->bindParam(':date_sus', $date_sus);
        $newFacility->bindParam(':status', $status);
        $newFacility->execute();

        $display_message = "The Vaccination Type with ID: " . $vaxid . " was created.";
      }
      catch(PDOException $e)
      {
        die('Error with input values: ' . $e->getMessage());
      }
      
    }
    else
    {
      $display_message = "A Vaccination Type with ID: " . $vaxid . " already exists.";
    }
  }
  ?>
  <h2>Vaccination Type Creation:</h2>
  <div class= "formDiv">
    <h3 class="instruction">Please enter the Vaccination Type's information:</h3>
    <br>
    <form action="VaccineTypeCreate.php" method="POST">
      <br>
      <h4>VAXID</h4>
      <input type="text" id="vaxid" name="vaxid" placeholder="Format: vaxID0" required>
      <br>

      <br>
      <h4>Vaccine Name</h4>
      <input type="text" id="vax_name" name="vax_name" placeholder="eg: Pfizer">
      <br>

      <br>
      <h4>Date Of Approval</h4>
      <input type="text" id="date_approve" name="date_approve" placeholder="Format: YYYY-MM-DD">
      <br>

      <br>
      <h4>Date of Suspension</h4>
      <input type="text" id="date_sus" name="date_sus" placeholder="Format: YYYY-MM-DD">
      <br>   

      <br>
      <h4>Status</h4>
      <select id="status" name="status">
        <option value="SAFE">Safe</option>
        <option value="SUSPENDED">Suspended</option>
      </select>
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