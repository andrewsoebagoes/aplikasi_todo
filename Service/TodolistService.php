<?php

namespace Service{

    use Repository\TodolistRepository;
    use Entity\Todolist;
    interface TodolistService
    {

        function showTodolist(): void;
        function addTodolist(string $todo): void;
        function removeTodolist(int $number): void;

    }


    class TodolistServiceImpl implements TodolistService{

        private TodolistRepository $todolistRepository;

        public function __construct(TodolistRepository $todolistRepository)
        {
            $this->todolistRepository = $todolistRepository;
        }

        function showTodolist(): void
        {
            echo "TODOLIST". PHP_EOL;
            $dataTodo = $this->todolistRepository->tampilData();
            foreach($dataTodo as $number => $todo){
                echo "$number. " . $todo->getTodo(). PHP_EOL;
            }
               
        }

        function addTodolist(string $todo): void
        {
            $todolist = new Todolist($todo);
            $this->todolistRepository->simpanData($todolist);
            echo "Sukses menambah Todolist". PHP_EOL; 
        }

        function removeTodolist(int $number): void
        {
            if($this->todolistRepository->hapusData($number)){
                echo "Sukses menghapus Todolist". PHP_EOL;
            }else{
                echo "Gagal menghapus Todolist" .PHP_EOL;
            }
        }
    }
}
