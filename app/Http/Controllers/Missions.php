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
            $liste_missions = DB::select('SELECT user_nom, user_prenom, miss_debut, miss_fin, ville_nom_reel, miss_id, isValidate FROM mission, utilisateurs, villes_france_free WHERE miss_ville_id = ville_id AND mission.user_id = utilisateurs.user_id');
            return view('missions', compact('liste_missions'));
        }
        else{
            header('Location: /');
            exit();
        }
    }
    public function valider($id){
        session_start();
        if (isset($_SESSION['login'])){
            DB::table('mission')
                ->where('miss_id',$id)
                ->update(['isValidate' => 1]);
            header('Location: /missions');
            exit();
        }
    }
    public function paiement_index(){
        session_start();
        if (isset($_SESSION['login'])){
            $liste_missions = DB::select('SELECT user_nom, user_prenom, miss_debut, miss_fin, ville_nom_reel, miss_id, isValidate FROM mission, utilisateurs, villes_france_free WHERE miss_ville_id = ville_id AND mission.user_id = utilisateurs.user_id AND isValidate = 1');
            return view('paiement-frais', compact('liste_missions'));
        }
        else{
            header('Location: /');
            exit();
        }
    }
    public function valider_paiement($id){
        session_start();
        if (isset($_SESSION['login'])){
            DB::table('mission')
                ->where('miss_id',$id)
                ->update(['isRembour' => 1]);
            header('Location: /paiement-frais');
            exit();
        }
    }
}
?>