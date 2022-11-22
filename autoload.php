<?php
//This function searches the directories specified below
//for the class/interface/abstract class passed to the autoloader.
spl_autoload_register(function($classname)
{
    $parts = explode('\\', $classname);
    $class = $parts[count($parts)-1];
    
    if (file_exists(CLASS_DIR . "/" . $class . '.php'))
    {
        require CLASS_DIR . '/' . $class . '.php';
    }
    else if (file_exists(CLASS_DIR . "/" . $class . 'Interface.php'))
    {
        require CLASS_DIR . "/" .$class . 'Interface.php';
    }
    else if (file_exists(CONTROLLER_DIR . "/" . $class . '.php'))
    {
        require CONTROLLER_DIR . "/" .$class . '.php';
    }
    else if (file_exists(TEMPLATE_DIR . '/' . $class . '.php'))
    {
        require TEMPLATE_DIR . "/" .$class . '.php';
    }
    else if (file_exists(MODEL_DIR . '/' . $class . '.php'))
    {
        require MODEL_DIR . '/' . $class . '.php';
    }
    else {
        trigger_error('Cannot find class/interface/abstract class: ' .$classname, E_USER_WARNING);
        //Error if the class is not found
        debug_print_backtrace();
    }

});



