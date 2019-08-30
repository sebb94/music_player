<?php 

    class Account{

        private $errorArray;

        public function __construct(){
            $this->errorArray = array();
        }
        public function register($un, $fn, $ln, $em, $em2, $pw, $pw2){
            $this->validateUsername( $un );
            $this->validateFirstName( $fn);
            $this->validateLastName( $ln );
            $this->validateEmails( $em, $em2 );
            $this->validatePasswords( $pw, $pw2 );
        }
        private function validateUsername( $un ){
           if( strlen($un) > 25  || strlen($un) < 5){
                array_push($this->errorArray, "Your usename must be between 5 and 25 characters");
                return;
           }
           // TODO: check if username exist in db;
        }
        private function validateFirstName( $fn ){
            if( strlen($fn) > 25  || strlen($fn) < 3){
                array_push($this->errorArray, "Your First Name must be between 5 and 25 characters");
                return;
           }

        }
        private function validateLastName( $ln ){
            if( strlen($ln) > 25  || strlen($ln) < 3){
                array_push($this->errorArray, "Your Last Name must be between 3 and 25 characters");
                return;
           }
        }
        private function validateEmails( $em, $em2 ){

            if ( $em != $em2){
                array_push($this->errorArray, "Your emails not don't match");
                return;
            }
            if( !filter_var( $em, FILTER_VALIDATE_EMAIL )){
                array_push($this->errorArray, "Emails is invalid");
                return;
            }
            // TODO: check that emails already been used;

        }
        private function validatePasswords( $pw, $pw2 ){
            if ( $pw != $pw2){
                array_push($this->errorArray, "Your passwords not don't match");
                return;
               } 

            if ( preg_match('/[^A-Za-z0-9]/', $pw)){
                array_push($this->errorArray, "Your passwords can only contain numbers and letters match");
                return;
               } 

            if( strlen($pw) > 30  || strlen($pw) < 5){
                array_push($this->errorArray, "Your password must be between 5 and 30 characters");
                return;
            }

        }

    }
?>