<?php 

    class Account{

        private $errorArray;
        private $con;
        public function __construct($con){
            $this->errorArray = array();
            $this->con = $con; 
        }
        public function login($un, $pw){

        $pw =  hash('sha512', $pw);

        $query = mysqli_query($this->con, "SELECT username, password FROM users WHERE username='$un' AND password = '$pw'");

        if(mysqli_num_rows($query) > 0){
            $_SESSION['userLoggedIn'] = $un;
            header("Location:index.php");
            return;
        }else{
            array_push($this->errorArray, Constants::$loginFail);
            return false;
        }
        // TODO : make email and username seperate error


        }
        public function register($un, $fn, $ln, $em, $em2, $pw, $pw2){
            $this->validateUsername( $un );
            $this->validateFirstName( $fn);
            $this->validateLastName( $ln );
            $this->validateEmails( $em, $em2 );
            $this->validatePasswords( $pw, $pw2 );

            if( empty( $this->errorArray) ){
                // Insert into DB
            $_SESSION['userLoggedIn'] = $un;
            $this->insertUserDetils( $un, $fn, $ln, $em, $pw);
            $this->setDefaultColor($un);
            header("Location:index.php");
            return;
            }else{
                return false;
            }
        }
        public function getError($error){
            if( !in_array($error, $this->errorArray) ){
                $error = "";
            }
            return "<span class='errorMessage'>". $error ."</span>";

        }

        private function setDefaultColor($un){
            
            $query = mysqli_query($this->con, "SELECT id,username FROM users WHERE username='$un'");
            $row = mysqli_fetch_array($query);
            $id = $row['id'];
            $colorQuery = mysqli_query($this->con, "INSERT INTO user_colors_settings VALUES('', '$id', '$un', '	#3e3e3e', '	#000000','#282828')");
    
            return $colorQuery;

        }

        private function insertUserDetils( $un, $fn, $ln, $em, $pw){
            $encryptedPw = hash('sha512', $pw);
            $profilePic = "assets/images/profile-pics/picture1.png";
            $date = date("Y-m-d");

            $result = mysqli_query($this->con, "INSERT INTO users VALUES( '', '$un', '$fn', '$ln', '$em', '$encryptedPw', '$date', '$profilePic')");
            
           

            return $result;
        }
        private function validateUsername( $un ){
           if( strlen($un) > 25  || strlen($un) < 5){
                array_push($this->errorArray, Constants::$usernameCharacters);
                return;
           }
           // TODO: check if username exist in db;

           $checkUsernameQuery = mysqli_query($this->con,"SELECT username FROM users WHERE username='$un'");
           if( mysqli_num_rows($checkUsernameQuery) > 0){
                array_push($this->errorArray, Constants::$usernameTaken);
                return;
           }
        }
        private function validateFirstName( $fn ){
            if( strlen($fn) > 25  || strlen($fn) < 3){
                array_push($this->errorArray, Constants::$firstNameCharacters);
                return;
           }

        }
        private function validateLastName( $ln ){
            if( strlen($ln) > 25  || strlen($ln) < 3){
                array_push($this->errorArray,Constants::$lastNameCharacters);
                return;
           }
        }
        private function validateEmails( $em, $em2 ){

            if ( $em != $em2){
                array_push($this->errorArray, Constants::$emailsDoNotMatch);
                return;
            }
            if( !filter_var( $em, FILTER_VALIDATE_EMAIL )){
                array_push($this->errorArray, Constants::$emailInvalid);
                return;
            }
            $checkEmailQuery = mysqli_query($this->con,"SELECT email FROM users WHERE email='$em'");
           if( mysqli_num_rows($checkEmailQuery) > 0){
                array_push($this->errorArray, Constants::$emailTaken);
                return;
           }

        }
        private function validatePasswords( $pw, $pw2 ){
            if ( $pw != $pw2){
                array_push($this->errorArray, Constants::$passwordsDoNotMatch);
                return;
               } 

            if ( preg_match('/[^A-Za-z0-9]/', $pw)){
                array_push($this->errorArray, $passwordNotAplhanumeric);
                return;
               } 

            if( strlen($pw) > 30  || strlen($pw) < 5){
                array_push($this->errorArray, Constants::$passwordCharacters);
                return;
            }

        }

    }
?>