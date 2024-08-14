<!-- form modal -->
<div class="modal fade" id="userModal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Adding and Updating Users</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <!-- enctype properties helps to uploads the image file indatabase otherwise without this properties
                    we wouldn't be able to upload the image  -->
                    <form id="addform" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <!-- User name form -->
                            <div class="form-group mb-3">
                                <label>Name</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-dark"><i class="fa-solid fa-user text-light py-1"></i></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Enter your username" autocomplete="off" required="required" id="username" name="username">
                                </div>
                            </div>
                            <!-- email -->
                            <div class="form-group mb-3">
                                <label>Email</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-dark"><i class="fa-solid fa-envelope text-light py-1"></i></i></span>
                                    </div>
                                    <input type="email" class="form-control" placeholder="Enter your Email" autocomplete="off" required="required" id="email" name="email">
                                </div>
                            </div>
                            <!-- phone number -->
                            <div class="form-group mb-3">
                                <label>Phone Number</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-dark"><i class="fa-solid fa-phone text-light py-1"></i></i></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Enter your number" autocomplete="off" required="required" id="phone" name="phone" maxLength="10" minLength="10">
                                </div>
                            </div>
                            <!-- photo -->
                             <!-- For image part bootstrap provide a inbuilt class="custom-file-input" for uploading photo and class="custom-file-label" to show the label . 
                              we have to write type=file and id and laber for variable should match for example label for="userphoto" and id = "userphoto". Name should be added -->
                            <div class="form-group mb-3">
                                <label for="userphoto" class="form-label">Photo</label>
                                <div class="input-group">
                                    <label class="input-group-text bg-dark" for="userphoto"><i class="fa-solid fa-upload text-light"></i></label>
                                    <input type="file" class="form-control" name="photo" id="userphoto">
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-dark">Submit</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>