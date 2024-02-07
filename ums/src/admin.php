<?php session_start(); ?>
<?php require_once('../inc/connection.php'); ?>
<?php require_once('../inc/connectionbus.php'); ?>
<?php 

	//checking if a user is logged in
	if(!isset($_SESSION['user_id'])){
		header('location: index.php');
	}

?>

<!DOCTYPE html>
<html>
    <head>
    	<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">    
        <title>Shopping Cart</title>
        <link rel="stylesheet" href="../css/stylehomepage.css">
        <title>User</title>

        <style type="text/css">
            h1, p, h3{
                color: whitesmoke;
            }

            h3{
                font-size: 50px;
            }

            h1{
                font-size: 80px;
            }

            p{
                max-width: 1000px;
            }
        </style>

    </head>

    <body>
        <header class="header">
            <div class="menuBar">            
                <img src="../../HatchfulExport-All/logo_transparent.png" class="logo" alt="logo">
                <ul class="navBar" id="navBar">
                    <li id="home"><a href="../../Admin/Admin/admin/admin.php">Admin</a></li>
                    <li id="buses"><a href="../../Admin/Admin/admin/busf.php">buses</a></li>
                    <li id="driver"><a href="../../Admin/Admin/admin/busf.php">driver</a></li>
                    <li id="bookTime"><a href="../../assigment111/assigment/src/index.php">Support Team</a></li>
                    <li id="bookTicket"><a href="../../booking (1)/booking.php">Booking ticket</a></li>
                    <li id="about"><a href="../../Contact Us/a2/Agent/agent.php">Agents</a></li>
                    <li id="support"><a href="../../Contact Us/a2/Contact Us/ContactUs.php">Contact</a></li>
                    <li id="username">Welcome <?php echo $_SESSION['first_name']; ?></li>
                    <li id="logOut"><a href="logOut.php">Log out</a></li>
                </ul>
            </div>
        </header>

        <center class="content">

            <h1>Welcome!</h1><br><br>
            <h3>Book your journey with US</h3><br><br>
            <p>Our website makes it easy to book bus tickets for your next trip. Simply enter your departure and arrival cities, the date of travel, and the number of passengers, and we'll show you a list of available buses.</p>


        </center>

    </body>
</html>
<?php mysqli_close($connection); ?>