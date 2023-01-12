<?php require_once '../database.php';?>

<html>

<head>
      <title>C19VS - Public Health Worker Create</title>
      <link rel="stylesheet" href="../style.css">
</head>

  <?php
  $display_message = "";
  
  if(isset($_POST['eid'])) 
  {
    $eid = $_POST['eid'];
    $ssn = $_POST['ssn'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $dob = $_POST['dob'];
    $medNbr = $_POST['medNbr'];
    $addr = $_POST['addr'];
    $city = $_POST['city'];
    $province = $_POST['province'];
    $postalCode = $_POST['postalCode'];
    $phoneNbr = $_POST['phoneNbr'];
    $citizen = $_POST['citizen'];
    $email = $_POST['email'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    
    $pkCheck = $db->prepare('SELECT count(*) AS total FROM c19vs.Public_Healthcare_Worker WHERE eID = :eid');
    $pkCheck->bindParam(':eid', $eid);
    $pkCheck->execute();
    $PKResult = $pkCheck->fetch(PDO::FETCH_ASSOC);
    if($PKResult['total'] == 0)
    {
      try
      {
        $newWorker = $db->prepare('INSERT INTO c19vs.Public_Healthcare_Worker VALUES (:eid, :ssn, :firstName, :lastName, :dob, :medNbr, :addr, :city, :province, :postalCode, :phoneNbr, :citizen, :email, :start_date, :end_date)');
        $newWorker->bindParam(':eid', $eid);
        $newWorker->bindParam(':ssn', $ssn);
        $newWorker->bindParam(':firstName', $firstName);
        $newWorker->bindParam(':lastName', $lastName);
        $newWorker->bindParam(':dob', $dob);
        $newWorker->bindParam(':medNbr', $medNbr);
        $newWorker->bindParam(':addr', $addr);
        $newWorker->bindParam(':city', $city);
        $newWorker->bindParam(':province', $province);
        $newWorker->bindParam(':postalCode', $postalCode);
        $newWorker->bindParam(':phoneNbr', $phoneNbr);
        $newWorker->bindParam(':citizen', $citizen);
        $newWorker->bindParam(':email', $email);
        $newWorker->bindParam(':start_date', $start_date);
        $newWorker->bindParam(':end_date', $end_date);
        $newWorker->execute();

        $display_message = "The Public Health Worker with ID: " . $eid . " was created.";
      }
      catch(PDOException $e)
      {
        die('Error with input values: ' . $e->getMessage());
      }
      
    }
    else
    {
      $display_message = "A Public Health Worker with ID: " . $eid . " already exists.";
    }
  }
  ?>
  <h2>Public Health Worker Creation:</h2>
  <div class= "formDiv">
    <h3 class="instruction">Please enter the Public Health Worker's information:</h3>
    <br>
    <form action="PublicHealthWorkerCreate.php" method="POST">
      <br>
      <h4>EID</h4>
      <input type="text" id="eid" name="eid" placeholder="Format: eID0" required>
      <br>

      <br>
      <h4>SSN</h4>
      <input type="text" id="ssn" name="ssn" placeholder="Format: 123456789" required>
      <br>

      <br>
      <h4>First Name</h4>
      <input type="text" id="firstName" name="firstName" placeholder="eg: Alfred">
      <br>

      <br>
      <h4>Last Name</h4>
      <input type="text" id="lastName" name="lastName" placeholder="eg: McDonald">
      <br>

      <br>
      <h4>Date of birth</h4>
      <input type="text" id="dob" name="dob" placeholder="Format: YYYY-MM-DD">
      <br>

      <br>
      <h4>Medicare Number</h4>
      <input type="text" id="medNbr" name="medNbr" placeholder="Format: ABC1234567">
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
      <h4>Citizen</h4>
      <select id="citizen" name="citizen">
        <option value="Y">Yes</option>
        <option value="N">No</option>
      </select>
      <br>

      <br>
      <h4>Email</h4>
      <input type="text" id="email" name="email" placeholder="Format: name@mail.com">
      <br>

      <br>
      <h4>Start of Employment</h4>
      <input type="text" id="start_date" name="start_date" placeholder="Format: YYYY-MM-DD">
      <br>

      <br>
      <h4>End of Employment</h4>
      <input type="text" id="end_date" name="end_date" placeholder="Format: YYYY-MM-DD">
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