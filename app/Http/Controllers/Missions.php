<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use App\SqlQueries as SqlQueries;
use DB;

class Missions extends Controller
{
    public function index(){
        session_start();
        if (isset($_SESSION['login'])){
            if ($_SESSION['view_missions'] = 1){
                $liste_missions = SqlQueries::getMissions();
                return view('missions', compact('liste_missions'));
            }
            else{
                header('Location: /forbiden-error');
                exit();
            }
        }
        else{
            header('Location: /');
            exit();
        }
    }
    public function valider($id){
        session_start();
        if (isset($_SESSION['login'])){
            if ($_SESSION['view_missions'] = 1){
                SqlQueries::validateMission($id);
                header('Location: /missions');
                exit();
            }
        }
    }
    public function getMontantPaiements($idMission){
        $query = SqlQueries::getMontantPaiements($idMission);
        $settings = SqlQueries::getSettings();
        $montant = "";
        foreach ($query as $query){
            if (empty($query) == false){
                $montant = intval($settings -> prix_km) * intval($query -> dist_km);
                $montant = $montant + intval($settings -> prix_heberg);
                $montant = $montant.'€';
            }
            else{
                $montant = false;
            }
        }
        return $montant;
    }
    public function paiement_index(){
        session_start();
        if (isset($_SESSION['login'])){
            if ($_SESSION['view_paiements'] == '1'){
                $liste_missions = SqlQueries::getPaiements();
                $listeMontant = [];
                foreach ($liste_missions as $liste){
                    $montant = Missions::getMontantPaiements($liste -> miss_id);
                    $listeMontant[$liste -> miss_id] = $montant;
                }
                return view('paiement-frais', compact('liste_missions','listeMontant'));
            }
            else{
                header('Location: /forbiden-error');
                exit();
            }
            
            }
            else{
                header('Location: /');
                exit();
        }
        
    }
    public function valider_paiement($id){
        session_start();
        if (isset($_SESSION['login'])){
            if ($_SESSION['view_paiements'] =='1'){
                SqlQueries::validatePaiement($id);
                header('Location: /paiement-frais');
                exit();
            }
        }
    }
    
}
?>