<?php

require_once __DIR__ . "/../Entity/Todolist.php";
require_once __DIR__ . "/../Repository/TodolistRepository.php";
require_once __DIR__ . "/../Service/TodolistService.php";

use Entity\Todolist;
use Service\TodolistServiceImpl;
use Repository\TodolistRepositoryImpl;

function testShowTodolist(): void
{
    $todolistRepository = new TodolistRepositoryImpl();
    $todolistRepository->todolist[1] = new Todolist("Andrew");
    $todolistRepository->todolist[2] = new Todolist("Menjadi");
    $todolistRepository->todolist[3] = new Todolist("Programmer");
    $todolistService    = new TodolistServiceImpl($todolistRepository);

    $todolistService->showTodolist();
}

function testAddTodolist(): void
{
    $todolistRepository = new TodolistRepositoryImpl();
    $todolistService    = new TodolistServiceImpl($todolistRepository);

    $todolistService->addTodolist("Belajar Pemrograman");
    $todolistService->addTodolist("Belajar PHP");

    $todolistService->showTodolist();
}

function testDeleteTodolist(): void
{
    $todolistRepository = new TodolistRepositoryImpl();
    $todolistService    = new TodolistServiceImpl($todolistRepository);

    $todolistService->addTodolist("Belajar Pemrograman");
    $todolistService->addTodolist("Belajar PHP");

    $todolistService->showTodolist();
    
    $todolistService->removeTodolist(1);
    $todolistService->showTodolist();
    $todolistService->removeTodolist(3);
    $todolistService->showTodolist();
    $todolistService->removeTodolist(1);
    $todolistService->showTodolist();
}

testDeleteTodolist();