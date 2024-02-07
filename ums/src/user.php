<?php session_start(); ?>
<?php require_once('../inc/connection.php'); ?>
<?php require_once('../inc/connectionbus.php'); ?>
<?php 

	//checking if a user is logged in
	if(!isset($_SESSION['user_id'])){
		header('location: index.php');
	}

	$route_list = "";
	$user = $_SESSION['user_id'];

	//Getting the list of route details
	$query = "SELECT * FROM route";

	$table = mysqli_query($connect, $query);

	if($table){
		while ($row = mysqli_fetch_assoc($table)) {
			$route_list .= "<tr>";
			$route_list .= "<td>{$row['Route_No']}</td>";
			$route_list .= "<td>{$row['R_Name']}</td>";
			$route_list .= "<td>{$row['S_Point']}</td>";
			$route_list .= "<td>{$row['destination']}</td>";
			$route_list .= "<td>{$row['distance']}</td>";
			$route_list .= "<td>{$row['Time_Duration']}</td>";
			$route_list .= "</tr>";
		}
	}
	else{
		echo "Database query failed";
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
    </head>

    <body>
        <header class="header">
            <div class="menuBar">            
                <img src="../../HatchfulExport-All/logo_transparent.png" class="logo" alt="logo">
                <?php 
                	$query = "SELECT * FROM user WHERE is_deleted = 0 ORDER BY first_name";
                	$user = mysqli_query($connect, $query);

                	$user = mysqli_fetch_assoc($user)
                ?>
                <ul class="navBar" id="navBar">
                    <li id="home"><a href="#">Home</a></li>
                    <li id="bookTime"><a href="#">Bus Time Table</a></li>
                    <li id="bookTicket"><a href="../../booking (1)/booking.php">Booking ticket</a></li>
                    <li id="about"><a href="#">About Us</a></li>
                    <li id="support"><a href="../../Contact Us/a2/Contact Us/ContactUs.php">Contact</a></li>
                    <li id="username"><a href="update.php?user_id=<?php echo $_SESSION['user_id']; ?>">Welcome <?php echo $_SESSION['first_name']; ?></a></li>
                    <li id="logOut"><a href="logOut.php">Log out</a></li>
                </ul>
            </div>
        </header>

        <main>
        	<h1>Watch Time Table</h1>
        	<table class="master-list">
        		<tr>
        			<th>Route No</th>
        			<th>Route Name</th>
        			<th>Starting Point</th>
        			<th>Destination</th>
        			<th>Distance</th>
        			<th>Time Duration</th>
        		</tr>

        		<?php echo $route_list; ?>
        	</table>
        </main>

        <footer>
            <div class="contact">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</div>
            <div class="Applinks">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut</div>
        </footer>
    </body>
</html>
<?php mysqli_close($connection); ?>