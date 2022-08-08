<?php
namespace Repository;
use Entity\Account;

interface InterfaceAccountRepository{
    // function login():array;
    function login(?string $username, ?string $password) : bool;
    function register(Account $account):bool;
}
class AccountRepository implements InterfaceAccountRepository{
    private \PDO $connection;

    public function __construct(\PDO $connection){
        $this->connection=$connection;
    }
    public function login(?string $username, ?string $password) :bool{
        $sql="SELECT * FROM tbl_users WHERE username=? AND password=?";
        $result=$this->connection->prepare($sql);
        $result->execute([$username, hash("sha256",$password)]);
        
        return ($result->fetch()) ?  true : false;
    }
    // public function login() :array{
    //     $sql="SELECT * FROM tbl_users";
    //     $statement=$this->connection->prepare($sql);
    //     $statement->execute();
    //     $result=[];
    //     foreach($statement as $row){
    //         $account=new Account();
    //         $account->setUsername($row["username"]);
    //         $account->setPassword($row["password"]);
    //         $result[]=$account;
    //     }
    //     return $result;
    // }
    
    public function register(Account $account) : bool{
        $sql="INSERT INTO tbl_users (username, password) VALUES (?,?)"; 
        $statement=$this->connection->prepare($sql);
        $statement->execute([$account->getUsername(), $account->getPassword()]);
        return true;
    }

    public function selectUsername(?string $username){
        $sql="SELECT username FROM tbl_users WHERE username=?";
        $statement=$this->connection->prepare($sql);
        $statement->execute([$username]);
        return ($statement->fetch()) ?  true : false;      
    }
}
?>