<?php session_start(); ?>
<?php require_once('../inc/connectionbus.php'); ?>
<?php require_once('../inc/connection.php'); ?>
<?php require_once('../inc/function.php'); ?>

<?php

    $err = array();
    $first_name = '';
    $last_name = '';
    $userEmail = '';
    $password = '';
    $con_password = '';

    if(isset($_POST['submit'])){
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $userEmail = $_POST['email'];
        $password = $_POST['password'];
        $con_password = $_POST['con_password'];

        $field = array('first_name', 'last_name', 'email', 'phone', 'password', 'con_password');

        foreach ($field as $value) {
            //checking required field
            if(empty(trim($_POST[$value]))){
                $err[] = "{$value} Name is required";
            }   
        }

        $max_len = array('first_name'=>50, 'last_name'=>100, 'email'=>100, 'phone'=>11, 'password'=>40, 'con_password'=>40);

        foreach ($max_len as $value => $len) {
            //checking required field
            if(strlen(trim($_POST[$value])) > $len){
                $err[] = "{$value} Must be less than {$len} characters";
            }   
        }

        //checking email address
        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            $err[] = 'Email address is invalid';
        }

        //checking if email address already exists
        $userEmail = mysqli_real_escape_string($connect, $_POST['email']);
        $query = "SELECT * FROM user WHERE email = '{$userEmail}' LIMIT 1";
        $result = mysqli_query($connect, $query);

        if ($result){
            if (mysqli_num_rows($result) == 1){
                $err[] = 'Email address already exists';
            }
        } 

        if(empty($err)){
            //no errors.... continue
            $first_name = mysqli_real_escape_string($connect, $_POST['first_name']);
            $last_name = mysqli_real_escape_string($connect, $_POST['last_name']);
            $password = mysqli_real_escape_string($connect, $_POST['password']);
            $phone = mysqli_real_escape_string($connect, $_POST['phone']);
            //email has been sanitized
            $encrypted_pass = sha1($password);

            $query1 = "INSERT INTO user (first_name, last_name, email, password, is_deleted, phone) VALUES ('{$first_name}', '{$last_name}', '{$userEmail}', '{$encrypted_pass}', 0, '{$phone}')";

            $result1 = mysqli_query($connect, $query1);

            if ($result1) {
                $user_query = "SELECT * FROM user WHERE email = '{$userEmail}' AND password = '{$encrypted_pass}' LIMIT 1";
                $user_result = mysqli_query($connect, $user_query);

                if (mysqli_num_rows($user_result) == 1) {
                    $user = mysqli_fetch_assoc($user_result);
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['first_name'] = $user['first_name'];
                    header('Location: user.php?useradded=true');
                    exit;
                }
            } else {
                $err[] = 'Failed to add a new record';
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link rel="stylesheet" href="../css/stylereg.css">
</head>
<body>
    <div class="container">
        <h2>User Registration</h2>

        <?php 
            if(!empty($err)){
                echo '<div class="errormsg">';
                echo '<b>Enter values for all fields</b><br>';
                foreach ($err as $error) {
                    echo $error . '<br>';
                }
                echo '</div>';
            }
        ?>

        <form id="registration-form" action="reg.php" method="post">
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
                <input type="tel" id="phone" name="phone" value="" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="confirm-password">Confirm Password:</label>
                <input type="password" id="con_password" name="con_password" required>
            </div>

            <button type="submit" name="submit">Register</button>
        </form>
    </div>
</body>
</html>

<?php mysqli_close($connection); ?>
<?php mysqli_close($connect); ?>
