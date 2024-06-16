<?php
require_once '../../Controllers/DBConnectionController.php';
require_once '../../Models/comments.php';

 class commentController
     
{     protected $db;
    public function add(Comments $comments)
    {
         $this->db=new DBConnectionController;
         if($this->db->openConnection())
         {
            $qry="insert into comments values ('','2','12','$comments->comment','$comments->date')";
            return $this->db->insert($qry);
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }
    }
    public static function update(Comments $comments)
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
    public function deletecomment($comment_id)
    {
         $this->db=new DBConnectionController;
         if($this->db->openConnection())
         {
            $query="DELETE FROM comments WHERE comment_id=$comment_id";
            return $this->db->delete($query);
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }
    }
    public function getallcomments()
    {
         $this->db =new DBConnectionController;
         if($this->db->openConnection())
         {
            $query="SELECT comment_id,user_id, article_id, comment, date FROM Comments";
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