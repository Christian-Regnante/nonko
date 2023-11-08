<?php
session_start();
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN PAGE</title>
</head>
<body>
    <h2>Login here...</h2>
    <form action="" method="post">
<?php
$sql= mysqli_query($conn, "SELECT * FROM user_account");
if ($sql) {
    while ($row= mysqli_fetch_array($sql)) {
?>
        <input type="hidden" name="id" value="<?php echo $row['id'];?>">
<?php
    }
}
?>
        <input type="text" name="username" placeholder="Username" required><br><br>
        <input type="email" name="email" placeholder="Email" required><br><br>
        <input type="password" name="password" placeholder="Password" required><br><br>
        <button type="submit" name="submit">Login</button>
        <button type="reset">Cancel</button>
    </form>
</body>
</html>
<?php
if (isset($_POST['submit'])) {
    $id= $_POST['id'];
    $name= $_POST['username'];
    $email= $_POST['email'];
    $pwd= md5($_POST['password']);
    $_SESSION['valid']= $id;
    $_SESSION['valid']= $name;

    $query= mysqli_query($conn, "SELECT * FROM user_account WHERE username= '$name' AND email= '$email' AND password= '$pwd'");
    if ($query == true) {
        if (mysqli_fetch_array($query)) {
            if (isset($_SESSION['valid'])) {
                header('location: dashboard.php');
            }
        }
    }
}
?>