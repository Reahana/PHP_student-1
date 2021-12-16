<?php include  './includes/header.php' ?>

<?php
if (!isset($_SESSION['id']))
{
    header('Location: login.php');
}
else if ($_SESSION['user_type'] == 3 || $_SESSION['user_type'] == 2)
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
                            <h3>All Users Information</h3>
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
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($users as $user) {?>
                                <tr>
                                    <td><?php echo  $user['name'];?></td>
                                    <td><?php echo  $user['email'];?></td>
                                    <td><?php echo  $user['mobile'];?></td>
                                    <td>
                                        <a href="action.php?edit=<?php echo $user['id']?>" class="btn btn-outline-info ">Edit</a>
                                        <a href="action.php?delete=<?php echo $user['id']?>" onclick=" return confirm('Are you sure to delete this ?')" class="btn btn-outline-danger">Delete</a>
                                    </td>
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
