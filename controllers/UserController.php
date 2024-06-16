<?php
require_once '../../models/users.php'
require_once '../../Controllers/DBConnectionController.php';

public static class UserController
{    
    public static function add(users $user)
    {
         $this->db=new DBConnection;
         if($this->db->openConnection())
         {
           $qry="insert into users values ('','$user->password','$user->email','$user->user_name','$user->role_id','$user->date_of_birth')";
            return $this->db->insert($qry);
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }
    }
    public static function update(users $user)
    {
         $this->db=new DBConnection;
         if($this->db->openConnection())
         {
            $qry="update into users values ('','$user->password','$user->email','$user->user_name','$user->role_id','$user->date_of_birth')";

            return $this->db->update($qry);
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }
    }
    public static function delete(users $user)
    {
         $this->db=new DBConnection;
         if($this->db->openConnection())
         {
            $qry="delete into users values ('','$user->password','$user->email','$user->user_name','$user->role_id','$user->date_of_birth')";
            return $this->db->delete($qry);
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }
    }
}
?>
