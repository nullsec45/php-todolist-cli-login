<?php
namespace Service;

use Entity\todoList;
use Repository\todoListRepository;
interface todoListService{
    function show():void;
    function add(string $todo):void;
    function remove(int $id):void;

}
class todoListServiceImpl implements TodoListService{
    private todoListRepository $todoListRepository;

    public function __construct(TodoListRepository $todoListRepository)
    {
        $this->todoListRepository=$todoListRepository;
    }
    function show():void{
        echo "TODO LIST".PHP_EOL;
        // Logic -> data sudah dapat dari repository, terserah repository datanya 
        // mau ditaruh di mana saja, setelah itu repository mau melakukan apa saja terhadap data tersebut
        $todoList=$this->todoListRepository->findAll();
        if(sizeof($todoList) === 0){
            echo '["Belum ada todo list"]'.PHP_EOL;
        }
        // die();
        foreach($todoList as $number => $value){
            // value sebenarnya bukan string, namun dia itu objek TodoList
            echo $value->getId().".".$value->getTodo().PHP_EOL;
            
        }
    }
    function add(string $todo):void{
        $todoList=new todoList($todo);
        $this->todoListRepository->save($todoList);
        echo "Sukses menambah todo list".PHP_EOL;
    }
    function remove(int $id):void{
       if ($this->todoListRepository->remove($id)) echo "Sukses menghapus todo list".PHP_EOL;
    }
}