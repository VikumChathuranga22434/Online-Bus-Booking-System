<?php
    session_start();
    require_once('../inc/connectionbus.php');
    require_once('../inc/function.php');

    // Checking if a user is logged in
    if (!isset($_SESSION['user_id'])) {
        header('location: index.php');
    }

    $err = array();
    $user_id = '';
    $first_name = '';
    $last_name = '';
    $userEmail = '';
    $password = '';

    if (isset($_GET['user_id'])) {
        $user_id = mysqli_real_escape_string($connect, $_GET['user_id']);
        $query = "SELECT * FROM user WHERE id = '{$user_id}' LIMIT 1";
        $result = mysqli_query($connect, $query);

        if ($result) {
            if (mysqli_num_rows($result) == 1) {
                // User found
                $res = mysqli_fetch_assoc($result);
                $first_name = $res['first_name'];
                $last_name = $res['last_name'];
                $userEmail = $res['email'];
            } else {
                // User not found
                header('Location: user.php?err=Invalid_user');
            }
        } else {
            // Query unsuccessful
            header('Location: user.php?err=queryFailed');
        }
    }

    if (isset($_POST['submit'])) {
        $user_id = $_POST['UserID'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $userEmail = $_POST['email'];
        $password = $_POST['password'];

        $field = array('first_name', 'last_name', 'email', 'phone', 'password');

        foreach ($field as $value) {
            // Checking required fields
            if (empty(trim($_POST[$value]))) {
                $err[] = "{$value} is required";
            }   
        }

        $max_len = array('first_name' => 50, 'last_name' => 100, 'email' => 100, 'phone' => 11, 'password' => 40);

        foreach ($max_len as $value => $len) {
            // Checking maximum length of fields
            if (strlen(trim($_POST[$value])) > $len) {
                $err[] = "{$value} must be less than {$len} characters";
            }   
        }

        // Checking email address
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $err[] = 'Email address is invalid';
        }

        if (empty($err)) {
            // No errors, continue
            $first_name = mysqli_real_escape_string($connect, $_POST['first_name']);
            $last_name = mysqli_real_escape_string($connect, $_POST['last_name']);
            $password = mysqli_real_escape_string($connect, $_POST['password']);
            $phone = mysqli_real_escape_string($connect, $_POST['phone']);
            $encrypted_pass = encrypt($password); // Assuming you have the encryption function

            // Update the relevant fields in the database
            $query1 = "UPDATE user SET first_name = '{$first_name}', last_name = '{$last_name}', email = '{$userEmail}', password = '{$encrypted_pass}', phone = '{$phone}' WHERE id = '{$user_id}' LIMIT 1";
            $result1 = mysqli_query($connect, $query1);

            if ($result1) {
                // Successfully updated the record
                header('Location: user.php?modified=true');
                exit;
            } else {
                // Failed to update the record
                $err[] = 'Failed to update your record';
            }
        }
    }

    // Handle account deletion
    if (isset($_POST['delete'])) {
        $user_id = $_POST['UserID'];

        // Delete the user account
        $query = "DELETE FROM user WHERE id = '{$user_id}' LIMIT 1";
        $result = mysqli_query($connect, $query);

        if ($result) {
            // Account deleted successfully
            header('Location: index.php');
            exit;
        } else {
            // Failed to delete the account
            $err[] = 'Failed to delete your account';
        }
    }

    mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User details</title>
    <link rel="stylesheet" href="../css/stylereg.css">
</head>
<body>
    <div class="container">
        <h2>Update User details</h2>

        <?php 
            if (!empty($err)) {
                echo '<div class="errormsg">';
                echo '<b>Enter values for all fields</b><br>';
                foreach ($err as $error) {
                    echo $error . '<br>';
                }
                echo '</div>';
            }
        ?>

        <form id="registration-form" action="update.php" method="post">

            <input type="hidden" name="UserID" value="<?php echo $user_id; ?>">

            <div class="form-group">
                <label for="first-name">First Name:</label>
                <input type="text" id="first-name" name="first_name" value="<?php echo htmlspecialchars($first_name); ?>" required>
            </div>
            <div class="form-group">
                <label for="last-name">Last Name:</label>
                <input type="text" id="last-name" name="last_name" value="<?php echo htmlspecialchars($last_name); ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email Address:</label>
                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($userEmail); ?>" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number:</label>
                <input type="tel" id="phone" name="phone" required>
            </div>
            <div class="form-group">
                <label for="password">Change Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" name="submit">Update</button>
            <button type="submit" name="delete">Delete Account</button>
        </form>
    </div>
</body>
</html>
