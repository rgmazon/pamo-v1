<?php
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=NLNP-PAMO_non-member-violationlist.xls");
header("Pragma: no-cache");
header("Expires: 0");

require_once '../inc/conf.php';

$output = "";

$output .= "
		<table>
			<thead>
				<tr>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Date Committed</th>
                    <th>Status</th>
                    <th>Payment Date</th>
                    <th>Recieved From</th>
					<th>Receipt No.</th>
					<th>Details</th>
				</tr>
			<tbody>
	";

$query = $db->query("SELECT *
FROM violations2
JOIN violation_category 
ON violations2.vcat_id = violation_category.vcat_id;") or die(mysqli_errno());
while ($fetch = $query->fetch_array()) {

	$output .= "
				<tr>
					<td>" . $fetch['name'] . "</td>
					<td>" . $fetch['address'] . "</td>
                    <td>" . $fetch['date'] . "</td>
					<td>" . $fetch['viol_status'] . "</td>
					<td>" . $fetch['payment_date'] . "</td>
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
