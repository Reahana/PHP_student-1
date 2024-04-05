<?php include  './includes/header.php' ?>
<?php
if (!isset($_SESSION['id']))
{
    header('Location: login.php');
}
?>



<section class="py-5 text-center" style="min-height: 84vh">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card card-body">
                    <h1 class="text-center">My Dashboard</h1>
                    <?php if ($_SESSION['user_type'] == 1)   { ?>
                        <br><h3 class="text-success">Welcome Admin </h3>
                    <?php } else if ($_SESSION['user_type'] == 2)   { ?>
                        <br><h3 class="text-primary">Welcome Teacher </h3>
                    <?php } else if ($_SESSION['user_type'] == 3)   { ?>
                        <br><h3 class="text-danger">Welcome Student </h3>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>


<?php include  './includes/footer.php' ?>
