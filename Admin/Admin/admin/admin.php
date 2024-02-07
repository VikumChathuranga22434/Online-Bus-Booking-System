<?php require_once('../../../ums/inc/connectionbus.php');?>

<?php

  if (isset($_POST[''])){
    $username = $_POST['username'];

    $inquiry = $_POST['inquiry'];

    $comment = $_POST['textarea'];
  }

?>

<?php
 
    $element = "";

    //set query

    $query = "SELECT * FROM driver";


    $table = mysqli_query($connect, $query);


    if ($table){

        while($row = mysqli_fetch_assoc($table)){

            $element .= "<tr>";

            $element .= "<td>{$row['D_ID']}</td>";

            $element .= "<td>{$row['D_Route']}</td>";

            $element .= "<td>{$row['D_Schedule']}</td>";

            $element .= "<td>{$row['License_No']}</td>";

            $element .= '<td><button class="update-driver">Update</button></td>';

            $element .= '<td><button class="delete-driver">Delete</button></td>';

            $element .= "</tr>";

        }

    }else {

        echo "Database query failed";

    }

?>

<?php
 
    $bus_list = "";

    //set query

    $query = "SELECT * FROM buses";


    $table = mysqli_query($connect, $query);


    if ($table){

        while($row = mysqli_fetch_assoc($table)){

             $bus_list .= "<tr>";

             $bus_list .= "<td>{$row['B_No']}</td>";

             $bus_list .= "<td>{$row['number_plate']}</td>";

             $bus_list .= "<td>{$row['main_Bus_Route']}</td>";

             $bus_list .= "<td>{$row['capacity']}</td>";

             $bus_list .= '<td><button class="update-driver">Update</button></td>';

             $bus_list .= '<td><button class="delete-driver">Delete</button></td>';

             $bus_list .= "</tr>";

        }

    }else {

        echo "Database query failed";

    }

?>    




<!DOCTYPE html>
<html>
  <head>
    <title>Admin</title>
    <link rel="stylesheet" type="text/css" href="admin.css">
  </head>
  <body background="bus.jpg" >
    <div class="container"> 
      <div class="drivers">
        <h2>Drivers</h2>
  	    <a href="form.php">
        <button class="add-driver">Add Driver</button>
  	    </a>

        <table>
          <thead>
            <tr>
              <th>Driver ID</th>
  			      <th>Route</th>
  			      <th>Schedule</th>
              <th>License Plate Number</th>
              
            </tr>
          </thead>
          <tbody>

               <?php echo $element; ?>
            <tr>
              <td>D10001</td>
  			      <td>Colombo-Jaffna</td>
  			      <td>8.00am-5.00pm</td>
              <td>1402523516</td>
  			      <td><button class="update-driver">Update</button></td>
  			      <td><button class="delete-driver">Delete</button></td>
            </tr>
            <tr>
              <td>D10002</td>
  			      <td>Colombo-Jaffna</td>
  			      <td>8.00am-5.00pm</td>
              <td>1402523516</td>
  			      <td><button class="update-driver">Update</button></td>
  			      <td><button class="delete-driver">Delete</button></td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="buses">
        <h2>Buses</h2>
  	    <a href="busf.php">
        <button class="add-bus">Add Bus</button>
  	    </a>
        <table>
          <thead>
            <tr>
              <th>Bus Number</th>
    			    <th>License Plate Number</th>
              <th>Bus Route</th>
    			    <th>Capacity</th>
            </tr>
          </thead>
          <tbody>

             <?php echo $bus_list; ?>

            <tr>
              <td>00001</td>
  			      <td>ND-4848</td>
              <td>Colombo - Kandy</td>
              <td>54</td>
  			      <td><button class="update-driver">Update</button></td>
  			      <td><button class="delete-driver">Delete</button></td>
            </tr>
            <tr>
              <td>00002</td>
  			      <td>NB-7365</td>
              <td>Colombo - Galle</td>
              <td>40</td>
  			      <td><button class="update-driver">Update</button></td>
  			      <td><button class="delete-driver">Delete</button></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </body>
</html>