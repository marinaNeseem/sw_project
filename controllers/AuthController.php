<?php
require_once 'DBConnectionController.php';
require_once '../../models/users.php';
 
class AuthController
{
    protected $db;

    public function register(user $user)
    {
         $this->db=new DBConnectionController;
        if($this->db->openConnection())
        {
            $query="insert into users values ('','$user->password','$user->email','$user->user_name','2','$user->date_of_birth')";
            $result=$this->db->insert($query);
            if($result!=false)
            {
                session_start();
                $_SESSION["userId"]=$result;
                $_SESSION["userName"]=$user->name;
                $_SESSION["userRole"]="client";
                $this->db->closeConnection();
                return true;
            }
            else
            {
                $_SESSION["errMsg"]="Somthing went wrong... try again later";
                $this->db->closeConnection();
                return false;
            }
        }
        else
        {
            echo "Error in Database Connection";
            return false;
        }
    }

    public function login(user $user)
    {
        $this->db=new DBConnectionController;
        if($this->db->openConnection())

        {
            $query="SELECT * FROM `users` WHERE email='$user->email' and password ='$user->password'";
            $result=$this->db->select($query);
            if($result===false)
            {
                echo "enter vaild email or password";
                return false;
            }
            else
            {
                if(count($result)==0)
                {
                    session_start();
                   $_SESSION["errMsg"]="You have Entered wrong Email or Password!";
                   return false;
                    //$this->db->closeConnection();
                   //echo" you have enterded wrong email or password";
                    //return false;
                }
                else
                {
                   
                    session_start();
                    $_SESSION["userId"]=$result[0]["user_id"];
                    $_SESSION["userName"]=$result[0]["user_name"];
                    $_SESSION["userRole"]=$result[0]["role_id"];
                    if($result[0]["role_id"]==1)
                    {
                        $_SESSION["userRole"]="admin";
                    }
                    else
                    {
                        $_SESSION["userRole"]="client";
                    }
                    $this->db->closeConnection();
                    return true;
                    //if($result[0]["roleId"]==1)
                    return true;
                }
                    //session_start();
                    //$_SESSION["userId"]=$result[0]["id"];
                    //$_SESSION["userName"]=$result[0]["name"];
                    //if($result[0]["roleId"]==1)
                
                   // {
                      //  $_SESSION["userRole"]="client";
                   // }
                   // else
                   // {
                    //    $_SESSION["userRole"]="admin";
                    //}
                   // $this->db->closeConnection();
                    //return true;
                
            }
        }
        else
        {
            echo "Error in Database Connection";
            return false;
        }
    }

}
?>