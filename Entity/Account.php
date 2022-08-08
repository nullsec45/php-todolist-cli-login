<?php
namespace Entity;
class Account{
    public function __construct(private  $username="", private $password=""){}

    public function setUsername($username):void{
        $this->username=$username;
    }
    public function getUsername() : string{
        return $this->username;
    }
    public function setPassword($password) :void{
        $this->password=$password;
    }
    public function getPassword() : string{
        return $this->password;
    }

}
?>