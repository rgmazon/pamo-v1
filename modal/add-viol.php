<!-- Modal -->
<?php include '../inc/config.php'; ?>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title text-light mx-auto">Add New Violation Record</h5>
            </div>
            <div class="modal-body">
                <form method="POST" action="../modal/add-viol-func.php">
                    <!-- Populate Dropdown with Permit Number Data from database -->
                    <?php
                    $query = "SELECT * FROM permit where permit_status = 'Approved'";
                    $stmt = $conn->prepare($query);
                    $stmt->execute();
                    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    ?>
                    <div class="row">
                        <div class="mb-6 form-group">
                            <span><b>Fisherfolk/ Permit Number:</b></span>
                            <select class="form-control" required placeholder="Select One" name="permit_id">
                                <option>Select One</option>
                                <?php foreach ($records as $record) : ?>
                                    <option value="<?php echo $record['permit_id']; ?>">
                                        <?php echo $record['fname'] . ' ' . $record['lname']; ?><br>
                                        | <?php echo $record['permit_num']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
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
                        <div class="mb-6 form-group">
                            <span><b>Violation:</b></span>
                            <select class="form-select" required placeholder="Select One" name="vcat_id">
                                <option value="">Select One</option>
                                <?php foreach ($records as $record) : ?>
                                    <option value="<?php echo $record['vcat_id'] . $record['penalty']; ?>"><?php echo $record['v_name'] . ' ' . '|' . ' ' . $record['penalty']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="row">
                            <div class="mb-6 form-group">
                                <span><b>Date Committed:</b></span>
                                <input type="date" class="form-control" name="date" required>
                            </div>
                        </div>

                        <div class="mb-6 form-group">
                            <span><b>Details:</b></span>
                            <textarea class="form-control" name="details" cols="30" rows="2" placeholder="Enter Details Here"></textarea>
                            <input type="text" class="form-control" value="<?php echo $record['penalty']; ?>" name="penalty" hidden>
                        </div>
                    </div>




            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="saveviolation">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>