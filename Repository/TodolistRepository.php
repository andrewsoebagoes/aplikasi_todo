<?php
namespace Repository{
    
    use Entity\Todolist;


    interface TodolistRepository
    {
        function simpanData(Todolist $todolist): void;

        function hapusData(int $number);

        function tampilData(): array;
    }

    class TodolistRepositoryImpl implements TodolistRepository{

        public array $todolist = array();

        function simpanData(Todolist $todolist): void
        {
         $number = sizeof($this->todolist) + 1;
         $this->todolist[$number] = $todolist;   
        }

        function hapusData(int $number) 
        {
            if($number > sizeof($this->todolist)){
                return false;
            }

            for($i = $number; $i < sizeof($this->todolist); $i++){
                $this->todolist[$i] = $this->todolist[$i + 1];

            }

            unset($this->todolist[sizeof($this->todolist)]);
            return true;
        }

        function tampilData(): array
        {
            return $this->todolist;
        }
    }
}