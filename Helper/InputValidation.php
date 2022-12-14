<?php
namespace Helper\InputValidation;
use Repository\AccountRepository;
use Config\Database;
class RegisterValidation{
    static public function UsernameValidation($username){
            $accountRepository=new AccountRepository(Database::getConnection());
            if(trim($username) === ""){
                echo "Username cannot be empty!".PHP_EOL;
                return true;
            }elseif($accountRepository->selectUsername($username)){
                echo "The username is already in the database".PHP_EOL;
                return true;
            }elseif(strtolower($username) == "x"){
                return false;
            }
        
        }
        static public function PasswordValidation($password){
            if(trim($password) === ""){
                echo "Password cannot be empty!".PHP_EOL;
                return true;
            }elseif(strlen($password) > 10){
                echo "Maximum length password 10 characters!".PHP_EOL;
                return true;
            }elseif(strtolower($password) == "x"){
                return false;
            }
        }
}
class LoginValidation{
    static public function InputValidation($input){
        if(strtolower($input) === "x"){
            return false;
        }elseif(trim($input) === ""){
            echo "Input username / password!".PHP_EOL;
            return true;
        }
    }
}
?>