<?php

class ProfileController extends AbstractController 
{

    public function makeModel() : Model {
        
        //Creates an empty model
        return new ProfileModel(DB_USER, DB_PASSWORD, DB_NAME, DB_HOST);
    }
    public function makeView() : View {
        $view = new View();
        $view->registerTemplate(TEMPLATE_DIR . '/profile.tpl.php');

        return $view;
    }

    public function start() {
        $modelData = $this->model;
        $modelData = $this->makeModel();
        //Create the view object and populate with makeview
        $viewData = $this->view;
        $viewData = $this->makeView();
        $auth = new Authenticate();

        //Is the user is not logged in go to the index.php
        if(!$auth->isUserLoggedIn()) {
            header('Location:index.php');
            exit();
        } else {

            $vars =[
                'em' => $auth->getUserInfo('em'),
            ];
            //Retrieve all user courses
            $data = $modelData->findAll('user_courses', $vars);

            if($data){
                $courses = $modelData->find('courses', $data);

                $viewData->importVars($courses);
            }
            else{
                $viewData->importVar('Notice','Sorry you are not registered for any courses.');
            }

            //Displays the page
            $viewData->display();
            
        }
    }
    
}
?>