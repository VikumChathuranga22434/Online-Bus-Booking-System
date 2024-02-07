<?php session_start(); ?>

<?php
require_once('config.php'); 
$query = "SELECT * FROM contactus";
$result = mysqli_query($conn, $query);
?>
<?php
require_once('config.php'); 
if(isset($_POST['submit'])){
    $username=$_POST['username'];
    $email=$_POST['email'];
    $replyMessage=$_POST['complaints_reply'];
    $query = "INSERT INTO contactus ( username, email, complaints_reply) VALUES ('$username', '$email', '$replyMessage')";
    $result = mysqli_query($conn, $query);
    if($result){
        echo"Data Insert Successfully";
    }
}
?>
<?php
require_once('config.php'); 
if(isset($_POST['submit'])){
    $username=$_POST['username'];
    $email=$_POST['email'];
    $replyMessage=$_POST['questions_reply'];
    $query = "INSERT INTO contactus ( username, email, questions_reply) VALUES ('$username', '$email', '$replyMessage')";
    $result = mysqli_query($conn, $query);
    if($result){
        echo"Data Insert Successfully";
    }
}
?>
<?php
require_once('config.php');
if(isset($_GET['Delete'])){
    $id=$_GET['Delete'];
    $query = "DELETE FROM contactus WHERE C_ID='{$id}'";
    $result = mysqli_query($conn, $query);
    if($result){
        echo"Delete Successfully";
    }
} 
?>
<?php
require_once('config.php'); 
if(isset($_POST['Update1'])){
    $username=$_POST['username'];
    $email=$_POST['email'];
    $replyMessage=$_POST['complaints_reply'];
    $query = "UPDATE contactus SET username='$username', email='$email', complaints_reply='$replyMessage'";
    $result = mysqli_query($conn, $query);
    if($result){
        echo"Data updata Successfully";
    }
}
?>
<?php
require_once('config.php'); 
if(isset($_POST['Update2'])){
    $username=$_POST['username'];
    $email=$_POST['email'];
    $replyMessage=$_POST['questions_reply'];
    $query = "UPDATE  contactus SET username='$username', email='$email', questions_reply='$replyMessage'";
    $result = mysqli_query($conn, $query);
    if($result){
        echo"Data update Successfully";
    }
}
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Happy Journey</title> 
        <link rel="stylesheet" href="styles.css">
        <script src="script.js"></script>
    </head>
    <body class="a">
        <div class="background1">
            <div class="background2">
                <div id="p" class="p"></div>
                <div class="body">
                    <div class="text">Support Team</div>
                    <div class="navigation_bar">
                        <div class="btn">
                            <button class="button">Contact</button>
                            <div class="dropdown-content">
                            <a href="https://web.whatsapp.com/">Whatsapp</a>
                            <a href="https://mail.google.com/">Mail</a>
                            </div>
                        </div>
                        <div class="btn">
                            <button  onclick="show1();" class="button">Questions</button>
                        </div>
                        <div class="btn">
                            <button onclick="show2();" class="button">Complaints</button>
                        </div>
                    </div>
                    <div id="w" class="details">
                        <div class="details1">
                            <table class="table">Questions
                                <tr>
                                <td class="td">C_ID</td>
                                <td class="td">Username</td>
                                <td class="td">E-mail</td>
                                <td class="td">Contact_No</td>
                                <td class="td">Message</td>
                                <
                                </tr>
                                <tr>   
                                <?php
                                    while( $row = mysqli_fetch_assoc($result)){
                                ?>
                                <td><?php echo $row['C_ID']; ?></td>
                                <td><?php echo $row['username']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['contact_number']; ?></td>
                                <td><?php echo $row['message']; ?></td>
                                </tr>
                                <?php
                                    }
                                ?>
                            </table>
                        </div>
                    </div>
                    <div id="d" class="details2">Questions Reply
                        <div class="btn1">
                            <div class="btn3">
                                <button type="submit" class="button" name="Insert1">Insert</button>
                            </div>
                            <div class="btn3">
                                <button type="submit" class="button" name="Update1">Update</button>
                            </div>
                        </div>
                        <div class="textd1">
                            <div class="textd2">
                                <div class="text1">Username:</div>
                                <input type="text" class="input" name="Username"/>
                            </div>
                            <div class="textd3">
                                <div class="text1">E-mail:</div>
                                <input type="email" class="input" name="E-mail"/>
                            </div>
                            <div class="textd3">
                                <div class="text1">Reply Message:</div>
                                <input type="text" class="input" name="Questions_reply"/>
                            </div>
                        </div>
                        <div class="details1">
                            <table class="table">Questions_reply
                                <tr>
                                <td class="td">C_ID</td>
                                <td class="td">Username</td>
                                <td class="td">E-mail</td>
                                <td class="td">Questions_reply</td>
                                <td class="td">Delete</td>
                                </tr>
                                <tr>   
                                <?php
                                    while( $row = mysqli_fetch_assoc($result)){
                                ?>
                                <td><?php echo $row['C_ID']; ?></td>
                                <td><?php echo $row['username']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['questions_reply']; ?></td>
                                <td><a href="#" id="Delete" class="btn button">Delete</a></td>
                                </tr>
                                <?php
                                    }
                                ?>
                            </table>
                        </div>
                        <div class="btn btn2">
                            <button onclick="back1();" class="button">Back</button>
                        </div>
                    </div>
                    <div id="c" class="details2">Complaints Reply
                        <div class="btn1">
                            <div class="btn3">
                                <button id="Insert2" class="button">Insert</button>
                            </div>
                            <div class="btn3">
                                <button id="Update2" class="button">Update</button>
                            </div>
                        </div>
                        <div class="textd1">
                            <div class="textd2">
                                <div class="text1">Username:</div>
                                <input type="text" class="input" name="Username"/>
                            </div>
                            <div class="textd3">
                                <div class="text1">E-mail:</div>
                                <input type="email" class="input" name="E-mail"/>
                            </div>
                            <div class="textd3">
                                <div class="text1">Reply Message:</div>
                                <input type="text" class="input" name="Complaints_reply"/>
                            </div>
                        </div>
                        <div class="details1">
                            <table class="table">Complaints_reply
                                <tr>
                                <td class="td">C_ID</td>
                                <td class="td">Username</td>
                                <td class="td">E-mail</td>
                                <td class="td">Complaints_reply</td>
                                <td class="td">Delete</td>
                                </tr>
                                <tr>   
                                <?php
                                    while( $row = mysqli_fetch_assoc($result)){
                                ?>
                                <td><?php echo $row['C_ID']; ?></td>
                                <td><?php echo $row['username']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['complaints_reply']; ?></td>
                                <td><a href="#" id="Delete" class="btn button">Delete</a></td>
                                </tr>
                                <?php
                                    }
                                ?>
                            </table>
                        </div>
                        <div class="btn btn2">
                            <button onclick="back2();" class="button">Back</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer"></div>
        </div>
    </body>
</html>