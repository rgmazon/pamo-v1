<!-- Edit -->
<div class="modal fade" id="update_<?php echo $row['v_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h4 class="modal-title text-light mx-auto" id="myModalLabel"><span>
                        <center><b>Violation Record</b></center>
                    </span></h4>
            </div>
            <form method="POST" action="../modal/view-viol2-func.php?v_id=<?php echo $row['v_id']; ?>">
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row form-group">
                            <div class="col-4">
                                <span>Full Name:</span>
                                <input type="text" class="form-control" value="<?php echo $row['name']; ?>" disabled readonly>
                            </div>
                            <div class="col-8">
                                <span>Address:</span>
                                <input type="text" class="form-control" value="<?php echo $row['address']; ?>" disabled readonly>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-12">
                                <span>Violation:</span>
                                <input type="text" class="form-control" value="<?php echo $row['v_name']; ?>" disabled readonly>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-12">
                                <span>Penalty:</span>
                                <textarea class="form-control" disabled readonly><?php echo $row['penalty']; ?></textarea>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-4">
                                <?php
                                //change date format
                                $orgDate = $row['date'];
                                $newDate = date("m-d-Y", strtotime($orgDate));
                                ?>
                                <span>Date Committed:</span>
                                <input type="text" class="form-control" value="<?php echo $newDate; ?>" disabled readonly>
                            </div>
                            <div class="col-4">
                                <span>Status:</span>
                                <input type="text" class="form-control" value="<?php echo $row['viol_status']; ?>" disabled readonly>
                            </div>
                            <div class="col-4">
                                <?php
                                //change date format
                                $orgDate = $row['payment_date'];
                                $pmdate = date("m-d-Y", strtotime($orgDate));
                                ?>
                                <span>Payment Date:</span>
                                <input type="text" class="form-control" placeholder="mm/dd/yyyy" value="<?php echo $pmdate; ?>" disabled readonly>
                            </div>
                        </div>
                        <hr>

                        <!-- PAYMENT SECTION -->
                        <!-- Used If Else Statement to check whether the violation is paid or not, then display the corresponding
							block of codes depending on the value of violation_status-->
                        <div class="row form-group">
                            <?php
                            $viol_status = $row['viol_status'];
                            if ($viol_status == 'Settled') {
                                echo '<h4>Violation Already Settled</h4>';
                            } else {
                                echo '<h4>Payment Section</h4>
									<div class="col-6">
										<span>Recieved From:</span>
										<input type="text" class="form-control" name="recieved_from" placeholder="Enter Full Name" require>
									</div>
									</div>
									<div class="row form-group">
										<div class="col-6">
											<span>Receipt No.:</span>
											<input type="text" class="form-control" name="receipt_num" placeholder="Enter Receipt Number">
										</div>
										<div class="col-6">
											<span>Date:</span>
											<input type="date" class="form-control" name="payment_date" placeholder="" require>
										</div>
									</div>';
                            }
                            ?>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <?php
                        if ($viol_status == 'Settled') {
                            echo
                            '<div class="mb-3">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						</div>';
                        } else {
                            echo
                            '<div class="mb-3">
							<button type="submit" name="edit" class="btn btn-success"><span></span>Save Changes</a>
						</div>
						<div class="mb-3">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						</div>';
                        } ?>
                    </div>
            </form>


        </div>
    </div>
</div>