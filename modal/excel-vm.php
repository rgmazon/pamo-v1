<?php
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=NLNP-PAMO_violationlist.xls");
header("Pragma: no-cache");
header("Expires: 0");

require_once '../inc/conf.php';

$output = "";

$output .= "
		<table>
			<thead>
				<tr>
					<th>Permit No.</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Date Committed</th>
                    <th>Status</th>
                    <th>Payment Date</th>
                    <th>Payment Amt.</th>
                    <th>Recieved From</th>
					<th>Receipt No.</th>
					<th>Details</th>
				</tr>
			<tbody>
	";

$query = $db->query("select * FROM permit 
JOIN violations 
ON permit.permit_id = violations.permit_id 
JOIN violation_category 
ON violations.vcat_id = violation_category.vcat_id;") or die(mysqli_errno());
while ($fetch = $query->fetch_array()) {

	$output .= "
				<tr>
					<td>" . $fetch['permit_num'] . "</td>
					<td>" . $fetch['lname'] . ', ' . $fetch['fname'] . ' ' . $fetch['mname'] . "</td>
					<td>" . 'Sitio' . ' ' . $fetch['sitio'] . ', Barangay ' . $fetch['barangay'] . ', ' . $fetch['municipality'] . "</td>
                    <td>" . $fetch['date'] . "</td>
					<td>" . $fetch['viol_status'] . "</td>
					<td>" . $fetch['payment_date'] . "</td>
					<td>" . $fetch['payment_amt'] . "</td>
					<td>" . $fetch['recieved_from'] . "</td>
					<td>" . $fetch['receipt_num'] . "</td>
					<td>" . $fetch['details'] . "</td>
				</tr>
	";
}

$output .= "
			</tbody>
			
		</table>
	";

echo $output;
