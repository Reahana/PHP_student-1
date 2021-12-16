<?php include  './includes/header.php' ?>
<?php
if (isset($_SESSION['id']))
{
    header('Location: dashboard.php');
}
?>

<section class="py-5 text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h3>Login Form</h3>
                    </div>
                    <div class="card-body">
                        <h3 class="text-danger text-center mb-4"><?php echo isset($message) ? $message : '';  ?></h3>
                        <form action="action.php" method="post">
                            <div class="form-group row">
                                <label for="" class="col-form-label col-md-3 ">Email:</label>
                                <div class="col-md-9">
                                    <input type="email" name="email" class="form-control" required/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-form-label col-md-3 ">Password:</label>
                                <div class="col-md-9">
                                    <input type="password" name="password" class="form-control" required/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-form-label col-md-3 "></label>
                                <div class="col-md-9">
                                    <input type="submit" name="loginBtn" value="LOGIN" class="btn btn-primary btn-block"/>
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
