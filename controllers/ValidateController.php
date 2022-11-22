<?php

class ValidateController extends AbstractController {

    private  $errors = [];

    public function makeModel() : Model {
        
        //Creates an "empty" model
        return new AuthenticateModel(DB_USER, DB_PASSWORD, DB_NAME, DB_HOST);
    }

    //Creates an empty view since the validator does not need one
    public function makeView() : View {
        $v = new View();
        return $v;
    }

    
    public function start() {

        //NB please create areCredentials and loginController
        if($this->areCredentialsValid($_POST)) {
            $login_controller = new LoginController();
            $login_controller->start();
        }
        else {
            $login_display_controller  = new LoginDisplayController();
            $login_display_controller->setErrorMessages($this->getErrorMessages());
            $login_display_controller->start();
            
        }

    }
    
     //Checks is valid PHP variable name is used
     public function valid(string $name) : bool {

        if(isset($_GET['register'])) {
           if(!preh_match( '/^[a-zA-Z_\x80-\xff][a-zA-Z0-9_\x80-\xff]*$/', $name)) {
              //If a name has the wrong format like numbers in the name and error will be displayed
              trigger_error('Invalid name format', E_USER_ERROR);
              $this->errors['nameError'] = "Incorrect Name Format";
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
        $passwordValid = $this->isPasswordValid($user_info['PassCheck'],false,'');

        if(!$emailValid || !$passwordValid) {//If the password or email is incorrect, give an error
           $this->errors['Data Format'] = 'Invalid email or password format';

             return false;
        }

      }
      //Authenticate the login information
      $authObject = new AuthenticateController();
     $authObject->start();
       if(!$authObject->auth($user_info['emailuser'], $user_info['PassCheck'])) {
        $this->errors['Credentisals'] = 'Invalid email or password combination';

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



  public function isPasswordValid(string $password, string $retyped, string $retyped_pass='') : bool {

    $retyped = false;
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

        $retyped = true;
      //   $password = $retyped_pass;

      //   if($password == $retyped_pass){
      //    return $retyped;
      //   }

        if(strcmp($retyped_pass, $password)){//compares two strings
           return $retyped;
        }
       
     return $retyped;
     } else {
        $this->errors['Password'] = "Invalid Password";
        return false;
     }
   //   return $retyped;
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

 
 public function setErrorMessages(array $errors) {
    if(!empty($errors)) {
    $this->errors = $errors;

    }
// return $errors;

}

 
   // Wraps the errors in an array
  public function getErrorMessages() {
       $errors = $this->errors;
       return $errors;

   }



     
}//End ValidateController




