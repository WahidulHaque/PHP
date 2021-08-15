<!-- Script Area -->

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="../../assets/admin/lib/bootstrap-4.6.0-dist/js/popper.min.js"></script>
<script src="https://unpkg.com/boxicons@latest/dist/boxicons.js"></script>
<script src="../../assets/admin/services/CategoryService.js"></script>
<script src="../../assets/admin/services/ProductService.js"></script>
<script src="../../assets/admin/services/SearchService.js"></script>
<script src="../../assets/admin/js/adm_script.js"></script>

<script>
    $('.dropdown-toggle').dropdown();
</script>

<?php
    if(isset($_SESSION['message'])){
        ?>
            <script>
                alert(<?=$_SESSION['message']?>);
            </script>
        <?php
    }
    // unset($_SESSION["message"]);
?>