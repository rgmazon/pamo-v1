<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h3 class="modal-title text-light mx-auto">Non-Member Violation Record</h3>
            </div>
            <div class="modal-body">
                <form method="POST" action="../modal/addnm-viol-func.php" enctype="multipart/form-data">
                    <div class="modal-body-edit mx-auto">
                        <div class="row">
                            <div class="mb-6 form-group">
                                <span><b>Name:</b></span>
                                <input type="text" class="form-control" placeholder="Enter Full Name" name="name" required>
                            </div>
                            <div class="mb-6 form-group">
                                <span><b>Address:</b></span>
                                <input type="text" class="form-control" placeholder="Enter Full Address" name="address" required>
                            </div>
                            <div class="mb-6 form-group">
                                <span><b>Date Committed:</b></span>
                                <input type="date" class="form-control" name="date" required>
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


                                <div class="mb-6 form-group">
                                    <span><b>Details:</b></span>
                                    <textarea class="form-control" name="details" cols="30" rows="2" placeholder="Enter Details Here"></textarea>
                                    <input type="text" class="form-control" value="<?php echo $record['penalty']; ?>" name="penalty" hidden>
                                </div>
                            </div>

                        </div>
                    </div><br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="saveviolnm" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>