<?php
/**
 * Created by PhpStorm.
 * User: Web App Develop-PHP
 * Date: 12/13/2021
 * Time: 3:01 PM
 */

namespace App\classes;
use App\classes\Database;

class Subject extends  Database
{
  private $subject;
  private $link;
    private $sql;
    private $queryResult;
    private $data=[];
    private $row;
    private $i;
    private $subjectInfo;
  public function __construct($data=null)
  {
      $this->link =$this->connection();

      if ($data)
      {
          $this->subject =$data['subject'];
      }
  }

  public function added()
  {
      if ($this->link)
      {
          $this->sql ="INSERT INTO subjects (name) VALUES ('$this->subject')";
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

    public function getAllSubject()
    {
        if ($this->link)
        {
            $this->sql ="SELECT * FROM subjects";
            if (mysqli_query($this->link ,$this->sql))
            {
                $this->queryResult = mysqli_query($this->link ,$this->sql);
                $this->i =0;
                while ($this->row=mysqli_fetch_assoc($this->queryResult ))
                {
                    $this->data[$this->i]['id']= $this->row ['id'];
                    $this->data[$this->i]['subject']= $this->row ['name'];
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
    public function getAllSubjectById($id)
    {

        $this->sql ="SELECT * FROM subjects WHERE  id= '$id'";
        $this->queryResult = mysqli_query($this->link ,$this->sql);
        return mysqli_fetch_assoc($this->queryResult);
    }
    public  function  delete($id)
    {

        if ($this->link)
        {
            $this->subjectInfo= $this->getAllSubjectById($id);
            $this->sql ="DELETE FROM subjects WHERE  id= '$id'";
            if (mysqli_query($this->link ,$this->sql))
            {
                session_start();
                $_SESSION['message']='Subject Deleted successfully';
                header('Location: action.php?status=manageSubject');
            }
            else
            {
                die('Query problem'.mysqli_error($this->link));
            }
        }

    }
    public function updateSubject($subjectInfo)
    {


        if ($this->link)
        {
            $this->sql ="Update subjects SET name='$this->subject' WHERE  id= '$subjectInfo[id]'";
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