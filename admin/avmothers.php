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
    <title>Total wives</title>
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
                <th style="padding: 10px;">Wife ID</th>
                <th style="padding: 10px;">First Name</th>
                <th style="padding: 10px;">Last Name</th>
                <th style="padding: 10px;">Wife Insurance</th>
                <th style="padding: 10px;">Insurance Number</th>
                <th style="padding: 10px;">Telephone</th>
                <th style="padding: 10px;">National ID</th>
                <th style="padding: 10px;">Passport ID</th>
                <th style="padding: 10px;">Husband ID</th>
            </thead>
<?php
$query= mysqli_query($conn, "SELECT * FROM fam_wife");
if ($query) {
    while ($row= mysqli_fetch_array($query)) {
?>
            <tr>
                <td style="padding: 10px;"><?php echo $row['wife_id'];?></td>
                <td style="padding: 10px;"><?php echo $row['wife_firstname'];?></td>
                <td style="padding: 10px;"><?php echo $row['wife_lastname'];?></td>
                <td style="padding: 10px;"><?php echo $row['wife_insurance'];?></td>
                <td style="padding: 10px;"><?php echo $row['wife_insurance_nber'];?></td>
                <td style="padding: 10px;"><?php echo $row['wife_telephone'];?></td>
                <td style="padding: 10px;"><?php echo $row['wife_nat_id'];?></td>
                <td style="padding: 10px;"><?php echo $row['wife_pass_id'];?></td>
                <td style="padding: 10px;"><?php echo $row['fo_id'];?></td>
            </tr>
<?php
    }
}
?>
        </table>
    </div>
</body>
</html>