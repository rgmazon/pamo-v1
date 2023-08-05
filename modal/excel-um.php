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
					<th>User ID</th>
					<th>Account Status</th>
					<th>Name</th>
                    <th>Birthdate</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Address</th>
                    <th>Status</th>
                    <th>Religion</th>
                    <th>Citizenship</th>
                    <th>Contact No.</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Date Added</th>
				</tr>
			<tbody>
	";

$query = $db->query("SELECT * FROM `users`") or die(mysqli_errno());
while ($fetch = $query->fetch_array()) {

	$output .= "
				<tr>
					<td>" . $fetch['id'] . "</td>
					<td>" . $fetch['account_status'] . "</td>
					<td>" . $fetch['lname'] . ', ' . $fetch['fname'] . ' ' . $fetch['mname'] . "</td>
                    <td>" . $fetch['dob'] . "</td>
					<td>" . $fetch['age'] . "</td>
					<td>" . $fetch['gender'] . "</td>
					<td>" . 'Sitio' . ' ' . $fetch['sitio'] . ', Barangay ' . $fetch['barangay'] . ', ' . $fetch['municipality'] . "</td>
					<td>" . $fetch['status'] . "</td>
                    <td>" . $fetch['religion'] . "</td>
					<td>" . $fetch['citizenship'] . "</td>
					<td>" . $fetch['contact_num'] . "</td>
					<td>" . $fetch['email'] . "</td>
					<td>" . $fetch['username'] . "</td>
                    <td>" . $fetch['password'] . "</td>
					<td>" . $fetch['date_added'] . "</td>
				</tr>
	";
}

$output .= "
			</tbody>
			
		</table>
	";

echo $output;
