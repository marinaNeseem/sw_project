<?php 

class DBConnectionController{
    public $dbhost = "localhost";
    public $dbuser ="root";
    public $dbpassword="";
    public $dbname="encyclopidia_2";
    public $connection;

    
    public function openConnection()
    {
        $this->connection= new mysqli($this->dbhost,$this->dbuser,$this->dbpassword,$this->dbname);
        if($this->connection->connect_error)
        {
            echo 'error in connection: ' . $this->connection->connect_error;
            return false;

        }
        else
        {
            return true;
        }
    }
    public function closeconnection()
    {
        if($this->connection){
            $this->connection->close;
        }
        else{
            echo "connection is not openned";
        }
    }
    public function select($qry)
    {
        $result=$this->connection->query($qry);
        if(!$result)
        {
            echo "Error : ".mysqli_error($this->connection);
            return false;
        }
        else
        {
             return $result->fetch_all(MYSQLI_ASSOC);
        }

    }
    public function insert($qry)
    {
        $result=$this->connection->query($qry);
        if(!$result)
        {
            echo "Error : ".mysqli_error($this->connection);
            return false;
        }
        else
        {
             return $this->connection->insert_id;
        }

    }
    public function update($qry)
    {
        $result=$this->connection->query($qry);
        if(!$result)
        {
            echo "Error : ".mysqli_error($this->connection);
            return false;
        }
        else
        {
             return $this->connection->insert_id;
        }

    }
    public function delete($qry)
    {
        $result=$this->connection->query($qry);
        if(!$result)
        {
            echo "Error : ".mysqli_error($this->connection);
            return false;               
        }
        else
        {
             return $result;
        }

    }

}

?>