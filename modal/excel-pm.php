<?php
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=NLNP-PAMO_userslist.xls");
header("Pragma: no-cache");
header("Expires: 0");

require_once '../inc/conf.php';

$output = "";

$output .= "
		<table>
			<thead>
				<tr>
					<th>Permit ID</th>
					<th>Permit No.</th>
					<th>Permit Status</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Birthdate</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Status</th>
                    <th>Contact No.</th>
                    <th>Religion</th>
                    <th>Citizenship</th>
                    <th>Contact Person</th>
                    <th>Contact Person No.</th>
                    <th>Relationship</th>
					<th>Reg. Type</th>
					<th>Vessel Type</th>
					<th>Vessel Use</th>
					<th>Vessel Material</th>
					<th>Fishing Gear/s</th>
					<th>Vessel Length</th>
					<th>Vessel Breadth</th>
					<th>Gross Tonnage</th>
					<th>Net Tonnage</th>
					<th>Horsepower</th>
					<th>Speed</th>
					<th>Engine Make</th>
					<th>Serial No.</th>
					<th>Current Reg. Date</th>
					<th>Current Reg. Expiration</th>
					<th>Approved date</th>
				</tr>
			<tbody>
	";

$query = $db->query("SELECT * FROM `permit`") or die(mysqli_errno());
while ($fetch = $query->fetch_array()) {

	$output .= "
				<tr>
					<td>" . $fetch['permit_id'] . "</td>
					<td>" . $fetch['permit_num'] . "</td>
					<td>" . $fetch['permit_status'] . "</td>
					<td>" . $fetch['lname'] . ', ' . $fetch['fname'] . ' ' . $fetch['mname'] . "</td>
					<td>" . 'Sitio' . ' ' . $fetch['sitio'] . ', Barangay ' . $fetch['barangay'] . ', ' . $fetch['municipality'] . "</td>
                    <td>" . $fetch['dob'] . "</td>
					<td>" . $fetch['age'] . "</td>
					<td>" . $fetch['sex'] . "</td>
					<td>" . $fetch['status'] . "</td>
					<td>" . $fetch['contact_num'] . "</td>
                    <td>" . $fetch['religion'] . "</td>
					<td>" . $fetch['contact_person'] . "</td>
					<td>" . $fetch['contact_person_num'] . "</td>
					<td>" . $fetch['relationship'] . "</td>
                    <td>" . $fetch['reg_type'] . "</td>
					<td>" . $fetch['vessel_type'] . "</td>
					<td>" . $fetch['vessel_use'] . "</td>
					<td>" . $fetch['vessel_material'] . "</td>
					<td>" . $fetch['fishing_gear_used'] . "</td>
                    <td>" . $fetch['vessel_length'] . "</td>
					<td>" . $fetch['vessel_breadth'] . "</td>
					<td>" . $fetch['gross_tonnage'] . "</td>
					<td>" . $fetch['net_tonnage'] . "</td>
					<td>" . $fetch['horsepower'] . "</td>
                    <td>" . $fetch['speed'] . "</td>
					<td>" . $fetch['engine_make'] . "</td>
					<td>" . $fetch['serial_num'] . "</td>
					<td>" . $fetch['curregdate'] . "</td>
					<td>" . $fetch['curregexp'] . "</td>
                    <td>" . $fetch['approved_date'] . "</td>
				</tr>
	";
}

$output .= "
			</tbody>
			
		</table>
	";

echo $output;
