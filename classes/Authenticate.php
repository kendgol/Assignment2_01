<?php
//come back and change to what you got in authcontroller
class Authenticate {
     
        private static $emailkey = '';
        private static $fname = '';
        private static $lname = '';
        private static $time = '';
    
    
        public function auth(string $email, string $password): bool {
    
            $v = new ValidateController();
        
            if(!$v->verifyEmail($email) || !$v->verifyPassword($password)) {
                return false;
            }
    
            $mysqli = Database::getDbConnection();
            $query_str = "SELECT email, name, password FROM
                            users WHERE email='$email' AND password='$password'";
    
            if($result = $mysqli->query($quert_str)){
                if($result->num_rows <>1){
                                //user
        $records = $this->model->find('users', $fields);
    
        if(empty($records)) {
            return false;
        }    
            else {
        
                    self::$fname = $records['name'];
                    self::$lname = $records['name'];
                    self::$emailkey = $records['email'];
                    
                    //var_dump($row); exit;
                    return true;
        }
    
                }
    
            }
            else{
                die('Database query error occured: '.$mysqli->error);
            }
    
            
    
    
        }
        
        //Methods
        public function loginUser(array $data) {
    
            if(empty($data))
            {
                trigger_error('Invalid parameter value received', E_USER_ERROR);
            }
            session_start();
            $_SESSION['session_user']['emailkey'] = $data[0];
            $_SESSION['session_user']['name'] = self::$fname;
            $_SESSION['session_user']['name'] = self::$lname;
            $_SESSION['session_user']['time'] = date('Y/m/d h:i:s');
    
            session_write_close();  
        
        }
        
    
        
             public function isUserLoggedIn() : bool {
    
                session_start();
                if(!isset($_SESSION['session_user']['em']) || empty($_SESSION['session_user']['em'] || !filter_var($_SESSION['session_user']['em']) || FILTER_VALIDATE_EMAIL)) {
    
                    session_write_close();
                    return false;
                }
                else {
                    session_write_close();
                    return true;
                }
             }
        
        
             /*
             *Takes the values:: ‘em’, ‘pass’, ‘fname’, ‘lname’, and ‘time and they are to return the e email, password, first name, last name, and time the user logged in respectively
             */
             public function getUserInfo(string $field) : string {
                 
                if(empty($field)) {
                    trigger_error('Invalid parameter received :  getUserInfo', E_USER_ERROR);
                }
        
                
                // switch ($field) {
                //     case 'em':
                //         return $_SESSION['session_user']['email'];
                //         break;
                //     case 'pass':
                //         return $_SESSION['session_user']['password'];
                //         break;
                //     case 'name':
                //         return $_SESSION['session_user']['name'];
                //         break;
                //     case 'time':
                //         return $_SESSION['session_user']['time'];
                //         break;
                //     default;
                //         return 'Invalid Input';
                //         break;
                // }
                session_start();
                if(!isset($_SESSION['session_user'][$field])) {
        
                    session_write_close();
        
                    trigger_error('Invalid field name (' . $field . ') for  getUserInfo. Only ‘em’,‘pass’, ‘fname’, ‘lname’ and ‘time’', E_USER_ERROR);
        
                }

                
        
                $info = $_SESSION['session_user'][$field];
                session_write_close();   
                return $info;
             }
        
        
        
            public function logOutUser() {
                // If the user is logged in, delete the session vars to log them out
                    session_start();
    
                    $_SESSION = array();
    
                    if(ini_get("session.use_cookies")){
                        $params = session_get_cookie_params();
                        setcookie(session_name(), '', time() -42000, 
                                $params["path"], $params["domain"],
                                $params["secure"], $params["httponly"]
                        );
                    }
    
                    session_destroy();
                    
                    // //SESIION foir user
                    // if (isset($_SESSION['session_user'])) {
                    //     // Delete the session vars by clearing the $_SESSION array
                    //     $_SESSION = array();
        
                    //     // Delete the session cookie by setting its expiration to an hour ago (3600)
                    //     if (isset($_COOKIE[session_name()])) {      
                    //     setcookie(session_name(), '', time() - 3600);    
                    //     }
        
                    //     // Destroy the session
                    //     session_destroy();
                        
                    //     // Delete the user ID and username cookies by setting their expirations to an hour
                    // setcookie('em', '', time() - 3600);
                    // setcookie('pass', '', time() - 3600);
                    
                    // header('Location: ../login.php ');
        
                    //     }
            }
        
        
             
        
        }//End of Class
        
        
        ?>