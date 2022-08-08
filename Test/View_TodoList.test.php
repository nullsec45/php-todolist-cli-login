<?php

require_once __DIR__."/../Entity/TodoList.php";
require_once __DIR__."/../Repository/TodoList.repo.php";
require_once __DIR__."/../Service/TodoList.service.php";
require_once __DIR__."/../View/TodoList.view.php";
require_once __DIR__."/../Helper/InputHelper.php";

use Config\Database;
use \View\todoListView;
use \Service\todoListServiceImpl;
use \Repository\todoListRepositoryImpl;

// function testViewShowTodoList() :void{
//     $todoListRepository=new todoListRepositoryImpl();
//     $todoListService=new todoListServiceImpl($todoListRepository);
//     $todoListView=new todoListView($todoListService);

    // $todoListService->add("Belajar PHP");
    // $todoListService->add("Belajar Javascript");
    // $todoListService->add("Belajar Python");

//     $todoListView->show();
// }

// function testViewAddTodoList() :void{
//     $todoListRepository=new todoListRepositoryImpl();
//     $todoListService=new todoListServiceImpl($todoListRepository);
//     $todoListView=new todoListView($todoListService);

//     $todoListView->show();
// }
function testViewRemoveTodoList() :void{
    $connection=\Config\Database::getConnection();
    $todoListRepository=new todoListRepositoryImpl($connection);
    $todoListService=new todoListServiceImpl($todoListRepository);
    $todoListView=new todoListView($todoListService);

    $todoListService->add("Belajar PHP");
    $todoListService->add("Belajar Javascript");
    $todoListService->add("Belajar Python");
    $todoListView->show();
  
}
testViewRemoveTodoList();