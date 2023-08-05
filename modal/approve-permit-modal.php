<!-- View -->
<div class="modal fade" id="approve_<?php echo $row['permit_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header bg-success">
                <h3 class="text-light mx-auto"><b>Approve Permit Application</b></h3>
            </div>
            <form method="POST" action="../modal/approve-permit-func.php?permit_id=<?php echo $row['permit_id']; ?>">
                <!-- Modal Body 2 -->
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="container">
                            <div class="row">
                                <div class="col-6">
                                    <?php
                                    include_once '../inc/config.php';
                                    $data = $conn->prepare("SELECT * FROM permit ORDER BY permit_num3 DESC LIMIT 1");
                                    $data->execute();
                                    $data = $data->fetch(PDO::FETCH_ASSOC);
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="container">
                            <div class="row">
                                <div class="mb-12">
                                    <div class="col-10">
                                        <label><b>Application Status:</b></label>
                                        <select class="form-select" value="<?php echo $row['permit_status']; ?>" name="permit_status">
                                            <option value="<?php echo $row['permit_status']; ?>"><?php echo $row['permit_status']; ?></option>
                                            <option value="Pending">Pending</option>
                                            <option value="Approved">Approved</option>
                                        </select>
                                    </div>
                                    <div class="col-10">
                                        <label><b>Set Permit Number:</b></label>
                                        <?php
                                        if ($row['municipality'] == "Naujan") { ?>
                                            <input type="text" class="form-control" name="permit_num1" value="N" name="permit_num1">
                                        <?php } elseif ($row['municipality'] == "Victoria") { ?>
                                            <input type="text" class="form-control" name="permit_num1" value="V" name="permit_num1">
                                        <?php } elseif ($row['municipality'] == "Socorro") { ?>
                                            <input type="text" class="form-control" name="permit_num1" value="S" name="permit_num1">
                                        <?php } else { ?>
                                            <input type="text" class="form-control" name="permit_num1" value="P" name="permit_num1">
                                        <?php }
                                        ?>
                                        <input type="text" class="form-control" name="permit_num2" id="yearTextbox" value="<?php echo date('Y'); ?>">
                                        <input type="text" required class="form-control" value="<?php echo $row['permit_num3']; ?>" name="permit_num3">
                                        <label><b>Issued At:</b></label>
                                        <input type="text" required class="form-control" placeholder="Permit Issued At:" value="<?php echo $row['curregissuance']; ?>" name="curregissuance">
                                        <label><b>Coast Guard Reg. No.:</b></label>
                                        <input type="text" required class="form-control" placeholder="Coast Guard Reg. No.:" value="<?php echo $row['coastguardregnum']; ?>" name="coastguardregnum">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><br>
                    <!-- Modal Footer -->
                    <div class="modal-footer row">
                        <div class="col-12">
                            <br>
                            <center><span>
                                    <button type="submit" name="approve" class="btn btn-primary" data-bs-success="modal">Save</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                </span></center>
                        </div>
                    </div>
            </form>
        </div>

    </div>
</div>
</div>