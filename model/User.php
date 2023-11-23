<?php
    class user{
        private $id;
        private $first_name;
        private $last_name;
        private $user_name;
        private $mail;
        private $role;
        private $description;
        private $password;
        public function get(){
            return $this;
        }

        public function set_name($x){
            $this->first_name=$x;
        }
        public function set_last_name($x){
            $this->last_name=$x;
        }
        public function set_user_name($x){
            $this->user_name=$x;
        }
        public function set_mail($x){
            $this->mail=$x;
        }
        public function set_role($x){
            $this->role=$x;
        }
        public function set_description($x){
            $this->description=$x;
        }
        public function set_password($x){
            $this->password=$x;
        }
        
        public function __construct($id,$firstName,$lastName,$user_name,$mail,$role,$descrption,$password){
            $this->id=$id;
            $this->first_name=$firstName;
            $this->last_name=$lastName;
            $this->user_name=$user_name;
            $this->mail=$mail;
            $this->role=$role;
            $this->description=$descrption;
            $this->password=$password;
        }
    }

?>