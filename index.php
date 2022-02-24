<?php include "template/header.php" ?>
<?php include "template/side_header.php"; ?>
<section class="home_content">
    <div class="text"><img src="<?php echo $url; ?>/assets/img/contact_list.png" class="me-2" style="width: 45px;" alt="">Contacts</div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="my-4">
                    <a href="<?php echo $url; ?>/contact_add.php" class="btn btn-primary">
                        <i class='bx bx-plus' ></i>
                        Create
                    </a>
                </div>
                <hr>
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Photo</th>
                            <th>Control</th>
                            <th>Time</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach (contacts() as $c){ ?>
                        <tr>
                            <td><?php echo $c['id']; ?></td>
                            <td><?php echo $c['name']; ?></td>
                            <td><?php echo $c['phone']; ?></td>
                            <td>
                                <img src="<?php echo $url; ?>/<?php echo $c['photo']; ?>" style="width: 40px;height: 40px;border-radius: 50%;" alt="">
                            </td>
                            <td>
                                <a href="<?php echo $url; ?>/contact_delete.php?id=<?php echo $c['id']; ?>"
                                   onclick="return confirm('Are you sure to delete?')"
                                   class="btn btn-sm btn-outline-danger">
                                    <i class="bx bx-trash"></i>
                                </a>
                                <a href="<?php echo $url; ?>/contact_update.php?id=<?php echo $c['id']; ?>" class="btn btn-sm btn-outline-warning">
                                    <i class="bx bx-edit"></i>
                                </a>
                            </td>
                            <td><?php echo date("Y-m-d h:i",strtotime($c['created_at'])); ?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<?php include "template/footer.php" ?>

<script>
    $(".table").dataTable();
</script>