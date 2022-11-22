<?php
require_once "Authenticate.php";

class Validate {

   private  $errors = [];

//Methods 
     
     //Checks is valid PHP variable name is used
     public function valid(string $name) : bool {

         if(isset($_GET['register'])) {
            if(!preh_match( '/^[a-zA-Z_\x80-\xff][a-zA-Z0-9_\x80-\xff]*$/', $name)) {
               //If a name has the wrong format like numbers in the name and error will be displayed
               trigger_error('Invalid name format', E_USER_ERROR);
               $this->errors['Name'] = "Incorrect Name Format";
               return false;
            } 
            else {
               return true;
            }
         }
      }

          
    public function areCredentialsValid(array $user_info): bool {

      //Student Validation
      $matchCreden = 0;
       if($user_info['js_validating'] == false) {
         $emailValid = $this->isEmailValid($user_info['emailuser']);
         $passwordValid = $this->isPasswordValid($user_info['PassCheck']);

         if(!$emailValid || !$passwordValid) {//If the password or email is incorrect, give an error
            $this->errors['Login Error'] = 'Invalid email or password format';

              return false;
         }

       }
       //Authenticate the login information
       $authObject = new Authenticate();
      $authObject->start();
        if(!$authObject->auth($user_info['emailuser'], $user_info['PassCheck'])) {
         $this->errors['Credentials'] = 'Invalid email or password combination';
 
                return false;
        }
        return true;
     }

//Ensures that the email follows the RFC5322 specification
     public function isEmailValid(string $email) : bool {
      if(empty($email)) {
         $this->errors['Email'] = 'Please fill out this field';
         return false;
     }
     // Validate email 
     if (!filter_var($email, FILTER_VALIDATE_EMAIL))
     { 
      $this->errors['Email'] = 'Invalid email format';
         return false;
     }
     
       return true;
     
   }



   public function isPasswordValid(string $password, bool $retyped=false, string $retyped_pass='') : bool {
      if($retyped = true){
         if($password != $retyped_pass){
            $this->errors['Password'] = "The passwords do not match";
        
            return false;
        }
       }
   
      $uppcase = "/(?=.*?[A-Z])/";
      $lowcase = "/(?=.*?[a-z])/";
      $numberUsed = "/(?=.*?[0-9])/";
      $space = "/^$|\s+/";
      
   
      if(empty($password)){
         $this->errors['Password'] = "Please fill out this field";
         return false;
      }
   
      //No password entered or password of wrong length, gives an error
      if((strlen($password) < 8) || (strlen($password) > 16) ){
         $this->errors['Password'] = "Invalid password length: Password must be at least 8 characters long";
         return false;
      }
   
        //No uppercase in the password
        if (!preg_match($uppcase, $password)) {
         $this->errors['Password'] = "No uppercase was found in the password";
      }
   
      //No number was in the password
      if (!preg_match($numberUsed, $password)) {
         $this->errors['Password'] = "No number was found in the password";
      }
        
   
      //Password is invalid
      if (preg_match($uppcase, $password) && preg_match($numberUsed, $password) ) {
        
      return true;
      } else {
         $this->errors['Password'] = "Invalid Password";
         return false;
      }
   } 
   



  //checks for name
  function isNameValid(string $name) : bool {

      if(!ctype_alpha($name))
      {
         $this->errors['Name'] = "Invalid First/Last name format";
         return false;
      }
      return true;
  }


  
    // Wraps the errors in an array
   public function getErrorMessages() {
        $errors = $this->errors;
        return $errors;

    }

    public function setErrorMessages(array $errors) {
      if(!empty($errors)) {
      $this->errors = $errors;
  
      }
      // return $errors;
  
  }


}




?>