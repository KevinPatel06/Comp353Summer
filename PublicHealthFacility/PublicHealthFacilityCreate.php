<?php require_once '../database.php';?>

<html>

<head>
      <title>C19VS - Public Health Facility Create</title>
      <link rel="stylesheet" href="../style.css">
</head>

  <?php
  $display_message = "";
  
  if(isset($_POST['vfid'])) 
  {
    $vfid = $_POST['vfid'];
    $fac_name = $_POST['fac_name'];
    $addr = $_POST['addr'];
    $city = $_POST['city'];
    $province = $_POST['province'];
    $postalCode = $_POST['postalCode'];
    $phoneNbr = $_POST['phoneNbr'];
    $website = $_POST['website'];
    $fac_type = $_POST['fac_type'];
    
    $pkCheck = $db->prepare('SELECT count(*) AS total FROM c19vs.vaccination_facility WHERE vfID = :vfid');
    $pkCheck->bindParam(':vfid', $vfid);
    $pkCheck->execute();
    $PKResult = $pkCheck->fetch(PDO::FETCH_ASSOC);
    if($PKResult['total'] == 0)
    {
      try
      {
        $newFacility = $db->prepare('INSERT INTO c19vs.vaccination_facility VALUES (:vfid, :fac_name, :addr, :city, :province, :postalCode, :phoneNbr, :website, :fac_type)');

        $newFacility->bindParam(':vfid', $vfid);
        $newFacility->bindParam(':fac_name', $fac_name);
        $newFacility->bindParam(':addr', $addr);
        $newFacility->bindParam(':city', $city);
        $newFacility->bindParam(':province', $province);
        $newFacility->bindParam(':postalCode', $postalCode);
        $newFacility->bindParam(':phoneNbr', $phoneNbr);
        $newFacility->bindParam(':website', $website);
        $newFacility->bindParam(':fac_type', $fac_type);
        $newFacility->execute();

        $display_message = "The Public Health Facility with ID: " . $vfid . " was created.";
      }
      catch(PDOException $e)
      {
        die('Error with input values: ' . $e->getMessage());
      }
      
    }
    else
    {
      $display_message = "A Public Health Facility with ID: " . $vfid . " already exists.";
    }
  }
  ?>
  <h2>Public Health Facility Creation:</h2>
  <div class= "formDiv">
    <h3 class="instruction">Please enter the Public Health Facility's information:</h3>
    <br>
    <form action="PublicHealthFacilityCreate.php" method="POST">
      <br>
      <h4>VFID</h4>
      <input type="text" id="vfid" name="vfid" placeholder="Format: vfID0" required>
      <br>

      <br>
      <h4>Facility Name</h4>
      <input type="text" id="fac_name" name="fac_name" placeholder="Format: eg: Montreal Hospital">
      <br>

      <br>
      <h4>Address</h4>
      <input type="text" id="addr" name="addr" placeholder="Format: 1234">
      <br>

      <br>
      <h4>City</h4>
      <input type="text" id="city" name="city" placeholder="eg: Montreal">
      <br>

      <br>
      <h4>Province</h4>
      <input type="text" id="province" name="province" placeholder="eg: Quebec">
      <br>

      <br>
      <h4>Postal Code</h4>
      <input type="text" id="postalCode" name="postalCode" placeholder="Format: A2B3C4">
      <br>

      <br>
      <h4>Phone Number</h4>
      <input type="text" id="phoneNbr" name="phoneNbr" placeholder="Format: 1234567890">
      <br>

      <br>
      <h4>Website</h4>
      <input type="text" id="website" name="website" placeholder="Format: www.web.ca">
      <br>   

      <br>
      <h4>Facility Type</h4>
      <select id="fac_type" name="fac_type">
        <option value="Hospital">Hospital</option>
        <option value="special installment">Special Installment</option>
        <option value="clinic">Clinic</option>
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