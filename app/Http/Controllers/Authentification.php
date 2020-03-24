<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use DB;

class Authentification extends Controller
{
public function connect()
    {
        $login = $_POST['login'];
        $password = $_POST['passwd'];

        $user = DB::table('utilisateurs')->where('user_id',$login)->first();
        if ($user){
            $passwd = $user -> user_passwd;
            if ($passwd == $password){
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
}
?>