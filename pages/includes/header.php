<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>PHP_290581</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.css"/>
</head>
<body>
<?php if (isset($_SESSION['id'])){?>
<!-- =============== Menu Start ================== -->
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container">
        <a href="home.php" class="navbar-brand">LOGO</a>
        <ul class="navbar-nav ml-auto">
            <?php if ($_SESSION['user_type'] == 1)   { ?>
            <li><a href="addUser.php" class="nav-link">Add Users </a></li>
            <li><a href="action.php?status=manageAll" class="nav-link">All Users </a></li>
            <li><a href="addSubject.php" class="nav-link">Add Subject </a></li>
            <li><a href="action.php?status=manageSubject" class="nav-link">All Subject </a></li>
            <?php } else if ($_SESSION['user_type']== 2) { ?>
            <li><a href="action.php?status=manage" class="nav-link">All Student </a></li>
            <li><a href="action.php?status=allSubject" class="nav-link">All Subject </a></li>
            <?php } else { ?>
                <li><a href="action.php?status=allSubject" class="nav-link">My Subject </a></li>
            <?php } ?>
            <li><a href="action.php?status=logout" class="nav-link">Logout</a></li>
        </ul>
    </div>
</nav>
<!-- =============== Menu End ================== -->

<?php }?>