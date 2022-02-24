<?php require_once "template/header.php"; ?>
<?php require_once "template/side_header.php"; ?>
<div class="home_content">
    <div class="text"><i class='bx bx-user-plus me-2'></i>Create Contact</div>
</div>
<div class="container">
    <div class="row my-3 justify-content-center align-items-center vh-100">
        <div class="col-12 col-lg-9">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-12 col-lg-7">
                            <div class="">
                                <img src="<?php echo $url; ?>/assets/img/login.svg" class="img-fluid" alt="">
                            </div>
                        </div>
                        <div class="col-12 col-lg-5">
                            <?php

                                if (isset($_POST['save'])){
                                    contactAdd();
                                }

                            ?>
                            <form class="my-3" method="post" enctype="multipart/form-data">
                                <div>
                                    <label class="form-label"><i class="text-primary bx bx-user me-2"></i>Your Name</label>
                                    <div class="form-floating mb-3">
                                        <input type="text" id="name" name="name" class="form-control" placeholder="name" value="<?php echo old('name'); ?>">
                                        <label for="name" class="text-black-50">Your Name</label>
                                        <?php if (getError("name")){ ?>
                                            <small class="text-danger"><?php echo getError("name") ?></small>
                                        <?php } ?>
                                    </div>

                                </div>
                                <div>
                                    <label class="form-label"><i class="text-primary bx bx-phone me-2"></i>Phone Number</label>
                                    <div class="form-floating mb-3">
                                        <input type="text" name="phone" class="form-control" id="phone" placeholder="phone">
                                        <label for="phone" class="text-black-50">Phone Number</label>
                                        <?php if (getError("phone")){ ?>
                                            <small class="text-danger"><?php echo getError("phone") ?></small>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Upload Photo</label>
                                    <input class="form-control" name="upload" type="file" id="formFile">
                                    <?php if (getError("upload")){ ?>
                                        <small class="text-danger"><?php echo getError("upload") ?></small>
                                    <?php } ?>
                                </div>


                                <button class="text-uppercase btn btn-primary" name="save"><i class="text-white bx bx-save me-2"></i>Save</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php clearError(); ?>
        </div>
    </div>
</div>
<?php require_once "template/footer.php"; ?>