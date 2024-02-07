<?php require_once('../../../ums/inc/connectionbus.php');?>

<?php  

  if(isset($_POST['submit'])){
    $D_ID = $_POST['D_ID'];
    $D_Route = $_POST['D_Route'];
    $D_Schedule = $_POST['D_Schedule'];
    $License_No = $_POST['License_No'];

    $query = "INSERT INTO driver (D_ID, D_Route, D_Schedule, License_No) VALUES ('{$D_ID}', '{$D_Route}', '{$D_Schedule}', '{$License_No}')";

    $record = mysqli_query($connect, $query);

  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Driverf</title>
  <link rel="stylesheet" href="form.css">
</head>
<body background= "bus.jpg" >
  <form action="form.php" method="post">
    <div class="form-group">
      <label for="D_ID">Driver ID</label>
      <input type="text" name="D_ID" id="D_ID" required>
    </div>
    <div class="form-group">
      <label for="D_Route">Route</label>
      <input type="text" name="D_Route" id="D_Route" required>
    </div>
    <div class="form-group">
      <label for="D_Schedule">Schedule</label>
      <input type="text" name="D_Schedule" id="D_Schedule" required>
    </div>
    <div class="form-group">
      <label for="License_No">License Number</label>
      <input type="text" name="License_No" id="License_No"required>
    </div>
    <button type="submit" name="submit">Submit</button>
  </form>
</body>
</html>