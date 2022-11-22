<?php

class ConsoleController extends AbstractController {

    protected $errors = [];

    public function makeModel() : Model {
        
        //Creates an empty model
        return new Model(DB_USER, DB_PASSWORD, DB_NAME, DB_HOST);
    }
    public function makeView() : View {
        $v = new View();
        $v->registerTemplate(TEMPLATE_DIR . '/console.tpl.php');

        return $v;
    }
    public function start() {
        
        $auth = new Authenticate();
        //user
        if(!$auth->isUserLoggedIn()) {
            header('Location:login_display.php');
            exit();
        }

        //Get the current time as a string
        $now = date('H:i:s');
        //Get system time zone
        $tz = date_default_timezone_get();
        $vars =[
            'em' => $auth->getUserInfo('em'),
            'name' => $auth->getUserInfo('name'),
        ];

        //Pass the data
        $this->view = $this->makeView();
        $this->view->importVars($vars);
        $this->view->display();   

    }

}