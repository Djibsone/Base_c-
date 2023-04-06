<?php
//ini_set('display_errors','on');
    
    class User {

        public function singup () 
        {
            require './model.php';
            require './view/signup.php';
    
            $username = htmlspecialchars($_REQUEST['username']);
            $email = htmlspecialchars($_REQUEST['email']);
            $password = htmlspecialchars($_REQUEST['password']);
            $confirm_password = htmlspecialchars($_REQUEST['confirm_password']);
            //$inscription = htmlspecialchars($_POST['inscription']);
    
            if($_SERVER['REQUEST_METHOD'] === 'POST')
            {
                if(isset($username) && !empty($username) && isset($email) && !empty($email) && isset($password) && !empty($password) && isset($confirm_password) && !empty($confirm_password)) 
                {
                    if($password === $confirm_password) {
                        $table = 'user';
                        $field = 'username, email, password';
                        $values = '?,?,?';
                        $data = array($username, $email, $password);
    
                        $database = new Model();
                        $database -> add($table, $field, $values, $data);
                    }
                    else {
                        echo '<script>alert("Les mots de passe ne sont pas identiques")</script>';
                    }
                }
                else {
                    echo '<script>alert("Tous les champs sont requis.")</script>';
                }
    
            }
            
        }
    }
    
   

?>

