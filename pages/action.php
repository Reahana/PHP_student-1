<?php

require_once '../vendor/autoload.php';

use App\classes\User;
use App\classes\Auth;
use App\classes\Subject;



if (isset($_POST['loginBtn']))
{
    $auth = new Auth($_POST);
    $message=$auth->login();
    include 'login.php';
}
else if (isset($_GET['status'])) {
    if ($_GET['status']== 'manage')
    {
        $student = new User();
        $students=$student->getAllStudentInfo();
        include 'allStudent.php';
    }
    if ($_GET['status'] == 'logout') {
        $auth = new Auth();
        $auth->logout();

    }
    if ($_GET['status']== 'manageAll')
    {
        $user = new User();
        $users=$user->getAllUserInfo();
        include 'allUsers.php';
    }
    if ($_GET['status']== 'allSubject')
    {
        $subject = new Subject();
        $subjects=$subject ->getAllSubject();
        include 'allSubject.php';
    }

}
else if(isset($_GET['delete']))
{
    $user = new User();
    $user->delete($_GET['delete']);
}
else if(isset($_GET['edit']))
{
    $user = new User();
    $studentInfo=$user->getAllStudentInfoById($_GET['edit']);
    include 'edit.php';

}
else if(isset($_POST['btnEdit']))
{
    $user = new User($_POST);
    $studentInfo=$user->getAllStudentInfoById($_POST['id']);
    $message=$user->updateStudentInfo($studentInfo);
    $users=$user->getAllUserInfo();
    include 'allUsers.php';
}

else if (isset($_POST['btn']))
{
    $user = new User($_POST);
    $message=$user->save();
    include  'addUser.php';

} else if (isset($_POST['subjectBtn']))
{
    $subject = new Subject($_POST);
    $subject-> added();
    include 'addSubject.php';
}