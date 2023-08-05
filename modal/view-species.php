<!-- First Modal Add New -->
<div class="modal fade" id="viewspecies_<?php echo $row['sp_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content"><br>
            <div>
                <h4 class="modal-title text-success mx-auto d-block" id="myModalLabel">
                    <center><b>View <?= $row['category'] ?> Information</b></center>
                </h4>
            </div>
            <form method="POST" action="../modal/bms-edit-func.php?sp_id=<?php echo $row['sp_id']; ?>" enctype="multipart/form-data">
                <div class="modal-body-edit mx-auto d-block">
                    <div>
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
                    <div>
                        <div class="info">
                            <div class="row">
                                <div class="col-md-4">
                                    <span>Common Name:</span>
                                    <input type="text" class="form-control" value="<?= $row['eng_name'] ?>" name="eng_name" disabled>
                                </div>
                                <div class="col-md-4">
                                    <span>Category:</span>
                                    <input type="text" class="form-control" value="<?= $row['category'] ?>" name="category" disabled>
                                </div>
                                <div class="col-md-4">
                                    <span>SEARCA 1997:</span>
                                    <input type="text" class="form-control" value="<?= $row['searca_1997'] ?>" name="searca_1997" disabled>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <span>Local Name:</span>
                                    <input type="text" class="form-control" value="<?= $row['local_name'] ?>" name="local_name" disabled>
                                </div>
                                <div class="col-md-4">
                                    <span>Residency Status:</span>
                                    <input type="text" class="form-control" value="<?= $row['residency_status'] ?>" name="residency_status" disabled>
                                </div>
                                <div class="col-md-4">
                                    <span>Villamor 2006:</span>
                                    <input type="text" class="form-control" value="<?= $row['villamor_2006'] ?>" name="villamor_2006" disabled>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <span>Scientific Name:</span>
                                    <input type="text" class="form-control fst-italic" value="<?= $row['sc_name'] ?>" name="sc_name" disabled>
                                </div>
                                <div class="col-md-4">
                                    <span>Conservation Status:</span>
                                    <input type="text" class="form-control" value="<?= $row['conservation_status'] ?>" name="conservation_status" disabled>
                                </div>
                                <div class="col-md-4">
                                    <span>MBCFI 2011:</span>
                                    <input type="text" class="form-control" value="<?= $row['mbcfi_2011'] ?>" name="mbcfi_2011" disabled>
                                </div>
                            </div>
                        </div>

                    </div>
                </div><br>
                <div class="row">
                    <div class="col-sm-12 col-md-12 btn-div">
                        <span>
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Go Back</button>
                        </span>
                    </div>

                </div>
            </form>

        </div>
    </div>
</div>