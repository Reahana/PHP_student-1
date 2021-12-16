<?php include  './includes/header.php' ?>
<?php
if (!isset($_SESSION['id']))
{
    header('Location: login.php');
}
else if ($_SESSION['user_type'] == 3 )
{
    header('Location: dashboard.php');
}
?>

<section class="py-5 text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h3>All Student Information</h3>
                    </div>
                    <div class="card-body">
                        <h4 class="text-center text-success"><?php echo isset($message)? $message:'' ?></h4>
                        <?php  if (isset($_SESSION['message'])){?>
                            <h4 class="text-center text-success">
                                <?php echo $_SESSION['message']; unset($_SESSION['message']) ?>
                            </h4>
                        <?php } ?>
                    </div>
                    <table class="table-bordered table table-hover">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($students as $student) {?>
                            <tr>
                                <td><?php echo  $student['name'];?></td>
                                <td><?php echo  $student['email'];?></td>
                                <td><?php echo  $student['mobile'];?></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>


<?php include  './includes/footer.php' ?>
