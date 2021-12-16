<?php
/**
 * Created by PhpStorm.
 * User: Web App Develop-PHP
 * Date: 12/12/2021
 * Time: 2:32 PM
 */

namespace App\classes;


class Database
{
    private  $hostName;
    private $userName;
    private $password;
    private  $link;
    private $dbName;




    protected  function  connection()
    {
        $this->hostName = 'localhost';
        $this->userName ='root';
        $this->password ='';
        $this->dbName ='php_290581';
        $this->link = mysqli_connect( $this->hostName,$this->userName,$this->password ,$this->dbName);
        if ($this->link)
        {
            return $this->link;
        }
        else
        {
            die('Connection Problem');
        }
    }
}