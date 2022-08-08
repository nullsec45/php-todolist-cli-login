<?php
namespace Service;
use Entity\Account;
use Repository\AccountRepository;

interface InterfaceAccountService{
    function login(?string $username ,?string $password);
    function register(?string $username, ?string $password);
}
class AccountService implements InterfaceAccountService{
    private AccountRepository $accountRepository;

    public function __construct(AccountRepository $accountRepository)
    {
        $this->accountRepository=$accountRepository;
    }
    function login(?string $username ,?string $password){
        $status=$this->accountRepository->login($username, $password);
        if ($status) { 
           echo "Welcome back $username!".PHP_EOL;
           return false;
        } 
        echo "Gagal login, silahkan masukkan username/password lagi!".PHP_EOL;
        return true;

        // $account=$this->accountRepository->login();
        // foreach($account as $data){
        //     if ($data->name === $username && $data->password === md5($password)){
        //         echo "Sukses";
        //         return false;
        //     }else{
        //         echo "Gagal login, silahkan masukkan username/password lagi!".PHP_EOL;
        //         return true;
        //     }
        // }

    }
    function register(?string $username, ?string $password){
        $account=new Account($username, hash("sha256",$password));
        $status=$this->accountRepository->register($account);
        if ($status) { 
            echo "Sukses registrasi!".PHP_EOL;
         } 
    }
}
?>