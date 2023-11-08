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
            <li><a href="fatherinfo.php">Father Information</a></li>
            <li><a href="motherinfo.php">Mother Information</a></li>
            <li><a href="childinfo.php">Childs Information</a></li>
            <li><a href="fmembers.php">Other family member(s)</a></li>
            <li><a href="location.php">Home Location</a></li>
            <li><a href="allfamily.php">Summary</a></li>
        </ul>
    </div><br>
    <div class="btn">
        <button><a href="add_family/add_location.php">Add the location</a></button>
    </div>
    <div class="main">
        <table border="1">
            <thead>
                <th style="padding: 10px;">Location ID</th>
                <th style="padding: 10px;">Country</th>
                <th style="padding: 10px;">Province/City</th>
                <th style="padding: 10px;">District</th>
                <th style="padding: 10px;">Sector</th>
                <th style="padding: 10px;">Cell</th>
                <th style="padding: 10px;">Village</th>
                <th style="padding: 10px;">Family Onwer ID</th>
            </thead>
<?php
$query= mysqli_query($conn, "SELECT * FROM fam_location");
if ($query) {
    while ($row= mysqli_fetch_array($query)) {
?>
            <tr>
                <td style="padding: 10px;"><?php echo $row['loc_id'];?></td>
                <td style="padding: 10px;"><?php echo $row['country'];?></td>
                <td style="padding: 10px;"><?php echo $row['province'];?></td>
                <td style="padding: 10px;"><?php echo $row['district'];?></td>
                <td style="padding: 10px;"><?php echo $row['sector'];?></td>
                <td style="padding: 10px;"><?php echo $row['cell'];?></td>
                <td style="padding: 10px;"><?php echo $row['village'];?></td>
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