<?php require_once('../../../ums/inc/connectionbus.php');?>

<?php  

  if(isset($_POST['submit'])){
    $B_No = $_POST['B_No'];
    $number_plate = $_POST['number_plate'];
    $main_Bus_Route = $_POST['main_Bus_Route'];
    $capacity = $_POST['capacity'];

    $query = "INSERT INTO buses (B_No, number_plate, main_Bus_Route, capacity) VALUES ('{$B_No}', '{$number_plate}', '{$main_Bus_Route}', '{$capacity}')";

    $record = mysqli_query($connect, $query);

  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Busf</title>
  <link rel="stylesheet" href="busf.css">
</head>
<body background= "bus.jpg" >
  <form action="busf.php" method="post">
    <div class="form-group">
      <label for="B_No">Bus Number</label>
      <input type="text" name="B_No" id="B_No" required>
    </div>
    <div class="form-group">
      <label for="number_plate">Number Plate</label>
      <input type="text" name="number_plate" id="number_plate"required>
    </div>
    <div class="form-group">
      <label for="main_Bus_Route">Bus Route</label>
      <input type="text" name="main_Bus_Route" id="main_Bus_Route" required>
    </div>
    <div class="form-group">
      <label for="capacity">Capacity</label>
      <input type="text" name="capacity" id="capacity" required>
    </div>
    <button type="submit" name="submit">Submit</button>
  </form>
</body>
</html>