<!-- First Modal Add New -->
<div class="modal fade" id="bmsedit_<?php echo $row['sp_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content"><br>
            <form method="POST" action="../modal/bms-edit-func.php?sp_id=<?php echo $row['sp_id']; ?>" enctype="multipart/form-data">
                <div class="modal-body-edit mx-auto d-block">
                    <div>
                        <h3 class="text-success" id="myModalLabel">
                            <center><b>Edit <?= $row['category'] ?> Information</b></center>
                        </h3><br>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <center><img src="../image/species/<?= $row['image'] ?>" class="bird-box" alt="<?= $row['image'] ?>"></center>
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
                    <div class="info">
                        <div class="row">
                            <div class="col-md-3">
                                <span>Common Name:</span>
                                <input type="text" class="form-control" value="<?= $row['eng_name'] ?>" name="eng_name">
                            </div>
                            <div class="col-md-3">
                                <span>Category:</span>
                                <input type="text" class="form-control" value="<?= $row['category'] ?>" name="category">
                            </div>
                            <div class="col-md-3">
                                <span>SEARCA 1997:</span>
                                <input type="text" class="form-control" value="<?= $row['searca_1997'] ?>" name="searca_1997">
                            </div>
                            <div class="col-md-3">
                                <span>Photo Credit:</span>
                                <input type="text" class="form-control" value="<?= $row['photo_credit'] ?>" name="photo_credit">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <span>Local Name:</span>
                                <input type="text" class="form-control" value="<?= $row['local_name'] ?>" name="local_name">
                            </div>
                            <div class="col-md-3">
                                <span>Residency Status:</span>
                                <input type="text" class="form-control" value="<?= $row['residency_status'] ?>" name="residency_status">
                            </div>
                            <div class="col-md-3">
                                <span>Villamor 2006:</span>
                                <input type="text" class="form-control" value="<?= $row['villamor_2006'] ?>" name="villamor_2006">
                            </div>
                            <div class="col-md-3">
                                <span>Species Image:</span>
                                <input type="hidden" name="old_image" value="<?= $row['image']; ?>">
                                <input type="file" class="form-control" name="image" accept="image/jpg, image/jpeg, image/png">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <span>Scientific Name:</span>
                                <input type="text" class="form-control" value="<?= $row['sc_name'] ?>" name="sc_name">
                            </div>
                            <div class="col-md-3">
                                <span>Conservation Status:</span>
                                <input type="text" class="form-control" value="<?= $row['conservation_status'] ?>" name="conservation_status">
                            </div>
                            <div class="col-md-3">
                                <span>MBCFI 2011:</span>
                                <input type="text" class="form-control" value="<?= $row['mbcfi_2011'] ?>" name="mbcfi_2011">
                            </div>
                        </div>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-sm-12 col-md-12 btn-div">
                        <span>
                            <button type="submit" name="bmsedit" class="btn btn-primary">Save Changes</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>
                        </span>
                    </div>

                </div>
            </form>

        </div>
    </div>
</div>