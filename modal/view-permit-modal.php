<!-- View -->
<div class="modal fade" id="view_<?php echo $row['permit_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header bg-dark">

            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <div class="container-fluid">

                    <form method="POST" action="id=<?php echo $row['permit_id']; ?>">
                        <div class="container">

                            <div class="personal-data">
                                <h4><b>Personal Information</b></h4>
                                <div class="row">
                                    <div class="col">
                                        <label>Last Name:</label>
                                        <input type="text" class="form-control" placeholder="Last Name:" value="<?php echo $row['lname']; ?>" name="lname">
                                    </div>
                                    <div class="col">
                                        <label>First Name:</label>
                                        <input type="text" class="form-control" placeholder="First Name:" value="<?php echo $row['fname']; ?>" name="fname">
                                    </div>
                                    <div class="col">
                                        <label>Middle Name:</label>
                                        <input type="text" class="form-control" placeholder="Middle Name:" value="<?php echo $row['mname']; ?>" name="mname">
                                    </div>
                                    <div class="col">
                                        <label>Age:</label>
                                        <input type="text" class="form-control" placeholder="Age:" value="<?php echo $row['age']; ?>" name="age">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <label>Sitio:</label>
                                        <input type="text" class="form-control" placeholder="Sitio:" value="<?php echo $row['sitio']; ?>" name="sitio">
                                    </div>
                                    <div class="col">
                                        <label>Barangay:</label>
                                        <input type="text" class="form-control" placeholder="Barangay:" value="<?php echo $row['barangay']; ?>" name="barangay">
                                    </div>
                                    <div class="col">
                                        <label>Municipality:</label>
                                        <select class="form-select" placeholder="Municipality:" value="<?php echo $row['municipality']; ?>" name="municipality">
                                            <option value="Naujan">Naujan</option>
                                            <option value="Victoria">Victoria</option>
                                            <option value="Socorro">Socorro</option>
                                            <option value="Pola">Pola</option>
                                        </select>
                                    </div>
                                </div><br>

                                <div class="row">
                                    <div class="col">
                                        <label>Date of Birth:</label>
                                        <input id="datepicker" width="276" class="form-control" placeholder="Date of Birth:" value="<?php echo $row['dob']; ?>" name="dob">

                                    </div>

                                    <div class="col">
                                        <label>Sex</label>
                                        <select class="form-select" value="<?php echo $row['sex']; ?>" name="sex">
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Others">Others</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label>Status</label>
                                        <select class="form-select" value="<?php echo $row['status']; ?>" name="status">
                                            <option value="Single">Single</option>
                                            <option value="Married">Married</option>
                                            <option value="Widowed">Widowed</option>
                                            <option value="Separated">Separated</option>
                                        </select>
                                    </div>
                                </div><br>

                                <div class="row">
                                    <div class="col">
                                        <label>Contact No.</label>
                                        <input type="text" class="form-control" value="<?php echo $row['contactnum']; ?>" name="contactnum">
                                    </div>
                                    <div class="col">
                                        <label>Religion</label>
                                        <input type="text" class="form-control" value="<?php echo $row['religion']; ?>" name="religion">
                                    </div>
                                    <div class="col">
                                        <span>Citizenship</span>
                                        <input type="text" class="form-control" value="<?php echo $row['citizenship']; ?>" name="citizenship">
                                    </div>
                                </div><br>

                                <div class="row">
                                    <div class="col">
                                        <label>Contact Person in Case of Emergency</label>
                                        <input type="text" class="form-control" value="<?php echo $row['contact_person']; ?>" name="contact_person">
                                    </div>
                                    <div class="col">
                                        <label>Relationship</label>
                                        <input type="text" class="form-control" value="<?php echo $row['relationship']; ?>" name="relationship">
                                    </div>
                                    <div class="col">
                                        <label>Contact No.</label>
                                        <input type="text" class="form-control" value="<?php echo $row['contact_person_num']; ?>" name="contact_person_num">
                                    </div>
                                </div><br>
                            </div>

                            <div class="permit-data">
                                <h4><b>Permit Information</b></h4>
                                <div class="row">
                                    <div class="col">
                                        <label>Type of Registration</label>
                                        <select class="form-select" value="<?php echo $row['reg_type']; ?>" name="reg_type">
                                            <option value="New">New</option>
                                            <option value="Renewal">Renewal</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label>Vessel Type</label>
                                        <select class="form-select" value="<?php echo $row['vessel_type']; ?>" name="vessel_type">
                                            <option value="Motorized">Motorized</option>
                                            <option value="Non-Motorized">Non-Motorized</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label>Vessel Use</label>
                                        <select class="form-select" value="<?php echo $row['vessel_use']; ?>" name="vessel_use">
                                            <option value="Trading">Trading</option>
                                            <option value="Transport">Transport</option>
                                            <option value="Fishing">Fishing</option>
                                            <option value="Others">Others</option>
                                        </select>
                                    </div>
                                </div><br>

                                <div class="row">
                                    <div class="col">
                                        <label>Vessel Material</label>
                                        <select class="form-select" value="<?php echo $row['vessel_material']; ?>" name="vessel_material">
                                            <option value="Fiber">Fiber</option>
                                            <option value="Wood">Wood</option>
                                            <option value="Others">Others</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label>Fishing Gear/s Used</label>
                                        <input type="text" class="form-control" value="<?php echo $row['fishing_gear_used']; ?>" name="fishing_gear_used">
                                    </div>
                                </div><br>
                            </div><br>

                            <div class="vessel-dimension">
                                <h4><b>Vessel Dimension</b></h4>
                                <div class="row">
                                    <div class="col">
                                        <label>Length</label>
                                        <input type="text" class="form-control" value="<?php echo $row['vessel_length']; ?>" name="vessel_length">
                                    </div>
                                    <div class="col">
                                        <label>Breadth</label>
                                        <input type="text" class="form-control" value="<?php echo $row['vessel_breadth']; ?>" name="vessel_breadth">
                                    </div>
                                    <div class="col">
                                        <label>Gross Tonnage</label>
                                        <input type="text" class="form-control" value="<?php echo $row['gross_tonnage']; ?>" name="gross_tonnage">
                                    </div>
                                    <div class="col">
                                        <label>Net Tonnage</label>
                                        <input type="text" class="form-control" value="<?php echo $row['net_tonnage']; ?>" name="net_tonnage">
                                    </div>
                                </div><br>
                            </div>

                            <div class="engine-data">
                                <h5>Engine Data</h5>
                                <div class="row">
                                    <div class="col">
                                        <label>Horsepower</label>
                                        <input type="text" class="form-control" value="<?php echo $row['horsepower']; ?>" name="horsepower">
                                    </div>
                                    <div class="col">
                                        <label>Speed</label>
                                        <input type="text" class="form-control" value="<?php echo $row['speed']; ?>" name="speed">
                                    </div>
                                    <div class="col">
                                        <label>Engine Make</label>
                                        <input type="text" class="form-control" value="<?php echo $row['engine_make']; ?>" name="engine_make">
                                    </div>
                                    <div class="col">
                                        <label>Serial Number</label>
                                        <input type="text" class="form-control" value="<?php echo $row['serial_num']; ?>" name="serial_num">
                                    </div>
                                </div><br>
                            </div>

                            <div class="current-reg">
                                <h5><b>Current Registration</b></h5>
                                <div class="row">
                                    <div class="col">
                                        <label>Registration Date</label>
                                        <input type="text" class="form-control" value="<?php echo $row['curregdate']; ?>" name="curregdate">
                                    </div>
                                    <div class="col">
                                        <label>Expiration Date</label>
                                        <input type="text" class="form-control" value="<?php echo $row['curregexp']; ?>" name="curregexp">
                                    </div>
                                    <div class="col">
                                        <label>Place of Issuance</label>
                                        <input type="text" class="form-control" value="<?php echo $row['curregissuance']; ?>" name="curregissuance">
                                    </div>
                                    <div class="col">
                                        <label>Coastguard Reg. No.</label>
                                        <input type="text" class="form-control" value="<?php echo $row['coastguardregnum']; ?>" name="coastguardregnum">
                                    </div>
                                </div><br><br>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <div class="mb-3">
                                <a href="javascript:window.print()"><button type="button" class="btn btn-dark">Print</button></a>
                            </div>
                            <div class="mb-3">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            </div>
                    </form>
                </div>

            </div>
        </div>
    </div>