<!-- <?php include_once('phpbooking.php') ?> -->

<!DOCTYPE html>
<html>
  <head>
    <title>Bus Booking</title>
    <link rel="stylesheet" type="text/css" href="busbooking.css">
  </head>
  
  <body>
    <h1>Booking Ticket</h1>
    <form action="phpbooking.php" method="post">

      <div class="form-group">
        <label for="passengerName">Passenger Name:</label>
        <input type="text" class="form-control" id="passengerName" name="passengerName" required>
      </div>

      <div class="form-group">
        <label for="contactNumber">Contact Number:</label>
        <input type="text" class="form-control" id="contactNumber" name="contactNumber" required>
      </div>

      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" name="email" required>
      </div>
      
      <div class="form-group">
        <label for="destination">Destination:</label>
        <input type="text" class="form-control" id="destination" name="destination" required>
      </div>

      <div class="form-group">
        <label for="departureDate">Departure Date:</label>
        <input type="date" class="form-control" id="departureDate" name="departureDate" required>
      </div>

      <div class="form-group">
        <label for="departureTime">Departure Time:</label>
        <input type="time" class="form-control" id="departureTime" name="departureTime" required>
      </div>

      <div class="form-group">
        <label for="numTickets">Number of Tickets:</label>
        <input type="number" class="form-control" id="numTickets" name="numTickets" required>
      </div>

      <button type="submit" class="btn btn-primary" name="submit">Book Ticket</button>
    </form>
  </body>
</html>