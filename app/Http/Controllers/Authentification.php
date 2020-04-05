<?php
namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\User;
use DB;
use App\SqlQueries;

class Authentification extends Controller
{
    
public function connect(){
        $login = $_POST['login'];
        $password = $_POST['passwd'];

        $user = SqlQueries::connect($login);
        if ($user){
            $passwd = $user -> user_passwd;
            if (password_verify($password, $passwd)){
                session_start();
                $_SESSION['login'] = $login;
                $_SESSION['view_missions'] = $user->view_missions;
                $_SESSION['view_paiements'] = $user->view_paiements;
                $_SESSION['nom'] = $user->user_nom.' '.$user->user_prenom;
                if ($_SESSION['view_missions'] == '1' ){
                    header('Location: /missions');
                    exit();
                }
                if ($_SESSION['view_paiements'] == '1'){
                    header('Location: /paiement-frais');
                    exit();
                }
            }
            else{
                header('Location: /');
                exit();
            }
        }
        else{
            header('Location: /');
            exit();
        }
    
    }
    public function logout(){
        session_start();
        unset($_SESSION['login']);
        unset($_SESSION['nom']);
        unset($_SESSION['view_missions']);
        unset($_SESSION['view-paiements']);
        header('Location: /');
        exit();
    }
}
?>