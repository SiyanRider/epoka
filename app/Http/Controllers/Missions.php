<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Database\Eloquent\Model;
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
    public function paiement_index(){
        session_start();
        if (isset($_SESSION['login'])){
            if ($_SESSION['view_paiements'] == '1'){
                $liste_missions = SqlQueries::getPaiements();
                return view('paiement-frais', compact('liste_missions'));
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