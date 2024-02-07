<?php require_once('header.php') ?>
<?php
    // Check for form submission
    if (isset($_POST['submit'])) {
        $error = array();

        // Check if the username and password have been entered
        if (!isset($_POST['email']) || strlen(trim($_POST['email'])) < 1) {
            $error[] = 'Username is missing / invalid';
        }

        if (!isset($_POST['password']) || strlen(trim($_POST['password'])) < 1) {
            $error[] = 'Password is missing / invalid';
        }

        // Check if there are any errors in the form
        if (empty($error)) {
            // Save username and password into variables
            $email = mysqli_real_escape_string($connection, $_POST['email']);
            $password = mysqli_real_escape_string($connection, $_POST['password']);
            $encrypted_pass = sha1($password);

            // Prepare database query for users
            $user_query = "SELECT * FROM user WHERE email = '{$email}' AND password = '{$encrypted_pass}' LIMIT 1";
            $user_result = mysqli_query($connection, $user_query);

            // Prepare database query for admins
            // $admin_query = "SELECT * FROM admin WHERE email = '{$email}' AND password = '{$encrypted_pass}' LIMIT 1";
            // $admin_result = mysqli_query($connection, $admin_query);

            if ($user_result) {
                if (mysqli_num_rows($user_result) == 1) {
                    // Valid user found
                    // Redirect to user.php
                    header('Location: user.php');
                } elseif ($admin_result && mysqli_num_rows($admin_result) == 1) {
                    // Valid admin found
                    // Redirect to admin.php
                    header('Location: admin.php');
                } else {
                    // Username and password invalid
                    $error[] = 'Invalid username/password';
                }
            } else {
                $error[] = 'Database query failed';
            }
        }
    }
?>
    <div class="login">
        <form action="index.php" method="post">
            <fieldset>

                <legend><h1>Log In</h1></legend>

                <?php 
                    if (isset($error) && !empty($error)){
                        echo '<p class="error">Invalid username or password</p>';
                    } 
                ?>

                <p>
                    <label for="">Username : </label>
                    <input type="text" name="email" placeholder="Email Address">
                </p>

                <p>
                    <label for="">password : </label>
                    <input type="text" name="password" placeholder="Password">
                </p>

                <p>
                    <button type="submit" name="submit">Log In</button>
                </p>

            </fieldset>
        </form>
    </div>
<?php require_once('footer.php') ?>