<?php
require_once '../../Controllers/DBConnectionController.php';
require_once '../../Models/articles.php';
 class ArticleController
{   
    protected $db;
   /* public function getCategories()
    { 
         $this->db=new DBConnectionController;
         if($this->db->openConnection())
         {
            $qry="select * from categories";
            return $this->db->select($qry);
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }
    }*/


    public function add(Articles $article)
    { 
         $this->db=new DBConnectionController;
         if($this->db->openConnection())
         {
            $qry="insert into articles values ('','1','$article->category','$article->article_title','$article->article_body','$article->media','1')";
           
         
            return $this->db->insert($qry);
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }
    }
    public static function update(Articles $article)
    {
         $this->db=new DBConnectionController;
         if($this->db->openConnection())
         {
            $qry="update into articles values ('',' $article->title','$article->body','$article->category','$article->media','$article->user_id','$article->lan_id')";

            return $this->db->update($qry);
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }
    }
    public function delete($article_id)
    {
         $this->db=new DBConnectionController;
         if($this->db->openConnection())
         {
            $query="delete from articles where article_id = $article_id";
            return $this->db->delete($query);
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }
    }
    public function getallarticles()
    {
         $this->db =new DBConnectionController;
         if($this->db->openConnection())
         {
            $query="SELECT article_id,user_id, category, article_title,article_body, media FROM articles";
            return $this->db->select($query);
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }
    }
    public function getCategories()
    {
         $this->db=new DBController;
         if($this->db->openConnection())
         {
            $query="SELECT Category FROM articles";
            return $this->db->select($query);
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }
    }
}
?>