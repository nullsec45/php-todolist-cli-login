<?php
namespace Repository;
use Entity\todoList;

interface todoListRepository{
    function save(todoList $todoList):void;
    function remove(int $id):bool;
    function findAll():array;
}
class todoListRepositoryImpl implements todoListRepository{
    private \PDO $connection;
    
    public function __construct(\PDO $connection)
    {
        $this->connection=$connection;
    }
    function save(todoList $todoList):void{ 
        // Memakai SQL Prepare agar tidak terjadi SQL Injection
        $length=$this->findAll();
        $sql="INSERT INTO tbl_todolist(id, todo) VALUES (?,?)"; 
        $statement=$this->connection->prepare($sql);
        $statement->execute([sizeof($length)+1, $todoList->getTodo()]);
    }
    function remove(int $id):bool{
        $sql="SELECT id FROM tbl_todolist WHERE id=?";
        $idTodo=$this->connection->prepare($sql);
        $idTodo->execute([$id]);
        
        if($idTodo->fetch()){
            $length=sizeof($this->findAll());
            $sql="DELETE FROM tbl_todolist WHERE id=?";
            $statement=$this->connection->prepare($sql);
            $statement->execute([$id]);
            for($i=$id;$i<=$length;$i++){
                $this->gantiId($i-1, $i);
            }
            return True;
        }else{
            echo "Todo list dengan Id $id tidak ada!".PHP_EOL;
            return False;
        }
        return True;
    }
    function findAll():array{
        $sql="SELECT id, todo FROM tbl_todolist";
        $statement=$this->connection->prepare($sql);
        $statement->execute();
        $result=[];
        foreach($statement as $row){
            $todoList=new todoList();
            $todoList->setId($row["id"]);
            $todoList->setTodo($row["todo"]);
            $result[]=$todoList;
        }
        return $result;
    }
    function gantiId($idBaru, $idLama){
        $sql="UPDATE tbl_todolist SET id=? WHERE id=?";
        $statement=$this->connection->prepare($sql);
        $statement->execute([$idBaru, $idLama]);
    }
}