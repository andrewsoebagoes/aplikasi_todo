<?php

require_once __DIR__ . "/../Entity/Todolist.php";
require_once __DIR__ . "/../Repository/TodolistRepository.php";
require_once __DIR__ . "/../Service/TodolistService.php";
require_once __DIR__ . "/../View/TodolistView.php";
require_once __DIR__ . "/../Helper/InputHelper.php";

use \Entity\Todolist;
use \Repository\TodolistRepositoryImpl;
use \Service\TodolistServiceImpl;
use \View\TodolistView;

function testViewShowTodolist(): void{
    
    $todolistRepository = new TodolistRepositoryImpl();
    $todolistService    = new TodolistServiceImpl($todolistRepository);
    $todolistView       = new TodolistView($todolistService);

    $todolistService->addTodolist("Bisa");
    $todolistService->addTodolist("Bisa OK");
    $todolistService->addTodolist("Pasti Bisa OK");

    $todolistView->showTodolist();
}

function testViewAddTodolist(): void{
    
    $todolistRepository = new TodolistRepositoryImpl();
    $todolistService    = new TodolistServiceImpl($todolistRepository);
    $todolistView       = new TodolistView($todolistService);

    $todolistService->addTodolist("Bisa");
    $todolistService->addTodolist("Bisa OK");
    $todolistService->addTodolist("Pasti Bisa OK");

    $todolistView->showTodolist();
    $todolistView->addTodolist();
    $todolistView->showTodolist();
}

function testViewDeleteTodolist(): void{
    
    $todolistRepository = new TodolistRepositoryImpl();
    $todolistService    = new TodolistServiceImpl($todolistRepository);
    $todolistView       = new TodolistView($todolistService);

    $todolistService->addTodolist("Bisa");
    $todolistService->addTodolist("Bisa OK");
    $todolistService->addTodolist("Pasti Bisa OK");

    $todolistView->showTodolist();
    $todolistView->removeTodolist();
    // $todolistView->showTodolist();
 
}

testViewDeleteTodolist();