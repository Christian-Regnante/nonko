<?php
session_start();
if (!isset($_SESSION['valid'])) {
    header('location: index.php');
}
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DASHBOARD PAGE</title>
</head>
<body>
    <button><a href="logout.php">Logout</a></button>
    <div class="menu">
        <ul>
            <li><a href="dashboard.php">HOME</a></li>
            <li><a href="users.php">Available Users</a></li>
            <li><a href="avfathers.php">Available Family owners</a></li>
            <li><a href="avmothers.php">Available wives</a></li>
            <li><a href="avchilds.php">Available childs</a></li>
            <li><a href="avmembers.php">Available family members</a></li>
            <li><a href="insurances.php">Available insurance</a></li>
            <li><a href="locations.php">Available Location</a></li>
            <li><a href="summary.php">Full available info</a></li>
        </ul>
    </div><br>
    <div class="main">
    <h1>A warm welcome to our <?php echo $_SESSION['valid'];?>!</h1>
    <div class="acounts">
<?php
    $sql= mysqli_query($conn, "SELECT * FROM user_account");
        if ($sql) {
            $row= mysqli_num_rows($sql);
?>
        <button><a href="users.php"><?php echo $row;?> User Accounts</a></button>
<?php
    }
?>
    </div><br>
    <div class="fathers">
<?php
    $sql= mysqli_query($conn, "SELECT * FROM 	famownerinfo");
        if ($sql) {
            $row= mysqli_num_rows($sql);
?>
        <button><a href="avfathers.php"><?php echo $row;?> Available family owners</a></button>
<?php
    }
?>
    </div><br>
    <div class="wives">
<?php
    $sql= mysqli_query($conn, "SELECT * FROM fam_wife");
        if ($sql) {
            $row= mysqli_num_rows($sql);
?>
        <button><a href="avmothers.php"><?php echo $row;?> available Family's wives</a></button>
<?php
    }
?>
    </div><br>
    <div class="childs">
<?php
    $sql= mysqli_query($conn, "SELECT * FROM fam_childs");
        if ($sql) {
            $row= mysqli_num_rows($sql);
?>
        <button><a href="avchilds.php"><?php echo $row;?> available Family's childs</a></button>
<?php
    }
?>
    </div><br>
    <div class="members">
<?php
    $sql= mysqli_query($conn, "SELECT * FROM fam_members");
        if ($sql) {
            $row= mysqli_num_rows($sql);
?>
        <button><a href="avmembers.php"><?php echo $row;?> available Family's members</a></button>
<?php
    }
?>
    </div><br>
    <div class="insurance">
<?php
    $sql= mysqli_query($conn, "SELECT * FROM avinsurance");
        if ($sql) {
            $row= mysqli_num_rows($sql);
?>
        <button><a href="insurances.php"><?php echo $row;?> Available insurance</a></button>
<?php
    }
?>
    </div><br>
    <div class="location">
<?php
    $sql= mysqli_query($conn, "SELECT * FROM fam_location");
        if ($sql) {
            $row= mysqli_num_rows($sql);
?>
        <button><a href="locations.php"><?php echo $row;?> Available Locations</a></button>
<?php
    }
?>
    </div>
    </div>
</body>
</html>