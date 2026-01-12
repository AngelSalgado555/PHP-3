<?php

class User{
    public function __construct(
        private string $name,
        private string $password, 
        private int $id = -1
    ){}


    public function __tostring(){
        return "El nombre es: " . $this -> name . ", y su ID es: " . $this -> id; 
    }
}