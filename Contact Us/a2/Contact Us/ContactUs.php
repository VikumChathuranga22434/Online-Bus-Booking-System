<?php

    require_once('../../../ums/inc/connectionbus.php');

    if (mysqli_connect_errno()) {
        die('Database Connection Failed: ' . mysqli_connect_error());
}

$username = "";
$email = "";
$contactnumber = "";
$message = "";

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $contactnumber = $_POST['contactnumber'];
    $message = $_POST['message'];

    // $sql = "INSERT INTO contactus (username, email, message, contact_number) VALUES ('{$username}', '{$email}', '{$message}', '{$contactnumber}')";

    $sql = "INSERT INTO contactus (username, email, message, contact_number) VALUES ('{$username}', '{$email}', '{$message}', '{$contactnumber}')";

    $result = mysqli_query($connect, $sql);
}


$table_list = "";

$query = "SELECT * FROM contactus";

$table = mysqli_query($connect, $query);

if ($table) {

   $table_list .= "<table>";

    while ($row = mysqli_fetch_assoc($table)) {
        $table_list .= "<tr>";
        $table_list .= "<td>{$row['C_ID']}</td>";
        $table_list .= "<td>{$row['username']}</td>";
        $table_list .= "<td>{$row['email']}</td>";
        $table_list .= "<td>{$row['message']}</td>";
        $table_list .= "</tr>";
    }

   $table_list .= "</table>";

} else {
    echo "Database query failed";
}

?>

<!DOCTYPE html>
   <html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Contact Us Page</title>
      <link rel="stylesheet" href="Contact Us.css">
   </head>
   <body>
      <div class="contact">
         <h2>Contact Us!</h2>
      </div>
      <form action="ContactUs.php" method="post">
         <center>
            <label>Username:</label>
            <input type="text" size="30" name="username" maxlength="15" placeholder="Enter your username"><br>
            <label>E-mail:</label>
            <input type="email" size="30" name="email" placeholder="Enter your E-mail"><br>
            <label>Contact Number:</label>
            <input type="text" name="contactnumber" maxlength="10"><br>
            <label>Message:</label>
            <textarea class="textarea" rows="7" cols="25" name="message" placeholder="Enter your message"></textarea>
         </center>
         <br>
         <center>
            <button onclick="validateForm()" type="submit" name="submit"><b>Submit</b></button>
         </center>
      </form>

      <br><br>

      <center class="masseage">

         <?php echo $table_list; ?>

      </center>

      <script>
         function validateForm() {
            var username = document.forms[0].username.value;
            var email = document.forms[0].email.value;
            var contactNumber = document.forms[0].contactnumber.value;
            var message = document.forms[0].message.value;

            if (username === "" || email === "" || contactNumber === "" || message === "") {
               alert("Please fill in all fields.");
               return false;
            }
         }
      </script>
   </body>
</html>
