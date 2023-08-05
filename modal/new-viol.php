<!-- First Modal Add New -->
<div class="modal fade" id="viol_<?php echo $row['permit_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h3 class="modal-title text-light mx-auto d-block" id="myModalLabel">Add Violation Record</h3>
            </div>
            <form method="POST" action="../modal/new-viol-func.php" enctype="multipart/form-data">
                <div class="modal-body-edit mx-auto">
                    <div class="container-fluid">
                        <br>
                        <div class="row">
                            <div class="col-sm-12 col-md-4 form-group">
                                <span>Permit No.:</span>
                                <input type="text" class="form-control" name="permit_num" value="<?= $row['permit_num'] ?>" disabled>
                                <input type="text" class="form-control" value="<?= $row['permit_id'] ?>" name="permit_id" disabled>
                            </div>
                            <div class="col-sm-12 col-md-8 form-group">
                                <span>Full Name:</span>
                                <input type="text" class="form-control" value="<?= $row['lname'] . ',' . ' ' . $row['fname'] . ' ' . $row['mname'] ?>" disabled>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-12 form-group">
                                <span>Address:</span>
                                <input type="text" class="form-control" value="<?= 'Sitio' . ' ' . $row['sitio'] . ',' . ' ' . $row['barangay'] . ',' . ' ' . $row['municipality'] ?>" disabled>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-12 form-group">
                                <span>Date Committed:</span>
                                <input type="date" class="form-control" name="date" placeholder="Enter Date">
                            </div>
                        </div>
                        <!-- Populate Dropdown with Violation Category Data from database -->
                        <?php
                        $query = "SELECT * FROM violation_category";
                        $stmt = $conn->prepare($query);
                        $stmt->execute();
                        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        ?>

                        <div class="row">
                            <div class="col-sm-12 col-md-12 form-group">
                                <span>Violation:</span>
                                <select class="form-select" required placeholder="Select One" name="vcat_id">
                                    <option value="">Select One</option>
                                    <?php foreach ($records as $record) : ?>
                                        <option value="<?php echo $record['vcat_id']; ?>"><?php echo $record['v_name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-12 form-group">
                                <span>Violation Details:</span>
                                <textarea name="details" class="form-control" cols="15" rows="7" placeholder="Enter Details here..."></textarea>
                            </div>
                        </div>
                    </div>
                </div><br>
                <div class="modal-footer">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 btn-div mx-auto">
                            <span>
                                <button type="submit" name="addviol" class="btn btn-primary">Submit</button>
                            </span>
                            <span>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            </span>
                        </div>

                    </div>
                </div>
            </form>

        </div>
    </div>
</div>