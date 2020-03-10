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
                header('Location: /missions');
                exit();
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
public function isSignIn(){
    session_start();
    if (isset($_SESSION['login'])){
        return view(Route::currentRouteName());
    }
    else{
        header('Location: /');
        exit();
    }
}
}
?>