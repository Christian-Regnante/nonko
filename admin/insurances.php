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
    <title>Total Insurances</title>
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
        <table border="1">
            <thead>
                <th style="padding: 10px;">Insurance ID</th>
                <th style="padding: 10px;">Insurance Names</th>
                <th style="padding: 10px;" colspan="2">Operation</th>
            </thead>
<?php
$query= mysqli_query($conn, "SELECT * FROM avinsurance");
if ($query) {
    while ($row= mysqli_fetch_array($query)) {
?>
            <tr>
                <td style="padding: 10px;"><?php echo $row['insurance_id'];?></td>
                <td style="padding: 10px;"><?php echo $row['insurance'];?></td>
                <td style="padding: 10px;"><button><a href="operations?delete_ins=<?php echo $row['insurance_id'];?>">Delete</a></button></td>
                <td style="padding: 10px;"><button><a href="operations?update_ins=<?php echo $row['insurance_id'];?>">Update</a></button></td>
            </tr>
<?php
    }
}
?>
        </table>
    </div>
</body>
</html>