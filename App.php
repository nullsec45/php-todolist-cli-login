<?php
require_once __DIR__."./.init.php";

// Todolist
use Repository\{todoListRepositoryImpl, AccountRepository};
use Service\{todoListServiceImpl,AccountService};
use View\{todoListView, AccountView};

// Database
$connection=\Config\Database::getConnection();

$todoListRepo=new todoListRepositoryImpl($connection);
$todoListService=new todoListServiceImpl($todoListRepo);
$todoListView=new todoListView($todoListService);

$accountRepository=new AccountRepository($connection);
$accountService=new AccountService($accountRepository);
$accountView=new AccountView($accountService);

$login=$accountView->menu();
if($login === "todolist"){
    $logout=$todoListView->show();
    if($logout === "logout"){
        $login=$accountView->menu();       
    }
}
echo ($login !== "login") ? $login : "";


