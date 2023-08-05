<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <span>
                    <center>
                        <h3 class="text-light"><b>Contact Us</b></h3>
                    </center>
                </span>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="contact-func.php">
                    <div class="wrapper">
                        <div class="mb-3">
                            <span>Name:</span>
                            <input type="text" class="form-control" name="name" placeholder="Enter Full Name" required>
                        </div>
                        <div class="mb-3">
                            <span>Email:</span>
                            <input type="email" class="form-control" name="email" placeholder="Enter Email Address" id="">
                        </div>
                        <div class="mb-3">
                            <span>Message:</span>
                            <textarea class="form-control" placeholder="Leave a message here" name="message" required></textarea>
                        </div>
                        <div class="mb-12">
                            <button type="submit" name="submit" class="btn btn-primary">Send</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>