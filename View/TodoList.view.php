<?php
namespace View;

use Service\todoListService;
use Helper\InputHelper;

class todoListView{
    private todoListService $todoListService;
    public function __construct(todoListService $todoListService)
    {   
        $this->todoListService=$todoListService;
    }
    function show(){
        $menus=["Tambah Todo","Hapus Todo","Logout"];
        $status=true;
        while($status){
            $this->todoListService->show();
            echo "Menu".PHP_EOL;
            foreach($menus as $menu => $value){
                $i=$menu+1;
                if ($i === sizeof($menus)){
                    $i="x";
                }
                echo "$i. $value".PHP_EOL;
            }
            $pilihan=InputHelper::input("Pilih");
            switch($pilihan){
                case "1":
                    $this->add();
                break;
                case "2":
                   $this->remove();
                break;
                case "x":
                    $status=false;
                    return "logout";
                break;
                default :
                    echo "Pilihan tidak dimengerti".PHP_EOL;
                break;
            }   
        }

    }
    function add():void{
        echo "Menambah TODO".PHP_EOL;
        $todo=InputHelper::input("Todo (x untuk batal)");
    
        if (strtolower($todo) === "x") echo "Batal menambah todo".PHP_EOL; else $this->todoListService->add($todo);
    }
    function remove():void{
        $todo=InputHelper::input("Nomor (x untuk batal)");
        if (strtolower($todo) === "x") echo "Batal menghapus todo".PHP_EOL; else $this->todoListService->remove($todo);
    }
}