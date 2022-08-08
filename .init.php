<?php
require_once __DIR__."/Config/Database.php";
require_once __DIR__."/Helper/InputHelper.php";
require_once __DIR__."/Helper/InputValidation.php";

// TodoList
require_once __DIR__ . '/Entity/todolist.php';
require_once __DIR__."/Repository/TodoList.repo.php";
require_once __DIR__."/Service/TodoList.service.php";
require_once __DIR__."/View/TodoList.view.php";


// Login & register
require_once __DIR__ . '/Entity/Account.php';
require_once __DIR__."/Repository/Account.repo.php";
require_once __DIR__."/Service/Account.service.php";
require_once __DIR__."/View/Account.view.php";
?>