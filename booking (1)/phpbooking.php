<?php require_once('../ums/inc/connectionbus.php');?>

<?php

    $username = "";
    $phonenumber = "";
    $email = "";
    $destination = "";
    $departureDate = "";
    $departureTime = "";
    $numTickets = "";

    if (isset($_POST['submit'])){

        $username = $_POST['passengerName'];
        $phonenumber = $_POST['contactNumber'];
        $email = $_POST['email'];
        $destination = $_POST['destination'];
        $departureDate = $_POST['departureDate'];
        $departureTime = $_POST['departureTime'];
        $numTickets = $_POST['numTickets'];

        $query = "INSERT INTO bookingTicket (username, contactnumber, email, destination, d_date, d_time, ticketCount) VALUES ('{$username}', '{$phonenumber}', '{$email}', '{$destination}', '$departureDate', '$departureTime', '$numTickets')";

        $record = mysqli_query($connect, $query);

    }

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Bus Booking</title>
    <link rel="stylesheet" type="text/css" href="busbooking.css">
  </head>
  
  <body>
    <h2>Your booking has placed successfully</h2>
    <h2>Thank you for joining us</h2>
    <div class="link">
        <a href="../ums/src/user.php">back to home page</a>
    </div>
  </body>
</html>