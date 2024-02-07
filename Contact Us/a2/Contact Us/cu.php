<?php

    require_once('../../../ums/inc/connectionbus.php');
// $dbhost = 'localhost';
// $dbuser = 'root';
// $dbpass = '';
// $dbname = 'mybatabase';

// $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

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
    $contactnumber = $_POST['number'];
    $message = $_POST['textarea'];

    $sql = "INSERT INTO contactus VALUES ('$username','$email','$contactnumber','$message')";
    $result = mysqli_query($connect, $sql);
}

$table_list = "";

$query = "SELECT * FROM contactus";

$table = mysqli_query($connect, $query);

if ($table) {
    while ($row = mysqli_fetch_assoc($table)) {
        $table_list .= "<tr>";
        $table_list .= "<td>{$row['C_ID']}</td>";
        $table_list .= "<td>{$row['username']}</td>";
        $table_list .= "<td>{$row['email']}</td>";
        $table_list .= "<td>{$row['message']}</td>";
        $table_list .= "</tr>";
    }
} else {
    echo "Database query failed";
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Contact Us Page</title>
        <style>
            .main {
                text-align: center;
            }
        </style>
    </head>

    <body>
        <div class="main">
            <div class="contact">
                <h2 class="contact-heading">Contact Us!</h2>
            </div>

            <br>
            <form action="cu.php" method="POST">
                <div>
                    <label>Username:</label>
                    <input type="text" size="30" name="username" maxlength="15" placeholder="Enter your username">
                </div>

                <br>
                <div>
                    <label>E-mail:</label>
                    <input type="email" size="30" name="email" placeholder="Enter your E-mail">
                </div>

                <br>
                <div>
                    <label>Contact Number:</label>
                    <input type="text" name="number" size="30">
                </div>

                <br>
                <div>
                    <label>Message:</label>
                    <textarea class="textarea" rows="7" cols="25" name="textarea" placeholder="Enter Your message"></textarea>
                </div>

                <br>
                <button type="submit" class="submit"><b>Submit</b></button>
            </form>
        </div>
    </body>
</html>

<?php mysqli_close($connect); ?>
