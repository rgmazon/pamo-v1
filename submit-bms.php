<!-- First Modal Add New -->
<div class="modal fade" id="bmsedit_<?php echo $row['sp_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content"><br>
            <form method="POST" action="submit-bms-func.php">
                <div class="modal-body-edit mx-auto d-block">
                    <div>
                        <h3 class="text-success" id="myModalLabel">
                            <center><b><?= $row['eng_name'] ?></b></center>
                        </h3>
                        <p>
                            <center><i><?= $row['sc_name'] ?></i></center>
                        </p>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <center><img src="image/species/<?= $row['image'] ?>" class="bird-box" alt="<?= $row['image'] ?>"></center>
                        </div>
                        <div class="col-sm-12">
                            <span>
                                <center>
                                    <p class="text-muted"><i>Photo Owner: <?= $row['photo_credit'] ?></i></p>
                                </center>
                            </span>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-3 col-md-3">
                            <span>Date Spotted:</span>
                            <input type="date" class="form-control" name="date">
                        </div>
                        <div class="col-sm-3 col-md-3">
                            <span>Name of Respondent:</span>
                            <input type="text" class="form-control" name="respondent" placeholder="Enter Full Name">
                        </div>
                        <div class="col-sm-3 col-md-3">
                            <span>Estimated Qty.:</span>
                            <input type="number" class="form-control" name="qty" placeholder="Enter Estimated Qty.">
                        </div>
                        <div class="col-sm-3 col-md-3">
                            <span>Place Spotted:</span>
                            <input type="text" class="form-control" name="place" placeholder="Enter Area">
                        </div>
                        <div class="col-sm-3 col-md-3">
                            <span>Note:</span>
                            <input type="text" class="form-control" name="note" placeholder="">
                        </div>
                        <div class="col-sm-3 col-md-3">
                            <input type="text" class="form-control" name="sp_id" value="<?php echo $row['sp_id']; ?>" hidden>
                        </div>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-sm-12 col-md-12 btn-div">
                        <span>
                            <button type="submit" name="respond" class="btn btn-primary">Submit</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        </span>
                    </div>

                </div>
            </form>

        </div>
    </div>
</div>