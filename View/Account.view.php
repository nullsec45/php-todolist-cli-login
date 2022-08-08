<?php
namespace View;

use Helper\InputHelper;
use Helper\InputValidation\RegisterValidation;
use Service\AccountService;

class AccountView{
    public function __construct(private AccountService $accountService){

    }
    public function menu():string{
            echo "Welcome to ramarff program".PHP_EOL;
            echo "Github:https://github.com/ramarff".PHP_EOL;
            $status=true;
            while($status){
                $menus=["Login","Register","Close"];
                foreach($menus as $menu => $value){
                    $i=$menu+1;
                    if($i === sizeof($menus)) $i="x";
                    echo "$i. $value".PHP_EOL;
                }
                $menu=InputHelper::input("Menu");
                switch($menu){
                    case "1";
                        $login=$this->login();
                        if($login === false){
                            return "todolist";
                        }elseif($login === "exit"){
                            continue 2;
                        }
                    break;
                    case "2":
                        $register=$this->register();
                        if($register == "exit"){
                            continue 2;
                        }
                    break;
                    case "x";
                        $status=false;
                        return "Good bye.";
                    break;
                    default:
                        echo "Pilihan tidak dimengerti!".PHP_EOL;
                }
            }
    }
    public function login(){
        echo "Login".PHP_EOL;
        echo "Enter username and password".PHP_EOL;
        $status=true;
        while($status){
            $username=InputHelper::input("Username (x for cancel login)"); 
            if(strtolower($username) === "x"){
               $status=false;
               return "exit";
            }
            $password=InputHelper::input("Password (x for cancel login)"); 
            if(strtolower($password) === "x"){
                $status=false;
                return "exit";
             }
            $status=$this->accountService->login($username, $password);
        }
        return $status;

    }
    public function register(){
        echo "Create account".PHP_EOL;

        $input=[];
        while(sizeof($input) == 0){
            $username=InputHelper::input("Username (x for cancel register)"); 
            $usernameValidation=RegisterValidation::UsernameValidation($username);
            if($usernameValidation){
                continue;
            }elseif($usernameValidation === false){
                return "exit";
            }
            array_push($input,$username);
        }

        while(sizeof($input) == 1){
            $password=InputHelper::input("Password (x for cancel register)");
            $passwordValidation=RegisterValidation::PasswordValidation($password);
            if($passwordValidation){
                continue;
            }elseif($passwordValidation === false){
                return "exit";
            }
            array_push($input, $password);
        }
        $this->accountService->register($input[0], $input[1]);
    }
}
?>