<?php
    class UserValidator{
        private $data;
        private $errors = [];
        private static $fields = ['username', 'email'];

        public function __construct($post_data){
            $this->data = $post_data
        }
        public function validateForm(){
            foreach(self::$fields as field){
                if(!array_key_exists($field, $this->data)){
                    trigger_error("$field is not present in data");
                    return;
                }
            }
            $this->validateUsername();
            $this->validateEmail();
        }
        private function validateUsername(){
            $val = trim($this->data['username']);

            if(empty($val)){
                $this->addError('username', 'username cannot be empty');
            } 
            else{
                if(!preg_match('/^[a-zA-Z0-9]{6,12}$/', $val)){
                    $this->addError('username', 'username cannot be longer than 6-12 char');
                }  
            }
        }
        private function validateEmail(){
            
        }

        private function addError($key, $val){
            $this->errors[$key] = $val;
        }
    }
?>