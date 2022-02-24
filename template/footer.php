<script src="<?php echo $url; ?>/assets/vendor/jquery/jquery-3.5.1.js"></script>
<script src="<?php echo $url; ?>/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo $url; ?>/assets/vendor/datatable/jquery.dataTables.min.js"></script>
<script src="<?php echo $url; ?>/assets/vendor/datatable/dataTables.bootstrap5.min.js"></script>
<script src="<?php echo $url; ?>/assets/js/app.js"></script>
<script>
    let currentLocation = location.href;
    let links = document.querySelectorAll(".menu-item-link");
    let menuLength = links.length;

    for (let i=0; i<menuLength;i++){
        if (links[i].href ===currentLocation){
            links[i].className = "linkActive"
        }
    }

</script>
</body>
</html>
