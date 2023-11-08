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
    <title>SUMMARY REPORT</title>
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
<?php
$query= "SELECT father.fa_firstname, father.fa_lastname, father.insurance, father.insurance_nber, father.fa_telephone, father.fa_nat_id, father.fa_pass_id, mother.wife_firstname, mother.wife_lastname, mother.wife_insurance, mother.wife_insurance_nber, mother.wife_telephone, mother.wife_nat_id, mother.wife_pass_id, child.ch_firstname, child.ch_lastname, child.ch_insurance, child.ch_insurance_nber, child.ch_nat_id, child.ch_pass_id, location.country, location.province, location.district, location.sector, location.cell, location.village, father.placeOf_grade, father.grade_nber
FROM famownerinfo AS father
LEFT JOIN fam_wife AS mother ON father.fo_id = mother.fo_id
LEFT JOIN fam_childs AS child ON father.fo_id = child.fo_id
LEFT JOIN fam_location AS location ON father.fo_id = location.fo_id

UNION

SELECT father.fa_firstname, father.fa_lastname, father.insurance, father.insurance_nber, father.fa_telephone, father.fa_nat_id, father.fa_pass_id, mother.wife_firstname, mother.wife_lastname, mother.wife_insurance, mother.wife_insurance_nber, mother.wife_telephone, mother.wife_nat_id, mother.wife_pass_id, child.ch_firstname, child.ch_lastname, child.ch_insurance, child.ch_insurance_nber, child.ch_nat_id, child.ch_pass_id, location.country, location.province, location.district, location.sector, location.cell, location.village, father.placeOf_grade,father.grade_nber
FROM famownerinfo AS father
RIGHT JOIN fam_wife AS mother ON father.fo_id = mother.fo_id
RIGHT JOIN fam_childs AS child ON father.fo_id = child.fo_id
RIGHT JOIN fam_location AS location ON father.fo_id = location.fo_id";
$result= mysqli_query($conn, $query);
if ($result) {
    while ($row= mysqli_fetch_array($result)) {
?>
        <table border="1">
        <tr >
            <th rowspan="7">FATHER</th>
            <th>Firstname</th>

            <td><?php echo $row['fa_firstname'];?></td>
        </tr>
        <tr>
            <th>Lastname</th>
            <td><?php echo $row['fa_lastname'];?></td>
        </tr>
        <tr>
            <th>Insurance</th>
            <td><?php echo $row['insurance'];?></td>
        </tr>
        <tr>
            <th>Insurance Number</th>
            <td><?php echo $row['insurance_nber'];?></td>
        </tr>
        <tr>
            <th>Telephone</th>
            <td><?php echo $row['fa_telephone'];?></td>
        </tr>
        <tr>
            <th>NationalID</th>
            <td><?php echo $row['fa_nat_id'];?></td>
        </tr>
        <tr>
            <th>PassportID</th>
            <td><?php echo $row['fa_pass_id'];?></td>
        </tr>
        <tr>
            <th rowspan="7">MOTHER</th>
            <th>Firstname</th>
            <td><?php echo $row['wife_firstname'];?></td>
        </tr>
        <tr>
            <th>Lastname</th>
            <td><?php echo $row['wife_lastname'];?></td>
        </tr>
        <tr>
            <th>Insurance</th>
            <td><?php echo $row['wife_insurance'];?></td>
        </tr>
        <tr>
            <th>Insurance Number</th>
            <td><?php echo $row['wife_insurance_nber'];?></td>
        </tr>
        <tr>
            <th>Telephone</th>
            <td><?php echo $row['wife_telephone'];?></td>
        </tr>
        <tr>
            <th>NationalID</th>
            <td><?php echo $row['wife_nat_id'];?></td>
        </tr>
        <tr>
            <th>PassportID</th>
        </tr>
            <td><?php echo $row['wife_pass_id'];?></td>
        <tr>
            <th rowspan="6">CHILDREN</th>
            <th>Firstname</th>
            <td><?php echo $row['ch_firstname'];?></td>
        <tr>
            <th>Lastname</th>
            <td><?php echo $row['ch_lastname'];?></td>
        </tr>
        <tr>
            <th>Insurance</th>
            <td><?php echo $row['ch_insurance'];?></td>
        </tr>
        <tr>
            <th>Insurance Number</th>
            <td><?php echo $row['ch_insurance_nber'];?></td>
        </tr>
        <tr>
            <th>NationalID</th>
            <td><?php echo $row['ch_nat_id'];?></td>
        </tr>
        <tr>
            <th>PassportID</th>
            <td><?php echo $row['ch_pass_id'];?></td>
        </tr>
        <tr>
            <th rowspan="6">LOCATION</th>
            <th>Country</th>
            <td><?php echo $row['country'];?></td>
        <tr>
            <th>Province/City</th>
            <td><?php echo $row['province'];?></td>
        </tr>
        <tr>
            <th>District</th>
            <td><?php echo $row['district'];?></td>
        </tr>
        <tr>
            <th>Sector</th>
            <td><?php echo $row['sector'];?></td>
        </tr>
        <tr>
            <th>Cell</th>
            <td><?php echo $row['cell'];?></td>
        </tr>
        <tr>
            <th>Village</th>
            <td><?php echo $row['village'];?></td>
        </tr>
        <tr>
            <th rowspan="2">GRADE</th>
            <th>Place of grade</th>
            <td><?php echo $row['placeOf_grade'];?></td>
        </tr>
        <tr>
            <th>Grade number</th>
            <td><?php echo $row['grade_nber'];?></td>
        </tr>
    </table>
<?php
}}
?>
    </div>
</body>
</html>