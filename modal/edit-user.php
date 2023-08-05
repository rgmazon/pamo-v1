<!-- Edit -->
<div class="modal fade" id="edit_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header bg-success">
				<h3 class="modal-title text-light mx-auto d-block" id="myModalLabel">Edit Member</h3>
			</div>
			<div class="modal-body">
				<div class="container-fluid">
					<!-- Main Form Starts Here -->
					<form method="POST" action="../modal/edit-user-func.php?id=<?php echo $row['id']; ?>" enctype="multipart/form-data">
						<div class="row">
							<div class="col-sm-4 col-md-4">
								<span>Last Name:</span>
								<input type="text" class="form-control" name="lname" value="<?php echo $row['lname']; ?>">
							</div>
							<div class="col-sm-4 col-md-4">
								<span>First Name:</span>
								<input type="text" class="form-control" name="fname" value="<?php echo $row['fname']; ?>">
							</div>
							<div class="col-sm-4 col-md-4">
								<span>Middle Name:</span>
								<input type="text" class="form-control" name="mname" value="<?php echo $row['mname']; ?>">
							</div>
						</div><br>
						<div class="row">
							<div class="col-sm-4 col-md-4">
								<span>Birthdate:</span>
								<input type="date" class="form-control" name="dob" value="<?php echo $row['dob']; ?>" data-bs-date-format="mm/dd/yyyy">
							</div>
							<div class="col-sm-4 col-md-4">
								<span>Age:</span>
								<input type="text" class="form-control" name="age" value="<?php echo $row['age']; ?>">
							</div>
							<div class="col-sm-12 col-md-4">
								<span>Gender</span>
								<select class="form-select" required name="gender">
									<option><?php echo $row['gender']; ?></option>
									<option value="Male">Male</option>
									<option value="Female">Female</option>
									<option value="Prefer not to Say">Prefer not to Say</option>
								</select>
							</div>
						</div><br>
						<div class="row">
							<div class="col-sm-12 col-md-4">
								<span>Municipality</span>
								<select class="form-select" required placeholder="Municipality" id="municipality" name="municipality">
									<option><?php echo $row['municipality']; ?></option>
									<option value="Naujan">Naujan</option>
									<option value="Victoria">Victoria</option>
									<option value="Socorro">Socorro</option>
									<option value="Pola">Pola</option>
								</select>
							</div>
							<div class="col-sm-4 col-md-4">
								<span>Barangay:</span>
								<input type="text" class="form-control" name="barangay" value="<?php echo $row['barangay']; ?>">
							</div>
							<div class="col-sm-4 col-md-4">
								<span>Sitio:</span>
								<input type="text" class="form-control" name="sitio" value="<?php echo $row['sitio']; ?>">
							</div>
						</div><br>
						<div class="row">
							<div class="col-sm-3 col-md-3">
								<span>Civil Status</span>
								<select class="form-select" required placeholder="Status" name="status">
									<option><?php echo $row['status']; ?></option>
									<option value="Single">Single</option>
									<option value="Married">Married</option>
									<option value="Widowed">Widowed</option>
									<option value="Separated">Separated</option>
								</select>
							</div>
							<div class="col-sm-3 col-md-3">
								<span>Religion:</span>
								<input type="text" class="form-control" name="religion" value="<?php echo $row['religion']; ?>">
							</div>
							<div class="col-sm-3 col-md-3">
								<span>Citizenship:</span>
								<input type="text" class="form-control" name="citizenship" value="<?php echo $row['citizenship']; ?>">
							</div>
							<div class="col-sm-3 col-md-3">
								<span>Contact No.:</span>
								<input type="number" class="form-control" name="contact_num" value="<?php echo $row['contact_num']; ?>">
							</div>
						</div><br>
						<div class="row">
							<div class="col-sm-3 col-md-3">
								<span>Username:</span>
								<input type="text" class="form-control" name="username" value="<?php echo $row['username']; ?>">
							</div>
							<div class="col-sm-3 col-md-3">
								<span>Email:</span>
								<input type="email" class="form-control" name="email" value="<?php echo $row['email']; ?>">
							</div>
							<div class="col-sm-3 col-md-3">
								<span>Password:</span>
								<input type="password" class="form-control" name="password" value="<?php echo $row['password']; ?>">
							</div>
							<div class="col-sm-3 col-md-3">
								<span>Confirm Password:</span>
								<input type="password" class="form-control" required placeholder="Confirm Password" name="cpassword" value="<?php echo $row['password']; ?>">
							</div>
						</div><br>
						<div class="row">
							<div class="col-sm-12 col-md-4">
								<span>Account Status</span>
								<select class="form-select" required id="account_status" placeholder="<?php echo $row['account_status']; ?>" name="account_status">
									<option><?php echo $row['account_status']; ?></option>
									<option value="Active">Active</option>
									<option value="Inactive">Inactive</option>
								</select>
							</div>
						</div><br>
						<!-- Main Form Ends Here -->
						<div class="modal-footer">
							<div class="mb-3">
								<button type="submit" name="edit" class="btn btn-success"><span></span> Update</a>
							</div>
							<div class="mb-3">
								<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
							</div>
					</form>
				</div>

			</div>
		</div>
	</div>