<?php

class Recipe{
    public function __construct(
        private string $name, 
        private string $email,
        private string $title, 
        private string $color, 
        private string $type,
        private string $gluten
    ){}

    public function __tostring(){
        $ret = "<b>Nombre: </b>" . $this -> name . "<br><b> Email: </b>" . $this -> email . "<br><b> Titulo: </b>" . $this -> title . "<br><b> Color: </b>" . $this -> color . "<br><b> Tipo: </b>" . $this -> type . "<br><b> Gluten: </b>" . $this -> gluten; 

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
         * Set the value of name
         *
         * @return  self
         */ 
        public function setName($name)
        {
                $this->name = $name;

                return $this;
        }

        /**
         * Get the value of email
         */ 
        public function getEmail()
        {
                return $this->email;
        }

        /**
         * Set the value of email
         *
         * @return  self
         */ 
        public function setEmail($email)
        {
                $this->email = $email;

                return $this;
        }

        /**
         * Get the value of title
         */ 
        public function getTitle()
        {
                return $this->title;
        }

        /**
         * Set the value of title
         *
         * @return  self
         */ 
        public function setTitle($title)
        {
                $this->title = $title;

                return $this;
        }

        /**
         * Get the value of color
         */ 
        public function getColor()
        {
                return $this->color;
        }

        /**
         * Set the value of color
         *
         * @return  self
         */ 
        public function setColor($color)
        {
                $this->color = $color;

                return $this;
        }

        /**
         * Get the value of type
         */ 
        public function getType()
        {
                return $this->type;
        }

        /**
         * Set the value of type
         *
         * @return  self
         */ 
        public function setType($type)
        {
                $this->type = $type;

                return $this;
        }

        /**
         * Get the value of gluten
         */ 
        public function getGluten()
        {
                return $this->gluten;
        }

        /**
         * Set the value of gluten
         *
         * @return  self
         */ 
        public function setGluten($gluten)
        {
                $this->gluten = $gluten;

                return $this;
        }
}