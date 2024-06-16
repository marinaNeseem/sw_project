<?php 
require_once '../../models/users.php';
require_once '../../Models/articles.php';
require_once '../../Controllers/DBConnectionController.php';
class DB_functions
{
    protected $db;

    //1. Open connection.
    //2. Run query & logic.
    //3. Close connection
 
    public function addUser (Users $user)
    {
         $this->db=new DBConnectionController;
         if($this->db->openConnection())
         {
            return $this->db->insert($user);
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }
    }
    public function addArticle (articles $article)
    {
         $this->db=new DBConnectionController;
         if($this->db->openConnection())
         {
            return $this->db->insert($article);
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }
    }
    public function viewArticle(articles $article)
    {
         $this->db =new DBConnectionController;
         if($this->db->openConnection())
         {
            $query="SELECT * FROM `articles` ";
            return $this->db->select($query);
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }
    }
    public function deleteArticle( $id)
    {
         $this->db=new DBConnectionController;
         if($this->db->openConnection())
         {
            $query="delete from Articles where id = $id";
            return $this->db->delete($query);
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }
    }
      

    
    
}

?>