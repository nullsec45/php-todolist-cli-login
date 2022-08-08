<?php
require_once __DIR__."/../Entity/TodoList.php";
require_once __DIR__."/../Repository/TodoList.repo.php";
require_once __DIR__."/../Service/TodoList.service.php";
require_once __DIR__."/../Config/Database.php";

use Repository\todoListRepositoryImpl;
use Service\todoListServiceImpl;


function testShowTodoList(){
    $connection=\Config\Database::getConnection();
    $todoListRepository=new todoListRepositoryImpl($connection);
    $todoListService=new todoListServiceImpl($todoListRepository);
    $todoListService->show();
}
// function testAddTodoList(){
    // $connection=\Config\Database::getConnection();
    // $todoListRepository=new todoListRepositoryImpl($connection);
    
//     $todoListService=new todoListServiceImpl($todoListRepository);
//     $todoListService->add("Belajar PHP");
//     $todoListService->add("Belajar Javascript");
//     $todoListService->add("Belajar Python");
// }
// function testRemoveTodoList(){
//     $connection=\Config\Database::getConnection();
//     $todoListRepository=new todoListRepositoryImpl($connection);
//     $todoListService=new todoListServiceImpl($todoListRepository);

//     $todoListService->remove(5);
// }
testShowTodoList();