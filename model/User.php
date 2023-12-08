<?php
    class user{
        private $first_name;
        private $last_name;
        private $email;
        private $role;
        private $password;
        public function get_first_name(){
            return $this->first_name;
        }
        public function get_last_name(){
            return $this->last_name;
        }
        public function get_email(){
            return $this->email;
        }
        public function get_role(){
            return $this->role;
        }
        public function get_password(){
            return $this->password;
        }

        public function set_name($x){
            $this->first_name=$x;
        }
        public function set_last_name($x){
            $this->last_name=$x;
        }
        public function set_mail($x){
            $this->email=$x;
        }
        public function set_role($x){
            $this->role=$x;
        }
        
        public function set_password($x){
            $this->password=$x;
        }
        
        public function __construct($firstName,$lastName,$mail,$role,$password){
            $this->first_name=$firstName;
            $this->last_name=$lastName;
            $this->email=$mail;
            $this->role=$role;
            $this->password=$password;
        }
    }

?>