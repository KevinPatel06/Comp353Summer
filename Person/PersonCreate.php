<?php require_once '../database.php';?>

<html>

<head>
      <title>C19VS - Person Create</title>
      <link rel="stylesheet" href="../style.css">
</head>

  <?php
  $display_message = "";
  
  if(isset($_POST['pid'])) 
  {
    $pid = $_POST['pid'];
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
    $passNbr = $_POST['passNbr'];

    
    $pkCheck = $db->prepare('SELECT count(*) AS total FROM c19vs.person WHERE pID = :pid');
    $pkCheck->bindParam(':pid', $pid);
    $pkCheck->execute();
    $PKResult = $pkCheck->fetch(PDO::FETCH_ASSOC);
    if($PKResult['total'] == 0)
    {
      try
      {
        $newPerson = $db->prepare('INSERT INTO c19vs.person VALUES (:pid, :ssn, :firstName, :lastName, :dob, :medNbr, :addr, :city, :province, :postalCode, :phoneNbr, :citizen, :email, :passNbr)');
        $newPerson->bindParam(':pid', $pid);
        $newPerson->bindParam(':ssn', $ssn);
        $newPerson->bindParam(':firstName', $firstName);
        $newPerson->bindParam(':lastName', $lastName);
        $newPerson->bindParam(':dob', $dob);
        $newPerson->bindParam(':medNbr', $medNbr);
        $newPerson->bindParam(':addr', $addr);
        $newPerson->bindParam(':city', $city);
        $newPerson->bindParam(':province', $province);
        $newPerson->bindParam(':postalCode', $postalCode);
        $newPerson->bindParam(':phoneNbr', $phoneNbr);
        $newPerson->bindParam(':citizen', $citizen);
        $newPerson->bindParam(':email', $email);
        $newPerson->bindParam(':passNbr', $passNbr);
        $newPerson->execute();

        $display_message = "The person with ID: " . $pid . " was created.";
      }
      catch(PDOException $e)
      {
        die('Error with input values: ' . $e->getMessage());
      }
      
    }
    else
    {
      $display_message = "A person with ID: " . $pid . " already exists.";
    }
  }
  ?>
  <h2>Person Creation:</h2>
  <div class= "formDiv">
    <h3 class="instruction">Please enter the Person's information:</h3>
    <br>
    <form action="personCreate.php" method="POST">
      <br>
      <h4>PID</h4>
      <input type="text" id="pid" name="pid" placeholder="Format: pID0" required>
      <br>

      <br>
      <h4>SSN</h4>
      <input type="text" id="ssn" name="ssn" placeholder="Format: 123456789">
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
      <h4>Passport Number</h4>
      <input type="text" id="passNbr" name="passNbr" placeholder="Format: A1234">
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