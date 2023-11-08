<?php

// $name= "SELECT father.firstname, father.lastname, father.insurance, father.insurance_nber, father.telephone, father.national_id, father.passport_id, mother.firstname, mother.lastname, mother.insurance, mother.insurance_nber, mother.telephone, mother.national_id, mother.passport_id, child.firstname, child.lastname, child.insurance, child.insurance_nber, child.national_id, child.passport_id, location.country, location.province, location.district, location.sector, location.cell, location.village, father.placeOf_grade, grade_nber";

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

?>
table1= famownerinfo AS father
table2= fam_wife AS mother
table3= fam_childs AS child
table4= fam_location AS location