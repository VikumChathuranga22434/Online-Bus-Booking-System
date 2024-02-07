<?php session_start(); ?>
<?php require_once('../inc/connectionbus.php'); ?>
<?php require_once('../inc/function.php'); ?>

    <?php  

        //checking if a user is logged in
        if(!isset($_SESSION['user_id'])){
            header('location: index.php');
        }

        $err = array();
        $user_id = '';
        $first_name = '';
        $last_name = '';
        $userEmail = '';
        $password = '';

        if(isset($_GET['user_id'])){
            //getting the user information
            $user_id = mysqli_real_escape_string($connect, $_GET['user_id']);
            $query = "SELECT * FROM user WHERE id = '{$user_id}' LIMIT 1";

            $result = mysqli_query($connect, $query);

            if ($result){
                if (mysqli_num_rows($result) == 1){
                    //user found
                    $res = mysqli_fetch_assoc($result);
                    $first_name = $res['first_name'];
                    $last_name = $res['last_name'];
                    $userEmail = $res['email'];
                }else{
                    //user not found
                    header('Location: user.php?err=Invaild_user');
                }
            }else{
                //when query unsucccessful
                header('Location: user.php?err=queryFailed');
            }

        }

        if(isset($_POST['submit'])){
            $user_id = $_POST['UserID'];
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $userEmail = $_POST['email'];
            $password = $_POST['password'];

            $field = array('first_name', 'last_name', 'email', 'phone', 'password');

            foreach ($field as $value) {
                //checking required field
                if(empty(trim($_POST[$value]))){
                    $err[] = "{$value} Name is required";
                }   
            }

            $max_len = array('first_name'=>50, 'last_name'=>100, 'email'=>100, 'phone'=>11, 'password'=>40);

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
            $query = "SELECT * FROM user WHERE email = '{$userEmail}' AND id = '{$user_id}' LIMIT 1";
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
                $encrypted_pass = encrypt($password);

                $query1 = "UPDATE user SET first_name = '{$first_name}', last_name = '{$last_name}', email = '{$userEmail}', password = '{$encrypted_pass}', phone = '{$phone}' WHERE id = '{$user_id}' LIMIT 1";

                $result1 = mysqli_query($connect, $query1);

                if ($result1) {
                    $user_query = "SELECT * FROM user WHERE email = '{$userEmail}' AND password = '{$encrypted_pass}' LIMIT 1";
                    $user_result = mysqli_query($connect, $user_query);

                    if (mysqli_num_rows($user_result) == 1) {
                        $user = mysqli_fetch_assoc($user_result);
                        $_SESSION['user_id'] = $user['id'];
                        $_SESSION['first_name'] = $user['first_name'];
                        header('Location: user.php?modified=true');
                        exit;
                    }
                } else {
                    $err[] = 'Failed to update a your record';
                }
            }
        }

        if(isset($_POST['delete'])){
            // Handle the delete process here
            // Redirect or perform any other actions as required
            header('Location: delete.php');
            exit;
        }

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
                if(!empty($err)){
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
                <!-- <button type="submit" name="submit"><a href="delete.php">DELETE Account</a></button> -->
                <!-- <div class="delete"></div> -->
            </form>
        </div>

    </body>
    </html>

    <?php mysqli_close($connect); ?>
