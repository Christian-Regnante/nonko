<?php
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTRATION PAGE</title>
</head>
<body>
    <h2>Sign up here...</h2>
    <form action="" method="post">
        <input type="text" name="username" placeholder="Username" required><br><br>
        <input type="email" name="email" placeholder="Email" required><br><br>
        <input type="password" name="password" placeholder="Password" required><br><br>
        <button type="submit" name="submit">Sign Up</button>
        <button type="reset">Cancel</button>
    </form>
</body>
</html>
<?php
if (isset($_POST['submit'])) {
    $name= $_POST['username'];
    $email= $_POST['email'];
    $pwd= md5($_POST['password']);

    $query= mysqli_query($conn, "INSERT INTO user_account(username, email, password) VALUES('$name', '$email', '$pwd')");

    if ($query == true) {
        header('location: login.php');
    }
}
?>