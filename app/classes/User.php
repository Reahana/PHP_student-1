<?php
/**
 * Created by PhpStorm.
 * User: Web App Develop-PHP
 * Date: 12/13/2021
 * Time: 2:36 PM
 */

namespace App\classes;
use App\classes\Database;

class User  extends Database
{
    private $name;
    private $email;
    private $password;
    private $mobile;
    private $type;
    private $link;
    private $sql;
    private $queryResult;
    private $data=[];
    private $row;
    private $i;
    private $studentInfo;

    public function __construct($data=null)
    {
        $this->link =$this->connection();
        if ($data)
        {
            $this->name = $data['name'];
            $this->email = $data['email'];
            if (isset($data['password']))
            {
                $this->password = md5($data['password']);
            }
            $this->mobile = $data['mobile'];
            $this->type =$data['user_type'];

        }

    }
    public function save()
    {

        if ($this->link)
        {
            $this->sql ="INSERT INTO users (name,email,password,mobile,user_type) VALUES ('$this->name','$this->email','$this->password','$this->mobile',' $this->type')";
            if (mysqli_query($this->link ,$this->sql))
            {
                return 'Registration Complete';
            }
            else
            {
                die('Query problem'.mysqli_error($this->link));
            }
        }
    }

    public  function getAllStudentInfo()
    {

        if ($this->link)
        {
            $this->sql ="SELECT * FROM users WHERE  user_type=3";
            if (mysqli_query($this->link ,$this->sql))
            {
                $this->queryResult = mysqli_query($this->link ,$this->sql);
                $this->i = 0;
                while ($this->row=mysqli_fetch_assoc($this->queryResult ))
                {
                    $this->data[$this->i]['id']= $this->row ['id'];
                    $this->data[$this->i]['name']= $this->row ['name'];
                    $this->data[$this->i]['email']= $this->row ['email'];
                    $this->data[$this->i]['mobile']= $this->row ['mobile'];
                    $this->i++;
                }
                return $this->data;
            }
            else
            {
                die('Query problem'.mysqli_error($this->link));
            }
        }
    }

   public function getAllUserInfo()
   {
       if ($this->link)
       {
           $this->sql ="SELECT * FROM users";
           if (mysqli_query($this->link ,$this->sql))
           {
               $this->queryResult = mysqli_query($this->link ,$this->sql);
               $this->i =0;
               while ($this->row=mysqli_fetch_assoc($this->queryResult ))
               {
                   $this->data[$this->i]['id']= $this->row ['id'];
                   $this->data[$this->i]['name']= $this->row ['name'];
                   $this->data[$this->i]['email']= $this->row ['email'];
                   $this->data[$this->i]['mobile']= $this->row ['mobile'];

                   $this->i++;
               }
               return $this->data;
           }
           else
           {
               die('Query problem'.mysqli_error($this->link));
           }
       }
   }
    public function getAllStudentInfoById($id)
    {

        $this->sql ="SELECT * FROM users WHERE  id= '$id'";
        $this->queryResult = mysqli_query($this->link ,$this->sql);
        return mysqli_fetch_assoc($this->queryResult);
    }
    public  function  delete($id)
    {

        if ($this->link)
        {
            $this->studentInfo= $this->getAllStudentInfoById($id);
            $this->sql ="DELETE FROM users WHERE  id= '$id'";
            if (mysqli_query($this->link ,$this->sql))
            {
                session_start();
                $_SESSION['message']='User info delete successfully';
                header('Location: action.php?status=manageAll');
            }
            else
            {
                die('Query problem'.mysqli_error($this->link));
            }
        }

    }
    public function updateStudentInfo($studentInfo)
    {


        if ($this->link)
        {
            $this->sql ="Update users SET name='$this->name', email ='$this->email' ,mobile = '$this->mobile' WHERE  id= '$studentInfo[id]'";
            if (mysqli_query($this->link ,$this->sql))
            {
                return 'User info update successfully';
            }
            else
            {
                die('Connection problem'.mysqli_error($this->link));
            }

        }
        else
        {
            die('Connection problem');
        }
    }
}