<?php

namespace View{

 
    use Service\TodolistService;
    use Helper\InputHelper;

    class TodolistView
    {
     
        private TodolistService $todolistService;

        public function __construct(TodolistService $todolistService)
        {
            $this->todolistService = $todolistService;
        }

        function showTodolist():void
        {
            while (true){
                $this->todolistService->showTodolist();

                echo "MENU". PHP_EOL;
                echo "1. Tambah". PHP_EOL;
                echo "2. Hapus". PHP_EOL;
                echo "x. Keluar". PHP_EOL;

                $pilihan = InputHelper::input("Pilih");

                if ($pilihan == "1") {
                    $this->addTodolist();
                }else if ($pilihan == "2") {
                    $this->removeTodolist();
                }else if ($pilihan == "x") {
                   break;
                }else{
                    echo "Tidak ada pilihan". PHP_EOL;
                }
            }
            echo "Bye Bye". PHP_EOL;
        }
        
        function addTodolist():void
        {
            echo "TAMBAH TODO". PHP_EOL;
            $todo = InputHelper::input("Todo (x untuk batal");

            if($todo == "x"){
                echo "Batal menambah todo". PHP_EOL;
            }else{
                $this->todolistService->addTodolist($todo);
            }
        }
        
        function removeTodolist():void
        {
            echo "HAPUS TODO". PHP_EOL;

            $pilihan = InputHelper::input("Nomor (x untuk batal)");

            if($pilihan == "x"){
                echo "Batal menghapus". PHP_EOL;
            }else{
                $this->todolistService->removeTodolist($pilihan);
            }
        }
    }

}