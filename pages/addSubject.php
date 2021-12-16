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
                        <h3>Add Subject Form</h3>
                    </div>
                    <div class="card-body">
                        <h3 class="text-success text-center"><?php echo isset($message) ? $message : '';  ?></h3>
                        <form action="action.php" method="post" >
                            <div class="form-group row">
                                <label for="" class="col-form-label col-md-3 ">Subject:</label>
                                <div class="col-md-9 ">
                                    <input type="text" name="subject" class="form-control" required/>
                                </div>
                            </div>
                            <d iv class="form-group row">
                                <label for="" class="col-form-label col-md-3 "></label>
                                <div class="col-md-9">
                                    <input type="submit" name="subjectBtn" value="SUBMIT" class="btn btn-outline-info btn-block"/>
                                </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>


<?php include  './includes/footer.php' ?>
