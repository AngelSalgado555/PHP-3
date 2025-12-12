<?php

class Component{
    //Atributos y esas cosas 
    function __construct(
        private string $name,
        private string $brand,
        private string $model,
        private int $id = -1
    ){}

    public function __tostring(){
        $ret = "El id es: " . $this -> id . ", el nombre es: " . $this -> name . ", la marca es: " . $this -> brand . ", y el modelo es: " . $this -> model;
        return $ret;
    }

    

        /**
         * Get the value of name
         */ 
        public function getName()
        {
                return $this->name;
        }

        /**
         * Get the value of brand
         */ 
        public function getBrand()
        {
                return $this->brand;
        }

        /**
         * Get the value of model
         */ 
        public function getModel()
        {
                return $this->model;
        }

        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }
}