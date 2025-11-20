<?php

class User{
    public function __construct(
        private string $name,
        private string $email,
        private string $pass,
        private int $age,
        private array $studies = []
    ){}

    
    public function __tostring(){
        return "<b>Nombre: </b>" . $this -> name . "<br><b> Email: </b>" . $this -> email . "<br><b> Contraseña: 
        </b>" . $this -> pass . "<br><b>Edad: </b>" . $this -> age . "<br><b> Sus estudios: </b>" . 
        implode(", ",  $this -> studies); 
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
         * Get the value of pass
         */ 
        public function getPass()
        {
                return $this->pass;
        }

        /**
         * Set the value of pass
         *
         * @return  self
         */ 
        public function setPass($pass)
        {
                $this->pass = $pass;

                return $this;
        }

        /**
         * Get the value of age
         */ 
        public function getAge()
        {
                return $this->age;
        }

        /**
         * Set the value of age
         *
         * @return  self
         */ 
        public function setAge($age)
        {
                $this->age = $age;

                return $this;
        }

        /**
         * Get the value of studies
         */ 
        public function getStudies()
        {
                return $this->studies;
        }

        /**
         * Set the value of studies
         *
         * @return  self
         */ 
        public function setStudies($studies)
        {
                $this->studies = $studies;

                return $this;
        }
}