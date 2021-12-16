<?php include  './includes/header.php' ?>
<?php
if (!isset($_SESSION['id']))
{
    header('Location: login.php');
}
?>



<section class="py-5 text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card card-body">
                    <h3 class="text-center">My Dashboard</h3>
                </div>
            </div>
        </div>
    </div>
</section>


<?php include  './includes/footer.php' ?>
