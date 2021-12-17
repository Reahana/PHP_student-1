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
                <div class="col-md-10 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h3>All Subjects</h3>
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
                                <th class="col-7">Name</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($subjects as $subject) {?>
                                <tr>
                                    <td><?php echo  $subject['subject'];?></td>
                                    <td>
                                        <a href="action.php?editSub=<?php echo $subject['id']?>" class="btn btn-outline-warning ">Edit</a>
                                        <a href="action.php?deleteSub=<?php echo $subject['id']?>" onclick=" return confirm('Are you sure to delete this ?')" class="btn btn-outline-danger">Delete</a>
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
<?php
/**
 * Created by PhpStorm.
 * User: Web App Develop-PHP
 * Date: 12/13/2021
 * Time: 3:33 PM
 */