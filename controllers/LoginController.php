<?php

class LoginController extends AbstractController 
{
    protected $errors = [];
    public function makeModel() : Model {
        
        //Creates an empty model
        return new AuthenticateModel(DB_USER, DB_PASSWORD, DB_NAME, DB_HOST);
    }
    public function makeView() : View {
        $view = new View();
        return $view;
    }

    public function start() {
        
        $auth = new AuthenticateController();

        if(isset($_GET['logout']) && ($_GET['logout'] == true) && $auth->isUserLoggedIn()) {
            $auth->logoutUser();
            header('Location:login_display.php') ;
            exit();
        }
        
        if (!$auth->isUserLoggedIn()) {
            if(empty($_POST)) {
                trigger_error('Invalid access to login.php page attempted', E_USER_ERROR);
                exit;
            }
        
            $email = $_POST['emailuser'];
            $pass = $_POST['PassCheck'];
            $auth->loginUser([$email, $pass]);
        }
        if($auth->isUserLoggedIn()) {
            header('Location:console.php') ;
        }
        else {
        //pass error message
            $login_controller = new LoginDisplayController();
            $login_controller->setErrorMessages(['Login' => 'Error: Login information doesnt match']);
            $login_controller->start();
        }
      

    }

    // HAndles errors
   public function setErrorMessages(array $errors) {
        if(!empty($errors)) {
        $this->errors = $errors;

        }
        return $errors;

    }

}


?>