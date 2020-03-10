<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use DB;

class Missions extends Controller
{
    public function index(){
        session_start();
        if (isset($_SESSION['login'])){
            $liste_missions = DB::select('SELECT * FROM mission, participe_a, utilisateurs, villes_france_free WHERE user_id = id_user AND id_mission = miss_id AND miss_ville_id = ville_id ');
            return view('missions', compact('liste_missions'));
        }
        else{
            header('Location: /');
            exit();
        }
    }
    public function valider($id){
        DB::table('mission')
            ->where('miss_id',$id)
            ->update(['isValidate' => 1]);
        header('Location: /missions');
        exit();
    }
}
?>