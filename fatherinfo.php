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
        <button><a href="add_family/add_father.php">Add your Information</a></button>
    </div>
    <div class="main">
        <table border="1">
            <thead>
                <th style="padding: 10px;">Father ID</th>
                <th style="padding: 10px;">First Name</th>
                <th style="padding: 10px;">Last Name</th>
                <th style="padding: 10px;">Father Insurance</th>
                <th style="padding: 10px;">Insurance Number</th>
                <th style="padding: 10px;">Place Of Grade</th>
                <th style="padding: 10px;">Grade Number</th>
                <th style="padding: 10px;">Telephone</th>
                <th style="padding: 10px;">National ID</th>
                <th style="padding: 10px;">Passport ID</th>
            </thead>
<?php
$query= mysqli_query($conn, "SELECT * FROM famownerinfo");
if ($query) {
    while ($row= mysqli_fetch_array($query)) {
?>
            <tr>
                <td style="padding: 10px;"><?php echo $row['fo_id'];?></td>
                <td style="padding: 10px;"><?php echo $row['fa_firstname'];?></td>
                <td style="padding: 10px;"><?php echo $row['fa_lastname'];?></td>
                <td style="padding: 10px;"><?php echo $row['insurance'];?></td>
                <td style="padding: 10px;"><?php echo $row['insurance_nber'];?></td>
                <td style="padding: 10px;"><?php echo $row['placeOf_grade'];?></td>
                <td style="padding: 10px;"><?php echo $row['grade_nber'];?></td>
                <td style="padding: 10px;"><?php echo $row['fa_telephone'];?></td>
                <td style="padding: 10px;"><?php echo $row['fa_nat_id'];?></td>
                <td style="padding: 10px;"><?php echo $row['fa_pass_id'];?></td>
            </tr>
<?php
    }
}
?>
        </table>
    </div>
</body>
</html>